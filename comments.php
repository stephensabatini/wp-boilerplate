<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
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
		<h2 class="comments-title"><?php esc_html_e( 'Comments', 'wp-boilerplate' ); ?></h2>
		<ol class="commentlist">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 74,
				)
			);
			?>
		</ol><!-- .commentlist -->
		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			?>
			<nav class="comment-navigation" role="navigation">
				<h3 class="screen-reader-text"><?php esc_html_e( 'Comment Navigation', 'wp-boilerplate' ); ?></h3>
				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'wp-boilerplate' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'wp-boilerplate' ) ); ?></div>
			</nav><!-- .comment-navigation -->
			<?php
		}
		if ( ! comments_open() && get_comments_number() ) {
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'wp-boilerplate' ); ?></p>
			<?php
		}
	}
	comment_form();
	?>
</div><!-- #comments -->
