<?php
/**
 * Theme bootstrap.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'USABLE_STARTER_VERSION', '1.0.0' );
define( 'USABLE_STARTER_DIR', get_template_directory() );
define( 'USABLE_STARTER_URI', get_template_directory_uri() );

require_once USABLE_STARTER_DIR . '/inc/theme-setup.php';
require_once USABLE_STARTER_DIR . '/inc/assets.php';
require_once USABLE_STARTER_DIR . '/inc/security.php';
require_once USABLE_STARTER_DIR . '/inc/template-tags.php';
require_once USABLE_STARTER_DIR . '/inc/customizer.php';
require_once USABLE_STARTER_DIR . '/inc/contact.php';
