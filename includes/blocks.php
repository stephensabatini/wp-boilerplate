<?php
/**
 * Gutenberg Blocks setup
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package Boilerplate\Blocks
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

namespace Boilerplate\Blocks;

/**
 * Set up blocks
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'enqueue_block_assets', $n( 'blocks_scripts' ) );
	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_scripts' ) );
	add_filter( 'block_categories', $n( 'blocks_categories' ), 10, 2 );
}

/**
 * Enqueue shared frontend and editor JavaScript for blocks.
 *
 * @return void
 */
function blocks_scripts() {
	wp_enqueue_script( 'blocks', BOILERPLATE_TEMPLATE_URL . '/dist/js/blocks.js', [], BOILERPLATE_VERSION, true );
}


/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_scripts() {
	wp_enqueue_script( 'blocks-editor', BOILERPLATE_TEMPLATE_URL . '/partials/blocks/js/blocks-editor.js', [ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components' ], BOILERPLATE_VERSION, false );
	wp_enqueue_style( 'editor-style', BOILERPLATE_TEMPLATE_URL . '/dist/css/editor-style.css', [], BOILERPLATE_VERSION );
}

/**
 * Filters the registered block categories.
 *
 * @param array  $categories Registered categories.
 * @param object $post       The post object.
 *
 * @return array Filtered categories.
 */
function blocks_categories( $categories, $post ) {
	if ( ! in_array( $post->post_type, array( 'post', 'page' ), true ) ) {
		return $categories;
	}

	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'wp-boilerplate-blocks',
				'title' => __( 'Custom Blocks', BOILERPLATE_TEXT_DOMAIN ),
			),
		)
	);
}
