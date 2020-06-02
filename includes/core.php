<?php
/**
 * Core
 *
 * The core instantiation functions for this theme.
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package Boilerplate\Core
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

namespace Boilerplate\Core;


/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'i18n' ) );
	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'widgets_init', $n( 'widgets' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts' ) );
	add_action( 'wp_enqueue_scripts', $n( 'styles' ) );
}

/**
 * Enables translation for this theme.
 *
 * Any translations can be added to the /languages directory.
 *
 * @return void
 */
function i18n() {
	load_theme_textdomain( BOILERPLATE_TEXT_DOMAIN, BOILERPLATE_PATH . '/languages' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	// Enable featured images.
	add_theme_support( 'post-thumbnails' );

	// Take advantage of HTML5.
	add_theme_support(
		'html5', [
			'caption',
			'comment-list',
			'comment-form',
			'gallery',
			'search-form'
		]
	);

	add_theme_support( 'post-formats', array(
		#'aside',
		#'gallery',
		#'link',
		#'image',
		#'quote',
		#'status',
		#'video'
	) );

	// Define our branding colors.
	add_theme_support(
		'editor-color-palette', [
			[
				'name' => __( 'Primary Color', BOILERPLATE_TEXT_DOMAIN ),
				'slug' => 'primary',
				'color' => '#f68a1f',
			],
			[
				'name' => __( 'Secondary Color', BOILERPLATE_TEXT_DOMAIN ),
				'slug' => 'secondary',
				'color' => '#116581',
			],
			[
				'name' => __( 'Tertiary Color', BOILERPLATE_TEXT_DOMAIN ),
				'slug' => 'tertiary',
				'color' => '#222',
			],
			[
				'name' => __( 'Quaternary Color', BOILERPLATE_TEXT_DOMAIN ),
				'slug' => 'quaternary',
				'color' => '#fff',
			]
		]
	);

	add_theme_support( 'editor-styles' );
	add_editor_style( BOILERPLATE_TEMPLATE_URL . '/dist/css/index.min.css' );

	// Register navigation menus for wp_nav_menu().
	register_nav_menus( [
		'main-navigation'   => __( 'Main Navigation', BOILERPLATE_TEXT_DOMAIN ),
		'social-navigation' => __( 'Social Navigation', BOILERPLATE_TEXT_DOMAIN )
	] );
}

/**
 * Enqueue scripts for front-end.
 *
 * @return void
 */
function scripts() {
	wp_enqueue_script( 'site', BOILERPLATE_TEMPLATE_URL . '/dist/js/index.min.js', [], BOILERPLATE_VERSION, true );
	if ( is_singular() && comments_open() && '1' === get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Enqueue styles for front-end.
 *
 * @return void
 */
function styles() {
	wp_enqueue_style( 'site', BOILERPLATE_TEMPLATE_URL . '/dist/css/index.min.css', [], BOILERPLATE_VERSION );
}

/**
 * Enqueue widgets for back-end.
 *
 * @return void
 */
function widgets() {
	register_sidebar( [
		'id'            => 'default',
		'class'         => 'default',
		'name'          => __( 'Sidebar: Default Template', BOILERPLATE_TEXT_DOMAIN ),
		'description'   => __( 'The area for the right column of the default, full-width, and narrow-width template pages.', BOILERPLATE_TEXT_DOMAIN ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>'
	] );
}
