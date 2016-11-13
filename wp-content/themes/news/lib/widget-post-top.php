<?php 
class category_posts_top_widget extends WP_Widget {


	function category_posts_top_widget() {
		$widget_ops = array( 'classname' => 'category_posts_top_widget', 'description' => 'Display specific category posts in the sidebar' ); // Widget Settings
		$control_ops = array( 'id_base' => 'category_posts_top_widget' ); // Widget Control Settings
		$this->WP_Widget( 'category_posts_top_widget', 'Category Posts top', $widget_ops, $control_ops ); // Create the widget
	}


		function widget($args, $instance) {
			extract( $args );

			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			$cp_id		= $instance['cp_id']; // category id
			$postsnumber 		= $instance['postsnumber'];
			$mau 		= $instance['mau'];
			
			
?>
	

		<h2 class="title <?php  echo $mau; ?>"> <span> <a href="<?php echo esc_url( get_category_link( $cp_id)); ?>"> <?php if ( $title ) { echo $title ; }?> </a> </span>

<?php
global $ancestor;
$childcats = get_categories('child_of=' . $cp_id . '&hide_empty=1');
foreach ($childcats as $childcat) {
  if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false){
    echo '<li><a href="'.get_category_link($childcat->cat_ID).'">';
    echo $childcat->cat_name . '</a>';
    echo '</li>';
    $ancestor = $childcat->cat_ID;
  }
}
?> </h2>

	
	<div class="post1">
	 <?php 
		$args = array('posts_per_page' => $postsnumber, 'cat' => $cp_id);
		$i=1;
		$the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					 <?php if ($i==1) { ?>
					<a href="<?php the_permalink(); ?>"> <?php thumbnails_news_hk(); ?> </a>
					<h4 class="titlepost "><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h4>
					<?php the_excerpt();?>
					<div class="info" style="margin-bottom: 15px;">
						<span class="author"><i class="fa fa-user"></i> <?php echo get_the_author(); ?></span>
						<span class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></span>
						<?php echo timeago(); ?>
						<span class="comment"></span>
					</div>
	</div>
					<ul class="postfeatured">
					<?php } else { ?>
								 
					<li>
						<a href="<?php the_permalink();?>"><?php thumbnails_news_hk(); ?></a>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h4>									
						<div class="info">
							<span class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></span>
						</div>
						<div class="clear"></div>
					</li>
					<?php } $i++; ?>			
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					</ul>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>
					<div class="clear"></div>
	
<?php
	
		} 


 		function update($new_instance, $old_instance) {
 			$instance['title'] = strip_tags($new_instance['title']);
 			$instance['cp_id'] = strip_tags($new_instance['cp_id']);
			$instance['postsnumber'] = strip_tags($new_instance['postsnumber']);
			$instance['mau'] = strip_tags($new_instance['mau']);
 			return $instance;
 		}





 function form($instance) {

 $defaults = array( 'title' => 'Category Posts', 'cp_id' => 'Category ID' , 'mau' =>'do' );
 		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
 		</p>
 		<p>
 			<label for="<?php echo $this->get_field_id('cp_id'); ?>"><?php _e('Chọn chuyên mục: '); ?></label>

<?php

			wp_dropdown_categories( array(

				'orderby'    => 'title',
				'hide_empty' => false,
                                'hierarchical' => 1,
				'name'       => $this->get_field_name( 'cp_id' ),
				'id'         => 'rpjc_widget_cat_recent_posts_category',
				'class'      => 'widefat',
				'selected'   => $instance['cp_id']

			) );

			?>



 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('postsnumber'); ?>"><?php _e('Số lượng bài viết: '); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('postsnumber'); ?>" name="<?php echo $this->get_field_name('postsnumber'); ?>" type="text" value="<?php echo $instance['postsnumber']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('mau'); ?>"><?php _e('Chọn màu tiêu đề:'); ?></label>

 		
					
		<select class="widefat" id="<?php echo $this->get_field_id("mau"); ?>" name="<?php echo $this->get_field_name("mau"); ?>">
 <option value="">Chọn màu</option>
					  <option value="cam"<?php selected( $instance["mau"], "cam" ); ?>>cam</option>
					  <option value="lam"<?php selected( $instance["mau"], "lam" ); ?>>lam</option>
					  <option value="do"<?php selected( $instance["mau"], "do" ); ?>>do</option>
                                          <option value="duong"<?php selected( $instance["mau"], "duong" ); ?>>duong</option>
					</select>
				
			</p>

        <?php }

}



	add_action('widgets_init', create_function('', 'return register_widget("category_posts_top_widget");'));	

?>