<?php include 'lib/widget.php'; ?> 
<?php include 'lib/widget-post-top.php'; ?> 
<?php include 'lib/widget-tops-view.php'; ?> 
<?php include 'lib/widget-cmt.php'; ?>
<?php require_once('lib/logo-options/logo-options.php');?> 
<?php require_once('lib/systemkenit/system.php');?> 
<?php

  define( 'THEME_URL', get_stylesheet_directory() );
  define( 'CORE', THEME_URL . '/core' );

  require_once( CORE . '/init.php' );

  if ( ! isset( $content_width ) ) {

        $content_width = 620;
   }
 

  if ( ! function_exists( 'newshuykira_theme_setup' ) ) {

        function newshuykira_theme_setup() {

                $language_folder = THEME_URL . '/languages';
                load_theme_textdomain( 'newshuykira', $language_folder );
 

                add_theme_support( 'automatic-feed-links' );
 
  
                add_theme_support( 'post-thumbnails' );
 

                add_theme_support( 'title-tag' );
 
        
                add_theme_support( 'post-formats',
                        array(
                                'video',
                                'image',
                                'audio',
                                'gallery'
                        )
                 );
 
           function my_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div>
        	<input  class="s" type="text" placeholder="Từ khóa..." value="' . get_search_query() . '" name="s" id="s" />
	<input class="submit" type="submit" id="searchsubmit" value="'. esc_attr__( ' ' ) .'" />
	</div>
	</form>';

	return $form;
}
   $default_background = array(
                        'default-color' => '#e8e8e8',
                );
                add_theme_support( 'custom-background', $default_background );
 
            
                 register_nav_menu ( 'primary-menu', __('Primary Menu', 'newshuykira') );
				 register_nav_menu ( 'topdown-menu', __('Top & Down Menu', 'newshuykira') );
 
             
                 $sidebar = array(
                    'name' => __('Footer New Post', 'newshuykira'),
                    'id' => 'main-sidebar',
                    'description' => 'Footer New post for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
				 
				 $sidebar = array(
                    'name' => __('Footer Featured Post', 'newshuykira'),
                    'id' => 'featured-post',
                    'description' => 'Footer Featured Post for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
				 
				 $sidebar = array(
                    'name' => __('Main Post Sidebar', 'newshuykira'),
                    'id' => 'main-post-sidebar',
                    'description' => 'Main Post Sidebar for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
				 
				 $sidebar = array(
                    'name' => __('Content Post Top', 'newshuykira'),
                    'id' => 'main-post-top',
                    'description' => 'Main Post Top for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
				 
				 $sidebar = array(
                    'name' => __('Content Post Left', 'newshuykira'),
                    'id' => 'main-post-left',
                    'description' => 'Content Post Left for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
				 
				  $sidebar = array(
                    'name' => __('Content Post Right', 'newshuykira'),
                    'id' => 'main-post-right',
                    'description' => 'Content Post Right for newshuykira theme',
                    'class' => 'main-sidebar',
                    'before_title' => '<h2 class="title"> <span>',
                    'after_sidebar' => '</span></h2>'
                 );
                 register_sidebar( $sidebar );
        }
        add_action ( 'init', 'newshuykira_theme_setup' );
 
  }
 

  
  function postview_set($postID) {
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


function postview_get($postID){
    $count_key = 'postview_number';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 lượt xem";
    }
    return $count.' lượt xem';
}
  
  
  function get_samepost_category() {
    $categories = get_the_category($post->ID);
    if ($categories): 
        $category_ids = array();
        foreach($categories as $individual_category): 
          $category_ids[] = $individual_category->term_id;
          $args=array(
                'category__in' => $category_ids,
                'post__not_in' => array($post->ID),
                'showposts'=>10,
                'ignore_sticky_posts'=>1,);
          $my_query = new wp_query($args);
        endforeach;
        if( $my_query->have_posts() ): 
           if( is_single() ):?>
             <h1 class="sametitle"> BÀI VIẾT CÙNG CHUYÊN MỤC </h1>
             <div class="same-main"> 
              <ul>
               <?php while ($my_query->have_posts()): 
                     $my_query->the_post();?>
                     <li>
						<?php thumbnails_news_hk(); ?>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					    <div class="info" >
							<span class="author"><i class="fa fa-user"></i> <?php echo get_the_author(); ?></span>
							<span class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></span>
						</div>
					   <div class="clear"></div>
                     </li>
               <?php endwhile; ?>
              </ul>
             </div>
 <?php  endif; endif; endif; wp_reset_query(); } ?>
 
 
 <?php  function thumbnails_news_hk() {
		if(has_post_thumbnail()) { 
		the_post_thumbnail(); 
			} else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/images/no_thumb.jpg"  alt="<?php the_title(); ?>" />
 <?php }} ?>

 <?php function timeago( $type = 'post' ) {
$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
return 'Cách đây'." ".human_time_diff($d('U'), current_time('timestamp')) . " " . __(' trước');
}
?>

<?php  
function huycmt($text) {
	
	$huy_text = strip_tags($text);
	$blah = explode(' ', $huy_text);

	if (count($blah) > 20) {
		$k = 20;
		$use_dotdotdot = 1;
	} else {
		$k = count($blah);
		$use_dotdotdot = 0;
	}

	$ihuy = '';
	for ($i=0; $i<$k; $i++) {
		$ihuy .= $blah[$i] . ' ';
	}
	$ihuy .= ($use_dotdotdot) ? '&hellip;' : '';

	return $ihuy;
}
 ?>



