<?php
get_header(); ?>
<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>
				<div class="entry-wrapper">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile; ?>
					<div class="pagination-wrap">
						<?php
							the_posts_pagination( array(
								'prev_text'          => __( '<span class="icon icon-arrow-left"></span>', 'twentysixteen' ),
								'next_text'          => __( '<span class="icon icon-arrow-right"></span>', 'twentysixteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
							) );
						?>
					</div>
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
