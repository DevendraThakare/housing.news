<?php
/**
 * The Template for displaying all single posts
 *
 * @package Wordpress
 * @since   1.0
 */
get_header(); ?>

<div class="container container-single<?php if ( get_theme_mod( 'penci_sidebar_posts' ) ) : ?> penci_sidebar<?php endif; ?>">
	<div id="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php /* Count viewed posts */ penci_set_post_views( $post->ID ); ?>
			<?php get_template_part( 'content', 'single' ); ?>
		<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>
	<?php if ( get_theme_mod( 'penci_sidebar_posts' ) ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>

<?php get_footer(); ?>