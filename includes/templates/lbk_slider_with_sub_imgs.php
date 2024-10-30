<?php
if ( !defined ( 'ABSPATH' ) ) exit;
if( !function_exists('lbk_ux_builder_slider_with_sub_imgs') ) {
	function lbk_ux_builder_slider_with_sub_imgs(){
	    add_ux_builder_shortcode('lbk_slider_with_sub_imgs_element', array(
	        'name'      => __('LBK Slider With Sub Images'),
	        'category'  => __('LBK Content'),
	        'priority'  => 1,
	        'options' => array(
				'label' => array(
					'type' => 'textfield',
					'heading' => 'Admin label',
					'placeholder' => 'Enter admin label...'
				),
				'pages_options' => array(
					'type' => 'group',
					'heading' => __( 'Gallery' ),
					'options' => array(
						'ids' => array(
							'type' => 'gallery',
							'heading' => __( 'Images' ),
						 ),
				  	),
				),
				'auto_slide_options' => array(
					  'type' => 'group',
					  'heading' => __( 'Auto Slide' ),
					  'options' => array(
						'auto_slide' => array(
							'type' => 'radio-buttons',
							'heading' => __('Auto slide'),
							'default' => 'true',
							'options' => array(
								'false'  => array( 'title' => 'Off'),
								'true'  => array( 'title' => 'On'),
							),
						),
						'timer' => array(
							'type' => 'textfield',
							'heading' => 'Timer (ms)',
							'default' => 3000,
						),
						'pause_hover' => array(
							'type' => 'radio-buttons',
							'heading' => __('Pause on Hover'),
							'default' => 'true',
							'options' => array(
								'false'  => array( 'title' => 'Off'),
								'true'  => array( 'title' => 'On'),
							),
						),
					  ),
					),
				    'sub_slide_options' => array(
						'type' => 'group',
						'heading' => __( 'Sub Slider' ),
						'options' => array(
							'columns' => array(
								'type' => 'slider',
								'heading' => __('Columns'),
								'default' => '4',
								'max' => '8',
								'mim' => '2'
							),
							'bg_color' => array(
								'type' => 'colorpicker',
								'heading' => __('Background color'),
								'format' => 'rgb',
								'position' => 'bottom right',
								'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
							),
						),
					),
					'image_options' => array(
						'type' => 'group',
						'heading' => __( 'Image' ),
						'options' => array(
							'image_height' => array(
							  'type' => 'scrubfield',
							  'heading' => __('Height'),
							  'default' => '',
							  'placeholder' => __('Auto'),
							  'min' => 0,
							  'max' => 1000,
							  'step' => 1,
							  'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
							   'on_change' => array(
									'selector' => '.box-image-inner',
									'style' => 'padding-top: {{ value }}'
								)
							),
							'image_width' => array(
								'type' => 'slider',
								'heading' => __( 'Width' ),
								'unit' => '%',
								'default' => 100,
								'max' => 100,
								'min' => 0,
								'on_change' => array(
									'selector' => '.box-image',
									'style' => 'width: {{ value }}%'
								)
							),
							'image_size' => array(
								'type' => 'select',
								'heading' => __( 'Size' ),
								'default' => '',
								'options' => array(
									'' => 'Default',
									'large' => 'Large',
									'medium' => 'Medium',
									'thumbnail' => 'Thumbnail',
									'original' => 'Original',
								)
							),
						),
					),

				'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
	        ),
	    ));
	}
	add_action('ux_builder_setup', 'lbk_ux_builder_slider_with_sub_imgs');
}

 if( !function_exists('create_lbk_slider_with_sub_imgs')) {
 	function create_lbk_slider_with_sub_imgs($atts) {
		extract(shortcode_atts(array(
		  '_id' => 'main-'.rand(),
		  'class' => '',
		  'visibility' => '',
		  'ids' => '', // Gallery IDS
		  'orderby' => 'post__in',
      	  'order' => '',
			
			// Auto slider
		  'auto_slide' => 'true',
		  'timer' => '3000',
		  'pause_hover' => 'true',
			
		  //Sub Slider
		  'columns' => '4',
		  'bg_color' => '',
			
          //image 			
		  'image_height' => '',
		  'image_width' => ''
		
			
			
			
		  ), $atts));
		
		ob_start();
		$css_args_img = array(
			array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
			array( 'attribute' => 'padding-top', 'value' => $image_height),
		);
		
		$_attachments = get_posts( array( 'include' => $ids, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		$attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
        if ( empty( $attachments ) ) {
	        ob_end_clean();
	        return '';
        }	
		?>
		<div style = "background-color: <?php  echo $bg_color; ?>; ">
		<div class="slider-wrapper relative">
			<div class="slider slider-main slider-nav-circle slider-nav-large slider-nav-light slider-style-normal is-draggable flickity-enabled" id="<?php echo $_id; ?>"
				data-flickity-options='{
					"freeScroll": false,
					"pageDots": false,
					"prevNextButtons": false,
					"pauseAutoPlayOnHover" : true,
					"contain" : true,
					"percentPosition": true
				}'
				 style = "margin-left: -15px; margin-right: -15px;"
				>
				<?php 
				foreach ( $attachments as $id => $attachment ) {
					$content = $attachment->post_content;
					$image_output = wp_get_attachment_image( $id,  "original" , false, $atts );
					?>
					<div class="lbk-col col">
						<div class="col-inner">
							<div class="box lbk box">
								<div class="image-cover" <?php echo get_shortcode_inline_css($css_args_img); ?>>
									<?php echo $image_output; ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
		
				 ?>
			 </div>

			 <div class="loading-spin dark large centered"></div>

		</div>

		<div class="slider-wrapper relative" >
			<div class="slider slider-nav-circle slider-nav-large slider-nav-light slider-style-normal is-draggable flickity-enabled"
				data-flickity-options='{
					"asNavFor": "#<?php echo $_id; ?>",
					"pageDots": false,				   
					"cellAlign": "left",
					"freeScroll": false,
					"pauseAutoPlayOnHover" : true,
					"contain" : true,
					"percentPosition": true,
					"autoPlay" : <?php  echo intval($auto_slide); ?>,
					"pauseAutoPlayOnHover": <?php  echo intval($pause_hover); ?>
			        
				}'
				
				>
				<?php 
				foreach ( $attachments as $id => $attachment ) {
					$content = $attachment->post_content;
					$image_output = wp_get_attachment_image( $id,  "original" , false, $atts );
					?>
					<div class="lbk-col col" style = "width: <?php echo 100/intval($columns)."%";  ?>">
						<div class="col-inner">
							<div class="box lbk box">
								<div class="image-cover" <?php echo get_shortcode_inline_css($css_args_img); ?>>
									<?php echo $image_output; ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
		
				 ?>
			 </div>

			 <div class="loading-spin dark large centered"></div>

		</div>
		</div>	

		<?php
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	if(!shortcode_exists('lbk_slider_with_sub_imgs_element')) {
		add_shortcode('lbk_slider_with_sub_imgs_element', 'create_lbk_slider_with_sub_imgs');
	}
	
 }
