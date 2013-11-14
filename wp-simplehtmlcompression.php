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
	$initial=strlen($buffer);
	$buffer=explode("  ", $buffer);
	$count=count ($buffer);

	for ($i = 0; $i <= $count; $i++)
	{
			$buffer[$i]=(str_replace("\t", " ", $buffer[$i]));
			$buffer[$i]=(str_replace("\n\n", "\n", $buffer[$i]));
			$buffer[$i]=(str_replace("\n", "", $buffer[$i]));
			$buffer[$i]=(str_replace("\r", "", $buffer[$i]));

			while (stristr($buffer[$i], '  '))
			{
			$buffer[$i]=(str_replace("  ", " ", $buffer[$i]));
			}
		$buffer_out.=$buffer[$i];
	}
	$buffer_out = preg_replace('/<!--(.|\s)*?-->/', '', $buffer_out);
	return $buffer_out;
}

ob_start("wp_compress_html_main");
}

add_action('get_header', 'wp_compress_html');
?>
