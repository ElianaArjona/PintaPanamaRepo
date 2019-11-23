<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option('theme-custom-color'));

if (function_exists('vc_map')) {
    vc_map(array(
        'name' => esc_html__('Button', 'brainbizz'),
        'base' => 'wgl_button',
        'class' => 'brainbizz_button',
        'icon' => 'wgl_icon_button',
        'content_element' => true,
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'description' => esc_html__('Add extended button','brainbizz'),
        'params' => array(
            // General Settings
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Text', 'brainbizz'),
                'value' => esc_html__('Button Text', 'brainbizz'),
                'param_name' => 'button_text',
                'admin_label' => true,
            ),
            array(
                'type' => 'vc_link',
                'heading' => esc_html__( 'Button Link', 'brainbizz' ),
                'param_name' => 'link',
            ),
            // Button Animations
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'extra_class',
                'description' => esc_html__('Add an extra class name to the element and refer to it from Custom CSS option.', 'brainbizz')
            ),
            // Button Style
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Style', 'brainbizz'),
                'param_name' => 'h_button_style',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Size', 'brainbizz' ),
                'param_name' => 'size',
                'value' => array(
                    esc_html__( 'Small', 'brainbizz' ) => 's',
                    esc_html__( 'Medium', 'brainbizz' ) => 'm',
                    esc_html__( 'Large', 'brainbizz' ) => 'l',
                    esc_html__( 'Extra Large', 'brainbizz' ) => 'xl',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'std' => 'xl',
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__('Select button size.', 'brainbizz')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Border Radius', 'brainbizz'),
                'value' => '',
                'param_name' => 'border_radius',
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'description' => esc_html__('Enter border radius in pixels.', 'brainbizz')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Align', 'brainbizz' ),
                'param_name' => 'align',
                'value' => array(
                    esc_html__( 'Left', 'brainbizz' ) => 'left',
                    esc_html__( 'Center', 'brainbizz' ) => 'center',
                    esc_html__( 'Right', 'brainbizz' ) => 'right',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__('Select button align.', 'brainbizz')
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Button Full Width', 'brainbizz' ),
                'param_name' => 'full_width',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-3',
            ), 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Button Inline', 'brainbizz' ),
                'param_name' => 'inline',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-3',
            ), 
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Border', 'brainbizz'),
                'param_name' => 'h_button_border',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Button Border', 'brainbizz' ),
                'param_name' => 'add_border',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'std' => 'true'
            ), 
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Border Width', 'brainbizz'),
                'value' => '1px',
                'param_name' => 'border_width',
                'dependency' => array(
                    'element' => 'add_border',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-8',
                'description' => esc_html__('Enter border width in pixels.', 'brainbizz')
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Shadow', 'brainbizz'),
                'param_name' => 'h_button_shadow',
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Button Shadow Style', 'brainbizz' ),
                'param_name' => 'shadow_style',
                'value' => array(
					esc_html__( 'None', 'brainbizz' ) => 'none',
					esc_html__( 'Always', 'brainbizz' ) => 'always',
					esc_html__( 'On Hover', 'brainbizz' ) => 'on_hover',
					esc_html__( 'Before Hover', 'brainbizz' ) => 'before_hover',
                ),
                'group' => esc_html__( 'Style', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'description' => esc_html__('Select button shadow style.', 'brainbizz')
            ),
            // Button Typography
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for button', 'brainbizz' ),
                'param_name' => 'custom_fonts_button',
                'description' => esc_html__( 'Customize font family', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_button',
                'value' => '',
                'dependency' => array(
                    'element' => 'custom_fonts_button',
                    'value' => 'true',
                ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Font Size', 'brainbizz'),
                'param_name' => 'font_size',
                'value' => '',
                'description' => esc_html__( 'Enter button font-size in pixels.', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),            
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Font Weight', 'brainbizz'),
                'param_name' => 'font_weight',
                'value' => '',
                'description' => esc_html__( 'Enter button font-weight.', 'brainbizz' ),
                'group' => esc_html__( 'Typography', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Icon
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Icon Type', 'brainbizz'),
                'param_name' => 'h_icon_type',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'icon_type',
                'value' => array(
                    esc_html__('None','brainbizz') => 'none',
                    esc_html__('Font','brainbizz') => 'font',
                    esc_html__('Image','brainbizz') => 'image',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'description' => esc_html__('Select button icon type (font icon or custom image)', 'brainbizz'),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'icon_font_type',
                'value' => array(
                    esc_html__( 'Fontawesome', 'brainbizz' ) => 'type_fontawesome',
                    esc_html__( 'Flaticon', 'brainbizz' ) => 'type_flaticon',
                ),
                'save_always' => true,
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font',
                ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__('Icon', 'brainbizz'),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust',
                'settings' => array(
                    'emptyIcon' => false,
                    'iconsPerPage' => 200, 
                ),
                'dependency' => array(
                    'element' => 'icon_font_type',
                    'value' => 'type_fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'brainbizz' ),
                'param_name' => 'icon_flaticon',
                'value' => '',
                'settings' => array(
                    'emptyIcon' => false,
                    'type' => 'flaticon',
                    'iconsPerPage' => 200,
                ),
                'description' => esc_html__( 'Select icon from library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_font_type',
                    'value' => 'type_flaticon',
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image', 'brainbizz'),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Image Width', 'brainbizz'),
                'param_name' => 'img_width',
                'value' => '',
                'description' => esc_html__( 'Enter image width in pixels.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'image'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Position', 'brainbizz'),
                'param_name' => 'icon_position',
                'value' => array(
                    esc_html__('Left', 'brainbizz') => 'left',
                    esc_html__('Right', 'brainbizz') => 'right'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Select button icon position.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => array('image', 'font')
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Icon Font Size', 'brainbizz'),
                'param_name' => 'icon_font_size',
                'value' => '',
                'edit_field_class' => 'vc_col-sm-6',
                'description' => esc_html__( 'Enter icon font-size in pixels.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
            ),
            // Button icon-color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Colors', 'brainbizz' ),
                'param_name' => 'custom_icon_color',
                'description' => esc_html__( 'Select custom colors', 'brainbizz' ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'icon_type',
                    'value' => 'font'
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Button icon-color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Icon Color', 'brainbizz'),
                'param_name' => 'icon_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select icon color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Button Hover icon-color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Hover Icon Color', 'brainbizz'),
                'param_name' => 'icon_color_hover',
                'value' => '#ffffff',
                'description' => esc_html__('Select icon hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'custom_icon_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Icon', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // Button Spacing
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Paddings', 'brainbizz'),
                'param_name' => 'heading',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Left Padding', 'brainbizz'),
                'param_name' => 'left_pad',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button left padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Right Padding', 'brainbizz'),
                'param_name' => 'right_pad',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button right padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Top Padding', 'brainbizz'),
                'param_name' => 'top_pad',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button top padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Bottom Padding', 'brainbizz'),
                'param_name' => 'bottom_pad',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button bottom padding in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Margins', 'brainbizz'),
                'param_name' => 'heading',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Left Margin', 'brainbizz'),
                'param_name' => 'left_mar',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button left margin in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Right Margin', 'brainbizz'),
                'param_name' => 'right_mar',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button right margin in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Top Margin', 'brainbizz'),
                'param_name' => 'top_mar',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button top margin in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button Bottom Margin', 'brainbizz'),
                'param_name' => 'bottom_mar',
                'value' => '',
                'group' => esc_html__( 'Spacing', 'brainbizz' ),
                'description' => esc_html__( 'Enter button bottom margin in pixels.', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Button Colors
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Button Colors', 'brainbizz'),
                'param_name' => 'h_button_colors',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Customize', 'brainbizz' ),
                'param_name' => 'customize',
                'value' => array(
                    esc_html__( 'Default', 'brainbizz' ) => 'def',
                    esc_html__( 'Color', 'brainbizz' ) => 'color',
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Text Color', 'brainbizz'),
                'param_name' => 'h_text_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Text Color', 'brainbizz'),
                'param_name' => 'text_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select custom text color for button.', 'brainbizz'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Hover Text Color', 'brainbizz'),
                'param_name' => 'text_color_hover',
                'value' => $theme_color,
                'description' => esc_html__('Select custom text color for hover button.', 'brainbizz'),
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'h_background_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Background', 'brainbizz'),
                'param_name' => 'bg_color',
                'value' => $theme_color,
                'description' => esc_html__('Select custom background for button.', 'brainbizz'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Hover Background', 'brainbizz'),
                'param_name' => 'bg_color_hover',
                'value' => '#ffffff',
                'description' => esc_html__('Select custom background for hover button.', 'brainbizz'),
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Border Color', 'brainbizz'),
                'param_name' => 'h_border_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Border Color', 'brainbizz'),
                'param_name' => 'border_color',
                'value' => $theme_color,
                'description' => esc_html__('Select custom border color for button.', 'brainbizz'),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Hover Border Color', 'brainbizz'),
                'param_name' => 'border_color_hover',
                'value' => $theme_color,
                'description' => esc_html__('Select custom border color for hover button.', 'brainbizz'),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'save_always' => true,
                'dependency' => array(
                    'element' => 'customize',
                    'value' => 'color'
                ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_wgl_Button extends WPBakeryShortCode {
        }
    }
}