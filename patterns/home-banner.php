<?php
/**
 * Title: Home Banner Dynamic
 * Slug: online-education-academy/home-banner-dynamic
 * Categories: template
 */
?>

<!-- wp:group {"className":"main-banner-sec","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group main-banner-sec" style="margin-top:0;margin-bottom:0">
    <!-- wp:cover {"url":"<?php echo esc_url(get_template_directory_uri() . '/images/slider-cover.png'); ?>","dimRatio":50,"customOverlayColor":"#f2eef4","isDark":false,"minHeight":700,"className":"slider-cover"} -->
    <div class="wp-block-cover is-light slider-cover" style="min-height:700px">
        <img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-cover.png'); ?>" data-object-fit="cover"/>
        <span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#f2eef4"></span>
        <div class="wp-block-cover__inner-container">
            
            <!-- wp:columns {"className":"slider-main-col"} -->
            <div class="wp-block-columns slider-main-col">

                <!-- Left Column: Text -->
                <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
                    <!-- wp:group {"className":"slider-top-wrap"} -->
                    <div class="wp-block-group slider-top-wrap">
                        <!-- wp:html -->
                        <i class="fas fa-graduation-cap" aria-hidden="true"></i>
                        <!-- /wp:html -->
                        <!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontSize":"17px"}},"fontFamily":"Outfit"} -->
                        <p class="has-outfit-font-family" style="font-size:17px;text-transform:uppercase">
                            <?php esc_html_e('WELCOME TO LMS EDUCATION THEME','online-education-academy'); ?>
                        </p>
                        <!-- /wp:paragraph -->
                    </div>
                    <!-- /wp:group -->

                    <!-- wp:heading {"style":{"typography":{"fontSize":"42px","fontWeight":"700"}},"fontFamily":"Outfit"} -->
                    <h2 class="has-outfit-font-family" style="font-size:42px;font-weight:700">
                        <?php esc_html_e('Best Learning','online-education-academy'); ?> 
                        <mark style="background-image: linear-gradient(90deg,var(--wp--preset--color--quaternary) 0%,var(--wp--preset--color--tertiary) 50%,var(--wp--preset--color--fifth) 100%);-webkit-background-clip:text;background-clip:text;color:transparent;">
                            <?php esc_html_e('Platform That Takes','online-education-academy'); ?>
                        </mark> 
                        <?php esc_html_e('You Next Level','online-education-academy'); ?>
                    </h2>
                    <!-- /wp:heading -->

                    <!-- wp:paragraph {"style":{"typography":{"fontSize":"17px"}},"fontFamily":"Outfit"} -->
                    <p class="slider-details has-outfit-font-family" style="font-size:17px">
                        <?php esc_html_e('It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.','online-education-academy'); ?>
                    </p>
                    <!-- /wp:paragraph -->

                    <!-- wp:buttons -->
                    <div class="wp-block-buttons main-slider-btn">
                        <!-- wp:button {"className":"slider-btn1","fontFamily":"Outfit"} -->
                        <div class="wp-block-button slider-btn1">
                            <a href="#" class="wp-block-button__link has-outfit-font-family wp-element-button">
                                <?php esc_html_e('Explore Courses','online-education-academy'); ?>
                            </a>
                        </div>
                        <!-- /wp:button -->

                        <!-- wp:button {"className":"slider-btn2","fontFamily":"Outfit"} -->
                        <div class="wp-block-button slider-btn2">
                            <a href="#" class="wp-block-button__link has-outfit-font-family wp-element-button">
                                <?php esc_html_e('Become an Instructor','online-education-academy'); ?>
                            </a>
                        </div>
                        <!-- /wp:button -->
                    </div>
                    <!-- /wp:buttons -->

                </div>
                <!-- /wp:column -->

                <!-- Right Column: Image + Stats -->
                <div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%">
                    <!-- wp:image {"id":1855,"width":"auto","height":"600px","sizeSlug":"full","align":"center","className":"slider-main-img"} -->
                    <figure class="wp-block-image aligncenter size-full is-resized slider-main-img">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/images/slider-img.png'); ?>" alt="" style="width:auto;height:600px"/>
                    </figure>
                    <!-- /wp:image -->

                    <!-- Stats Boxes -->
                    <div class="wp-block-group courses-box has-background-background-color has-background">
                        <i class="fas fa-book-reader"></i>
                        <p class="courses-count has-outfit-font-family" style="font-size:20px;font-weight:600">
                            <?php esc_html_e('160+','online-education-academy'); ?>
                        </p>
                        <p class="courses-text has-outfit-font-family" style="font-size:15px;font-weight:300">
                            <?php esc_html_e('Available Courses','online-education-academy'); ?>
                        </p>
                    </div>

                    <div class="wp-block-group happy-client-box has-background-background-color has-background">
                        <p class="happy-client-count has-outfit-font-family" style="font-size:22px;font-weight:600">
                            <?php esc_html_e('205k+','online-education-academy'); ?>
                        </p>
                        <p class="happy-client-text has-outfit-font-family" style="font-size:16px;font-weight:300;text-transform:capitalize">
                            <?php esc_html_e('Happy Clients','online-education-academy'); ?>
                        </p>
                        <div class="happy-client-img">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/happy-client1.png'); ?>" style="width:50px;height:50px;border-radius:50%" />
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/happy-client2.png'); ?>" style="width:50px;height:50px;border-radius:50%" />
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/happy-client3.png'); ?>" style="width:50px;height:50px;border-radius:50%" />
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/happy-client4.png'); ?>" style="width:50px;height:50px;border-radius:50%" />
                        </div>
                    </div>
                </div>
                <!-- /wp:column -->

            </div>
            <!-- /wp:columns -->
        </div>
    </div>
    <!-- /wp:cover -->
</div>
<!-- /wp:group -->