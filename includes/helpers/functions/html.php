<?php 
/**
 * HTML Helpers
 *
 *
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;


/**
 * Generate html tag
 *
 * @param 	string $tag 		Tag name
 * @param 	array $attr 		Tag attributes
 * @param 	bool|string $end 	Append closing tag. Also accepts body content
 * @return 	string 				The tag's html
 */
function myprefix_get_html_tag( $tag ,  $attr = array() , $end = FALSE) 
{
	$html = '<'. $tag .' '. myprefix_get_html_attr( $attr , FALSE);

	if ($end === TRUE) {
		# <textarea></textarea>
		$html .= '></'. $tag .'>';
	} else if ($end === FALSE) {
		# <input/>
		$html .= '/>';
	} else {
		# <div>content</div>
		$html .= '>'. $end .'</'. $tag .'>';
	}

	return $html;
}

// echo
function myprefix_html_tag( $tag , $attr = array() , $end = FALSE) 
{
	echo myprefix_get_html_tag( $tag , $attr  , $end );
}



/**
 * Generate attributes string for html tag ( all attributes escaped by esc_attr() )
 *
 * @param  array 	$attr_array array('href' => '#', 'title' => 'Test')
 * @return string 	'href="#" title="Test"'
 */
function myprefix_get_html_attr( $attr_array ) {

	$html_attr = '';

	foreach ($attr_array as $attr_name => $attr_val) {

		if ($attr_val === FALSE || empty($attr_name) || empty($attr_val) ) {
			continue;
		}
			
		$html_attr .= $attr_name .'="'. esc_attr($attr_val) .'" ';
	}

	return $html_attr;
}

// echo
function myprefix_html_attr( $attr_array ) 
{
	echo myprefix_get_html_attr( $attr_array );
}



/**
 * Generates HTML BR tags based on number supplied
 *
 * @param	int	$count	Number of times to repeat the tag
 * @return	string
 */
function myprefix_get_html_br( $count = 1 )
{
	return str_repeat('<br />', $count);
}

// echo
function myprefix_html_br( $count = 1)
{
	echo str_repeat('<br />', $count);
}


/**
 * Generates non-breaking space entities based on number supplied
 *
 * @param	int
 * @return	string
 */
function myprefix_get_html_nbs( $num = 1 )
{
	return str_repeat('&nbsp;', $num);
}

// echo
function myprefix_html_nbs( $num = 1 )
{
	echo str_repeat('&nbsp;', $num);
}