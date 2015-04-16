<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<?php if (have_posts()) : ?>
  <?php query_posts( array( 'paged' => get_query_var('paged') ) ); ?>
  		<?php $count=1 //if($paged < 2) { // front page ?>
			<?php while(have_posts()) : the_post(); ?>
			<?php if ($count == 1): ?>
				
			<?php endif; ?>
			
			  <?php $einruecken = get_post_meta($post->ID, "standard", true); ?>
			<article id="post-<?php the_ID(); ?>" class="post<?php if ($count == 1) echo ' first' ?>
				<?php if ( has_post_format( 'link' )) echo 'link-post' ?>">
			<div class="background">
			

			<div class="entry">
			<?php if ( has_post_format( 'link' )): ?>
			  <h2 class="<?php the_ID(); ?> linktipp"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			<?php else: ?>
			<h2 class="<?php the_ID(); ?>">
				<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php endif; ?>
			
			<aside class="sidebar">
				<div class="date"><?php the_time('j. F Y') ?></div>
				<?php if (get_comments_number()>=1 ) : ?>
				 <div class="commentcount">
				  	&middot; <?php comments_popup_link(__('Kein Kommentar'), __('1 Kommentar'), __('% Kommentare'), __('') ); ?>
				</div>
				<?php endif; ?> 
			</aside>
			
            <?php the_content('Lies den Rest des Artikels &raquo;'); ?>
</div><!-- Ende entry -->


			</div> <!-- neues Ende background  -->
			</article> <!-- ende id artikel -->
<?php $count++ ?>
		<?php endwhile; ?>
		<?php // pagenavi ?> 
			<?php wp_pagenavi(); ?>
		<?php // pagenavi ?>
		<?php // Reset Query
			  wp_reset_query(); ?>	
		<?php //endif; ?>
		<?php endif; ?>
<br class="brake" />
<?php get_footer(); ?>