<?php
/**
 * The Header for our theme
 *
 * @package    WordPress
 * @since      1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php if ( get_theme_mod( 'penci_favicon' ) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url( get_theme_mod( 'penci_favicon' ) ); ?>" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<style type="text/css">
		.featured-carousel .item { opacity: 1; }
	</style>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
/**
 * Get header layout in your customizer to change header layout
 *
 * @author PenciDesign
 */
$header_layout = get_theme_mod( 'penci_header_layout' );
if ( ! isset( $header_layout ) || empty( $header_layout ) ) {
	$header_layout = 'header-1';
}
?>
<a id="close-sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>"><i class="fa fa-close"></i></a>

<nav id="sidebar-nav" class="<?php echo esc_attr( $header_layout ); ?>">

	<?php if ( ! get_theme_mod( 'penci_header_logo_vertical' ) ) : ?>
		<div id="sidebar-nav-logo">
			<?php if ( ! get_theme_mod( 'penci_mobile_nav_logo' ) ) : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-mobile-nav.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_mobile_nav_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if ( ! get_theme_mod( 'penci_header_social_check' ) ) : ?>
		<?php if ( get_theme_mod( 'penci_facebook' ) || get_theme_mod( 'penci_twitter' ) || get_theme_mod( 'penci_google' ) || get_theme_mod( 'penci_instagram' ) || get_theme_mod( 'penci_pinterest' ) || get_theme_mod( 'penci_tumblr' ) || get_theme_mod( 'penci_youtube' ) || get_theme_mod( 'penci_rss' ) ) : ?>
			<div class="header-social sidebar-nav-social">
				<div class="inner-header-social">
					<?php if ( get_theme_mod( 'penci_facebook' ) ) : ?>
						<a href="http://facebook.com/<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_twitter' ) ) : ?>
						<a href="http://twitter.com/<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_google' ) ) : ?>
						<a href="http://plus.google.com/<?php echo esc_attr( get_theme_mod( 'penci_google' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_instagram' ) ) : ?>
						<a href="http://instagram.com/<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_pinterest' ) ) : ?>
						<a href="http://pinterest.com/<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_linkedin' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_flickr' ) ) : ?>
						<a href="http://www.flickr.com/photos/<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" target="_blank"><i class="fa fa-flickr"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_behance' ) ) : ?>
						<a href="http://www.behance.net/<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" target="_blank"><i class="fa fa-behance"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_tumblr' ) ) : ?>
						<a href="http://<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_youtube' ) ) : ?>
						<a href="http://youtube.com/<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'penci_rss' ) ) : ?>
						<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" target="_blank"><i class="fa fa-rss"></i></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	/**
	 * Display main navigation
	 */
	wp_nav_menu( array(
		'container'      => false,
		'theme_location' => 'main-menu',
		'menu_class'     => 'menu',
		'fallback_cb'    => 'penci_menu_fallback',
		'walker'         => new penci_menu_walker_nav_menu()
	) );
	?>
</nav>

<?php if ( ( $header_layout == 'header-1' ) || ( $header_layout == 'header-3' ) ) : ?>
<!-- Navigation -->
<nav id="navigation" class="header-layout-top <?php echo esc_attr( $header_layout ); ?>">
	<div class="container">
		<div class="button-menu-mobile"><i class="fa fa-bars"></i></div>
		<?php if ( $header_layout == 'header-1' ) : ?>
			<?php
			/**
			 * Display main navigation
			 */
			wp_nav_menu( array(
				'container'      => false,
				'theme_location' => 'main-menu',
				'menu_class'     => 'menu',
				'fallback_cb'    => 'penci_menu_fallback',
				'walker'         => new penci_menu_walker_nav_menu()
			) );
			?>
		<?php endif; /* Display when header style is 1 */ ?>
		<?php if ( ! get_theme_mod( 'penci_topbar_search_check' ) ) : ?>
			<div id="top-search">
				<a><i class="fa fa-search"></i></a>
				<div class="show-search">
					<?php get_search_form(); ?>
					<a class="close-search"><i class="fa fa-close"></i></a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</nav><!-- End Navigation -->
<?php endif; /* End check if header layout is default */?>

