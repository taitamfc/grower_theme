<?php
class TFproject_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfproject';
    }
    
    public function get_title() {
        return esc_html__( 'TF Project', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_style_depends() {
		return ['owl-carousel'];
	}

	public function get_script_depends() {
		return ['owl-carousel', 'tf-project'];
	}

	protected function register_controls() {
        // Start Posts Query        
			$this->start_controls_section( 
				'section_posts_query',
	            [
	                'label' => esc_html__('Query', 'themesflat-elementor'),
	            ]
	        );	

			$this->add_control( 
				'posts_per_page',
	            [
	                'label' => esc_html__( 'Posts Per Page', 'themesflat-elementor' ),
	                'type' => \Elementor\Controls_Manager::NUMBER,
	                'default' => '9',
	            ]
	        );

	        $this->add_control( 
	        	'order_by',
				[
					'label' => esc_html__( 'Order By', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'date',
					'options' => [						
			            'date' => 'Date',
			            'ID' => 'Post ID',			            
			            'title' => 'Title',
					],
				]
			);

			$this->add_control( 
				'order',
				[
					'label' => esc_html__( 'Order', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [						
			            'desc' => 'Descending',
			            'asc' => 'Ascending',	
					],
				]
			);

			$this->add_control( 
				'posts_categories',
				[
					'label' => esc_html__( 'Categories', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => ThemesFlat_Addon_For_Elementor_Carenow::tf_get_taxonomies('project_category'),
					'label_block' => true,
	                'multiple' => true,
				]
			);

			$this->add_control( 
				'exclude',
				[
					'label' => esc_html__( 'Exclude', 'themesflat-elementor' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-elementor' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->add_control( 
				'sort_by_id',
				[
					'label' => esc_html__( 'Sort By ID', 'themesflat-elementor' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Sort. Ex: 1,2,3', 'themesflat-elementor' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
				]
			);

			$this->add_control(
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-project-wrap .project-post, {{WRAPPER}} .tf-widget-project-wrap .project-post:after' => 'border-radius: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-widget-project-wrap .project-post .featured-post' => 'border-radius: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-widget-project-wrap .project-post:hover .featured-post' => 'border-radius: {{SIZE}}{{UNIT}};',
					],
				]
			);	

			$this->add_control( 
	        	'layout',
				[
					'label' => esc_html__( 'Columns', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '3',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-elementor' ),
						'2' => esc_html__( '2', 'themesflat-elementor' ),
						'3' => esc_html__( '3', 'themesflat-elementor' ),
						'4' => esc_html__( '4', 'themesflat-elementor' ),
						'5' => esc_html__( '5', 'themesflat-elementor' ),
					],
				]
			);

			$this->add_control( 
	        	'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style1',
					'options' => [
						'style1' => esc_html__( 'Style 1', 'themesflat-elementor' ),
						'style2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
					],
				]
			);

			$this->add_control(
				'spacing_item',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 5,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-project-wrap .wrap-project-post .item' => 'padding-left: calc( {{SIZE}}{{UNIT}} / 2 );padding-right: calc( {{SIZE}}{{UNIT}} / 2 );',
						'{{WRAPPER}} .tf-widget-project-wrap .wrap-project-post .item .project-post' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel!' => 'yes',
					],
				]
			);					

			$this->add_control(
				'h_style_filter',
				[
					'label' => esc_html__( 'Filter', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'show_filter',
				[
					'label' => esc_html__( 'Filter', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'filter_category_order',
				[
					'label' => esc_html__( 'Filter Order', 'themesflat-elementor' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Filter Slug Categories Order Split By ","', 'themesflat-elementor' ),
					'default' => '',
					'label_block' => true,	
					'condition' => [
						'show_filter' => 'yes',
					],			
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'filter_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'selector' => '{{WRAPPER}} .tf-widget-project-wrap .project-filter li a',
					'condition' => [
						'show_filter' => 'yes',
					],
				]
			); 

			$this->add_control( 
				'filter_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-project-wrap .project-filter li a' => 'color: {{VALUE}}',				
					],
					'condition' => [
						'show_filter' => 'yes',
					],
				]
			);

			$this->add_control( 
				'filter_color_hover',
				[
					'label' => esc_html__( 'Color Hover & Active', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-project-wrap .project-filter li a:hover' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-widget-project-wrap .project-filter li.active a' => 'color: {{VALUE}}',				
					],
					'condition' => [
						'show_filter' => 'yes',
					],
				]
			);

			$this->add_control( 
				'carousel',
				[
					'label' => esc_html__( 'Carousel', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-elementor' ),
					'label_off' => esc_html__( 'Off', 'themesflat-elementor' ),
					'return_value' => 'yes',
					'default' => 'no',	
					'separator' => 'before',
					'condition' => [
						'show_filter!' => 'yes'
					]		
				]
			);

			$this->add_control(
				'spacing_item_carousel',
				[
					'label' => esc_html__( 'Spacing', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 50,
					'step' => 1,
					'default' => 30,
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->end_controls_section();
        // /.End Posts Query

		// Start Style
	        $this->start_controls_section( 'section_post_excerpt',
	            [
	                'label' => esc_html__( 'Style', 'themesflat-elementor' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'h_style_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'selector' => '{{WRAPPER}} .tf-project-wrap .tf-project .project-post .title',
				]
			); 

			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .title a' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .title a:hover' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control(
				'h_style_category',
				[
					'label' => esc_html__( 'Category', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'category_typography',
					'label' => esc_html__( 'Typography', 'themesflat-elementor' ),
					'selector' => '{{WRAPPER}} .tf-project-wrap .tf-project .project-post .post-meta',
				]
			); 

			$this->add_control( 
				'category_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .post-meta a' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'category_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .post-meta a:hover' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control(
				'h_style_btn',
				[
					'label' => esc_html__( 'Button', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'btn_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .content .tf-button' => 'color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'btn_bgcolor',
				[
					'label' => esc_html__( ' Background', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .content .tf-button' => 'background-color: {{VALUE}}',				
					],
				]
			);

			$this->add_control( 
				'btn_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .content .tf-button:hover' => 'color: {{VALUE}}',				
					],
				]
			);			

			$this->add_control( 
				'btn_bgcolor_hover',
				[
					'label' => esc_html__( ' Background Hover', 'themesflat-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-project-wrap .tf-project .project-post .content .tf-button:hover' => 'background-color: {{VALUE}}',				
					],
				]
			);
			        
        	$this->end_controls_section();    
	    // /.End Style 
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();		

		$this->add_render_attribute( 'tf_project_wrap', ['id' => "tf-project-{$this->get_id()}", 'class' => ['tf-project-wrap', 'tf-widget-project-wrap', $settings['style'] ], 'data-tabid' => $this->get_id()] );

		$show_filter_class = '';

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'project',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );

        if (! empty( $settings['posts_categories'] )) {        	
        	$query_args['tax_query'] = array(
							        array(
							            'taxonomy' => 'project_category',
							            'field'    => 'slug',
							            'terms'    => $settings['posts_categories']
							        ),
							    );
        }        
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}

		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];

		if ( $settings['sort_by_id'] != '' ) {	
			$sort_by_id = array_map( 'trim', explode( ',', $settings['sort_by_id'] ) );
			$query_args['post__in'] = $sort_by_id;
			$query_args['orderby'] = 'post__in';
		}

		$class_carousel = $data_carousel = $row = '';
		if ($settings['carousel'] == 'yes') {
			$class_carousel = 'owl-carousel owl-theme';
		}else {
			$row = 'row';
		}		
		
		$count = 1;
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
		<div <?php echo $this->get_render_attribute_string('tf_project_wrap'); ?>>
			<div class="tf-project">
				<?php
				if ($settings['show_filter'] == 'yes'):
					$show_filter_class = 'show-filter'; 
					$filter_category_order = $settings['filter_category_order'];
					$filters = wp_list_pluck( get_terms( 'project_category','hide_empty=1'), 'name','slug' );
					echo '<ul class="project-filter posttype-filter">';
						echo '<li class="active"><a data-filter="*" href="#">' . esc_html__( 'All', 'zev' ) . '</a></li>'; 
						if ($filter_category_order == '') { 

							foreach ($filters as $key => $value) {
								echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
							}
						
						}
						else {
							$filter_category_order = explode(",", $filter_category_order);
							foreach ($filter_category_order as $key) {
								$key = trim($key);
								echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $filters[$key] ) . '">' . esc_html( $filters[$key] ) . '</a></li>'; 
							}
						}
	                echo '</ul>';
	            endif;            
				?>
				<div class="container-filter wrap-project-post <?php echo esc_attr($row); ?> <?php echo 'column-'.esc_attr($settings['layout']); ?> <?php echo esc_attr($show_filter_class); ?> <?php echo esc_attr($class_carousel); ?>" data-items="<?php echo esc_attr($settings['layout']); ?>" data-space="<?php echo esc_attr($settings['spacing_item_carousel']); ?>" data-center="true" data-autoplay="true" >
					<?php while ( $query->have_posts() ) : $query->the_post();
						$get_id_post_thumbnail = get_post_thumbnail_id();
						$featured_image = '';
						$featured_image = sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));					
						?>
						<?php 
						global $post;
				        $id = $post->ID;
				        $termsArray = get_the_terms( $id, 'project_category' );
				        $termsString = "";

				        if ( $termsArray ) {
				        	foreach ( $termsArray as $term ) {
				        		$itemname = strtolower( $term->slug ); 
				        		$itemname = str_replace( ' ', '-', $itemname );
				        		$termsString .= $itemname.' ';
				        	}
				        }
						?>
						<?php if ($settings['style'] == 'style1'): ?>
							<div class="item <?php echo esc_attr( $termsString ); ?>">
		                        <div class="project-post project-post-<?php the_ID(); ?>">
		                            <div class="featured-post">
		                                <a href="<?php echo get_the_permalink(); ?>">
		                                <?php echo sprintf('%s',$featured_image); ?>
		                                </a>
		                            </div>
		                            <div class="content">
		                                <div class="inner-content">                                
		                                    <div class="post-meta">
		                                        <?php echo the_terms( get_the_ID(), 'project_category', '', ' , ', '' ); ?>
		                                    </div>
		                                    <h2 class="title">
		                                         <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		                                    </h2>                                               
		                                    <div class="tf-button-container">
		                                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="tf-button bt_icon_after"><i class="fas fa-arrow-right"></i></a>
		                                    </div>
		                                </div>                                              
		                            </div>
		                        </div>
		                    </div> 
	                    <?php elseif ($settings['style'] == 'style2'): ?>
	                    	<div class="item <?php echo esc_attr( $termsString ); ?>">
		                        <div class="project-post project-post-<?php the_ID(); ?>">
		                            <div class="featured-post">
		                                <a href="<?php echo get_the_permalink(); ?>">
		                                <?php echo sprintf('%s',$featured_image); ?>
		                                </a>
		                            </div>
		                            <div class="content">
		                                <div class="inner-content"> 
		                                	<h2 class="title">
		                                         <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		                                    </h2>                               
		                                    <div class="post-meta">
		                                        <?php echo the_terms( get_the_ID(), 'project_category', '', ' , ', '' ); ?>
		                                    </div>		                                     
		                                </div>                                              
		                            </div>
		                        </div>
		                    </div> 
                    	<?php endif; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php
		else:
			esc_html_e('No posts found', 'themesflat-elementor');
		endif;		
		
	}

	

}