<?php
/**
 * Global content width
 *
 * @param $content_width
 *
 * @since 1.0
 * @return void
 */
if ( ! isset( $content_width ) )
	$content_width = 1170;

/**
 * Theme setup
 * Hook to action after_setup_theme
 *
 * @since 1.0
 * @return void
 */
add_action( 'after_setup_theme', 'pencidesign_theme_setup' );
if ( ! function_exists( 'pencidesign_theme_setup' ) ) {
	function pencidesign_theme_setup() {

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Register navigation menu
		register_nav_menus( array(
				'main-menu' => 'Primary Menu',
			) );

		// Localization support
		load_theme_textdomain( 'pencidesign', get_template_directory() . '/languages' );

		// Feed Links
		add_theme_support( 'automatic-feed-links' );

		// Post formats - we support 4 post format: standard, gallery, video and audio
		add_theme_support( 'post-formats', array( 'standard', 'gallery', 'video', 'audio' ) );

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-thumb', 1170, 0, true );
		add_image_size( 'slider-thumb', 1170, 780, true );
		add_image_size( 'thumb', 585, 390, true );
		add_image_size( 'masonry-thumb', 440, 99999, false );
		add_image_size( 'portfolio-detail', 585, 99999, false );
	}
}

/**
 * Enqueue styles/scripts
 * Hook to action wp_enqueue_scripts
 *
 * @since 1.0
 * @return void
 */
