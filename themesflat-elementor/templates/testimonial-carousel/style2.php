<?php foreach ($settings['carousel_list'] as $carousel): ?>
	<div class="testimonials-box-style item">	
		<div class="slider-testi">		
			<img alt="image" src="<?php echo esc_attr($carousel['avatar']['url']); ?>">		
			<h3 class="title-testimonials">			
			<?php echo sprintf( '%1$s', $carousel['description'] ); ?>		
			</h3>	</div>									
			<div class="title-designer-01"><?php echo esc_attr($carousel['name']); ?></div> 	
			<div class="title-designer-02"><?php echo esc_attr($carousel['position']); ?>
			</div>																							
	</div>
<?php endforeach;?>

