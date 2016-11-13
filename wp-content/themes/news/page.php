<?php get_header();?>
		<div class="main">
			<div class="container bg">
				<div class="content single">
					<div class="main-content single-post">
<?php if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
} ?>
								<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
										<h2> <?php the_title();  ?></h2>
										<?php the_category(''); ?>
										<div class="dates"><i class="fa fa-calendar-o"></i> <?php echo get_the_date( 'd-m-Y'); ?></div> 
										<div class="icon">										 
											 <i class="fa fa-user"></i> Bởi: <?php echo get_the_author(); ?>  
											 <a href="#binhluan"> <i class="fa fa-comments" style="margin-left: 10px;"></i> Có: <fb:comments-count href="<?php the_permalink();?>"></fb:comments-count> bình luận</a>
											 <div style="float: right; " class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="100%" data-mobile="Auto-detected"></div>
										</div>
										 <div class="clear line"></div>
										 <article class="post-content"><?php the_content(); ?></article> 
										 <h4 class="tag"><?php the_tags('Từ khóa: ' ,' , ','' ); ?> </h4>
							    <?php endwhile; ?>
								<?php endif; ?> 
						
					</div>
					<?php get_sidebar(); ?>
				</div> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
<?php get_footer(); ?>