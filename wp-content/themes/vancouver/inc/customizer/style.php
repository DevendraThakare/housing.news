<?php
/**
 * Add customize CSS from options customizer
 * Hook to wp_head() function to render style
 *
 * @package Wordpress
 * @since 1.0
 */
function pencidesign_customizer_css() {
    ?>
    <style type="text/css">
		<?php
		if( get_theme_mod( 'penci_font_for_title' ) && 'Oswald' != get_theme_mod( 'penci_font_for_title' ) ) {
			$font_title = get_theme_mod( 'penci_font_for_title' );
			if( !in_array( $font_title, penci_font_browser() ) ) {
				$title_font_replace = str_replace( ' ', '+', $font_title );
		?>
			@import url(http://fonts.googleapis.com/css?family=<?php echo $title_font_replace; ?>);
			<?php } ?>
		h1, h2, h3, h4, h5, h6, #navigation .menu li a, #sidebar-nav .menu li a, .show-search #searchform input#s, .penci-slider .pencislider-container .pencislider-content .pencislider-title, .penci-slider .pencislider-container .pencislider-content .pencislider-button, .standard-main-content .cat a, .standard-post-entry a.more-link, .header-classic > .cat a, .penci-grid li .item .cat a,
		.penci-masonry .item-masonry .cat a, .post-header .cat a, .post-tags > span, .post-tags a, .post-share .share-title, .author-content h5, .post-pagination span, .post-pagination h5, .post-box-title, .penci-countdown .countdown-amount, .penci-countdown .countdown-period, .penci-pagination a, #footer-copyright, #sidebar .widget-title, .widget ul li, #searchform input#s,
		.widget .tagcloud a, #wp-calendar caption, .widget ul.side-newsfeed li .side-item .side-item-text h4 a, .footer-widget-wrapper .widget-social a span, .mc4wp-form input, .widget form input, .thecomment .comment-text span.author, .thecomment .comment-text span.author a, .post-comments span.reply a, #respond h3, #respond label, .wpcf7 label, #respond input, .wpcf7 input, #respond textarea,
		.wpcf7 textarea, #respond #submit, .wpcf7 input[type="submit"], .archive-box span, .archive-box h1, .wp-caption, .gallery .gallery-caption, .error-404 .go-back-home a, .penci-portfolio-filter ul li a, .portfolio-overlay-content .portfolio-short .portfolio-title a { font-family: <?php echo $font_title; ?>, sans-serif;  }
		<?php
		}
		?>
		<?php
		if( get_theme_mod( 'penci_font_for_body' ) && 'Merriweather' != get_theme_mod( 'penci_font_for_body' ) ) {
			$font_body = get_theme_mod( 'penci_font_for_body' );
			if( !in_array( $font_body, penci_font_browser() ) ) {
				$body_font_replace = str_replace( ' ', '+', $font_body );
		?>
		@import url(http://fonts.googleapis.com/css?family=<?php echo $body_font_replace; ?>);
		<?php } ?>
		body, .widget ul.side-newsfeed li .side-item .side-item-text .side-item-meta { font-family: <?php echo $font_body; ?>, sans-serif;  }
		<?php
		}
		?>
		<?php if(get_theme_mod('penci_header_padding')): ?>
		#header .inner-header .container { padding:<?php echo get_theme_mod( 'penci_header_padding' ); ?>px 0; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_color_accent' ) ): ?>
		a, .author-content h5 a:hover, .post-tags > span, .author-content .author-social:hover, .post-pagination a:hover, .item-related h3 a:hover, .page-share .post-share .list-posts-share a:hover, .archive-box h1, #sidebar .widget-title span span:before, #sidebar .widget-title span span:after, .penci-portfolio-filter ul li a:hover, .header-classic > .cat, .header-classic > h2 a:hover { color:<?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.widget a:hover, .widget-social a:hover i, .header-social a:hover i, .footer-widget-wrapper .widget-social a:hover span, .header-social.sidebar-nav-social a i, .grid-post-share-box .gbox > a:hover, .grid-post-share-box .gbox .list-posts-share a:hover, .grid-post-share-box .gbox:hover > a, .grid-post-share-box .gbox a.liked .penci-grid li .item h2 a:hover, .penci-masonry .item-masonry h2 a:hover, .portfolio-overlay-content .portfolio-short .portfolio-title a:hover { color:<?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, .standard-main-content > h2 a:hover, .standard-post-entry a.more-link, .standard-share-box .sbox .list-posts-share a:hover, .standard-share-box .sbox:hover > a { color:<?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.widget .tagcloud a:hover { color:<?php echo get_theme_mod( 'penci_color_accent' ); ?>; border-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.mc4wp-form input[type="submit"], .widget form input[type="submit"], #respond #submit, .wpcf7 input[type="submit"] { border-color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.mc4wp-form input[type="submit"]:hover, .widget form input[type="submit"]:hover, #respond #submit:hover, .wpcf7 input[type="submit"]:hover,  #top-search > a, .penci-portfolio-filter ul li a:after, .portfolio-right .title-description:before { background: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		.post-header .cat, .post-header .cat a { color: <?php echo get_theme_mod( 'penci_color_accent' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_pattern_bg_color' ) ): ?>
		#header .inner-header, #widget-area, .footer-instagram h4.footer-instagram-title span, #sidebar .widget-title, .penci-homepage-title, .archive-box .title-bar, .tags-share-box, .post-title-box { background-color: <?php echo get_theme_mod( 'penci_pattern_bg_color' ); ?>; }
		<?php endif; ?>
		.pattern-grey { opacity: <?php echo get_theme_mod( 'penci_pattern_background_image_opacity' ); ?>; }
		<?php if( get_theme_mod( 'penci_main_bar_bg' ) ): ?>
		#navigation, .show-search { background: <?php echo get_theme_mod( 'penci_main_bar_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_nav_color' ) ): ?>
		#navigation .menu li a { color:  <?php echo get_theme_mod( 'penci_main_bar_nav_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_diagonal_color' ) ): ?>
		#navigation .menu > ul > li > a:after, #navigation .menu > li > a:after { background-color:  <?php echo get_theme_mod( 'penci_main_bar_diagonal_color' ); ?>;   -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_main_bar_diagonal_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_main_bar_diagonal_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_main_bar_diagonal_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_main_bar_diagonal_color' ); ?>;}
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_color_active' ) ): ?>
		#navigation .menu li a:hover, #navigation .menu > li.current_page_item > a, #navigation .menu > li.current-menu-ancestor > a, #navigation .menu > li.current-menu-item > a { color:  <?php echo get_theme_mod( 'penci_main_bar_color_active' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_bg_color' ) ): ?>
		#navigation .menu .sub-menu, #navigation .menu .children, #navigation ul.menu ul li, #navigation ul.menu ul ul li { background-color:  <?php echo get_theme_mod( 'penci_drop_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_items_border' ) ): ?>
		#navigation ul.menu ul a, #navigation .menu ul ul a { border-color:  <?php echo get_theme_mod( 'penci_drop_items_border' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_text_color' ) ): ?>
		#navigation .menu .sub-menu li a { color:  <?php echo get_theme_mod( 'penci_drop_text_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_text_hover_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories a.cat-active, #navigation .menu .sub-menu li a:hover { color:  <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>; }
		#navigation ul.menu ul a:before, #navigation .menu ul ul a:before { background-color: <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>;   -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_drop_text_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_mega_active_item_bg' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories a.cat-active { background: <?php echo get_theme_mod( 'penci_drop_mega_active_item_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_mega_active_item_border' ) ): ?>
		#navigation .penci-megamenu .penci-mega-child-categories a.cat-active { border-top-color: <?php echo get_theme_mod( 'penci_drop_mega_active_item_border' ); ?>; border-bottom-color: <?php echo get_theme_mod( 'penci_drop_mega_active_item_border' ); ?>; }
		#navigation .penci-megamenu .penci-mega-child-categories:after { background-color: <?php echo get_theme_mod( 'penci_drop_mega_active_item_border' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_drop_mega_meta_date_color' ) ): ?>
		#navigation .penci-megamenu .penci-mega-date {   color: <?php echo get_theme_mod( 'penci_drop_mega_meta_date_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_search_bg' ) ): ?>
		#top-search > a {   background: <?php echo get_theme_mod( 'penci_main_bar_search_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_search_magnify' ) ): ?>
		#top-search > a {   color: <?php echo get_theme_mod( 'penci_main_bar_search_magnify' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_main_bar_close_color' ) ): ?>
		.show-search a.close-search {   color: <?php echo get_theme_mod( 'penci_main_bar_close_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_header_social_color' ) ): ?>
		.header-social a i {   color: <?php echo get_theme_mod( 'penci_header_social_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_header_social_color_hover' ) ): ?>
		.header-social a:hover i {   color: <?php echo get_theme_mod( 'penci_header_social_color_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_header_diagonal_color' ) ): ?>
		.header-social .inner-header-social:before, .header-social .inner-header-social:after { background-color: <?php echo get_theme_mod( 'penci_header_diagonal_color' ); ?>;   -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_header_diagonal_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_header_diagonal_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_header_diagonal_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_header_diagonal_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_social_color' ) ): ?>
		.header-social.sidebar-nav-social a i {   color: <?php echo get_theme_mod( 'penci_ver_nav_social_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_social_color_hover' ) ): ?>
		.header-social.sidebar-nav-social a i:hover {   color: <?php echo get_theme_mod( 'penci_ver_nav_social_color_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_bg' ) ): ?>
		#sidebar-nav {   background: <?php echo get_theme_mod( 'penci_ver_nav_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_color' ) ): ?>
		#sidebar-nav .menu > li > a, #sidebar-nav ul .menu > li > a, #sidebar-nav .menu li a .indicator {   color: <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>; }
		#sidebar-nav .menu li a:before { background: <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>; -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_color_active' ) ): ?>
		#sidebar-nav .menu > li > a:hover, #sidebar-nav ul .menu > li > a:hover, #sidebar-nav .menu > li > a .indicator:hover, #sidebar-nav .menu > li > a:hover .indicator, #sidebar-nav ul .menu > li > a .indicator:hover, #sidebar-nav ul .menu > li > a:hover .indicator {   color: <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>; }
		#sidebar-nav .menu li a:hover:before { background: <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>; -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_color_active' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_items_border' ) ): ?>
		#sidebar-nav .menu li, #sidebar-nav ul.sub-menu {   border-color: <?php echo get_theme_mod( 'penci_ver_nav_items_border' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_drop_text_color' ) ): ?>
		#sidebar-nav ul.sub-menu li a, #sidebar-nav .menu .sub-menu li a .indicator {   color: <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>; }
		#sidebar-nav ul.sub-menu li a:before { background: <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>; -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ) ): ?>
		#sidebar-nav ul.sub-menu li a:hover, #sidebar-nav .menu .sub-menu li a .indicator:hover, #sidebar-nav .menu .sub-menu li a:hover .indicator {   color: <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>; }
		#sidebar-nav ul.sub-menu li a:hover:before { background: <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>; -webkit-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>;  -moz-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>;  -ms-box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>;  box-shadow: 5px -2px 0 <?php echo get_theme_mod( 'penci_ver_nav_drop_text_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_featured_slider_overlay_bg' ) ): ?>
		.featured-overlay-color, .penci-slider ul.slides li:after { background-color: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg' ); ?>; }
		<?php endif; ?>
		.featured-overlay-color, .penci-slider ul.slides li:after { opacity: <?php echo get_theme_mod( 'penci_featured_slider_overlay_bg_opacity' ); ?>; }
		.featured-overlay-partent, .penci-slider ul.slides li:before { opacity: <?php echo get_theme_mod( 'penci_featured_slider_overlay_pattern_opacity' ); ?>; }
		<?php if( get_theme_mod( 'penci_featured_slider_box_border_color' ) ): ?>
		.featured-carousel .featured-content .feat-text { border-color: <?php echo get_theme_mod( 'penci_featured_slider_box_border_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_featured_slider_box_bg_color' ) ): ?>
		.featured-slider-overlay { background: <?php echo get_theme_mod( 'penci_featured_slider_box_bg_color' ); ?>; }
		<?php endif; ?>
		.featured-slider-overlay { opacity: <?php echo get_theme_mod( 'penci_featured_slider_box_opacity' ); ?>; }
		<?php if( get_theme_mod( 'penci_featured_slider_title_color' ) ): ?>
		.featured-carousel .featured-content .feat-text h3 a { color: <?php echo get_theme_mod( 'penci_featured_slider_title_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_featured_slider_title_hover_color' ) ): ?>
		.featured-carousel .featured-content .feat-text h3 a:hover { color: <?php echo get_theme_mod( 'penci_featured_slider_title_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_featured_slider_meta_color' ) ): ?>
		.featured-carousel .carousel-meta span, .featured-carousel .carousel-meta .feat-author strong { color: <?php echo get_theme_mod( 'penci_featured_slider_meta_color' ); ?>; }
		.featured-carousel .carousel-meta > span:after { border-color: <?php echo get_theme_mod( 'penci_featured_slider_meta_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_featured_slider_icon_color' ) ): ?>
		.featured-carousel .carousel-meta > span:after { border-color: <?php echo get_theme_mod( 'penci_featured_slider_icon_color' ); ?>; }
		<?php endif; ?>
		<?php
		$auto_speed = get_theme_mod( 'penci_featured_slider_auto_speed' );
		if( is_numeric( $auto_speed ) ):
		$auto_speed_css = $auto_speed/1000;
		?>
		.penci-slider .pencislider-container .pencislider-title{-webkit-animation-delay: <?php echo $auto_speed_css; ?>s;-moz-animation-delay: <?php echo $auto_speed_css; ?>s;-o-animation-delay: <?php echo $auto_speed_css; ?>s;animation-delay: <?php echo $auto_speed_css; ?>s;}
		.penci-slider .pencislider-container .pencislider-caption {-webkit-animation-delay: <?php echo ($auto_speed_css + 0.2); ?>s;-moz-animation-delay: <?php echo ($auto_speed_css + 0.2); ?>s;-o-animation-delay: <?php echo ($auto_speed_css + 0.2); ?>s;animation-delay: <?php echo ($auto_speed_css + 0.2); ?>s;}
		.penci-slider .pencislider-container .pencislider-content .penci-button {-webkit-animation-delay: <?php echo ($auto_speed_css + 0.4); ?>s;-moz-animation-delay: <?php echo ($auto_speed_css + 0.4); ?>s;-o-animation-delay: <?php echo ($auto_speed_css + 0.4); ?>s;animation-delay: <?php echo ($auto_speed_css + 0.4); ?>s;}
		<?php endif; ?>
		<?php
		$penci_slider_height = get_theme_mod( 'penci_featured_penci_slider_height' );
		if( !empty( $penci_slider_height ) && is_numeric( $penci_slider_height ) ): ?>
		.featured-area .penci-slider { max-height: <?php echo $penci_slider_height; ?>px; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_icon_format_border_color' ) ): ?>
		.standard-post-image .icon-post-format { border-color: <?php echo get_theme_mod( 'penci_standard_icon_format_border_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_icon_format_color' ) ): ?>
		.standard-post-image .icon-post-format { color: <?php echo get_theme_mod( 'penci_standard_icon_format_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_box_left_bg' ) ): ?>
		.standard-content .standard-share-box { background-color: <?php echo get_theme_mod( 'penci_standard_box_left_bg' ); ?>; }
		.standard-inner-share-box:before { border-top-color: <?php echo get_theme_mod( 'penci_standard_box_left_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_box_left_icon' ) ): ?>
		.standard-content .standard-share-box .sbox > a { color: <?php echo get_theme_mod( 'penci_standard_box_left_icon' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_box_left_icon_hover' ) ): ?>
		.standard-share-box .sbox .list-posts-share a:hover, .standard-content .standard-share-box .sbox:hover > a, .standard-content .standard-share-box .sbox > a:hover, .standard-content .standard-share-box .sbox > a.liked { color: <?php echo get_theme_mod( 'penci_standard_box_left_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_title_post_color' ) ): ?>
		.header-classic > h2 a, .standard-main-content > h2 a, .penci-masonry .item-masonry.standard-masonry h2 a { color: <?php echo get_theme_mod( 'penci_standard_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_standard_accent_color' ) ): ?>
		.standard-main-content .cat, .standard-main-content .cat a, .standard-post-entry a.more-link, .standard-main-content > h2 a:hover, .header-classic > h2 a:hover, .header-classic > .cat a, .penci-masonry .standard-masonry .standard-main-content .cat a, .penci-masonry .item-masonry.standard-masonry h2 a:hover { color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
		.standard-main-content > h2:before, .header-classic > h2 a:before, .header-classic > h2 a:after { background: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; -webkit-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>;  -moz-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>;  -ms-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>;  box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
		.standard-content .post-box-meta span:after, .header-classic .post-box-meta span:after, .penci-masonry .standard-masonry .standard-content .post-box-meta span:after, .standard-content .cat > a.penci-cat-name:after, .standard-masonry .standard-content .cat > a.penci-cat-name:after  { border-color: <?php echo get_theme_mod( 'penci_standard_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_masonry_icon_format_color' ) ): ?>
		.penci-grid li .item > .thumbnail .icon-post-format, .penci-masonry .item-masonry > .thumbnail .icon-post-format { color: <?php echo get_theme_mod( 'penci_masonry_icon_format_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_masonry_box_icon' ) ): ?>
		.grid-post-share-box .gbox > a { color: <?php echo get_theme_mod( 'penci_masonry_box_icon' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_masonry_box_icon_hover' ) ): ?>
		.grid-post-share-box .gbox .list-posts-share a:hover, .grid-post-share-box .gbox a.liked, .grid-post-share-box .gbox > a:hover, .grid-post-share-box .gbox:hover > a { color: <?php echo get_theme_mod( 'penci_masonry_box_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_masonry_title_post_color' ) ): ?>
		.penci-grid li .item h2 a, .penci-masonry .item-masonry h2 a { color: <?php echo get_theme_mod( 'penci_masonry_title_post_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_masonry_accent_color' ) ): ?>
		.penci-grid li .item .cat, .penci-masonry .item-masonry .cat, .penci-grid li .item .cat a, .penci-masonry .item-masonry .cat a, .penci-grid li .item h2 a:hover, .penci-masonry .item-masonry h2 a:hover { color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; }
		.penci-grid .post-box-meta span:after, .penci-masonry .post-box-meta span:after, .penci-grid .cat > a.penci-cat-name:after, .penci-masonry .grid-masonry .cat > a.penci-cat-name:after { border-color: <?php echo get_theme_mod( 'penci_masonry_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_heading_bg' ) ): ?>
		#sidebar .widget-title { background-color: <?php echo get_theme_mod( 'penci_sidebar_heading_bg' ); ?>; }
		<?php endif; ?>
		#sidebar .pattern-grey { opacity: <?php echo get_theme_mod( 'penci_sidebar_heading_pattern_opacity' ); ?>; }
		<?php if( get_theme_mod( 'penci_sidebar_heading_color' ) ): ?>
		#sidebar .widget-title > span { color: <?php echo get_theme_mod( 'penci_sidebar_heading_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_diagonal_color' ) ): ?>
		#sidebar .widget-title span span:before, #sidebar .widget-title span span:after { color: <?php echo get_theme_mod( 'penci_sidebar_diagonal_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_accent_color' ) ): ?>
		.widget ul.side-newsfeed li .side-item .side-item-text h4 a, .widget a, .widget.widget_categories ul li, .widget.widget_archive ul li { color: <?php echo get_theme_mod( 'penci_sidebar_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_accent_hover_color' ) ): ?>
		.widget ul.side-newsfeed li .side-item .side-item-text h4 a:hover, .widget a:hover, .widget .tagcloud a:hover { color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		.widget ul.side-newsfeed li .side-item .side-image a span.count-post { background-color: <?php echo get_theme_mod( 'penci_sidebar_accent_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_social_bg' ) ): ?>
		.about-list-social a, .widget-social a i { background: <?php echo get_theme_mod( 'penci_sidebar_social_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_social_hover_bg' ) ): ?>
		.about-list-social a:hover, .widget-social a i:hover { background: <?php echo get_theme_mod( 'penci_sidebar_social_hover_bg' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_social_icon' ) ): ?>
		.about-list-social a, .widget-social a i { color: <?php echo get_theme_mod( 'penci_sidebar_social_icon' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_sidebar_social_icon_hover' ) ): ?>
		.about-list-social a:hover, .widget-social a i:hover { color: <?php echo get_theme_mod( 'penci_sidebar_social_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_widget_padding' ) ): ?>
		#widget-area { padding: <?php echo get_theme_mod( 'penci_footer_widget_padding' ); ?>px 0; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_widget_color' ) ): ?>
		.footer-widget-wrapper .widget .widget-title { color: <?php echo get_theme_mod( 'penci_footer_widget_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_copyright_bg_color' ) ): ?>
		#footer-copyright, #footer-copyright a.go-to-top { background: <?php echo get_theme_mod( 'penci_footer_copyright_bg_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_copyright_text_color' ) ): ?>
		#footer-copyright, #footer-copyright *, #footer-copyright .go-to-top i { color: <?php echo get_theme_mod( 'penci_footer_copyright_text_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_copyright_accent_color' ) ): ?>
		#footer-copyright a { color: <?php echo get_theme_mod( 'penci_footer_copyright_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_footer_copyright_accent_hover_color' ) ): ?>
		#footer-copyright a:hover, #footer-copyright a.go-to-top:hover i { color: <?php echo get_theme_mod( 'penci_footer_copyright_accent_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_cat_color' ) ): ?>
		.post-header .cat, .post-header .cat a { color: <?php echo get_theme_mod( 'penci_single_cat_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_title_color' ) ): ?>
		.post-header h1 a, .post-header h2 a, .post-header h1 { color: <?php echo get_theme_mod( 'penci_single_title_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_title_diagonal_color' ) ): ?>
		.post-header h1 span:before, .post-header h2 span:before, .post-header h1 span:after, .post-header h2 span:after { background-color: <?php echo get_theme_mod( 'penci_single_title_diagonal_color' ); ?>; -webkit-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_single_title_diagonal_color' ); ?>;  -moz-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_single_title_diagonal_color' ); ?>;  -ms-box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_single_title_diagonal_color' ); ?>;  box-shadow: 6px -2px 0 <?php echo get_theme_mod( 'penci_single_title_diagonal_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_share_icon_color' ) ): ?>
		.post-share .list-posts-share a { color: <?php echo get_theme_mod( 'penci_single_share_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_share_icon_hover_color' ) ): ?>
		.post-share .list-posts-share a:hover { color: <?php echo get_theme_mod( 'penci_single_share_icon_hover_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_single_accent_color' ) ): ?>
		.post-tags > span, .author-content h5 a:hover, .author-content .author-social:hover, .post-pagination a:hover, .item-related h3 a:hover, .post-entry blockquote:before, .post-entry blockquote cite, .post-entry blockquote .author { color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		#respond #submit, .wpcf7 input[type="submit"], .post-box-meta span:after, .container-single .cat > a.penci-cat-name:after { border-color: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		.post-entry ul li:before, #respond #submit:hover, .wpcf7 input[type="submit"]:hover { background: <?php echo get_theme_mod( 'penci_single_accent_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_layout_title_color' ) ): ?>
		.portfolio-overlay-content .portfolio-short .portfolio-title a, .text-grid-info h3 a { color: <?php echo get_theme_mod( 'penci_portfolio_layout_title_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_layout_title_hover' ) ): ?>
		.portfolio-overlay-content .portfolio-short .portfolio-title a:hover, .text-grid-info h3 a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_layout_title_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_buttons_icon_color' ) ): ?>
		.portfolio-buttons a { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_color' ); ?>; border-color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_buttons_icon_hover' ) ): ?>
		.portfolio-item .portfolio-buttons a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; border-color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; }
		.portfolio-item .portfolio-buttons a.liked > i { color: <?php echo get_theme_mod( 'penci_portfolio_buttons_icon_hover' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_layout_overlay_color' ) ): ?>
		.portfolio-overlay-background { background: <?php echo get_theme_mod( 'penci_portfolio_layout_overlay_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_layout_overlay_border_color' ) ): ?>
		.inner-item-portfolio:hover .portfolio-overlay-background { border-color: <?php echo get_theme_mod( 'penci_portfolio_layout_overlay_border_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_grid_categories_color' ) ): ?>
		.text-grid-cat, .text-grid-cat a { color: <?php echo get_theme_mod( 'penci_portfolio_grid_categories_color' ); ?>; }
		<?php endif; ?>
		<?php if( get_theme_mod( 'penci_portfolio_grid_categories_hover' ) ): ?>
		.text-grid-cat a:hover { color: <?php echo get_theme_mod( 'penci_portfolio_grid_categories_hover' ); ?>; }
		<?php endif; ?>
		<?php if(get_theme_mod( 'penci_custom_css' )) : ?>
		<?php echo get_theme_mod( 'penci_custom_css' ); ?>
		<?php endif; ?>
    </style>
    <?php
}
add_action( 'wp_head', 'pencidesign_customizer_css' );
?>