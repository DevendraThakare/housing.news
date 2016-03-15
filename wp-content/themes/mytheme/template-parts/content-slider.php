<div id="main-slider" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner" role="listbox">
		<?php $the_query = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 1 )); 
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item active">
				<?php the_post_thumbnail('large');?>
				<div class="carousel-caption">
					<div class="caption-author"> 
						BY <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo strtoupper(get_the_author()); ?></a>
					</div>
					<h4 class="caption-title"><?php the_title();?></h4>
					<div class="date-comment-count-wrap">
				 		<span class="slider-date"><?php twentysixteen_entry_date(); ?></span>
				 		<span class="comment-count"> <?php comments_number(); ?> </span>
				 	</div>
				</div>
			</div><!-- item active -->
		<?php endwhile; wp_reset_postdata(); ?>
		<?php $the_query = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 3, 'offset' => 1 )); 
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item">
				<?php the_post_thumbnail('large');?>
				<div class="carousel-caption">
					<div class="caption-author"> 
						BY <a class="" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo strtoupper(get_the_author()); ?></a>
					</div>
					<h4 class="caption-title"><?php the_title();?></h4>
					<div class="date-comment-count-wrap">
				 		<span class="slider-date"><?php twentysixteen_entry_date(); ?></span>
				 		<span class="comment-count"> <?php comments_number(); ?> </span>
				 	</div>
				</div>
			</div><!-- item -->
		<?php endwhile; wp_reset_postdata(); ?>
	</div><!-- carousel-inner -->

	 <!-- Controls -->
	<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
		<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div><!-- #myCarousel -->