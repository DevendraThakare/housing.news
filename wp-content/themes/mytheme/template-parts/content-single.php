<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php the_subtitle('<h3 class="entry-subtitle">', '</h3>'); ?>
	</header><!-- .entry-header -->

	<?php echo do_shortcode('[addtoany]'); ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>
			<?php echo do_shortcode('[addtoany]'); ?>
	</div><!-- .entry-content -->
	<div class="tags-section page-section">
		<?php echo get_the_tag_list('<ul class="tag-list"><li>','</li><li>','</li></ul>'); ?>
	</div>
	<div class="about-author-section page-section">
		<h3 class="section-title">About the Author</h3>
		<?php get_template_part( 'template-parts/biography' ); ?>
	</div>
	<div class="fb-comment-section page-section">
		<?php echo do_shortcode('[fbcomments]'); ?>
	</div>

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
