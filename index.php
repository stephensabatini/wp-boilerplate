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
 * @license MIT
 */

get_header();

if ( is_archive() ) {
	the_archive_title( '<h1 class="archive-title">', '</h1>' );
	echo '<p class="archive-description">' . term_description() . '</p>';
}
?>
<div id="content" class="site-content">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/post/excerpt/content', get_post_format() );
		}
		the_posts_pagination();
	} else {
		get_template_part( 'template-parts/post/excerpt/content', 'none' );
	}

	get_sidebar();
	?>
</div>
<?php
get_footer();
