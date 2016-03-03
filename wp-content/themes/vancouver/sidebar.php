<?php
/**
 * Main sidebar of Vancouver theme
 * Display all widgets on right sidebar
 *
 * @package Wordpress
 * @since   1.0
 */

$sidebar_home = get_theme_mod( 'penci_sidebar_name_home' );
if ( ! isset( $sidebar_home ) || empty( $sidebar_home ) ):  $sidebar_home = 'main-sidebar'; endif;

$sidebar_single = get_theme_mod( 'penci_sidebar_name_single' );
if ( ! isset( $sidebar_single ) || empty( $sidebar_single ) ):  $sidebar_single = 'main-sidebar'; endif;

$sidebar_pages = get_theme_mod( 'penci_sidebar_name_pages' );
if ( ! isset( $sidebar_pages ) || empty( $sidebar_pages ) ):  $sidebar_pages = 'main-sidebar'; endif;

if( is_page() ) {
	$custom_sidebar_pages = get_post_meta( get_the_ID(), 'penci_custom_sidebar_page_display', true );
	if ( $custom_sidebar_pages ): $sidebar_pages = $custom_sidebar_pages; endif;
} elseif( is_single() ) {
	$custom_sidebar_post = get_post_meta( get_the_ID(), 'penci_custom_sidebar_page_display', true );
	if ( $custom_sidebar_post ): $sidebar_single = $custom_sidebar_post; endif;
}
$sidebar_portfolio_cat = get_theme_mod( 'penci_sidebar_name_portfolio_cat' );
if ( ! isset( $sidebar_portfolio_cat ) || empty( $sidebar_portfolio_cat ) ):  $sidebar_portfolio_cat = 'main-sidebar'; endif;
$sidebar_portfolio_single = get_theme_mod( 'penci_sidebar_name_portfolio_single' );
if ( ! isset( $sidebar_portfolio_single ) || empty( $sidebar_portfolio_single ) ):  $sidebar_portfolio_single = 'main-sidebar'; endif;
?>

<div id="sidebar"<?php if ( get_theme_mod( 'penci_sidebar_sticky' ) ): echo ' class="penci-sticky-sidebar"'; endif; ?>>
	<?php /* Display sidebar */
	if ( ( is_home() || is_front_page() ) && is_active_sidebar( $sidebar_home ) ) {
		dynamic_sidebar( $sidebar_home );
	}
	elseif ( is_tax( 'portfolio-category' ) && is_active_sidebar( $sidebar_portfolio_cat ) ) {
		dynamic_sidebar( $sidebar_portfolio_cat );
	}
	elseif ( is_singular( 'portfolio' ) && is_active_sidebar( $sidebar_portfolio_single ) ) {
		dynamic_sidebar( $sidebar_portfolio_single );
	}
	elseif ( is_single() && is_active_sidebar( $sidebar_single ) ) {
		dynamic_sidebar( $sidebar_single );
	}
	elseif ( is_page() && is_active_sidebar( $sidebar_pages )  ) {
		dynamic_sidebar( $sidebar_pages );
	}
	else {
		dynamic_sidebar( 'main-sidebar' );
	}
	?>
</div>