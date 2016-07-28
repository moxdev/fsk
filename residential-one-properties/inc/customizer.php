<?php
/**
 * Residential One Properties Theme Customizer.
 *
 * @package Residential_One_Properties
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function residential_one_properties_customize_register( $wp_customize ) {
	//$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// GENERAL CONTACT INFORMATION
	$wp_customize->add_section(
        'community_contact_information',
        array(
            'title' => 'Community Contact Information'
            //'description' => 'This is a settings section.',
            //'priority' => 35,
        )
    );
	$wp_customize->add_setting(
		'setting_address',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_address',
		array(
			'label' => 'Address',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_city',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_city',
		array(
			'label' => 'City',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_state',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_state',
		array(
			'label' => 'State',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_zip',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_zip',
		array(
			'label' => 'Zip',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_phone',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_phone',
		array(
			'label' => 'Phone',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_fax',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_fax',
		array(
			'label' => 'Fax',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_email',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_email',
		array(
			'label' => 'Email',
			'section' => 'community_contact_information',
			'type' => 'text',
		)
	);
	
	// HOURS
	$wp_customize->add_section(
        'community_hours',
        array(
            'title' => 'Hours of Operation'
            //'description' => 'This is a settings section.',
            //'priority' => 35,
        )
    );
	$wp_customize->add_setting(
		'setting_hours_1',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_hours_1',
		array(
			'label' => 'Hours 1',
			'section' => 'community_hours',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_hours_2',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_hours_2',
		array(
			'label' => 'Hours 2',
			'section' => 'community_hours',
			'type' => 'text',
		)
	);
	$wp_customize->add_setting(
		'setting_hours_3',
		array(
			'sanitize_callback' => 'sanitize_text',
		)
	);
	$wp_customize->add_control(
		'setting_hours_3',
		array(
			'label' => 'Hours 3',
			'section' => 'community_hours',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'residential_one_properties_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function residential_one_properties_customize_preview_js() {
	wp_enqueue_script( 'residential_one_properties_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'residential_one_properties_customize_preview_js' );

/**
 * SANITIZE WHAT IS ENTERED
*/

function sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}