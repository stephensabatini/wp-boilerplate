<?php
/**
 * Template part for displaying site map content in site-map.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

$categories = get_categories();
?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'site-main' ); ?>>
		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			edit_post_link( ' (Edit)' );
			?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<h2><?php esc_html_e( 'Author(s):', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-authors">
				<?php wp_list_authors( 'exclude_admin=1&optioncount=1' ); ?>
			</ul><!-- .sitemap-authors -->
			<h2><?php esc_html_e( 'Pages:', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-pages">
				<?php wp_list_pages(); ?>
			</ul><!-- .sitemap-pages -->
			<h2><?php esc_html_e( 'Archives:', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-archives">
				<?php wp_get_archives( 'type=monthly&show_post_count=true' ); ?>
			</ul><!-- .sitemap-archives -->
			<h2><?php esc_html_e( 'Posts:', 'wp-boilerplate' ); ?></h2>
			<ul>
				<?php foreach ( $categories as $category ) { ?>
				<li class="category">
					<h3>
						<span class="grey"><?php esc_html_e( 'Category:', 'wp-boilerplate' ); ?> </span>
						<?php
						echo esc_html( $category->cat_name );
						edit_term_link( ' (Edit)', '', '', $category );
						?>
					</h3>
					<ul class="cat-posts">
						<?php
						$posts_by_category = new WP_Query(
							array(
								// -1 shows all posts per category. 1 to show most recent post.
								'posts_per_page' => -1,
								'cat'            => $category->cat_ID,
							)
						);

						while ( $posts_by_category->have_posts() ) {
							the_post();
							$post_category = get_the_category();
							if ( $post_category[0]->cat_ID === $category->cat_ID ) {
								?>
								<li>
									<?php the_time( 'M d, Y' ); ?> &raquo;
									<a href="<?php the_permalink(); ?>">
										<?php
										the_title();
										edit_post_link( ' (Edit)' );
										?>
									</a>
									(<?php comments_number( '0', '1', '%' ); ?>)
								</li>
								<?php
							}
						}
						?>
					</ul><!-- .cat-posts -->
				</li><!-- .category -->
				<?php } ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div><!-- .entry-content -->
	</article><!-- .site-main -->
</main><!-- #main-wrapper -->
