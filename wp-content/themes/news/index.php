<?php get_header();?>
		<div class="main">
			<div class="container bg">


				<div class="slide">
					
				   <div class = 'iosSlider'>
						<div class = 'slider'>
							<div class = 'item' id = 'item1'>
								<div class="slide-left">
<?php 
		$args = array('posts_per_page' => 10);
		$i=1;
		$the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					 <?php if ($i==1) { ?>
<div class="top">
		    	 <?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
</div>
					<?php } else if ($i==2){ ?>

									<div class="down">
		    	 <?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>	
									</div>
								</div>
<?php } else if ($i==3){ ?>
	
<div class="slide-center">
    	 <?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>	
								</div>
<?php } else if ($i==4){ ?>
<div class="slide-right">
								<div class="top">
<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>	
								</div>
<?php } else if ($i==5){ ?>
								
								<div class="down">
<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>	
									</div>
								</div>
								<div class="clear"></div>
							</div> 
		

												
							

							
							<div class = 'item' id = 'item2'>
							
								<div class="slide-left">
<?php } else if ($i==6){ ?>
									<div class="top">
<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
										
	
									</div>
<?php } else if ($i==7){ ?>
									<div class="down">
<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
										

									</div>

								</div>
<?php } else if ($i==8){ ?>
								<div class="slide-center">
										<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
								</div>

								<div class="slide-right">
<?php } else if ($i==9){ ?>
								<div class="top">
									<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>	
								</div>
<?php } else if ($i==10){ ?>
									<div class="down">
									<?php thumbnails_news_hk(); ?>
     <h2><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h2>
		</div>


<?php } $i++; ?>			
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>	
				 
								</div>
								
								<div class="clear"></div>
							</div> 
							
						</div>
						
						<div class = 'prevButton'></div>
						<div class = 'nextButton'></div>
						
					</div>	
	
				 </div> 
				 


				<div class="content">
					<div class="main-content">
						 <div class="featured wow fadeInDown animated">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-post-top') ) : endif; ?>
								<div class="clear"></div>
						</div>
						
						
						
						<div class="game wow fadeInDown animated">
							 <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-post-left') ) : endif; ?>
						</div>
						
						<div class="hitech wow fadeInDown animated">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('main-post-right') ) : endif; ?>							
						</div>
						
						
					</div>
					
					<?php get_sidebar(); ?>
				</div> 

				<div class="fims wow fadeInDown animated">
						<h2 class="title do"><span>PHIM</span></h2>
						<div id="slider1">
						<a class="buttons prev" href="#">&#60;</a>
							<div class="viewport">
								<ul class="overview">
								<?php 
								$args = array(
									'posts_per_page'      => 5,'cat'=>6
								);
								$the_query = new WP_Query( $args ); ?>
								<?php if ( $the_query->have_posts() ) : ?>
									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<li>
										<?php thumbnails_news_hk(); ?>
										<a href="<?php the_permalink(); ?> " class="playvideo"><img src="<?php echo get_template_directory_uri(); ?>/images/play.png"></a>
										<h2><a href=" <?php the_permalink(); ?> " title=" <?php the_title();  ?> "><?php the_title();  ?></a></h2>
										<div class="numbercmt">
											<h3><a href="#"><?php comments_number( '0', '1', '%' ); ?></a></h3>
										</div>
									</li>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php else : ?>
									<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
								<?php endif; ?>
								</ul>
							</div>
							<a class="buttons next" href="#">&#62;</a>		
						</div>
				</div>
			
			</div>
			
			<div class="clear"></div>
		</div>
		
		<div class="clear"></div>
<?php get_footer(); ?>