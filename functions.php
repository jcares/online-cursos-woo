<?php
/**
 * =====================================================
 * Cursos Online WordPress - PCCURICO.CL
 * Theme Functions
 * Versión optimizada para LMS + WooCommerce
 * =====================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * =====================================================
 * VERSION DEL THEME
 * =====================================================
 */

if ( ! defined( 'PCCURICO_THEME_VERSION' ) ) {
	define( 'PCCURICO_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
}

/**
 * =====================================================
 * CONFIGURACIÓN DEL THEME
 * =====================================================
 */

if ( ! function_exists( 'pccurico_theme_setup' ) ) :

	function pccurico_theme_setup() {

		/*
		-----------------------------------------
		Traducciones
		-----------------------------------------
		*/
		load_theme_textdomain(
			'pccurico',
			get_template_directory() . '/languages'
		);

		/*
		-----------------------------------------
		RSS
		-----------------------------------------
		*/
		add_theme_support( 'automatic-feed-links' );

		/*
		-----------------------------------------
		Align Wide Gutenberg
		-----------------------------------------
		*/
		add_theme_support( 'align-wide' );

		/*
		-----------------------------------------
		Soporte WooCommerce
		-----------------------------------------
		*/
		add_theme_support( 'woocommerce' );

		/*
		-----------------------------------------
		Estilos de bloques
		-----------------------------------------
		*/
		add_theme_support( 'wp-block-styles' );

		/*
		-----------------------------------------
		Editor Styles
		-----------------------------------------
		*/
		add_editor_style( 'style.css' );

		/*
		-----------------------------------------
		Logo personalizado
		-----------------------------------------
		*/
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/*
		-----------------------------------------
		Fondo personalizado
		-----------------------------------------
		*/
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		);

		/*
		-----------------------------------------
		Menus tipo bloques
		-----------------------------------------
		*/
		add_theme_support( 'block-nav-menus' );

		/*
		-----------------------------------------
		Color de links
		-----------------------------------------
		*/
		add_theme_support( 'experimental-link-color' );

	}

endif;

add_action( 'after_setup_theme', 'pccurico_theme_setup' );


/**
 * =====================================================
 * CARGA DE ESTILOS Y SCRIPTS
 * =====================================================
 */

function pccurico_scripts() {

	/*
	-----------------------------------------
	Estilo principal
	-----------------------------------------
	*/
	wp_enqueue_style(
		'pccurico-style',
		get_stylesheet_uri(),
		array(),
		PCCURICO_THEME_VERSION
	);

	/*
	-----------------------------------------
	FontAwesome
	-----------------------------------------
	*/
	wp_enqueue_style(
		'pccurico-fontawesome',
		get_template_directory_uri() . '/font-awesome/css/all.css',
		array(),
		'6.7.0'
	);

	/*
	-----------------------------------------
	Owl Carousel
	-----------------------------------------
	*/
	wp_enqueue_style(
		'pccurico-owl-carousel',
		get_template_directory_uri() . '/css/owl.carousel.css',
		array(),
		PCCURICO_THEME_VERSION
	);

	wp_enqueue_script(
		'pccurico-owl-carousel-js',
		get_template_directory_uri() . '/js/owl.carousel.js',
		array( 'jquery' ),
		PCCURICO_THEME_VERSION,
		true
	);

	/*
	-----------------------------------------
	Scripts personalizados
	-----------------------------------------
	*/
	wp_enqueue_script(
		'pccurico-custom',
		get_template_directory_uri() . '/js/custom.js',
		array( 'jquery' ),
		PCCURICO_THEME_VERSION,
		true
	);

	wp_style_add_data( 'pccurico-style', 'rtl', 'replace' );

}

add_action( 'wp_enqueue_scripts', 'pccurico_scripts' );


/**
 * =====================================================
 * ESTILOS DEL EDITOR DE BLOQUES
 * =====================================================
 */

function pccurico_block_editor_styles() {

	wp_enqueue_style(
		'pccurico-block-editor',
		get_theme_file_uri( '/css/block-editor.css' ),
		array(),
		PCCURICO_THEME_VERSION
	);

}

add_action( 'enqueue_block_editor_assets', 'pccurico_block_editor_styles' );


/**
 * =====================================================
 * ARCHIVOS INTERNOS DEL THEME
 * =====================================================
 */

function pccurico_init_setup() {

	/*
	-----------------------------------------
	Customizer
	-----------------------------------------
	*/
	require_once get_theme_file_path( '/inc/customizer.php' );

	/*
	-----------------------------------------
	Block Patterns
	-----------------------------------------
	*/
	require get_template_directory() . '/inc/block-patterns.php';

	/*
	-----------------------------------------
	Elementor Support
	-----------------------------------------
	*/
	require get_template_directory() . '/inc/elementor-support.php';

}

add_action( 'after_setup_theme', 'pccurico_init_setup' );