<?php
if(!class_exists('BrainBizz_Theme_Helper')){
    return;
}
$theme_color = BrainBizz_Theme_Helper::get_option('theme-custom-color');
$theme_color_second = BrainBizz_Theme_Helper::get_option('theme-secondary-color');
$header_font = BrainBizz_Theme_Helper::get_option('header-font');
$main_font = BrainBizz_Theme_Helper::get_option('main-font');
$theme_gradient = BrainBizz_Theme_Helper::get_option('theme-gradient');

if (function_exists('vc_map')) {
    vc_map( array(
        "name" => esc_html__("Portfolio List", 'brainbizz-core'),
        "base" => $this->shortcodeName,
        "class" => 'brainbizz_portfolio_list',
        "category" => esc_html__('WGL Modules', 'brainbizz-core'),
        "icon" => 'wgl_icon_portfolio_module',
        "content_element" => true,
        "description" => esc_html__("Portfolio List",'brainbizz-core'),
        "params" => array(
            array(
                'type' => 'brainbizz_radio_image',
                'heading' => esc_html__('Layout', 'brainbizz-core'),
                'param_name' => 'portfolio_layout',
                'fields' => array(
                    'grid' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_grid.png',
                        'label' => esc_html__('Grid', 'brainbizz-core')),
                    'carousel' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_carousel.png',
                        'label' => esc_html__('Carousel', 'brainbizz-core')),
                    'masonry' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry', 'brainbizz-core')),
                    'masonry2' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 2', 'brainbizz-core')),
                    'masonry3' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 3', 'brainbizz-core')),
                    'masonry4' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/layout_masonry.png',
                        'label' => esc_html__('Masonry 4', 'brainbizz-core')),
                ),
                'value' => 'grid',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Column', 'brainbizz-core'),
                'param_name' => 'posts_per_row',
                'admin_label' => true,
                'value' => array(
                    esc_html__("1", 'brainbizz-core') => '1',
                    esc_html__("2", 'brainbizz-core') => '2',
                    esc_html__("3", 'brainbizz-core') => '3',
                    esc_html__("4", 'brainbizz-core') => '4',
                    esc_html__("5", 'brainbizz-core') => '5',
                ),
                'std' => '3',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('grid', 'masonry', 'carousel')
                ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Filter', 'brainbizz-core' ),
                'param_name' => 'show_filter',
                'value' => array( esc_html__( 'Yes', 'brainbizz-core' ) => 'yes' ),
                'std' => '',
                'save_always' => true,
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('grid', 'masonry', 'masonry2', 'masonry3')
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Filter Style', 'brainbizz-core'),
                'param_name' => 'filter_style',
                'admin_label' => true,
                'value' => array(
                    esc_html__("Default", 'brainbizz-core') => 'def',
                    esc_html__("With Background", 'brainbizz-core') => 'with_bg',
                ),
                'dependency' => array(
                    'element' => 'show_filter',
                    "value" => "yes"
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ),   
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Filter Align', 'brainbizz-core'),
                'param_name' => 'filter_align',
                'value' => array(
                    esc_html__("Left", 'brainbizz-core') => 'left',
                    esc_html__("Right", 'brainbizz-core') => 'right',
                    esc_html__("Center", 'brainbizz-core') => 'center',
                ),
                'std' => 'center',
                'dependency' => array(
                    'element' => 'show_filter',
                    "value" => "yes"
                ),
                'edit_field_class' => 'vc_col-sm-4',
            ), 
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Crop Images', 'brainbizz-core' ),
                'param_name' => 'crop_images',
                'value' => array( esc_html__( 'Yes', 'brainbizz-core' ) => 'yes' ),
                'std' => 'yes',
                'save_always' => true,
            ),            
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Pagination', 'brainbizz-core'),
                'param_name' => 'view_style',
                'admin_label' => true,
                'save_always' => true,
                'value' => array(
                    esc_html__('Static', 'brainbizz-core') => "standard",
                    esc_html__('Ajax load', 'brainbizz-core') => "ajax",
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Pagination', 'brainbizz-core' ),
                'param_name' => 'show_pagination',
                'value' => array( esc_html__( 'Yes', 'brainbizz-core' ) => 'yes' ),
                'std' => 'not',
                'dependency' => array(
                    'element' => 'view_style',
                    "value" => "standard"
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Navigation\'s Alignment', 'brainbizz-core' ),
                'param_name' => 'portfolio_navigation_align',
                'value'         => array(
                    esc_html__( 'Center', 'brainbizz-core' ) => 'center',
                    esc_html__( 'Left', 'brainbizz-core' ) => 'left',
                    esc_html__( 'Right', 'brainbizz-core' ) => 'right'
                ),
                'description' => esc_html__('Select Navigation\'s Alignment.', 'brainbizz-core'),
                'std' => 'left',
                'dependency' => array(
                    'element' => 'show_pagination',
                    'value' => 'yes',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Show Load More Button', 'brainbizz-core' ),
                'param_name' => 'show_loadmore',
                'value' => array( esc_html__( 'Yes', 'brainbizz-core' ) => 'yes' ),
                'std' => 'not',
                'dependency' => array(
                    'element' => 'view_style',
                    "value" => "ajax"
                )
            ),                    
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Items on load', 'brainbizz-core'),
                'param_name' => 'items_load',
                'value' => '4',
                'save_always' => true,
                'description' => esc_html__( 'Items load by load more button.', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'show_loadmore',
                    "value" => "yes"
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Grid Gap', 'brainbizz-core'),
                'param_name' => 'grid_gap',
                'admin_label' => true,
                'edit_field_class' => 'vc_col-sm-6',
                'value' => array(
                    esc_html__("0", 'brainbizz-core') => '0px',
                    esc_html__("1", 'brainbizz-core') => '1px',
                    esc_html__("2", 'brainbizz-core') => '2px',
                    esc_html__("3", 'brainbizz-core') => '3px',
                    esc_html__("4", 'brainbizz-core') => '4px',
                    esc_html__("5", 'brainbizz-core') => '5px',
                    esc_html__("10", 'brainbizz-core') => '10px',
                    esc_html__("15", 'brainbizz-core') => '15px',
                    esc_html__("20", 'brainbizz-core') => '20px',
                    esc_html__("25", 'brainbizz-core') => '25px',
                    esc_html__("30", 'brainbizz-core') => '30px',
                    esc_html__("35", 'brainbizz-core') => '35px',
                ),
                'std' => '30px',
            ),
            vc_map_add_css_animation( true ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Extra Class', 'brainbizz-core'),
                'param_name' => 'item_el_class',
                'description' => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'brainbizz-core')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Click Item', 'brainbizz-core'),
                'param_name' => 'click_area',
                'admin_label' => true,
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
                'value' => array(
                    esc_html__("Single", 'brainbizz-core') => 'single',
                    esc_html__("Popup", 'brainbizz-core') => 'popup',
                    esc_html__("Default", 'brainbizz-core') => 'none',
                ),
                'std' => 'popup',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Show Info Position', 'brainbizz-core'),
                'param_name' => 'info_position',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Inside Image', 'brainbizz-core') => 'inside_image',
                    esc_html__('Under Image', 'brainbizz-core') => 'under_image',
                ),
                'std' => 'inside_image',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Inside Image Animation', 'brainbizz-core'),
                'param_name' => 'image_anim',
                'value' => array(
                    esc_html__('Default', 'brainbizz-core') => 'default',
                    esc_html__('Always Show Info', 'brainbizz-core') => 'always_info',
                ),
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'info_position',
                    'value' => array('inside_image')
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Horizontal Align', 'brainbizz-core'),
                'param_name' => 'horizontal_align',
                'admin_label' => true,
                'value' => array(
                    esc_html__('Left', 'brainbizz-core') => 'Left',
                    esc_html__('Center', 'brainbizz-core') => 'center',
                    esc_html__('Right', 'brainbizz-core') => 'right'
                ),
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'info_position',
                    'value' => array('under_image')
                )
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Content Elements', 'brainbizz-core'),
                'param_name' => 'h_content_elements',
                'group' => esc_html__( 'Icon', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Title?', 'brainbizz-core' ),
                'param_name' => 'show_portfolio_title',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
                'std' => 'true',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Content?', 'brainbizz-core' ),
                'param_name' => 'show_content',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show author?', 'brainbizz-core' ),
                'param_name' => 'show_meta_author',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show categories?', 'brainbizz-core' ),
                'param_name' => 'show_meta_categories',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
                'std' => 'true',
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show date?', 'brainbizz-core' ),
                'param_name' => 'show_meta_date',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Likes?', 'brainbizz-core' ),
                'param_name' => 'show_likes',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),            
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__('Show Comments?', 'brainbizz-core' ),
                'param_name' => 'show_comments',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            // Content Letter Count
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Letter Count', 'brainbizz-core'),
                'param_name' => 'content_letter_count',
                'value' => '85',
                'description' => esc_html__( 'Enter content letter count.', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Content', 'brainbizz-core' ),
            ),
            // Portfolio Headings Font
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for Portfolio Headings', 'brainbizz-core' ),
                'param_name' => 'custom_fonts_portfolio_headings',
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_portfolio_headings',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'brainbizz-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'brainbizz-core' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_fonts_portfolio_headings',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),

            // --- CAROUSEL GROUP --- //
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Carousel Options', 'brainbizz-core'),
                'param_name' => 'h_portfolio_carousel',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                "type"          => "wgl_checkbox",
                'heading' => esc_html__( 'Autoplay', 'brainbizz-core' ),
                "param_name"    => "autoplay",
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
            ),
            array(
                "type"          => "textfield",
                "heading"       => esc_html__( 'Autoplay Speed', 'brainbizz-core' ),
                "param_name"    => "autoplay_speed",
                "dependency"    => array(
                    "element"   => "autoplay",
                    "value" => 'true'
                ),
                'edit_field_class' => 'vc_col-sm-4',
                "value"         => "3000",
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Multiple Items', 'brainbizz-core' ),
                'param_name' => 'multiple_items',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            // carousel pagination heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Pagination Controls', 'brainbizz-core'),
                'param_name' => 'h_pag_controls',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Pagination control', 'brainbizz-core' ),
                'param_name' => 'use_pagination',
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'std' => 'true'
            ),
            array(
                'type' => 'brainbizz_radio_image',
                'heading' => esc_html__('Pagination Type', 'brainbizz-core'),
                'param_name' => 'pag_type',
                'fields' => array(
                    'circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle.png',
                        'label' => esc_html__('Circle', 'brainbizz-core')),
                    'circle_border' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_circle_border.png',
                        'label' => esc_html__('Empty Circle', 'brainbizz-core')),
                    'square' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_square.png',
                        'label' => esc_html__('Square', 'brainbizz-core')),
                    'line' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line.png',
                        'label' => esc_html__('Line', 'brainbizz-core')),
                    'line_circle' => array(
                        'image_url' => get_template_directory_uri() . '/img/wgl_composer_addon/icons/pag_line_circle.png',
                        'label' => esc_html__('Line - Circle', 'brainbizz-core')),
                ),
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
                'value' => 'circle',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Pagination Top Offset', 'brainbizz-core' ),
                'param_name' => 'pag_offset',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-4',
                'description' => esc_html__( 'Enter pagination top offset in pixels.', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Pagination Color', 'brainbizz-core' ),
                'param_name' => 'custom_pag_color',
                'edit_field_class' => 'vc_col-sm-4',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'use_pagination',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Pagination Color', 'brainbizz-core'),
                'param_name' => 'pag_color',
                'value' => $theme_color,
                'dependency' => array(
                    'element' => 'custom_pag_color',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-4',
            ),
            // carousel pagination heading
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Responsive', 'brainbizz-core'),
                'param_name' => 'h_resp',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Customize Responsive', 'brainbizz-core' ),
                'param_name' => 'custom_resp',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => 'carousel'
                ),
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
            ),
            // medium desktop
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Medium Desktop', 'brainbizz-core'),
                'param_name' => 'h_resp_medium',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz-core' ),
                'param_name' => 'resp_medium',
                'value' => '1025',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz-core' ),
                'param_name' => 'resp_medium_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            
            // tablets
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Tablets', 'brainbizz-core'),
                'param_name' => 'h_resp_tablets',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz-core' ),
                'param_name' => 'resp_tablets',
                'value' => '800',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz-core' ),
                'param_name' => 'resp_tablets_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            // mobile phones
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Mobile Phones', 'brainbizz-core'),
                'param_name' => 'h_resp_mobile',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Screen resolution', 'brainbizz-core' ),
                'param_name' => 'resp_mobile',
                'value' => '480',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Slides to show', 'brainbizz-core' ),
                'param_name' => 'resp_mobile_slides',
                'value' => '',
                'group' => esc_html__( 'Carousel', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
                'dependency' => array(
                    'element' => 'custom_resp',
                    'value' => 'true',
                ),
            ),

            // --- CUSTOM GROUP --- //
            // Portfolio Font
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom font family for Portfolio Content', 'brainbizz-core' ),
                'param_name' => 'custom_fonts_portfolio_content',
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts_portfolio',
                'value' => '',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'brainbizz-core' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'brainbizz-core' ),
                    ),
                ),
                'dependency' => array(
                    'element' => 'custom_fonts_portfolio_content',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom styles for Portfolio', 'brainbizz-core' ),
                'param_name' => 'custom_portfolio_style',
                'description' => esc_html__( 'Custom portfolio font size and font color.', 'brainbizz-core' ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            // Custom portfolio style
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Main Color', 'brainbizz-core'),
                'param_name' => 'custom_main_color',
                'value' => esc_attr(BrainBizz_Theme_Helper::get_option('theme-custom-color')),
                'description' => esc_html__('Select custom main color.', 'brainbizz-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),            
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Filter Color', 'brainbizz-core'),
                'param_name' => 'custom_filter_color',
                'value' => esc_attr(BrainBizz_Theme_Helper::get_option('theme-custom-color')),
                'description' => esc_html__('Select custom filter color.', 'brainbizz-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Headings Color', 'brainbizz-core'),
                'param_name' => 'custom_headings_color',
                'value' => esc_attr($header_font['color']),
                'description' => esc_html__('Select custom headings color.', 'brainbizz-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'colorpicker',
                'class' => '',
                'heading' => esc_html__('Custom Content Color', 'brainbizz-core'),
                'param_name' => 'custom_content_color',
                'value' => esc_attr($main_font['color']),
                'description' => esc_html__('Select custom content color.', 'brainbizz-core'),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Heading Font Size', 'brainbizz-core'),
                'param_name' => 'heading_font_size',
                'value' => '30',
                'description' => esc_html__( 'Enter heading font-size in pixels.', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // Heading Font Size
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content Font Size', 'brainbizz-core'),
                'param_name' => 'content_font_size',
                'value' => '16',
                'description' => esc_html__( 'Enter content font-size in pixels.', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'custom_portfolio_style',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'save_always' => true,
                'edit_field_class' => 'vc_col-sm-6',
            ),
           array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('Overlay settings', 'brainbizz-core'),
                'param_name' => 'h_content_overlay',
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'Background Customize Colors', 'brainbizz-core' ),
                'param_name'    => 'bg_color_type',
                'value'         => array(
                    esc_html__( 'None', 'brainbizz-core' )      => 'none',
                    esc_html__( 'Color', 'brainbizz-core' )      => 'color',
                    esc_html__( 'Gradient', 'brainbizz-core' )     => 'gradient',
                ),
                'std' => 'color',
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
            ),
            // background color
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Color', 'brainbizz-core'),
                'param_name' => 'background_color',
                'value' => 'rgba(33, 33, 34, 0.7)',
                'description' => esc_html__('Select background color', 'brainbizz-core'),
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'color'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background Gradient start
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background Start Color', 'brainbizz-core'),
                'param_name' => 'background_gradient_start',
                'value' => 'rgba('.BrainBizz_Theme_Helper::HexToRGB($theme_gradient['from']).', 0.85)',
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            // background Gradient end
            array(
                'type' => 'colorpicker',
                'heading' => esc_html__('Background End Color', 'brainbizz-core'),
                'param_name' => 'background_gradient_end',
                'value' => 'rgba('.BrainBizz_Theme_Helper::HexToRGB($theme_gradient['to']).', 0.85)',
                'dependency' => array(
                    'element' => 'bg_color_type',
                    'value' => 'gradient'
                ),
                'group' => esc_html__( 'Font', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
                'type' => 'brainbizz_param_heading',
                'heading' => esc_html__('First Item', 'brainbizz-core'),
                'param_name' => 'h_content_overlay',
                'edit_field_class' => 'vc_col-sm-12 no-top-margin',
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('masonry4')
                ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Custom First Item', 'brainbizz-core' ),
                'param_name' => 'add_first_item',
                'dependency'    => array(
                    'element'   => 'portfolio_layout',
                    'value' => array('masonry4')
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title', 'brainbizz-core'),
                'param_name' => 'title',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle', 'brainbizz-core'),
                'param_name' => 'subtitle',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Background Title', 'brainbizz-core'),
                'param_name' => 'bgtitle',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
            ),
            array(
                'type' => 'textarea_html',
                'holder' => 'div',
                'heading' => esc_html__('Content.', 'brainbizz-core') ,
                'param_name' => 'content',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
            ),
            array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Add Button', 'brainbizz-core' ),
                'param_name' => 'add_button',
                'dependency' => array(
                    'element' => 'add_first_item',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
            array(
				'type' => 'textfield',
				'heading' => esc_html__('Button Text', 'brainbizz-core'),
				'param_name' => 'button_title',
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
			),
			// Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__( 'Button Link', 'brainbizz-core' ),
				'param_name' => 'link',
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
				'description' => esc_html__('Add link to button.', 'brainbizz-core')
			),
			array(
                'type' => 'wgl_checkbox',
                'heading' => esc_html__( 'Custom Button Colors', 'brainbizz-core' ),
                'param_name' => 'custom_button',
                'dependency' => array(
                    'element' => 'add_button',
                    'value' => 'true'
                ),
                'group' => esc_html__( 'First Item', 'brainbizz-core' ),
                'edit_field_class' => 'vc_col-sm-12',
            ),
			// Button text-color header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Text Color', 'brainbizz-core'),
				'param_name' => 'h_text_color',
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'color'
				),
			),
			// Button text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Text Color', 'brainbizz-core'),
				'param_name' => 'button_text_color',
				'value' => '#313131',
				'description' => esc_html__('Select custom text color for button.', 'brainbizz-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover text-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Text Color', 'brainbizz-core'),
				'param_name' => 'button_text_color_hover',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom text color for hover button.', 'brainbizz-core'),
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true',
				),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Bg header
			array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Background Color', 'brainbizz-core'),
				'param_name' => 'h_background_color',
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
			),
			// Button Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Background', 'brainbizz-core'),
				'param_name' => 'button_bg_color',
				'value' => '#ffffff',
				'description' => esc_html__('Select custom background for button.', 'brainbizz-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover Bg
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Background', 'brainbizz-core'),
				'param_name' => 'button_bg_color_hover',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom background for hover button.', 'brainbizz-core'),
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'save_always' => true,
				'edit_field_class' => 'vc_col-sm-6',
            ),
            array(
				'type' => 'brainbizz_param_heading',
				'heading' => esc_html__('Border Color', 'brainbizz-core'),
				'param_name' => 'h_border_color',
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-12',
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
			),
			// Button border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Border Color', 'brainbizz-core'),
				'param_name' => 'button_border_color',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom border color for button.', 'brainbizz-core'),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'edit_field_class' => 'vc_col-sm-6',
			),
			// Button Hover border-color
			array(
				'type' => 'colorpicker',
				'class' => '',
				'heading' => esc_html__('Hover Border Color', 'brainbizz-core'),
				'param_name' => 'button_border_color_hover',
				'value' => $theme_color_second,
				'description' => esc_html__('Select custom border color for hover button.', 'brainbizz-core'),
				'group' => esc_html__( 'First Item', 'brainbizz-core' ),
				'save_always' => true,
				'dependency' => array(
					'element' => 'custom_button',
					'value' => 'true'
				),
				'edit_field_class' => 'vc_col-sm-6',
			),
        )
));
    BrainBizz_Loop_Settings::init($this->shortcodeName, array( 'hide_cats' => true,
                    'hide_tags' => true));
}
?>