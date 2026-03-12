<?php
/**
 * Title: Footer Dynamic PCCURICO
 * Slug: pccurico/footer-dynamic
 * Categories: footer
 */
?>

<div class="wp-block-group footer-section has-quaternary-background-color has-background" style="margin:0;padding:20px 0;" role="contentinfo">

    <!-- wp:columns -->
    <div class="wp-block-columns">

        <!-- About Us -->
        <div class="wp-block-column footer-box" style="flex-basis:33.33%;padding:0;">
            <h3 class="has-outfit-font-family" style="font-size:27px;text-transform:capitalize;">
                <?php esc_html_e('About Us','pccurico'); ?>
            </h3>
            <p class="has-outfit-font-family" style="font-size:14px;line-height:1.5;">
                <?php
                    $about_us = get_theme_mod('pccurico_about_us_text', 'PCCURICO.CL is the official platform for online courses in Chile.');
                    echo esc_html($about_us);
                ?>
            </p>
        </div>

        <!-- Useful Links -->
        <div class="wp-block-column footer-box" style="flex-basis:33.33%;">
            <h3 class="has-outfit-font-family" style="font-size:27px;text-transform:capitalize;">
                <?php esc_html_e('Useful Links','pccurico'); ?>
            </h3>
            <?php
            if ( has_nav_menu( 'footer' ) ) {
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-links',
                    'container'      => false,
                    'depth'          => 1,
                ));
            } else {
                echo '<p><a href="#">' . esc_html__('No menu set','pccurico') . '</a></p>';
            }
            ?>
        </div>

        <!-- Social Media -->
        <div class="wp-block-column footer-box" style="flex-basis:33.33%;">
            <h3 class="has-outfit-font-family" style="font-size:27px;text-transform:capitalize;">
                <?php esc_html_e('Social Media','pccurico'); ?>
            </h3>
            <ul class="wp-block-social-links is-style-pill-shape">
                <?php
                $social_networks = array(
                    'facebook'  => get_theme_mod('pccurico_facebook', ''),
                    'instagram' => get_theme_mod('pccurico_instagram', ''),
                    'twitter'   => get_theme_mod('pccurico_twitter', ''),
                    'youtube'   => get_theme_mod('pccurico_youtube', ''),
                    'whatsapp'  => get_theme_mod('pccurico_whatsapp', ''),
                );

                foreach($social_networks as $network => $url) {
                    if( !empty($url) ) {
                        echo '<li><a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( ucfirst($network) ) . '">' . esc_html( ucfirst($network) ) . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /wp:columns -->

    <!-- Contact Info -->
    <div class="wp-block-columns">
        <div class="wp-block-column footer-box" style="flex-basis:33.33%;">
            <h3 class="has-outfit-font-family" style="font-size:27px;"><?php esc_html_e('Contact Info','pccurico'); ?></h3>
            <?php if ($email = get_theme_mod('pccurico_contact_email')) : ?>
                <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
            <?php endif; ?>
            <?php if ($phone = get_theme_mod('pccurico_contact_phone')) : ?>
                <p><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></p>
            <?php endif; ?>
            <?php if ($address = get_theme_mod('pccurico_contact_address')) : ?>
                <p><?php echo esc_html($address); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Copyright -->
    <div class="wp-block-columns copyright-section">
        <div class="wp-block-column" style="flex-basis:100%;">
            <p class="has-text-align-center" style="font-size:15px;padding:10px 22px;border-radius:5px;">
                <a href="https://pccurico.cl" target="_blank" rel="noopener noreferrer">
                    &copy; <?php echo date('Y'); ?> <strong>PCCURICO.CL</strong> <?php esc_html_e('All Rights Reserved','pccurico'); ?>
                </a>
            </p>
        </div>
    </div>

    <!-- Scroll to top -->
    <div class="wp-block-buttons" style="justify-content:flex-end;">
        <div class="wp-block-button scroll-top-box">
            <a class="wp-block-button__link wp-element-button" href="#" style="padding:0;">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/scroll-top.png'); ?>" alt="<?php esc_attr_e('Scroll to top','pccurico'); ?>" style="width:20px;">
            </a>
        </div>
    </div>

</div>