<?php  
/**
 * @package grower
 */
?>
<div class="entry-box-title clearfix">
	<div class="wrap-entry-title">							
		<?php
		if ( is_singular('post') ) :						
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( sprintf( '<a href="%s" rel="bookmark"><h3 class="entry-title">', esc_url( get_permalink() ) ), '</h3></a>' );
		endif;
		?>										
	</div><!-- /.wrap-entry-title -->
</div>
