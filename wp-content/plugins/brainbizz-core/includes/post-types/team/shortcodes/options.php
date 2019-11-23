<?php
if(!class_exists('BrainBizz_Theme_Helper')){
    return;
}

$theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
$header_font = BrainBizz_Theme_Helper::get_option('header-font');

if (function_exists('vc_map')) {
    vc_map(array(
        'base' => 'wgl_team',
        'name' => esc_html__('Team List', 'brainbizz'),
        'description' => esc_html__('Show Team Grid', 'brainbizz'),
        'icon' => 'wgl_icon_team',
        'category' => esc_html__('WGL Modules', 'brainbizz'),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Columns in Row', 'brainbizz'),
                'param_name' => 'posts_per_line',
                'edit_field_class' => 'vc_col-sm-4',
                'admin_label' => true,
                'value' => array(
                    esc_html__('One', 'brainbizz') => '1',
                    esc_html__('Two', 'brainbizz') => '2',
                    esc_html__('Three', 'brainbizz') => '3',
                    esc_html__('Four', 'brainbizz') => '4',
                    esc_html__('Five', 'brainbizz') => '5',
                ),
                'std' => '3'
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Team Info Alignment', 'brainbizz'),
                'param_name' => 'info_align',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
                'value' => array(
                    esc_html__('Left', 'brainbizz') => 'left',
                    esc_html__('Right', 'brainbizz') => 'right',
                    esc_html__('Center', 'brainbizz') => 'center',
                ),
                'std' => 'center',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Gap Between Items', 'brainbizz'),
                'param_name' => 'grid_gap',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-4 no-top-padding',
                'value' => array(
                    esc_html__('0', 'brainbizz') => '0',
                    esc_html__('2', 'brainbizz') => '2',
                    esc_html__('4', 'brainbizz') => '4',
                    esc_html__('6', 'brainbizz') => '6',
                    esc_html__('10', 'brainbizz') => '10',
                    esc_html__('20', 'brainbizz') => '20',
                    esc_html__('30', 'brainbizz') => '30',
                ),
                'std' => '30',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Link for Image', 'brainbizz' ),
                'param_name' => 'single_link_wrapper',
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Link for Heading', 'brainbizz' ),
                'param_name' => 'single_link_heading',
                'edit_field_class' => 'vc_col-sm-4',
                'std' => 'true',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Hide Meta', 'brainbizz'),
                'param_name' => 'h_hide_meta',
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Title', 'brainbizz' ),
                'param_name' => 'hide_title',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Department', 'brainbizz' ),
                'param_name' => 'hide_department',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Social Icons', 'brainbizz' ),
                'param_name' => 'hide_soc_icons',
                'edit_field_class' => 'vc_col-sm-3',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Hide Content', 'brainbizz' ),
                'param_name' => 'hide_content',
                'edit_field_class' => 'vc_col-sm-3',
                'std' => 'true'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Letters Count', 'brainbizz'),
                'param_name' => 'letter_count',
                'value' => '110',
                "dependency"    => array(
                    "element"   => "hide_content",
                    'value_not_equal_to' => 'true'
                ),
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz'),
                'param_name' => 'item_el_class',
                'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'brainbizz')
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Add Carousel for Team Items', 'brainbizz'),
                'param_name' => 'h_add_carousel',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                "group" => esc_html__( "Carousel", 'brainbizz' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Carousel', 'brainbizz' ),
                'param_name' => 'use_carousel',
                'edit_field_class' => 'vc_col-sm-4',
                "group" => esc_html__( "Carousel", 'brainbizz' ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Autoplay', 'brainbizz' ),
                "param_name"    => "autoplay",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Multiple Items', 'brainbizz' ),
                "param_name"    => "multiple_items",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Scroll Items', 'brainbizz' ),
                "param_name"    => "scroll_items",
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-6',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),
            // carousel pagination heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Pagination Controls', 'brainbizz'),
                'param_name' => 'h_pag_controls',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Pagination control', 'brainbizz' ),
                'param_name' => 'use_pagination',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
                'description' => esc_html__( 'Enter pagination top offset in pixels.', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Pagination Color', 'brainbizz' ),
                'param_name' => 'custom_pag_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel arrows heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Arrows Controls', 'brainbizz'),
                'param_name' => 'h_arrow_control',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Arrows control', 'brainbizz' ),
                'param_name' => 'use_prev_next',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Arrows Color', 'brainbizz' ),
                'param_name' => 'custom_buttons_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'dependency' => array(
                    'element' => 'use_prev_next',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Arrows Color', 'brainbizz'),
                'param_name' => 'buttons_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_buttons_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel responsive heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Responsive', 'brainbizz'),
                'param_name' => 'h_resp',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'brainbizz' ),
                'param_name' => 'custom_resp',
                "dependency"    => array(
                    "element"   => "use_carousel",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
            ),
            // medium desktop
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Medium Desktop', 'brainbizz'),
                'param_name' => 'h_resp_medium',
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
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
                'group' => esc_html__( 'Carousel', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Background Styles', 'brainbizz'),
                'param_name' => 'h_bg_styles',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
            ),
            // Background color
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'brainbizz' ),
                'param_name'    => 'bg_color_type',
                'value'         => array(
                    esc_html__( 'Default', 'brainbizz' )      => 'def',
                    esc_html__( 'Color', 'brainbizz' )      => 'color',
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
            ),
            // background hover color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz'),
                'param_name' => 'background_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select background color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Hover Color', 'brainbizz'),
                'param_name' => 'background_hover_color',
                'value' => '#ffffff',
                'description' => esc_html__('Select background hover color', 'brainbizz'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Title Colors', 'brainbizz'),
                'param_name' => 'h_title_styles',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Title Color', 'brainbizz' ),
                'param_name' => 'custom_title_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Color', 'brainbizz'),
                'param_name' => 'title_color',
                'value' => $header_font['color'],
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Title Hover Color', 'brainbizz'),
                'param_name' => 'title_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_title_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Department Colors', 'brainbizz'),
                'param_name' => 'h_depart_styles',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'brainbizz' ),
                'param_name' => 'custom_depart_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Department Color', 'brainbizz'),
                'param_name' => 'depart_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_depart_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Social Icons Colors', 'brainbizz'),
                'param_name' => 'h_soc_styles',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'brainbizz' ),
                'param_name' => 'custom_soc_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Social Icons Color', 'brainbizz'),
                'param_name' => 'soc_color',
                'value' => '#cfd1df',
                'dependency' => array(
                    'element' => 'custom_soc_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Social Icons Hover Color', 'brainbizz'),
                'param_name' => 'soc_hover_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_soc_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title styles heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Background Social Icons Colors', 'brainbizz'),
                'param_name' => 'h_bg_soc_styles',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            // title color checkbox
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Use Custom Color', 'brainbizz' ),
                'param_name' => 'custom_soc_bg_color',
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // title color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Social Icons Color', 'brainbizz'),
                'param_name' => 'soc_bg_color',
                'value' => '#f3f3f3',
                'dependency' => array(
                    'element' => 'custom_soc_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Social Icons Hover Color', 'brainbizz'),
                'param_name' => 'soc_bg_hover_color',
                'value' => '#f3f3f3',
                'dependency' => array(
                    'element' => 'custom_soc_bg_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Colors', 'brainbizz' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
        )
    ));
    BrainBizz_Loop_Settings::init('wgl_team', array( 'hide_cats' => true,
                    'hide_tags' => true));
    class WPBakeryShortCode_wgl_Team extends WPBakeryShortCode{}
}