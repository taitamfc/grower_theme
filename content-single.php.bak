<?php
/**
 * @package grower
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single main-post' ); ?>>
	<!-- begin feature-post single  -->
	<?php get_template_part( 'tpl/feature-post-single'); ?>
	<!-- end feature-post single-->
	<?php if ( themesflat_get_opt('blog_featured_title') != '' ): ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="heading-post">	
		<h1 class="post-title"><?php the_title(); ?></h2>							
	</div>
	<?php endif; ?>
	<div class="main-post">		
		<div class="entry-content clearfix">
			<div class="entry-content-wrap">
					<?php the_content(); ?>
			</div>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grower' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
				) );
				?>
		</div><!-- .entry-content -->
		<?php if( themesflat_get_opt('show_entry_footer_content') == 1 ): ?>		
			<?php themesflat_entry_footer(); ?>
		<?php endif; ?>
	</div><!-- /.main-post -->
</article>	