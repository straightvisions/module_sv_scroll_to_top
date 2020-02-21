jQuery( document ).on( 'click', '.sv100_companion_modules_sv_scroll_to_top', function () {
    jQuery( 'body, html' ).stop().animate( { scrollTop: 0 }, 800, 'swing' );
});

jQuery( window ).on( 'scroll', function () {
    if ( jQuery( window ).width() > 799 ) {
		var halfHeight  = jQuery( this ).height() / 2;

		if ( jQuery( this ).scrollTop() > halfHeight ) {
			jQuery( '.sv100_companion_modules_sv_scroll_to_top' ).show( 500 );
		} else {
			jQuery( '.sv100_companion_modules_sv_scroll_to_top' ).hide( 500 );
		}
    }
});