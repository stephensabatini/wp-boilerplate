<?php
/**
 * Displays content for front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license GPL, or GNU General Public License, version 2
 * @license MIT
 */
?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article class="site-main">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'stephensabatini' ),
				get_the_title()
			)
		);
		?>
	</article>
</main>
