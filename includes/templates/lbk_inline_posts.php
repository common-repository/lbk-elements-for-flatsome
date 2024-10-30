<?php
if ( !defined ( 'ABSPATH' ) ) exit;
if( !function_exists('lbk_ux_builder_inline_posts') ) {
	function lbk_ux_builder_inline_posts(){
	    add_ux_builder_shortcode('lbk_inline_post_element', array(
	        'name'      => __('LBK Inline Posts'),
	        'category'  => __('LBK Content'),
	        'priority'  => 1,
	        'options' => array(
	        	'feauture_options' => array(
				    'type' => 'group',
				    'heading' => __( 'Feautured' ),
				    'options' => array(
				         'style' => array(
				            'type' => 'select',
				            'heading' => __( 'Feautured' ),
				            'default' => '',
				            'options' => array(
								''  => 'Default',
								'featured' => 'Featured',
							),

				        )
				    ),
				),
	        	'post_options' => require( get_template_directory(). '/inc/builder/shortcodes/commons/repeater-posts.php' ),
	        	'post_title_options' => array(
				    'type' => 'group',
				    'heading' => __( 'Title' ),
				        'options' => array(
				            'title_size' => array(
				                'type' => 'select',
				                'heading' => 'Title Size',
				                'default' => '',
				                'options' => array(
								    'xsmall' => 'X-Small',
								    'small' => 'Small',
								    '' => 'Normal',
								    'large' => 'Large',
								    'larger' => 'Larger',
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
				    	)
				),
				'post_meta_options' => array(
				    'type' => 'group',
				    'heading' => __( 'Meta' ),
				    'options' => array(

					    'show_date' => array(
					        'type' => 'select',
					        'heading' => 'Date',
					        'default' => 'text',
					        'options' => array(
					            'text' => 'Text',
					            'false' => 'Hidden',
					        )
					    ),
					    'excerpt' => array(
					        'type' => 'select',
					        'heading' => 'Excerpt',
					        'default' => 'visible',
					        'options' => array(
					            'visible' => 'Visible',
					            'false' => 'Hidden',
					        )
					    ),
					   'excerpt_length' => array(
					        'type' => 'slider',
					        'heading' => 'Excerpt Length',
					        'default' => 15,
					        'max' => 50,
					        'min' => 5,
					    ),
					    'show_category' => array(
					        'type' => 'select',
					        'heading' => 'Category',
					        'default' => 'false',
					        'options' => array(
					            'label' => 'Label',
					            'text' => 'Text',
					            'false' => 'Hidden',
					        )
					    ),
					    'cat_color' => array(
				                'type' => 'colorpicker',
				                'heading' => 'Category Color',
				                'default' => '',
						        'alpha' => true,
						        'format' => 'rgb',
							),
			       		'cat_lable_color' => array(
			                'type' => 'colorpicker',
			                'heading' => 'Lable Category Background',
			                'default' => '',
					        'alpha' => true,
					        'format' => 'rgb',
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
			              'conditions' => 'type !== "grid"',
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

			            'image_radius' => array(
			                'type' => 'slider',
			                'heading' => __( 'Radius' ),
			                'unit' => '%',
			                'default' => 0,
			                'max' => 100,
			                'min' => 0,
			                'on_change' => array(
			                    'selector' => '.box-image-inner',
			                    'style' => 'border-radius: {{ value }}%'
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
			    'text_options' => array(
			        'type' => 'group',
			        'heading' => __( 'Text' ),
			        'options' => array(

			            'text_align' => array(
			                'type' => 'radio-buttons',
			                'heading' => __( 'Align' ),
			                'default' => 'left',
			                'options' => require(get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
			                'on_change' => array(
			                    'selector' => '.box-text',
			                    'class' => 'text-{{ value }}'
			                )
			            ),

			            'text_size' => array(
			                'type' => 'radio-buttons',
			                'heading' => __( 'Size' ),
			                'default' => 'medium',
			                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
			                'on_change' => array(
			                    'selector' => '.box-text',
			                    'class' => 'is-{{ value }}'
			                )
			            ),
			            'text_bg' => array(
			                'type' => 'colorpicker',
			                'heading' => __( 'Bg Color' ),
			                'default' => '',
			                'alpha' => true,
			                'format' => 'rgb',
			                'position' => 'bottom right',
			                'on_change' => array(
			                    'selector' => '.box-text',
			                    'style' => 'background-color:{{ value }}'
			                )
			            ),

			            'text_padding' => array(
			              'type' => 'margins',
			              'heading' => __( 'Padding' ),
			              'value' => '',
			              'full_width' => true,
			              'min' => 0,
			              'max' => 100,
			              'step' => 1,

			              'on_change' => array(
			                    'selector' => '.box-text',
			                    'style' => 'padding: {{ value }}'
			                )
			            ),
			        ),
			    ),
				'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
	        ),
	    ));
	}
	add_action('ux_builder_setup', 'lbk_ux_builder_inline_posts');
}

 if( !function_exists('create_lbk_inline_post')) {
 	function create_lbk_inline_post($atts){
	   extract(shortcode_atts(array(
			'class' => '',
			'visibility' => '',
			'style' => '',


			// posts
			'posts' => '5',
			'ids' => false, // Custom IDs
			'cat' => '',
			'category' => '', // Added for Flatsome v2 fallback
			'excerpt' => 'visible',
			'excerpt_length' => 15,
			'offset' => '',
			'orderby' => 'date',
			'order' => 'DESC',

			// div meta
			'post_icon' => 'true',
			'show_date' => 'text',
			'show_category' => 'false',
			'cat_color' => '',
			'cat_lable_color' => '',

			//Title
			'title_size' => 'large',
			'title_style' => '',

			// Box styles
		  	'text_padding' => '',
		  	'text_bg' => '',
		  	'text_size' => '',
		 	'text_color' => '',
		 	'text_align' => 'left',
		 	'image_size' => 'medium',
		 	'image_width' => '100',
		 	'image_radius' => '',
		 	'image_height' => '56%',

		), $atts));

	    ob_start();

	    $classes_box = array();
		$classes_image = array();
		$classes_text = array();



		// Set box style
		if($image_height) $classes_image[] = 'image-cover';

		// Text classes
		if($text_align) $classes_text[] = 'text-'.$text_align;
		if($text_size) $classes_text[] = 'is-'.$text_size;
		if($text_color == 'dark') $classes_text[] = 'dark';

		$css_args_cat = array(
		  array( 'attribute' => 'color', 'value' => $cat_color, 'unit' => '' ),
		  array( 'attribute' => 'background-color', 'value' => $cat_lable_color, 'unit' => '' ),
		);


		$css_args_img = array(
		  array( 'attribute' => 'border-radius', 'value' => $image_radius, 'unit' => '%' ),
		  array( 'attribute' => 'width', 'value' => $image_width, 'unit' => '%' ),
		);

		$css_image_height = array(
	      array( 'attribute' => 'padding-top', 'value' => $image_height),
	  	);

		$css_args = array(
	      array( 'attribute' => 'background-color', 'value' => $text_bg ),
	      array( 'attribute' => 'padding', 'value' => $text_padding ),
	  	);

	    // Add Animations

		$classes_text = implode(' ', $classes_text);
		$classes_image = implode(' ', $classes_image);
		$classes_box = implode(' ', $classes_box);

		// Repeater styles
		$class = $class .' lbk-post-list'. ' ' . $style;
		$repeater['class'] = $class;
		$repeater['visibility'] = $visibility;
		$repeater['type'] = '';
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'post',
			'offset' => $offset,
			'cat' => $cat,
			'posts_per_page' => $posts,
			'ignore_sticky_posts' => true,
			'orderby'             => $orderby,
			'order'               => $order,
		);

		// Added for Flatsome v2 fallback
		if ( get_theme_mod('flatsome_fallback', 0) && $category ) {
			$args['category_name'] = $category;
		}

		// If custom ids
		if ( !empty( $ids ) ) {
			$ids = explode( ',', $ids );
			$ids = array_map( 'trim', $ids );

			$args = array(
				'post__in' => $ids,
	            'post_type' => array(
	                'post',
	                'featured_item', // Include for its tag archive listing.
	            ),
				'numberposts' => -1,
				'orderby' => 'post__in',
				'posts_per_page' => 9999,
				'ignore_sticky_posts' => true,
			);
		}

	$recentPosts = new WP_Query( $args );
	  	get_flatsome_repeater_start($repeater);
	  	$lbk_post_count = 0;
		while ( $recentPosts->have_posts() ) : $recentPosts->the_post();
					$col_class    = array( 'post-item' );
					$show_excerpt = $excerpt;
				?>
				<div class="col <?php echo implode(' ', $col_class); ?> pb-0">
					<div class="col-inner">
					<a href="<?php the_permalink() ?>" class="plain block">
						<div class="box flex gap-2<?php echo $classes_box; ?> box-blog-post">
		          <?php if(has_post_thumbnail()) { ?>
		  					<div class="box-image" <?php echo get_shortcode_inline_css($css_args_img); ?>>
		  						<div class="<?php echo $classes_image; ?>" <?php echo get_shortcode_inline_css($css_image_height); ?>>
		  							<?php the_post_thumbnail($image_size); ?>
		  						</div>
		  					</div>
		          <?php } ?>
							<div class="box-text <?php echo $classes_text; ?>" <?php echo get_shortcode_inline_css($css_args); ?>>
							<div class="box-text-inner blog-post-inner">

							<?php do_action('flatsome_blog_post_before'); ?>

							<?php if($show_category !== 'false') { ?>
								<p class="cat-label <?php if($show_category == 'label') echo 'lbk-label'; ?> is-xsmall op-7 uppercase" <?php if($show_category == 'label') echo get_shortcode_inline_css($css_args_cat); ?> >
							<?php
								foreach((get_the_category()) as $cat) {
								echo $cat->cat_name . ' ';
							}
							?>
							</p>
							<?php } ?>
							<h5 class="post-title is-<?php if ($lbk_post_count == 0){ echo 'xlarge'; } else { echo $title_size;} ?> <?php echo $title_style;?>"><?php the_title(); ?></h5>
							<?php if( $show_date == 'text') {?><div class="post-meta is-small op-8"><?php echo get_the_date(); ?></div><?php } ?>
							<?php if($show_excerpt !== 'false') { ?>
							<p class="from_the_blog_excerpt <?php if($style == 'featured' && $lbk_post_count !== 0 ){ echo "hidden"; } ?>">
							<?php
							  $the_excerpt  = get_the_excerpt();
							  $excerpt_more = apply_filters( 'excerpt_more', ' [...]' );
							  echo flatsome_string_limit_words($the_excerpt, $excerpt_length) . $excerpt_more;
							?>
							</p>
							<?php } ?>
							<?php do_action('flatsome_blog_post_after'); ?>

							</div>
							</div>
						</div>
						</a>
					</div>
				</div>
		<?php 
			$lbk_post_count++;
			endwhile;
			wp_reset_query();

			// Get repeater end.
			get_flatsome_repeater_end($atts);
			?>



			<style type="text/css">
				.flex {
					display: flex;
					justify-content: flex-start;
					align-items: flex-start;
				}
				/*GAP*/
				.gap-2 {
					gap: 1em;
				}
				/*POST*/
				.lbk-post-list {
					gap: 30px;
				}

				.lbk-post-list .box-text {
					padding: 0;
				}
				.lbk-label {
				    text-transform: uppercase;
				    display: inline-block;
				    font-weight: bold;
				    border-radius: 2px;
				    padding: 2px 5px;
				 }
				/* 549px*/
				@media only screen and (min-width: 34.3125em) { 
					.featured .post-item:not(:first-child) {
					  flex-basis: calc(50% - 15px);
					  max-width: 50%;
					}
				}
				@media only screen and (max-width: 48em) {
					.featured .post-item:first-child .box {
						flex-direction: column;
					}
				}
			</style>

			<?php

			$content = ob_get_contents();
			ob_end_clean();
			return $content;
	}

	if(!shortcode_exists('lbk_inline_post_element')) {
		add_shortcode('lbk_inline_post_element', 'create_lbk_inline_post');
	}
	
 }
