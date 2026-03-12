<?php
/**
 * Title: Cover With Archive Title
 * Slug: pccurico/cover-with-archive-title
 * Categories: template
 *
 * =====================================================
 * Cursos Online WordPress - Propiedad de PCCURICO.CL
 * Plataforma de cursos online desarrollada en WordPress
 * Catálogo de cursos basado en WooCommerce
 * Compatible con Elementor Pro
 * =====================================================
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png","dimRatio":90,"focalPoint":{"x":0.86,"y":0.16},"minHeight":300,"customGradient":"linear-gradient(90deg,rgb(0,0,0) 30%,rgba(150,149,240,0) 96%)","className":"innerpage-banner"} -->
<div class="wp-block-cover innerpage-banner" style="min-height:300px">
    <img class="wp-block-cover__image-background" alt="Banner PCCURICO" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png" style="object-position:86% 16%;" data-object-fit="cover" data-object-position="86% 16%"/>
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(90deg,rgb(0,0,0) 30%,rgba(150,149,240,0) 96%)"></span>
    <div class="wp-block-cover__inner-container">

        <!-- Contenedor del título -->
        <div class="wp-block-group alignwide">

            <!-- Título dinámico de archivo -->
            <!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

            <!-- Subtítulo opcional (mejora UX y SEO) -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"}},"className":"archive-subtitle"} -->
            <p class="has-text-align-center archive-subtitle" style="font-size:18px">
                Explora nuestro catálogo completo de cursos online desarrollados por PCCURICO.
            </p>
            <!-- /wp:paragraph -->

        </div>
        <!-- /wp-block-group -->

    </div>
</div>
<!-- /wp:cover -->