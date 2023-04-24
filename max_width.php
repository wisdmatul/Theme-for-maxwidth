<?php 
/*
*
Template Name: MaxWidth
*/

get_header();?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

	
</article>


<?php get_footer();?>