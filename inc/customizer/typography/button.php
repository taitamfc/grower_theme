<?php 
// Buttons Font
$wp_customize->add_setting(
    'typography_buttons',
    array(
        'default' => themesflat_customize_default('typography_buttons'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_Typography($wp_customize,
    'typography_buttons',
    array(
        'label' => esc_html__( 'Font name/style/sets', 'grower' ),
        'section' => 'section_typo_buttons',
        'type' => 'typography',
        'fields' => array('family','style','size','line_height','letter_spacing'),
        'priority' => 1
    ))
);