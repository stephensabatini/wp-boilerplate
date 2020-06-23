<?php
/**
 * Displays content for front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article class="site-main">
		<?php
		the_content(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-boilerplate' ),
				get_the_title()
			)
		);
		?>
	</article><!-- .site-main -->
</main><!-- #main-wrapper -->
