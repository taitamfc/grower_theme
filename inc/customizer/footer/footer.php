<?php 
// Columns Footer
$wp_customize->add_setting(
    'footer_widget_areas',
    array(
        'default'           => themesflat_customize_default('footer_widget_areas'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'footer_widget_areas',
    array(
        'type'      => 'select',           
        'section'   => 'section_footer',
        'priority'  => 1,
        'label'     => esc_html__('Columns Footer', 'grower'),
        'choices'   => array(                
            1     => esc_html__( '1 Columns', 'grower' ),
            2     => esc_html__( '2 Columns', 'grower' ),
            3     => esc_html__( '3 Columns', 'grower' ),
            4     => esc_html__( '4 Columns ( 3 | 3 | 3 | 3 )', 'grower' ),
            5     => esc_html__( '5 Columns ( 3 | 2 | 2 | 2 | 3 )', 'grower' ),                  
        )
    )
); 

// Footer Box control
$wp_customize->add_setting(
    'footer_controls',
    array(
        'default' => themesflat_customize_default('footer_controls'),
        'sanitize_callback' => 'themesflat_sanitize_text',
    )
);
$wp_customize->add_control( new themesflat_BoxControls($wp_customize,
    'footer_controls',
    array(
        'label' => esc_html__( 'Footer Box Controls (px)', 'grower' ),
        'section' => 'section_footer',
        'type' => 'box-controls',
        'priority' => 2
    ))
);

$wp_customize->add_setting(
    'footer_style',
    array(
        'default'           => themesflat_customize_default('footer_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control(
    'footer_style',
    array(
        'type'      => 'select',           
        'section'   => 'section_footer',
        'priority'  => 3,
        'label'     => esc_html__('Styles', 'grower'),
        'choices'   => array(
            'footer-style1'     => esc_html__( 'Style 1', 'grower' ),
            'footer-style2'     => esc_html__( 'Style 2', 'grower' ),               
        )
    )
);