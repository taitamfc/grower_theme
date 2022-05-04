<?php 
if (function_exists('themesflat_register_portfolio_post_type')) {

    /* Portfolio Archive 
    =================================================*/  
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'portfolio', array(
        'label' => esc_html__('PORTFOLIO ARCHIVE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 1
        ) )
    ); 

    // Portfolio Slug
    $wp_customize->add_setting (
        'portfolio_slug',
        array(
            'default' =>  themesflat_customize_default('portfolio_slug'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_slug',
        array(
            'type'      => 'text',
            'label'     => esc_html('Portfolio Slug', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 2
        )
    );  

    // Portfolio Name
    $wp_customize->add_setting (
        'portfolio_name',
        array(
            'default' =>  themesflat_customize_default('portfolio_name'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_name',
        array(
            'type'      => 'text',
            'label'     => esc_html('Portfolio Name', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 3
        )
    );

    $wp_customize->add_setting(
        'portfolios_layout',
        array(
            'default'           => themesflat_customize_default('portfolios_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'portfolios_layout',
        array (
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 4,
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

    $wp_customize->add_setting (
        'portfolios_sidebar_list',
        array(
            'default'           => themesflat_customize_default('portfolios_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
        'portfolios_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'section_content_post_type',
            'priority'  => 4,
            'label'         => esc_html__('List Sidebar', 'grower'),
            'active_callback' => function() use ( $wp_customize ) {
                return 'sidebar-right' === $wp_customize->get_setting( 'portfolios_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'portfolios_layout' )->value();
            },
        ))
    );

    // Number Posts Portfolios
    $wp_customize->add_setting (
        'portfolios_number_post',
        array(
            'default' => themesflat_customize_default('portfolios_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolios_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 4
        )
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'portfolio_grid_columns',
        array(
            'default'           => themesflat_customize_default('portfolio_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 4,
            'label'     => esc_html('Grid Columns', 'grower'),
            'choices'   => array(
                2     => esc_html( '2 Columns', 'grower' ),
                3     => esc_html( '3 Columns', 'grower' ),
                4     => esc_html( '4 Columns', 'grower' )
            )
        )
    );

    // Order By portfolio
    $wp_customize->add_setting(
        'portfolio_order_by',
        array(
            'default' => themesflat_customize_default('portfolio_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_order_by',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order By', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 5,
            'choices' => array(
                'date'          => esc_html( 'Date', 'grower' ),
                'id'            => esc_html( 'Id', 'grower' ),
                'author'        => esc_html( 'Author', 'grower' ),
                'title'         => esc_html( 'Title', 'grower' ),
                'modified'      => esc_html( 'Modified', 'grower' ),
                'comment_count' => esc_html( 'Comment Count', 'grower' ),
                'menu_order'    => esc_html( 'Menu Order', 'grower' )
            )        
        )
    );

    // Order Direction portfolio
    $wp_customize->add_setting(
        'portfolio_order_direction',
        array(
            'default' => themesflat_customize_default('portfolio_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolio_order_direction',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order Direction', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 6,
            'choices' => array(
                'DESC' => esc_html( 'Descending', 'grower' ),
                'ASC'  => esc_html( 'Assending', 'grower' )
            )        
        )
    );

    // Portfolio Exclude Post
    $wp_customize->add_setting (
        'portfolio_exclude',
        array(
            'default' =>  themesflat_customize_default('portfolio_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_exclude',
        array(
            'type'      => 'text',
            'label'     => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 7
        )
    );

    // Show filter portfolio
    $wp_customize->add_setting (
        'portfolio_show_filter',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('portfolio_show_filter'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'portfolio_show_filter',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Filter ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 8
        ))
    );

    // Filter Categories Order
    $wp_customize->add_setting (
        'portfolio_filter_category_order',
        array(
            'default' =>  themesflat_customize_default('portfolio_filter_category_order'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolio_filter_category_order',
        array(
            'type'      => 'text',
            'label'     => esc_html('Filter Slug Categories Order Split By ","', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 9,
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'portfolio_show_filter' )->value();
            },
        )
    );

    /* Portfolio Single 
    =================================================*/   
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'portfoliosingle', array(
        'label' => esc_html__('PORTFOLIO SINGLE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 15
        ) )
    );

    // Customize Portfolio Featured Title
    $wp_customize->add_setting (
        'portfolios_featured_title',
        array(
            'default' => themesflat_customize_default('portfolios_featured_title'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'portfolios_featured_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Customize Portfolio Featured Title', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 16
        )
    );

    // Show Post Navigator portfolio
    $wp_customize->add_setting (
        'portfolios_show_post_navigator',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('portfolios_show_post_navigator'),    
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'portfolios_show_post_navigator',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Single Navigator ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 16
        ))
    );

    // Show Related Portfolios
    $wp_customize->add_setting (
        'portfolios_show_related',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('portfolios_show_related'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'portfolios_show_related',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Related Portfolios ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 17
        ))
    );  

    // Gird columns portfolio related
    $wp_customize->add_setting(
        'portfolios_related_grid_columns',
        array(
            'default'           => themesflat_customize_default('portfolios_related_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'portfolios_related_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 18,
            'label'     => esc_html__('Columns Related', 'grower'),
            'choices'   => array(
                2     => esc_html__( '2 Columns', 'grower' ),
                3     => esc_html__( '3 Columns', 'grower' ),
                4     => esc_html__( '4 Columns', 'grower' )
            ),
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'portfolios_show_related' )->value();
            },
        )
    );

    // Number Of Related Posts Portfolios
    $wp_customize->add_setting (
        'number_related_post_portfolios',
        array(
            'default' => themesflat_customize_default('number_related_post_portfolios'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post_portfolios',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Number Of Related Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 19,
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'portfolios_show_related' )->value();
            },
        )
    );
}

if (function_exists('themesflat_register_services_post_type')) {

    /* Services Archive 
    ===============================================*/ 
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'services', array(
        'label' => esc_html__('SERVICES ARCHIVE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 25
        ) )
    );

    // Services Slug
    $wp_customize->add_setting (
        'services_slug',
        array(
            'default' =>  themesflat_customize_default('services_slug'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_slug',
        array(
            'type'      => 'text',
            'label'     => esc_html('Services Slug', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 26
        )
    );  

    // Services Name
    $wp_customize->add_setting (
        'services_name',
        array(
            'default' =>  themesflat_customize_default('services_name'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_name',
        array(
            'type'      => 'text',
            'label'     => esc_html('Services Name', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 27
        )
    );

    $wp_customize->add_setting(
        'services_layout',
        array(
            'default'           => themesflat_customize_default('services_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'services_layout',
        array (
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 28,
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

    $wp_customize->add_setting (
        'services_sidebar_list',
        array(
            'default'           => themesflat_customize_default('services_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
        'services_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'section_content_post_type',
            'priority'  => 28,
            'label'         => esc_html__('List Sidebar', 'grower'),
            'active_callback' => function() use ( $wp_customize ) {
                return 'sidebar-right' === $wp_customize->get_setting( 'services_layout' )->value() || 'sidebar-left' === $wp_customize->get_setting( 'services_layout' )->value();
            },
        ))
    );

    // Number Posts Portfolios
    $wp_customize->add_setting (
        'services_number_post',
        array(
            'default' => themesflat_customize_default('services_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 28
        )
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'services_grid_columns',
        array(
            'default'           => themesflat_customize_default('services_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 28,
            'label'     => esc_html('Grid Columns', 'grower'),
            'choices'   => array(
                2     => esc_html( '2 Columns', 'grower' ),
                3     => esc_html( '3 Columns', 'grower' ),
                4     => esc_html( '4 Columns', 'grower' )
            )
        )
    );    

    // Order By services
    $wp_customize->add_setting(
        'services_order_by',
        array(
            'default' => themesflat_customize_default('services_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_order_by',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order By', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 30,
            'choices' => array(
                'date'          => esc_html( 'Date', 'grower' ),
                'id'            => esc_html( 'Id', 'grower' ),
                'author'        => esc_html( 'Author', 'grower' ),
                'title'         => esc_html( 'Title', 'grower' ),
                'modified'      => esc_html( 'Modified', 'grower' ),
                'comment_count' => esc_html( 'Comment Count', 'grower' ),
                'menu_order'    => esc_html( 'Menu Order', 'grower' )
            )        
        )
    );

    // Order Direction services
    $wp_customize->add_setting(
        'services_order_direction',
        array(
            'default' => themesflat_customize_default('services_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_order_direction',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order Direction', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 31,
            'choices' => array(
                'DESC' => esc_html( 'Descending', 'grower' ),
                'ASC'  => esc_html( 'Assending', 'grower' )
            )        
        )
    );

    // services Exclude Post
    $wp_customize->add_setting (
        'services_exclude',
        array(
            'default' =>  themesflat_customize_default('services_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_exclude',
        array(
            'type'      => 'text',
            'label'     => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 32
        )
    );

    // Show filter services
    $wp_customize->add_setting (
        'services_show_filter',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('services_show_filter'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'services_show_filter',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Filter ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 33
        ))
    );

    // Filter Categories Order
    $wp_customize->add_setting (
        'services_filter_category_order',
        array(
            'default' =>  themesflat_customize_default('services_filter_category_order'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_filter_category_order',
        array(
            'type'      => 'text',
            'label'     => esc_html('Filter Slug Categories Order Split By ","', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 34,
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'services_show_filter' )->value();
            },
        )
    ); 

    /* Services Single 
    ==============================================*/  
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'servicessingle', array(
        'label' => esc_html__('SERVICES SINGLE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 40
        ) )
    ); 

    // Customize Services Featured Title
    $wp_customize->add_setting (
        'services_featured_title',
        array(
            'default' => themesflat_customize_default('services_featured_title'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'services_featured_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Customize Services Featured Title', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 41
        )
    );

    // Show Post Navigator services
    $wp_customize->add_setting (
        'services_show_post_navigator',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('services_show_post_navigator'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'services_show_post_navigator',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Single Navigator ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 41
        ))
    );  

    // Show Related services
    $wp_customize->add_setting (
        'services_show_related',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('services_show_related'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'services_show_related',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Related Services ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 42
        ))
    );

    // Number Of Related Posts Service
    $wp_customize->add_setting (
        'number_related_post_services',
        array(
            'default' => themesflat_customize_default('number_related_post_services'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post_services',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Number Of Related Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 42,
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'services_show_related' )->value();
            },
        )
    );

    // Gird columns services related
    $wp_customize->add_setting(
        'services_related_grid_columns',
        array(
            'default'           => themesflat_customize_default('services_related_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'services_related_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 43,
            'label'     => esc_html__('Columns Related', 'grower'),
            'choices'   => array(
                2     => esc_html__( '2 Columns', 'grower' ),
                3     => esc_html__( '3 Columns', 'grower' ),
                4     => esc_html__( '4 Columns', 'grower' )
            ),
            'active_callback' => function() use ( $wp_customize ) {
                return 1 === $wp_customize->get_setting( 'services_show_related' )->value();
            },
        )
    );
}

if (function_exists('themesflat_register_project_post_type')) {

    /* Project Archive 
    =================================================*/  
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'project', array(
        'label' => esc_html__('PROJECT ARCHIVE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 100
        ) )
    ); 

    // Project Slug
    $wp_customize->add_setting (
        'project_slug',
        array(
            'default' =>  themesflat_customize_default('project_slug'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_slug',
        array(
            'type'      => 'text',
            'label'     => esc_html('Project Slug', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 102
        )
    );  

    // project Name
    $wp_customize->add_setting (
        'project_name',
        array(
            'default' =>  themesflat_customize_default('project_name'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_name',
        array(
            'type'      => 'text',
            'label'     => esc_html('Project Name', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 103
        )
    );

    $wp_customize->add_setting(
        'project_layout',
        array(
            'default'           => themesflat_customize_default('project_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'project_layout',
        array (
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 104,
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

    $wp_customize->add_setting (
        'project_sidebar_list',
        array(
            'default'           => themesflat_customize_default('project_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
        'project_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'section_content_post_type',
            'priority'  => 105,
            'label'         => esc_html__('List Sidebar', 'grower'),
            
        ))
    );

    // Number Posts project
    $wp_customize->add_setting (
        'project_number_post',
        array(
            'default' => themesflat_customize_default('project_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 106
        )
    );

    // Gird columns project
    $wp_customize->add_setting(
        'project_grid_columns',
        array(
            'default'           => themesflat_customize_default('project_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'project_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 107,
            'label'     => esc_html('Grid Columns', 'grower'),
            'choices'   => array(
                2     => esc_html( '2 Columns', 'grower' ),
                3     => esc_html( '3 Columns', 'grower' ),
                4     => esc_html( '4 Columns', 'grower' )
            )
        )
    );

    // Order By project
    $wp_customize->add_setting(
        'project_order_by',
        array(
            'default' => themesflat_customize_default('project_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'project_order_by',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order By', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 108,
            'choices' => array(
                'date'          => esc_html( 'Date', 'grower' ),
                'id'            => esc_html( 'Id', 'grower' ),
                'author'        => esc_html( 'Author', 'grower' ),
                'title'         => esc_html( 'Title', 'grower' ),
                'modified'      => esc_html( 'Modified', 'grower' ),
                'comment_count' => esc_html( 'Comment Count', 'grower' ),
                'menu_order'    => esc_html( 'Menu Order', 'grower' )
            )        
        )
    );

    // Order Direction project
    $wp_customize->add_setting(
        'project_order_direction',
        array(
            'default' => themesflat_customize_default('project_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'project_order_direction',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order Direction', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 109,
            'choices' => array(
                'DESC' => esc_html( 'Descending', 'grower' ),
                'ASC'  => esc_html( 'Assending', 'grower' )
            )        
        )
    );

    // project Exclude Post
    $wp_customize->add_setting (
        'project_exclude',
        array(
            'default' =>  themesflat_customize_default('project_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_exclude',
        array(
            'type'      => 'text',
            'label'     => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 110
        )
    );

    // Show filter project
    $wp_customize->add_setting (
        'project_show_filter',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('project_show_filter'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'project_show_filter',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Filter ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 111
        ))
    );

    // Filter Categories Order
    $wp_customize->add_setting (
        'project_filter_category_order',
        array(
            'default' =>  themesflat_customize_default('project_filter_category_order'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_filter_category_order',
        array(
            'type'      => 'text',
            'label'     => esc_html('Filter Slug Categories Order Split By ","', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 112
        )
    );

    /* Project Single 
    =================================================*/   
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'projectsingle', array(
        'label' => esc_html__('PROJECT SINGLE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 115
        ) )
    );

    // Customize Project Featured Title
    $wp_customize->add_setting (
        'project_featured_title',
        array(
            'default' => themesflat_customize_default('project_featured_title'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'project_featured_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Customize Project Featured Title', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 116
        )
    );

    // Show Post Navigator Project
    $wp_customize->add_setting (
        'project_show_post_navigator',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('project_show_post_navigator'),    
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'project_show_post_navigator',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Single Navigator ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 116
        ))
    );

    // Show Related project
    $wp_customize->add_setting (
        'project_show_related',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('project_show_related'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'project_show_related',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Related project ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 117
        ))
    );  

    // Gird columns Project related
    $wp_customize->add_setting(
        'project_related_grid_columns',
        array(
            'default'           => themesflat_customize_default('project_related_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'project_related_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 118,
            'label'     => esc_html__('Columns Related', 'grower'),
            'choices'   => array(
                2     => esc_html__( '2 Columns', 'grower' ),
                3     => esc_html__( '3 Columns', 'grower' ),
                4     => esc_html__( '4 Columns', 'grower' )
            )
        )
    );

    // Number Of Related Posts project
    $wp_customize->add_setting (
        'number_related_post_project',
        array(
            'default' => themesflat_customize_default('number_related_post_project'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'number_related_post_project',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Number Of Related Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 119
        )
    );
}

if (function_exists('themesflat_register_gallery_post_type')) {

    /* Gallery Archive 
    ===============================================*/ 
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'gallery', array(
        'label' => esc_html__('GALLERY ARCHIVE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 200
        ) )
    );

    // Gallery Slug
    $wp_customize->add_setting (
        'gallery_slug',
        array(
            'default' =>  themesflat_customize_default('gallery_slug'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'gallery_slug',
        array(
            'type'      => 'text',
            'label'     => esc_html('Gallery Slug', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 201
        )
    );  

    // Services Name
    $wp_customize->add_setting (
        'gallery_name',
        array(
            'default' =>  themesflat_customize_default('gallery_name'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'gallery_name',
        array(
            'type'      => 'text',
            'label'     => esc_html('Gallery Name', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 202
        )
    );

    $wp_customize->add_setting(
        'gallery_layout',
        array(
            'default'           => themesflat_customize_default('gallery_layout'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control( 
        'gallery_layout',
        array (
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 203,
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

    $wp_customize->add_setting (
        'gallery_sidebar_list',
        array(
            'default'           => themesflat_customize_default('gallery_sidebar_list'),
            'sanitize_callback' => 'esc_html',
        )
    );
    $wp_customize->add_control( new themesflat_DropdownSidebars($wp_customize,
        'gallery_sidebar_list',
        array(
            'type'      => 'dropdown',           
            'section'   => 'section_content_post_type',
            'priority'  => 204,
            'label'         => esc_html__('List Sidebar', 'grower'),
            
        ))
    );

    // Number Posts Portfolios
    $wp_customize->add_setting (
        'gallery_number_post',
        array(
            'default' => themesflat_customize_default('gallery_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'gallery_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 205
        )
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'gallery_grid_columns',
        array(
            'default'           => themesflat_customize_default('gallery_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'gallery_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 206,
            'label'     => esc_html('Grid Columns', 'grower'),
            'choices'   => array(
                2     => esc_html( '2 Columns', 'grower' ),
                3     => esc_html( '3 Columns', 'grower' ),
                4     => esc_html( '4 Columns', 'grower' )
            )
        )
    );    

    // Order By Gallery
    $wp_customize->add_setting(
        'gallery_order_by',
        array(
            'default' => themesflat_customize_default('gallery_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'gallery_order_by',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order By', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 207,
            'choices' => array(
                'date'          => esc_html( 'Date', 'grower' ),
                'id'            => esc_html( 'Id', 'grower' ),
                'author'        => esc_html( 'Author', 'grower' ),
                'title'         => esc_html( 'Title', 'grower' ),
                'modified'      => esc_html( 'Modified', 'grower' ),
                'comment_count' => esc_html( 'Comment Count', 'grower' ),
                'menu_order'    => esc_html( 'Menu Order', 'grower' )
            )        
        )
    );

    // Order Direction Gallery
    $wp_customize->add_setting(
        'gallery_order_direction',
        array(
            'default' => themesflat_customize_default('gallery_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'gallery_order_direction',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order Direction', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 208,
            'choices' => array(
                'DESC' => esc_html( 'Descending', 'grower' ),
                'ASC'  => esc_html( 'Assending', 'grower' )
            )        
        )
    );

    // Gallery Exclude Post
    $wp_customize->add_setting (
        'gallery_exclude',
        array(
            'default' =>  themesflat_customize_default('gallery_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'gallery_exclude',
        array(
            'type'      => 'text',
            'label'     => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 209
        )
    );

    // Show filter gallery
    $wp_customize->add_setting (
        'gallery_show_filter',
        array (
            'sanitize_callback' => 'themesflat_sanitize_checkbox',
            'default' => themesflat_customize_default('gallery_show_filter'),     
        )
    );
    $wp_customize->add_control( new themesflat_Checkbox( $wp_customize,
        'gallery_show_filter',
        array(
            'type'      => 'checkbox',
            'label'     => esc_html__('Filter ( OFF | ON )', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 210
        ))
    );

    // Filter Categories Order
    $wp_customize->add_setting (
        'gallery_filter_category_order',
        array(
            'default' =>  themesflat_customize_default('gallery_filter_category_order'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'gallery_filter_category_order',
        array(
            'type'      => 'text',
            'label'     => esc_html('Filter Slug Categories Order Split By ","', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 211
        )
    );
}

if (function_exists('themesflat_register_doctor_post_type')) {

    /* Doctor Archive 
    ===============================================*/ 
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'doctor', array(
        'label' => esc_html__('DOCTOR ARCHIVE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 300
        ) )
    );

    // Doctor Slug
    $wp_customize->add_setting (
        'doctor_slug',
        array(
            'default' =>  themesflat_customize_default('doctor_slug'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'doctor_slug',
        array(
            'type'      => 'text',
            'label'     => esc_html('Doctor Slug', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 301
        )
    );  

    // Doctor Name
    $wp_customize->add_setting (
        'doctor_name',
        array(
            'default' =>  themesflat_customize_default('doctor_name'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'doctor_name',
        array(
            'type'      => 'text',
            'label'     => esc_html('Doctor Name', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 302
        )
    );

    // Number Posts Doctor
    $wp_customize->add_setting (
        'doctor_number_post',
        array(
            'default' => themesflat_customize_default('doctor_number_post'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'doctor_number_post',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Show Number Posts', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 303
        )
    );

    // Gird columns portfolio
    $wp_customize->add_setting(
        'doctor_grid_columns',
        array(
            'default'           => themesflat_customize_default('doctor_grid_columns'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'doctor_grid_columns',
        array(
            'type'      => 'select',           
            'section'   => 'section_content_post_type',
            'priority'  => 304,
            'label'     => esc_html('Grid Columns', 'grower'),
            'choices'   => array(
                2     => esc_html( '2 Columns', 'grower' ),
                3     => esc_html( '3 Columns', 'grower' ),
                4     => esc_html( '4 Columns', 'grower' )
            )
        )
    );    

    // Order By services
    $wp_customize->add_setting(
        'doctor_order_by',
        array(
            'default' => themesflat_customize_default('doctor_order_by'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'doctor_order_by',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order By', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 305,
            'choices' => array(
                'date'          => esc_html( 'Date', 'grower' ),
                'id'            => esc_html( 'Id', 'grower' ),
                'author'        => esc_html( 'Author', 'grower' ),
                'title'         => esc_html( 'Title', 'grower' ),
                'modified'      => esc_html( 'Modified', 'grower' ),
                'comment_count' => esc_html( 'Comment Count', 'grower' ),
                'menu_order'    => esc_html( 'Menu Order', 'grower' )
            )        
        )
    );

    // Order Direction services
    $wp_customize->add_setting(
        'doctor_order_direction',
        array(
            'default' => themesflat_customize_default('doctor_order_direction'),
            'sanitize_callback' => 'esc_attr',
        )
    );
    $wp_customize->add_control(
        'doctor_order_direction',
        array(
            'type'      => 'select',
            'label'     => esc_html('Order Direction', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 306,
            'choices' => array(
                'DESC' => esc_html( 'Descending', 'grower' ),
                'ASC'  => esc_html( 'Assending', 'grower' )
            )        
        )
    );

    // services Exclude Post
    $wp_customize->add_setting (
        'doctor_exclude',
        array(
            'default' =>  themesflat_customize_default('doctor_exclude'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'doctor_exclude',
        array(
            'type'      => 'text',
            'label'     => esc_html('Post Ids Will Be Inorged. Ex: 1,2,3', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 307
        )
    );

    /* Doctor Single 
    ==============================================*/  
    $wp_customize->add_control( new themesflat_Info( $wp_customize, 'doctorsingle', array(
        'label' => esc_html__('DOCTOR SINGLE', 'grower'),
        'section' => 'section_content_post_type',
        'settings' => 'themesflat_options[info]',
        'priority' => 350
        ) )
    ); 

    // Customize Doctor Featured Title
    $wp_customize->add_setting (
        'doctor_featured_title',
        array(
            'default' => themesflat_customize_default('doctor_featured_title'),
            'sanitize_callback' => 'themesflat_sanitize_text'
        )
    );
    $wp_customize->add_control(
        'doctor_featured_title',
        array(
            'type'      => 'text',
            'label'     => esc_html__('Customize Coctor Featured Title', 'grower'),
            'section'   => 'section_content_post_type',
            'priority'  => 351
        )
    );
}