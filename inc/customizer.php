<?php
/**
 * =====================================================
 * Customizer del Theme PCCURICO.CL
 * Configuración de opciones visuales y bloques
 * =====================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * =====================================================
 * Registrar opciones del Customizer
 * =====================================================
 */
function pccurico_customize_register( $wp_customize ) {

	/*
	-----------------------------------------
	Sección de identidad del sitio
	-----------------------------------------
	*/
	$wp_customize->add_section(
		'pccurico_identity',
		array(
			'title'       => __( 'Identidad del sitio', 'pccurico' ),
			'description' => __( 'Logo, título y descripción del sitio', 'pccurico' ),
			'priority'    => 10,
		)
	);

	// Logo personalizado (ya soportado por theme_support)
	$wp_customize->add_setting(
		'pccurico_logo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'pccurico_logo',
			array(
				'label'    => __( 'Logo principal', 'pccurico' ),
				'section'  => 'pccurico_identity',
				'settings' => 'pccurico_logo',
			)
		)
	);

	/*
	-----------------------------------------
	Sección Colores
	-----------------------------------------
	*/
	$wp_customize->add_section(
		'pccurico_colors',
		array(
			'title'       => __( 'Colores', 'pccurico' ),
			'description' => __( 'Colores principales y secundarios del sitio', 'pccurico' ),
			'priority'    => 20,
		)
	);

	// Color principal
	$wp_customize->add_setting(
		'pccurico_primary_color',
		array(
			'default'           => '#0a7cff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'pccurico_primary_color',
			array(
				'label'    => __( 'Color principal', 'pccurico' ),
				'section'  => 'pccurico_colors',
				'settings' => 'pccurico_primary_color',
			)
		)
	);

	// Color secundario
	$wp_customize->add_setting(
		'pccurico_secondary_color',
		array(
			'default'           => '#ff6600',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'pccurico_secondary_color',
			array(
				'label'    => __( 'Color secundario', 'pccurico' ),
				'section'  => 'pccurico_colors',
				'settings' => 'pccurico_secondary_color',
			)
		)
	);

	/*
	-----------------------------------------
	Sección Tipografía
	-----------------------------------------
	*/
	$wp_customize->add_section(
		'pccurico_typography',
		array(
			'title'       => __( 'Tipografía', 'pccurico' ),
			'description' => __( 'Fuentes del sitio', 'pccurico' ),
			'priority'    => 30,
		)
	);

	// Fuente principal
	$wp_customize->add_setting(
		'pccurico_font_primary',
		array(
			'default'           => 'Outfit',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'pccurico_font_primary',
		array(
			'label'    => __( 'Fuente principal', 'pccurico' ),
			'section'  => 'pccurico_typography',
			'type'     => 'text',
		)
	);

	/*
	-----------------------------------------
	Sección Homepage / Portada
	-----------------------------------------
	*/
	$wp_customize->add_section(
		'pccurico_homepage',
		array(
			'title'       => __( 'Portada', 'pccurico' ),
			'description' => __( 'Opciones de la página principal', 'pccurico' ),
			'priority'    => 40,
		)
	);

	// Texto de hero
	$wp_customize->add_setting(
		'pccurico_hero_text',
		array(
			'default'           => 'Cursos Online Profesionales',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'pccurico_hero_text',
		array(
			'label'    => __( 'Texto principal (Hero)', 'pccurico' ),
			'section'  => 'pccurico_homepage',
			'type'     => 'text',
		)
	);

	// Subtítulo hero
	$wp_customize->add_setting(
		'pccurico_hero_subtext',
		array(
			'default'           => 'Aprende nuevas habilidades desde cualquier lugar con nuestros cursos online certificados.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'pccurico_hero_subtext',
		array(
			'label'    => __( 'Subtítulo (Hero)', 'pccurico' ),
			'section'  => 'pccurico_homepage',
			'type'     => 'textarea',
		)
	);

}
add_action( 'customize_register', 'pccurico_customize_register' );

/**
 * =====================================================
 * Aplicar Customizer settings en CSS
 * =====================================================
 */
function pccurico_customize_css() {
	?>
	<style type="text/css">
		body {
			--pccurico-primary-color: <?php echo get_theme_mod( 'pccurico_primary_color', '#0a7cff' ); ?>;
			--pccurico-secondary-color: <?php echo get_theme_mod( 'pccurico_secondary_color', '#ff6600' ); ?>;
			font-family: '<?php echo get_theme_mod( 'pccurico_font_primary', 'Outfit' ); ?>', sans-serif;
		}
		.pccurico-hero h1 {
			content: '<?php echo get_theme_mod( 'pccurico_hero_text', 'Cursos Online Profesionales' ); ?>';
		}
		.pccurico-hero p {
			content: '<?php echo get_theme_mod( 'pccurico_hero_subtext', 'Aprende nuevas habilidades desde cualquier lugar con nuestros cursos online certificados.' ); ?>';
		}
	</style>
	<?php
}
add_action( 'wp_head', 'pccurico_customize_css' );