<?php
/**
 * Header
 *
 * The header, navigation, and banner image section for the website.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */
$is_front_page = is_front_page();

if ( is_single() || is_archive() ) {
	$heading_tag = 'div';
	$post_id = get_option('page_for_posts', true);
} else {
	$heading_tag = 'h1';
	$post_id = get_queried_object_id();
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg" itemscope="" itemtype="https://schema.org/WebPage">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link" href="#main-wrapper"><?php _e( 'Skip to Main Content', BOILERPLATE_TEXT_DOMAIN ); ?></a>
		<div id="wrapper" class="site-wrapper">
			<header id="header" class="site-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
				<?php
				if ( $is_front_page ) {
				?>
				<h1 class="site-name"><?php bloginfo('name'); ?></h1>
				<div class="site-description"><?php bloginfo('description'); ?></div>
				<?php
				} else {
				?>
				<<?php echo $heading_tag; ?> class="site-name"><?php echo get_the_title( $post_id ); ?></<?php echo $heading_tag; ?>>
				<?php
				}
				get_template_part( 'partials/navigation/navigation', 'main' );
				?>
			</header>
