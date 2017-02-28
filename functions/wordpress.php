<?php
/**
 * WP Helper Functions
 *
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;



/**
 * wp parse args deep
 *
 * @return array
 */
function myprefix_parse_args_deep( $values , $defaults )
{
   $array = wp_parse_args( $values , $defaults );

   foreach ( $array as $key => $value) {
       if(is_array($value) && isset($defaults[$key]) && is_array($defaults[$key])){
          $array[$key] = myprefix_parse_args_deep( $value , $defaults[$key] );
       }
   }

   return $array;
}
