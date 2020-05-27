<?php
/**
 * Blog Index / Main Template File
 *
 * Typically used for the blog index, this is also the default template if no
 * other templates are provided.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/post-template-files/
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

get_header();

if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">','</p>' );
}

if (  is_archive() ) {
    the_archive_title( '<h1 class="archive-title">', '</h1>' );
    echo '<p class="archive-description">'. term_description() . '</p>';
}

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        get_template_part( 'partials/post/excerpt/content', get_post_format() );
    }
    the_posts_pagination();
} else {
    get_template_part( 'partials/post/excerpt/content', 'none' );
}

get_sidebar();
get_footer();
