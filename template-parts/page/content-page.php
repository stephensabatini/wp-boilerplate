<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_title( '<h1>', '</h1>' );
	the_content();
	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'wp-boilerplate' ),
			'after'  => '</div>',
		)
	);
	?>
</article><!-- .post -->
