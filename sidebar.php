<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

if ( ! is_active_sidebar( 'default' ) ) {
	return;
}
?>
<aside id="sidebar" class="sidebar-content widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'wp-boilerplate' ); ?>">
	<?php dynamic_sidebar( 'default' ); ?>
</aside><!-- #sidebar -->
