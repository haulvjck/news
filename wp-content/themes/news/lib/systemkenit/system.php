<?php 

/** Remove title Wordpress**/
add_filter('admin_title', 'my_admin_title', 10, 2);

function my_admin_title($admin_title, $title)
{
    return $title.' &lsaquo; '.get_bloginfo('name').' &lsaquo; '.'JckKumi';
}
/** Footer **/
function remove_footer_admin () {
    echo 'Develop by Jck Kumi';
}
add_filter('admin_footer_text', 'remove_footer_admin');
/** **/ 
add_action('admin_init', 'rw_remove_dashboard_widgets');
    function rw_remove_dashboard_widgets() {
        
      
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // recent comments
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
        remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // plugins
         
        remove_meta_box('dashboard_quick_press', 'dashboard', 'normal'); // quick press
        remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal'); // recent drafts
        remove_meta_box('dashboard_primary', 'dashboard', 'normal'); // wordpress blog
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); // other wordpress news
}
/** Remove  WordPress Welcome Panel **/
remove_action('welcome_panel', 'wp_welcome_panel');
/** Ẩn Widget **/
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Nav_Menu_Widget');
}


    
function remove_admin_bar_links() {
    global $wp_admin_bar;
           /** Remove the WordPress logo **/
    $wp_admin_bar->remove_menu('about');            /** Remove the about WordPress link **/
    $wp_admin_bar->remove_menu('wporg');            /** Remove the WordPress.org link **/
    $wp_admin_bar->remove_menu('documentation');    /** Remove the WordPress documentation link **/
    $wp_admin_bar->remove_menu('support-forums');   /** Remove the support forums link **/
    $wp_admin_bar->remove_menu('feedback');         /** Remove the feedback link **/
    //$wp_admin_bar->remove_menu('site-name');      /** Remove the site name menu **/
    $wp_admin_bar->remove_menu('view-site');        /** Remove the view site link **/
    $wp_admin_bar->remove_menu('updates');          /** Remove the updates link **/
    $wp_admin_bar->remove_menu('comments');         /** Remove the comments link **/
    $wp_admin_bar->remove_menu('new-content');      /** Remove the content link **/
    $wp_admin_bar->remove_menu('w3tc');             /** If you use w3 total cache remove the performance link **/
    //$wp_admin_bar->remove_menu('my-account');     /** Remove the user details tab **/
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

/** Ẩn MenuBar **/
add_filter('show_admin_bar', '__return_false');
/** Thay doi duong dan logo admin **/
function wpc_url_login(){
return "http://kenit.net/";
}
add_filter('login_headerurl', 'wpc_url_login');
/** Thay doi logo admin wordpress **/
function login_css() {
wp_enqueue_style( 'login_css', plugin_dir_url( __FILE__ ) . '/login.css' );
}
add_action('login_head', 'login_css');

/** Thêm cột để chứa ảnh cho cả post và page **/
if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'posts_columns', 5);
    add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns', 5);
    add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
}
function posts_columns($defaults){
    $defaults['wps_post_thumbs'] = __('Thumbs');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
        if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}
/** Welcome **/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
	  
	function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	 
	wp_add_dashboard_widget('custom_help_widget', 'Giới thiệu', 'custom_dashboard_help');
	}
	 
	function custom_dashboard_help() { ?>
    <p>Chào mừng Quý khách đến với hệ thống Quản Trị Website.<p>
    <p><strong>THÔNG TIN WEBSITE</strong></p>
    <P><?php echo bloginfo( 'name' ); ?> | <?php echo bloginfo( 'description' ); ?></p>
    <p><strong></strong><?php echo $info;  ?></p>
	<p><strong>NHÀ PHÁT TRIỂN</strong></p>
    <p>Hệ thống được phát triển bởi <strong>Jck Kumi</strong> trên nền <strong> Wordpress <?php echo bloginfo("version") ; ?> </strong>.</p>
    <p>Mọi thắc mắc, lỗi trong quá trình sử dụng Quý khách hàng có thể liên hệ Kỹ Thuật <strong>Jck Kumi</strong></p>
    <p><strong>Mr. Hậu</strong> 
    <p> Web Developer</p> 
    <p><strong>Skype</strong>: vhaulee</p> 
    <p><strong>Email</strong>: vhaulee@gmail.com</p> 
    <p>Cảm ơn quý khách đã tin tưởng và sử dụng sản phẩm</p>
	<?php }

/** Add Setting **/    
$new_general_setting = new new_general_setting();
class new_general_setting {
    function new_general_setting( ) {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
		register_setting( 'general', 'title', 'esc_attr' );
        add_settings_field('title', '<label for="title">'.__('Tiêu đề' , 'title' ).'</label>' , array(&$this, 'print_title_field') , 'general' );
		
		register_setting( 'general', 'about', 'esc_attr' );
        add_settings_field('about', '<label for="about">'.__('Giới thiệu' , 'about' ).'</label>' , array(&$this, 'print_about_field') , 'general' );
		
        register_setting( 'general', 'facebook', 'esc_attr' );
        add_settings_field('facebook', '<label for="facebook">'.__('facebook' , 'facebook' ).'</label>' , array(&$this, 'print_facebook_field') , 'general' );

        register_setting( 'general', 'twitter', 'esc_attr' );
        add_settings_field('twitter', '<label for="twitter">'.__('Twitter' , 'twitter' ).'</label>' , array(&$this, 'print_address_field') , 'general' );

        register_setting( 'general', 'google', 'esc_attr' );
        add_settings_field('google', '<label for="google">'.__('Google +' , 'google' ).'</label>' , array(&$this, 'print_tel_field') , 'general' );

        register_setting( 'general', 'youtube', 'esc_attr' );
        add_settings_field('youtube', '<label for="youtube">'.__('Youtube' , 'youtube' ).'</label>' , array(&$this, 'print_email_field') , 'general' ); 
		
		register_setting( 'general', 'copyright', 'esc_attr' );
        add_settings_field('copyright', '<label for="copyright">'.__('Copyright' , 'copyright' ).'</label>' , array(&$this, 'print_copyright_field') , 'general' );     		
    }
	function print_title_field() {
        $value = get_option( 'title', '' );
        echo '<input type="text" id="title" style="width: 45%;" name="title" value="' . $value . '" />';
    }
	
	function print_about_field() {
        $value = get_option( 'about', '' );
        echo '<textarea type="text" id="about" style="width: 45%; height: 170px" name="about"  />' . $value . '</textarea>';
    }
    function print_tel_field() {
        $value = get_option( 'google', '' );
        echo '<input type="text" id="google" style="width: 45%;" name="google" value="' . $value . '" />';
    }
    function print_email_field() {
        $value = get_option( 'youtube', '' );
        echo '<input type="text" id="youtube" style="width: 45%;" name="youtube" value="' . $value . '" />';
    }
    function print_address_field() {
        $value = get_option( 'twitter', '' );
        echo '<input type="text" id="twitter" style="width: 45%;" name="twitter" value="' . $value . '" />';
    }
    function print_facebook_field() {
        $value = get_option( 'facebook', '' );
        echo '<input type="text" id="facebook" style="width: 45%;" name="facebook" value="' . $value . '" />';
    }
	function print_copyright_field() {
        $value = get_option( 'copyright', '' );
        echo '<input type="text" id="copyright" style="width: 45%;" name="copyright" value="' . $value . '" />';
    }
}
?>