/**
 * Our Everest Theme — Customizer Live Preview
 *
 * Updates CSS variables in real-time when the user changes Customizer color settings.
 *
 * @package Our_Everest_Theme
 * @since   2.0.0
 */

( function ( $ ) {
	'use strict';

	var root = document.documentElement;

	wp.customize( 'oet_primary_color', function ( value ) {
		value.bind( function ( newVal ) {
			root.style.setProperty( '--primary-color', newVal );
		} );
	} );

	wp.customize( 'oet_body_bg_color', function ( value ) {
		value.bind( function ( newVal ) {
			root.style.setProperty( '--body-bg-color', newVal );
		} );
	} );

	wp.customize( 'oet_text_color', function ( value ) {
		value.bind( function ( newVal ) {
			root.style.setProperty( '--text-color', newVal );
		} );
	} );

} )( jQuery );
