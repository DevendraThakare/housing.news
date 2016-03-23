<?php
get_header(); ?>
<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
				?>
				<div class="pagination-wrap">
					<?php the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'twentysixteen' ),
							'next_text'          => __( 'Next page', 'twentysixteen' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
						));
					?>
				</div>
			<?php
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
