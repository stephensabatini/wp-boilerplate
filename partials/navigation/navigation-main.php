<?php
/**
 * Displays main navigation
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

if ( ! has_nav_menu( 'main-navigation' ) ) {
    return;
}
?>
<nav id="main-navigation-wrapper" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" aria-label="<?php esc_attr_e( 'Main', BOILERPLATE_TEXT_DOMAIN ); ?>">
    <button id="main-navigation-toggle" class="main-navigation-toggle" aria-label="<?php esc_attr_e( 'Open Navigation', BOILERPLATE_TEXT_DOMAIN ); ?>" aria-controls="main-navigation" aria-expanded="false">
        <span aria-hidden="true">&#9776;</span>
    </button>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'main-navigation',
        'menu_id'        => 'main-navigation',
        'container'      => ''
    ) );
    ?>
</nav>
