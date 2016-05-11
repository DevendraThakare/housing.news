<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<div class="home-page-banner-gradient"></div>
<div class="main-carousel">
	<?php get_template_part( 'template-parts/content', 'slider'); ?>
</div>

<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-wrapper">
				<?php 
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }
					$the_query = new WP_Query('posts_per_page='.get_option('posts_per_page').'&paged=' . $paged); 
					global $wp_query;
  					$wp_query->in_the_loop = true;
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
					?>
					<div class="pagination-wrap">
						<nav class="navigation pagination">
							<div class="nav-links">
								<?php custom_pagination($paged, $the_query->max_num_pages); ?>
							</div>
						</nav>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php //wp_reset_query(); ?>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

