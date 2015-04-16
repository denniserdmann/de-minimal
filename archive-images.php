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

		<div class="wrapper">
		<div class="row">
		
		<?php query_posts( array('posts_per_page' => 12, 'cat' => 83, 'paged' =>get_query_var('paged') ) ); ?>

		<?php while(have_posts()) : the_post(); ?>
		
				<article id="post-<?php the_ID(); ?>" class="photos">
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<div class="inside">
	                    <?php  the_content('Lies den Rest des Artikels &raquo;'); ?>
	                    <div class="caption">
							<?php the_title(); ?>
	                    </div>
					</div><!-- end inside -->
				</a>
				
		</article> <!-- ende id artikel -->
		
		<?php endwhile; ?>
				
		<?php wp_reset_query(); ?>

		</div><!-- end row -->
		</div><!-- end wrapper -->
		<?php // pagenavi ?> 
			<?php wp_pagenavi(); ?>
		<?php // pagenavi ?>	
		
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
<?php get_footer(); ?>