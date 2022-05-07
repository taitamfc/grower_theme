<?php foreach ($settings['carousel_list'] as $carousel): ?>	
	<div class="testi-box wow fadeInUp" >		
		<?php if ($carousel['avatar']['url']): ?>		
			<img src="<?php echo esc_attr($carousel['avatar']['url']); ?>" alt="image">		
		<?php endif; ?>		
		<?php if ($carousel['description']): ?> 		
			<h3 class=""><?php echo sprintf( '%1$s', $carousel['description'] ); ?></h3>		
		<?php endif; ?>		
		<ul class="design">					
			<?php if ($carousel['name']): ?> 				
				<li class="name-design"><?php echo esc_attr($carousel['name']); ?></li>            
			<?php endif; ?>			
			<?php if ($carousel['position']): ?> 				
				<li class="work-design"><?php echo esc_attr($carousel['position']); ?></li>			
			<?php endif; ?>				
		</ul>	
	</div>
<?php endforeach;?>

