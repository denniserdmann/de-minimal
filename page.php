<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 * Default Page Template
 */
get_header(); ?>
<div class="background">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="entry classic" id="post-<?php the_ID(); ?>">
		<div id="denniserdmann" class="blase">
			<h1><?php the_title(); ?></h1>
			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
            <?php comments_template(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>