<header id="header"><!-- #header -->
	<div class="inner-header">
		<div class="pattern-grey"></div>
		<?php 
		if( get_theme_mod( 'penci_enable_featured_video_bg' ) == true && get_theme_mod( 'penci_featured_video_url' ) ): 
			get_template_part( 'inc/modules/header_video' );
		endif;
		?>
		<div class="container">
			<div id="logo">
				<?php if ( ! get_theme_mod( 'penci_logo' ) ) : ?>
					<?php if ( is_front_page() ) : ?>
						<h1>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h1>
					<?php else : ?>
						<h2>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h2>
					<?php endif; ?>
				<?php else : ?>
					<?php if ( is_front_page() ) : ?>
						<h1>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h1>
					<?php else : ?>
						<h2>
							<a href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'penci_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
						</h2>
					<?php endif; ?>
				<?php endif; ?>
			</div>

			<?php if ( ! get_theme_mod( 'penci_header_social_check' ) ) : ?>
				<?php if ( get_theme_mod( 'penci_facebook' ) || get_theme_mod( 'penci_twitter' ) || get_theme_mod( 'penci_google' ) || get_theme_mod( 'penci_instagram' ) || get_theme_mod( 'penci_pinterest' ) || get_theme_mod( 'penci_tumblr' ) || get_theme_mod( 'penci_youtube' ) || get_theme_mod( 'penci_rss' ) ) : ?>
					<div class="header-social">
						<div class="inner-header-social">
							<?php if ( get_theme_mod( 'penci_facebook' ) ) : ?>
								<a href="http://facebook.com/<?php echo esc_attr( get_theme_mod( 'penci_facebook' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_twitter' ) ) : ?>
								<a href="http://twitter.com/<?php echo esc_attr( get_theme_mod( 'penci_twitter' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_google' ) ) : ?>
								<a href="http://plus.google.com/<?php echo esc_attr( get_theme_mod( 'penci_google' ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_instagram' ) ) : ?>
								<a href="http://instagram.com/<?php echo esc_attr( get_theme_mod( 'penci_instagram' ) ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_pinterest' ) ) : ?>
								<a href="http://pinterest.com/<?php echo esc_attr( get_theme_mod( 'penci_pinterest' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_linkedin' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'penci_linkedin' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_flickr' ) ) : ?>
								<a href="http://www.flickr.com/photos/<?php echo esc_attr( get_theme_mod( 'penci_flickr' ) ); ?>" target="_blank"><i class="fa fa-flickr"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_behance' ) ) : ?>
								<a href="http://www.behance.net/<?php echo esc_attr( get_theme_mod( 'penci_behance' ) ); ?>" target="_blank"><i class="fa fa-behance"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_tumblr' ) ) : ?>
								<a href="http://<?php echo esc_attr( get_theme_mod( 'penci_tumblr' ) ); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_youtube' ) ) : ?>
								<a href="http://youtube.com/<?php echo esc_attr( get_theme_mod( 'penci_youtube' ) ); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'penci_rss' ) ) : ?>
								<a href="<?php echo esc_url( get_theme_mod( 'penci_rss' ) ); ?>" target="_blank"><i class="fa fa-rss"></i></a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( ( $header_layout == 'header-2' ) || ( $header_layout == 'header-4' ) ) : ?>
		<!-- Navigation -->
		<nav id="navigation" class="header-layout-bottom <?php echo esc_attr( $header_layout ); ?>">
			<div class="container">
				<div class="button-menu-mobile"><i class="fa fa-bars"></i></div>
				<?php if ( $header_layout == 'header-2' ) : ?>
					<?php
					/**
					 * Display main navigation
					 */
					wp_nav_menu( array(
						'container'      => false,
						'theme_location' => 'main-menu',
						'menu_class'     => 'menu',
						'fallback_cb'    => 'penci_menu_fallback',
						'walker'         => new penci_menu_walker_nav_menu()
					) );
					?>
				<?php endif; /* Display when header style is 2 */ ?>
				<?php if ( ! get_theme_mod( 'penci_topbar_search_check' ) ) : ?>
					<div id="top-search">
						<a><i class="fa fa-search"></i></a>
						<div class="show-search">
							<?php get_search_form(); ?>
							<a class="close-search"><i class="fa fa-close"></i></a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</nav><!-- End Navigation -->
	<?php endif; /* End check if header layout is layout 2 */?>
</header>
<!-- end #header -->