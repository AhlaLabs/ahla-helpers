<?php
/**
 * Data Validate Helpers
 *
 * @see https://codex.wordpress.org/Data_Validation
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;


/**
 * WP Helpers Validate list
 *                             
 */
//  is_email()
//	validate_file()


/**
 * This is not validator allways return true
 * 	
 * @return true 	
 */
function myprefix_return_true() 
{
	return true;
}



/**
 * Is one level array
 *
 * @param  array 	
 * @return bool 	
 */
function myprefix_is_one_level_array( $array ) 
{
	foreach ($array as $key => $val ) {
		if( is_array($val) ) return false;
	}
	return true;
}
