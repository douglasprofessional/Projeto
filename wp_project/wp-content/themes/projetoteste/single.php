<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package projetoteste
 */

get_header();
?>

	<div class="site-blog site-blog--single">
		<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			
		?>
	</div>

	<?php // get_sidebar(); ?>
				
<?php get_footer();