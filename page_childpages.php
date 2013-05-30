<?php
/**
 * @package WordPress
 * @subpackage DE-Minimal
 * Template Name: Child Pages Template
 */
get_header(); ?>

<div id="post-<?php the_ID(); ?>" class="post">
<div class="wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="background">
			<div class="headerimage">
				<?php the_post_thumbnail(); ?>
				
				<div id="hgroup">
					<h1><?php the_title(); ?></h1>
					<?php if (function_exists('the_subheading')) { the_subheading('<h2>', '</h2>'); } ?>							
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
	<?php 
		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc', 'parent' => $post->ID ) );
		// var $is_excerpt: boolean;

		foreach( $mypages as $page ) {		
			$content = $page->post_excerpt;
			if ( $content ) { // Check for empty page
			$is_excerpt = true;
			$content = apply_filters( 'the_content', $content );
			 } else {
			 	$is_excerpt = false;
				$content = $page->post_content;
				$content = apply_filters( 'the_content', $content );
			}
			?>
			<div id="post-<?php echo $page->ID; ?>" class="post">
				<div class="background">
					<div class="entry">
						<h2>
						<?php if($is_excerpt == true): ?>
							<a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
						<?php else: ?>
							<?php echo $page->post_title; ?>
						<?php endif; ?>
						</h2>
						<?php echo $content;?>
						
						<?php if($is_excerpt == true): ?>
							<a href="<?php echo get_page_link( $page->ID ); ?>">Weiterlesen …</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
		<?php
	 }	
	 ?>
<?php get_footer(); ?>