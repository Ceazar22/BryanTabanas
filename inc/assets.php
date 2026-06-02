<?php
/**
 * Styles and scripts.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'usable_starter_enqueue_assets' );
/**
 * Enqueue frontend assets with file modification cache busting.
 */
function usable_starter_enqueue_assets(): void {
	$css_path = USABLE_STARTER_DIR . '/assets/css/theme.css';
	$js_path  = USABLE_STARTER_DIR . '/assets/js/theme.js';

	wp_enqueue_style(
		'usable-starter-theme',
		USABLE_STARTER_URI . '/assets/css/theme.css',
		array(),
		file_exists( $css_path ) ? (string) filemtime( $css_path ) : USABLE_STARTER_VERSION
	);

	wp_enqueue_script(
		'usable-starter-theme',
		USABLE_STARTER_URI . '/assets/js/theme.js',
		array(),
		file_exists( $js_path ) ? (string) filemtime( $js_path ) : USABLE_STARTER_VERSION,
		true
	);
}
