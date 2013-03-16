<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
?>
<?php if ( in_category('lesezeichen') && !is_tag() ) {
include(TEMPLATEPATH . '/archive-bookmarks.php');
} elseif ( in_category('bilder') ) {
include(TEMPLATEPATH . '/archive-images.php');
} else {
	include(TEMPLATEPATH . '/archive-normal.php');

} ?>