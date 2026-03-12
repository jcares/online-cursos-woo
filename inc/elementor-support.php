<?php
/**
 * =====================================================
 * Elementor Support - PCCURICO.CL
 * Soporte para Elementor y Elementor Pro
 * =====================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Habilita soporte para Elementor y áreas de widgets
 */
function pccurico_elementor_support() {

    // Soporte general para Elementor
    add_theme_support( 'elementor' );

    // Contenedor ancho completo
    add_theme_support( 'elementor-wide' );

    // Habilitar compatibilidad con Elementor Pro
    add_theme_support( 'elementor-pro' );

    // Registro de sidebars compatibles con Elementor
    $sidebars = array(
        array(
            'name'          => __( 'Sidebar Blog', 'pccurico' ),
            'id'            => 'sidebar-blog',
            'description'   => __( 'Sidebar principal del blog.', 'pccurico' ),
        ),
        array(
            'name'          => __( 'Sidebar Tienda', 'pccurico' ),
            'id'            => 'sidebar-shop',
            'description'   => __( 'Sidebar principal de la tienda WooCommerce.', 'pccurico' ),
        ),
        array(
            'name'          => __( 'Footer 1', 'pccurico' ),
            'id'            => 'footer-1',
            'description'   => __( 'Primer área de widgets del footer.', 'pccurico' ),
        ),
        array(
            'name'          => __( 'Footer 2', 'pccurico' ),
            'id'            => 'footer-2',
            'description'   => __( 'Segundo área de widgets del footer.', 'pccurico' ),
        ),
        array(
            'name'          => __( 'Footer 3', 'pccurico' ),
            'id'            => 'footer-3',
            'description'   => __( 'Tercer área de widgets del footer.', 'pccurico' ),
        ),
    );

    foreach ( $sidebars as $sidebar ) {
        register_sidebar(
            array(
                'name'          => $sidebar['name'],
                'id'            => $sidebar['id'],
                'description'   => $sidebar['description'],
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }
}

add_action( 'after_setup_theme', 'pccurico_elementor_support' );