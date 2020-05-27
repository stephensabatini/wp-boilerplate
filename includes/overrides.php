<?php
/**
 * Overrides
 *
 * The override functions for this theme.
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package Boilerplate\Overrides
 * @version 1.0.0
 * @license GPL, or GNU General Public License, version 2
 */

namespace Boilerplate\Overrides;

/**
 * Registers instances where we will override default WP Core behavior.
 *
 * @link https://developer.wordpress.org/reference/functions/print_emoji_detection_script/
 * @link https://developer.wordpress.org/reference/functions/print_emoji_styles/
 * @link https://developer.wordpress.org/reference/functions/wp_staticize_emoji/
 * @link https://developer.wordpress.org/reference/functions/wp_staticize_emoji_for_email/
 * @link https://developer.wordpress.org/reference/functions/wp_generator/
 * @link https://developer.wordpress.org/reference/functions/wlwmanifest_link/
 * @link https://developer.wordpress.org/reference/functions/rsd_link/
 *
 * @return void
 */
function setup() {

    $n = function( $function ) {
        return __NAMESPACE__ . "\\$function";
    };

    // Remove the Emoji detection script.
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

    // Remove inline Emoji detection script.
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

    // Remove Emoji-related styles from front end and back end.
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Remove Emoji-to-static-img conversion.
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    add_filter( 'tiny_mce_plugins', $n( 'disable_emojis_tinymce' ) );
    add_filter( 'wp_resource_hints', $n( 'disable_emoji_dns_prefetch' ), 10, 2 );

    // Remove WP version from the head and RSS feeds.
    remove_action( 'wp_head', 'wp_generator' );

    // Remove Windows Live Writer manifest link.
    remove_action( 'wp_head', 'wlwmanifest_link' );

    // Remove the link to Really Simple Discovery service endpoint.
    remove_action( 'wp_head', 'rsd_link' );

    // Disable XML-RPC by default for security reasons.
    add_filter( 'xmlrpc_enabled', '__return_false' );

    // Remove WP version from styles and scripts for security reasons.
    add_filter( 'style_loader_src', $n( 'remove_asset_versions' ), 9999 );
    add_filter( 'script_loader_src', $n( 'remove_asset_versions' ), 9999 );

    // Add all of the favicon sizes that WordPress doesn't include by default.
    // TODO: Setup this API to generate the manifest.json and browserconfig.xml dynamically.
    add_filter( 'site_icon_image_sizes', $n( 'add_site_icon_image_sizes' ) );
    add_filter( 'site_icon_meta_tags', $n( 'add_site_icon_meta_tags' ) );

    /**
     * Filter the "read more" excerpt string link to the post.
     *
     * @param string $more "Read more" excerpt string.
     * @return string (Maybe) modified "read more" excerpt string.
     */
    add_filter( 'excerpt_more', $n( 'custom_excerpt' ) );

    // Add IDs and inner spans to all of the headings in the content.
    add_filter( 'the_content', $n( 'content_filter' ) );

    // Add inner spans to all of the headings in the widget areas.
    add_filter( 'dynamic_sidebar_params', $n( 'widget_params' ) );

    add_filter( 'comment_form', $n( 'comment_form_footer_content' ) );
}

/**
 * Filter function used to remove the TinyMCE emoji plugin.
 *
 * @link https://developer.wordpress.org/reference/hooks/tiny_mce_plugins/
 *
 * @param  array $plugins An array of default TinyMCE plugins.
 * @return array          An array of TinyMCE plugins, without wpemoji.
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) && in_array( 'wpemoji', $plugins, true ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    }
    return $plugins;
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @link https://developer.wordpress.org/reference/hooks/emoji_svg_url/
 *
 * @param  array  $urls          URLs to print for resource hints.
 * @param  string $relation_type The relation type the URLs are printed for.
 * @return array                 Difference betwen the two arrays.
 */
function disable_emoji_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

        $urls = array_values( array_diff( $urls, array( $emoji_svg_url ) ) );
    }
    return $urls;
}

function remove_asset_versions( $src ) {
    if ( strpos( $src, 'ver=' ) ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}

function add_site_icon_image_sizes( $sizes ) {
    $sizes[] = 64;
    return $sizes;
}

function add_site_icon_meta_tags( $meta_tags ) {
    $meta_tags[] = sprintf( '<link rel="icon" href="%s" sizes="64x64" />', esc_url( get_site_icon_url( 64 ) ) );
    $meta_tags[] = sprintf( '<link rel="icon" href="%s" sizes="512x512" />', esc_url( get_site_icon_url( 512 ) ) );
    return $meta_tags;
}

function custom_excerpt( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '…',
            get_permalink( get_the_ID() ),
            __( 'Read More', BOILERPLATE_TEXT_DOMAIN )
        );
    }
    return $more;
}

function content_filter( $html ) {
    $html = preg_replace_callback( "/\<h([1-6])\>(.*?)\<\/h([1-6])\>/", function ( $matches ) {
        static $num = 1;
        $hTag = $matches[1];
        $title = $matches[2];

        for ( $i = 1; $i <= 99; $i++ ) {
            $formattedNumber = sprintf( '%02d', $i );
            $formattedNumber = rand( 1, 5 );

        }

        $slug = sanitize_title_with_dashes( $formattedNumber );

        return '<h' . $hTag . ' id="heading-' . $num++ . '"><span>' . $title . '</span></h' . $hTag . '>';
    }, $html );
    return $html;
}

function widget_params( $params ) {
    $params[0]['before_title'] = $params[0]['before_title'] . '<span>';
    $params[0]['after_title']  = '</span>' . $params[0]['after_title'];
    return $params;
}

function comment_form_footer_content( $post_id ) {
    $html  = __( '<p>All comments are held for moderation. I&rsquo;ll publish all comments that are on topic and not rude.</p>', BOILERPLATE_TEXT_DOMAIN );
    $html .= __( '<p>You may write comments in <a href="https://commonmark.org/help/" target="_blank">Markdown</a>. This is the best way to post any code, inline like `&lt;div&gt;this&lt;/div&gt;` or multiline blocks within triple backtick fences (```) with double new lines before and after.</p>', BOILERPLATE_TEXT_DOMAIN );
    $html .= __( '<p>Want to tell me something privately, like pointing out a typo or stuff like that? <a href="/contact/">Contact me</a>.</p>', BOILERPLATE_TEXT_DOMAIN );
    echo $html;
}
