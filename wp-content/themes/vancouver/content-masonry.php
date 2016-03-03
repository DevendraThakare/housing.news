<?php
/**
 * Template loop for gird style
 */
?>

<article id="post-<?php the_ID(); ?>" class="item item-masonry grid-masonry">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumbnail">
			<a href="<?php the_permalink() ?>" class="post-thumbnail">
				<?php the_post_thumbnail( 'masonry-thumb' ); ?>
			</a>
			<?php if( ! get_theme_mod('penci_grid_icon_format') ): ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-play"></i></a>
				<?php endif; ?>
				<?php if ( has_post_format( 'audio' ) ) : ?>
					<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-headphones"></i></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_grid_cat' ) ) : ?>
		<span class="cat"><?php penci_category( '' ); ?></span>
	<?php endif; ?>

	<h2 class="grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php if ( ! get_theme_mod( 'penci_grid_date' ) || ! get_theme_mod( 'penci_grid_comment' ) ) : ?>
		<div class="post-box-meta">
			<?php if ( ! get_theme_mod( 'penci_grid_date' ) ) : ?>
				<span><?php the_time(get_option('date_format')); ?></span>
			<?php endif; ?>
			<?php if ( ! get_theme_mod( 'penci_grid_comment' ) ) : ?>
				<span><?php comments_number( __( '0 comments', 'pencidesign' ), __( '1 Comment', 'pencidesign' ), '% ' . __( 'Comments', 'pencidesign' ) ); ?></span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="item-content">
		<?php the_excerpt(); ?>
	</div>

	<?php if ( ! get_theme_mod( 'penci_grid_share_box' ) ) : ?>
		<div class="grid-post-share-box">
			<div class="inner-grid-post-share-box">
				<div class="gbox"><?php echo penci_getPostLikeLink( get_the_ID() ); ?></div>
				<div class="gbox"><?php comments_popup_link( '<i class="fa fa-comment-o"></i>', '<i class="fa fa-comment-o"></i>', '<i class="fa fa-comment-o"></i>', '', '' ); ?></div>
				<div class="gbox">
					<a class="click-share-box"><i class="fa fa-send-o"></i></a>
					<div class="wrap-list-post-share">
						<div class="list-posts-share">
							<?php
							$facebook_share  = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
							$twitter_share   = 'https://twitter.com/home?status=Check%20out%20this%20article:%20' . get_the_title() . '%20-%20' . get_the_permalink();
							$google_share    = 'https://plus.google.com/share?url=' . get_the_permalink();
							$pinterest_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
							$pinterest_share = 'https://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . $pinterest_image . '&description=' . get_the_title();
							?>
							<a target="_blank" href="<?php echo esc_url( $facebook_share ); ?>"><i class="fa fa-facebook"></i></a>
							<a target="_blank" href="<?php echo esc_url( $twitter_share ); ?>"><i class="fa fa-twitter"></i></a>
							<a target="_blank" href="<?php echo esc_url( $google_share ); ?>"><i class="fa fa-google-plus"></i></a>
							<a target="_blank" href="<?php echo esc_url( $pinterest_share ); ?>"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</article>