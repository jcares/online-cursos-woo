<?php
/**
 * Title: Hidden 404
 * Slug: online-education-academy/hidden-404
 * Categories: template
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"100px","bottom":"100px"}}}} -->
<div class="wp-block-group alignfull" style="padding-top:100px;padding-bottom:100px">

    <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"600","lineHeight":"1","fontSize":"300px","fontFamily":"Outfit"}},"textColor":"foreground"} -->
    <h2 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="font-size:300px;font-style:normal;font-weight:600;line-height:1;font-family:Outfit">
        4<mark style="background-color: rgba(0, 0, 0, 0);color:var(--wp--preset--color--primary)" class="has-inline-color">0</mark>4
    </h2>
    <!-- /wp:heading -->

    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"43px","fontFamily":"Outfit"}},"textColor":"foreground"} -->
    <h1 class="wp-block-heading has-text-align-center has-foreground-color has-text-color" style="font-size:43px;font-family:Outfit">
        <?php echo esc_html__('Page Not Found', 'online-education-academy'); ?>
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px","fontFamily":"Outfit"}}} -->
    <p class="has-text-align-center" style="font-size:18px;font-family:Outfit">
        <?php echo esc_html__('Sorry, the page you are looking for does not exist. You can try a search or go back to the homepage.', 'online-education-academy'); ?>
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search courses, articles...","width":525,"widthUnit":"px","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"align":"center","style":{"border":{"radius":"10px"},"color":{"background":"var(--wp--preset--color--primary)"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"15px","right":"15px"}}},"textColor":"white"} /-->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"30px"}}}} -->
    <div class="wp-block-buttons" style="margin-top:30px">
        <!-- wp:button {"className":"go-home-btn","style":{"typography":{"fontFamily":"Outfit"},"spacing":{"padding":{"top":"10px","bottom":"10px","left":"25px","right":"25px"}}},"textColor":"foreground","backgroundColor":"primary"} -->
        <div class="wp-block-button go-home-btn"><a class="wp-block-button__link has-foreground-color has-text-color has-background has-primary-background-color wp-element-button" href="<?php echo esc_url( home_url() ); ?>">
            <?php esc_html_e('Go to Homepage','online-education-academy'); ?>
        </a></div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

</div>
<!-- /wp:group -->