<?php
/*
Plugin Name: wp-simplehtmlcompression
Plugin URI: http://www.gorillakey.com/
Description: Removes all white space from the HTML document.
Version: 1.0
Author: Andrés Rosales
Author URI: http://www.gorillakey.com
Author Email: hello@gorillakey.com
*/

function wp_compress_html()
{
function wp_compress_html_main ($buffer)
{
	$search = array(
	'/\>[^\S ]+/s',
	'/[^\S ]+\</s',
	'/(\s)+/s'
	);
	$replace = array(
	'>',
	'<',
	'\\1'
	);

	$buffer = trim($buffer);
	$buffer = preg_replace($search, $replace, $buffer);
	$buffer = trim($buffer);
	return $buffer;
}
ob_start("wp_compress_html_main");
}
add_action('get_header', 'wp_compress_html');
?>