if ( ! function_exists( 'pencidesign_load_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'pencidesign_load_scripts' );
	function pencidesign_load_scripts() {

		// Enqueue style
		wp_enqueue_style( 'penci_style', get_stylesheet_directory_uri() . '/style.css', array(), '2.3.4' );

		// Enqueue script
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/js/libs-script.min.js', array('jquery'), '2.3.4', true );
		wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '2.3.4', true );
		wp_enqueue_script( 'penci_ajax_like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '2.3.4', true );
		wp_localize_script( 'penci_ajax_like_post', 'ajax_var', array(
				'url' => admin_url( 'admin-ajax.php' ),
				'nonce' => wp_create_nonce( 'ajax-nonce' )
			)
		);

		// js for comments
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

	}
}

/**
 * Enqueue styles/scripts
 * Hook to action wp_enqueue_scripts
 *
 * @since 2.0
 * @return void
 */
if ( ! function_exists( 'pencidesign_load_admin_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'pencidesign_load_admin_scripts' );
	function pencidesign_load_admin_scripts() {

		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/css/admin.css' );
		wp_enqueue_script( 'opts-field-upload-js', get_template_directory_uri() . '/js/field_upload.js', array( 'jquery' ), '1.0', true );
		wp_enqueue_media();
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script( 'penci-opts-color-js', get_template_directory_uri() . '/js/field_color.js', array('wp-color-picker'), '1.0', true );
		wp_enqueue_script( 'jquery-ui-sortable', array( 'jquery' ) );
		wp_enqueue_script( 'reorder-slides', get_template_directory_uri() . '/js/reorder.js', array( 'jquery' ), false, '1.0' );
	}
}

/**
 * Include google fonts
 *
 * @since 2.0
 * @return array list $google_fonts_array
 */
if ( ! function_exists( 'pencislider_google_fonts' ) ) {
	function pencislider_google_fonts() {
		$fonts = 'ABeeZee,Abel,Abril Fatface,Aclonica,Acme,Actor,Adamina,Advent Pro,Aguafina Script,Akronim,Aladin,Aldrich,Alef,Alegreya,Alegreya SC,Alegreya Sans,Alegreya Sans SC,Alex Brush,Alfa Slab One,Alice,Alike,Alike Angular,Allan,Allerta,Allerta Stencil,Allura,Almendra,Almendra Display,Almendra SC,Amarante,Amaranth,Amatic SC,Amethysta,Anaheim,Andada,Andika,Angkor,Annie Use Your Telescope,Anonymous Pro,Antic,Antic Didone,Antic Slab,Anton,Arapey,Arbutus,Arbutus Slab,Architects Daughter,Archivo Black,Archivo Narrow,Arimo,Arizonia,Armata,Artifika,Arvo,Asap,Asset,Astloch,Asul,Atomic Age,Aubrey,Audiowide,Autour One,Average,Average Sans,Averia Gruesa Libre,Averia Libre,Averia Sans Libre,Averia Serif Libre,Bad Script,Balthazar,Bangers,Basic,Battambang,Baumans,Bayon,Belgrano,Belleza,BenchNine,Bentham,Berkshire Swash,Bevan,Bigelow Rules,Bigshot One,Bilbo,Bilbo Swash Caps,Bitter,Black Ops One,Bokor,Bonbon,Boogaloo,Bowlby One,Bowlby One SC,Brawler,Bree Serif,Bubblegum Sans,Bubbler One,Buda,Buenard,Butcherman,Butterfly Kids,Cabin,Cabin Condensed,Cabin Sketch,Caesar Dressing,Cagliostro,Calligraffitti,Cambo,Candal,Cantarell,Cantata One,Cantora One,Capriola,Cardo,Carme,Carrois Gothic,Carrois Gothic SC,Carter One,Caudex,Cedarville Cursive,Ceviche One,Changa One,Chango,Chau Philomene One,Chela One,Chelsea Market,Chenla,Cherry Cream Soda,Cherry Swash,Chewy,Chicle,Chivo,Cinzel,Cinzel Decorative,Clicker Script,Coda,Coda Caption,Codystar,Combo,Comfortaa,Coming Soon,Concert One,Condiment,Content,Contrail One,Convergence,Cookie,Copse,Corben,Courgette,Cousine,Coustard,Covered By Your Grace,Crafty Girls,Creepster,Crete Round,Crimson Text,Croissant One,Crushed,Cuprum,Cutive,Cutive Mono,Damion,Dancing Script,Dangrek,Dawning of a New Day,Days One,Delius,Delius Swash Caps,Delius Unicase,Della Respira,Denk One,Devonshire,Didact Gothic,Diplomata,Diplomata SC,Domine,Donegal One,Doppio One,Dorsa,Dosis,Dr Sugiyama,Droid Sans,Droid Sans Mono,Droid Serif,Duru Sans,Dynalight,EB Garamond,Eagle Lake,Eater,Economica,Ek Mukta,Electrolize,Elsie,Elsie Swash Caps,Emblema One,Emilys Candy,Engagement,Englebert,Enriqueta,Erica One,Esteban,Euphoria Script,Ewert,Exo,Exo 2,Expletus Sans,Fanwood Text,Fascinate,Fascinate Inline,Faster One,Fasthand,Fauna One,Federant,Federo,Felipa,Fenix,Finger Paint,Fira Mono,Fira Sans,Fjalla One,Fjord One,Flamenco,Flavors,Fondamento,Fontdiner Swanky,Forum,Francois One,Freckle Face,Fredericka the Great,Fredoka One,Freehand,Fresca,Frijole,Fruktur,Fugaz One,GFS Didot,GFS Neohellenic,Gabriela,Gafata,Galdeano,Galindo,Gentium Basic,Gentium Book Basic,Geo,Geostar,Geostar Fill,Germania One,Gilda Display,Give You Glory,Glass Antiqua,Glegoo,Gloria Hallelujah,Goblin One,Gochi Hand,Gorditas,Goudy Bookletter 1911,Graduate,Grand Hotel,Gravitas One,Great Vibes,Griffy,Gruppo,Gudea,Habibi,Halant,Hammersmith One,Hanalei,Hanalei Fill,Handlee,Hanuman,Happy Monkey,Headland One,Henny Penny,Herr Von Muellerhoff,Hind,Holtwood One SC,Homemade Apple,Homenaje,IM Fell DW Pica,IM Fell DW Pica SC,IM Fell Double Pica,IM Fell Double Pica SC,IM Fell English,IM Fell English SC,IM Fell French Canon,IM Fell French Canon SC,IM Fell Great Primer,IM Fell Great Primer SC,Iceberg,Iceland,Imprima,Inconsolata,Inder,Indie Flower,Inika,Irish Grover,Istok Web,Italiana,Italianno,Jacques Francois,Jacques Francois Shadow,Jim Nightshade,Jockey One,Jolly Lodger,Josefin Sans,Josefin Slab,Joti One,Judson,Julee,Julius Sans One,Junge,Jura,Just Another Hand,Just Me Again Down Here,Kalam,Kameron,Kantumruy,Karla,Karma,Kaushan Script,Kavoon,Kdam Thmor,Keania One,Kelly Slab,Kenia,Khand,Khmer,Kite One,Knewave,Kotta One,Koulen,Kranky,Kreon,Kristi,Krona One,La Belle Aurore,Laila,Lancelot,Lato,League Script,Leckerli One,Ledger,Lekton,Lemon,Libre Baskerville,Life Savers,Lilita One,Lily Script One,Limelight,Linden Hill,Lobster,Lobster Two,Londrina Outline,Londrina Shadow,Londrina Sketch,Londrina Solid,Lora,Love Ya Like A Sister,Loved by the King,Lovers Quarrel,Luckiest Guy,Lusitana,Lustria,Macondo,Macondo Swash Caps,Magra,Maiden Orange,Mako,Marcellus,Marcellus SC,Marck Script,Margarine,Marko One,Marmelad,Marvel,Mate,Mate SC,Maven Pro,McLaren,Meddon,MedievalSharp,Medula One,Megrim,Meie Script,Merienda,Merienda One,Merriweather,Merriweather Sans,Metal,Metal Mania,Metamorphous,Metrophobic,Michroma,Milonga,Miltonian,Miltonian Tattoo,Miniver,Miss Fajardose,Modern Antiqua,Molengo,Molle,Monda,Monofett,Monoton,Monsieur La Doulaise,Montaga,Montez,Montserrat,Montserrat Alternates,Montserrat Subrayada,Moul,Moulpali,Mountains of Christmas,Mouse Memoirs,Mr Bedfort,Mr Dafoe,Mr De Haviland,Mrs Saint Delafield,Mrs Sheppards,Muli,Mystery Quest,Neucha,Neuton,New Rocker,News Cycle,Niconne,Nixie One,Nobile,Nokora,Norican,Nosifer,Nothing You Could Do,Noticia Text,Noto Sans,Noto Serif,Nova Cut,Nova Flat,Nova Mono,Nova Oval,Nova Round,Nova Script,Nova Slim,Nova Square,Numans,Nunito,Odor Mean Chey,Offside,Old Standard TT,Oldenburg,Oleo Script,Oleo Script Swash Caps,Open Sans,Open Sans Condensed,Oranienbaum,Orbitron,Oregano,Orienta,Original Surfer,Oswald,Over the Rainbow,Overlock,Overlock SC,Ovo,Oxygen,Oxygen Mono,PT Mono,PT Sans,PT Sans Caption,PT Sans Narrow,PT Serif,PT Serif Caption,Pacifico,Paprika,Parisienne,Passero One,Passion One,Pathway Gothic One,Patrick Hand,Patrick Hand SC,Patua One,Paytone One,Peralta,Permanent Marker,Petit Formal Script,Petrona,Philosopher,Piedra,Pinyon Script,Pirata One,Plaster,Play,Playball,Playfair Display,Playfair Display SC,Podkova,Poiret One,Poller One,Poly,Pompiere,Pontano Sans,Port Lligat Sans,Port Lligat Slab,Prata,Preahvihear,Press Start 2P,Princess Sofia,Prociono,Prosto One,Puritan,Purple Purse,Quando,Quantico,Quattrocento,Quattrocento Sans,Questrial,Quicksand,Quintessential,Qwigley,Racing Sans One,Radley,Rajdhani,Raleway,Raleway Dots,Rambla,Rammetto One,Ranchers,Rancho,Rationale,Redressed,Reenie Beanie,Revalia,Ribeye,Ribeye Marrow,Righteous,Risque,Roboto,Roboto Condensed,Roboto Slab,Rochester,Rock Salt,Rokkitt,Romanesco,Ropa Sans,Rosario,Rosarivo,Rouge Script,Rozha One,Rubik Mono One,Rubik One,Ruda,Rufina,Ruge Boogie,Ruluko,Rum Raisin,Ruslan Display,Russo One,Ruthie,Rye,Sacramento,Sail,Salsa,Sanchez,Sancreek,Sansita One,Sarina,Sarpanch,Satisfy,Scada,Schoolbell,Seaweed Script,Sevillana,Seymour One,Shadows Into Light,Shadows Into Light Two,Shanti,Share,Share Tech,Share Tech Mono,Shojumaru,Short Stack,Siemreap,Sigmar One,Signika,Signika Negative,Simonetta,Sintony,Sirin Stencil,Six Caps,Skranji,Slackey,Smokum,Smythe,Sniglet,Snippet,Snowburst One,Sofadi One,Sofia,Sonsie One,Sorts Mill Goudy,Source Code Pro,Source Sans Pro,Source Serif Pro,Special Elite,Spicy Rice,Spinnaker,Spirax,Squada One,Stalemate,Stalinist One,Stardos Stencil,Stint Ultra Condensed,Stint Ultra Expanded,Stoke,Strait,Sue Ellen Francisco,Sunshiney,Supermercado One,Suwannaphum,Swanky and Moo Moo,Syncopate,Tangerine,Taprom,Tauri,Teko,Telex,Tenor Sans,Text Me One,The Girl Next Door,Tienne,Tinos,Titan One,Titillium Web,Trade Winds,Trocchi,Trochut,Trykker,Tulpen One,Ubuntu,Ubuntu Condensed,Ubuntu Mono,Ultra,Uncial Antiqua,Underdog,Unica One,UnifrakturCook,UnifrakturMaguntia,Unkempt,Unlock,Unna,VT323,Vampiro One,Varela,Varela Round,Vast Shadow,Vesper Libre,Vibur,Vidaloka,Viga,Voces,Volkhov,Vollkorn,Voltaire,Waiting for the Sunrise,Wallpoet,Walter Turncoat,Warnes,Wellfleet,Wendy One,Wire One,Yanone Kaffeesatz,Yellowtail,Yeseva One,Yesteryear,Zeyada'; // updated 03/12/2014

		$font_array = explode( ',', $fonts );
		foreach ( $font_array as $font ) {
			$font                      = trim( $font );
			$google_fonts_array[$font] = $font;
		}

		return $google_fonts_array;
	}
}

/**
 * Include default fonts support by browser
 *
 * @since 2.0
 * @return array list $penci_font_browser_arr
 */
if ( ! function_exists( 'penci_font_browser' ) ) {
	function penci_font_browser() {
		$penci_font_browser_arr = array();
		$penci_font_browser     = array(
			'sans-serif',
			'serif',
			'cursive',
			'monospace',
			'fantasy',
			'Arial, Helvetica, sans-serif',
			'"Arial Black", Gadget, sans-serif',
			'"Comic Sans MS", cursive, sans-serif',
			'Impact, Charcoal, sans-serif',
			'"Lucida Sans Unicode", "Lucida Grande", sans-serif',
			'Tahoma, Geneva, sans-serif',
			'"Trebuchet MS", Helvetica, sans-serif',
			'Verdana, Geneva, sans-serif',
			'Georgia, serif',
			'"Palatino Linotype", "Book Antiqua", Palatino, serif',
			'"Times New Roman", Times, serif',
			'"Courier New", Courier, monospace',
			'"Lucida Console", Monaco, monospace',
		);
		foreach ( $penci_font_browser as $font ) {
			$penci_font_browser_arr[$font] = $font;
		}

		return $penci_font_browser_arr;
	}
}

/**
 * Merge 2 array fonts to one array
 *
 * @since 2.0
 * @return array fonts $penci_font_browser_arr
 */
if ( ! function_exists( 'penci_all_fonts' ) ) {
	function penci_all_fonts() {
		return array_merge( penci_font_browser(), pencislider_google_fonts() );
	}
}

/**
 * Penci Allow HTML use in data validation wp_kses()
 *
 * @since 1.0
 * @return array HTML allow
 */
if ( ! function_exists( 'penci_allow_html' ) ) {
	function penci_allow_html() {
		$return = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
				'target'   => array()
			),
			'div'    => array(
				'class' => array(),
				'id'    => array(),
			),
			'ul'     => array(
				'class' => array(),
				'id' => array()
			),
			'ol'     => array(
				'class' => array(),
				'id' => array()
			),
			'li'     => array(
				'class' => array(),
				'id' => array()
			),
			'br'     => array(),
			'h1'     => array(
				'class' => array(),
				'id' => array()
			),
			'h2'     => array(
				'class' => array(),
				'id' => array()
			),
			'h3'     => array(
				'class' => array(),
				'id' => array()
			),
			'h4'     => array(
				'class' => array(),
				'id' => array()
			),
			'h5'     => array(
				'class' => array(),
				'id' => array()
			),
			'h6'     => array(
				'class' => array(),
				'id' => array()
			),
			'img'    => array(
				'alt'   => array(),
				'src'   => array(),
				'title'   => array()
			),
			'em'     => array(),
			'b'      => array(),
			'i'      => array(
				'class' => array(),
				'id' => array()
			),
			'strong' => array(
				'class' => array(),
				'id' => array()
			),
			'span'   => array(
				'class' => array(),
				'id'    => array()
			),
		);

		return $return;
	}
}


