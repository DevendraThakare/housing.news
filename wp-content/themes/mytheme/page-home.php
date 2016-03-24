<?php /* Template Name: HomePage */ ?>

<?php get_header(); ?>
<div class="main-carousel">
	<?php get_template_part( 'template-parts/content', 'slider'); ?>
</div>

<div id="page-container" class="clear">
	<?php //query_posts('posts_per_page=10&paged='. get_query_var('paged')); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">WHAT'S NEW</h1>
			</header><!-- .page-header -->
			<div class="entry-wrapper">
				<?php 
					if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
					else { $paged = 1; }
					$the_query = new WP_Query('posts_per_page=10&paged=' . $paged); 
					global $wp_query;
  					$wp_query->in_the_loop = true;
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post();
						get_template_part( 'template-parts/content', get_post_format() );
						endwhile;
					?>
					<div class="navigation">
						<div class="alignleft"><?php previous_posts_link('&laquo; Previous') ?></div>
						<div class="alignright"><?php next_posts_link('More &raquo;') ?></div>
					</div>
					<!-- <div class="pagination-wrap">
						<nav class="navigation pagination">
							<div class="nav-links">
								<?php if($the_query->max_num_pages>1){ ?>
									<p class="navrechts">
										<?php if ($paged > 1) { ?>
											<a href="<?php echo 'page/' . ($paged -1); //prev link ?>">
												<span class="page-numbers"> < </span> 
											</a>
										<?php } ?>
										<?php
											for($i=1;$i<=$the_query->max_num_pages;$i++){ ?>
												<a href="<?php echo 'page/' . $i; ?>"<?php echo ($paged==$i)? 'class="selected"':'';?>>
													<span class="page-numbers"> <?php echo $i;?> </span> 
												</a>
										<?php } ?>
										<?php if($paged < $the_query->max_num_pages){ ?>
											<a href="<?php echo 'page/' . ($paged + 1); //next link ?>">></a>
										<?php } ?>
									</p>
								<?php } ?>
							</div>
						</nav>
					</div> -->
					<?php 
						// the_posts_pagination( array(
						// 	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
						// 	'next_text'          => __( 'Next page', 'twentysixteen' ),
						// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'twentysixteen' ) . ' </span>',
						// ));
					?>
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

