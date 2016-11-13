<?php 
class category_posts_widget extends WP_Widget {


	function category_posts_widget() {
		$widget_ops = array( 'classname' => 'category_posts_widget', 'description' => 'Display specific category posts in the sidebar' ); // Widget Settings
		$control_ops = array( 'id_base' => 'category_posts_widget' ); // Widget Control Settings
		$this->WP_Widget( 'category_posts_widget', 'Category Posts Widget', $widget_ops, $control_ops ); // Create the widget
	}


		function widget($args, $instance) {
			extract( $args );

			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			$cp_id		= $instance['cp_id']; // category id
			$postsnumber 		= $instance['postsnumber'];
			$mau 		= $instance['mau'];
			
			
?>
	

		<h2 class="title <?php  echo $mau; ?>"> <span>	<?php if ( $title ) { echo $title ; }?> </span> </h2>

	
	<div class="post1travel">
	 <?php 
		$args = array('posts_per_page' => $postsnumber, 'cat' => $cp_id);
		$i=1;
		$the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					 <?php if ($i==1) { ?>
					<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
					<h4 class="titlepost "><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h4>
					<?php the_excerpt();?>
					<div class="info">
						<span class="author"><i class="fa fa-user"></i> <?php echo get_the_author(); ?></span>
						<span class="time"><i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></span>
						<span class="comment"></span>
					</div>
					<ul class="postfeatured posttravel">
					<?php } else { ?>
								 
					<li>
						<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h4>									
						<div class="info">
							<span class="time"> <i class="fa fa-clock-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></span>
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

	</div>
	
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
 			<label for="<?php echo $this->get_field_id('cp_id'); ?>"><?php _e('Category ID'); ?></label>
 			<input class="widefat" id="<?php echo $this->get_field_id('cp_id'); ?>" name="<?php echo $this->get_field_name('cp_id'); ?>" type="text" value="" />


<select>
<option value="">Chọn chuyên mục</option> 
<?php
$args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hierarchical'=> 1
  );
$categories = get_categories($args);
  foreach($categories as $category) { ?>
<option value="<?php echo $category->term_id; ?>"> <?php echo $category->name; ?> </option>
    

<?php } ?>
<select>


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



	add_action('widgets_init', create_function('', 'return register_widget("category_posts_widget");'));	

?>