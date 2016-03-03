<?php
/**
 * The template for displaying single pages.
 *
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-header">

		<?php if ( ! get_theme_mod( 'penci_post_cat' ) ) : ?>
			<span class="cat"><?php penci_category( '' ); ?></span>
		<?php endif; ?>

		<h1><span class="single-post-title"><?php the_title(); ?></span></h1>

		<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) || ! get_theme_mod( 'penci_single_meta_date' ) || ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
			<div class="post-box-meta">
				<?php if ( ! get_theme_mod( 'penci_single_meta_author' ) ) : ?>
					<span class="author-post"><?php _e( 'posted by ', 'pencidesign' ); ?><strong><?php the_author(); ?></strong></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_date' ) ) : ?>
					<span><?php the_time(get_option('date_format')); ?></span>
				<?php endif; ?>
				<?php if ( ! get_theme_mod( 'penci_single_meta_comment' ) ) : ?>
					<span><?php comments_number( __( '0 comments', 'pencidesign' ), __( '1 Comment', 'pencidesign' ), '% ' . __( 'Comments', 'pencidesign' ) ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>

	<?php if ( has_post_format( 'gallery' ) ) : ?>

		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>

		<?php if ( $images ) : ?>
			<div class="post-image">
				<div class="penci-slick-slider" data-auto-height="true">
					<?php foreach ( $images as $image ) : ?>

						<?php $the_image = wp_get_attachment_image_src( $image, 'full-thumb' ); ?>
						<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>
						<figure>
							<img src="<?php echo esc_url( $the_image[0] ); ?>"<?php if ($the_caption) : ?>title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> />
						</figure>

					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

	<?php elseif ( has_post_format( 'video' ) ) : ?>

		<div class="post-image">
			<?php $penci_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if ( wp_oembed_get( $penci_video ) ) : ?>
				<?php echo wp_oembed_get( $penci_video ); ?>
			<?php else : ?>
				<?php echo $penci_video; ?>
			<?php endif; ?>
		</div>

	<?php elseif ( has_post_format( 'audio' ) ) : ?>

		<div class="post-image audio">
			<?php $penci_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if ( wp_oembed_get( $penci_audio ) ) : ?>
				<?php echo wp_oembed_get( $penci_audio ); ?>
			<?php else : ?>
				<?php echo $penci_audio; ?>
			<?php endif; ?>
		</div>

	<?php else : ?>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php if ( ! get_theme_mod( 'penci_post_thumb' ) ) : ?>
				<div class="post-image">
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'full-thumb' ); ?></a>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	<?php endif; ?>

	<div class="post-entry">
		<div class="inner-post-entry">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>

	<?php if( ! get_theme_mod( 'penci_post_tags' ) || ! get_theme_mod( 'penci_post_share' ) ): ?>
		<div class="tags-share-box<?php if( ! has_tag() || get_theme_mod( 'penci_post_tags' ) ): echo ' hide-tags'; endif; ?>">
			<div class="pattern-grey"></div>
			<?php if ( ! get_theme_mod( 'penci_post_tags' ) ) : ?>
				<?php if ( is_single() ) : ?>
					<div class="post-tags">
						<?php the_tags( __( '<span>Tags:</span>', 'pencidesign' ), ", ", "" ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'penci_post_share' ) ) : ?>
				<div class="post-share">
					<span class="share-title"><?php _e( 'Share:', 'pencidesign' ); ?></span>
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
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_post_author' ) ) : ?>
		<?php get_template_part( 'inc/templates/about_author' ); ?>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_post_nav' ) ) : ?>
		<?php get_template_part( 'inc/templates/post_pagination' ); ?>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_post_related' ) ) : ?>
		<?php get_template_part( 'inc/templates/related_posts' ); ?>
	<?php endif; ?>

	<?php comments_template( '', true ); ?>

</article>