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
	<meta content='IE=Edge,chrome=1' http-equiv='X-UA-Compatible'/>
	<meta http-equiv = 'Content-type' content = 'text/plain; charset=x-user-defined'/>
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimum-scale=1.0' />
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<meta property="fb:pages" content="445540912141491" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<script async src="https://housing-rm.housingcdn.com/news/news.js"></script>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');

	fbq('init', '860197050685496');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=860197050685496&ev=PageView&noscript=1"
	/></noscript>
</head>

<body <?php body_class(); ?>>
<header id="main-side-menu-wrap">
	<?php
	    wp_nav_menu( array(
	        'menu'              => 'primary',
	        'theme_location'    => 'primary',
	        'depth'             => 2,
	        'container'         => 'div',
	        'container_id'      => 'main-side-menu',
	        'container_class'   => 'main-side-menu-wrap',
	        'menu_class'        => 'nav navbar-nav main-side-menu',
	        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
	        'walker'            => new wp_bootstrap_navwalker())
	    );
	?>
</header>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<span class="icon icon-menu side-menu-icon"></span>
							<a class="navbar-brand" href="https://housing.com/" target="_blank">
								<?php if ( get_header_image() ) : ?>
									<?php $custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' ); ?>
									<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
								<?php endif; // End header image check. ?>
							</a>
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
							    <?php
							        wp_nav_menu( array(
							            'menu'              => 'primary',
							            'theme_location'    => 'primary',
							            'depth'             => 2,
							            'container'         => 'div',
							            'container_class'   => 'collapse navbar-collapse',
							    		'container_id'      => 'main-menu',
							            'menu_class'        => 'nav navbar-nav',
							            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							            'walker'            => new wp_bootstrap_navwalker())
							        );
							    ?>
							<?php endif; ?>
							<?php echo get_search_form( $echo ); ?>
						</div>
					</div>
				</nav>
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->
		<div class="header-filler"></div>
		<div id="content" class="site-content">
