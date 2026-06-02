<?php
/**
 * Security hardening for the public theme layer.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

add_filter( 'the_generator', '__return_empty_string' );
add_filter( 'login_errors', 'usable_starter_generic_login_error' );
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_headers', 'usable_starter_security_headers' );
add_filter( 'upload_mimes', 'usable_starter_restrict_upload_mimes' );
add_filter( 'wp_check_filetype_and_ext', 'usable_starter_validate_uploaded_filetype', 10, 5 );

/**
 * Avoid exposing whether the username or password was wrong.
 */
function usable_starter_generic_login_error(): string {
	return esc_html__( 'Invalid login details.', 'usable-starter' );
}

/**
 * Add conservative frontend security headers.
 *
 * @param array<string,string> $headers Response headers.
 * @return array<string,string>
 */
function usable_starter_security_headers( array $headers ): array {
	if ( is_admin() ) {
		return $headers;
	}

	$headers['X-Content-Type-Options'] = 'nosniff';
	$headers['X-Frame-Options']       = 'SAMEORIGIN';
	$headers['Referrer-Policy']       = 'strict-origin-when-cross-origin';
	$headers['X-XSS-Protection']      = '0';

	return $headers;
}

/**
 * Keep upload types intentionally narrow by default.
 *
 * @param array<string,string> $mimes Allowed mime types.
 * @return array<string,string>
 */
function usable_starter_restrict_upload_mimes( array $mimes ): array {
	unset( $mimes['svg'], $mimes['svgz'], $mimes['exe'], $mimes['php'], $mimes['html'], $mimes['js'] );

	return $mimes;
}

/**
 * Block files that pretend to be media but resolve as executable content.
 *
 * @param array<string,mixed> $data     File type data.
 * @param string             $file     Full path to the file.
 * @param string             $filename Original filename.
 * @param string[]           $mimes    Allowed mime types.
 * @param string|false       $real_mime Real mime type.
 * @return array<string,mixed>
 */
function usable_starter_validate_uploaded_filetype( array $data, string $file, string $filename, array $mimes, $real_mime ): array {
	$extension = strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
	$blocked   = array( 'php', 'phtml', 'phar', 'js', 'html', 'htm', 'svg', 'svgz', 'exe', 'sh' );

	if ( in_array( $extension, $blocked, true ) ) {
		return array(
			'ext'             => false,
			'type'            => false,
			'proper_filename' => false,
		);
	}

	return $data;
}

/**
 * Verify a nonce from POST data for custom forms.
 *
 * @param string $action Nonce action.
 * @param string $field  Nonce field name.
 */
function usable_starter_verify_post_nonce( string $action, string $field = '_wpnonce' ): bool {
	if ( ! isset( $_POST[ $field ] ) ) {
		return false;
	}

	return (bool) wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $field ] ) ), $action );
}
