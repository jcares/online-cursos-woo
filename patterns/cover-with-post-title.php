<?php
/**
 * Title: Cover With Post Title
 * Slug: pccurico/cover-with-post-title
 * Categories: template
 *
 * =====================================================
 * Hero dinámico para entradas del blog - PCCURICO.CL
 * Compatible con Elementor Pro
 * =====================================================
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png","dimRatio":90,"focalPoint":{"x":0.86,"y":0.16},"minHeight":300,"customGradient":"linear-gradient(90deg,rgb(0,0,0) 30%,rgba(150,149,240,0) 96%)","className":"innerpage-banner"} -->
<div class="wp-block-cover innerpage-banner" style="min-height:300px">

    <!-- Imagen de fondo -->
    <img class="wp-block-cover__image-background" alt="<?php the_title_attribute(); ?> - PCCURICO" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/hero-banner.png" style="object-position:86% 16%" data-object-fit="cover" data-object-position="86% 16%"/>

    <!-- Gradiente -->
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(90deg,rgb(0,0,0) 30%,rgba(150,149,240,0) 96%)"></span>

    <div class="wp-block-cover__inner-container">
        <!-- Contenedor del título -->
        <div class="wp-block-group alignwide">

            <!-- Título del post -->
            <!-- wp:post-title {"textAlign":"center","level":1,"align":"wide","style":{"typography":{"fontSize":"35px","fontStyle":"normal","fontWeight":"700","textTransform":"uppercase"}},"textColor":"foreground"} /-->

            <!-- Subtítulo opcional: fecha y categoría -->
            <!-- wp:post-date {"textAlign":"center","style":{"typography":{"fontSize":"16px"}},"className":"post-meta"} /-->
            <!-- wp:post-terms {"term":"category","textAlign":"center","style":{"typography":{"fontSize":"16px"}},"className":"post-meta"} /-->

        </div>
        <!-- /wp-block-group -->
    </div>
</div>
<!-- /wp:cover -->