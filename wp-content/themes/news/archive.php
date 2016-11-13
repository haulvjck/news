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
										<h2> <a href="<?php the_permalink(); ?>" g><?php the_title();  ?></a></h2>
										<?php the_category(''); ?>
										<div class="dates"><?php echo get_the_date( 'd-m-Y'); ?></div> 
										<div class="icon">										 
											 <i class="fa fa-user"></i> Bởi: <?php echo get_the_author(); ?>  
											 <a href="#binhluan"> <i class="fa fa-comments" style="margin-left: 10px;"></i> Có: <fb:comments-count href="<?php the_permalink();?>"></fb:comments-count> Bình luận</a>
											 <div style="float: right; " class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="100%" data-mobile="Auto-detected"></div>
										</div>
										 <div class="clear line"></div>
										 <div class="catpost">
											<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
											<?php the_excerpt();?>
											<h4 class="tag"><?php the_tags('Từ khóa: ' ,' , ','' ); ?> </h4>
											<div class="clear" ></div>
										 </div>
										 
							    <?php endwhile; ?>
								<?php else : ?>
											<p class="sorry"><?php _e( 'Xin lỗi chưa có bài viết trong chuyên mục' ); ?></p>
								<?php endif; ?> 
						

<div class="quatrang">
			<?php
				global $wp_query;
				$big = 999999999;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
						'prev_text'    => __('« Mới hơn'),
					'next_text'    => __('Tiếp theo »'),
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
										) );
			  ?>
			  </div>
					</div>
					<?php get_sidebar(); ?>
				</div> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
<?php get_footer(); ?>