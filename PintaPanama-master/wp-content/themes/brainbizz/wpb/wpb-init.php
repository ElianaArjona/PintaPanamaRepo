<?php

if ( !class_exists('Vc_Manager') || !class_exists('BrainBizz_Core') ) return;

if(!class_exists('Wgl_vc_register')){
    class Wgl_vc_register{
        function __construct (){
            $this->add_action();
            $this->custom_fields();
            $this->register_modules();
            $this->params_remove();
            $this->add_params();
        }

        function custom_fields () {
            require_once get_template_directory() . '/wpb/addon_fields/radio_image.php';
            require_once get_template_directory() . '/wpb/addon_fields/multi_select.php';
            require_once get_template_directory() . '/wpb/addon_fields/checkbox_custom.php';
            require_once get_template_directory() . '/wpb/addon_fields/heading_line.php';
            
            //Class Query Settings
            require_once ( get_template_directory() . '/wpb/build-query.php' );
            // Google fonts render class
            include_once get_template_directory() . '/wpb/google_fonts_enqueue.php';
        }

        function register_modules () {
            $brainbizz_shortcodes = array(
                'wgl_blog_posts_standard',
                'wgl_blog_posts_medium_img',
                'wgl_blog_posts_tiny_img',
                'wgl_counter',
                'wgl_carousel',
                'wgl_testimonials',
                'wgl_info_box',
                'wgl_services',
                'wgl_services_2',
                'wgl_flip_box',
                'wgl_image_layers',
                'wgl_pricing_table',
                'wgl_message_box',
                'wgl_button',
                'wgl_double_headings',
                'wgl_custom_text',
                'wgl_countdown',
                'wgl_video_popup',
                'wgl_spacing',
                'wgl_clients',
                'wgl_demo_item',
                'wgl_earth',
                'wgl_soc_icons',
                'wgl_time_line_vertical',
                'wgl_time_line_horizontal',
                'wgl_progress_bar',
                'wgl_divider',
                'wgl_blog_categories',
                'wgl_timetabs_wrapper',
                'wgl_timetabs_container',
                'wgl_timetabs_item'
            );

            foreach ($brainbizz_shortcodes as $brainbizz_shortcode) {
                require_once get_template_directory() . '/wpb/options/' . $brainbizz_shortcode . '.php';
            }
        }

        function add_action () {

            add_action('vc_before_init', 'brainbizz_wpbThemeSupport');
            function brainbizz_wpbThemeSupport() {
                vc_set_as_theme($disable_updater = true);
            }

            // Set default path to templates
            $brainbizz_dir = get_template_directory() . '/wpb/templates';
            vc_set_shortcodes_templates_dir( $brainbizz_dir );
        }

        function params_remove () {
            // Remove options from tabs
            $remove_params = array(
                array( 'vc_tta_tour', 'style' ),
                array( 'vc_tta_tour', 'no_fill_content_area' ),
                array( 'vc_tta_tour', 'color' ),
                array( 'vc_tta_tour', 'shape' ),
                array( 'vc_tta_tour', 'gap' ),
                array( 'vc_tta_tour', 'spacing' ),
                array( 'vc_tta_tour', 'pagination_style' ),
                array( 'vc_tta_tour', 'pagination_color' ),
                // Remove tab options
                array( 'vc_tta_tabs', 'spacing' ),
                array( 'vc_tta_tabs', 'style' ),
                array( 'vc_tta_tabs', 'pagination_style' ),
                array( 'vc_tta_tabs', 'color' ),
                array( 'vc_tta_tabs', 'gap' ),
                array( 'vc_tta_tabs', 'pagination_color' ),
                array( 'vc_tta_tabs', 'shape' ),
                array( 'vc_tta_tabs', 'no_fill_content_area' ),
                // Remove Toggle options
                array( 'vc_toggle', 'custom_custom_fonts' ),
                array( 'vc_toggle', 'style' ),
                array( 'vc_toggle', 'custom_font_container' ),
                array( 'vc_toggle', 'custom_css_animation' ),
                array( 'vc_toggle', 'use_custom_heading' ),
                array( 'vc_toggle', 'custom_el_class' ),
                array( 'vc_toggle', 'custom_google_fonts' ),
                // Remove accordion options
                array( 'vc_tta_accordion', 'no_fill' ),
                array( 'vc_tta_accordion', 'gap' ),
                array( 'vc_tta_accordion', 'color' ),
                array( 'vc_tta_accordion', 'shape' ),
                array( 'vc_tta_accordion', 'spacing' ),
            );
            foreach ($remove_params as $element => $param) {
                vc_remove_param( $param[0], $param[1] );
            }
        }

        function add_params () {
            vc_add_param( 'vc_toggle' , array(
                'type' => 'dropdown',
                'heading' => 'Icon',
                'param_name' => 'color',
                'value' => array(
                    esc_html__( 'None', 'brainbizz' ) => 'none',
                    esc_html__( 'Check', 'brainbizz' ) => 'check',
                    esc_html__( 'Chevron', 'brainbizz' ) => 'chevron',
                    esc_html__( 'Plus', 'brainbizz' ) => 'plus',
                    esc_html__( 'Triangle', 'brainbizz' ) => 'triangle',
                )
            ));
            vc_add_param( 'vc_toggle' , array(
                'type' => 'dropdown',
                'heading' => 'Icon Position',
                'param_name' => 'size',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' ) => 'left',
                    esc_html__( 'Right', 'brainbizz' ) => 'right',
                    esc_html__( 'center', 'brainbizz' ) => 'center',
                )
            ));

            $row_params = array(
                array(
                    'type' => 'wgl_checkbox',
                    'param_name' => 'add_extended',                    
                    'heading' => esc_html__( 'Add Extended Background Animation', 'brainbizz' ),       
                    'group' => esc_html__( 'Extended Animation', 'brainbizz' ),
                ),

                array(
                    'type' => 'param_group',
                    'heading' => esc_html__( 'Values', 'brainbizz' ),
                    'param_name' => 'values',
                    'description' => esc_html__( 'Enter values for graph - thumbnail, quote, author name and author status.', 'brainbizz' ),
                    'group' => esc_html__( 'Extended Animation', 'brainbizz' ),
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => 'Choose your animation',
                            'param_name' => 'extended_animation',
                            'value' => array(
                                esc_html__( 'Sphere', 'brainbizz' ) => 'sphere',
                                esc_html__( 'Particles', 'brainbizz' ) => 'particles',
                            ),
                            'admin_label'   => true,
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Figure Color', 'brainbizz'),
                            'param_name' => 'figure_color',
                            'value' => '#ffffff',
                            'description' => esc_html__('Select sphere color', 'brainbizz'),
                            'admin_label'   => true,
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Vertical position', 'brainbizz'),
                            'param_name' => 'extended_animation_pos_vertical',
                            'value' => '50',
                            'description' => esc_html__( 'Enter vertical position from top in %.', 'brainbizz' ),
                            'edit_field_class' => 'vc_col-sm-6',
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'sphere'
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Horizontal position', 'brainbizz'),
                            'param_name' => 'extended_animation_pos_horizont',
                            'value' => '50',
                            'description' => esc_html__( 'Enter horizontal position from left in %.', 'brainbizz' ),
                            'edit_field_class' => 'vc_col-sm-6',
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'sphere'
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Sphere Size', 'brainbizz'),
                            'param_name' => 'sphere_width',
                            'value' => '100',
                            'description' => esc_html__( 'Set size of sphere in pixels.', 'brainbizz' ),
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'sphere'
                            ),
                        ),
                        array(
                            'type' => 'wgl_checkbox',
                            'heading' => esc_html__('Add Inside Second Sphere', 'brainbizz'),
                            'param_name' => 'add_second_sphere',
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'sphere'
                            ),
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Position Top', 'brainbizz'),
                            'param_name' => 'particles_position_top',
                            'value' => '0',
                            'description' => esc_html__( 'Set canvas vertical position from top to top of canvas.', 'brainbizz' ),
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'particles'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Position Left', 'brainbizz'),
                            'param_name' => 'particles_position_left',
                            'value' => '0',
                            'description' => esc_html__( 'Set canvas vertical position from left to left side of canvas.', 'brainbizz' ),
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'particles'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Width in Percent', 'brainbizz'),
                            'param_name' => 'particles_width',
                            'value' => '100',
                            'description' => esc_html__( 'Set canvas width in percent.', 'brainbizz' ),
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'particles'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Height in Percent', 'brainbizz'),
                            'param_name' => 'particles_height',
                            'value' => '100',
                            'description' => esc_html__( 'Set canvas width in percent.', 'brainbizz' ),
                            'dependency' => array(
                                'element' => 'extended_animation',
                                'value' => 'particles'
                            ),
                            'edit_field_class' => 'vc_col-sm-6',
                        ),
                    ),
                    'dependency' => array(
                        'element' => 'add_extended',
                        'value' => 'true'
                    ),
                ),
                
            );

            vc_add_params('vc_row', $row_params);
            
            $menu_params = array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Alignment', 'brainbizz' ),
                    'param_name' => 'menu_alignment',
                    'value'         => array(
                        esc_html__( 'Center', 'brainbizz' ) => 'center',
                        esc_html__( 'Left', 'brainbizz' )   => 'left',
                        esc_html__( 'Right', 'brainbizz' )  => 'right',
                        esc_html__( 'Block', 'brainbizz' )  => 'block'
                    ),
                    'description' => esc_html__('Select menu item alignment.', 'brainbizz')
                ),  
                
            );
            vc_add_params('vc_wp_custommenu', $menu_params);         

            $vc_col_params = array(
                array(
                    'type' => 'wgl_checkbox',
                    'param_name' => 'sticky_col',                    
                    'heading' => esc_html__( 'Add Sticky Column', 'brainbizz' ),
                ),
            );
            vc_add_params('vc_column', $vc_col_params);
            
            $vc_col_bg_params = array(
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Background position on X-axis', 'brainbizz'),
                    'param_name' => 'col_pos_horizont',
                    'value' => '0',
                    'description' => esc_html__( 'Enter horizontal position from left.', 'brainbizz' ),
                    'edit_field_class' => 'vc_col-sm-5',
                    'group' => esc_html__( 'Design Options', 'brainbizz' ),
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Background position X-axis units', 'brainbizz'),
					'param_name' => 'col_pos_horizont_units',
					'value' => array(
						esc_html__( 'Percentages', 'brainbizz' ) => '%',
						esc_html__( 'Pixels', 'brainbizz' )      => 'px',
					),
					'std' => '%',
					'description' => esc_html__( 'Select units for horizontal position.', 'brainbizz' ),
					'edit_field_class' => 'vc_col-sm-5',
					'group' => esc_html__( 'Design Options', 'brainbizz' ),
				),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Background position on Y-axis', 'brainbizz'),
                    'param_name' => 'col_pos_vertical',
                    'value' => '0',
                    'description' => esc_html__( 'Enter vertical position from top.', 'brainbizz' ),
                    'edit_field_class' => 'vc_col-sm-5',
                    'group' => esc_html__( 'Design Options', 'brainbizz' ),
                ),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Background position Y-axis units', 'brainbizz'),
					'param_name' => 'col_pos_vertical_units',
					'value' => array(
						esc_html__( 'Percentages', 'brainbizz' ) => '%',
						esc_html__( 'Pixels', 'brainbizz' )      => 'px',
					),
					'std' => '%',
					'description' => esc_html__( 'Select units for vertical position.', 'brainbizz' ),
					'edit_field_class' => 'vc_col-sm-5',
					'group' => esc_html__( 'Design Options', 'brainbizz' ),
				),
                
            );
            vc_add_params('vc_column', $vc_col_bg_params);         
        }
    }
    new Wgl_vc_register();
}

