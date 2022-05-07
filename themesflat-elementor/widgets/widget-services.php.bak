<?php
class TFServices_Widget extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-services';
    }
    
    public function get_title() {
        return esc_html__( 'TF Services', 'themesflat-elementor' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
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
		                'default' => '6',
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
						'options' => ThemesFlat_Addon_For_Elementor_Carenow::tf_get_taxonomies('services_category'),
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
					'excerpt_lenght',
					[
						'label' => esc_html__( 'Excerpt Length', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::NUMBER,
						'min' => 0,
						'max' => 500,
						'step' => 1,
						'default' => 20,
					]
				);

				$this->add_control( 
		        	'layout',
					[
						'label' => esc_html__( 'Columns', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'column-3',
						'options' => [
							'column-1' => esc_html__( '1', 'themesflat-elementor' ),
							'column-2' => esc_html__( '2', 'themesflat-elementor' ),
							'column-3' => esc_html__( '3', 'themesflat-elementor' ),
							'column-4' => esc_html__( '4', 'themesflat-elementor' ),
						],
					]
				);	

				$this->add_control( 
		        	'style',
					[
						'label' => esc_html__( 'Styles', 'themesflat-elementor' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'default' => 'style1',
						'options' => [
							'style1' => esc_html__( 'Style 1', 'themesflat-elementor' ),
							'style2' => esc_html__( 'Style 2', 'themesflat-elementor' ),
							// 'style3' => esc_html__( 'Style 3', 'themesflat-elementor' ),
						],
					]
				);		
			
			$this->end_controls_section();
        // /.End Posts Query
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'tf_services_wrap', ['id' => "tf-services-{$this->get_id()}", 'class' => ['tf-services-wrap', 'themesflat-services-taxonomy', $settings['style'] ], 'data-tabid' => $this->get_id()] );


		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => 'services',
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );

        if (! empty( $settings['posts_categories'] )) {        	
        	$query_args['tax_query'] = array(
							        array(
							            'taxonomy' => 'services_category',
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

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
		<div <?php echo $this->get_render_attribute_string('tf_services_wrap'); ?>>
			<div class="wrap-services-post row <?php echo esc_attr($settings['layout']); ?>">
				<?php while ( $query->have_posts() ) : $query->the_post(); 
					$terms = get_the_terms( get_the_ID(), 'services_category' );
					$term = ( $terms ) ? end($terms) : '';
				?>
					<div class="col-md-3 col-sm-6">
						<?php if ($settings['style'] == 'style1') : ?>
							<div class="box-service wow fadeInUp" >
								<?php if ( has_post_thumbnail() ): ?>
								<?php 
									$get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
								?>
								<?php endif; ?>
								<div class="inner-box-service">
									<?php if($term):?>
									<p class="wrap-title bottom20"> <?= $term->name; ?> </p> 
									<?php endif; ?>
									<a href="<?php echo get_the_permalink(); ?>" class=""> <h3> <?php echo get_the_title(); ?>  </h3> </a>
									<p class="subtext-service">
										<?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?>
									</p>
									<a href="<?php echo get_the_permalink(); ?>" class="icon-right"><i class="fa fa-angle-right" aria-hidden="true"></i> </a>
								</div>
							</div>
	                        <div class="services-post services-post-<?php the_ID(); ?>" style="display:none;">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content"> 
	                                <h2 class="title">
	                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
	                                </h2>
	                                <div class="desc"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>                                                
	                                <div class="tf-button-container">
	                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn tf-button bt_icon_after"><?php esc_html_e('Read More', 'themesflat-elementor') ?> <i class="carenow-icon-arrow-right-small"></i></a>
	                                </div>                               
	                            </div>
	                        </div>
                    	<?php elseif ($settings['style'] == 'style2') : ?>
	                    	<div class="services-post services-post-<?php the_ID(); ?>">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content">
	                            	<div class="inner-content">
		                                <h2 class="title">
		                                	<?php 
		                                	$services_post_icon  = \Elementor\Addon_Elementor_Icon_manager_carenow::render_icon( themesflat_get_opt_elementor('services_post_icon'), [ 'aria-hidden' => 'true' ] );
		                                	if ($services_post_icon) {
	                                            echo '<span class="post-icon">'.$services_post_icon.'</span>';
	                                        }
		                                	?>
		                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		                                </h2>
		                                <div class="desc"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>
	                            	</div>
	                            </div>
	                        </div>
	                    <?php elseif ($settings['style'] == 'style3') : ?>
	                    	<div class="services-post services-post-<?php the_ID(); ?>">
	                        	<?php if ( has_post_thumbnail() ): ?>
	                            <div class="featured-post">
	                                <a href="<?php echo get_the_permalink(); ?>">
	                                <?php 
	                                $get_id_post_thumbnail = get_post_thumbnail_id();
									echo sprintf('<img src="%s" alt="image">', \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_id_post_thumbnail, 'thumbnail', $settings ));
	                                ?>
	                                </a>
	                            </div>
	                        	<?php endif; ?>
	                            <div class="content">                               	
	                                <h2 class="title">
	                                    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
	                                </h2>
	                                <div class="desc"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '' ); ?></div>                       
	                            </div>
	                            <div class="tf-button-container">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn tf-button bt_icon_after"><?php esc_html_e('Read More', 'themesflat-elementor') ?> <i class="carenow-icon-arrow-right-small"></i></a>
                                </div> 
	                        </div>
                    	<?php endif; ?>
                    </div> 
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<?php
		else:
			esc_html_e('No posts found', 'themesflat-elementor');
		endif;
			
	}	

}