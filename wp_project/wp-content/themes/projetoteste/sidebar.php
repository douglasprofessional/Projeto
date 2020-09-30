<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projetoteste
 */

if ( ! is_active_sidebar( 'sidebar-global' ) || ! is_active_sidebar( 'sidebar-single' ) ) {
	return;
}
?>

<?php if(is_single()) : ?>

	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-single' ); ?>
	</aside>

<?php else : ?>

	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-global' ); ?>
	</aside>

<?php endif; ?>