<?php
/**
 * @package grower
 */
?>

<div class="our-news-box" id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<div class="img-news-box"> 
		<?php get_template_part( 'tpl/feature-post'); ?>
		<div class="overlay-news"></div>
	</div>
	<div class="list-news">
		
		<?php 
		$content_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'post_content_elements' ));
		foreach ( $content_elements as $content_element ) :
			if ( 'meta' == $content_element ) {
				get_template_part( 'tpl/entry-content/entry-content-meta' );
			} elseif ( 'title' == $content_element ) {
				get_template_part( 'tpl/entry-content/entry-content-title' );
			} elseif ( 'excerpt_content' == $content_element ) {
				get_template_part( 'tpl/entry-content/entry-content-body' );
			} elseif ( 'readmore' == $content_element ) {
				get_template_part( 'tpl/entry-content/entry-content-readmore' );
			}
		endforeach;
		?>
	</div>
</div>
<div class="item" style="display:none;">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
		<div class="main-post entry-border">
			<?php get_template_part( 'tpl/feature-post'); ?>
			
			<div class="content-post">
				<?php 
				$content_elements = themesflat_layout_draganddrop(themesflat_get_opt( 'post_content_elements' ));
				foreach ( $content_elements as $content_element ) :
					if ( 'meta' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-meta' );
					} elseif ( 'title' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-title' );
					} elseif ( 'excerpt_content' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-body' );
					} elseif ( 'readmore' == $content_element ) {
						get_template_part( 'tpl/entry-content/entry-content-readmore' );
					}
				endforeach;
				?>
			</div><!-- /.entry-post -->
		
		</div><!-- /.main-post -->
	</article><!-- #post-## -->
</div>