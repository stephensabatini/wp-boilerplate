<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

?>
<main id="main-wrapper" class="site-main-wrapper" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'site-main no-results not-found' ); ?> itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
		<header class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'wp-boilerplate' ); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
				?>
				<p>
					<?php
					printf(
						/* translators: %s: The URL to the Add New Post page. */
						esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp-boilerplate' ),
						esc_url( admin_url( 'post-new.php' ) )
					);
					?>
				</p>
				<?php
			} else {
				?>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-boilerplate' ); ?></p>
				<?php
				get_search_form();
			}
			?>
		</div><!-- .entry-content -->
	</article><!-- .site-main -->
</main><!-- #main-wrapper -->
