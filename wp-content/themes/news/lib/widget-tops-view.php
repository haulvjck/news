<?php 
class top_view_widget extends WP_Widget {


	function top_view_widget() {
		$widget_ops = array( 'classname' => 'top_view_widget', 'description' => 'Display specific category posts in the sidebar' ); // Widget Settings
		$control_ops = array( 'id_base' => 'top_view_widget' ); // Widget Control Settings
		$this->WP_Widget( 'top_view_widget', 'Top_view_post', $widget_ops, $control_ops ); // Create the widget
	}


		function widget($args, $instance) {
			extract( $args );

			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			$postsnumber 		= $instance['postsnumber'];
			$mau 		= $instance['mau'];
			
			
?>
	

		<h2 class="title <?php  echo $mau; ?>"> <span>	<?php if ( $title ) { echo $title ; }?> </span> </h2>

			

		<ul class="postfeatured">
				<?php $postquery = new WP_Query(array('posts_per_page' => $postsnumber, 'meta_key' => 'postview_number',
				'orderby' => 'meta_value_num'));
					if ($postquery->have_posts()) {
					while ($postquery->have_posts()) : $postquery->the_post();
					$do_not_duplicate = $post->ID;
					?>
		<li>
				<a href="<?php the_permalink(); ?>"><?php thumbnails_news_hk(); ?></a>
				<h4><a href=" <?php the_permalink(); ?> " title=" <?php the_title();  ?> "><?php the_title();  ?></a></h4>								
				<div class="info">
					<span class="time"><i class="fa fa-clock-o"> </i><?php echo get_the_date( 'd-m-Y'); ?></span>
				</div>
				<div class="clear"></div>
										
									
		</li>
					<?php endwhile; } ?>
		</ul>

<?php


			
		} 




 		function update($new_instance, $old_instance) {
 			$instance['title'] = strip_tags($new_instance['title']);
			$instance['postsnumber'] = strip_tags($new_instance['postsnumber']);
			$instance['mau'] = strip_tags($new_instance['mau']);
 			return $instance;
 		}





 function form($instance) {

 $defaults = array( 'title' => 'Category Posts', 'mau' =>'do' );
 		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

 		<p>
 			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
 <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>'" type="text" value="<?php echo $instance['title']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('postsnumber'); ?>"><?php _e('Number of posts to display'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('postsnumber'); ?>" name="<?php echo $this->get_field_name('postsnumber'); ?>" type="text" value="<?php echo $instance['postsnumber']; ?>" />
 		</p>
		<p>
 			<label for="<?php echo $this->get_field_id('mau'); ?>"><?php _e('mau tieu de, có các màu sau: do, cam, xanh '); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('mau'); ?>" name="<?php echo $this->get_field_name('mau'); ?>" type="text" value="<?php echo $instance['mau']; ?>" />
 		</p>


        <?php }

}



	add_action('widgets_init', create_function('', 'return register_widget("top_view_widget");'));	

?>
