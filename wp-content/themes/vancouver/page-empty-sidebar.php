<?php
/**
 * Template Name: Page with Sidebar Only Content
 */
get_header();
?>

	<div class="container penci_sidebar">

		<div id="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'empty-page' ); ?>
			<?php endwhile; endif; ?>
		</div>

		<?php get_sidebar(); ?>

<?php get_footer(); ?>