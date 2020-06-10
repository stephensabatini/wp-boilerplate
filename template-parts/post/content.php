<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

$text      = trim( wp_strip_all_tags( get_the_content() ) );
$count     = preg_match_all( '~\s+~', "$text ", $m );
$read_time = intval( $count / 200 ); // 200 is the average words per minute a human reads.
?>
<main id="main-wrapper" class="site-main-wrapper" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'site-main' ); ?> itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
		<header class="entry-header">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs" class="breadcrumbs">', '</p>' );
			}
			the_title( '<h1 class="entry-title"><span>', '</span></h1>' );
			?>
			<div class="entry-meta">
				<span class="author">
					<?php
					printf(
						/* translators: %s: The author's display name */
						esc_html__( 'By %s', 'wp-boilerplate' ),
						get_the_author()
					);
					?>
				</span><!-- .author -->
				<span class="published">
					<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished">
						<?php echo get_the_date(); ?>
					</time>
				</span><!-- .published -->
				<span class="read-time">
					<?php
					echo esc_html(
						sprintf(
							/* translators: %s: Number of minutes it takes to read this post */
							__( '%s minute read', 'wp-boilerplate' ),
							$read_time
						)
					);
					?>
				</span><!-- .read-time -->
				<?php the_tags( '<div class="tags"><h3 class="screen-reader-text">' . __( 'Tags: ' ) . '</h3>', '', '</div>' ); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wp-boilerplate' ),
				'after'  => '</div>',
			)
		);
		?>
	</article><!-- .site-main -->
</main><!-- #main-wrapper -->
