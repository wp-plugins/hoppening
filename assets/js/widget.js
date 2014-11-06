( function( $ ){
    function hop_init_color_picker( widget ) {
        widget.find( '.color-picker-hex' ).wpColorPicker();
    }
    function hop_on_form_update( event, widget ) {
        hop_init_color_picker( widget );
    }
    $( document ).on( 'widget-added widget-updated', hop_on_form_update );

    $( document ).ready( function() {
        $( '#widgets-right .widget:has(.color-picker-hex)' ).each( function () {
            hop_init_color_picker( $( this ) );
        } );
    } );
}( jQuery ) );