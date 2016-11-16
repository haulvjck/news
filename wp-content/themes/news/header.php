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
				  <div class="container" style="vertical-align: center; height: 20px">
				  	<!-- <?php wp_nav_menu(  array( 'container_class' => 'menutop', 'theme_location' => 'topdown-menu' ) ); ?> -->
					<div class="info-user">
						<ul>
							<!-- <li><a href="#"><i class="fa fa-users"></i> Theo dõi</a></li> -->
							<!-- <li><a href="#"><i class="fa fa-sign-in"></i> Đăng nhập</a></li> -->
							<li><marquee direction = "left" behavior="scroll">
						  		Tu Viện Từ Ân * Kính chào mừng Chư Tôn Đức Tăng Ni, qu‎ý Đồng Hương Phật Tử xa gần * Nam Mô A Di Đà Phật. * Nam Mô Bổn Sư Thích Ca Mâu Ni Phật * Welcome to Tu An Monatery
						  		</marquee>
						  	</li>
						</ul>
					</div>
				  	</div>
				  <div class="clear"></div>
				</div>
				<div class="center-header bg">
					<div class="container bg">
						<div class="sub-center-header">
							<div class="icon-center-header-logo">
								<h1 id="logo" class="wow fadeInRight animated"><a href="<?php bloginfo("home"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" title="liên hệ quảng cáo" alt="lên hệ quảng cáo"></a></h1></div>
							<div class="icon-center-header-slide">
								<div class="slideshow">
									<div><a href="<?php bloginfo("home"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/banner-center_1.png"></a></div>								
									<div><a href="<?php bloginfo("home"); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/banner-center_2.png"></a></div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="bottom-header" style="width: 1170px;">
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

<script language="javascript">
	/***************************************************************************************
	* Run when page load
	***************************************************************************************/
	$(document).ready(function()
	{
		initSlideShow();
		
	});
	/***************************************************************************************
	****************************************************************************************/
	function initSlideShow()
	{
		if($(".slideshow div").length > 1) //Only run slideshow if have the slideshow element and have more than one image.
		{
			var transationTime = 5000;//5000 mili seconds i.e 5 second
			$(".slideshow div:first").addClass('active'); //Make the first image become active i.e on the top of other images
			setInterval(slideChangeImage, transationTime); //set timer to run the slide show.
		}
	}
	/***************************************************************************************
	****************************************************************************************/
	
	function slideChangeImage()
	{
		var active = $(".slideshow div.active"); //Get the current active element.
		if(active.length == 0)
		{
			active = $(".slideshow div:last"); //If do not see the active element is the last image.
		}
		
		var next = active.next().length ? active.next() : $(".slideshow div:first"); //get the next element to do the transition
		active.addClass('lastactive');
		next.css({opacity:0.0}) //do the fade in fade out transition
				.addClass('active')
				.animate({opacity:1.0}, 1500, function()
				{
					active.removeClass("active lastactive");	
				});
		 
	}

</script>