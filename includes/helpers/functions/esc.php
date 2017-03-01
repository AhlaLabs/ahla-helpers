<?php
/**
 * Data Escape Helpers
 *
 * @see https://codex.wordpress.org/Data_Validation
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;


/**
 * WP Helpers Escape list
 *                             
 */
//  sanitize_text_field()
//	esc_html()
//	esc_textarea()
//	esc_attr()
//	esc_js()
//	esc_url()
//	esc_url_raw()
//	urlencode()
//	urlencode_deep()
//	esc_sql()
//	balanceTags()
//	tag_escape()



/**
 * Escape html deep ( for array )
 *
 * @param  array 	
 * @return array 	
 */
function myprefix_esc_html_deep( $array ) 
{

	foreach ($array as $key => $val ) {

		if ( $val === FALSE || empty($val)  ) {
			continue;
		}
		
		if( is_array($val) ) $array[$key] = myprefix_esc_html_deep( $val );
		else $array[$key] = esc_html( $val );
	}

	return $array;
}



/**
 * Escape attr deep ( for array )
 *
 * @param  array 	
 * @return array 	
 */
function myprefix_esc_attr_deep( $array ) 
{

	foreach ($array as $key => $val ) {

		if ( $val === FALSE || empty($val)  ) {
			continue;
		}
		
		if( is_array($val) ) $array[$key] = myprefix_esc_attr_deep( $val );
		else $array[$key] = esc_attr( $val );
	}

	return $array;
}

