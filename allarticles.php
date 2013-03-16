<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 Template Name: All-Articles
 */
get_header();?>
<div class="background">
		<?php query_posts('showposts=-1&cat=-46'); ?>
        
		<?php if (have_posts()) : ?>
		
		<div class="entry">
				<h1>Alle Artikel</h1>
				<?php get_search_form(); // hier die Suche formatieren ?>
				
				<?php if ( function_exists('wp_tag_cloud') ) : ?>
        		<div class="tagcloud">
            		<h4>Meine Tags</h4>
            		<?php wp_tag_cloud('smallest=8&largest=22'); ?>
        		</div>
        		<?php endif; ?>
			</div>
		
			<div class="artikellist">
						
		<?php $count = 1 ?><?php while(have_posts()) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" class="post">
            	<div class="entry">                   
                	<h4>
                		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                		<div class="info" style="width: 20%; float: left;">
                			<?php the_time('d.m.Y'); ?>
                			<br />
	                		<?php if (in_category( 'bilder')): ?>
	                			<div class="photo">
	                		<?php elseif (is_linked_list()): ?>
	                			<div class="link">
	                		<?php else: ?>
	                			<div class="blogpost">
	                		<?php endif; ?>
			                		<span class="icon1"><i class="icon-file-alt"></i></span>   
			                		<span class="icon2"><i class="icon-camera"></i></span>
			                		<span class="icon3"><i class="icon-star"></i></span>
	                			</div>
	                		
                		</div>        			
                			
                			<div class="title"><?php the_title(); ?></div>
                		</a>
                	</h4>	
                </div>
            </div>
            
            <?php $count = $count + 1; ?>


		<?php endwhile; ?>
        

		
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif; ?>
	
	
</div>
</div>
<?php get_footer(); ?>