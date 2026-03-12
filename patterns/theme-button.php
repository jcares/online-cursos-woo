<?php
/**
 * Title: Botón del Tema
 * Slug: pccurico/theme-button
 * Categories: pccurico
 * Description: Botón personalizado - pccurico.cl
 */
?>
<!-- wp:buttons -->
<div class="wp-block-buttons theme-button-section">
  <!-- wp:button {"style":{"color":{"background":"var(--wp--preset--color--primary)","text":"#fff"},"typography":{"fontSize":"12px"},"border":{"radius":"30px"}},"className":"theme-button"} -->
  <div class="wp-block-button has-custom-font-size theme-button" style="font-size:12px">
    <a class="wp-block-button__link has-text-color has-background" style="border-radius:30px;background-color:var(--wp--preset--color--primary);color:#fff">
      <?php echo esc_html__('LEER MÁS', 'pccurico'); ?>
    </a>
  </div>
  <!-- /wp:button -->
</div>
<!-- /wp:buttons -->