/**
 * Get categories array
 *
 * @since 2.2
 * @return array $categories
 */
if ( ! function_exists( 'penci_list_categories' ) ) {
	function penci_list_categories() {
		$categories = get_categories( array(
			'hide_empty' => 0
		) );

		$return = array();
		foreach ( $categories as $cat ) {
			$return[$cat->cat_name] = $cat->term_id;
		}

		return $return;
	}
}

/**
 * Fallback when menu location is not checked
 * Callback function in wp_nav_menu() on header.php
 *
 * @since 2.2
 */
if ( ! function_exists( 'penci_menu_fallback' ) ) {
	function penci_menu_fallback() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_page_menu();
		} else {
			echo '<ul class="menu"><li class="menu-item-first"><a href="' . esc_url( home_url() ) . '/wp-admin/nav-menus.php?action=locations">Create or select a menu</a></li></ul>';
		}
	}
}


/**
 * Include Files
 *
 * @since 1.0
 * @return void
 */

// Customizer
include( 'inc/customizer/controller.php' );
include( 'inc/customizer/settings.php' );
include( 'inc/customizer/style.php' );

// Modules
include( 'inc/modules/penci-render.php' );
include( 'inc/modules/penci-walker.php' );

// Widgets
include( 'inc/widgets/about_widget.php' );
include( 'inc/widgets/facebook_widget.php' );
include( 'inc/widgets/lastest_post_widget.php' );
include( 'inc/widgets/popular_post_widget.php' );
include( 'inc/widgets/social_widget.php' );
include( 'inc/widgets/quote_widget.php' );

