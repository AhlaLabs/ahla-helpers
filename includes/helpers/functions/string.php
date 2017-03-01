<?php
/**
 * String Helpers
 *
 *
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Random  string
 * 
 * @param  string   prefix
 * @return string                              
 */
function myprefix_rand( $prefix = '' )
{
	return sanitize_html_class( $prefix , 'random' ).'-'.rand( 11111 , 99999 );
}



/**
 * Encode string for backup options
 *
 * @param string
 * @return string
 */
function myprefix_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
}



/**
 * Decode string for backup options
 *
 * @param string
 * @return string
 */
function myprefix_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
}



/**
 * Camelize
 *
 * Takes multiple words separated by spaces or underscores and camelizes them
 *
 * @param	string	
 * @return	string
 */
function myprefix_camelize( $str)
{
	return strtolower($str[0]).substr(str_replace(' ', '', ucwords(preg_replace('/[\s_]+/', ' ', $str))), 1);
}



/**
 * Underscore
 *
 * Takes multiple words separated by spaces and underscores them
 *
 * @param	string	$str	Input string
 * @return	string
 */
function myprefix_underscore( $str)
{
	return preg_replace('/[\s]+/', '_', trim(MB_ENABLED ? mb_strtolower($str) : strtolower($str)));
}



/**
 * Humanize
 *
 * Takes multiple words separated by the separator and changes them to spaces
 *
 * @param	string	$str		Input string
 * @param 	string	$separator	Input separator
 * @return	string
 */
function myprefix_humanize( $str, $separator = '_')
{
	return ucwords(preg_replace('/['.preg_quote($separator).']+/', ' ', trim(MB_ENABLED ? mb_strtolower($str) : strtolower($str))));
}