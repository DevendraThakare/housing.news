<?php
/*
	Template Name: Page with Sidebar
*/

/**
 * Template using to display sidebar on page
 *
 * @since 1.0
 */
?>
<?php get_header(); ?>

	<div class="container penci_sidebar">

	<div id="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('content', 'page'); ?>
	<?php endwhile; endif; ?>
	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>