// Like post
include( 'inc/like_post/post-like.php' );

// Meta box
include( 'inc/meta-box/meta-box.php' );

// Penci Slider @since 2.0
include( 'inc/penci-slider/penci-slider.php' );


/**
 * Register main sidebar and sidebars in footer
 *
 * @since 1.0
 * @return void
 */
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'pencidesign' ),
		'id'            => 'main-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title"><span class="pattern-grey"></span><span><span>',
		'after_title'   => '</span></span></h4>',
	) );

	for ( $i = 1; $i <= 3; $i ++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer %s', 'pencidesign' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

	register_sidebar( array(
		'name'          => __( 'Footer Instagram', 'pencidesign' ),
		'id'            => 'footer-instagram',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="footer-instagram-title"><span><strong class="pattern-grey"></strong><span class="title">',
		'after_title'   => '</span></span></h4>',
		'description'   => __( 'Only use for "Instagram Slider" widget, display instagram images on your website footer', 'pencidesign' ),
	) );

	for ( $i = 1; $i <= 6; $i ++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Custom Sidebar %s', 'wi' ), $i ),
			'id'            => 'custom-sidebar-' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title"><span class="pattern-grey"></span><span><span>',
			'after_title'   => '</span></span></h4>',
		) );
	}
}

/**
 * Pagination next post and previous post
 *
 * @since 1.0
 * @return void
 */
