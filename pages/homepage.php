<?php
/**
 * Code-based homepage content.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_template_part( 'template-parts/sections/home-hero' );
get_template_part( 'template-parts/sections/about' );
get_template_part( 'template-parts/sections/skills' );
get_template_part( 'template-parts/sections/portfolio' );
get_template_part( 'template-parts/sections/testimonials' );
get_template_part( 'template-parts/sections/contact' );
