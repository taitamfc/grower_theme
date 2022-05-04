

<?php
// Creating the widget
class ThemesflatWidgetPaymentIcons extends WP_Widget {
	function __construct() {
		
		// Add Widget scripts
		add_action('admin_enqueue_scripts', array($this, 'scripts'));

		parent::__construct( 'ThemesflatWidgetPaymentIcons', esc_html__('[Themesflat] Payment Icons', 'grower'), array( 'description' => esc_html__('Payment Icons', 'grower')) );
		$this->arr_field = array(
			array(
				'id' => 'mobile_image',
				'text' => esc_html__( 'App Mobile Image', 'grower' ),
				'type' => 'image',
				'values' => '',
            ),
            array(
				'id' => 'mobile_link',
				'text' => esc_html__( 'App Mobile Input', 'grower' ),
				'type' => 'input',
				'values' => '',
			),
            array(
				'id' => 'payment_icon',
				'text' => esc_html__( 'Payment Icon', 'grower' ),
				'type' => 'image',
				'values' => '',
            ),			
		);
	}

	public function scripts(){
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_media();
	}

	// Creating widget front-end

	// This is where the action happens

	public function widget( $args, $instance ) {
		$mobile_image 		= esc_url($instance['mobile_image']);
		$mobile_link 		= esc_url($instance['mobile_link']);
		$payment_icon 		= esc_url($instance['payment_icon']);


		ob_start();
		?>
		<div class="payment">
            <ul class="">
                <li><a target="_blank" href="<?= $mobile_link; ?>"><img src="<?= $mobile_image; ?>" alt="Image" class="img-app"></a></li>
                <li class="img-payment"><img src="<?= $payment_icon; ?>" alt="image"></li>
            </ul>
        </div>
		<?php
		echo ob_get_clean();
	}

	// Widget Backend
	public function form( $instance ) {		
		foreach ( $this->arr_field as $key => $value) {
			$idfield = $value['id'];
			$text_field = $value['text'];			
			$valrequest = ( isset( $instance[ $idfield ] ) ) ? $instance[ $idfield ] : '';
			?>
			<div class="field_item">
				<label for="<?php echo $this->get_field_id( $idfield ); ?>"><?php _e( $text_field, 'grower' ); ?></label>
				<p>	
					<?php if ($value['type'] == 'input'): ?>
						<input class="widefat" id="<?php echo $this->get_field_id( $idfield ); ?>" name="<?php echo $this->get_field_name( $idfield ); ?>" type="text" value="<?php echo esc_attr( $valrequest ); ?>" />
					<?php elseif($value['type'] == 'select'): ?>
						<select id="<?php echo $this->get_field_id( $idfield ); ?>" name="<?php echo $this->get_field_name( $idfield ); ?>">
							<option value="">---select option----</option>
							<?php foreach ($value['values'] as $val ): ?>
								<option value="<?php echo $val ?>" <?php if ($val == $valrequest): ?> selected <?php endif ?>><?php echo $val ?></option>
							<?php endforeach ?>
						</select>
                    <?php elseif($value['type'] == 'image'): ?>
                        <input class="widefat" id="<?php echo $this->get_field_id( $idfield ); ?>" name="<?php echo $this->get_field_name( $idfield ); ?>" type="text" value="<?php echo esc_attr( $valrequest ); ?>" />
                        <input class="upload_image_button button button-primary mt-2" style="margin-top:10px" type="button" value="Upload Image" />
                    <?php elseif($value['type'] == 'textarea'): ?>
                        <textarea class="widefat" id="<?php echo $this->get_field_id( $idfield ); ?>" name="<?php echo $this->get_field_name( $idfield ); ?>"><?php echo esc_html__( $valrequest ); ?></textarea>
					<?php elseif($value['type'] == 'socials'): ?>
						<?php foreach( $value['options'] as $option ):
							$valrequest = ( isset( $instance[ $idfield.'-'.$option ] ) ) ? $instance[ $idfield.'-'.$option ] : '';
							?>
							<p>
							<label><?= ucfirst($option);?></label>
							<input class="widefat" id="<?php echo $this->get_field_id( $idfield.'-'.$option ); ?>" name="<?php echo $this->get_field_name( $idfield.'-'.$option ); ?>" type="text" value="<?php echo esc_attr( $valrequest ); ?>" />		
							</p>	
						<?php endforeach;?>
					<?php endif ?>
				</p>
			</div>
			<?php
		}		
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->arr_field as $key => $value) {			
			$instance[$value['id']] = ( ! empty( $new_instance[$value['id']] ) ) ? strip_tags( $new_instance[$value['id']] ) : '';
		}
		return $instance;
	}
}
new ThemesflatWidgetPaymentIcons();