<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<?php if (category_description( get_category_by_slug('category-slug')->term_id )): ?>
 <div class="cat-description">
  <h1>Kategorie: <?php single_cat_title(); ?></h1>
 <?php echo category_description( get_category_by_slug('category-slug')->term_id ); ?> 
 </div>
 <?php endif; ?>
 
		<?php if (have_posts()) : ?>
		<?php $count = 1 ?>
		<?php while(have_posts()) : the_post(); ?>
		<?php $einruecken = get_post_meta($post->ID, "standard", true); ?>
		<article id="post-<?php the_ID(); ?>" class="post <?php if (($einruecken=="") and (in_category( 'magazine' ))) echo 'nopadding'; ?>" >
			<div class="background">
			  <div class="entry<?php if (in_category( 'magazine' )) echo " magstyle"; ?>">
								
<?php if (is_linked_list()): ?>
  <h2 class="<?php the_ID(); ?> linktipp"><a style="color: #B33333" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">&#9733;</a> <a href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"> <?php the_title(); ?></a></h2>
  
	<?php else: ?>
		<h2 class="<?php the_ID(); ?>">
		    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		        <?php the_title(); ?>
		    </a>
		</h2>
	<?php endif; ?>
	
		<aside class="sidebar"><div class="date"><i class="icon-calendar"></i> <?php the_time('j. F Y') ?></div>
		<?php if (get_comments_number()>=1 ) : ?>
			  <div class="commentcount">
			  	<i class="icon-comments"></i> <?php comments_popup_link(__('Kein Kommentar'), __('1 Kommentar'), __('% Kommentare'), __('') ); ?>
			  </div>
			  <?php endif; ?>
			 <div class="category">Kategorie: <?php the_category(', '); ?></div>
			 <?php the_tags('<div class="tags">Tags: ',',  ','</div>');  ?>  
		</aside>

        <?php the_content('Lies den Rest des Artikels &raquo;'); ?>
                     <?php if (is_linked_list()): ?>
				<a style="margin-bottom: 15px;" class="button" href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Weiter zum Artikel: %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">
					Linktipp ansehen
				</a>
				<?php endif; ?>
                    </div><!-- Ende entry -->
                     <?php if ($count == 4) wp_pagenavi(); ?>
			</div> <!-- neues Ende background  -->
	
		</article> <!-- ende id artikel -->
            <?php //} ?>
            
<?php $count++ ?>

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
	endif;
?>
<?php get_footer(); ?>