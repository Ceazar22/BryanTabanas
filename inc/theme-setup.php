<?php
/**
 * Theme setup, menus, widgets, and editor defaults.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'usable_starter_setup' );
/**
 * Register theme capabilities and WordPress feature support.
 */
function usable_starter_setup(): void {
	load_theme_textdomain( 'usable-starter', USABLE_STARTER_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'search-form' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	add_image_size( 'usable-starter-card', 720, 480, true );
	add_image_size( 'usable-starter-hero', 1600, 900, true );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'usable-starter' ),
		'footer'  => esc_html__( 'Footer Menu', 'usable-starter' ),
	) );
}

add_action( 'widgets_init', 'usable_starter_widgets_init' );
/**
 * Register project-friendly widget areas.
 */
function usable_starter_widgets_init(): void {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'usable-starter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears on posts, archives, and search pages.', 'usable-starter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'usable-starter' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Appears in the footer across the site.', 'usable-starter' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="footer-widget-title">',
		'after_title'   => '</h2>',
	) );
}
