<?php
get_header();

$sb = BrainBizz_Theme_Helper::render_sidebars('blog_list');
$row_class = $sb['row_class'];
$column = $sb['column'];

?>
    <div class="wgl-container">
        <div class="row<?php echo apply_filters('brainbizz_row_class', $row_class); ?>">
            <div id='main-content' class="wgl_col-<?php echo apply_filters('brainbizz_column_class', $column); ?>">
                <?php
                // List of Post
                get_template_part('templates/post/posts-list');
                // Pagination
                echo BrainBizz_Theme_Helper::pagination();
                ?>
            </div>
            <?php
                echo (isset($sb['content']) && !empty($sb['content']) ) ? $sb['content'] : '';
            ?>
        </div>
    </div>
    
<?php get_footer(); ?>