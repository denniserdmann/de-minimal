<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
$post = $wp_query->post;
// Post Format IMAGE
if ( has_post_format( 'image' )) {
	include(TEMPLATEPATH . '/single-image.php');
// Post Format DEFAULT
} else {
	include(TEMPLATEPATH . '/single-normal.php');
} ?>