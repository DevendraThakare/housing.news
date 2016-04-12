(function( $ ) {
	$( document ).ready( function() {
		window.mySwipe = Swipe(document.getElementById('main-slider'));
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
			"tolerance": 5
		});
		headroom.init(); 

		$('.site-header .side-menu-icon').click(function(e){
			e.stopPropagation();
			$('body').toggleClass('side-menu-shown');
		});
		$('#page').click(function(){
			$('body').removeClass('side-menu-shown');
			$('.site-header  .search-form').removeClass('form-shown');
		});

		$('.site-header .search-form .search-icon').click(function(e){
			e.preventDefault();
			e.stopPropagation();
			$('.site-header  .search-form').addClass('form-shown');
		});
		$('.site-header .search-form input').click(function(e){
			e.stopPropagation();
		});
	});
})(jQuery );