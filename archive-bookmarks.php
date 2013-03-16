<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<?php if (category_description( get_category_by_slug('category-slug')->term_id )): ?>
 <div class="cat-description">
  <h1><?php single_cat_title(); ?></h1>
 <?php echo category_description( get_category_by_slug('category-slug')->term_id ); ?> 
 </div>
 <?php endif; ?>
 
		<?php if (have_posts()) : ?>
		<?php $count = 1 ?>
		<div class="wrapper">
		<div class="row">
		
		<?php query_posts( array('posts_per_page' => 10, 'cat' => 85, 'paged' =>get_query_var('paged') ) ); ?>

		<?php while(have_posts()) : the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" class="bookmark">
				<div class="inside">						
					<h2 class="<?php the_ID(); ?>"><a style="color: #B33333" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">&#9733;</a> <a href="<?php the_linked_list_link(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="tags">tags: <?php the_tags('',',  ','');  ?></div>
                    <?php // the_content('Lies den Rest des Artikels &raquo;'); ?>
				
                   
                     
				</div><!-- end inside -->
		</article> <!-- ende id artikel -->

                        
<?php $count++ ?>

		<?php endwhile; ?>

				<?php wp_pagenavi(); ?>
				<?php wp_reset_query(); ?>

		</div><!-- end row -->
		</div><!-- end wrapper -->

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
	endif;
?>
<?php get_footer(); ?>