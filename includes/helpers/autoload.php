<?php
/**
 * Helpers Loader
 *
 * @package MyPrefix
 */


if ( !defined( 'ABSPATH' ) ) exit;



function _myprefix_helpers_loader()
{

// This file path
$fpath = realpath( dirname( __FILE__ ) );

require_once $fpath . '/functions/esc.php';
require_once $fpath . '/functions/sanitize.php';
require_once $fpath . '/functions/validate.php';
require_once $fpath . '/functions/string.php';
require_once $fpath . '/functions/html.php';
require_once $fpath . '/functions/wordpress.php';

require_once $fpath . '/classes/data.php';

}

// Load files
_myprefix_helpers_loader();
