<?php
/**
 * The template for displaying tag pages.
 *
 * @package Wordpress
 * @since 1.0
 */
get_header();

/* Tag layout */
$layout_this = get_theme_mod( 'penci_archive_layout' );
if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;
$class_border = '';
if ( in_array( $layout_this, array( 'classic', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ): $class_border = ' class="has-border-bottom"'; endif;
?>

	<div class="archive-box">
		<div class="container title-bar">
			<div class="pattern-grey"></div>
			<span><?php _e( 'Tag', 'pencidesign' ); ?></span>
			<h1><?php printf( __( '%s', 'pencidesign' ), single_tag_title( '', false ) ); ?></h1>
		</div>
	</div>

	<div class="container<?php echo esc_attr( $class_layout ); if ( get_theme_mod( 'penci_sidebar_archive' ) ) : ?> penci_sidebar<?php endif; ?>">
		<div id="main"<?php echo wp_kses( $class_border, '' ); ?>>
			<?php if ( have_posts() ) : ?>
				<?php if ( in_array( $layout_this, array( 'grid', 'list', 'list-boxed', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ) : ?><ul class="penci-grid"><?php endif; ?>
				<?php if( in_array( $layout_this, array( 'masonry', 'standard-masonry', 'classic-masonry' ) ) ) : ?><div class="penci-wrap-masonry"><div class="masonry penci-masonry"><?php endif; ?>

				<?php /* The loop */
				while ( have_posts() ) : the_post();
					include( locate_template( 'content-' . $layout_this . '.php' ) );
				endwhile;
				?>

				<?php if( in_array( $layout_this, array( 'masonry', 'standard-masonry', 'classic-masonry' ) ) ) : ?></div></div><?php endif; ?>
				<?php if ( in_array( $layout_this, array( 'grid', 'list', 'list-boxed', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ) : ?></ul><?php endif; ?>

				<?php pencidesign_pagination(); ?>
			<?php endif; wp_reset_postdata(); /* End if of the loop */ ?>
		</div>

	<?php if ( get_theme_mod( 'penci_sidebar_archive' ) ) : ?><?php get_sidebar(); ?><?php endif; ?>

<?php get_footer(); ?>