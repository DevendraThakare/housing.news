<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

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

	?>
	<?php if($thumbnail){ ?>
		<a href="<?php echo  esc_url( get_permalink());?>"><div class="entry-thumb" style="background-image: url('<?php echo $thumbnail; ?>');"></div></a>

		<div class="category-tag">
			<?php
				$categories = '';
				if( class_exists('WPSEO_Primary_Term') ) {
					$cat = new WPSEO_Primary_Term('category', get_the_ID());
    				$cat = $cat->get_primary_term();
    				if($cat)
    					$categories = get_the_category_by_ID($cat);
				}
				if($categories == ''){
					foreach((get_the_category()) as $category) {
						if ($category->cat_name != 'slider') {
							if($category->parent != 0){
								$categories = get_the_category_by_ID( $category->parent );
							}
							else{
								$categories .= $category->name;
							}
							break;
						}
					}
				}
				echo rtrim($categories, ", ");
			?>
		</div>
	<?php } ?>
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
