(function($) {
	"use strict";
	var PENCI = PENCI || {};

	/* General functions
	 ---------------------------------------------------------------*/
	PENCI.general = function() {
		// Top search
		$( '#top-search a' ).click( function () {
			$( '.show-search' ).fadeToggle();
			$( '.show-search input.search-input' ).focus();
		} );

		// Go to top
		$( '.go-to-top' ).click( function () {
			$( 'html, body' ).animate( { scrollTop: 0 }, 700 );
			return false;
		} );

		// Double Touch To Go
		if ( $().doubleTouchToGo ) {
			$( '#navigation .menu li.menu-item-has-children' ).doubleTouchToGo();
		} // doubleTouchToGo
	}

	/* Sticky main navigation
	 ---------------------------------------------------------------*/
	PENCI.main_sticky = function () {
		if ( $().sticky ) {
			var spaceTop = 0;
			if ( $( 'body' ).hasClass( 'admin-bar' ) ) {
				spaceTop = 32;
			}
			$( "nav#navigation" ).each( function () {
				$( this ).sticky( { topSpacing: spaceTop } );
			} );
		} // sticky
	}

	/* Countdown
	 ---------------------------------------------------------------*/
	PENCI.count_down = function () {
		if ( $( '.penci-countdown' ).length > 0 ) {
			var $this = $( '.penci-countdown' ),
				count_time = $this.data( 'time' );
			$( '.penci-countdown' ).countdown( count_time ).on( 'update.countdown', function ( event ) {
				var $this = $( this ).html( event.strftime( '<div class="countdown-row">'
				+ '<span class="countdown-section"><span class="countdown-amount">%-m</span><span class="countdown-period">Months</span></span>'
				+ '<span class="countdown-section"><span class="countdown-amount">%-d</span><span class="countdown-period">Days</span></span>'
				+ '<span class="countdown-section"><span class="countdown-amount">%H</span><span class="countdown-period">Hours</span></span>'
				+ '<span class="countdown-section"><span class="countdown-amount">%M</span><span class="countdown-period">Minutes</span></span>'
				+ '<span class="countdown-section"><span class="countdown-amount">%S</span><span class="countdown-period">Seconds</span></span>'
				+ '</div>') );
			} );
		}
	}

	/* Slick home page carousel featured posts
	 ---------------------------------------------------------------*/
	PENCI.carousel_homepage = function () {
		if ( $().slick ) {
			$( '.featured-carousel' ).each( function () {
				var $this = $( this ),
					autoplay = $this.data( 'auto' ),
					autotime = $this.data( 'autotime' ),
					autospeed = $this.data( 'speed' );
				if ( $this.hasClass( 'style-2' ) ) {
					$this.slick( {
						dots          : false,
						infinite      : true,
						speed         : autospeed,
						slidesToShow  : 1,
						slidesToScroll: 1,
						autoplay      : autoplay,
						autoplaySpeed : autotime,
						centerMode    : true,
						variableWidth : true,
						nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-double-right"></i></button>',
						prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-double-left"></i></button>'
					} );	// slick
				}
				else {
					$this.slick( {
						dots          : false,
						infinite      : true,
						speed         : autospeed,
						slidesToShow  : 1,
						slidesToScroll: 1,
						autoplay      : autoplay,
						autoplaySpeed : autotime,
						centerMode    : false,
						variableWidth : false,
						nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-double-right"></i></button>',
						prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-double-left"></i></button>'
					} );	// slick
				}
				$this.on( 'setPosition', function ( event, slick, direction ) {
					$this.addClass( 'loaded' );
					PENCI.carousel_fixtop();
					$(window ).load( function() {
						$this.addClass( 'loaded-done' );
					} );
				} );
			} );	// each
		}	// if slick
	}
	
	
	/* Fix top featured carousel slider
	 ---------------------------------------------------------------*/
	PENCI.carousel_fixtop = function () {
		$('.featured-carousel .featured-content' ).each( function(){
			var $this = $(this ),
				this_height = $this.height(),
				parent_height = $this.parent().height();
			var top_this = ( parent_height - this_height )/2;
			$this.css( "top", top_this + 'px' );
		} );
	}


	/* Penci Slider
	 ---------------------------------------------------------------*/
	PENCI.flexslider = function () {
		$( window ).load( function () {
			/* Load all slider */
			$( '.penci-slider' ).each( function () {
				var $this = $( this );
				$this.flexslider( {
					namespace     : "penci-",
					animation     : 'slide',
					slideshow     : $this.data( 'auto' ),
					slideshowSpeed: $this.data( 'autotime' ),
					animationSpeed: $this.data( 'speed' ),
					controlNav    : false,
					directionNav  : true,
					prevText      : '<i class="fa fa-angle-double-left"></i>',
					nextText      : '<i class="fa fa-angle-double-right"></i>',
					start         : function ( slider ) {
						$this.removeClass( 'penci-loading' );
						PENCI.fixtop();
					}
				} );
			} );
		} );
	}

	/* Fix top penci slider
	 ---------------------------------------------------------------*/
	PENCI.fixtop = function () {
		$('.penci-slider .pencislider-container' ).each( function(){
			var $this = $(this ),
				parent_slider = $this.closest('.penci-slider' ),
				this_height = $this.height(),
				parent_height = $this.parent().height();
			if( parent_slider.hasClass('fixed-height') ){
				parent_height = parent_slider.height();
			}
			var top_this = ( parent_height - this_height )/2;
			$this.css( "top", top_this + 'px' );
		} );
	}

	/* Fitvids
	 ---------------------------------------------------------------*/
	PENCI.fitvids = function() {
		// Target your .container, .wrapper, .post, etc.
		$( ".container" ).fitVids();
	}

	/* Slick slider
	 ---------------------------------------------------------------*/
	PENCI.slider = function() {
		if ( $().slick ) {
			$( '.penci-slick-slider' ).each(function(){
				var $this = $(this),
					adapheight = $this.data('auto-height');
				if( typeof adapheight === "undefined" ) { adapheight = true; }
				$this.slick({
					dots: false,
					infinite: true,
					speed: 300,
					slidesToShow: 1,
					nextArrow    : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-double-right"></i></button>',
					prevArrow    : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-double-left"></i></button>',
					adaptiveHeight: adapheight
				});	// slick

				$this.on('setPosition', function(event, slick, direction){
					$this.addClass('loaded');
				});
			});	// each
		}
	}

	/* Slick carousel
	 ---------------------------------------------------------------*/
	PENCI.carousel = function() {
		if ( $().slick ) {
			$( '.penci-carousel' ).each(function(){
				var $this = $( this ),
					slide = 3,
					autoplay = $this.data( 'auto' );
				if ( $( '.container-single' ).hasClass( 'penci_sidebar' ) ) { slide = 2; }
				$this.slick( {
					dots          : false,
					infinite      : false,
					speed         : 300,
					slidesToShow  : slide,
					slidesToScroll: 1,
					autoplay      : autoplay,
					nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-chevron-right"></i></button>',
					prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-chevron-left"></i></button>',
					responsive    : [
						{
							breakpoint: 960,
							settings  : {
								slidesToShow  : 2,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 768,
							settings  : {
								slidesToShow  : 1,
								slidesToScroll: 1
							}
						}
					]
				} );	// slick

				$this.on( 'setPosition', function ( event, slick, direction ) {
					$this.addClass( 'loaded' );
				} );
			});	// each
		}
	}

	/* Sticky sidebar
	 ----------------------------------------------------------------*/
	PENCI.sticky_sidebar = function() {
		$(window).load(function(){
			$('.penci-sticky-sidebar' ).stickyMojo({
				footerID: '#penci-end-sidebar-sticky',
				contentID: '#main'
			});
		});
	}

	/* Mobile menu responsive
	 ----------------------------------------------------------------*/
	PENCI.mobile_menu = function () {
		// Add indicator
		$( '#sidebar-nav .menu li.menu-item-has-children > a' ).append( '<u class="indicator"><i class="fa fa-angle-double-down"></i></u>' );

		// Toggle menu when click show/hide menu
		$( '#navigation .button-menu-mobile' ).on( 'click', function () {
			$( 'body' ).addClass( 'open-sidebar-nav' );
		} );

		// indicator click
		$( '#sidebar-nav .menu li a .indicator' ).on( 'click', function ( e ) {
			var $this = $( this );
			e.preventDefault();
			$this.children().toggleClass( 'fa-angle-double-up' );
			$this.parent().next().slideToggle( 'fast' );
		} );

		// Close sidebar nav
		$( '#close-sidebar-nav' ).on( 'click', function () {
			$( 'body' ).removeClass( 'open-sidebar-nav' );
		} );
	}

	/* Portfolio
	 ----------------------------------------------------------------*/
	PENCI.portfolio = function () {
		if ( $().isotope ) {
			$( '.penci-portfolio' ).each( function () {
				var $this = $( this );
				$( window ).load( function () {
					$this.isotope( {
						itemSelector    : '.portfolio-item',
						animationEngine : 'best-available',
						animationOptions: {
							duration: 250,
							queue   : false
						}
					} ); // isotope

				} ); // load

				// filter items when filter link is clicked
				$this.parent().find( '.penci-portfolio-filter' ).find( 'li' ).click( function () {
					$this.parent().find( '.penci-portfolio-filter' ).find( 'li' ).removeClass( 'active' );
					$( this ).addClass( 'active' );
					var selector = $( this ).find( "a" ).attr( 'data-filter' );
					$this.isotope( { filter: selector } );
					return false;
				} );
			} ); // each .penci-portfolio
		}	// end if isotope
	}

	/* Light box
	 ----------------------------------------------------------------*/
	PENCI.lightbox = function () {
		if ( $().magnificPopup) {
			$('a.portfolio-expand-image').magnificPopup({
				type: 'image'
			}); // magnificPopup
		} // if magnificPopup exists
	}

	/* Masonry layout
	----------------------------------------------------------------*/
	PENCI.masonry = function() {
		$(window).load(function() {
			var $masonry_container = $( '.penci-masonry' );
			if ( $masonry_container.length ) {
				$masonry_container.each( function () {
					var $this = $( this );
					// initialize isotope
					$this.isotope( {
						itemSelector      : '.item-masonry',
						transitionDuration: '.55s',
						layoutMode        : 'masonry'
					} );
				} );
			}
		});
	}

	/* Mega menu
	 ----------------------------------------------------------------*/
	PENCI.mega_menu = function () {
		$( '#navigation .penci-mega-child-categories a' ).mouseenter( function () {
			if ( !$( this ).hasClass( 'cat-active' ) ) {
				var $this = $( this ),
					$row_active = $this.data( 'id' ),
					$parentA = $this.parent().children( 'a' ),
					$parent = $this.closest( '.penci-megamenu' ),
					$rows = $this.closest( '.penci-megamenu' ).find( '.penci-mega-latest-posts' ).children( '.penci-mega-row' );
				$parentA.removeClass( 'cat-active' );
				$this.addClass( 'cat-active' );
				$rows.hide();
				$parent.find( '#' + $row_active ).fadeIn( 'slow' ).css( 'display', 'inline-block' );
			}
		} );
	}
	
	/* Video Background
	 ----------------------------------------------------------------*/
	PENCI.video_background = function() {
		var $penci_videobg = $( '#penci-header-video-bg' );
		if ( $().mb_YTPlayer && $penci_videobg.length ) {
			$(window ).load( function() {
				$("#penci-header-video-bg").mb_YTPlayer();
			} );
		}
	}

	/* Init functions
	 ---------------------------------------------------------------*/
	$(document).ready(function() {
		PENCI.general();
		PENCI.main_sticky();
		PENCI.count_down();
		PENCI.carousel_homepage();
		PENCI.flexslider();
		PENCI.fitvids();
		PENCI.slider();
		PENCI.carousel();
		PENCI.sticky_sidebar();
		PENCI.mobile_menu();
		PENCI.portfolio();
		PENCI.lightbox();
		PENCI.masonry();
		PENCI.mega_menu();
		PENCI.video_background();
		$(window ).resize( function(){ PENCI.sticky_sidebar(); PENCI.fixtop(); PENCI.carousel_fixtop(); } );
	});

})(jQuery);	// EOF