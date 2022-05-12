<?php 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow as Group_Control_Box_Shadow;
use Elementor\Modules\DynamicTags\Module as TagsModule;


class themesflat_options_elementor {
	public function __construct(){	
        add_action('elementor/documents/register_controls', [$this, 'themesflat_elementor_register_options'], 10);
        add_action('elementor/editor/before_enqueue_scripts', function() { wp_enqueue_script( 'elementor-preview-load', THEMESFLAT_LINK . 'js/elementor/elementor-preview-load.js', array( 'jquery' ), null, true );
        }, 10, 3);
    }

    public function themesflat_elementor_register_options($element){
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);

        if ( ($post_type !== 'post') && ($post_type !== 'portfolios') && ($post_type !== 'services') && ($post_type !== 'doctor') ) {
        	$this->themesflat_options_page_header($element);
            $this->themesflat_options_page_footer($element);                      
        }

        $this->themesflat_options_page($element);
        $this->themesflat_options_page_pagetitle($element);

        if ( $post_type == 'doctor' ) {
            $this->themesflat_options_doctor($element);
        }

        if ( $post_type == 'portfolios' ) {
            $this->themesflat_options_portfolio($element);
        }

        if ( $post_type == 'services' ) {
            $this->themesflat_options_services($element);
        }
    }

    public function themesflat_options_page_header($element) {
        // TF Header
        $element->start_controls_section(
            'themesflat_header_options',
            [
                'label' => esc_html__('TF Header', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );
        $element->add_control(
            'h_options_topbar',
            [
                'label' => esc_html__( 'Topbar', 'grower' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_responsive_control(
            'topbar_padding',
            [
                'label' => esc_html__( 'Padding', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'allowed_dimensions' => ['top','bottom'],
                'size_units' => [ 'px' ],
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top .container-inside' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_control(
            'topbar_background_color',
            [
                'label' => esc_html__( 'Background', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'background: {{VALUE}};',                  
                ],
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_control(
            'topbar_textcolor',
            [
                'label' => esc_html__( 'Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top' => 'color: {{VALUE}};',                  
                ],
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color',
            [
                'label' => esc_html__( 'Link Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a' => 'color: {{VALUE}};',                  
                ],
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_control(
            'topbar_link_color_hover',
            [
                'label' => esc_html__( 'Link Hover Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-top a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-04 .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}}.header-default .themesflat-top ul.flat-information li > i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themesflat-top .wrap-btn-topbar .btn-topbar:before' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );
        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'topbar_typography',
                'label' => esc_html__( 'Typography', 'grower' ),
                'selector' => '{{WRAPPER}} .themesflat-top',
                'condition' => [
                    'style_header' => ['header-01']
                ],
            ]
        );

        $element->add_control(
            'h_options_header',
            [
                'label' => esc_html__( 'Header', 'grower' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $element->add_control(
            'style_header',
            [
                'label'     => esc_html__( 'Header Style', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                	'' => esc_html__( 'Theme Setting', 'grower'),
                    'header-default' => esc_html__( 'Header Default', 'grower'),
                    'header-01' => esc_html__( 'Header 01', 'grower' ),                    'header-02' => esc_html__( 'Header 02', 'grower' ),
                ],
            ]
        );
        // Logo
        $element->add_control(
            'site_logo',
            [
                'label'   => esc_html__( 'Custom Logo', 'grower' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );
        $element->add_responsive_control(
            'logo_width',
            [
                'label'      => esc_html__( 'Logo Width', 'grower' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range'      => [
                    'px' => [
                        'min' => 30,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 50,
                        'max' => 150,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} #header #logo a img, {{WRAPPER}} .modal-menu__panel-footer .logo-panel a img' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $element->add_control(
            'header_absolute',
            [
                'label'     => esc_html__( 'Header Absolute', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    0       => esc_html__( 'No', 'grower'),
                    1       => esc_html__( 'Yes', 'grower'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_sticky',
            [
                'label'     => esc_html__( 'Header Sticky', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    0       => esc_html__( 'No', 'grower'),
                    1       => esc_html__( 'Yes', 'grower'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_search_box',
            [
                'label'     => esc_html__( 'Search Box', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    0       => esc_html__( 'Hide', 'grower'),
                    1       => esc_html__( 'Show', 'grower'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_sidebar_toggler',
            [
                'label'     => esc_html__( 'Sidebar Toggler', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    0       => esc_html__( 'Hide', 'grower'),
                    1       => esc_html__( 'Show', 'grower'),                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_backgroundcolor',
            [
                'label' => esc_html__( 'Header Background', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #header.header-default' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style1, {{WRAPPER}} #header.header-style1 .logo:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style2' => 'background: {{VALUE}};',
                    '{{WRAPPER}} #header.header-style3' => 'background: {{VALUE}};',                    
                ],
                'condition' => [ 'style_header!' => '' ],
            ]
        );
        $element->add_control(
            'header_secondary_color',
            [
                'label' => esc_html__( 'Secondary Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a:hover, {{WRAPPER}} #mainnav > ul > li.current-menu-item > a, {{WRAPPER}} #mainnav > ul > li.current-menu-ancestor > a, {{WRAPPER}} #mainnav > ul > li.current-menu-parent > a' => 'color: {{VALUE}};',

                    '{{WRAPPER}} #mainnav ul.sub-menu > li > a:hover, {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-item > a, {{WRAPPER}} #mainnav-mobi ul li.current-menu-item > a, {{WRAPPER}} #mainnav-mobi ul li.current-menu-ancestor > a, {{WRAPPER}} #mainnav ul.sub-menu > li.current-menu-ancestor > a, {{WRAPPER}} #mainnav-mobi ul li .current-menu-item > a, {{WRAPPER}} #mainnav-mobi ul li.current-menu-item .btn-submenu:before, {{WRAPPER}} #mainnav-mobi ul li .current-menu-item .btn-submenu:before' => 'color: {{VALUE}};', 
                    
                    '{{WRAPPER}} header .info-header .icon-info svg' => 'color: {{VALUE}};fill: {{VALUE}};', 
                    '{{WRAPPER}} header .btn-header, {{WRAPPER}} .show-search > a:hover, {{WRAPPER}} .header-modal-menu-left-btn:hover, {{WRAPPER}} .widget_search form button.search-submit, {{WRAPPER}} #mainnav > ul > li > a:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $element->add_control(
            'header_height',
            [
                'label' => esc_html__( 'Header Height', 'grower' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 200,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} #mainnav > ul > li > a, {{WRAPPER}} #header .show-search, {{WRAPPER}} header .block a, {{WRAPPER}} #header .mini-cart-header .cart-count, {{WRAPPER}} #header .mini-cart .cart-count, {{WRAPPER}} .button-menu' => 'line-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} #header .header-wrap' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        

        //Extra Classes Header
        $element->add_control(
            'extra_classes_header',
            [
                'label'   => esc_html__( 'Extra Classes', 'grower' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_pagetitle($element) {
        // TF Page Title
        $element->start_controls_section(
            'themesflat_pagetitle_options',
            [
                'label' => esc_html__('TF Page Title', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );       

        $element->add_control(
            'hide_pagetitle',
            [
                'label'     => esc_html__( 'Hide Page Title', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'grower'),
                    'block'      => esc_html__( 'No', 'grower'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} .page-title' => 'display: {{VALUE}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_padding',
            [
                'label' => esc_html__( 'Padding', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        ); 

        $element->add_responsive_control(
            'pagetitle_margin',
            [
                'label' => esc_html__( 'Margin', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} .page-title' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );              

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'pagetitle_bg',
                'label' => esc_html__( 'Background', 'grower' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .page-title',
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        $element->add_control(
            'pagetitle_overlay_color',
            [
                'label' => esc_html__( 'Overlay Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .page-title .overlay' => 'background: {{VALUE}}; opacity: 100%;filter: alpha(opacity=100);',
                ],
                'condition' => [ 'hide_pagetitle' => 'block' ]
            ]
        );

        //Extra Classes Page Title
        $element->add_control(
            'extra_classes_pagetitle',
            [
                'label'   => esc_html__( 'Extra Classes', 'grower' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page_footer($element) {
        // TF Footer
        $element->start_controls_section(
            'themesflat_footer_options',
            [
                'label' => esc_html__('TF Footer', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'footer_heading',
            [
                'label'     => esc_html__( 'Footer', 'grower'),
                'type'      => Controls_Manager::HEADING,
            ]
        );       

        $element->add_control(
            'hide_footer',
            [
                'label'     => esc_html__( 'Hide Footer', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'grower'),
                    'block'      => esc_html__( 'No', 'grower'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #footer' => 'display: {{VALUE}};',
                    '{{WRAPPER}} .info-footer' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_responsive_control(
            'footer_padding',
            [
                'label' => esc_html__( 'Padding', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_color',
            [
                'label' => esc_html__( 'Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer' => 'color: {{VALUE}}',
                    '{{WRAPPER}} #footer, #footer input, #footer select, {{WRAPPER}} #footer textarea, {{WRAPPER}} #footer a, {{WRAPPER}} footer .widget.widget-recent-news li .text .post-date, {{WRAPPER}} footer .widget.widget_latest_news li .text .post-date, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a, {{WRAPPER}} #footer .wp-block-latest-posts__post-date, {{WRAPPER}} #footer .wp-block-latest-posts__post-date:before, {{WRAPPER}} footer a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_accent_color',
            [
                'label' => esc_html__( 'Accent Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer a:hover, {{WRAPPER}} #footer .footer-widgets .widget.widget_themesflat_socials ul li a:hover, {{WRAPPER}} footer a:hover, {{WRAPPER}} .footer a:hover' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} #footer input:focus, {{WRAPPER}} footer input:focus' => 'border-color: {{VALUE}} !important',
                    '{{WRAPPER}} #footer input[type="submit"], {{WRAPPER}} footer input[type="submit"], {{WRAPPER}} footer .elementor-widget-container .mc4wp-form input[type="submit"]' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );       
        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'footer_bg',
                'label' => esc_html__( 'Background', 'grower' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} #footer',
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_bg_overlay',
            [
                'label' => esc_html__( 'Background Overlay', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer_background' => 'background-color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        );

        $element->add_control(
            'footer_style',
            [
                'label'     => esc_html__( 'Styles', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    'footer-style1' => esc_html__( 'Style 1', 'grower' ),
                    'footer-style2' => esc_html__( 'Style 2', 'grower' ),
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        ); 

        $element->add_control(
            'h_footer_widget',
            [
                'label' => esc_html__( 'Widget', 'grower' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $element->add_control(
            'footer_color_heading_widget',
            [
                'label' => esc_html__( 'Color Heading Widget', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_footer' => 'block' ]
            ]
        ); 

        $element->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_widget_typography',
                'selector' => '{{WRAPPER}} #footer h1, {{WRAPPER}} #footer h2, {{WRAPPER}} #footer h3, {{WRAPPER}} #footer h4, {{WRAPPER}} #footer h5, {{WRAPPER}} #footer h6',
            ]
        );

        // $element->add_control(
            // 'h_footer_action_box',
            // [
                // 'label' => esc_html__( 'Action Box', 'grower' ),
                // 'type' => Controls_Manager::HEADING,
                // 'separator' => 'before',
            // ]
        // );

        // $element->add_control(
            // 'show_action_box',
            // [
                // 'label'     => esc_html__( 'Footer Action Box', 'grower'),
                // 'type'      => Controls_Manager::SELECT,
                // 'default'   => '',
                // 'options'   => [
                    // '' => esc_html__( 'Theme Setting', 'grower'),
                    // 1 => esc_html__( 'Show', 'grower' ),
                    // 0 => esc_html__( 'Hide', 'grower' ),
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_style',
            // [
                // 'label'     => esc_html__( 'Action Box Styles', 'grower'),
                // 'type'      => Controls_Manager::SELECT,
                // 'default'   => '',
                // 'options'   => [
                    // '' => esc_html__( 'Theme Setting', 'grower'),
                    // 'style1' => esc_html__( 'Style 1', 'grower' ),
                    // 'style2' => esc_html__( 'Style 2', 'grower' ),
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_background_color',
            // [
                // 'label' => esc_html__( 'Backgound Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .overlay' => 'background-color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_heading_color',
            // [
                // 'label' => esc_html__( 'Heading Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .heading, {{WRAPPER}} .themesflat-action-box h2, {{WRAPPER}} .themesflat-action-box h3, {{WRAPPER}} .themesflat-action-box h4, {{WRAPPER}} .themesflat-action-box h5, {{WRAPPER}} .themesflat-action-box h6' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_text_color',
            // [
                // 'label' => esc_html__( 'Text Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box, {{WRAPPER}} .themesflat-action-box p' => 'color: {{VALUE}}',
                    // '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input:-moz-placeholder, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input::-moz-placeholder' => 'color: {{VALUE}}',
                    // '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input:-ms-input-placeholder' => 'color: {{VALUE}}',
                    // '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input::-webkit-input-placeholder' => 'color: {{VALUE}}',
                    // '{{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_button_text_color',
            // [
                // 'label' => esc_html__( 'Button Text Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_button_background_color',
            // [
                // 'label' => esc_html__( 'Button Background Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"], {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]' => 'background-color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_button_text_color_hover',
            // [
                // 'label' => esc_html__( 'Button Text Hover Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]:hover' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'action_box_button_background_color_hover',
            // [
                // 'label' => esc_html__( 'Button Hover Background Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .themesflat-action-box .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style1 .mc4wp-form input[type="submit"]:hover, {{WRAPPER}} .themesflat-action-box.style2 .mc4wp-form input[type="submit"]:hover' => 'background-color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );

        // $element->add_control(
            // 'h_footer_info',
            // [
                // 'label' => esc_html__( 'Footer Info', 'grower' ),
                // 'type' => Controls_Manager::HEADING,
                // 'separator' => 'before',
            // ]
        // );
        // $element->add_control(
            // 'show_footer_info',
            // [
                // 'label'     => esc_html__( 'Footer Info', 'grower'),
                // 'type'      => Controls_Manager::SELECT,
                // 'default'   => '',
                // 'options'   => [
                    // '' => esc_html__( 'Theme Setting', 'grower'),
                    // 1 => esc_html__( 'Show', 'grower' ),
                    // 0 => esc_html__( 'Hide', 'grower' ),
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'footer_info_background',
            // [
                // 'label' => esc_html__( 'Backgound Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .info-footer .wrap-info-item' => 'background-color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'footer_info_color_icon',
            // [
                // 'label' => esc_html__( 'Icon Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .info-footer .wrap-info .icon-info, {{WRAPPER}} .info-footer .wrap-info .icon-info svg' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );
        // $element->add_control(
            // 'footer_info_color_text',
            // [
                // 'label' => esc_html__( 'Text Color', 'grower' ),
                // 'type' => Controls_Manager::COLOR,
                // 'selectors' => [
                    // '{{WRAPPER}} .info-footer .wrap-info .content' => 'color: {{VALUE}}',
                // ],
                // 'condition' => [ 'hide_footer' => 'block' ]
            // ]
        // );

        // Bottom
        $element->add_control(
            'bottom_heading',
            [
                'label'     => esc_html__( 'Bottom', 'grower'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_control(
            'hide_bottom',
            [
                'label'     => esc_html__( 'Hide?', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'block',
                'options'   => [
                    'none'       => esc_html__( 'Yes', 'grower'),
                    'block'      => esc_html__( 'No', 'grower'),
                ],
                'selectors'  => [
                    '{{WRAPPER}} #bottom' => 'display: {{VALUE}};' 
                ],
            ]
        );

        $element->add_control(
            'bottom_style',
            [
                'label'     => esc_html__( 'Styles', 'grower'),
                'type'      => Controls_Manager::SELECT,
                'default'   => '',
                'options'   => [
                    '' => esc_html__( 'Theme Setting', 'grower'),
                    'bottom-style1' => esc_html__( 'Style 1', 'grower' ),
                    'bottom-style2' => esc_html__( 'Style 2', 'grower' ),
                ],
                'condition' => [ 'hide_bottom' => 'block' ]
            ]
        );

        $element->add_control(
            'bottom_color',
            [
                'label' => esc_html__( 'Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom *' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bottom, {{WRAPPER}} .bottom a' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_bottom' => 'block' ]
            ]
        );

        $element->add_control(
            'bottom_accent_color',
            [
                'label' => esc_html__( 'Accent Color', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bottom a:hover' => 'color: {{VALUE}}',
                ],
                'condition' => [ 'hide_bottom' => 'block' ]
            ]
        );

        $element->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'bottom_bg',
                'label' => esc_html__( 'Background', 'grower' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} #bottom',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'bottom_border',
                'label' => esc_html__( 'Border', 'grower' ),
                'selector' => '{{WRAPPER}} #bottom .container-inside',
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        $element->add_responsive_control(
            'bottom_padding',
            [
                'label' => esc_html__( 'Padding', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #bottom .container-inside' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [ 'hide_bottom' => 'block']
            ]
        );

        //Extra Classes Footer
        $element->add_control(
            'extra_classes_footer',
            [
                'label'   => esc_html__( 'Extra Classes', 'grower' ),
                'type'    => Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_page($element) {
        $post_id = $element->get_id();
        $post_type = get_post_type($post_id);
        
        // TF Page
        $element->start_controls_section(
            'themesflat_page_options',
            [
                'label' => esc_html__('TF Page', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        if ( ($post_type !== 'post') && ($post_type !== 'portfolios') && ($post_type !== 'services') && ($post_type !== 'doctor') ) {
            $element->add_control(
                'page_sidebar_layout',
                [
                    'label'     => esc_html__( 'Sidebar Position', 'grower'),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => '',
                    'options'   => [
                        '' => esc_html__( 'No Sidebar', 'grower'),
                        'sidebar-right'     => esc_html__( 'Sidebar Right','grower' ),
                        'sidebar-left'      =>  esc_html__( 'Sidebar Left','grower' ),
                        'fullwidth'         =>   esc_html__( 'Full Width','grower' ),
                        'fullwidth-small'   =>   esc_html__( 'Full Width Small','grower' ),
                        'fullwidth-center'  =>   esc_html__( 'Full Width Center','grower' ),
                    ],
                ]
            );
        }

        $element->add_control(
            'main_content_background',
            [
                'label' => esc_html__( 'Background', 'grower' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .themesflat-boxed' => 'background: {{VALUE}};',                  
                ],
            ]
        );

        $element->add_control(
            'main_content_heading',
            [
                'label'     => esc_html__( 'Main Content', 'grower'),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $element->add_responsive_control(
            'main_content_padding',
            [
                'label' => esc_html__( 'Padding', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'padding-top: {{TOP}}{{UNIT}}; padding-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        ); 

        $element->add_responsive_control(
            'main_content_margin',
            [
                'label' => esc_html__( 'Margin', 'grower' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => [ 'top', 'bottom' ],
                'selectors' => [
                    '{{WRAPPER}} #themesflat-content' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_doctor($element) {
        // TF Doctor
        $element->start_controls_section(
            'themesflat_doctor_options',
            [
                'label' => esc_html__('TF Doctor', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'doctor_post_heading',
            [
                'label'     => esc_html__( 'Doctor Post Meta', 'grower'),
                'type'      => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'doctor_post_icon_phone',
            [
                'label' => esc_html__( 'Post Icon Phone', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'grower-icon-phone2',
                    'library' => 'grower_icon',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_phone',
            [
                'label' => esc_html__( 'Phone', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '012 345 678 9101', 'grower' ),
                'placeholder' => esc_html__( '012 345 678 9101', 'grower' ),
                'label_block' => true,
            ]
        );

        $element->add_control(
            'doctor_post_icon_mail',
            [
                'label' => esc_html__( 'Post Icon Mail', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'grower-icon-mail',
                    'library' => 'grower_icon',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_mail',
            [
                'label' => esc_html__( 'Mail', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'yourmail.@gmail.com', 'grower' ),
                'placeholder' => esc_html__( 'yourmail.@gmail.com', 'grower' ),
                'label_block' => true,
            ]
        );

        $element->add_control(
            'doctor_post_button',
            [
                'label' => esc_html__( 'Button Text', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Book Appointment', 'grower' ),
                'placeholder' => esc_html__( 'Book Appointment', 'grower' ),
                'label_block' => true,
            ]
        );
        $element->add_control(
            'doctor_post_button_link',
            [
                'label' => esc_html__( 'Button Link', 'grower' ),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'grower' ),
                'default' => [
                    'url' => '/book-appointment',
                    'is_external' => false,
                    'nofollow' => false,
                    'custom_attributes' => '',
                ],
                'condition' => [
                    'doctor_post_button!' => '',
                ],
            ]
        );

        $element->add_control(
            'doctor_post_position',
            [
                'label' => esc_html__( 'Position', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Design Expert', 'grower' ),
                'placeholder' => esc_html__( 'Design Expert', 'grower' ),
                'label_block' => true,
            ]
        );

        $element->add_control(
            'doctor_post_social_heading',
            [
                'label'     => esc_html__( 'Doctor Post Social', 'grower'),
                'type'      => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'doctor_post_social_icon_1',
            [
                'label' => esc_html__( 'Icon 1', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-brands',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_social_link_1',
            [
                'label' => esc_html__( 'Link 1', 'grower' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'grower' ),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'doctor_post_social_icon_1[value]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'doctor_post_social_icon_2',
            [
                'label' => esc_html__( 'Icon 2', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-twitter',
                    'library' => 'fa-brands',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_social_link_2',
            [
                'label' => esc_html__( 'Link 2', 'grower' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'grower' ),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'doctor_post_social_icon_2[value]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'doctor_post_social_icon_3',
            [
                'label' => esc_html__( 'Icon 3', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-google-plus-g',
                    'library' => 'fa-brands',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_social_link_3',
            [
                'label' => esc_html__( 'Link 3', 'grower' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'grower' ),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'doctor_post_social_icon_3[value]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $element->add_control(
            'doctor_post_social_icon_4',
            [
                'label' => esc_html__( 'Icon 4', 'grower' ),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-instagram',
                    'library' => 'fa-brands',
                ],
            ]
        );
        $element->add_control(
            'doctor_post_social_link_4',
            [
                'label' => esc_html__( 'Link 4', 'grower' ),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'grower' ),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'doctor_post_social_icon_4[value]',
                            'operator' => '!=',
                            'value' => '',
                        ],
                    ],
                ],
            ]
        );

        $element->end_controls_section();
    }

    public function themesflat_options_portfolio($element) {
        // TF Portfolio
        $element->start_controls_section(
            'themesflat_portfolio_options',
            [
                'label' => esc_html__('TF Portfolio', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'portfolio_post_heading',
            [
                'label'     => esc_html__( 'Portfolio Post Meta', 'grower'),
                'type'      => Controls_Manager::HEADING,
            ]
        );
        $element->add_control(
            'portfolio_post_clients',
            [
                'label' => esc_html__( 'Clients', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Jonatha Doe', 'grower' ),
                'placeholder' => esc_html__( 'Jonatha Doe', 'grower' ),
                'label_block' => true,
            ]
        );
        $element->add_control(
            'portfolio_post_location',
            [
                'label' => esc_html__( 'Location', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'New York', 'grower' ),
                'placeholder' => esc_html__( 'New York', 'grower' ),
                'label_block' => true,
            ]
        );
        $element->add_control(
            'portfolio_post_position',
            [
                'label' => esc_html__( 'Position', 'grower' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Nec vehicula', 'grower' ),
                'placeholder' => esc_html__( 'Nec vehicula', 'grower' ),
                'label_block' => true,
            ]
        );
        $element->end_controls_section();
    }

    public function themesflat_options_services($element) {
        // TF Services
        $element->start_controls_section(
            'themesflat_services_options',
            [
                'label' => esc_html__('TF Services', 'grower'),
                'tab' => Controls_Manager::TAB_SETTINGS,
            ]
        );

        $element->add_control(
            'services_post_heading',
            [
                'label'     => esc_html__( 'Services Post', 'grower'),
                'type'      => Controls_Manager::HEADING,
            ]
        );

        $element->add_control(
            'services_post_icon',
            [
                'label' => esc_html__( 'Post Icon', 'grower' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'grower-medical-icon-015-neurology-1',
                    'library' => 'grower_icon',
                ],
            ]
        );

        $element->end_controls_section();
    }
}

new themesflat_options_elementor();