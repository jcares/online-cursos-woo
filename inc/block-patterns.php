<?php
/**
 * =====================================================
 * Block Patterns del Theme - PCCURICO.CL
 * =====================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registrando patrones de bloques
 */
function pccurico_register_block_patterns() {

    if ( function_exists( 'register_block_pattern' ) ) {

        // Home Banner / Hero
        register_block_pattern(
            'pccurico/home-banner',
            array(
                'title'       => __( 'Home Banner', 'pccurico' ),
                'description' => _x( 'Sección de portada principal', 'Block pattern description', 'pccurico' ),
                'content'     => '<!-- wp:group {"className":"pccurico-hero"} --><div class="wp-block-group pccurico-hero"><!-- wp:heading {"textAlign":"center"} --><h1 class="has-text-align-center">Cursos Online Profesionales</h1><!-- /wp:heading --><!-- wp:paragraph {"align":"center"} --><p class="has-text-align-center">Aprende nuevas habilidades desde cualquier lugar con nuestros cursos online certificados.</p><!-- /wp:paragraph --><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link" href="/cursos">Ver Cursos</a></div><!-- /wp:button --><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link" href="/mi-cuenta">Acceder a la Plataforma</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->',
            )
        );

        // Featured Courses
        register_block_pattern(
            'pccurico/featured-courses',
            array(
                'title'       => __( 'Cursos Destacados', 'pccurico' ),
                'description' => _x( 'Sección de cursos más populares', 'Block pattern description', 'pccurico' ),
                'content'     => '<!-- wp:shortcode -->[products limit="8" columns="4"]<!-- /wp:shortcode -->',
            )
        );

        // Estadísticas
        register_block_pattern(
            'pccurico/statistics',
            array(
                'title'       => __( 'Estadísticas', 'pccurico' ),
                'description' => _x( 'Sección de números y métricas', 'Block pattern description', 'pccurico' ),
                'content'     => '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><h3 class="has-text-align-center">Cursos</h3><p class="has-text-align-center">Disponibles</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><h3 class="has-text-align-center">Estudiantes</h3><p class="has-text-align-center">Inscritos</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><h3 class="has-text-align-center">Certificaciones</h3><p class="has-text-align-center">Emitidas</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><h3 class="has-text-align-center">Clases</h3><p class="has-text-align-center">Online</p></div><!-- /wp:column --></div><!-- /wp:columns -->',
            )
        );

        // Blog / Noticias
        register_block_pattern(
            'pccurico/blog-section',
            array(
                'title'       => __( 'Blog / Noticias', 'pccurico' ),
                'description' => _x( 'Listado de artículos recientes', 'Block pattern description', 'pccurico' ),
                'content'     => '<!-- wp:query {"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date"}} --><div class="wp-block-query"><!-- wp:post-template --><div class="wp-block-group"><!-- wp:post-featured-image /--><!-- wp:post-title {"isLink":true} /--><!-- wp:post-date /--><!-- wp:post-excerpt {"moreText":"Leer más"} /--></div><!-- /wp:post-template --></div><!-- /wp:query -->',
            )
        );

        // CTA Botón
        register_block_pattern(
            'pccurico/cta-buttons',
            array(
                'title'       => __( 'CTA Botones', 'pccurico' ),
                'description' => _x( 'Botones de llamada a la acción', 'Block pattern description', 'pccurico' ),
                'content'     => '<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link" href="/cursos">Ver Cursos</a></div><!-- /wp:button --><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link" href="/mi-cuenta">Acceder a la Plataforma</a></div><!-- /wp:button --></div><!-- /wp:buttons -->',
            )
        );
    }
}

add_action( 'init', 'pccurico_register_block_patterns' );