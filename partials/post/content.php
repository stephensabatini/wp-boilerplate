<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */
$text      = trim( strip_tags( get_the_content() ) );
$count     = preg_match_all( '~\s+~', "$text ", $m );
$read_time = intval( $count / 200 ); // 200 is the average words per minute a human reads.
$permalink = urlencode( get_permalink() );
?>
<main id="site-main" class="site-main col" role="main">
	<article id="post-<?php echo $post->ID; ?>" <?php post_class(); ?> itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
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
				_e( 'By ' );
				the_author();
				?>
				</span>
				<span class="published"><time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span>
				<span class="read-time">
				<?php
				echo $read_time;
				_e( ' minute read' );
				?>
				</span>
				<span class="share">Share on <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ); ?>&amp;url=<?php echo $permalink; ?>">Twitter</a> or <a href="https://cats.smashing.services/ball?uri=//www.linkedin.com/shareArticle?url=<?php echo $permalink; ?>&amp;title=<?php echo urlencode( get_the_title() ); ?>">LinkedIn</a></span>
				<?php the_tags( '<div class="tags"><h3 class="screen-reader-text">' . __( 'Tags: ' ) . '</h3>', '', '</div>' ); ?>
			</div>
		</header>
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
