<?php
/**
 * Template Name: Página contato
 */
get_header();

$sobreId = 15;

?>
    <section clas="section_contato">
        <div class="container">
            <h1 class="section_contato__title">contato</h1>
            <h2 class="section_contato__subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit facilis distinctio quidem sint autem sunt, molestias quam possimus, veritatis ipsa numquam dicta itaque. Praesentium consequuntur similique illo eligendi et voluptatum?</h2>
        </div>
    </section>

    <?php if(get_field('sobre_titulo', $sobreId)) : ?>
        <h1 class="sobre_titulo">
            <?php the_field('sobre_titulo', $sobreId); ?>
        </h1>
    <?php endif; ?>
<?php
get_footer();
