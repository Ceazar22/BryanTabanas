<?php
/**
 * Small template helpers.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print sanitized site branding.
 */
function usable_starter_site_branding(): void {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	printf(
		'<a class="site-title" href="%1$s" rel="home">%2$s</a>',
		esc_url( home_url( '/' ) ),
		esc_html( get_bloginfo( 'name' ) )
	);
}

/**
 * Print post meta for archive and single views.
 */
function usable_starter_post_meta(): void {
	printf(
		'<div class="entry-meta"><time datetime="%1$s">%2$s</time><span>%3$s</span></div>',
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_html( get_the_author() )
	);
}

/**
 * Return the theme page intro, preferring an excerpt.
 */
function usable_starter_page_intro(): string {
	if ( has_excerpt() ) {
		return wp_kses_post( get_the_excerpt() );
	}

	return esc_html( get_bloginfo( 'description' ) );
}

/**
 * Return a code-based page template from the /pages directory.
 */
function usable_starter_code_page_path( string $slug ): string {
	$slug = sanitize_title( $slug );

	if ( '' === $slug ) {
		return '';
	}

	$template = USABLE_STARTER_DIR . '/pages/' . $slug . '.php';

	return file_exists( $template ) ? $template : '';
}
