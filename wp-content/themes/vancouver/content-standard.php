<?php
/**
 * Content standard homepage, archive page
 *
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( ! get_theme_mod( 'penci_standard_thumbnail' ) ): ?>
		<?php if ( has_post_format( 'gallery' ) ) : ?>

			<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

			<?php if ( $images ) : ?>
				<div class="standard-post-image">
					<div class="penci-slick-slider" data-auto-height="true">
						<?php foreach ( $images as $image ) : ?>

							<?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
							<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>
							<figure>
								<img src="<?php echo esc_url( $the_image[0] ); ?>" alt="<?php the_title(); ?>" <?php if ($the_caption) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> />
							</figure>

						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		<?php else : ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php if ( ! get_theme_mod( 'penci_post_thumb' ) ) : ?>
					<div class="standard-post-image">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'full-thumb' ); ?></a>
						<?php if( ! get_theme_mod( 'penci_standard_icon_format' ) ) :?>
							<?php if ( has_post_format( 'video' ) ) : ?>
								<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-play"></i></a>
							<?php endif; ?>
							<?php if ( has_post_format( 'audio' ) ) : ?>
								<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-headphones"></i></a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

		<?php endif; /* End Thumbnail */ ?>
	<?php endif; ?>

	<div class="standard-content">
		<?php if ( ! get_theme_mod( 'penci_standard_share_box' ) ) : ?>
			<div class="standard-share-box">
				<div class="standard-inner-share-box">
					<div class="sbox"><?php echo penci_getPostLikeLink( get_the_ID() ); ?></div>
					<div class="sbox"><?php comments_popup_link( '<i class="fa fa-comment-o"></i>', '<i class="fa fa-comment-o"></i>', '<i class="fa fa-comment-o"></i>', '', '' ); ?></div>
					<div class="sbox">
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

		<div class="standard-main-content<?php if ( ! get_theme_mod( 'penci_standard_share_box' ) ) : echo ' has-padding'; endif; ?>">
			<?php if ( ! get_theme_mod( 'penci_standard_cat' ) ) : ?>
				<span class="cat"><?php penci_category( '' ); ?></span>
			<?php endif; ?>

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php if ( ! get_theme_mod( 'penci_standard_author' ) || ! get_theme_mod( 'penci_standard_date' ) || ! get_theme_mod( 'penci_standard_comment' ) ) : ?>
				<div class="post-box-meta">
					<?php if ( ! get_theme_mod( 'penci_standard_author' ) ) : ?>
						<span class="author-post"><?php _e( 'posted by ', 'pencidesign' ); ?><strong><?php the_author(); ?></strong></span>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'penci_standard_date' ) ) : ?>
						<span><?php the_time(get_option('date_format')); ?></span>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'penci_standard_comment' ) ) : ?>
						<span><?php comments_number( __( '0 comments', 'pencidesign' ), __( '1 Comment', 'pencidesign' ), '% ' . __( 'Comments', 'pencidesign' ) ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="post-entry standard-post-entry">
				<?php the_content( __( 'Continue Reading', 'pencidesign' ) ); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
	</div>

</article>