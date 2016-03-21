<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<div class="main-carousel">
	<?php get_template_part( 'template-parts/content', 'slider'); ?>
</div>

<div id="page-container" class="clear">
	<?php query_posts('posts_per_page=10&paged='. get_query_var('paged')); ?>
	<?php 

		// $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if ( get_query_var('paged') ) { 
			$paged = get_query_var('paged'); 
		}
		elseif ( get_query_var('page') ) {
			$paged = get_query_var('page'); 
		}
		else { $paged = 1; }

		$args = array(
		   'posts_per_page' => 10,
		   'paged' => $paged
		);

		query_posts($args);
	?>
	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">
			<div class="main-tabs">
				<!-- Nav tabs -->
				<div class="whats-new">
					WHAT'S NEW
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="latest-posts">
						<?php if ( have_posts() ) : ?>
							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							// End the loop.
							endwhile;
							?>
							<div class="pagination-wrap">
								<?php
									// Previous/next page navigation.
									the_posts_pagination( array(
										'prev_text'          => __( 'Previous page', 'twentysixteen' ),
										'next_text'          => __( 'Next page', 'twentysixteen' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
									) );
								?>
							</div>
						<?php
						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
			</div>
		</div><!-- .site-main -->
	</div><!-- .content-area -->
	<?php wp_reset_query(); ?>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

