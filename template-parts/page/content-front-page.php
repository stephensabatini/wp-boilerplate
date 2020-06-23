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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_content(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-boilerplate' ),
			get_the_title()
		)
	);
	?>
</article><!-- .post -->
