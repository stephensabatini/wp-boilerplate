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
?>
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/page/content', 'front-page' );
<div id="site-content" class="site-content">
		}
	} else {
		get_template_part( 'template-parts/post/content', 'none' );
	}
	?>
</div><!-- #site-content -->
<?php
get_footer();
