<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<?php if (have_posts()) : ?>
<?php $count=1 //if($paged < 2) { // front page ?>
<?php while(have_posts()) : the_post(); ?>
<?php $einruecken = get_post_meta($post->ID, "standard", true); ?>
	<article id="post-<?php the_ID(); ?>" class="post<?php if ($count == 1) echo ' first' ?>
		<?php if ( has_post_format( 'link' )) echo 'link-post' ?>">
	<div class="background">
	
	<?php if ($count == 1): ?>
		<?php if (category_description( get_category_by_slug('category-slug')->term_id )): ?>
			 <div class="cat-description">
			  <h1>Kategorie: <?php single_cat_title(); ?></h1>
			 <?php echo category_description( get_category_by_slug('category-slug')->term_id ); ?> 
			 </div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="entry">
	<?php if ( has_post_format( 'link' )): ?>
			<h2 class="<?php the_ID(); ?> linktipp">
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
				  <?php the_title(); ?>
				</a>
			</h2>
<?php else: ?>
		<h2 class="<?php the_ID(); ?>">
			<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>
	<?php endif; ?>
	<?php if (!is_linked_list()): ?>
		<aside class="sidebar"><div class="date"><?php the_time('j. F Y') ?></div>
			<?php if (get_comments_number()>=1 ) : ?>
			 <div class="commentcount">
			  	&middot; <?php comments_popup_link(__('Kein Kommentar'), __('1 Kommentar'), __('% Kommentare'), __('') ); ?>
			</div>
			<?php endif; ?>
		</aside>
	<?php endif; ?>
		<?php the_content('Lies den Rest des Artikels &raquo;'); ?>
			<?php if (is_linked_list()): ?>
				<p><a class="button" href="<?php the_linked_list_link(); ?>" title="<?php the_title_attribute(); ?>">
					Artikel ansehen
				</a></p>
				<?php endif; ?>
	</div><!-- Ende entry -->
	</div> <!-- neues Ende background  -->
</article> <!-- ende id artikel -->
		<?php $count++ ?>
		<?php endwhile; ?>
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
	endif;
?>
<?php get_footer(); ?>