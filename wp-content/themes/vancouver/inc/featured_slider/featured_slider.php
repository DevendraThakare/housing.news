<?php
/**
 * Featured slider posts on top of home page
 * We support 2 styles posts featured slider
 *
 * @since 1.0
 */

$featured_style = get_theme_mod( 'penci_featured_slider_style' );
if ( $featured_style != 'style-2' ) {
	$featured_style = 'style-1';
}
$data_auto = 'true';
$auto = get_theme_mod( 'penci_featured_autoplay' );
if( $auto == false ): $data_auto = 'false'; endif;
$auto_time = get_theme_mod( 'penci_featured_slider_auto_time' );
if( !is_numeric( $auto_time ) ): $auto_time = '3000'; endif;
$auto_speed = get_theme_mod( 'penci_featured_slider_auto_speed' );
if( !is_numeric( $auto_speed ) ): $auto_speed = '500'; endif;
?>
<div class="featured-area">
	<div class="featured-carousel <?php echo esc_attr( $featured_style ); ?>" data-auto="<?php echo esc_attr( $data_auto ); ?>" data-autotime="<?php echo esc_attr( $auto_time ); ?>" data-speed="<?php echo esc_attr( $auto_speed ); ?>">
		<?php
		$featured_cat = get_theme_mod( 'penci_featured_cat' );
		$number       = get_theme_mod( 'penci_featured_slider_slides' );
		?>
		<?php $feat_query = new WP_Query( array( 'cat' => $featured_cat, 'showposts' => $number ) ); ?>
		<?php if ( $feat_query->have_posts() ) : while ( $feat_query->have_posts() ) : $feat_query->the_post(); ?>
			<figure class="item">
				<div class="featured-overlay featured-overlay-color"></div>
				<div class="featured-overlay featured-overlay-partent"></div>
				<?php the_post_thumbnail( 'slider-thumb' ); ?>

				<?php if ( ! get_theme_mod( 'penci_featured_center_box' ) ): ?>
					<div class="featured-content">
						<div class="feat-text">
							<div class="featured-slider-overlay"></div>
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<?php if ( ! get_theme_mod( 'penci_featured_meta_author' ) || ! get_theme_mod( 'penci_featured_meta_date' ) ): ?>
								<div class="carousel-meta">
									<?php if ( ! get_theme_mod( 'penci_featured_meta_author' ) ): ?>
										<span class="feat-author"><?php _e( 'posted by ', 'pencidesign' ); ?><strong><?php the_author(); ?></strong></span>
									<?php endif; ?>
									<?php if ( ! get_theme_mod( 'penci_featured_meta_date' ) ): ?>
										<span class="feat-time"><?php the_time( get_option('date_format') ); ?></span>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</figure>
		<?php endwhile;
			wp_reset_postdata(); endif; ?>
	</div>
</div>