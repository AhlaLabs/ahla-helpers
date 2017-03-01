<?php
/**
 * Data Storage Helper Class
 *
 * @package MyPrefix
 */

if ( !defined( 'ABSPATH' ) ) exit;



/**
 * Data storage class.
 *
 */
class Myprefix_Data 
{

	/**
	 * Store variables in a private array to easy control with
	 * PHP magic methods.To add the ability to use WP filters automatically
	 * when get variables.
	 *
	 * @var array
	 *
	 */
	private $data = array();


	/**
	 * Unique WP filter hooks prefix
	 *
	 * @var string
	 *
	 */
	private $hooks_prefix = null;


	//------------------------------- Constructor --------------------------------//


	/**
	 * Constructor
	 *
	 * @param string  	Unique WP filter hooks prefix (a-z0-9).
	 * @param array     Data defaults
	 */
	public function __construct( $hooks_prefix = null ,  $defaults = array() )
	{
		if( !empty($hooks_prefix) && preg_match( '/^([a-z0-9_-]+)$/' , $hooks_prefix ) )
		 $this->hooks_prefix = $hooks_prefix;
		 if( is_array($defaults) )
		 $this->data = $defaults;
	}


	//------------------------------- PHP magic methods --------------------------------//

	/**
	 * Clone
	 *
	 * A dummy magic method to prevent this class from being cloned
	 *
	 */
	public function __clone()
	{
		// don't do any thing ;)
	}

	/**
	 * Wakeup
	 *
	 * A dummy magic method to prevent this class from being unserialized
	 *
	 */
	public function __wakeup()
	{
		// don't do any thing ;)
	}

	/**
	 * Isset
	 *
	 * Magic method for checking the existence of a certain custom variable
	 *
	 */
	public function __isset( $key )
	{
		return isset( $this->data[$key] );
	}

	/**
	 * Getting
	 *
	 * Magic method for getting variables
	 *
	 */
	public function __get( $key )
	{
		// get value
		$value 	= ( isset( $this->data[$key] ) ? $this->data[$key] : null );

		// if apply_filters
		if( !empty($this->hooks_prefix) ) return apply_filters( $this->hooks_prefix.$key , $value );

		// else
	    return $value;
	}

	/**
	 * Seting
	 *
	 * Magic method for setting  variables
	 *
	 */
	public function __set( $key, $value )
	{
		$this->data[$key] = $value;
	}

	/**
	 * Unseting
	 *
	 * Magic method for unsetting variables
	 *
	 */
	public function __unset( $key )
	{
		unset( $this->data[$key] );
	}


	/**
	 * Get all default data as array , (Without filters)
	 *
	 * @return array
	 *
	 */
	public function get_defaults()
	{
		return $this->data;
	}



	/**
	 * Rest default data
	 *
	 * @param  array
	 * @return array
	 *
	 */
	public function rest_defaults( $data = array() )
	{
		$this->data = $data;
	}


}
