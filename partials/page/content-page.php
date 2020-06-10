<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license GPL, or GNU General Public License, version 2
 * @license MIT
 */
?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article id="post-<?php echo $post->ID; ?>" <?php post_class( 'site-main' ); ?>>
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wp-boilerplate' ),
				'after'  => '</div>',
			)
		);
		?>
	</article>
</main>
