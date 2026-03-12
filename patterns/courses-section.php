<?php
/**
 * Title: Hero Banner con Título de Archivo
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

<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png","dimRatio":80,"focalPoint":{"x":0.5,"y":0.5},"minHeight":400,"className":"innerpage-banner"} -->
<div class="wp-block-cover innerpage-banner" style="min-height:400px">
    <img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png" style="object-fit:cover; object-position:50% 50%;"/>
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim-80"></span>
    <div class="wp-block-cover__inner-container">

        <!-- Contenedor del título -->
        <!-- wp:group {"align":"wide","layout":{"inherit":true,"type":"constrained"}} -->
        <div class="wp-block-group alignwide">

            <!-- Título del archivo dinámico -->
            <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"48px"}},"className":"archive-title"} -->
            <h1 class="wp-block-heading has-text-align-center archive-title" style="font-size:48px">
                <?php
                    if (is_post_type_archive('courses')) {
                        // Título específico para cursos PCCURICO
                        esc_html_e('Todos los Cursos Online', 'pccurico');
                    } elseif (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        the_author();
                    } elseif (is_archive()) {
                        the_archive_title();
                    }
                ?>
            </h1>
            <!-- /wp:heading -->

            <!-- Subtítulo opcional -->
            <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"20px"}},"className":"archive-subtitle"} -->
            <p class="has-text-align-center archive-subtitle" style="font-size:20px">
                <?php esc_html_e('Explora nuestro catálogo completo de cursos online, diseñados para impulsar tu carrera.', 'pccurico'); ?>
            </p>
            <!-- /wp:paragraph -->

        </div>
        <!-- /wp:group -->

    </div>
</div>
<!-- /wp:cover -->