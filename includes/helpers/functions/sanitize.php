<?php
/**
 * Data Sanitize Helpers
 *
 * @see https://codex.wordpress.org/Data_Validation
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;


/**
 * WP Helpers list
 *                             
 */
//  sanitize_text_field() 
//	sanitize_email()
//	sanitize_file_name()
//	sanitize_html_class()
//	sanitize_key()
//	sanitize_mime_type()
//	sanitize_option()
//	sanitize_sql_orderby()
//	sanitize_text_field()
//	sanitize_title_for_query()
//	sanitize_title_with_dashes()
//	sanitize_user()
//	sanitize_meta()
//	sanitize_term()
//	sanitize_term_field()


/**
 * Sanitize text field deep ( for array )
 *
 * @param  array 	
 * @return array 	
 */
function myprefix_sanitize_text_field_deep( $array ) 
{
	foreach ($array as $key => $val ) {

		if ( $val === FALSE || empty($val)  ) {
			continue;
		}
		
		if( is_array($val) ) $array[$key] = myprefix_sanitize_text_field_deep( $val );
		else $array[$key] = sanitize_text_field( $val );
	}

	return $array;
}



/**
 * Sanitize array keys 
 *
 * @param  array 	
 * @return array 	
 */
function myprefix_sanitize_array_keys( $array ) 
{
	$new_array = array();

	foreach ($array as $key => $val ) {

		if ( !is_string($key) ) {
			$new_array[$key] = $val;
		}else{
			$new_array[sanitize_key($key)] = $val;
		}
	}

	return $new_array;
}



/**
 * Sanitize array keys deep (for array)
 *
 * @param  array 	
 * @return array 	
 */
function myprefix_sanitize_array_keys_deep( $array ) 
{
	$array = myprefix_sanitize_array_keys( $array );

	foreach ($array as $key => $val ) {
		if( is_array($val) ) $array[$key] = myprefix_sanitize_array_keys_deep( $val );
	}

	return $array;
}