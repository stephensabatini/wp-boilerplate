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
<div id="site-content" class="site-content">
	<main id="site-main" class="site-main" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			}
		} else {
			get_template_part( 'template-parts/post/content', 'none' );
		}
		?>
	</main><!-- #site-main -->
</div><!-- #site-content -->
<?php
get_footer();
