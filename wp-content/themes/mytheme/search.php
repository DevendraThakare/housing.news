<?php
get_header(); ?>
<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
					</h1>
				</header><!-- .page-header -->
				<div class="entry-wrapper">
					<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;
					?>
					<div class="pagination-wrap">
						<?php the_posts_pagination( array(
								'prev_text'          => __( '<span class="icon icon-arrow-left"></span>', 'twentysixteen' ),
								'next_text'          => __( '<span class="icon icon-arrow-right"></span>', 'twentysixteen' ),
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
