<footer>

			<div class="container">
				<div class="about block wow fadeInDown animated">
					<h2 class="title do"><span><?php echo get_settings( 'title' );?></span></h2>
					<p><?php if (get_settings( 'about' )) { ?> <?php echo get_settings( 'about' ); } else { ?>Building...Coming soon<?php } ?></p>
					<ul>
						<li><a target="_blank" href="https://youtube.com/user/<?php echo get_settings( 'youtube' );?>"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" title="Find Us"></a></li>
					</ul>
				</div>
				<div class="recenpost block wow fadeInDown animated">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-sidebar') ) : endif; ?>
				</div>
				<div class="hot block wow fadeInDown animated">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('featured-post') ) : endif; ?>
				</div>
				<div class="clear"></div>
				
				<div class="copyright">
					<a href="<?php bloginfo("home"); ?>"><?php echo get_settings( 'copyright' );?></a>
					<?php wp_nav_menu(  array( 'container_class' => 'menutop', 'theme_location' => 'topdown-menu' ) ); ?>
				    <div class="clear"></div>
			</div>
			</div class="clear"></div>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.tinycarousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#slider1').tinycarousel();
		});
	</script>
	<script type="text/javascript">
			$(document).ready(function() {
				$('.iosSlider').iosSlider({
					scrollbar: false,
					snapToChildren: true,
					scrollbarHide: true,
					desktopClickDrag: true,
					scrollbarMargin: '5px 40px 0 40px',
					scrollbarBorderRadius: 1,
					scrollbarHeight: '2px',
					autoSlide: true, 
					infiniteSlider: true, 
					responsiveSlides: true,
					navPrevSelector: $('.prevButton'),
					navNextSelector: $('.nextButton')
				});
			});
		</script>
		</footer>
<?php wp_footer(); ?>
   </body>
   </html>