if ( ! function_exists( 'pencidesign_pagination' ) ) {
	function pencidesign_pagination() {
		global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) :
		?>
		<div class="penci-pagination">
			<div class="older"><?php next_posts_link( __( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'pencidesign' ) ); ?></div>
			<div class="newer"><?php previous_posts_link( __( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'pencidesign' ) ); ?></div>
		</div>
	<?php
		endif;
	}
}

/**
 * Comments template
 *
 * @since 1.0
 * @return void
 */
if ( ! function_exists( 'pencidesign_comments' ) ) {
	function pencidesign_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="thecomment">
				<div class="author-img">
					<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="comment-text">
					<span class="author"><?php echo get_comment_author_link(); ?></span>
					<span class="date"><?php printf( __( '%1$s at %2$s', 'pencidesign' ), get_comment_date(), get_comment_time() ) ?></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><i class="icon-info-sign"></i> <?php _e( 'Your comment awaiting approval', 'pencidesign' ); ?></em>
					<?php endif; ?>
					<div class="comment-content"><?php comment_text(); ?></div>
					<span class="reply">
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => __( 'Reply', 'pencidesign' ),
							'depth'      => $depth,
							'max_depth'  => $args['max_depth']
						) ), $comment->comment_ID ); ?>
						<?php edit_comment_link( __( 'Edit', 'pencidesign' ) ); ?>
					</span>
				</div>
			</div>
	<?php
	}
}

