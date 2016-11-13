<!DOCTYPE HTML>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="viewport" content="width=device-width" />
      <title><?php wp_title( '|', true, 'right' ); ?></title>
      <meta name="keywords" content="" />
      
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" charset="utf-8" />  
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" media="screen" />
      <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" rel="stylesheet">
      <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css">
	  <link href="<?php echo get_template_directory_uri(); ?>/css/haulv.css" rel="stylesheet">
	  <link href="<?php echo get_template_directory_uri(); ?>/css/editor-style.css" rel="stylesheet">
      <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

      <script>
         new WOW().init();
      </script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
	
	  
      <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
        jQuery(document).ready(function() {
            var offset = 220;
            var duration = 500;
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > offset) {
                    jQuery('.lendau').fadeIn(duration);
                } else {
                    jQuery('.lendau').fadeOut(duration);
                }
            });
            jQuery('.lendau').click(function(event) {
                event.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: 0
                }, duration);
                return false;
            })
        });
    </script>


	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tinycarousel.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-latest.min.js"></script>
    
	<script type="text/javascript" src ="<?php echo get_template_directory_uri(); ?>/js/jquery-1.4.min.js"></script>
<script src = "<?php echo get_template_directory_uri(); ?>/js/jquery.iosslider.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.tinycarousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#slider1').tinycarousel();
		});
	</script>
<?php wp_head(); ?>
   </head>
   <body>
		<header>
				<div class="top-header">
				  <div class="container">
				  <?php wp_nav_menu(  array( 'container_class' => 'menutop', 'theme_location' => 'topdown-menu' ) ); ?>
					<div class="info-user">
						<ul>
							<!-- <li><a href="#"><i class="fa fa-users"></i> Theo dõi</a></li>
							<li><a href="#"><i class="fa fa-sign-in"></i> Đăng nhập</a></li> -->
						</ul>
					</div>
				  </div>
				  <div class="clear"></div>
				</div>
				<div class="center-header bg">
					<div class="container bg">
						<h1 id="logo" class="wow fadeInRight animated"><a href="<?php bloginfo("home"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/banner-top.jpg" title="liên hệ quảng cáo" alt="lên hệ quảng cáo"></a></h1>
						<div class="banner-top">
							<a href="<?php bloginfo("home"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/banner-top.jpg" title="liên hệ quảng cáo" alt="lên hệ quảng cáo"></a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="bottom-header">
					<div class="container">
						<div class="menu">
							<div class="home">
								<!-- <a href="<?php bloginfo("home"); ?>"><i class="fa fa-home"></i></a></div> -->
								<a href="<?php bloginfo("home"); ?>"></a></div>
							<?php wp_nav_menu(  array( 'menu_id'=>'','menu_class'=>'nav','theme_location' => 'primary-menu' ) ); ?>
<?php get_search_form(); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
		</header>