<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */
?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article id="post-<?php echo $post->ID; ?>" <?php post_class( 'site-main' ); ?>>
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', BOILERPLATE_TEXT_DOMAIN ),
			'after'  => '</div>',
		) );
		?>
	</article>
</main>
