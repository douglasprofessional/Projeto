<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package projetoteste
 */
$homeId = 11;

?>
        </main>
        
        <?php if(get_field('footer_titulo', $homeId)) : ?>
            <h1 class="footer_titulo">
                <?php the_field('footer_titulo', $homeId); ?>
            </h1>
        <?php endif; ?>

        <?php wp_footer(); ?>

    </body>
</html>
