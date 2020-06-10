<?php
/**
 * Front Page Template
 *
 * This is the default template for all pages.
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
		get_template_part( 'partials/page/content', 'front-page' );
	}
} else {
	get_template_part( 'partials/post/content', 'none' );
}

get_footer();
