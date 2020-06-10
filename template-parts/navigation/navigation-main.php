<?php
/**
 * Displays main navigation
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

if ( ! has_nav_menu( 'main-navigation' ) ) {
	return;
}
?>
<nav id="main-navigation-wrapper" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Main', 'wp-boilerplate' ); ?>">
	<button id="main-navigation-toggle" class="main-navigation-toggle" aria-label="<?php esc_attr_e( 'Open Navigation', 'wp-boilerplate' ); ?>" aria-controls="main-navigation" aria-expanded="false">
		<span aria-hidden="true">&#9776;</span>
	</button><!-- #main-navigation-toggle -->
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'main-navigation',
			'menu_id'        => 'main-navigation',
			'container'      => '',
		)
	);
	?>
</nav><!-- #main-navigation-wrapper -->
