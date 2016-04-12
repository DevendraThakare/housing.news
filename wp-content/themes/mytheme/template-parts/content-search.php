<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		$post_image_id = get_post_thumbnail_id($post_to_use->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'medium', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		}
	?>
	<a href="<?php echo  esc_url( get_permalink());?>"><div class="entry-thumb" style="background-image: url('<?php echo $thumbnail; ?>');"></div></a>
	<div class="category-tag">
		<?php
			$categories = '';
			foreach((get_the_category()) as $category) {
				if ($category->cat_name != 'slider') {
					$categories .= $category->name.", ";
				}
			}
			echo rtrim($categories, ", ");
		?>
		<?php //the_category( ', ' ); ?>
	</div>
	<div class="post-content-wrap">
		<header class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
			<?php endif; ?>
			<div class="post-meta">
				<?php post_meta(); ?>
			</div>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->



		<div class="entry-excerpt">
			<?php
				/* translators: %s: Name of current post */
				echo post_excerpt();
				// the_content( sprintf(
				// 	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				// 	get_the_title()
				// ) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->
		<a class="read-full-story-lnk" href="<?php echo  esc_url( get_permalink());?>">READ FULL STORY</a>

		<!-- <footer class="entry-footer">
			<?php
				// edit_post_link(
				// 	sprintf(
				// 		/* translators: %s: Name of current post */
				// 		__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				// 		get_the_title()
				// 	),
				// 	'<span class="edit-link">',
				// 	'</span>'
				// );
			?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->