/**
 * Author socials url
 *
 * @since 1.0
 * @param array $contactmethods
 * @return new array $contactmethods
 */
if ( ! function_exists( 'pencidesign_author_social' ) ) {
	function pencidesign_author_social( $contactmethods ) {
		$contactmethods['twitter']   = 'Twitter Username';
		$contactmethods['facebook']  = 'Facebook Username';
		$contactmethods['google']    = 'Google Plus Username';
		$contactmethods['tumblr']    = 'Tumblr Username';
		$contactmethods['instagram'] = 'Instagram Username';
		$contactmethods['pinterest'] = 'Pinterest Username';

		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'pencidesign_author_social', 10, 1 );
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package       TGM-Plugin-Activation
 * @subpackage    Example
 * @version       2.5.0-alpha
 * @author        Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author        Gary Jones <gamajo@gamajo.com>
 * @copyright     Copyright (c) 2012, Thomas Griffin
 * @license       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link          https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'penci_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function penci_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'               => 'Vafpress Post Formats UI', // The plugin name
			'slug'               => 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
			'source'             => get_stylesheet_directory() . '/plugins/vafpress-post-formats-ui-develop.zip', // The plugin source
			'required'           => true, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Penci Shortcodes', // The plugin name
			'slug'               => 'penci-shortcodes', // The plugin slug (typically the folder name)
			'source'             => get_stylesheet_directory() . '/plugins/penci-shortcodes.zip', // The plugin source
			'required'           => true, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Penci Portfolio', // The plugin name
			'slug'               => 'penci-portfolio', // The plugin slug (typically the folder name)
			'source'             => get_stylesheet_directory() . '/plugins/penci-portfolio.zip', // The plugin source
			'required'           => false, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Instagram Slider Widget', // The plugin name
			'slug'               => 'instagram-slider-widget', // The plugin slug (typically the folder name)
			'required'           => false, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'Contact Form 7', // The plugin name
			'slug'               => 'contact-form-7', // The plugin slug (typically the folder name)
			'required'           => false, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'               => 'MailChimp for WordPress', // The plugin name
			'slug'               => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
			'required'           => false, // If false, the plugin is only 'recommended' instead of required
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'       => '', // If set, overrides default API URL and points to an external URL
		)

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 *
	 * Some of the strings are wrapped in a sprintf(), so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php', // Parent menu slug.
		'capability'   => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true, // Show admin notices or not.
		'dismissable'  => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false, // Automatically activate plugins after installation or not.
		'message'      => '', // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ),
			// %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop( 'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'theme-slug' ),
			'update_link'                     => _n_noop( 'Begin updating plugin', 'Begin updating plugins', 'theme-slug' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'theme-slug' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),
			// %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ),
			// %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),
			'nag_type'                        => 'updated',
			// Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}


