<?php
class TFCounter_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tf-counter';
	}

	public function get_title()
	{
		return esc_html__('TF Counter', 'themesflat-elementor');
	}

	public function get_icon()
	{
		return 'eicon-counter';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	public function get_style_depends()
	{
		return ['tf-counter'];
	}

	public function get_script_depends()
	{
		return ['elementor-waypoints', 'jquery-numerator', 'tf-counter'];
	}

	protected function register_controls()
	{
		// Start Counter        
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => esc_html__('Counter', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'style',
			[
				'label' => esc_html__('Style', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'default'  => esc_html__('Default', 'themesflat-elementor'),
					'style1'  => esc_html__('Style 1', 'themesflat-elementor'),
					'style2' => esc_html__('Style 2', 'themesflat-elementor'),
					'style3' => esc_html__('Style 3', 'themesflat-elementor'),
					'style4' => esc_html__('Style 4', 'themesflat-elementor'),
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->add_control(
			'starting_number',
			[
				'label' => esc_html__('Starting Number', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 0,
			]
		);


		$this->add_control(
			'ending_number',
			[
				'label' => esc_html__('Ending Number', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 678,
			]
		);
		$this->add_control(
			'percent_number',
			[
				'label' => esc_html__('Percent Number', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 100,
				'max' => 100,
			]
		);
		$this->add_control(
			'color_number',
			[
				'label' => esc_html__('Color Number', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);
		$this->add_control(
			'percent_number',
			[
				'label' => esc_html__('Percent Number', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 100,
				'max' => 100,
			]
		);

		$this->add_control(
			'prefix',
			[
				'label' => esc_html__('Number Prefix', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => 1,
			]
		);

		$this->add_control(
			'suffix',
			[
				'label' => esc_html__('Number Suffix', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => esc_html__('Plus', 'themesflat-elementor'),
			]
		);

		$this->add_control(
			'duration',
			[
				'label' => esc_html__('Animation Duration', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 2000,
				'min' => 100,
				'step' => 100,
			]
		);

		$this->add_control(
			'thousand_separator_char',
			[
				'label' => esc_html__('Separator', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => 'Default',
					',' => 'Commas',
					'.' => 'Dot',
					' ' => 'Space',
				],
				'default' => '',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__('Happy Customers', 'themesflat-elementor'),
			]
		);

		$this->end_controls_section();
		// /.End Counter  

		// Start General
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => esc_html__('General', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'align',
			[
				'label' => esc_html__('Alignment', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__('Left', 'themesflat-elementor'),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__('Center', 'themesflat-elementor'),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__('Right', 'themesflat-elementor'),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'backround-wrap',
			[
				'label' => esc_html__('Background Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__('Border', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-counter',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__('Border Radius', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__('Padding', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '34',
					'right' => '30',
					'bottom' => '43',
					'left' => '31',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-counter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'line_color',
			[
				'label' => esc_html__('Line Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#33B9CB',
				'selectors' => [
					'{{WRAPPER}} .tf-counter.style1:after' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'style' => 'style1'
				],
			]
		);

		$this->end_controls_section();
		// /.End General          

		// Start Style Icon
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size_wrap',
			[
				'label' => esc_html__('Icon Size', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 350,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Icon Font Size', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .tf-counter .counter-icon svg' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#33B9CB',
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .tf-counter .counter-icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .tf-counter.style1:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__('Icon Background', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__('Border', 'themesflat-elementor'),
				'selector' => '{{WRAPPER}} .tf-counter .counter-icon',
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__('Border Radius', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'margin_icon',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '30',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Icon

		// Start Style Number
		$this->start_controls_section(
			'section_style_number',
			[
				'label' => esc_html__('Number', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => esc_html__('Text Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1F242C',
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_number',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_family' => [
						'default' => 'Jost',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '46',
						],
					],
					'font_weight' => [
						'default' => '500',
					],
					'line_height' => [
						'default' => [
							'unit' => 'em',
							'size' => '1',
						],
					],
					'text_transform' => [
						'default' => '',
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '-2',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_shadow',
				'selector' => '{{WRAPPER}} .tf-counter .counter-number-wrapper',
			]
		);

		$this->add_responsive_control(
			'margin_number',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '13',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-number-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Number

		// Start Style Title
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__('Title', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Text Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#1F242C',
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_title',
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_family' => [
						'default' => 'Jost',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '20',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'em',
							'size' => '1',
						],
					],
					'text_transform' => [
						'default' => '',
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '0',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tf-counter .counter-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'selector' => '{{WRAPPER}} .tf-counter .counter-title',
			]
		);

		$this->add_responsive_control(
			'margin_title',
			[
				'label' => esc_html__('Margin', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'default' => [
					'top' => '0',
					'right' => '0',
					'bottom' => '0',
					'left' => '0',
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-counter .counter-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style Title
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('tf_counter', ['id' => "tf-counter-{$this->get_id()}", 'class' => ['tf-counter', $settings['style']], 'data-tabid' => $this->get_id()]);

		$counter_icon = $counter_title = $counter_prefix = $counter_number = $counter_suffix = '';

		$icon = \Elementor\Addon_Elementor_Icon_manager_carenow::render_icon($settings['icon'], ['aria-hidden' => 'true']);
		if ($icon) {
			$counter_icon = sprintf('<div class="counter-icon">%1$s</div>', $icon);
		}

		if ($settings['prefix']) {
			$counter_prefix = sprintf('<span class="counter-number-prefix">%1$s</span>', $settings['prefix']);
		}

		$counter_number = sprintf('<span class="counter-number" data-from_value="%1$s" data-to_value="%2$s" data-duration="%3$s" data-delimiter="%4$s">%1$s</span>', $settings['starting_number'], $settings['ending_number'], $settings['duration'], $settings['thousand_separator_char']);


		if ($settings['suffix']) {
			$counter_suffix = sprintf('<span class="counter-number-suffix">%1$s</span>', $settings['suffix']);
		}

		if ($settings['title']) {
			$counter_title = sprintf('<div class="counter-title">%1$s</div>', $settings['title']);
		}

		if ($settings['percent_number']) {
			$percent_number = sprintf('%1$s', $settings['percent_number']);
		}


		$content = sprintf('<div class="wrap-counter">
								%5$s
								<div class="counter-number-wrapper">									
									%1$s%2$s%3$s
								</div>
								%4$s
							</div>', $counter_prefix, $counter_number, $counter_suffix, $counter_title, $counter_icon);

		if ($settings['style'] == "style2") {
			$content = sprintf('<div class="wrap-counter">
								<div class="wrap-icon-title">
									%5$s
									<div class="counter-number-wrapper">
										%1$s%2$s%3$s
									</div>
								</div>
								%4$s
							</div>', $counter_prefix, $counter_number, $counter_suffix, $counter_title, $counter_icon);
		}

		if ($settings['style'] == "style3") {
			$content = sprintf('<div class="wrap-counter">
								%5$s
								<div class="wrap-number-title">
									<div class="counter-number-wrapper">
										%1$s%2$s%3$s
									</div>
									%4$s
								</div>
								
							</div>', $counter_prefix, $counter_number, $counter_suffix, $counter_title, $counter_icon);
		}
		if ($settings['style'] == "style4") {


			$content = sprintf('<div class="tf_counter-item" data-percent="%5$s">
			<span class="bar-circle-right"></span>
			<span class="bar-circle-left"></span>
			<span class="bar-circle-cover"></span>
			<b style="display:none ">%5$s</b>
			%2$s
		</div>
		%4$s
		', $counter_prefix, $counter_number, $counter_suffix, $counter_title, $percent_number);
		}

		echo sprintf(
			'<div %1$s> 
				%2$s                
            </div>',
			$this->get_render_attribute_string('tf_counter'),
			$content
		);
	}
}
