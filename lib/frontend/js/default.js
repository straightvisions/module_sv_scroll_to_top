jQuery( document ).on( 'click', '.sv_100_sv_scroll_to_top', function () {
    jQuery( 'body, html' ).stop().animate( { scrollTop: 0 }, 800, 'swing' );
});

jQuery( window ).on( 'scroll', function () {
    var halfHeight  = jQuery( this ).height() / 2;

    if ( jQuery( this ).scrollTop() > halfHeight ) {
        jQuery( '.sv_100_sv_scroll_to_top' ).show( 500 );
    } else {
        jQuery( '.sv_100_sv_scroll_to_top' ).hide( 500 );
    }
});