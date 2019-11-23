<?php
if(!class_exists('BrainBizz_Theme_Helper')){
    return;
}
get_header();


$term_slug = isset(get_queried_object()->term_id) ? get_queried_object()->term_id : '';
$term_slug = !empty($term_slug) ? $term_slug : '';

//Show Filter Options
$show_filter = BrainBizz_Theme_Helper::get_option('portfolio_list_show_filter');
$list_terms =  BrainBizz_Theme_Helper::get_option('portfolio_list_filter_cats');

if(!empty($term_slug)){
    $show_filter = '';
}

if(!empty($show_filter) && !empty($list_terms)){
    $term_slug = implode(', ', $list_terms);
}

$defaults = array(
    'title' => '',
    'subtitle' => '',
    'view_all_link' => '',
    'show_view_all' => 'no',
    'click_area' => 'single',
    'posts_per_row' => BrainBizz_Theme_Helper::get_option('portfolio_list_columns'),
    'item_el_class' => '', 
    'css' => '',
    'show_portfolio_title' => BrainBizz_Theme_Helper::get_option('portfolio_list_show_title'),
    'show_content' => BrainBizz_Theme_Helper::get_option('portfolio_list_show_content'),
    'show_meta_categories' => BrainBizz_Theme_Helper::get_option('portfolio_list_show_cat'),
    'view_style' => 'ajax',
    'show_filter' => $show_filter,
    'crop_images' => 'yes',
    'items_load' => '4',
    'grid_gap' => '30px',
    'add_overlay' => 'true',
    'portfolio_layout' => 'masonry',
    'custom_overlay_color' => 'rgba(34,35,40,.7)',
    'number_of_posts' => '12',
    'order_by' => 'menu_order',
    'order' => 'ASC',
    'post_type' => 'portfolio',
    'taxonomies' => $term_slug,
);
extract($defaults);
$layout = BrainBizz_Theme_Helper::get_option('portfolio_list_sidebar_layout');
$sidebar = BrainBizz_Theme_Helper::get_option('portfolio_list_sidebar_def');
$column = 12;

if ( $layout == 'left' || $layout == 'right' ) {
    $column = 9;
}else{
    $sidebar = '';
}
$row_class = $layout != 'none' ? ' sidebar_'.esc_attr($layout) : '';
?>
    <div class="wgl-container">
        <div class="row<?php echo esc_attr($row_class); ?>">
            <div id='main-content' class="wgl_col-<?php echo (int)$column; ?>">
                <?php
                $portfolio_render = new WglPortfolio();
                echo $portfolio_render->render($defaults);
                ?>
            </div>
            <?php
            if ($layout == 'left' || $layout == 'right') {
                echo '<div class="sidebar-container wgl_col-'.(12 - (int)esc_attr($column)).'">';
                if (is_active_sidebar( $sidebar )) {
                    echo "<aside class='sidebar'>";
                    dynamic_sidebar( $sidebar );
                    echo "</aside>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
    
<?php get_footer(); ?>
