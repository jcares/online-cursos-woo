<?php
/**
 * Title: Feature Post Column
 * Slug: pccurico/feature-post-column
 * Categories: template
 *
 * =====================================================
 * Sección de noticias destacadas para PCCURICO.CL
 * Lados: Últimos y populares
 * Centro: Post destacado dinámico
 * =====================================================
 */
?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"30px"}}},"layout":{"inherit":true}} -->
<div class="wp-block-group alignwide" style="padding-bottom: 30px">

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">

		<!-- Columna izquierda: Popular News -->
		<div class="wp-block-column" style="flex-basis: 25%">
			<div class="wp-block-group has-no-hover-shadow-dark animated animated-fadeInUp has-background-background-color has-background" style="padding:0;">
				<div class="wp-block-group has-foreground-background-color has-background" style="padding:10px 10px 10px 40px;margin:0;">
					<h3 class="has-background-color has-text-color" style="margin:0;">
						<?php echo esc_html__('Popular News', 'pccurico'); ?>
					</h3>
				</div>

				<div class="wp-block-group" style="padding:30px;">
					<!-- wp:latest-posts {"postsToShow":4,"excerptLength":10,"displayAuthor":true,"displayDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":100,"featuredImageSizeHeight":113} /-->
				</div>
			</div>
		</div>

		<!-- Columna central: Post destacado -->
		<div class="wp-block-column" style="flex-basis:50%">
			<?php
			$featured = new WP_Query([
				'posts_per_page' => 1,
				'meta_key' => 'featured_post',
				'meta_value' => '1',
			]);
			if ( $featured->have_posts() ) :
				while ( $featured->have_posts() ) : $featured->the_post();
			?>
			<!-- wp:cover {"url":"<?php echo esc_url( get_the_post_thumbnail_url() ); ?>","id":<?php the_ID(); ?>,"dimRatio":0,"minHeight":585,"contentPosition":"bottom center"} -->
			<div class="wp-block-cover is-light has-custom-content-position is-position-bottom-center has-no-hover-shadow-dark animated animated-fadeInUp" style="min-height:585px">
				<img class="wp-block-cover__image-background" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" style="object-position:50% 50%;" data-object-fit="cover" data-object-position="50% 50%"/>
				<div class="wp-block-cover__inner-container">
					<h2 class="has-text-align-center has-foreground-background-color has-background" style="font-size:1.2rem">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h2>
				</div>
			</div>
			<!-- /wp:cover -->
			<?php
				endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>

		<!-- Columna derecha: Recent News -->
		<div class="wp-block-column" style="flex-basis: 25%">
			<div class="wp-block-group has-no-hover-shadow-dark animated animated-fadeInUp has-background-background-color has-background" style="padding:0;">
				<div class="wp-block-group" style="background-color:#171616;padding:10px 10px 10px 40px;margin:0;">
					<h3 class="has-background-color has-text-color" style="margin:0;">
						<?php echo esc_html__('Recent News', 'pccurico'); ?>
					</h3>
				</div>

				<div class="wp-block-group" style="padding:30px;">
					<!-- wp:latest-posts {"postsToShow":4,"excerptLength":10,"displayAuthor":true,"displayDate":true,"displayFeaturedImage":true,"featuredImageAlign":"left","featuredImageSizeWidth":100,"featuredImageSizeHeight":113} /-->
				</div>
			</div>
		</div>

	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->