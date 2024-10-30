
<?php
if ( !defined ( 'ABSPATH' ) ) exit;
if(!function_exists('lbk_ux_builder_progess_line')) {
	function lbk_ux_builder_progess_line() {
	    add_ux_builder_shortcode('lbk_progess_line_element', array(
	        'name'      => __('LBK Progess Line'),
	        'category'  => __('LBK Content'),
	        'priority'  => 1,
	        'options' => array(
	        	'Progess_title_options' => array(
				    'type' => 'group',
				    'heading' => __( 'Title' ),
				        'options' => array(
				        	'title_text' => array(
				                'type' => 'textfield',
				                'heading' => 'Title Text',
				            ),
				            'title_size' => array(
				                'type' => 'select',
				                'heading' => 'Title Size',
				                'default' => '',
				                'options' => array(
								    'xsmall' => 'X-Small',
								    'small' => 'Small',
								    '' => 'Normal',
								    'large' => 'Large',
								    'xlarge' => 'XLarger',
								    'xxlarge' => 'XXLarger',

								),
				            ),
				            'title_style' => array(
				                'type' => 'radio-buttons',
				                'heading' => 'Title Style',
				                'default' => '',
				                'options' => array(
				                    ''   => array( 'title' => 'Abc'),
				                    'uppercase' => array( 'title' => 'ABC'),
				                )
				       		),
				       		'title_Color' => array(
				                'type' => 'colorpicker',
				                'heading' => __( 'Title Color' ),
				                'default' => '',
				                'alpha' => true,
				                'format' => 'rgb',
				                'on_change' => array(
				                    'selector' => '.progess-inner',
				                    'style' => 'background-color:{{ value }}'
				                ),
			            	),
				       		'field_color' =>	array(
				       			'type' => 'radio-buttons',
								'heading' => __( 'Color Style' ),
				                'default' => 'light',
								'options' => array(
									'light'   => array( 'title' => 'Light'),
				                    'dark' => array( 'title' => 'Dark'),
								),
							),
				    	)
				),
				'Progess_options' => array(
			        'type' => 'group',
			        'heading' => __( 'Progess' ),
			        'options' => array(

			            'progess_width' => array(
			                'type' => 'slider',
			                'heading' => __( 'Width' ),
			                'unit' => '%',
			                'default' => 50,
			                'max' => 100,
			                'min' => 0,
			                'on_change' => array(
			                    'selector' => '.lbk-progess-inner',
			                    'style' => 'width: {{ value }}%'
			                )
			            ),
			            'progess_outer_height' => array(
			                'type' => 'slider',
			                'heading' => __( 'Height' ),
			                'unit' => ' px',
			                'default' => 20,
			                'max' => 60,
			                'min' => 10,
			                'on_change' => array(
			                    'selector' => '.lbk-progess-outline',
			                    'style' => 'height: {{ value }}px'
			                )
			            ),
			            'progess_outer_width' => array(
			                'type' => 'slider',
			                'heading' => __( 'Width' ),
			                'unit' => ' px',
			                'default' => 2,
			                'max' => 10,
			                'min' => 0,
			                'on_change' => array(
			                    'selector' => '.lbk-progess-outline',
			                    'style' => 'border-width: {{ value }}px'
			                )
			            ),
			            'progess_bg' => array(
			                'type' => 'colorpicker',
			                'heading' => __( 'Progess Color' ),
			                'default' => '',
			                'alpha' => true,
			                'format' => 'rgb',
			                'on_change' => array(
			                    'selector' => '.lbk-progess-inner',
			                    'style' => 'background-color:{{ value }}'
			                )
			            ),
			            'progess_outline' => array(
			                'type' => 'colorpicker',
			                'heading' => __( 'Progess Outline Color' ),
			                'default' => '',
			                'alpha' => true,
			                'format' => 'rgb',
			                'on_change' => array(
			                    'selector' => '.lbk-progess-outline',
			                    'style' => 'border-color:{{ value }}'
			                )
			            ),
			        ),
			    ),
				
				'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
	        ),
	    ));
	}
	add_action('ux_builder_setup', 'lbk_ux_builder_progess_line');
}


if(!function_exists('create_lbk_progess_line')) {
	function create_lbk_progess_line($atts){
	   extract(shortcode_atts(array(
			'class' => '',

			//Title
			'title_text' => 'Progess',
			'title_size' => 'large',
			'title_style' => '',
			'title_color' => '',
			'field_color' => 'light',

			// Progess styles
		 	'progess_width' => '50',
		 	'progess_bg' => '',
		 	'progess_outline' => '',
		 	'progess_outer_width' => '2',
		 	'progess_outer_height' => '20'


		), $atts));

	    ob_start();

		$css_args_title = array(
		  array( 'attribute' => 'color', 'value' => $title_color, 'unit' => '' ),
		);
		$css_args_progess_inner = array(
		  array( 'attribute' => 'width', 'value' => $progess_width, 'unit' => '%' ),
		  array( 'attribute' => 'background-color', 'value' => $progess_bg, 'unit' => '' ),
		);

		$css_args_progess_outer= array(
	      array( 'attribute' => 'border-color', 'value' => $progess_outline),

	  	);

		?>
			<div class="lbk-progess-line <?php echo $field_color;?>">
				<div>
					<p class="lbk-progess-title is-<?php echo $title_size; ?> <?php echo $title_style;?>"<?php echo get_shortcode_inline_css($css_args_title);?>>  <?php echo $title_text;?> </p>
					<div class="lbk-progess-outline" <?php echo get_shortcode_inline_css($css_args_progess_outer);?>>
						<div class="lbk-progess-inner" <?php echo get_shortcode_inline_css($css_args_progess_inner);?> ></div>
						<span class="lbk-progess-text"><?php echo $progess_width;?>%</span>
					</div>
				</div>
			</div>
			<style type="text/css">
				.lbk-progess-title {
					margin-bottom: 0.7em;
				}
				.lbk-progess-outline {
					width: 100%;
					position: relative;
					border: <?php echo $progess_outer_width; ?>px solid;
					height: <?php echo $progess_outer_height; ?>px;
					border-radius: 999px;
				}
				.lbk-progess-inner {
					position: absolute;
					top: 0;
					left: 0;
					height: 100%;
					background-color: rgba(204, 204, 204);
					border-radius: inherit;
				}
				.lbk-progess-text {
					display: inline-block;
					position: absolute;
					bottom: calc(100% + 5px);
					right: 0;
				}
			</style>
		<?php 

			$content = ob_get_contents();
			ob_end_clean();
			return $content;
	}
	if(!shortcode_exists('lbk_progess_line_element')) {
		add_shortcode('lbk_progess_line_element', 'create_lbk_progess_line');
	}

}

