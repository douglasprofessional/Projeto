<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package projetoteste
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_single() ) : ?>

		<?php echo 'single'; ?>

	<?php else : ?>

		<?php echo 'listagem'; ?>

	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
