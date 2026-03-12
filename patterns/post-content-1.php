<?php
/**
 * Title: Contenido del Post 1
 * Slug: pccurico/post-content-1
 * Categories: template
 * Description: Contenido del post - pccurico.cl
 */
?>
<!-- wp:group {"tagName":"main","layout":{"inherit":true}} -->
<main class="wp-block-group">
	<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group">
		<!-- wp:post-featured-image {"align":"wide","style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} /-->

		<!-- wp:group {"align":"wide","layout":{"type":"flex","allowOrientation":false,"justifyContent":"left","flexWrap":"wrap"}} -->
		<div class="wp-block-group alignwide">
			<!-- Autor del post -->
			<!-- wp:post-author {"showBio":false} /-->

			<!-- Fecha de publicación -->
			<!-- wp:post-date /-->
		</div>
		<!-- /wp:group -->

		<!-- Separador ancho -->
		<!-- wp:separator {"opacity":"css","className":"alignwide is-style-wide"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"5px"} /-->

	<!-- Contenido principal del post -->
	<!-- wp:post-content {"layout":{"inherit":true}} /-->

	<!-- wp:spacer {"height":"5px"} /-->

	<!-- Categorías y etiquetas -->
	<!-- wp:group {"layout":{"inherit":true}} -->
	<div class="wp-block-group">
		<!-- wp:group {"align":"wide","layout":{"type":"flex"}} -->
		<div class="wp-block-group alignwide">
			<!-- Categorías del post -->
			<!-- wp:post-terms {"term":"category","fontSize":"small","style":{"typography":{"fontSize":"14px"}}} /-->

			<!-- Etiquetas del post -->
			<!-- wp:post-terms {"term":"post_tag","fontSize":"small","style":{"typography":{"fontSize":"14px"}}} /-->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"7px"} /-->

	<!-- Sección de comentarios (versión Pro compatible) -->
	<!-- wp:pattern {"slug":"pccurico/comment-section-1"} /-->
</main>
<!-- /wp:group -->