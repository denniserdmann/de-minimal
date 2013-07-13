<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<?php if (have_posts()) : ?>
  <?php query_posts( array( 'category__not_in' => array(85), 'category_name' => 'journal, job', 'paged' => get_query_var('paged') ) ); ?>
  		<?php $count=1 //if($paged < 2) { // front page ?>
			<?php while(have_posts()) : the_post(); ?>
			  <?php $einruecken = get_post_meta($post->ID, "standard", true); ?>
			<article id="post-<?php the_ID(); ?>" class="post<?php if ($count == 1) echo ' first' ?>">
			<div class="background">
			<?php if ($count == 1): ?>
				<div id="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
						<img src="<?php echo bloginfo('stylesheet_directory')?>/images/dennis-circle-2x.png" width="105" height="110" />
					</a>
				</div>
			<?php endif; ?>

			<div class="entry">
			<?php if (is_linked_list()): ?>
			  <h2 class="<?php the_ID(); ?> linktipp"><a style="color: #B33333" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">&#9733;</a> <a href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
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
                    <?php if (is_linked_list()): ?>
				<a style="margin-bottom: 15px;" class="button" href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Weiter zum Artikel: %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">
					Linktipp ansehen
				</a>
				<?php endif; ?>
</div><!-- Ende entry -->

<?php if ($count == 4) wp_pagenavi(); ?>
			</div> <!-- neues Ende background  -->
			</article> <!-- ende id artikel -->
<?php $count++ ?>
		<?php endwhile; ?>
		
		<?php // Reset Query
			  wp_reset_query(); ?>	
		<?php //endif; ?>
		<?php endif; ?>
<br class="brake" />
<?php get_footer(); ?>