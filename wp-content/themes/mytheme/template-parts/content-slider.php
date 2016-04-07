<div id="main-slider" class="swipe">
	<div id="head-slider" class="swipe-wrap" role="listbox">
		<?php $the_query = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 1 )); 
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item active">
				<?php 
					$post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						if (is_mobile()) {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, array(960, 480), false);
						} else {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
						}
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}

					?>
				<div class="img-holder" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
				<div class="carousel-caption">
					<div class="caption-author"> 
						By <span class="slider-author-name"><?php echo get_the_author(); ?></span>
						
				 		<span class="seperator">|</span>
						<span class="slider-date"><?php post_date(); ?></span>

					</div>
					<h4 class="caption-title"><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title();?></a></h4>
				</div>
			</div><!-- item active -->
		<?php endwhile; wp_reset_postdata(); ?>
		<?php $the_query = new WP_Query(array('category_name' => 'slider', 'posts_per_page' => 3, 'offset' => 1 )); 
			while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item">
				<?php 
					$post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						if (is_mobile()) {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, array(960, 480), false);
						} else {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
						}
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}

					?>
				<div class="img-holder" style="background-image: url('<?php echo $thumbnail; ?>');"></div>

				<?php //the_post_thumbnail('large');?>
				<div class="carousel-caption">
					<div class="caption-author"> 
						BY By <span class="slider-author-name"><?php echo get_the_author(); ?></span>
						<span class="seperator">|</span>
						<span class="slider-date"><?php post_date(); ?></span>
					</div>
					<h4 class="caption-title"><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title();?></a></h4>
				</div>
			</div><!-- item -->
		<?php endwhile; wp_reset_postdata(); ?>
	</div><!-- carousel-inner -->

	 <!-- Controls -->
	<a class="left carousel-control" href="#main-slider" role="button" data-slide="prev">
		<span class="icon icon-arrow-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#main-slider" role="button" data-slide="next">
		<span class="icon icon-arrow-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div><!-- #myCarousel -->