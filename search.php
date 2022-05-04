<?php
/**
 * The template for displaying search results pages.
 *
 * @package grower
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<div class="wrap-content-area clearfix">
				<div id="primary" class="content-area">
					<main id="main" class="post-wrap <?php echo esc_attr(themesflat_get_opt('blog_archive_layout')); ?>" role="main">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );
							?>
						<?php endwhile; ?>

						<?php
							if ( get_theme_mod( 'show_modern_pagination' ) == 1 ) {
								roll_pagination();
							} else {
								the_posts_navigation();
							}
						?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php 
					if ( themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-left' || themesflat_get_opt( 'sidebar_layout' ) == 'sidebar-right' ) :
						get_sidebar();
					endif;
				?>
			</div><!-- /.wrap-content-area -->
		</div><!-- /.col-md-12 -->
	</div>
</div>
<?php get_footer(); ?>