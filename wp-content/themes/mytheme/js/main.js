(function( $ ) {
	$( document ).ready( function() {
		$('.carousel').carousel();
		var myElement = document.getElementById("masthead");
		var headroom  = new Headroom(myElement,{
		"offset": 580,
		"tolerance": 5});
		headroom.init(); 
	});
})(jQuery );