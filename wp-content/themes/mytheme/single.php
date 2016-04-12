<?php
get_header(); ?>
<div class="home-page-banner-gradient"></div>
<?php 
	$post_image_id = get_post_thumbnail_id($post_to_use->ID);
	if ($post_image_id) {
		if (is_mobile()) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, array(960, 480), false);
		} else {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
		}
		if ($thumbnail) (string)$thumbnail = $thumbnail[0];
	}
?>
<div class="entry-banner" style="background-image: url('<?php echo $thumbnail; ?>');"></div>
<div id="page-container" class="clear">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content', 'single' );
			?>
			<?php
				endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
