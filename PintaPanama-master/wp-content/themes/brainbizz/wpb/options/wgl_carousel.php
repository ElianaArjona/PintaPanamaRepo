<?php

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

if (function_exists('vc_map')) {
    vc_map(array(		
		
        'base' => 'wgl_carousel',
        'name' => esc_html__('Carousel', 'brainbizz'),
		'class' => 'brainbizz_carousel_module',
        'content_element' => true,      
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_carousel',
        'show_settings_on_create' => true,
        'is_container' => true,
		'as_parent' => array('only' => 'wgl_counter, wgl_button, vc_column_text, wgl_pricing_table, wgl_info_box, wgl_custom_text, vc_single_image, vc_tta_tabs, vc_tta_tour, vc_tta_accordion, vc_images_carousel, vc_gallery, vc_message, vc_row, wgl_flip_box'),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Carousel Columns', 'brainbizz'),
                'admin_label' => true,
                'param_name' => 'slide_to_show',
                'value' => array(
                    esc_html__('1', 'brainbizz') => '1',
                    esc_html__('2', 'brainbizz') => '2',
                    esc_html__('3', 'brainbizz') => '3',
                    esc_html__('4', 'brainbizz') => '4',
                    esc_html__('5', 'brainbizz') => '5',
                    esc_html__('6', 'brainbizz') => '6',
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Speed', 'brainbizz' ),
                'param_name' => 'speed',
                'value' => '300',
                'description' => esc_html__( 'Animation speed(ms)', 'brainbizz' ),
            ),              
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Autoplay', 'brainbizz' ),
                'param_name' => 'autoplay',
                'value' => array( esc_html__( 'Yes', 'brainbizz' ) => 'yes' ),
                'edit_field_class' => 'vc_col-sm-4',
                'std' => 'yes'
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Autoplay Speed', 'brainbizz' ),
                "param_name"    => "autoplay_speed",
                "dependency"    => array(
                    "element"   => "autoplay",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                "value"         => "3000",
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),                 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Adaptive', 'brainbizz' ),
                'param_name' => 'adaptive_height',
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'slide_to_show',
                    'value' => array('1'),
                ),
            ),     

            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Slide One Item by Click', 'brainbizz' ),
                'param_name' => 'slides_to_scroll',
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Infinite loop sliding', 'brainbizz' ),
                'param_name' => 'infinite',
                'edit_field_class' => 'vc_col-sm-4',
            ),

            vc_map_add_css_animation( true ),
            // carousel pagination heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Pagination Controls', 'brainbizz'),
                'param_name' => 'h_pag_controls',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Pagination control', 'brainbizz' ),
                'param_name' => 'use_pagination',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'std' => 'true'
            ),
            array(
                'type' => 'brainbizz_radio_image',
                'heading' => esc_html__('Pagination Type', 'brainbizz'),
                'param_name' => 'pag_type',
                'fields' => array(
                    'circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle.png',
                        'label' => esc_html__('Circle', 'brainbizz')),
                    'circle_border' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle_border.png',
                        'label' => esc_html__('Empty Circle', 'brainbizz')),
                    'square' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_square.png',
                        'label' => esc_html__('Square', 'brainbizz')),
                    'line' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line.png',
                        'label' => esc_html__('Line', 'brainbizz')),
                    'line_circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line_circle.png',
                        'label' => esc_html__('Line - Circle', 'brainbizz')),
                ),
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
                'value' => 'circle',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pagination Top Offset', 'brainbizz' ),
                'param_name' => 'pag_offset',
                'value' => '',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Enter pagination top offset in pixels.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Pagination Aligning', 'brainbizz'),
                'param_name' => 'pag_align',
                'value' => array(
                    esc_html__('Left', 'brainbizz') => 'left',
                    esc_html__('Right', 'brainbizz') => 'right',
                    esc_html__('Center', 'brainbizz') => 'center',
                ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'std' => 'center',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Pagination Color', 'brainbizz' ),
                'param_name' => 'custom_pag_color',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Pagination Color', 'brainbizz'),
                'param_name' => 'pag_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_pag_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // carousel prev/next heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Prev/Next Buttons', 'brainbizz'),
                'param_name' => 'h_buttons',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Prev/Next buttons', 'brainbizz' ),
                'param_name' => 'use_prev_next',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom offset', 'brainbizz' ),
                'param_name' => 'custom_offeset_prev_next',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                 'dependency' => array(
                    'element' => 'use_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pagination Top Offset', 'brainbizz' ),
                'param_name' => 'buttons_offset',
                'value' => '50%',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-8',
                'description' => esc_html__( 'Enter buttons top offset in percentages.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'custom_offeset_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'param_name' => 'h_buttons',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'dependency' => array(
                    'element' => 'use_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Buttons Color', 'brainbizz' ),
                'param_name' => 'custom_buttons_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Prev/Next Buttons Color', 'brainbizz'),
                'param_name' => 'buttons_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_buttons_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Buttons Background Color', 'brainbizz'),
                'param_name' => 'buttons_bg_color',
                'value' => '#ffffff',
                'dependency' => array(
                    'element' => 'custom_buttons_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Navigation', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'brainbizz' ),
                'param_name' => 'custom_resp',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
            ),
            // medium desktop
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Medium Desktop', 'brainbizz'),
                'param_name' => 'h_resp_medium',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
                'param_name' => 'resp_medium',
                'value' => '1025',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
                'param_name' => 'resp_medium_slides',
                'value' => '',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            
            // tablets
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Tablets', 'brainbizz'),
                'param_name' => 'h_resp_tablets',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
                'param_name' => 'resp_tablets',
                'value' => '800',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
                'param_name' => 'resp_tablets_slides',
                'value' => '',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            // mobile phones
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Mobile Phones', 'brainbizz'),
                'param_name' => 'h_resp_mobile',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz' ),
                'param_name' => 'resp_mobile',
                'value' => '480',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz' ),
                'param_name' => 'resp_mobile_slides',
                'value' => '',
                'group' => esc_html__( 'Responsive', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            )			
        ),
		'js_view' => 'VcColumnView'
    ));


    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_wgl_carousel extends WPBakeryShortCodesContainer {}
    }
}