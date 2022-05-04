<?php 
// Customize Blog Featured Title
$wp_customize->add_setting (
    'blog_featured_title',
    array(
        'default' => themesflat_customize_default('blog_featured_title'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'blog_featured_title',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Customize Blog Featured Title', 'grower'),
        'section'   => 'section_content_blog_single',
        'priority'  => 1
    )
);   

// Show Post Navigator
$wp_customize->add_setting (
    'show_post_navigator',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('show_post_navigator'),     
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_post_navigator',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Post Navigator ( OFF | ON )', 'grower'),
        'section'   => 'section_content_blog_single',
        'priority'  => 2
    ))
);

// Enable Entry Footer Content
$wp_customize->add_setting(
  'show_entry_footer_content',
    array(
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => themesflat_customize_default('show_entry_footer_content'),     
    )   
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_entry_footer_content',
    array(
        'type' => 'checkbox',
        'label' => esc_html__('Entry Footer ( OFF | ON )', 'grower'),
        'section' => 'section_content_blog_single',
        'priority' => 3,
    ))
);

// Show Related Posts
$wp_customize->add_setting (
    'show_related_post',
    array (
        'sanitize_callback' => 'themesflat_sanitize_checkbox',
        'default' => 0,     
    )
);
$wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
    'show_related_post',
    array(
        'type'      => 'checkbox',
        'label'     => esc_html__('Related Posts ( OFF | ON )', 'grower'),
        'section'   => 'section_content_blog_single',
        'priority'  => 4
    ))
);

//Related Posts Style
$wp_customize->add_setting(
    'related_post_style',
    array(
        'default'           => themesflat_customize_default('related_post_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'related_post_style',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 5,
        'label'         => esc_html__('Related Posts Style', 'grower'),
        'choices'   => array(
            'blog-list' => esc_html__( 'Blog List','grower' ),
            'blog-grid'=>   esc_html__( 'Blog Grid','grower' ),
        ),
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
        },
    )
);

// Gird columns Related Posts
$wp_customize->add_setting(
    'grid_columns_post_related',
    array(
        'default'           => themesflat_customize_default('grid_columns_post_related'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'grid_columns_post_related',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_single',
        'priority'  => 6,
        'label'     => esc_html__('Columns Of Related Posts', 'grower'),
        'choices'   => array(                
            2     => esc_html__( '2 Columns', 'grower' ),
            3     => esc_html__( '3 Columns', 'grower' ),
            4     => esc_html__( '4 Columns', 'grower' ),                
        ),
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
        },
    )
);

// Number Of Related Posts
$wp_customize->add_setting (
    'number_related_post',
    array(
        'default' => themesflat_customize_default('number_related_post'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'number_related_post',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Number Of Related Posts', 'grower'),
        'section'   => 'section_content_blog_single',
        'priority'  => 7,
        'active_callback' => function() use ( $wp_customize ) {
            return 1 === $wp_customize->get_setting( 'show_related_post' )->value();
        },
    )
);