/**
 * Featured category to display in top slider
 *
 * @since 1.0
 * @param string $separator
 * @return void
 */
if ( ! function_exists( 'penci_category' ) ) {
	function penci_category( $separator ) {
		if ( get_theme_mod( 'penci_featured_cat_hide' ) == true ) {
			$excluded_cat = get_theme_mod( 'penci_featured_cat' );
			$first_time = 1;
			foreach ( ( get_the_category() ) as $category ) {
				if ( $category->cat_ID != $excluded_cat ) {
					if ( $first_time == 1 ) {
						echo '<a class="penci-cat-name" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "pencidesign" ), esc_attr( $category->name ) ) . '" ' . '>' . $category->name . '</a>';
						$first_time = 0;
					}
					else {
						echo $separator . '<a class="penci-cat-name" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "pencidesign" ), esc_attr( $category->name ) ) . '" ' . '>' . $category->name . '</a>';
					}
				}
			}
		}
		else {
			$first_time = 1;
			foreach ( ( get_the_category() ) as $category ) {
				if ( $first_time == 1 ) {
					echo '<a class="penci-cat-name" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "pencidesign" ), esc_attr( $category->name ) ) . '" ' . '>' . $category->name . '</a>';
					$first_time = 0;
				}
				else {
					echo $separator . '<a class="penci-cat-name" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "pencidesign" ), esc_attr( $category->name ) ) . '" ' . '>' . $category->name . '</a>';
				}
			}
		}
	}
}

/**
 * Custom the_excerpt() length function
 *
 * @since 1.0
 * @param number $length of the_excerpt
 * @return new number excerpt length
 */
if ( ! function_exists( 'penci_custom_excerpt_length' ) ) {
	function penci_custom_excerpt_length( $length ) {
		$number_excerpt_length = get_theme_mod('penci_post_excerpt_length') ? get_theme_mod('penci_post_excerpt_length') : 30;
		return $number_excerpt_length;
	}

	add_filter( 'excerpt_length', 'penci_custom_excerpt_length', 999 );
}

/**
 * Custom the_excerpt() more string
 *
 * @since 1.0
 * @param string $more
 * @return new more string of the_excerpt() function
 */
if ( ! function_exists( 'penci_new_excerpt_more' ) ) {
	function penci_new_excerpt_more( $more ) {
		return '&hellip;';
	}

	add_filter( 'excerpt_more', 'penci_new_excerpt_more' );
}

/**
 * Exclude pages form search results page
 * Hook to init action
 *
 * @since 1.0
 * @return void
 */
if ( ! function_exists( 'penci_remove_pages_from_search' ) ) {
	function penci_remove_pages_from_search() {
		global $wp_post_types;
		$wp_post_types['page']->exclude_from_search = true;
	}

	add_action( 'init', 'penci_remove_pages_from_search' );
}

/**
 * Setup functions to count viewed posts to create popular posts
 *
 * @param string $postID - post ID of this post
 * @return numbers viewed posts
 * @since 1.0
 */
if ( ! function_exists( 'penci_get_post_views' ) ) {
	function penci_get_post_views( $postID ) {
		$count_key = 'penci_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );

			return "0";
		}

		return $count;
	}
}

if ( ! function_exists( 'penci_set_post_views' ) ) {
	function penci_set_post_views( $postID ) {
		$count_key = 'penci_post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, $count );
		}
		else {
			$count ++;
			update_post_meta( $postID, $count_key, $count );
		}
	}
}

