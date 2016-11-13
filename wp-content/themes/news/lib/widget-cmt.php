<?php 
class new_cmt_huykira extends WP_Widget {


	function new_cmt_huykira() {
		$widget_ops = array( 'classname' => 'new_cmt_huykira', 'description' => 'Display specific category posts in the sidebar' ); // Widget Settings
		$control_ops = array( 'id_base' => 'new_cmt_huykira' ); // Widget Control Settings
		$this->WP_Widget( 'new_cmt_huykira', 'Comments widget HuyKira', $widget_ops, $control_ops ); // Create the widget
	}


		function widget($args, $instance) {
			extract( $args );

			$title 		= apply_filters('widget_title', $instance['title']); // the widget title
			$postsnumber 		= $instance['postsnumber'];
			$mau 		= $instance['mau'];
			
			
?>


		<h2 class="title <?php  echo $mau; ?>"> <span>	<?php if ( $title ) { echo $title ; }?> </span> </h2>

<ul class="postfeatured comenthk">
	<?php
$args = array(
	'number' => $postsnumber,
);
$comments = get_comments($args);
foreach($comments as $comment) : ?>
	<li class="cmt">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_avatar( $comment, 80 ); ?></a>
		<h4 class="authorcmt"><?php echo($comment->comment_author); ?></h4> 
		<p><a class="contentcmt" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"> <?php echo huycmt($comment-> comment_content);?> </a></p>
		<div class="clear"></div>
	</li>	
	<?php endforeach; ?>
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



	add_action('widgets_init', create_function('', 'return register_widget("new_cmt_huykira");'));	

?>




