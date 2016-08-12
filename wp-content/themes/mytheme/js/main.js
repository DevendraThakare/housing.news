(function( $ ) {
	$( document ).ready( function() {
		window.mySwipe = Swipe(document.getElementById('main-slider'), {
			itunes: true, 
			auto: 5000
		});

		$('#main-slider .carousel-control.left').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			mySwipe.prev();
		});
		$('#main-slider .carousel-control.right').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			mySwipe.next();
		});
		var myElement = document.getElementById("masthead");
		var headroom  = new Headroom(myElement,{
			"tolerance": 5,
			onTop : function() {
				$('#masthead').removeClass('headroom--pinned');
			},
		});
		headroom.init(); 

		$('.site-header .side-menu-icon').click(function(e){
			e.stopPropagation();
			$('body').toggleClass('side-menu-shown');
		});
		$('#page').click(function(){
			$('body').removeClass('side-menu-shown');
			$('.site-header').removeClass('form-shown');
		});

		$('.site-header .search-form .search-icon').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.site-header').addClass('form-shown');
			$('.site-header .search-form input').focus();
		});
		$('.site-header .search-form input').click(function(e){
			e.stopPropagation();
		});
	});
})(jQuery );