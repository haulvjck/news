<?php get_header();?>
		<div class="main">
			<div class="container bg">
				<div class="content single">
					<div class="main-content single-post">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
<p class="loi">Trang không tồn tại, bạn có thể quay lại trang chủ, hoặc nghe nhạc </p>
<a href="http://google.com">Back to Home</a>
<iframe width="100%" height="500" src="http://mp3.zing.vn/embed/album/ZWZBDO0O" frameborder="0" allowfullscreen="true"></iframe>
					</div>
					<?php get_sidebar(); ?>
				</div> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
<?php get_footer(); ?>