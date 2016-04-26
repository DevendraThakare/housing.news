<?php
get_header(); ?>

<?php 
	if (function_exists('is_mobile') && is_mobile()) {
		if( class_exists('MultiPostThumbnails') ) {
			$thumbnail = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'thumbnail-image');
		}
		if(!$thumbnail){
			$post_image_id = get_post_thumbnail_id();
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'medium', false);
				if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			}
		}
	} else {
		$post_image_id = get_post_thumbnail_id();
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'full', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		}
	}
?>
<?php if($thumbnail){ ?>
	<div class="home-page-banner-gradient"></div>
	<div class="entry-banner" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
<?php } ?>
<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'single' );
			?>
			<?php
				endwhile;
			?>
			<!-- <div class="pagination-wrap clear">
				<?php
					if ( is_singular( 'attachment' ) ) {
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
							'screen_reader_text'=>' '
						) );
					} elseif ( is_singular( 'post' ) ) {
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ', 'twentysixteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ', 'twentysixteen' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'screen_reader_text'=>' '
						) );
					}
				?>
			</div> -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
