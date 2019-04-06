<?php
/**
 * Admin functions for Theme Customizer custom fonts
 * This file hooks with the bean-admin-fonts-library.php file, in order to achieve
 * custom fonts using Google Fonts.
 *
 * @package     Grille
 * @link        https://themebeans.com/themes/grille
 */

function bean_font_family( $font ) {
	$family = str_replace( ' ', '+', $font );
	return $family;
}

function bean_enqueue_fonts() {

	$default = array(
		'default',
		'Default',
		'arial',
		'Arial',
		'courier',
		'Courier',
		'verdana',
		'Verdana',
		'trebuchet',
		'Trebuchet',
		'georgia',
		'Georgia',
		'times',
		'Times',
		'tahoma',
		'Tahoma',
		'helvetica',
		'Helvetica',
	);

	$fonts = array();

	$type_select_headings = get_theme_mod( 'type_select_headings' );
	$type_select_body     = get_theme_mod( 'type_select_body' );

	if ( $type_select_headings != '' ) {
		$fonts[] = $type_select_headings;
	}
	if ( $type_select_body != '' ) {
		$fonts[] = $type_select_body;
	}

	$fonts = array_unique( $fonts );

	foreach ( $fonts as $font ) {
		if ( ! in_array( $font, $default, true ) ) {
			bean_enqueue_google_fonts( $font );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'bean_enqueue_fonts' );

function bean_enqueue_google_fonts( $font ) {
	$font = explode( ',', $font );
	$font = $font[0];

	// CUSTOM CHECKS FOR CERTAIN FONTS
	if ( $font == 'Open Sans' ) {
		$font = 'Open Sans:400,600';
	} else {
		$font = $font . ':400,700';
	}

	// FRIENDLY MOD
	$font = str_replace( ' ', '+', $font );

	// CSS ENQUEUE
	wp_enqueue_style( "bean-google-$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
} //END bean_enqueue_google_fonts($font)
