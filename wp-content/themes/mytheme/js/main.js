(function( $ ) {
	$( document ).ready( function() {
		$('.carousel').carousel({wrap: false});
		var timeout = null
		// $( window ).resize(function() {
		// 	if(timeout)
		// 		clearTimeout(timeout);
		// 	timeout = setTimeout(add_to_more, 400);
  			
		// });
		// add_to_more = function() {
		// 	width= $(window).width()
		// 	if(width == 1420){
				
		// 	}
		// 	console.log( $(window).width());
		// }
		$('#main-menu').click(function(){
			$('body').toggleClass('show-menu');
		});
	});
})(jQuery );