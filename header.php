<?php
/**
 * Header
 *
 * The header, navigation, and banner image section for the website.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

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
		<a class="skip-link screen-reader-text" href="#main-wrapper"><?php esc_html_e( 'Skip to Main Content', 'wp-boilerplate' ); ?></a>
		<div id="site-wrapper" class="site-wrapper">
			<header id="site-header" class="site-header" role="banner" itemscope itemtype="https://schema.org/WPHeader">
				<div class="site-name">
					<?php the_custom_logo(); ?>
				</div>
				<div class="site-description">
					<?php bloginfo( 'description' ); ?>
				</div>
				<?php get_template_part( 'template-parts/navigation/navigation', 'main' ); ?>
			</header><!-- #site-header -->
