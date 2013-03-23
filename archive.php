<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
?>
<?php if ( in_category('bilder') ) {
include(TEMPLATEPATH . '/archive-images.php');
} else {
	include(TEMPLATEPATH . '/archive-normal.php');

} ?>