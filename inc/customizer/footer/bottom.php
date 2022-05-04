<?php 
// Show Bottom
$wp_customize->add_setting ( 
    'show_bottom',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox' ,
        'default' => themesflat_customize_default('show_bottom'),     
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_bottom',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Bottom ( OFF | ON )', 'grower'),
        'section'   => 'section_bottom',
        'priority'  => 1
    ))
);

// Button Title
$wp_customize->add_setting(
    'footer_botom_button_title',
    array(
        'default' => themesflat_customize_default('footer_botom_button_title'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control(
    'footer_botom_button_title',
    array(
        'label' => esc_html__( 'Button Title', 'grower' ),
        'section' => 'section_bottom',
        'type' => 'text',
        'priority' => 1,
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
        },
    )
);

// Button Title
$wp_customize->add_setting(
    'footer_botom_button_link',
    array(
        'default' => themesflat_customize_default('footer_botom_button_link'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control(
    'footer_botom_button_link',
    array(
        'label' => esc_html__( 'Button Link', 'grower' ),
        'section' => 'section_bottom',
        'type' => 'text',
        'priority' => 2,
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
        },
    )
);


  
// Footer Copyright
$wp_customize->add_setting(
    'footer_botom_content',
    array(
        'default' => themesflat_customize_default('footer_botom_content'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control(
    'footer_botom_content',
    array(
        'label' => esc_html__( 'Content', 'grower' ),
        'section' => 'section_bottom',
        'type' => 'textarea',
        'priority' => 4,
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_bottom' )->value();
        },
    )
);