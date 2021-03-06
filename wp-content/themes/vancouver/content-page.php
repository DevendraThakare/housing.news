<?php
/**
 * This is content page will display in loop of page.php file
 * Don't edit this file, let create child theme and override it
 *
 * @since 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-header">
		<h1><span><?php the_title(); ?></span></h1>
	</div>

	<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
		<div class="post-image">
			<a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'full-thumb' ); ?></a>
		</div>
	<?php endif; ?>

	<div class="post-entry<?php if( get_theme_mod( 'penci_page_comments' ) && get_theme_mod( 'penci_page_share' ) ): echo ' page-has-margin'; endif; ?>">
		<div class="inner-post-entry">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>

	<?php if ( ! get_theme_mod( 'penci_page_share' ) ) : ?>
		<div class="tags-share-box hide-tags page-share">
			<div class="pattern-grey"></div>
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
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_page_comments' ) ) : ?>
		<?php comments_template( '', true ); ?>
	<?php endif; ?>

</article>