//Add inline styles to enqueue
if(!function_exists('BrainBizz_shortcode_css')){
    function BrainBizz_shortcode_css() {
        return BrainBizz_shortcode_css::instance();
    }
}

if ( !class_exists( "BrainBizz_shortcode_css" ) ){
    class BrainBizz_shortcode_css{
        public $settings;
        protected static $instance = null;

        public static function instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }    
        public function enqueue_brainbizz_css( $style ) {
            if(!empty($style)){
                ob_start();             
                    echo BrainBizz_Theme_Helper::render_html($style);
                $css = ob_get_clean();
                $css = apply_filters( 'brainbizz_enqueue_shortcode_css', $css, $style );

                wp_register_style( 'brainbizz-footer', false );
                wp_enqueue_style( 'brainbizz-footer' );
                wp_add_inline_style( 'brainbizz-footer', $css );      
            }

        }
    }
}
//Add inline styles to enqueue

// Filter to replace default css class names for vc_row shortcode and vc_column
if(!class_exists('Wgl_vc_column')){
    class Wgl_vc_column{

        static public $row_atts = '';

        public static function wgl_vc_column_before($atts, $content){			
            extract( $atts); 
            self::$row_atts = $atts;

            add_filter( 'vc_shortcodes_css_class', 'Wgl_vc_column::add_custom_css_classes_for_vc_column', 10, 2);

        }
        public static function add_custom_css_classes_for_vc_column( $class_string, $tag ) {
            
            if (isset(self::$row_atts['sticky_col']) && $tag == 'vc_column') {
                $class_string .= ' sticky-sidebar';
                wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.min.js', array(), false, false);
            }
            
            return $class_string;
        }
    }
    new Wgl_vc_column;
}

if ( !function_exists( 'vc_theme_before_vc_column' ) ) {
    function vc_theme_before_vc_column($atts, $content = null) {
        return Wgl_vc_column::wgl_vc_column_before($atts, $content);
    }
}
