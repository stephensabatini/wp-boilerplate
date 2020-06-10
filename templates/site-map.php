<?php
/**
 * Template Name: Site map template
 *
 * This is the page template for the site map.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page/content', 'site-map' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}
} else {
	get_template_part( 'template-parts/post/content', 'none' );
}

get_sidebar();
get_footer();
