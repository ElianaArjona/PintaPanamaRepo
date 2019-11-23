<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));

if (function_exists('vc_map')) {
// Add list item
    $main_font = BrainBizz_Theme_Helper::get_option('main-font');
    vc_map(array(
        'name' => esc_html__('Message Box', 'brainbizz'),
        'base' => 'wgl_message_box',
        'class' => 'brainbizz_message_box',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_message_box',
        'content_element' => true,
        'description' => esc_html__('Message Box','brainbizz'),
        'params' => array(
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Message Type', 'brainbizz' ),
                'param_name'    => 'type',
                'value'         => array(
                    esc_html__( 'Informational', 'brainbizz' ) => 'info',
                    esc_html__( 'Success', 'brainbizz' )		 => 'success',
                    esc_html__( 'Warning', 'brainbizz' )		 => 'warning',
                    esc_html__( 'Error', 'brainbizz' )		 => 'error',
                    esc_html__( 'Custom', 'brainbizz' )		 => 'custom',
                ),              
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'brainbizz' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust',
                'settings' => array(
                    'emptyIcon' => false,
                    'iconsPerPage' => 200,
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type'          => 'colorpicker',
                'heading'       => esc_html__( 'Message Color', 'brainbizz' ),
                'param_name'    => 'icon_color',
                'value'         => $theme_color,
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'brainbizz'),
                'param_name' => 'title',
                'admin_label'   => true,
            ),  
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Text', 'brainbizz'),
                'param_name' => 'text',
            ),       
            array(
                'type'          => 'wgl_checkbox',
                'heading'       => esc_html__( 'Closable?', 'brainbizz' ),
                'param_name'    => 'closable',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Title Styles', 'brainbizz'),
                'param_name' => 'h_title_styles',
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Title Tag', 'brainbizz' ),
                'param_name'    => 'title_tag',
                'value'         => array(
                    esc_html__( 'Div', 'brainbizz' )    => 'div',
                    esc_html__( 'Span', 'brainbizz' )    => 'span',
                    esc_html__( 'H2', 'brainbizz' )    => 'h2',
                    esc_html__( 'H3', 'brainbizz' )    => 'h3',
                    esc_html__( 'H4', 'brainbizz' )    => 'h4',
                    esc_html__( 'H5', 'brainbizz' )    => 'h5',
                    esc_html__( 'H6', 'brainbizz' )    => 'h6',
                ),
                'std' => 'h4',
                'group'         => esc_html__( 'Typography', 'brainbizz' ),
                'description' => esc_html__( 'Choose your tag for title', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // title Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Size', 'brainbizz'),
                'param_name' => 'title_size',
                'value' => '',
                'description' => esc_html__( 'Enter title font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // Title Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for title', 'brainbizz' ),
                'param_name' => 'custom_fonts_title',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_title',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_title',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Title Color', 'brainbizz' ),
                'param_name' => 'custom_title_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'brainbizz'),
                'param_name' => 'title_color',
                'value' => $theme_color,
                'description' => esc_html__('Select title color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // text styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Text Styles', 'brainbizz'),
                'param_name' => 'h_text_styles',
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Text Tag', 'brainbizz' ),
                'param_name'    => 'text_tag',
                'value'         => array(
                    esc_html__( 'Div', 'brainbizz' )    => 'div',
                    esc_html__( 'Span', 'brainbizz' )    => 'span',
                    esc_html__( 'H2', 'brainbizz' )    => 'h2',
                    esc_html__( 'H3', 'brainbizz' )    => 'h3',
                    esc_html__( 'H4', 'brainbizz' )    => 'h4',
                    esc_html__( 'H5', 'brainbizz' )    => 'h5',
                    esc_html__( 'H6', 'brainbizz' )    => 'h6',
                ),
                'std' => 'div',
                'group'         => esc_html__( 'Typography', 'brainbizz' ),
                'description' => esc_html__( 'Choose your tag for text', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // text Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Text Font Size', 'brainbizz'),
                'param_name' => 'text_size',
                'value' => '',
                'description' => esc_html__( 'Enter text font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // text Fonts
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for text', 'brainbizz' ),
                'param_name' => 'custom_fonts_text',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_text',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_text',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
            ),
            // text color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Text Color', 'brainbizz' ),
                'param_name' => 'custom_text_color',
                'description' => esc_html__( 'Select custom color', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency'    => array(
                    'element'   => 'type',
                    'value' => 'custom'
                ),
            ),
            // text color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Text Color', 'brainbizz'),
                'param_name' => 'text_color',
                'value' => '#000000',
                'description' => esc_html__('Select text color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_text_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),             
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_message_box extends WPBakeryShortCode {}
    } 
}