/**
 * Add Facebook Open Graph
 * Hook to wp_head() action
 *
 * @since 2.3.1
 * @return void
 */

if ( ! function_exists( 'penci_add_fb_open_graph_tags' ) ) {
	add_action( 'wp_head', 'penci_add_fb_open_graph_tags' );
	function penci_add_fb_open_graph_tags() {
		if ( is_single() ) {
			global $post;
			if ( get_the_post_thumbnail( $post->ID, 'thumbnail' ) ) {
				$thumbnail_id     = get_post_thumbnail_id( $post->ID );
				$thumbnail_object = get_post( $thumbnail_id );
				$image            = $thumbnail_object->guid;
			}
			else {
				if ( ! get_theme_mod( 'penci_logo' ) ) {
					$image = get_template_directory_uri() . '/images/logo.png';
				} else {
					$image = get_theme_mod( 'penci_logo' );
				}
			}

			$description = penci_trim_excerpt_from_content( $post->post_content, $post->post_excerpt );
			$description = strip_tags( $description );
			$description = str_replace( "\"", "'", $description );
			?>
	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:description" content="<?php echo $description ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo( 'name' ); ?>" />

<?php }
	}
}

/**
 * Get custom excerpt length from the_content() function
 * Will use this function and call it in penci_add_fb_open_graph_tags() function
 *
 * @since 2.3.1
 * @return excerpt content from the_content
 */

if ( ! function_exists( 'penci_trim_excerpt_from_content' ) ) {
	function penci_trim_excerpt_from_content( $text, $excerpt ) {

		if ( $excerpt )
			return $excerpt;

		$text = strip_shortcodes( $text );

		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]&gt;', $text );
		$text           = strip_tags( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$excerpt_more   = apply_filters( 'excerpt_more', ' ' . '...' );
		$words          = preg_split( "/[\n
	 ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		}
		else {
			$text = implode( ' ', $words );
		}

		return apply_filters( 'wp_trim_excerpt', $text, $excerpt );
	}
}

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 * @since 1.0
 */
if ( ! function_exists( 'penci_wp_title' ) ) {
	function penci_wp_title( $title, $sep ) {
		global $paged, $page;
		if ( is_feed() )
			return $title;

		// Add the site name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'pencidesign' ), max( $paged, $page ) );

		return $title;
	}

	add_filter( 'wp_title', 'penci_wp_title', 10, 2 );
}

/**
 * Add hatom data
 *
 * since 2.3.1
 */
if ( ! function_exists( 'penci_add_suf_hatom_data' ) ) {
	function penci_add_suf_hatom_data( $content ) {
		$t      = get_the_modified_time( 'F jS, Y' );
		$author = get_the_author();
		$title  = get_the_title();
		if ( is_home() || is_singular() || is_archive() ) {
			$content .= '<div class="hatom-extra" style="display:none !important;visibility:hidden;"><span class="entry-title">' . $title . '</span> was last modified: <span class="updated"> ' . $t . '</span> by <span class="author vcard"><span class="fn">' . $author . '</span></span></div>';
		}

		return $content;
	}

	add_filter( 'the_content', 'penci_add_suf_hatom_data' );
}

/**
 * Remove suf hatom data in call function the_excerpt
 *
 * @since 2.3.2
 */
if ( ! function_exists( 'penci_remove_excerpt_suf_hatom_data' ) ) {
	function penci_remove_excerpt_suf_hatom_data( $excerpt ) {
		$t      = get_the_modified_time( 'F jS, Y' );
		$author = get_the_author();
		$title  = get_the_title();

		$replace = $title . ' was last modified: ' . $t . ' by ' . $author;
		return str_replace( $replace, '', $excerpt );
	}

	add_filter( 'wp_trim_excerpt', 'penci_remove_excerpt_suf_hatom_data' );
}


/**
 * Anbles shortcodes in wordpress widget text
 *
 * @since 2.3.2
 */
add_filter( 'widget_text', 'do_shortcode' );