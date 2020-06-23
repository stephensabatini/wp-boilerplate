<?php
/**
 * Page Template
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
<div id="site-content" class="site-content">
	<main id="site-main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}

			posts_nav_link( ' — ', '« Previous Page', 'Next Page »' );
		} else {
			get_template_part( 'template-parts/post/content', 'none' );
		}
		?>
	</main><!-- #site-main -->
	<?php get_sidebar(); ?>
</div><!-- #site-content -->
<?php
get_footer();
