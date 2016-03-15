<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<?php query_posts('posts_per_page=4&paged='. get_query_var('paged')); ?>
<div class="main-carousel">
	<?php get_template_part( 'template-parts/content', 'slider'); ?>
</div>

<div id="page-container"class="clear">
	<?php query_posts('posts_per_page=10&paged='. get_query_var('paged')); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="main-tabs">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#latest-posts" aria-controls="home" role="tab" data-toggle="tab">Latest Post</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="latest-posts">
						<?php if ( have_posts() ) : ?>

							<?php if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php endif; ?>

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
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

