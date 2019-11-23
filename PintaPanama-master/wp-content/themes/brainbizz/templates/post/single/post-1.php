<?php
    $single = BrainBizz_SinglePost::getInstance();
    $single->set_data();

    $title = get_the_title();

	$show_likes = BrainBizz_Theme_Helper::get_option('single_likes');
	$show_share = BrainBizz_Theme_Helper::get_option('single_share');
	$show_views = BrainBizz_Theme_Helper::get_option('single_views');
	$single_author_info = BrainBizz_Theme_Helper::get_option('single_author_info');
	$single_meta = BrainBizz_Theme_Helper::get_option('single_meta');
	$single_cats = BrainBizz_Theme_Helper::get_option('single_meta_categories');
	$show_tags = BrainBizz_Theme_Helper::get_option('single_meta_tags');
	$featured_image = BrainBizz_Theme_Helper::options_compare('post_hide_featured_image', 'mb_post_hide_featured_image', '1');
	$single->set_post_views(get_the_ID());

	$meta_args = $meta_args_cats = array();
	
	if ( !(bool)$single_meta ) {
		$meta_args['date'] = !(bool)BrainBizz_Theme_Helper::get_option('single_meta_date');
		$meta_args['author'] = !(bool)BrainBizz_Theme_Helper::get_option('single_meta_author');
		$meta_args['comments'] = !(bool)BrainBizz_Theme_Helper::get_option('single_meta_comments');
		$meta_args['category'] = false;
		$meta_args_cats['category'] = !(bool)BrainBizz_Theme_Helper::get_option('single_meta_categories');
	}
 
	$single->cat_render_image = false;
?>

<div class="blog-post blog-post-single-item format-<?php echo esc_attr($single->get_pf()); ?>">
	<div <?php post_class("single_meta"); ?>>
		<div class="item_wrapper">
			<div class="blog-post_content">
                <?php 
					if(!(bool) $single_cats && !(bool)$single_meta){
	                    echo '<div class="blog-post_meta-categories">';
	                    $single->render_post_cats(); 
	                    echo '</div>';     
	                }
	            ?>
	            <h2 class="blog-post_title"><?php echo get_the_title(); ?></h2>	
	            <?php 	
	                if ( (bool)$show_likes ) echo '<div class="blog-post_meta-wrap">';
	                    if ( !(bool)$single_meta ) {
							$single->render_post_meta($meta_args);
						}

	                    // Likes in blog
	                    if ( (bool)$show_likes ) echo '<div class="blog-post_info-wrap">';
	                    if ( (bool)$show_likes ) : ?>
	                             
	                            <div class="blog-post_likes-wrap">
	                                <?php
	                                if ( (bool)$show_likes && function_exists('wgl_simple_likes')) {
	                                    echo wgl_simple_likes()->likes_button( get_the_ID(), 0 );
	                                } 
	                                ?>
	                            </div> 
	                        <?php
	                    endif;

	                    if ( (bool)$show_likes ): ?> 
	                        </div>   
	                        </div>   
	                    <?php
	                endif;   
				?>
				<div class="clear"></div>			
				<?php
					?>
					<?php
					if((bool) $single->get_excerpt()){
						echo "<div class='short_desc blog-post_excerpt'>".$single->get_excerpt()."</div>";
					}
					if(!(bool) $featured_image){
						$single->render_featured(false, 'full' );	
					}
			
					the_content();

					wp_link_pages(array('before' => '<div class="page-link"><span class="pagger_info_text">' . esc_html__('Pages', 'brainbizz') . ': </span>', 'after' => '</div>'));

				if (has_tag() || (bool)$show_views || (bool)$show_share) {
					echo '<div class="post_info single_post_info">';

					if ( (bool)$show_views || (bool)$show_share) echo '<div class="blog-post_meta-wrap">';

					if(has_tag() && !(bool) $show_tags){
						echo "<div class='tagcloud-wrapper'>";
							the_tags('<div class="tagcloud">', ' ', '</div>');
						echo "</div>";						
					}

					if ( (bool)$show_views || (bool)$show_share) echo '<div class="blog-post_info-wrap">';
						// Share in blog
						if ( (bool)$show_share && function_exists('wgl_theme_helper') ) : ?>              
							<div class="single_info-share_social-wpapper">
								<?php
					            	echo '<span class="share_title">'.esc_html__('Share article:','brainbizz').'</span>';
					                echo wgl_theme_helper()->render_post_share('yes');
								?>
							</div>
							<?php
						endif;
						// Views in blog
						if ( (bool)$show_views ) : ?>              
							<div class="blog-post_views-wrap">
							<?php
								$single->get_post_views(get_the_ID());
							?>
							</div>
							<?php
						endif;
					
					if ( (bool)$show_views || (bool)$show_share): ?> 
                        </div>   
                        </div>   
                    	<?php
                	endif;
					echo "</div>";
				}else{
					echo "<div class='divider_post_info'></div>";
				}

				if ( (bool)$single_author_info ) {
					$single->render_author_info();
				} 
				?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>