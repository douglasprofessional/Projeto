<?php
/**
 * Template Name: Página Sobre
 */
get_header();

?>
    <section class="section_sobre">
        <div class="container">
            <h1 class="section_sobre__title">Sobre</h1>
            <h2 class="section_sobre__subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit facilis distinctio quidem sint autem sunt, molestias quam possimus, veritatis ipsa numquam dicta itaque. Praesentium consequuntur similique illo eligendi et voluptatum?</h2>
            <p class="section_sobre__whats">Contato Whatsapp: <?php the_field('whatsapp') ?> </p>
        </div>
    </section>

    <section>
        <div class="container">
            <button type="button" class="btn btn-outline-primary">Primary</button>
            <br>
            <button type="button" class="btn btn-outline-secondary">Secondary</button>
            <br>
            <button type="button" class="btn btn-outline-success">Success</button>
            <br>
            <button type="button" class="btn btn-outline-danger">Danger</button>
            <br>
            <button type="button" class="btn btn-outline-warning">Warning</button>
            <br>
            <button type="button" class="btn btn-outline-info">Info</button>
            <br>
            <button type="button" class="btn btn-outline-light">Light</button>
            <br>
            <button type="button" class="btn btn-outline-dark">Dark</button>
        </div>
    </section>

<?php
get_footer();
