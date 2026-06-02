<?php
/**
 * Customizer additions.
 *
 * @package UsableStarter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'customize_register', 'usable_starter_customize_register' );
/**
 * Register small project defaults in the customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function usable_starter_customize_register( WP_Customize_Manager $wp_customize ): void {
	$wp_customize->add_section( 'usable_starter_project', array(
		'title'    => esc_html__( 'Project Settings', 'usable-starter' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'usable_starter_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'usable_starter_footer_text', array(
		'label'   => esc_html__( 'Footer Text', 'usable-starter' ),
		'section' => 'usable_starter_project',
		'type'    => 'text',
	) );
}
