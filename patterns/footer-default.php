<?php
/**
 * Title: Footer Dynamic PCCURICO
 * Slug: pccurico/footer-dynamic
 * Categories: footer
 */
?>

<!-- wp:group {"className":"footer-section"} -->
<div class="wp-block-group footer-section has-quaternary-background-color has-background" style="margin:0;padding:20px 0;" role="contentinfo">

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column footer-box">

<h3 class="has-outfit-font-family" style="font-size:27px;">
<?php esc_html_e('About Us','pccurico'); ?>
</h3>

<p class="has-outfit-font-family">
<?php
$about_us = get_theme_mod('pccurico_about_us_text','PCCURICO.CL is the official platform for online courses in Chile.');
echo esc_html($about_us);
?>
</p>

</div>
<!-- /wp:column -->



<!-- wp:column -->
<div class="wp-block-column footer-box">

<h3 class="has-outfit-font-family">
<?php esc_html_e('Useful Links','pccurico'); ?>
</h3>

<?php
if (has_nav_menu('footer')) {
wp_nav_menu([
'theme_location'=>'footer',
'menu_class'=>'footer-links',
'container'=>false,
'depth'=>1
]);
}
?>

</div>
<!-- /wp:column -->



<!-- wp:column -->
<div class="wp-block-column footer-box">

<h3 class="has-outfit-font-family">
<?php esc_html_e('Social Media','pccurico'); ?>
</h3>

<ul class="wp-block-social-links">

<?php
$social_networks = [
'facebook'=>get_theme_mod('pccurico_facebook',''),
'instagram'=>get_theme_mod('pccurico_instagram',''),
'twitter'=>get_theme_mod('pccurico_twitter',''),
'youtube'=>get_theme_mod('pccurico_youtube',''),
];

foreach($social_networks as $network=>$url){
if(!empty($url)){
echo '<li><a href="'.esc_url($url).'" target="_blank">'.esc_html(ucfirst($network)).'</a></li>';
}
}
?>

</ul>

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->



<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

<p class="has-text-align-center">
© <?php echo date('Y'); ?> PCCURICO.CL
</p>

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->