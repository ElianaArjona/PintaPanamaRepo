<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);

if (function_exists('vc_map')) {
// Add list item
    vc_map(array(
        'name' => esc_html__('Double Headings', 'brainbizz'),
        'base' => 'wgl_double_headings',
        'class' => 'brainbizz_custom_text',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'icon' => 'wgl_icon_double-text',
        'content_element' => true,
        'description' => esc_html__('Double Headings','brainbizz'),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'brainbizz'),
                'param_name' => 'title',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle', 'brainbizz'),
                'param_name' => 'subtitle',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Alignment', 'brainbizz' ),
                'param_name' => 'align',
                'edit_field_class' => 'vc_col-sm-12',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' ) => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' ) => 'right',
                ),
            ), 
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // Styling
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Title Styles', 'brainbizz'),
                'param_name' => 'h_title_styles',
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Size', 'brainbizz'),
                'param_name' => 'title_size',
                'value' => '36px',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Line Height', 'brainbizz'),
                'param_name' => 'title_line_height',
                'value' => '42px',
                'description' => esc_html__( 'Enter line height in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Font Weight', 'brainbizz'),
                'param_name' => 'title_weight',
                'value' => '400',
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Title Color', 'brainbizz' ),
                'param_name' => 'custom_title_color',
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__( 'Title Color', 'brainbizz' ),
                'param_name' => 'title_color',
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'value' => $header_font_color,
                'save_always' => true,
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Choose color for title.', 'brainbizz' ),
            ), 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Set Title Resonsive Font Size', 'brainbizz' ),
                'param_name' => 'responsive_font',
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Small Desktops', 'brainbizz'),
                'param_name' => 'font_size_desctop',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'responsive_font',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Tablets', 'brainbizz'),
                'param_name' => 'font_size_tablet',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'responsive_font',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Mobile', 'brainbizz'),
                'param_name' => 'font_size_mobile',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'responsive_font',
                    'value' => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for title', 'brainbizz' ),
                'param_name' => 'custom_fonts_title',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_title',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_title',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Title Styles', 'brainbizz' ),
            ),   
            // subtitle
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Subtitle Styles', 'brainbizz'),
                'param_name' => 'h_subtitle_styles',
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle Font Size', 'brainbizz'),
                'param_name' => 'subtitle_size',
                'value' => '14px',
                'description' => esc_html__( 'Enter font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle Line Height', 'brainbizz'),
                'param_name' => 'subtitle_line_height',
                'value' => '12px',
                'description' => esc_html__( 'Enter line height in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle Font Weight', 'brainbizz'),
                'param_name' => 'subtitle_weight',
                'value' => '600',
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Subtitle Color', 'brainbizz' ),
                'param_name' => 'custom_subtitle_color',
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type'          => 'colorpicker',
                'heading'       => esc_html__( 'Subtitle Color', 'brainbizz' ),
                'param_name'    => 'subtitle_color',
                'group'         => esc_html__( 'Subtitle Styles', 'brainbizz' ),
                'value'         => $theme_color,
                'save_always' => true,
                'dependency' => array(
                    'element' => 'custom_subtitle_color',
                    'value' => 'true',
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Choose color for subtitle.', 'brainbizz' ),
            ), 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for subtitle', 'brainbizz' ),
                'param_name' => 'custom_fonts_subtitle',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_subtitle',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_subtitle',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Subtitle Styles', 'brainbizz' ),
            ),              
        )
    ));
    
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Double_Headings extends WPBakeryShortCode {
            
        }
    } 
}
