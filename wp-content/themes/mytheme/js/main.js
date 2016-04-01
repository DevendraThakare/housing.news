(function( $ ) {
	$( document ).ready( function() {
		// $('.carousel').carousel();
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
		// "offset": 580,
		"tolerance": 5});
		headroom.init(); 

		// tout = null;
		// offset_arr = {
		// 	'default': 580,
		// 	'1024': 500,
		// 	'768': 400,
		// 	'480': 240,
		// 	'375': 240,
		// 	'320': 200
		// }

		// $(window).resize(function() {
		// 	if(tout){
		// 		clearTimeout(tout);
		// 	}
		// 	tout = setTimeout(function() {
		// 		width = $(window).width();
		// 		offset = 580
		// 		switch (true) {
		// 			case width <= 1024:
		// 				offset = 500;
		// 				break;
		// 			case width<=768:
		// 				offset = 400;
		// 				break;
		// 			case width<=480:
		// 				offset = 240;
		// 				break;
		// 			case width<=320:
		// 				offset = 200;
		// 				break;                  
		// 			default:
		// 				offset = 580;
		// 				break; 
		// 		}
		// 		headroom.offset = offset;
		// 	}, 400);
		// });

		// $(window).trigger('resize');
	});
})(jQuery );