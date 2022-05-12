<?php
/**
 * The template for displaying all single posts.
 *
 * @package grower
 */

get_header(); ?>
<section class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<div id="primary" class="content-area">
							<main id="main" class="post-wrap" role="main">
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', 'single' ); ?>
								<div class="main-single">				
								<?php 			
								if ( 'post' == get_post_type() && themesflat_get_opt('show_post_navigator' ) != 0 ): 
									themesflat_post_navigation(); 				
								endif;
								?>
								
								<?php if ( is_user_logged_in() ) : ?>
									<?php if ( get_the_author_meta( 'description' ) ): ?>
										<div class="author-post">			
											<div class="author-body clearfix">
												<div class="author-avatar">					
													<?php
													echo get_avatar(get_the_author_meta('user_email'),$size='60');
													?>					
												</div><!--/.author-avatarr -->

												<div class="info">
													<div class="name">
														<h6><?php the_author_posts_link(); ?></h6>		        
													</div>	
													
													<p class="intro">
														<?php 
														echo get_the_author_meta( 'description' );
														?>			
													</p>			
												</div><!--/.author-info -->
											</div><!--/.author-info -->
										</div><!--/.author-body -->
									<?php endif; ?>
								<?php endif; ?>
								<?php
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
								</div><!-- /.main-single -->		
							<?php endwhile; // end of the loop. ?>
							
							<?= do_shortcode('[SHORTCODE_ELEMENTOR id="1152"]');?>
							
							</main><!-- #main -->
						</div><!-- #primary -->
					</div>
					<div class="col-md-4 col-sm-4">
						<?php  get_sidebar(); ?>
					</div>
				</div>
			</div><!-- /.col-md-12 -->
			<div class="col-md-12">
				<?php get_template_part( 'tpl/related-post' )?>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>