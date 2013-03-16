<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
get_header(); ?>
<div class="background">
	<?php if (have_posts()) : ?>
 	<div class="entry">
		<h1>Hier sind die Suchergebnisse:</h1>
		<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class() ?>>
				<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<aside class="sidebar">
					<div class="date"><i class="icon-calendar"></i> <?php the_time('j. F Y') ?></div>
					<?php if (get_comments_number()>=1 ) : ?>
					 <div class="commentcount">
					  	<i class="icon-comments"></i> <?php comments_popup_link(__('Kein Kommentar'), __('1 Kommentar'), __('% Kommentare'), __('') ); ?>
					</div>
					<?php endif; ?>
					<div class="category">Kategorie: <?php the_category(', '); ?></div>
					<?php the_tags('<div class="tags">Tags: ',',  ','</div>');  ?>  
				</aside>	
				<?php the_content('Lies den Rest des Artikels &raquo;'); ?>	
			</div>
		<?php endwhile; ?>
		<div class="navigation">
			<?php wp_pagenavi(); ?>
		</div>
	</div><!-- end entry -->
	
	<?php else : ?> <?php // if no posts ?>
		<div class="entry">
			<h1>Keine Suchergebnisse. Probiere deine Suche anzupassen.</h1>
			<?php get_search_form(); ?>
		</div><!-- end entry -->
	<?php endif; ?>
</div><!-- end background -->
<?php get_footer(); ?>