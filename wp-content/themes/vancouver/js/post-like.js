jQuery( document ).ready( function () {
	jQuery( 'body' ).on( 'click', '.penci-post-like', function ( event ) {
		event.preventDefault();
		var $this = jQuery( this ),
			post_id = $this.data( "post_id" ),
			like_text = $this.data( "like" ),
			unlike_text = $this.data( "unlike" );
		if ( $this.hasClass( 'liked' ) ) {
			$this.removeClass( 'liked' );
			$this.prop( 'title', 'Like' );
		}
		else {
			$this.addClass( 'liked' );
			$this.prop( 'title', 'Unlike' );
		}

		jQuery.ajax( {
			type: "post",
			url : ajax_var.url,
			data: "action=penci-post-like&nonce=" + ajax_var.nonce + "&penci_post_like=&post_id=" + post_id
		} );
	} );
} );
