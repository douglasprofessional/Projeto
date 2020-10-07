<?php
/**
 * Template Name: Página Sobre
 */
get_header();



?>

    
<?php if(get_field('sobre_titulo')) : ?>
    <h1 class="sobre_titulo">
        <?php the_field('sobre_titulo'); ?>
    </h1>
<?php endif; ?>


<?php
get_footer();
