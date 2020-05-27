<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */
$text = trim( strip_tags( get_the_content() ) );
$count = preg_match_all( '~\s+~', "$text ", $m );
$read_time = intval( $count / 200 ); // 200 is the average words per minute a human reads.
?>
<article id="post-<?php echo $post->ID; ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta">
            <span class="author"><?php _e( 'By ' ); the_author(); ?></span>
            <span class="published"><time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time></span>
            <span class="read-time"><?php echo $read_time; _e( ' minute read' ); ?></span>
        </div>
    </header>
    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_excerpt( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', BOILERPLATE_TEXT_DOMAIN ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', BOILERPLATE_TEXT_DOMAIN ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );
        ?>
    </div>
    <footer class="entry-footer">
        <?php the_tags( '<div class="tags"><h3 class="screen-reader-text">' . __( 'Tags: ' ) . '</h3>', '', '</div>' ); ?>
    </footer>
</article>
