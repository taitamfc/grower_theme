<?php 
// Top bar
// Address Label
$wp_customize->add_setting(
    'topbar_address_label',
    array(
        'default' => themesflat_customize_default('topbar_address_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address_label',
    array(
        'label' => esc_html__( 'Address Label', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 3,        
    )
);
// Address Number
$wp_customize->add_setting(
    'topbar_address',
    array(
        'default' => themesflat_customize_default('topbar_address'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_address',
    array(
        'label' => esc_html__( 'Address', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 4
    )
);

// Email Label
$wp_customize->add_setting(
    'topbar_email_label',
    array(
        'default' => themesflat_customize_default('topbar_email_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email_label',
    array(
        'label' => esc_html__( 'Email Label', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 5
    )
);
// Email Number
$wp_customize->add_setting(
    'topbar_email',
    array(
        'default' => themesflat_customize_default('topbar_email'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_email',
    array(
        'label' => esc_html__( 'Email', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 6
    )
);

// Time Label
$wp_customize->add_setting(
    'topbar_time_label',
    array(
        'default' => themesflat_customize_default('topbar_time_label'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_time_label',
    array(
        'label' => esc_html__( 'Time Label', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 7,
        'active_callback' => function() use ( $wp_customize ) {
            return 'header-03' === $wp_customize->get_setting( 'style_header' )->value();
        },
    )
);
// Time
$wp_customize->add_setting(
    'topbar_time',
    array(
        'default' => themesflat_customize_default('topbar_time'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'topbar_time',
    array(
        'label' => esc_html__( 'Time', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'text',
        'priority' => 8,
        'active_callback' => function() use ( $wp_customize ) {
            return 'header-03' === $wp_customize->get_setting( 'style_header' )->value();
        },
    )
);

// Social Topbar
$wp_customize->add_setting(
  'social_topbar',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('social_topbar'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'social_topbar',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Social ( OFF | ON )', 'grower'),
        'section' => 'section_topbar',
        'priority' => 9,
        'settings'      => 'social_topbar',
    ))
);

// Topbar Box control
$wp_customize->add_setting(
    'topbar_controls',
    array(
        'default' => themesflat_customize_default('topbar_controls'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control( new themesflat_BoxControls($wp_customize,
    'topbar_controls',
    array(
        'label' => esc_html__( 'Box Controls (px)', 'grower' ),
        'section' => 'section_topbar',
        'type' => 'box-controls',
        'priority' => 10,

    ))
);