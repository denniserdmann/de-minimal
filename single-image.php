<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 */
?>
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" class="post image nopadding">
<div class="background">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 <div class="entry">
 <div class="photocontainer">
 <?php the_content(); ?>
 <aside><p><?php the_title(); ?></p><span><?php the_time('l, j. F Y') ?></span></aside>				

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php endwhile; else: ?>

		<p>Ups, keine Ergebnisse zu diesem Aufruf.</p>

<?php endif; ?>
 </div>
 </div> <!-- end entry -->
</div> <!-- end background -->
	
</article>
<?php get_footer(); ?>