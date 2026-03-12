<?php
/**
 * Title: Latest Blog Section Advanced
 * Slug: online-education-academy/latest-blog-section-advanced
 * Categories: template
 */
?>

<!-- wp:group {"className":"blog-section-advanced","style":{"spacing":{"margin":{"top":"5em","bottom":"5em"},"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group blog-section-advanced" style="margin-top:5em;margin-bottom:5em;padding-top:0;padding-bottom:0">

  <!-- Título de la sección -->
  <h3 class="wp-block-heading has-text-align-center has-outfit-font-family" style="font-size:37px">
    <?php esc_html_e('Our Blog','online-education-academy'); ?>
  </h3>
  <p class="has-text-align-center blog-short-title has-text-color has-link-color has-outfit-font-family" style="color:#324054;font-size:14px;margin-bottom:2em">
    <?php esc_html_e('NEWS & BLOG Lorem Ipsum is simply dummy text of the printing and typesetting industry.','online-education-academy'); ?>
  </p>

  <!-- Query de posts -->
  <!-- wp:query {"queryId":61,"query":{"perPage":6,"postType":"post","order":"desc","orderBy":"date"},"layout":{"type":"grid","columnCount":3}} -->
  <div class="wp-block-query">
    <!-- wp:post-template {"className":"blog-post-item-advanced","style":{"spacing":{"padding":{"top":"0","bottom":"0"}},"typography":{"fontStyle":"ExtraLight","fontWeight":"400","fontSize":"16px"}},"fontFamily":"Outfit"} -->

    <div class="wp-block-group blog-post-item-advanced wow fadeInUp" style="position:relative;padding:0;margin-bottom:2em;border-radius:15px;overflow:hidden">

      <!-- Imagen destacada con overlay y categoría -->
      <div class="wp-block-group blog-img-advanced" style="position:relative;overflow:hidden">
        <!-- wp:post-featured-image {"width":"100%","height":"250px","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"0","bottomRight":"0"}}}} /-->

        <!-- Categoría sobre la imagen -->
        <div class="blog-category-overlay" style="position:absolute;top:15px;left:15px;background:rgba(0,0,0,0.7);color:#fff;padding:5px 10px;border-radius:5px;font-size:12px;text-transform:uppercase;">
          <?php
            $categories = get_the_category();
            if($categories) { echo esc_html($categories[0]->name); }
          ?>
        </div>

        <!-- Hover overlay efecto -->
        <div class="blog-hover-overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.2);opacity:0;transition:all 0.3s ease-in-out;"></div>
      </div>

      <!-- Título del post -->
      <!-- wp:post-title {"isLink":true,"style":{"typography":{"textTransform":"capitalize","fontSize":"24px","fontStyle":"Thin","fontWeight":"600"}},"fontFamily":"Outfit"} /-->

      <!-- Extracto del post -->
      <!-- wp:post-excerpt {"style":{"typography":{"fontSize":"15px","fontStyle":"Light","fontWeight":"400"},"spacing":{"padding":{"top":"7px"}}},"fontFamily":"Outfit"} /-->

    </div>
    <!-- /wp:post-template -->
  </div>
  <!-- /wp:query -->

  <!-- Botón Ver todos los blogs -->
  <div class="wp-block-buttons" style="justify-content:center;margin-top:2em">
    <!-- wp:button {"className":"view-more-blog-advanced","fontFamily":"Outfit"} -->
    <div class="wp-block-button view-more-blog-advanced">
      <a href="<?php echo esc_url(get_permalink( get_option('page_for_posts') )); ?>" class="wp-block-button__link has-outfit-font-family wp-element-button">
        <?php esc_html_e('View All Blogs','online-education-academy'); ?>
      </a>
    </div>
    <!-- /wp:button -->
  </div>

</div>
<!-- /wp:group -->

<!-- CSS para hover, zoom y overlay -->
<style>
.blog-post-item-advanced .blog-img-advanced img {
  transition: transform 0.3s ease;
}
.blog-post-item-advanced .blog-img-advanced:hover img {
  transform: scale(1.05);
}
.blog-post-item-advanced .blog-img-advanced:hover .blog-hover-overlay {
  opacity:1;
}
.view-more-blog-advanced a {
  background: linear-gradient(90deg, var(--wp--preset--color--quaternary), var(--wp--preset--color--tertiary));
  color:#fff;
  padding:12px 30px;
  border-radius:50px;
  text-transform:uppercase;
  font-weight:600;
  transition: all 0.3s ease;
}
.view-more-blog-advanced a:hover {
  opacity:0.85;
}
</style>

<!-- JS para animaciones y slider opcional -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>new WOW().init();</script>