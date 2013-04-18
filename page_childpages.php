<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 * Template Name: Child Pages Template
 */
get_header(); ?>

<div id="post-<?php the_ID(); ?>">
<div class="background">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_post_thumbnail(); ?>
		
		<div class="entry classic">
			<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
            <?php comments_template(); ?>
		</div>
	<?php endwhile; endif; ?>
</div>
</div>

	<?php
		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc', 'child_of' => 2 ) );
	
		foreach( $mypages as $page ) {		
			$content = $page->post_content;
			if ( ! $content ) // Check for empty page
				continue;
	
			$content = apply_filters( 'the_content', $content );
			?>
			<div id="post-<?php echo $page->ID; ?>">
				<div class="background">
					<div class="entry">
						<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
						<?php echo $content; ?>
					</div>
				</div>
			</div>
		<?php
		}	
	?>

<?php get_footer(); ?>