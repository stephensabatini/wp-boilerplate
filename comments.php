<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) {
    ?>
    <h2 class="comments-title"><span>Comments</span></h2>
    <ol class="commentlist">
        <?php
        wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 74,
        ) );
        ?>
    </ol>
    <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h2 class="section-heading screen-reader-text"><?php _e( 'Comment Navigation', BOILERPLATE_TEXT_DOMAIN ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', BOILERPLATE_TEXT_DOMAIN ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', BOILERPLATE_TEXT_DOMAIN ) ); ?></div>
    </nav>
    <?php
        }
        if ( ! comments_open() && get_comments_number() ) {
    ?>
    <p class="no-comments"><?php _e( 'Comments are closed.' , BOILERPLATE_TEXT_DOMAIN ); ?></p>
    <?php
        }
    }
    comment_form();
    ?>
</div>
