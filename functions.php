<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
automatic_feed_links();
?>
<?php /* Support for post-formats */
add_theme_support( 'post-formats', array( 'aside', 'gallery','link','image','quote','status','video','audio','chat' ) ); /* Theme Support for Gallery */
/* end post-formats ?>
<?php 
/*Lies den Rest bei Excerpts*/
function new_excerpt_more($more) {
return ' &hellip; <a href="'. get_permalink($post->ID) . '">' . 'Artikel&nbsp;lesen&nbsp;&raquo;' . '</a>';
}
// Activate Excerpts for Pages
add_action('init', 'my_custom_excerpt');
	function my_custom_excerpt() {
		add_post_type_support( 'page', 'excerpt' );
	}
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');
?>
<?php /* Don't jump to #more on detail pages */
function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
/* end #more jump */ ?>
<?php // Comment Customization ?>
<?php function denniserdmann_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
<li class="kommentar" id="li-comment-<?php comment_ID(); ?>">
		<div class="avatar">
				<?php //echo get_avatar($comment,$size='60',$default='<path_to_url>'); ?>
				<div class="meta">
					<?php comment_author_link( ); ?>
					<small> schrieb am <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?> Uhr</small>
				</div>
		</div>
			<div class="content">
				<?php comment_text(); ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Dein Kommentar wurde noch nicht freigeschaltet.') ?></em>
				<?php endif; ?>
			</div>
</li>
<?php } ?>
<?php // Remove P-Tags around images
function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>|<script.*>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');
?>
<?php // Thumbnail-Support in Wordpress
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 0, 0); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 220, 9999 ); // Permalink thumbnail size
?>
<?php // Linkklassen im Tiny Editor 
function addTinyMCELinkClasses( $wp ) {
	$wp .= ',' . get_bloginfo('stylesheet_directory') . '/tinymce.css';
	return $wp;
}
if ( function_exists( 'add_filter' ) ) {
	add_filter( 'mce_css', 'addTinyMCELinkClasses' );
} ?>
<?php // Menu-Support in Theme
function register_my_menus() {
  register_nav_menus(
    array( 'footer-menu' => __( 'Footer Menu' ),
    		'header-menu' => __( 'Header Menu')
  ));
}
add_action( 'init', 'register_my_menus' );
?>
<?php // Open Graph Protocol set image
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	if(empty($first_img)){
			//Defines a default image
			$first_img = bloginfo('stylesheet_directory')."/images/dennis-circle-2x.png";
		}
	return $first_img;
}
//
// add h2 tag for subheading
add_filter( 'subheading_tags', function( $tags ) {
    $tags['br'] = array();
    return $tags;
} );
//    
// allow svg upload in media library
function svg_upload ( $svg_mime ){
  $svg_mime['svg'] = 'image/svg+xml';
	return $svg_mime;
}
add_filter( 'upload_mimes', 'svg_upload' );
//
// Backend CSS Editor Styles
function de_add_editor_styles() {
    add_editor_style( 'css/editor-style.css' );
}
add_action( 'init', 'de_add_editor_styles' );
//
// exclude Bilder from Feed
function myFilter($query) {
    if ($query->is_feed) {
        $query->set('cat','-83');
    }

return $query;
}
add_filter('pre_get_posts','myFilter');
/* 
	DE Minimal 
	Comments
*/
function de_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-avatar">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>
	<div class="comment-content">
	<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	<?php comment_text(); ?>
	</div>	
	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s'), get_comment_date() ); ?></a><?php //edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</div>
	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}
?>