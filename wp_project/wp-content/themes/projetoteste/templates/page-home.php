<?php
/**
 * Template Name: Página Principal Institucional
 */
get_header();

?>


    <?php echo '<h1>Hello Word, <span>Lucas Chaves</span></h1>;' ?>

    <?php echo '<h2>Lorem Ipsum Dolor Sit Amet</h2>;' ?>

<?php if( have_rows('section_home') ) : while( have_rows('section_home') ) : the_row(); ?>
    <section class="section_home">
        <?php if(get_sub_field('section_home__image')) : ?>
            <img class="section_home__image" src="<?php the_sub_field('section_home__image'); ?>" alt="<?php the_sub_field('section_home__title'); ?>">
        <?php endif; ?>
        <div class="container">

            <?php if(get_sub_field('section_home__title')) : ?>
                <h1 class="section_home__title">
                    <?php the_sub_field('section_home__title'); ?>
                </h1>
            <?php endif; ?>

            <?php if(get_sub_field('section_home__subtitle')) : ?>
                <h2 class="section_home__subtitle">
                    <?php the_sub_field('section_home__subtitle'); ?>
                </h2>
            <?php endif; ?>

            <?php if( have_rows('section_home__list') ) : ?>
                <ul class="section_home__list">
                    <?php while( have_rows('section_home__list') ) : the_row(); ?>
                        <?php if(get_sub_field('section_home__link')) : ?>
                            <li>
                                <a href="<?php the_sub_field('section_home__link'); ?>" target="_blank">
                                    <?php the_sub_field('section_home__label'); ?>
                                </a>
                            </li>
                        <?php endif; ?>    
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        </div>
    </section>
<?php endwhile; endif; ?>
    
<?php if(get_field('componente_titulo')) : ?>
    <h1 class="componente_titulo">
        <?php the_field('componente_titulo'); ?>
    </h1>
<?php endif; ?>

<?php
get_footer();
