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
<?php // OPEN GRAPH PROTOCOL ?>
  <meta property="og:title" content="<?php utf8_decode(single_post_title());?>"/>
  <meta property="og:image" content="<?php if (function_exists('catch_that_image')) {echo catch_that_image(); }?>"/>
  <meta property="og:url" content="<?php echo get_permalink();?>?utm_source=social_media"/>
<?php // end OG PROTOCOL ?>
<script type="text/javascript" src="http://use.typekit.com/jmq0rie.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!-- TradeDoubler site verification 1728633 -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory')?>/style.css" type="text/css" media="all">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory')?>/tinymce.css" type="text/css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory')?>/js/master.js"></script>
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
	.page #post-<?php echo $post->ID ?> h1,
	.page #post-<?php echo $post->ID ?> h2,
	.category #post-<?php echo $post->ID ?> h2 a  {<?php echo $headline; ?> }
	  <?php if($linkcolor): ?>
	 	 #post-<?php echo $post->ID ?> a, .commentlist a {color: #<?php echo $linkcolor; ?>; }
	 	 #post-<?php echo $post->ID ?> p a:hover { background: #<?php echo $linkcolor; ?>; color: #fff; }
	  <?php endif; ?>
	  .postid-<?php echo $post->ID ?> .background,
	  #post-<?php echo $post->ID ?> .background,
	  .page #post-<?php echo $post->ID ?> .background { <?php echo $background; ?>}
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
	<div class="header-info">
		<a class="menu-open" id="offCanvasToggler" href="#"><i class="icon-reorder"></i><i class="icon-remove"></i></a>
	</div>
	<nav>
		<h1>Menü</h1>
		<?php wp_nav_menu( array('menu' => 'Headermenü', 'container' => false, 'menu_class' => 'nav_header' )); ?>
		<?php get_search_form(); // hier die Suche formatieren ?>
	</nav>
	<div class="logocontainer">
		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
				<img src="<?php echo bloginfo('stylesheet_directory')?>/images/dennis-circle-2x.png" width="105" height="110" />
			</a>
		</div>
	</div>
</header>