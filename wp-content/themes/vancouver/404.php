<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Wordpress
 * @since   1.0
 */
get_header();

/**
 * Set default value if fields is not isset
 *
 */
$image = ! get_theme_mod( 'penci_not_found_image' ) ? get_template_directory_uri() . '/images/404.png' : get_theme_mod( 'penci_not_found_image' );
$heading_mod = get_theme_mod( 'penci_not_found_heading' );
$heading_text = ! ( $heading_mod ) ? 'Apologies, unfortunately we couldn&#39;t find that page' : $heading_mod;
$heading_sub_mod = get_theme_mod( 'penci_not_found_sub_heading' );
$heading_sub_text = ! ( $heading_sub_mod ) ? 'Try using our search to find what you are looking for:' : $heading_sub_mod;
?>

<div class="container page-404">
	<div class="error-404">
		<img src="<?php echo esc_url( $image ); ?>" alt="404" />
		<?php if ( ! empty( $heading_text ) ): ?>
			<p class="heading-text-404"><?php echo wp_kses( $heading_text, '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! empty( $heading_text ) ): ?>
			<p class="sub-heading-text-404"><?php echo wp_kses( $heading_sub_text, '' ); ?></p>
		<?php endif; ?>
		<?php if ( ! get_theme_mod( 'penci_not_found_hide_search' ) ) : get_search_form(); endif; ?>
		<?php if ( ! get_theme_mod( 'penci_not_found_hide_backhome' ) ) : ?>
		<p class="go-back-home"><?php _e( 'or', 'pencidesign' ); ?><a href="<?php echo esc_url( home_url('/') ); ?>"><?php _e( 'Back to Home Page', 'pencidesign' ); ?></a><p>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>