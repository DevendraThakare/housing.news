(function( $ ) {
	$( document ).ready( function() {
		$('.carousel').carousel({wrap: false});
		var myElement = document.getElementById("masthead");
		var headroom  = new Headroom(myElement,{
		"offset": 205,
		"tolerance": 5});
		headroom.init(); 
	});
})(jQuery );