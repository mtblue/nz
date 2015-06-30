<?php
/**
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'courage_customize_register_post_settings' );

function courage_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings
	$wp_customize->add_section( 'courage_section_post', array(
        'title'    => __( 'Post Settings', 'courage' ),
        'priority' => 30,
		'panel' => 'courage_options_panel' 
		)
	);

	// Add Settings and Controls for Posts
	$wp_customize->add_setting( 'courage_theme_options[posts_length]', array(
        'default'           => 'index',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_post_length'
		)
	);
    $wp_customize->add_control( 'courage_control_posts_length', array(
        'label'    => __( 'Post Length on archives', 'courage' ),
        'section'  => 'courage_section_post',
        'settings' => 'courage_theme_options[posts_length]',
        'type'     => 'radio',
		'priority' => 1,
        'choices'  => array(
            'index' => __( 'Show full posts', 'courage' ),
            'excerpt' => __( 'Show post summaries (excerpt)', 'courage' )
			)
		)
	);
	
	// Add Post Images Headline
	$wp_customize->add_setting( 'courage_theme_options[post_images]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_post_images', array(
            'label' => __( 'Post Images', 'courage' ),
            'section' => 'courage_section_post',
            'settings' => 'courage_theme_options[post_images]',
            'priority' => 	2
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[post_thumbnails_index]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_posts_thumbnails_index', array(
        'label'    => __( 'Display featured images on archive pages', 'courage' ),
        'section'  => 'courage_section_post',
        'settings' => 'courage_theme_options[post_thumbnails_index]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'courage_theme_options[post_thumbnails_single]', array(
        'default'           => true,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_posts_thumbnails_single', array(
        'label'    => __( 'Display featured images on single posts', 'courage' ),
        'section'  => 'courage_section_post',
        'settings' => 'courage_theme_options[post_thumbnails_single]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
	// Add Excerpt Text setting
	$wp_customize->add_setting( 'courage_theme_options[excerpt_text_headline]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Courage_Customize_Header_Control(
        $wp_customize, 'courage_control_excerpt_text_headline', array(
            'label' => __( 'Excerpt More Text', 'courage' ),
            'section' => 'courage_section_post',
            'settings' => 'courage_theme_options[excerpt_text_headline]',
            'priority' => 5
            )
        )
    );
	$wp_customize->add_setting( 'courage_theme_options[excerpt_text]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'courage_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'courage_control_excerpt_text', array(
        'label'    => __( 'Display [...] after text excerpts.', 'courage' ),
        'section'  => 'courage_section_post',
        'settings' => 'courage_theme_options[excerpt_text]',
        'type'     => 'checkbox',
		'priority' => 6
		)
	);

}

?>