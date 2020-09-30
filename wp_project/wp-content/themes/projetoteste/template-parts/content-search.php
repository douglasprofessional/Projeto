<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package projetoteste
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php echo get_post_type() == 'page' ? echo __('Página') : echo __('Publicação'); ?>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div>
				<?php
					echo __('Publicado em') . ' ' . get_the_date() ?>
				<?php 
					echo __('por') . ' ' . get_the_author_meta('nickname');
				?>
			</div>
		<?php endif; ?>
	</header>

	
	<?php the_excerpt(); ?>

	<footer>
		<?php //projetoteste_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
