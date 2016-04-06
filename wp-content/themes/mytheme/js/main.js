(function( $ ) {
	$( document ).ready( function() {
		window.mySwipe = Swipe(document.getElementById('main-slider'));
		$('#main-slider .carousel-control.left').click(function(e){
			e.preventDefault();
			mySwipe.prev();
		});
		$('#main-slider .carousel-control.right').click(function(e){
			e.preventDefault();
			mySwipe.next();
		});
		var myElement = document.getElementById("masthead");
		var headroom  = new Headroom(myElement,{
			"tolerance": 5
		});
		headroom.init(); 
		$().focus(function(){
			
		});

	});
})(jQuery );