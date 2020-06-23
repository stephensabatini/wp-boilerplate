<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

namespace Boilerplate\Utilities;

use function Boilerplate\Utilities\get_the_read_time;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
						get_the_read_time()
					)
				);
				?>
			</span><!-- .read-time -->
			<?php the_tags( '<div class="tags"><h3 class="screen-reader-text">' . __( 'Tags: ' ) . '</h3>', '', '</div>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wp-boilerplate' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- .post -->
