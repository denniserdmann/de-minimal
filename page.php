<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 * Default Page Template
 */
get_header(); ?>

<div id="post-<?php the_ID(); ?>" class="post">
<div class="wrapper">
<div class="background">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="headerimage">
			<?php the_post_thumbnail(); ?>
			
			<div id="hgroup" style="text-align: center; position: absolute; bottom: 10%; width: 100%;">
				<h1 class="entry" style="padding-bottom: 0;"><?php the_title(); ?></h1>
			</div>
		</div>
</div>
		
		<div class="entry">
			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
            <?php //comments_template(); ?>
		</div>
		
	<?php endwhile; endif; ?>
</div>
</div>
<?php get_footer(); ?>