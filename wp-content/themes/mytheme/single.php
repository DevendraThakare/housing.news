<?php
get_header(); ?>
<div id="page-container" class="clear">
	<?php post_banner_img(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'single' );
					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
					?>
					<div class="pagination-wrap">
						<?php
							if ( is_singular( 'attachment' ) ) {
								the_post_navigation( array(
									'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
								) );
							} elseif ( is_singular( 'post' ) ) {
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
							}
						?>
					</div>
			<?php
				endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
