<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package    WordPress
 * @subpackage Vancouver Theme
 * @since      1.0
 */
get_header(); ?>

<?php
/**
 * Get feature slider for homepage
 */
if ( get_theme_mod( 'penci_featured_slider' ) == true ) :
	if( get_theme_mod( 'penci_featured_slider_style' ) == 'style-3' || get_theme_mod( 'penci_featured_slider_style' ) == 'style-4' ) {
		get_template_part( 'inc/featured_slider/featured_penci_slider' );
	} else {
		get_template_part( 'inc/featured_slider/featured_slider' );
	}
endif;

/* Home layout */
$layout_this = get_theme_mod( "penci_home_layout" );
if ( ! isset( $layout_this ) || empty( $layout_this ) ): $layout_this = 'standard'; endif;
$class_layout = '';
if( $layout_this == 'classic' ): $class_layout = ' classic-layout'; endif;
$class_border = '';
if ( in_array( $layout_this, array( 'classic', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ): $class_border = ' class="has-border-bottom"'; endif;
?>

	<div class="container<?php echo esc_attr( $class_layout ); if ( get_theme_mod( 'penci_sidebar_home' ) ) : ?> penci_sidebar<?php endif; ?>">
		<div id="main"<?php echo wp_kses( $class_border, '' ); ?>>
			<?php if ( get_theme_mod( 'penci_home_title' ) ) : ?>
				<div class="penci-homepage-title<?php if( in_array( $layout_this, array( 'masonry', 'standard-masonry', 'classic-masonry' ) ) ): echo ' align-center'; endif; ?>">
					<div class="pattern-grey"></div>
					<h3><?php echo sanitize_text_field( get_theme_mod( 'penci_home_title' ) ); ?></h3>
				</div>
			<?php endif; ?>

			<?php if ( in_array( $layout_this, array( 'grid', 'list', 'list-boxed', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ) : ?><ul class="penci-grid"><?php endif; ?>
			<?php if( in_array( $layout_this, array( 'masonry', 'standard-masonry', 'classic-masonry' ) ) ) : ?><div class="penci-wrap-masonry"><div class="masonry penci-masonry"><?php endif; ?>

			<?php /* The loop */
			if (have_posts()) :
			while ( have_posts() ) : the_post();
				include( locate_template( 'content-' . $layout_this . '.php' ) );
			endwhile;
			?>

			<?php if( in_array( $layout_this, array( 'masonry', 'standard-masonry', 'classic-masonry' ) ) ) : ?></div></div><?php endif; ?>
			<?php if ( in_array( $layout_this, array( 'grid', 'list', 'list-boxed', 'standard-grid', 'standard-list', 'standard-list-boxed', 'classic-grid', 'classic-list', 'classic-list-boxed' ) ) ) : ?></ul><?php endif; ?>

			<?php pencidesign_pagination(); ?>
			<?php endif; wp_reset_postdata(); /* End if of the loop */ ?>
		</div>

		<?php if ( get_theme_mod( 'penci_sidebar_home' ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

<?php get_footer(); ?>