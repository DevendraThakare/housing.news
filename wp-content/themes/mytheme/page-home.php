<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<div class="main-carousel">
	<?php get_template_part( 'template-parts/content', 'slider'); ?>
</div>

<div id="page-container" class="clear">
	<?php query_posts('posts_per_page=10&paged='. get_query_var('paged')); ?>
	<?php 
		// $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		if(get_query_var('paged')){ 
			$paged = get_query_var('paged'); 
		}
		elseif(get_query_var('page')){
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
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">WHAT'S NEW</h1>
			</header><!-- .page-header -->
			<div class="entry-wrapper">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
					?>
					<div class="pagination-wrap">
						<?php the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'twentysixteen' ),
								'next_text'          => __( 'Next page', 'twentysixteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
							));
						?>
					</div>
				<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php wp_reset_query(); ?>
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

