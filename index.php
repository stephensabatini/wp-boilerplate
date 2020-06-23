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
	the_archive_description( '<div class="archive-description">', '</div>' );
}
?>
<div id="site-content" class="site-content">
	<main id="site-main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
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
		?>
	</main><!-- #site-main -->
	<?php get_sidebar(); ?>
</div><!-- #site-content -->
<?php
get_footer();
