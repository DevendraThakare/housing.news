<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<span class="glyphicon glyphicon-menu-hamburger side-menu-icon"></span>
							<a class="navbar-brand" href="<?php echo home_url(); ?>">
								<?php if ( get_header_image() ) : ?>
									<?php $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' ); ?>
									<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								<?php endif; // End header image check. ?>
							</a>
							<?php echo get_search_form( $echo ); ?>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
							    <?php
							        wp_nav_menu( array(
							            'menu'              => 'primary',
							            'theme_location'    => 'primary',
							            'depth'             => 2,
							            'container'         => 'div',
							            'container_class'   => 'collapse navbar-collapse pull-right',
							    		'container_id'      => 'main-menu',
							            'menu_class'        => 'nav navbar-nav',
							            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							            'walker'            => new wp_bootstrap_navwalker())
							        );
							    ?>
							<?php endif; ?>
							<?php //social_page_links(); ?>
						</div>
						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<?php
								// wp_nav_menu( array(
								// 	'theme_location' => 'social',
								// 	'menu_class'     => 'social-links-menu pull-right',
								// 	'depth'          => 1,
								// 	'link_before'    => '<span class="screen-reader-text">',
								// 	'link_after'     => '</span>',
								// ) );
							?>
						<?php endif; ?>
					</div>
				</nav>
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->

		<div id="content" class="site-content">
