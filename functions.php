<?php
/**
 * Theme Functions
 *
 * This is where all of the functions, hooks, and filters are defined.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package WP-Boilerplate
 * @license MIT
 */

define( 'BOILERPLATE_VERSION', '1.0.0' );
define( 'BOILERPLATE_SITE_URL', get_site_url() );
define( 'BOILERPLATE_TEMPLATE_URL', get_template_directory_uri() );
define( 'BOILERPLATE_PATH', get_template_directory() . DIRECTORY_SEPARATOR );
define( 'BOILERPLATE_INC', BOILERPLATE_PATH . 'includes' . DIRECTORY_SEPARATOR );

require_once BOILERPLATE_INC . 'core.php';
require_once BOILERPLATE_INC . 'overrides.php';
require_once BOILERPLATE_INC . 'template-tags.php';
require_once BOILERPLATE_INC . 'utilities.php';
require_once BOILERPLATE_INC . 'blocks.php';

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once 'vendor/autoload.php';
}

Boilerplate\Core\setup();
Boilerplate\Overrides\setup();
Boilerplate\Blocks\setup();
