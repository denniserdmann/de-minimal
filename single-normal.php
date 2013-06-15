<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" class="post">
<div class="background">
	<div id="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
			<img src="<?php echo bloginfo('stylesheet_directory')?>/images/dennis-circle-2x.png" width="105" height="110" />
		</a>
	</div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_post_thumbnail(); ?>
<div class="entry classic">
	<?php if (is_linked_list()): ?>
		<h1 class="<?php the_ID(); ?> linktipp">
			<a href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Weiter zum Artikel: %s'), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<span style="color: #B33333">&#9733;</span> <?php the_title(); ?>
			</a>
		</h1>
		<?php else: ?>
		<h1 class="<?php the_ID(); ?>"><?php the_title(); ?></h1>
	<?php endif; ?>

				<aside class="sidebar"><div class="date"><i class="icon-calendar"></i> <?php the_time('j. F Y') ?></div>
					<?php if (get_comments_number()>=1 ) : ?>
					 <div class="commentcount">
					  	<i class="icon-comments"></i> <?php comments_popup_link(__('Kein Kommentar'), __('1 Kommentar'), __('% Kommentare'), __('') ); ?>
					</div>
					<?php endif; ?>
					<?php the_tags('<div class="tags">Tags: ',',  ','</div>');  ?>  
				</aside>
			
				<?php the_content('Lies den Rest des Artikels &raquo;'); ?>
				<?php if (is_linked_list()): ?>
				<a class="button" href="<?php the_linked_list_link(); ?>" title="<?php printf( esc_attr__( 'Weiter zum Artikel: %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>">
					Weiter zum Artikel
				</a>
				<?php endif; ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
				<div id="authorbox">
					<div class="myavatar"><?php echo get_avatar(get_the_author_meta('user_email'), '100');?></div>
					<h6><a rel="author" href="https://profiles.google.com/110602491035334689174">&Uuml;ber <?php the_author_meta('nickname');?></a></h6>
					<p><?php the_author_meta('description');?></p>
				</div>
             <?php comments_template(); ?>
</div> <!-- end entry -->		
</div> <!-- end background -->              
	<?php endwhile; else: ?>
		<p>Ups, keine Ergebnisse zu diesem Aufruf.</p>
<?php endif; ?>
</article>
<?php get_footer(); ?>
