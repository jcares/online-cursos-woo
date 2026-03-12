<?php
/**
 * Title: Header Dynamic
 * Slug: online-education-academy/header-dynamic
 * Categories: header
 */
?>

<!-- wp:group {"tagName":"div","className":"header-sec","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"13px","bottom":"13px"}}},"layout":{"type":"constrained","contentSize":"80%","wideSize":"100%"}} -->
<div class="wp-block-group header-sec" style="margin-top:0;margin-bottom:0;padding-top:13px;padding-bottom:13px">

    <!-- wp:columns {"verticalAlignment":"center"} -->
    <div class="wp-block-columns are-vertically-aligned-center">

        <!-- wp:column {"verticalAlignment":"center","width":"25%","className":"logo-box"} -->
        <div class="wp-block-column is-vertically-aligned-center logo-box" style="flex-basis:25%">
            <!-- wp:site-logo /-->
            <!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"typography":{"textTransform":"capitalize","fontSize":"32px","fontWeight":"600"}},"textColor":"foreground","fontFamily":"Outfit"} /-->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"45%","className":"menu-box"} -->
        <div class="wp-block-column is-vertically-aligned-center menu-box" style="flex-basis:45%">
            <!-- wp:navigation {"textColor":"foreground","className":"main-navigation","fontFamily":"Outfit","style":{"typography":{"fontSize":"17px","textTransform":"capitalize","fontWeight":"400"},"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","justifyContent":"center"}} /-->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"verticalAlignment":"center","width":"30%","className":"top-right-col"} -->
        <div class="wp-block-column is-vertically-aligned-center top-right-col" style="flex-basis:30%">

            <!-- wp:group {"layout":{"type":"flex","justifyContent":"right","flexWrap":"nowrap"}} -->
            <div class="wp-block-group" style="display:flex;justify-content:flex-end;flex-wrap:nowrap">

                <!-- wp:search {"label":"Search","showLabel":false,"buttonUseIcon":true,"isSearchFieldHidden":true} /-->

                <!-- wp:buttons {"className":"dashboard-btn"} -->
                <div class="wp-block-buttons dashboard-btn">
                    <!-- wp:button {"textColor":"foreground","className":"is-style-fill","fontFamily":"Outfit"} -->
                    <div class="wp-block-button is-style-fill">
                        <a class="wp-block-button__link has-foreground-color has-text-color has-link-color has-outfit-font-family wp-element-button" href="<?php echo esc_url( home_url('/dashboard') ); ?>">
                            <?php esc_html_e('Dashboard','online-education-academy'); ?>
                        </a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

                <!-- wp:buttons {"className":"login-btn"} -->
                <div class="wp-block-buttons login-btn">
                    <!-- wp:button {"fontFamily":"Outfit"} -->
                    <div class="wp-block-button">
                        <a class="wp-block-button__link has-outfit-font-family wp-element-button" href="<?php echo esc_url( wp_login_url() ); ?>">
                            <?php esc_html_e('Login','online-education-academy'); ?>
                        </a>
                    </div>
                    <!-- /wp:button -->
                </div>
                <!-- /wp:buttons -->

            </div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

</div>
<!-- /wp:group -->