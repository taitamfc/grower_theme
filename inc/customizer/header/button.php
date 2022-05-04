<?php 
// Button Text
$wp_customize->add_setting(
    'header_button_text',
    array(
        'default' => themesflat_customize_default('header_button_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_text',
    array(
        'label' => esc_html__( 'Text', 'grower' ),
        'section' => 'section_button',
        'type' => 'text',
        'priority' => 1
    )
);
// Button Url
$wp_customize->add_setting(
    'header_button_url',
    array(
        'default' => themesflat_customize_default('header_button_url'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'header_button_url',
    array(
        'label' => esc_html__( 'Url', 'grower' ),
        'section' => 'section_button',
        'type' => 'text',
        'priority' => 2
    )
);