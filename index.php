<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package grower
 */

get_header(); ?>
<?php 
	$blog_layout = themesflat_get_opt('blog_archive_layout');
	$sidebar_layout = themesflat_get_opt('sidebar_layout');
	$columns =  themesflat_get_opt('blog_grid_columns') ;
	$col = 12 / $columns;
	$imgs = array(
		'blog-grid' => 'themesflat-blog',
		'blog-list' => 'themesflat-blog',
		);
	$class_names = array(
		1 => 'blog-one-column',
		2 => 'blog-two-columns',
		3 => 'blog-three-columns',
		4 => 'blog-four-columns',
		);		
	global $themesflat_thumbnail;
	$themesflat_thumbnail = $imgs[$blog_layout];
	$class = array('blog-archive');
	$class[] = $blog_layout;
	$class[] =  $class_names[$columns];
?>	
	
	<section class="main-blog">
		<div class="container">
			<div class="row">
				<?php if( $sidebar_layout == 'sidebar-left' ):?>
				<div class="col-md-3">
				<?php get_sidebar();?>
				</div>
				<?php endif;?>
				
				<?php if( $sidebar_layout == 'fullwidth' ):?>
				<div class="col-md-12">
				<?php elseif( $sidebar_layout == 'sidebar-right' || $sidebar_layout == 'sidebar-left' ):?>
				<div class="col-md-9">
				<?php endif;?>
					<div class="wrap-content-area clearfix">
						<div id="primary" class="content-area">
							<main id="main" class="post-wrap <?php echo esc_attr(themesflat_get_opt('blog_archive_layout')); ?>" role="main">
								<?php if ( have_posts() ) : ?>

									<?php if($blog_layout == 'blog-grid'):?>
									<div class="row wrap-blog-article <?php echo esc_attr(implode(" ",$class));?> has-post-content">
										<?php while ( have_posts() ) : the_post(); ?>
										<div class="item col-md-<?= $col; ?> col-sm-<?= $col; ?>">
											<?php
												/* Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'content', get_post_type() );
											?>
										</div>
										<?php endwhile; ?>	
									</div>
									<?php else : ?>
									<div class="wrap-blog-article <?php echo esc_attr(implode(" ",$class));?> has-post-content">
										<?php /* Start the Loop */ ?>
										<?php while ( have_posts() ) : the_post(); ?>

											<?php
												/* Include the Post-Format-specific template for the content.
												 * If you want to override this in a child theme, then include a file
												 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
												 */
												get_template_part( 'content', get_post_type() );
											?>

										<?php endwhile; ?>		
									</div>
									<?php endif; ?>
								
								<?php else : ?>

									<?php get_template_part( 'content', 'none' ); ?>

								<?php endif; ?>
							</main><!-- #main -->
							<div class="clearfix">
							<?php
								global $themesflat_paging_style, $themesflat_paging_for;
								$themesflat_paging_for = 'blog';
								$themesflat_paging_style = themesflat_get_opt('blog_archive_pagination_style');		        
								get_template_part( 'tpl/pagination' );
							?>			
							</div>
						</div><!-- #primary -->
					</div><!-- /.wrap-content-area -->
				</div><!-- /.col-md-12 -->
				<?php if( $sidebar_layout == 'sidebar-right' ):?>
				<div class="col-md-3">
					<?php get_sidebar();?>
				</div>
				<?php endif;?>
			</div><!-- /.row -->
		</div>
	</section>


<?php get_footer(); ?>