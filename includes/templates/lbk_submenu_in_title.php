<?php
if ( !defined ( 'ABSPATH' ) ) exit;
if( !function_exists('lbk_ux_builder_product_title_with_categories') ) {
    function lbk_ux_builder_product_title_with_categories(){
        add_ux_builder_shortcode('lbk_ux_builder_product_title_with_categories_sc', array(
            'name'      => __('LBK Product Title with Categories'),
            'category'  => __('LBK Content'),
            'type' => 'container',
            'priority'  => 1,
            'options' => array(
                'label' => array(
                    'type' => 'textfield',
                    'heading' => 'Admin label',
                    'placeholder' => 'Enter admin label...'
                ),
                'background_options' => require(  get_template_directory() . '/inc/builder/shortcodes/commons/background.php' ),
                'title_options' => array(
                    'type' => 'group',
                    'heading' => __( 'Title' ),
                    'options' => array(
                        'text' => array(
                            'type'       => 'textfield',
                            'heading'    => 'Title',
                            'default'    => 'Lorem ipsum dolor sit amet...',
                            'auto_focus' => true,
                        ),
                        'tag_name' => array(
                            'type'    => 'select',
                            'heading' => 'Tag',
                            'default' => 'h3',
                            'options' => array(
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                            ),
                        ),
                        'color' => array(
                            'type'     => 'colorpicker',
                            'heading'  => __( 'Color' ),
                            'alpha'    => true,
                            'format'   => 'rgb',
                            'position' => 'bottom right',
                        ),
                       'title_width' => array(
                            'type' => 'select',
                            'heading' => 'Title Width',
                            'options' => array(
                              '' => 'Full',
                              'container' => 'Container',
                            ),
                        ),
                        'title_bg_color' => array(
                            'type'     => 'colorpicker',
                            'heading'  => __( 'Background Color' ),
                            'alpha'    => true,
                            'format'   => 'rgb',
                            'position' => 'bottom right',
                        ),
                        'icon' => array(
                            'type'    => 'select',
                            'heading' => 'Icon',
                            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/icons.php' ),
                        ),
                        'margin_top' => array(
                            'type'        => 'scrubfield',
                            'heading'     => __( 'Margin Top' ),
                            'default'     => '',
                            'placeholder' => __( '0px' ),
                            'min'         => - 100,
                            'max'         => 300,
                            'step'        => 1,
                        ),
                        'margin_bottom' => array(
                            'type'        => 'scrubfield',
                            'heading'     => __( 'Margin Bottom' ),
                            'default'     => '',
                            'placeholder' => __( '0px' ),
                            'min'         => - 100,
                            'max'         => 300,
                            'step'        => 1,
                        ),
                        'size' => array(
                            'type'    => 'slider',
                            'heading' => __( 'Size' ),
                            'default' => 100,
                            'unit'    => '%',
                            'min'     => 20,
                            'max'     => 300,
                            'step'    => 1,
                        ),
                        'cat' => array(
                            'type' => 'select',
                            'heading' => 'Category',
                            'param_name' => 'cat',
                            'default' => '',
                            'config' => array(
                                'multiple' => true,
                                'placeholder' => 'Select...',
                                'termSelect' => array(
                                    'post_type' => 'product',
                                    'taxonomies' => 'product_cat'
                                ),
                            )
                        ),
                    )
                ),
                'layout_options'     => array(
                    'type'    => 'group',
                    'heading' => __( 'Layout' ),
                    'options' => array(
                        'dark'            => array(
                            'type'    => 'radio-buttons',
                            'heading' => 'Color',
                            'default' => 'false',
                            'options' => array(
                                'true'  => array( 'title' => 'Light' ),
                                'false' => array( 'title' => 'Dark' ),
                            ),
                        ),
                        'padding' => array(
                            'type' => 'margins',
                            'heading' => 'Padding',
                            'full_width' => true,
                            'responsive' => true,
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ),
                        'margin' => array(
                            'type' => 'margins',
                            'heading' => 'Margin',
                            'full_width' => true,
                            'responsive' => true,
                            'min' => -500,
                            'max' => 500,
                            'step' => 1,
                        ),
                        'height'          => array(
                            'type'       => 'scrubfield',
                            'heading'    => 'Min Height',
                            'responsive' => true,
                            'min'        => 0,
                            'max'        => 1000,
                        ),
                    ),
                ),
                'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),                 
            )
        )); 
    }
    add_action('ux_builder_setup', 'lbk_ux_builder_product_title_with_categories');
}

 if( !function_exists('create_lbk_product_title_with_categories_sc')) {
    function create_lbk_product_title_with_categories_sc($atts, $content = null ) {
      $atts = shortcode_atts( array(
        '_id'              => 'section_' . rand(),
        'class'            => '',
        'label'            => '',
        'visibility'       => '',
        'sticky'           => '',
        // Background.
        'bg'               => '',
        'bg_size'          => '',
        'bg_color'         => '',
        'bg_overlay'       => '',
        'bg_overlay__sm'   => '',
        'bg_overlay__md'   => '',
        'bg_pos'           => '',
        'parallax'         => '',
        'effect'           => '',
        // Layout.
        'dark'             => 'false',
        'padding'          => '',
        'padding__md'      => '',
        'padding__sm'      => '',
        'margin'           => '',
        'margin__md'       => '',
        'margin__sm'       => '',
        'height'           => '',
        'height__sm'       => '',
        'height__md'       => '',
        'margin'           => '',
        'loading'          => '',
        // Title
        'text' => 'Lorem ipsum dolor sit amet...',
        'tag_name' => 'h3',
        'style' => 'normal',
        'title_width' => '',
        'size' => '100',
        'margin_top' => '',
        'margin_bottom' => '',
        'letter_case' => '',
        'color' => '',
        'icon' => '',
        'cat' => ''                  
    ), $atts );

    extract( $atts );

    // Hide if visibility is hidden.
    if ( $visibility === 'hidden' ) {
        return;
    }

    ob_start();

    $classes = array( 'section' );

    $classes_bg = array( 'bg', 'section-bg', 'fill', 'bg-fill' );

    // Fix old.
    if ( strpos( $bg, '#' ) !== false ) {
        $atts['bg_color'] = $bg;
        $atts['bg']       = false;
    }

    // Add Custom Classes.
    if ( $class ) {
        $classes[] = $class;
    }

    // Add Dark text.
    if ( $dark === 'true' ) {
        $classes[] = 'dark';
    }

    // Add visibility class.
    if ( $visibility ) {
        $classes[] = $visibility;
    }

    // Add Parallax.
    if ( $parallax ) {
        $classes[] = 'has-parallax';
        $parallax  = 'data-parallax-container=".section" data-parallax-background data-parallax="-' . $parallax . '"';
    }

    // Background effects.
    if ( $effect ) {
        wp_enqueue_style( 'flatsome-effects' );
    }

    // Add Full Height Class.
    if ( $height === '100vh' ) {
        $classes[] = 'is-full-height';
    }

    $title_classes = array('section-title-container');

    if ( $title_width !== '' ) {
        $title_classes[] = $title_width;
    }

    // Lazy load.
    $classes_bg[] = get_theme_mod( 'lazy_load_backgrounds', 1 ) ? '' : 'bg-loaded';
    $classes_bg[] = $bg ? '' : 'bg-loaded';

    
    $title_classes    = implode( ' ', $title_classes );

    $classes    = implode( ' ', $classes );
    $classes_bg = implode( ' ', $classes_bg );

    $link_output = '';
    if($cat) {
        $categories = explode(",", $cat);

        foreach($categories as $value) {
            $value = intval($value);
            $link_output .= '<a href="'.get_term_link($value).'">'.get_term($value)->name.'</a>';
        }
    }
    $small_text = '';
    if($icon) $icon = get_flatsome_icon($icon);

    // fix old

    $css_args = array(
        array( 'attribute' => 'margin-top', 'value' => $margin_top),
        array( 'attribute' => 'margin-bottom', 'value' => $margin_bottom),
    );

    $css_args_title = array();

    if($size !== '100'){
        $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%');
    }
    if($color){
        $css_args_title[] = array( 'attribute' => 'color', 'value' => $color);
    }
    ?>
    <section class="<?php echo $classes; ?>" id="<?php echo $_id; ?>">
        <div class="<?php echo $classes_bg; ?>" <?php echo $parallax; ?>>

            <?php
            if ( $bg_overlay ) {
                echo '<div class="section-bg-overlay absolute fill"></div>';
            }
            if ( $loading ) {
                echo '<div class="loading-spin centered"></div>';
            }
            if ( $effect ) {
                echo '<div class="effect-' . $effect . ' bg-effect fill no-click"></div>';
            }
            ?>

        </div>

        <div class="section-content relative">
            <div class="<?php echo $title_classes; ?>" <?php echo get_shortcode_inline_css($css_args); ?> >
                <<?php echo $tag_name.' class="section-title section-title-normal"' ?>><b></b>
                <span class="section-title-main" <?php echo get_shortcode_inline_css($css_args_title) ?>><?php echo $icon.$text.$small_text ?></span>
                <b></b><?php echo $link_output; ?></ <?php echo $tag_name; ?> >
            </div>
            <div class = "lbk-categories-title-content">
                <?php echo $content; ?>
            </div>
        </div>

        <?php
        // Get custom CSS.
        $args = array(
            'padding'    => array(
                'selector' => '',
                'property' => 'padding-top, padding-bottom',
            ),
            'margin'     => array(
                'selector' => '',
                'property' => 'margin-bottom',
            ),
            'height'     => array(
                'selector' => '',
                'property' => 'min-height',
            ),
            'bg_color'   => array(
                'selector' => '',
                'property' => 'background-color',
            ),
            'bg_overlay' => array(
                'selector' => '.section-bg-overlay',
                'property' => 'background-color',
            ),
            'bg'         => array(
                'selector' => '.section-bg.bg-loaded',
                'property' => 'background-image',
                'size'     => $bg_size,
            ),
            'bg_pos'     => array(
                'selector' => '.section-bg',
                'property' => 'background-position',
            ),
        );
        echo ux_builder_element_style_tag( $_id, $args, $atts );
        ?>
    </section>
    <?php
    $content = ob_get_contents();
    ob_end_clean();

    return do_shortcode( $content );
}

    if(!shortcode_exists('lbk_ux_builder_product_title_with_categories_sc')) {
        add_shortcode('lbk_ux_builder_product_title_with_categories_sc', 'create_lbk_product_title_with_categories_sc');
    }

 }