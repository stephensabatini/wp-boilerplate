<?php
/**
 * Template part for displaying site map content in site-map.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */
?>
<main id="main-wrapper" class="site-main-wrapper" role="main" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	<article id="post-<?php echo $post->ID; ?>" <?php post_class( 'site-main' ); ?>>
		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
			edit_post_link( ' (Edit )' );
			?>
		</header>
		<div class="entry-content">
			<h2><?php _e( 'Author(s):', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-authors">
				<?php wp_list_authors( 'exclude_admin=1&optioncount=1' ); ?>
			</ul>
			<h2><?php _e( 'Pages:', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-pages">
				<?php
				wp_list_pages(
					array(
						'exclude'  => '',
						'title_li' => '',
					)
				); // Exclude pages by ID
				?>
			</ul>
			<h2><?php _e( 'Archives:', 'wp-boilerplate' ); ?></h2>
			<ul class="sitemap-archives">
				<?php wp_get_archives( 'type=monthly&show_post_count=true' ); ?>
			</ul>
			<h2><?php _e( 'Posts:', 'wp-boilerplate' ); ?></h2>
			<ul>
				<?php
				$categories = get_categories( 'exclude=' ); // Exclude categories by ID
				foreach ( $categories as $cat ) {
				?>
				<li class="category">
					<h3>
						<span class="grey"><?php _e( 'Category:', 'wp-boilerplate' ); ?> </span>
						<?php
						echo $cat->cat_name;
						edit_term_link( ' (Edit)', '', '', $cat );
						?>
					</h3>
					<ul class="cat-posts">
						<?php
						query_posts( 'posts_per_page=-1&cat=' . $cat->cat_ID ); // -1 shows all posts per category. 1 to show most recent post.
						while ( have_posts() ) {
							the_post();
							$category = get_the_category();
							if ( $category[0]->cat_ID === $cat->cat_ID ) {
								$title = get_the_title();
						?>
						<li>
							<?php the_time( 'M d, Y' ); ?> &raquo;
							<a href="<?php the_permalink(); ?>"  title="<?php echo $title; ?>">
								<?php
								echo $title;
								edit_post_link( ' (Edit)' );
								?>
							</a>
							(<?php comments_number( '0', '1', '%' ); ?>)
						</li>
						<?php
							}
						}
						?>
					</ul>
				</li>
				<?php } ?>
			</ul>
			<?php wp_reset_query(); ?>
		</div>
	</article>
</main>
