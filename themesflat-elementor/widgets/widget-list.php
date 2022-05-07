<?php
class TFList_Widget extends \Elementor\Widget_Base
{

	public function get_name()
	{
		return 'tf-list';
	}

	public function get_title()
	{
		return esc_html__('TF List', 'themesflat-elementor');
	}

	public function get_icon()
	{
		return 'eicon-bullet-list';
	}

	public function get_categories()
	{
		return ['themesflat_addons'];
	}

	public function get_style_depends()
	{
		return ['tf-font-awesome', 'tf-regular', 'tf-list'];
	}

	protected function register_controls()
	{
		// Start List Setting        
		$this->start_controls_section(
			'section_setting',
			[
				'label' => esc_html__('Setting', 'themesflat-elementor'),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'types',
			[
				'label' => esc_html__('Types', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'types_none' => [
						'title' => esc_html__('None', 'themesflat-elementor'),
						'icon' => 'fa fa-ban',
					],
					'types_icon' => [
						'title' => esc_html__('Icon', 'themesflat-elementor'),
						'icon' => 'fa fa-paint-brush',
					],
					'types_text' => [
						'title' => esc_html__('Text', 'themesflat-elementor'),
						'icon' => 'fa fa-text-width',
					],
					'types_img' => [
						'title' => esc_html__('Image', 'themesflat-elementor'),
						'icon' => 'fa fa-image',
					],
				],
				'default' => 'types_text',
				'toggle' => false,
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__('Icon', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-check',
					'library' => 'solid',
				],
				'condition' => [
					'types' => 'types_icon',
				],
			]
		);

		$repeater->add_control(
			'before_title',
			[
				'label' => esc_html__('Before Title', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('01', 'themesflat-elementor'),
				'label_block' => true,
				'condition' => [
					'types' => 'types_text',
				],
			]
		);
		$repeater->add_control(
			'before_img',
			[
				'label' => esc_html__('Image', 'elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'id' => get_post_thumbnail_id(),
					'url' => (string) get_the_post_thumbnail_url($document->post->ID),
				],
				'condition' => [
					'types' => 'types_img',
				],
			]


		);

		$repeater->add_control(
			'title',
			[
				'label' => esc_html__('Title', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Ligula molestie', 'themesflat-elementor'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'text',
			[
				'label' => esc_html__('Text', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__('', 'themesflat-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__('List', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'before_title' => esc_html__('01', 'themesflat-elementor'),
						'title' => esc_html__('Ligula molestie', 'themesflat-elementor'),
					],
					[
						'before_title' => esc_html__('02', 'themesflat-elementor'),
						'title' => esc_html__('Magna vivamus', 'themesflat-elementor'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
		// /.End List Setting              

		// Start Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__('Style', 'themesflat-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'distance_between',
			[
				'label' => esc_html__('Distance Between', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],
			]
		);

		$this->add_control(
			'h_before_title',
			[
				'label' => esc_html__('Before Title', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'before_position',
			[
				'label' => esc_html__('Position', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__('Start', 'themesflat-elementor'),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__('Center', 'themesflat-elementor'),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__('End', 'themesflat-elementor'),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_before_title',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
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
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '30',
						],
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '0',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tf-list .item-list .before-title',
			]
		);

		$this->add_control(
			'color_before_title',
			[
				'label' => esc_html__('Color', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .before-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'bg_before_title',
			[
				'label' => esc_html__('Backround', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#33B9CB',
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .before-title' => 'background: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_radius_before_title',
			[
				'label' => esc_html__('Border Radius', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .before-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'before_title_size',
			[
				'label' => esc_html__('Size', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .before-title' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'before_title_between',
			[
				'label' => esc_html__('Distance Between Right', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 27,
				],
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .before-title' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'h_title',
			[
				'label' => esc_html__('Title', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_title',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
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
						'default' => '700',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '30',
						],
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '0',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tf-list .item-list .title',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => esc_html__('Color Text Fisrt & Last', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#091D3E',
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
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
					'{{WRAPPER}} .tf-list .item-list .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'h_text',
			[
				'label' => esc_html__('Text', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography_text',
				'label' => esc_html__('Typography', 'themesflat-elementor'),
				'fields_options' => [
					'typography' => ['default' => 'yes'],
					'font_family' => [
						'default' => 'Rubik',
					],
					'font_size' => [
						'default' => [
							'unit' => 'px',
							'size' => '16',
						],
					],
					'font_weight' => [
						'default' => '400',
					],
					'line_height' => [
						'default' => [
							'unit' => 'px',
							'size' => '30',
						],
					],
					'letter_spacing' => [
						'default' => [
							'unit' => 'px',
							'size' => '0',
						],
					],
				],
				'selector' => '{{WRAPPER}} .tf-list .item-list .text',
			]
		);
		$this->add_control(
			'color_text',
			[
				'label' => esc_html__('Color Text Fisrt & Last', 'themesflat-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#091D3E',
				'selectors' => [
					'{{WRAPPER}} .tf-list .item-list .text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'margin_text',
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
					'{{WRAPPER}} .tf-list .item-list .text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// /.End Style 
	}

	protected function render($instance = [])
	{
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute('tf_list', ['id' => "tf-list-{$this->get_id()}", 'class' => ['tf-list'], 'data-tabid' => $this->get_id()]);

		$content = $title = $before_title = $text = '';

		foreach ($settings['list'] as $index => $item) {
			if ($item['types'] == 'types_text' && $item['before_title'] != '') {
				$before_title = '<div class="before-title"> ' . $item['before_title'] . ' </div>';
			} elseif ($item['types'] == 'types_icon') {
				$before_title = '<div class="before-title"> ' . \Elementor\Addon_Elementor_Icon_manager_carenow::render_icon($item['icon'], ['aria-hidden' => 'true']) . ' </div>';
			} elseif ($item['types'] == 'types_img') {
				// Get image URL


				$before_title = '<div class="before-title"> <img src="' . $item['before_img']['url'] . '"> </div>';
			}

			if ($item['title'] != '') {
				$title = '<div class="title">' . $item['title'] . '</div>';
			}
			if ($item['text'] != '') {
				$text = '<div class="text">' . $item['text'] . '</div>';
			}

			$content .= sprintf('<div class="item-list">
									%1$s
									<div class="content">%2$s %3$s</div>
								</div>', $before_title, $title, $text);
		}

		echo sprintf(
			'<div %1$s> 
				%2$s                
            </div>',
			$this->get_render_attribute_string('tf_list'),
			$content
		);
	}
}
