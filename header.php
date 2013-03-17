<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage DE-Minimal
 * @since 2013
 */ ?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="ICBM" content="54.3160057, 10.1241104" />
<meta name="geo.region" content="DE-SH" />
<meta name="geo.placename" content="Kiel" />
<meta name="geo.position" content="54.3160057;10.1241104" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.7">
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<script type="text/javascript" src="http://use.typekit.com/jmq0rie.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- TradeDoubler site verification 1728633 -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php /* -- LESS CSS -- */
  require "lib/lessphp/lessc.inc.php";
  $less = new lessc;
  //$less->checkedCompile(get_stylesheet_directory().'/style.less', get_stylesheet_directory().'/style-min.css');
  $cache = $less->cachedCompile(get_stylesheet_directory().'/de-minimal.less');
  file_put_contents(get_stylesheet_directory().'/less/compiled/style-min.css', $cache["compiled"]); ?>
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory')?>/less/compiled/style-min.css" type="text/css" media="all">
<?php /* -- END LESS CSS -- */ ?>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory')?>/tinymce.css" type="text/css" media="screen" />
<?php if (is_home()) {
 query_posts( array( 'category__not_in' => array(85), 'category_name' => 'journal,job', 'paged' => get_query_var('paged') ) );
} ?> 

<?php while(have_posts()) : the_post();?>
<?php /* used a plugin called More Fields to add custom headline, link and background css per article
		 http://wordpress.org/extend/plugins/more-fields/ */
$headlinecolor = get_post_meta($post->ID, "headlinecolor", true);
$headline = get_post_meta($post->ID, "headline", true);
$linkcolor = get_post_meta($post->ID, "linkcolor", true);
$background = get_post_meta($post->ID, "hintergrund", true);
?>
 <?php if(($linkcolor) || ($background)): ?>
<!-- Stylesheet Schleife -->
	<style type=text/css>
	  .single #post-<?php echo $post->ID ?> h1,
	.home #post-<?php echo $post->ID ?> h2,
	.archive #post-<?php echo $post->ID ?> h2
	.search #post-<?php echo $post->ID ?> h2,
	.category #post-<?php echo $post->ID ?> h2 a  {<?php echo $headline; ?> }
	  <?php if($linkcolor): ?>
	  <?php /* .single #post-<?php echo $post->ID ?> h1 {color: #<?php echo $linkcolor; ?> } */ ?>

	  #post-<?php echo $post->ID ?> a, .commentlist a {color: #<?php echo $linkcolor; ?>; }
	  #post-<?php echo $post->ID ?> p a:hover { background: #<?php echo $linkcolor; ?>; color: #fff; }
	  <?php endif; ?>
	  .postid-<?php echo $post->ID ?> .background,
	  #post-<?php echo $post->ID ?> .background { <?php echo $background; ?>}
	</style> 
<?php endif; ?>
<!-- end Stylesheet-Schleife --> 
 <?php endwhile; ?>
 <?php // Reset Query
 wp_reset_query();
 ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div id="logo">
		<a href="./" title="<?php bloginfo( 'name' ); ?>">
			<img src="<?php echo bloginfo('stylesheet_directory')?>/images/dennis-circle-2x.png" width="105" height="110" />
		</a>
	</div>
</header>