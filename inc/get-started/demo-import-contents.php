<?php

/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */

class Whizzie {
	
	protected $version = '1.1.0';
	
	/** @var string Current theme name, used as namespace in actions. */
	protected $online_education_academy_theme_name = '';
	protected $online_education_academy_theme_title = '';
	
	/** @var string Wizard page slug and title. */
	protected $online_education_academy_page_slug = '';
	protected $online_education_academy_page_title = '';
	
	/** @var array Wizard steps set by user. */
	protected $config_steps = array();
	
	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $online_education_academy_plugin_url = '';

	public $online_education_academy_plugin_path;
	public $parent_slug;
	
	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;
	
	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';
	
	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';
	
	/**
	 * Constructor
	 *
	 * @param $config	Our config parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}
	
	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $config	Our config parameters
	 */
	public function set_vars( $config ) {
	
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/class-tgm-plugin-activation.php';
		require_once trailingslashit( WHIZZIE_DIR ) . 'tgm/tgm.php';

		if( isset( $config['online_education_academy_page_slug'] ) ) {
			$this->online_education_academy_page_slug = esc_attr( $config['online_education_academy_page_slug'] );
		}
		if( isset( $config['online_education_academy_page_title'] ) ) {
			$this->online_education_academy_page_title = esc_attr( $config['online_education_academy_page_title'] );
		}
		if( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}
		
		$this->online_education_academy_plugin_path = trailingslashit( dirname( __FILE__ ) );
		$relative_url = str_replace( get_template_directory(), '', $this->online_education_academy_plugin_path );
		$this->online_education_academy_plugin_url = trailingslashit( get_template_directory_uri() . $relative_url );
		$online_education_academy_current_theme = wp_get_theme();
		$this->online_education_academy_theme_title = $online_education_academy_current_theme->get( 'Name' );
		$this->online_education_academy_theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $online_education_academy_current_theme->get( 'Name' ) ) );
		$this->online_education_academy_page_slug = apply_filters( $this->online_education_academy_theme_name . '_theme_setup_wizard_online_education_academy_page_slug', $this->online_education_academy_theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->online_education_academy_theme_name . '_theme_setup_wizard_parent_slug', '' );

	}
	
	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */	
	public function init() {
		
		if ( class_exists( 'TGM_Plugin_Activation' ) && isset( $GLOBALS['tgmpa'] ) ) {
			add_action( 'init', array( $this, 'get_tgmpa_instance' ), 30 );
			add_action( 'init', array( $this, 'set_tgmpa_url' ), 40 );
		}
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'admin_init', array( $this, 'get_plugins' ), 30 );
		add_filter( 'tgmpa_load', array( $this, 'tgmpa_load' ), 10, 1 );
		add_action( 'wp_ajax_setup_plugins', array( $this, 'setup_plugins' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
		
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'online-education-academy-demo-import-style', get_template_directory_uri() . '/inc/get-started/assets/css/demo-import-style.css');
		wp_register_script( 'online-education-academy-demo-import-script', get_template_directory_uri() . '/inc/get-started/assets/js/demo-import-script.js', array( 'jquery' ), time() );
		wp_localize_script( 
			'online-education-academy-demo-import-script',
			'whizzie_params',
			array(
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'wpnonce' 		=> wp_create_nonce( 'whizzie_nonce' ),
				'verify_text'	=> esc_html( 'verifying', 'online-education-academy' )
			)
		);
		wp_enqueue_script( 'online-education-academy-demo-import-script' );
	}
	
	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function tgmpa_load( $status ) {
		return is_admin() || current_user_can( 'install_themes' );
	}
			
	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance() {
		$this->tgmpa_instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
	}
	
	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url() {
		$this->tgmpa_menu_slug = ( property_exists( $this->tgmpa_instance, 'menu' ) ) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters( $this->online_education_academy_theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug );
		$tgmpa_parent_slug = ( property_exists( $this->tgmpa_instance, 'parent_slug' ) && $this->tgmpa_instance->parent_slug !== 'themes.php' ) ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters( $this->online_education_academy_theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug );
	}
	
	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page() {
		add_theme_page( esc_html( $this->online_education_academy_page_title ), esc_html( $this->online_education_academy_page_title ), 'manage_options', $this->online_education_academy_page_slug, array( $this, 'wizard_page' ) );
	}
	
	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page() { 
		tgmpa_load_bulk_installer();

		if ( ! class_exists( 'TGM_Plugin_Activation' ) || ! isset( $GLOBALS['tgmpa'] ) ) {
			die( esc_html__( 'Failed to find TGM', 'online-education-academy' ) );
		}

		$url = wp_nonce_url( add_query_arg( array( 'plugins' => 'go' ) ), 'whizzie-setup' );
		$method = '';
		$fields = array_keys( $_POST );

		if ( false === ( $creds = request_filesystem_credentials( esc_url_raw( $url ), $method, false, false, $fields ) ) ) {
			return true;
		}

		if ( ! WP_Filesystem( $creds ) ) {
			request_filesystem_credentials( esc_url_raw( $url ), $method, true, false, $fields );
			return true;
		}

		$online_education_academy_theme = wp_get_theme();
		$online_education_academy_theme_title = $online_education_academy_theme->get( 'Name' );
		$online_education_academy_theme_version = $online_education_academy_theme->get( 'Version' );

		?>
		<div class="wrap">
			<?php 
			// Theme Title and Version
			printf( '<h1>%s %s</h1>', esc_html( $online_education_academy_theme_title ), esc_html( '(Version :- ' . $online_education_academy_theme_version . ')' ) );
			?>
			
			<div class="card whizzie-wrap">

				<div class="demo_content_image">
					<div class="demo_content">
						<?php

						$online_education_academy_steps = $this->get_steps();
						echo '<ul class="whizzie-menu">';
						foreach ( $online_education_academy_steps as $online_education_academy_step ) {
							$class = 'step step-' . esc_attr( $online_education_academy_step['id'] );
							echo '<li data-step="' . esc_attr( $online_education_academy_step['id'] ) . '" class="' . esc_attr( $class ) . '">';
							printf( '<h2>%s</h2>', esc_html( $online_education_academy_step['title'] ) );

							$content = call_user_func( array( $this, $online_education_academy_step['view'] ) );
							if ( isset( $content['summary'] ) ) {
								printf(
									'<div class="summary">%s</div>',
									wp_kses_post( $content['summary'] )
								);
							}
							if ( isset( $content['detail'] ) ) {
								printf( '<p><a href="#" class="more-info">%s</a></p>', esc_html__( 'More Info', 'online-education-academy' ) );
								printf(
									'<div class="detail">%s</div>',
									wp_kses_post( $content['detail'] )
								);
							}
							if ( isset( $online_education_academy_step['button_text'] ) && $online_education_academy_step['button_text'] ) {
								printf( 
									'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( $online_education_academy_step['callback'] ),
									esc_attr( $online_education_academy_step['id'] ),
									esc_html( $online_education_academy_step['button_text'] )
								);
							}
							if ( isset( $online_education_academy_step['can_skip'] ) && $online_education_academy_step['can_skip'] ) {
								printf( 
									'<div class="button-wrap" style="margin-left: 0.5em;"><a href="#" class="button button-secondary do-it" data-callback="%s" data-step="%s">%s</a></div>',
									esc_attr( 'do_next_step' ),
									esc_attr( $online_education_academy_step['id'] ),
									esc_html__( 'Skip', 'online-education-academy' )
								);
							}
							echo '</li>';
						}
						echo '</ul>';
						?>
						
						<ul class="whizzie-nav">
							<?php
							foreach ( $online_education_academy_steps as $online_education_academy_step ) {
								if ( isset( $online_education_academy_step['icon'] ) && $online_education_academy_step['icon'] ) {
									echo '<li class="nav-step-' . esc_attr( $online_education_academy_step['id'] ) . '"><span class="dashicons dashicons-' . esc_attr( $online_education_academy_step['icon'] ) . '"></span></li>';
								}
							}
							?>
						</ul>

						<div class="step-loading"><span class="spinner"></span></div>
					</div> <!-- .demo_content -->

					<div class="demo_image">
						<div class="demo_image buttons">
							<a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_PRO_THEME_URL ); ?>" class="button button-primary bundle" target="_blank"><?php echo esc_html__( 'Get Pro Theme', 'online-education-academy' ); ?></a>
							<a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_DEMO_THEME_URL ); ?>" class="button button-primary bundle pro" target="_blank"><?php echo esc_html__( 'Live Demo', 'online-education-academy' ); ?></a>
							<a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_FREE_DOC_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Free Documentation', 'online-education-academy' ); ?></a>
							<a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_SUPPORT_THEME_URL ); ?>" target="_blank" class="button button-primary"><?php echo esc_html__( 'Support', 'online-education-academy' ); ?></a>
						</div>
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $online_education_academy_theme_title ); ?>" />
					</div> <!-- .demo_image -->

				</div> <!-- .demo_content_image -->

				<div class="bundle-getstart-div">
					<div class="bundle-getstart-img-div">
						<a target="_blank" href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_THEME_BUNDLE_URL ); ?>">
							<img class="bundle-imgs" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/bundle_image.png' ); ?>" alt="<?php echo esc_attr( $online_education_academy_theme_title ); ?>" />
						</a>
					</div>
					<div class="bundle-getstart-lifetime-div">
						<h2><?php echo esc_html__( 'WordPress Theme Bundle | 60+ Premium Designs for Every Need', 'online-education-academy' ); ?></h2>
						<a class="button button-primary" target="_blank" href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_THEME_BUNDLE_URL ); ?>">
							<?php echo esc_html__( 'Get All 60+ Themes @ $79', 'online-education-academy' ); ?>
						</a>
					</div>
				</div>

			</div> <!-- .whizzie-wrap -->


			<div class="about-wrappp-main-div">
				<h1 class="title" style="margin:0;"><?php esc_html_e( 'More Information', 'online-education-academy' ); ?></h1>
				<div class="about-wrappp">
					<div class="about-wrappp-boxes-div">
						<div class="about_wrappp_demo_content">
							<p class="about-description" style="margin-bottom:0;" ><?php esc_html_e( 'Quick Links:', 'online-education-academy' ); ?></p>
							<div class="feature-section two-col">
								<div class="card buy-noww" style="background:linear-gradient(to bottom,#0189f0,#024985) !important;">
									<h2 style="color:#fff;" class="title"><?php esc_html_e( 'Upgrade To Pro', 'online-education-academy' ); ?></h2>
									<p style="color:#fff;"><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'online-education-academy' ) ?><span class="usecode"><?php esc_html_e('" STEPRO10 "', 'online-education-academy'); ?></span></p>
									<p><a  style="background: red !important;" href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_PRO_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Upgrade Pro', 'online-education-academy' ); ?></a></p>
								</div>

								<div class="card">
									<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'online-education-academy' ); ?></h2>
									<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'online-education-academy' ) ?></p>
									<p><a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_FREE_DOC_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'online-education-academy' ); ?></a></p>
								</div>

								<div class="card">
									<h2 class="title"><?php esc_html_e( 'Theme Info', 'online-education-academy' ); ?></h2>
									<p><?php esc_html_e( 'Know more about Expert Business Consultant.', 'online-education-academy' ) ?></p>
									<p><a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_FREE_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Info', 'online-education-academy' ); ?></a></p>
								</div>

								<div class="card">
									<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'online-education-academy' ); ?></h2>
									<p><?php esc_html_e( 'You can get all theme options in customizer.', 'online-education-academy' ) ?></p>
									<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize', 'online-education-academy' ); ?></a></p>
								</div>

								<div class="card">
									<h2 class="title"><?php esc_html_e( 'Need Support?', 'online-education-academy' ); ?></h2>
									<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'online-education-academy' ) ?></p>
									<p><a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_SUPPORT_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Support Forum', 'online-education-academy' ); ?></a></p>
								</div>

								<div class="card">
									<h2 class="title"><?php esc_html_e( 'Review', 'online-education-academy' ); ?></h2>
									<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'online-education-academy' ) ?></p>
									<p><a href="<?php echo esc_url( ONLINE_EDUCATION_ACADEMY_RATE_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Rate Us', 'online-education-academy' ); ?></a></p>
								</div>		
							</div>
						</div> <!-- .about_wrappp_demo_content -->
					</div> <!-- .about-wrappp-boxes-div -->

					<div class="about-wrappp-free-pro-div">
						<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'online-education-academy' ); ?></p>
						<div class="seo-theme-table">
							<table>
								<thead>
									<tr><th scope="col"></th>
										<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'online-education-academy' ); ?></th>
										<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'online-education-academy' ); ?></th>
									</tr>
								</thead>
								<tbody>
								<tr class="odd" scope="row">
										<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'online-education-academy' ); ?></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( '15+ Theme Sections', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Extensive Typography Settings & Color Pallets', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Fully SEO Optimized', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Expert Technical Support', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Attractive Preloader Design', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Enhanced Plugin Integration', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>	
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Custom Post Types', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'High-Level Compatibility with Modern Browsers', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Real-Time Theme Customizer', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-no-alt"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-saved"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Regular Bug Fixes', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-saved"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-saved"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td headers="features" class="feature"><?php esc_html_e( 'Multiple Blog Layouts', 'online-education-academy' ); ?></td>
										<td><span class="dashicons dashicons-saved"></span></td>
										<td><span class="dashicons dashicons-saved"></span></td>
									</tr>
									<tr class="odd" scope="row">
										<td class="feature feature--empty"></td>
										<td class="feature feature--empty"></td>
										<td headers="comp-2" class="td-btn-2"><a class="button button-primary bundle" href="<?php echo esc_url(ONLINE_EDUCATION_ACADEMY_PRO_THEME_URL);?>" target="_blank"><?php esc_html_e( 'Go for Premium', 'online-education-academy' ); ?></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</div> <!-- .about-wrappp -->
			</div> <!-- .about-wrappp-main-div -->
		</div> <!-- .wrap -->
		<?php
	}


		
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps() {
		$online_education_academy_dev_steps = $this->config_steps;
		$online_education_academy_steps = array( 
			'intro' => array(
				'id'			=> 'intro',
				'title'			=> __( 'Welcome to ', 'online-education-academy' ) . $this->online_education_academy_theme_title,
				'icon'			=> 'dashboard',
				'view'			=> 'get_step_intro',
				'callback'		=> 'do_next_step',
				'button_text'	=> __( 'Start Now', 'online-education-academy' ),
				'can_skip'		=> false
			),
			'plugins' => array(
				'id'			=> 'plugins',
				'title'			=> __( 'Plugins', 'online-education-academy' ),
				'icon'			=> 'admin-plugins',
				'view'			=> 'get_step_plugins',
				'callback'		=> 'install_plugins',
				'button_text'	=> __( 'Install Plugins', 'online-education-academy' ),
				'can_skip'		=> true
			),
			// 'widgets' => array(
			// 	'id'			=> 'widgets',
			// 	'title'			=> __( 'Demo Importer', 'online-education-academy' ),
			// 	'icon'			=> 'welcome-widgets-menus',
			// 	'view'			=> 'get_step_widgets',
			// 	'callback'		=> 'install_widgets',
			// 	'button_text'	=> __( 'Import Demo Content', 'online-education-academy' ),
			// 	'can_skip'		=> true
			// ),
			'done' => array(
				'id'			=> 'done',
				'title'			=> __( 'All Done', 'online-education-academy' ),
				'icon'			=> 'yes',
				'view'			=> 'get_step_done',
				'callback'		=> ''
			)
		);
		
		// Iterate through each step and replace with dev config values
		if( $online_education_academy_dev_steps ) {
			// Configurable elements - these are the only ones the dev can update from demo-import-settings.php
			$can_config = array( 'title', 'icon', 'button_text', 'can_skip' );
			foreach( $online_education_academy_dev_steps as $online_education_academy_dev_step ) {
				// We can only proceed if an ID exists and matches one of our IDs
				if( isset( $online_education_academy_dev_step['id'] ) ) {
					$id = $online_education_academy_dev_step['id'];
					if( isset( $online_education_academy_steps[$id] ) ) {
						foreach( $can_config as $element ) {
							if( isset( $online_education_academy_dev_step[$element] ) ) {
								$online_education_academy_steps[$id][$element] = $online_education_academy_dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $online_education_academy_steps;
	}
	
	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro() { ?>
		<div class="summary">
			<div class="steps_content">
				<p>
					<?php printf(
						/* translators: %s: Theme name. */
						esc_html__('Thank you for choosing the %s theme. You will only need a few minutes to configure and launch your new website with the help of this quick setup tutorial. To begin using your website, simply follow the wizard\'s instructions.', 'online-education-academy'),
						esc_html($this->online_education_academy_theme_title)
					); ?>
				</p>
			</div>
		</div>
	<?php }

	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins() {
	$plugins = $this->get_plugins();
	$content = array(); ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.','online-education-academy') ?>
			</p>
		</div>
		<?php // The detail element is initially hidden from the user
		$content['detail'] = '<ul class="whizzie-do-plugins">';
		// Add each plugin into a list
		foreach( $plugins['all'] as $slug=>$plugin ) {
			
			if ( $slug != 'yith-woocommerce-wishlist' ) {
				$content['detail'] .= '<li data-slug="' . esc_attr( $slug ) . '">' . esc_html( $plugin['name'] ) . '<span>';
				$keys = array();
				if ( isset( $plugins['install'][ $slug ] ) ) {
					$keys[] = 'Installation';
				}
				if ( isset( $plugins['update'][ $slug ] ) ) {
					$keys[] = 'Update';
				}
				if ( isset( $plugins['activate'][ $slug ] ) ) {
					$keys[] = 'Activation';
				}
				$content['detail'] .= implode( ' and ', $keys ) . ' required';
				$content['detail'] .= '</span></li>';
			}
		}
		$content['detail'] .= '</ul>';
		
		return $content;
	}
	
	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets() { ?>
	<div class="summary">
		<p>
			<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them.','online-education-academy'); ?>
		</p>
	</div>
	<?php }
	
	/**
	 * Print the content for the final step
	 */
	public function get_step_done() { ?>
		<div id="online-education-academy-demo-setup-guid">
			<div class="customize_div"><?php echo esc_html( 'Now Customize your website' ); ?>
				<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="customize_link">
					<?php echo esc_html( 'Customize ' ); ?> 
					<span class="dashicons dashicons-share-alt2"></span>
				</a>
			</div>
			<div class="online-education-academy-setup-finish">
				<a href="<?php echo esc_url( admin_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Go To Dashboard', 'online-education-academy' ); ?>
				</a>
				<a target="_blank" href="<?php echo esc_url( get_home_url() ); ?>" class="button button-primary">
					<?php esc_html_e( 'Preview Site', 'online-education-academy' ); ?>
				</a>
			</div>
		</div>
	<?php }


	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins() {
		$instance = call_user_func( array( get_class( $GLOBALS['tgmpa'] ), 'get_instance' ) );
		$plugins = array(
			'all' 		=> array(),
			'install'	=> array(),
			'update'	=> array(),
			'activate'	=> array()
		);
		foreach( $instance->plugins as $slug=>$plugin ) {
			if( $instance->is_plugin_active( $slug ) && false === $instance->does_plugin_have_update( $slug ) ) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if( ! $instance->is_plugin_installed( $slug ) ) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if( false !== $instance->does_plugin_have_update( $slug ) ) {
						$plugins['update'][$slug] = $plugin;
					}
					if( $instance->can_plugin_activate( $slug ) ) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	/**
	 * Get the widgets.wie file from the /content folder
	 * @return Mixed	Either the file or false
	 * @since 1.1.0
	 */
	public function has_widget_file() {
		if( file_exists( $this->widget_file_url ) ) {
			return true;
		}
		return false;
	}
	
	public function setup_plugins() {
		if ( ! check_ajax_referer( 'whizzie_nonce', 'wpnonce' ) || empty( $_POST['slug'] ) ) {
			wp_send_json_error( array( 'error' => 1, 'message' => esc_html__( 'No Slug Found','online-education-academy' ) ) );
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();
		
		// what are we doing with this plugin?
		foreach ( $plugins['activate'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-activate',
					'action2'       => - 1,
					'message'       => esc_html__( 'Activating Plugin','online-education-academy' ),
				);
				break;
			}
		}
		foreach ( $plugins['update'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-update',
					'action2'       => - 1,
					'message'       => esc_html__( 'Updating Plugin','online-education-academy' ),
				);
				break;
			}
		}
		foreach ( $plugins['install'] as $slug => $plugin ) {
			if ( $_POST['slug'] == $slug ) {
				$json = array(
					'url'           => admin_url( $this->tgmpa_url ),
					'plugin'        => array( $slug ),
					'tgmpa-page'    => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce'      => wp_create_nonce( 'bulk-plugins' ),
					'action'        => 'tgmpa-bulk-install',
					'action2'       => - 1,
					'message'       => esc_html__( 'Installing Plugin','online-education-academy' ),
				);
				break;
			}
		}
		if ( $json ) {
			$json['hash'] = md5( serialize( $json ) ); // used for checking if duplicates happen, move to next plugin
			wp_send_json( $json );
		} else {
			wp_send_json( array( 'done' => 1, 'message' => esc_html__( 'Success','online-education-academy' ) ) );
		}
		exit;
	}

	
	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets(){

		
	    exit;
	}
}