<?php

    $theme_color = esc_attr(BrainBizz_Theme_Helper::get_option("theme-custom-color"));
    $header_font_color = esc_attr(BrainBizz_Theme_Helper::get_option('header-font')['color']);

    $defaults = array(
        'values' => '',
        'units' => '%',
        'extra_class' => '',
    );

    $atts = vc_shortcode_attribute_parse($defaults, $atts);
    extract($atts);
   
    wp_enqueue_script('appear', get_template_directory_uri() . '/js/jquery.appear.js', array(), false, false);

    $output = $points_render = $content = $value_render = $progress_classes = $animation_class = '';

    // Animation
    if (!empty($atts['css_animation'])) {
        $animation_class = $this->getCSSAnimation( $atts['css_animation'] );
    }

    // Progress bar classes
    $progress_classes .= !empty($animation_class) ? ' '.$animation_class : '';
    $progress_classes .= !empty($extra_class) ? ' '.$extra_class : '';

    // Progress bar
    $values = (array) vc_param_group_parse_atts( $values );
    $item_data = array();
    foreach ( $values as $data ) {
        $new_data = $data;
        $new_data['label'] = isset( $data['label'] ) ? esc_html($data['label']) : '';
        $new_data['point_value'] = isset( $data['point_value'] ) ? (int)$data['point_value'] : '0';
        $new_data['bar_color_type'] = isset( $data['bar_color_type'] ) ? $data['bar_color_type'] : 'def';
        $new_data['text_color'] = isset( $data['text_color'] ) ? esc_attr($data['text_color']) : $header_font_color;
        $new_data['bar_color'] = isset( $data['bar_color'] ) ? esc_attr($data['bar_color']) : $theme_color;
        $new_data['bg_bar_color'] = isset( $data['bg_bar_color'] ) ? esc_attr($data['bg_bar_color']) : '#e8e9f2';

        $item_data[] = $new_data;
    }

    foreach ( $item_data as $item_d ) {

        // unique id
        if ($item_d['bar_color_type'] != 'def') {
            $progress_id = uniqid( "progress_" );
            $progress_attr = 'id='.$progress_id;
        } else{
            $progress_attr = '';
        }
        // custom social colors
        ob_start();
            if ($item_d['bar_color_type'] != 'def') {
                echo "#$progress_id .progress_label,
                      #$progress_id .progress_value,
                      #$progress_id .progress_units{
                    color: ".$item_d['text_color'].";
                }";
                echo "#$progress_id .progress_bar,
                    #$progress_id .progress_label_wrap:before{
                    background: ".$item_d['bar_color'].";
                }";
                echo "#$progress_id.progress_bar_wrap{
                    background: ".$item_d['bg_bar_color'].";
                }";
            }
        $styles = ob_get_clean();
        BrainBizz_shortcode_css()->enqueue_brainbizz_css($styles);

        $content .= '<div '.$progress_attr.' class="progress_bar_wrap">';
            $content .= '<div class="progress_bar" data-width="'.$item_d['point_value'].'">';
                $content .= '<div class="progress_label_wrap">';
                    $content .= '<h5 class="progress_label">'.$item_d['label'].'</h5>';
                $content .= '</div>';
            $content .= '</div>';
            $content .= '<div class="progress_value_wrap">';
                $content .= '<span class="progress_value">'.$item_d['point_value'].'</span>';
                $content .= '<span class="progress_units">'.$units.'</span>';
            $content .= '</div>';
        $content .= '</div>';
    }

    $output .= '<div class="brainbizz_module_progress_bar'.esc_attr($progress_classes).'">';
        $output .= $content;
    $output .= '</div>';

    echo BrainBizz_Theme_Helper::render_html($output);

?>