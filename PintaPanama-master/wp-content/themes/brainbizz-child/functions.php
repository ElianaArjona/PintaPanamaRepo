<?php
	
function wgl_child_scripts() {
	wp_enqueue_style( 'wgl-parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wgl_child_scripts' );

function custom_btc_js(){
	// Custom Script by BTC
	wp_enqueue_script( 'isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', array(), '3', true );
	wp_enqueue_script( 'custom-btc', '/wp-content/themes/brainbizz-child/js/custom-btc.js', array( 'jquery' ), '2.0.0', true );
	
}
add_action( 'wp_enqueue_scripts', 'custom_btc_js' );


add_action( 'init', 'titles_category_taxonomy', 0 );
function titles_category_taxonomy(){
    $labels = array(
        'name' => _x( 'Title Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Title', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Titles' ),
        'popular_items' => __( 'Popular Titles' ),
        'all_items' => __( 'All Titles' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Title' ),
        'update_item' => __( 'Update Title' ),
        'add_new_item' => __( 'Add Title' ),
        'new_item_name' => __( 'New Name Title' ),
        'separate_items_with_commas' => __( 'Separate categories with commas' ),
        'add_or_remove_items' => __( 'Add or remove Title' ),
        'choose_from_most_used' => __( 'Choose Title most used' ),
        );
    register_taxonomy('titles_category','team', array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'query_var' => true,
		));
}
//Utilities Functions
function normalize ($string) {
    $table = array(
        'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
        'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
        'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
        'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
        'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
        'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
        'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r','.'=>'', '&amp;'=>'and',
    );
    $normalize = strtr($string, $table);
    $joinSpace = str_replace(' ', '', $normalize);
    
    return strtolower($joinSpace);
}

/**
 * Your code here.
 *
 */
