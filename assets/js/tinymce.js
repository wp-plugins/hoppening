(function() {
	tinymce.create('tinymce.plugins.hoppening', {
		init : function(ed, url) {
			jQuery( '#insert_hoppening_shortcode' ).live( "click", function( e ) {
				e.preventDefault();
				
				ed.execCommand(
					'mceInsertContent',
					false,
					hoppening_create_shortcode()
				);
				
				tb_remove();
			} );
			ed.addButton('hoppening', {
				title : 'Hoppening',
				image : url+'/../images/hoppening-logo.png',
				onclick : function() {
					tb_show('Hoppening', ajaxurl+'?action=hoppening_shortcode_printer');
				}
			});
		},
	});
	tinymce.PluginManager.add('hoppening', tinymce.plugins.hoppening);
})();

function hoppening_create_shortcode() {
	var inputs = jQuery('#hoppening_shortcode_generator').serializeArray();
	var shortcode = ' [hoppening ';
	for( var a in inputs ) {
		if( inputs[a].value == "" )
			continue;
			
		inputs[a].name = inputs[a].name.replace( 'hoppening_', '' );
		shortcode += ' '+inputs[a].name+'="'+inputs[a].value+'"';
	}
	
	shortcode += ' ] ';
	
	return shortcode;
}