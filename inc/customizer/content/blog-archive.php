<?php 
$wp_customize->add_setting(
    'sidebar_layout',
    array(
        'default'           => themesflat_customize_default('sidebar_layout'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'sidebar_layout',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 1,
        'label'         => esc_html__('Sidebar Position', 'grower'),
        'choices'   => array (
            'sidebar-right'     => esc_html__( 'Sidebar Right','grower' ),
            'sidebar-left'      =>  esc_html__( 'Sidebar Left','grower' ),
            'fullwidth'         =>   esc_html__( 'Full Width','grower' ),
            'fullwidth-small'   =>   esc_html__( 'Full Width Small','grower' ),
            'fullwidth-center'  =>   esc_html__( 'Full Width Center','grower' ),
        ),
    )
);

$wp_customize->add_setting(
    'blog_archive_layout',
    array(
        'default'           => themesflat_customize_default('blog_archive_layout'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'blog_archive_layout',
    array (
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 2,
        'label'         => esc_html__('Blog Layout', 'grower'),
        'choices'   => array (
            'blog-list' =>  esc_html__( 'Blog List','grower' ),                  
            'blog-grid'=> esc_html__( 'Blog Grid','grower' ),
            )  
    )
);

// Gird columns Posts
$wp_customize->add_setting(
    'blog_grid_columns',
    array(
        'default'           => themesflat_customize_default('blog_grid_columns'),
        'sanitize_callback' => 'themesflat_sanitize_grid_post_related',
    )
);
$wp_customize->add_control(
    'blog_grid_columns',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 3,
        'label'     => esc_html__('Post Grid Columns', 'grower'),
        'choices'   => array(
            2     => esc_html__( '2 Columns', 'grower' ),
            3     => esc_html__( '3 Columns', 'grower' ),
            4     => esc_html__( '4 Columns', 'grower' ),                
        ),
        'active_callback' => function() use ( $wp_customize ) {
            return 'blog-grid' === $wp_customize->get_setting( 'blog_archive_layout' )->value();
        },
    )
);

$wp_customize->add_setting (
    'blog_sidebar_list',
    array(
        'default'           => themesflat_customize_default('blog_sidebar_list'),
        'sanitize_callback' => 'esc_html',
    )
);
$wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
    'blog_sidebar_list',
    array(
        'type'      => 'dropdown',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 4,
        'label'         => esc_html__('List Sidebar', 'grower'),
        'active_callback' => function() use ( $wp_customize ) {
            return 'sidebar-left' === $wp_customize->get_setting( 'sidebar_layout' )->value() || 'sidebar-right' === $wp_customize->get_setting( 'sidebar_layout' )->value();
        },
    ))
);

// Entry Content Elements
$wp_customize->add_setting (
    'post_content_elements',
    array (
        'sanitize_callback' => 'themesflat_sanitize_text',
        'default' => themesflat_customize_default('post_content_elements'),     
    )
);
$wp_customize->add_control( new themesflat_Control_Drag_And_Drop( $wp_customize,
    'post_content_elements',
    array(
        'type'      => 'draganddrop-controls',
        'label'     => esc_html__('Post Content Elements', 'grower'),
        'description' => esc_html__( 'Drag and drop elements to re-order.', 'grower' ),
        'section'   => 'section_content_blog_archive',
        'priority'  => 5,
        'choices' => array(
            'meta'            => esc_html__( 'Meta', 'grower' ),
            'title'           => esc_html__( 'Title', 'grower' ),
            'excerpt_content' => esc_html__( 'Excerpt', 'grower' ),
            'readmore'        => esc_html__( 'Read More', 'grower' ),
        ),        
    ))
); 

// Excerpt
$wp_customize->add_setting(
    'blog_archive_post_excepts_length',
    array(
        'default'   =>  themesflat_customize_default('blog_archive_post_excepts_length'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( new themesflat_Slide_Control( $wp_customize,
    'blog_archive_post_excepts_length',
        array(
            'type'      =>  'slide-control',
            'section'   =>  'section_content_blog_archive',
            'label'     =>  'Post Excepts Length',
            'priority'  => 6,
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )

    )
); 

// Read More Text
$wp_customize->add_setting (
    'blog_archive_readmore_text',
    array(
        'default' => themesflat_customize_default('blog_archive_readmore_text'),
        'sanitize_callback' => 'themesflat_sanitize_text'
    )
);
$wp_customize->add_control(
    'blog_archive_readmore_text',
    array(
        'type'      => 'text',
        'label'     => esc_html__('Read More Text', 'grower'),
        'section'   => 'section_content_blog_archive',
        'priority'  => 7
    )
);

// Meta Elements
$wp_customize->add_setting (
    'meta_elements',
    array (
        'sanitize_callback' => 'themesflat_sanitize_text',
        'default' => themesflat_customize_default('meta_elements'),     
    )
);
$wp_customize->add_control( new themesflat_Control_Drag_And_Drop( $wp_customize,
    'meta_elements',
    array(
        'type'      => 'draganddrop-controls',
        'label'     => esc_html__('Meta Elements', 'grower'),
        'description' => esc_html__( 'Drag and drop elements to re-order.', 'grower' ),
        'section'   => 'section_content_blog_archive',
        'priority'  => 8,
        'choices' => array(
            'author'    => esc_html__( 'Author', 'grower' ),
            'date'      => esc_html__( 'Date', 'grower' ),
            'category'  => esc_html__( 'Category', 'grower' ),
            'comment'   => esc_html__( 'Comment', 'grower' ),
        ),        
    ))
); 

// Pagination
$wp_customize->add_setting(
    'blog_archive_pagination_style',
    array(
        'default'           => themesflat_customize_default('blog_archive_pagination_style'),
        'sanitize_callback' => 'esc_attr',
    )
);
$wp_customize->add_control( 
    'blog_archive_pagination_style',
    array(
        'type'      => 'select',           
        'section'   => 'section_content_blog_archive',
        'priority'  => 9,
        'label'         => esc_html__('Pagination Style', 'grower'),
        'choices'   => array(
            'pager'     => esc_html__('Pager','grower'),
            'numeric'         =>  esc_html__('Numeric','grower'),
            'pager-numeric'         =>  esc_html__('Pager & Numeric','grower'),
            'loadmore' =>  esc_html__( 'Load More', 'grower' )
        ),
    )
);