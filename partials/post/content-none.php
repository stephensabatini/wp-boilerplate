<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

?>
<main id="site-main" class="site-main col" role="main">
    <article id="post-<?php echo $post->ID; ?>" <?php post_class( 'no-results not-found' ); ?> itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">

        <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Nothing Found', BOILERPLATE_TEXT_DOMAIN ); ?></h1>
        </header>
        <div class="entry-content">
            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
            ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', BOILERPLATE_TEXT_DOMAIN ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
            <?php
            } else {
            ?>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', BOILERPLATE_TEXT_DOMAIN ); ?></p>
            <?php
                get_search_form();
            }
            ?>
        </div>
    </article>
</main>
