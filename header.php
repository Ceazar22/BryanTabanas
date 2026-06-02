<?php
/**
 * Site header.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="pointer-glow" aria-hidden="true"></div>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'usable-starter' ); ?></a>
<header class="site-header">
	<nav class="site-header__inner primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'usable-starter' ); ?>">
		<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="site-brand__dot" aria-hidden="true"></span>
			<span>Bryan<span class="site-brand__mark">.</span></span>
		</a>

		<ul id="primary-menu" class="primary-menu">
			<li><a class="is-active" href="#home"><?php esc_html_e( 'Home', 'usable-starter' ); ?></a></li>
			<li><a href="#about"><?php esc_html_e( 'About', 'usable-starter' ); ?></a></li>
			<li><a href="#skills"><?php esc_html_e( 'Skills', 'usable-starter' ); ?></a></li>
			<li><a href="#portfolio"><?php esc_html_e( 'Work', 'usable-starter' ); ?></a></li>
			<li><a href="#contact"><?php esc_html_e( 'Contact', 'usable-starter' ); ?></a></li>
		</ul>

		<a class="header-cta" href="#contact"><?php esc_html_e( "Let's talk", 'usable-starter' ); ?></a>

		<button class="menu-toggle" type="button" aria-label="<?php esc_attr_e( 'Menu', 'usable-starter' ); ?>" aria-controls="primary-menu" aria-expanded="false">
			<svg class="menu-toggle__icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
				<path d="M4 5h16"></path>
				<path d="M4 12h16"></path>
				<path d="M4 19h16"></path>
			</svg>
		</button>
	</nav>
</header>
