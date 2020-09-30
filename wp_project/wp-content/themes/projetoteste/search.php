<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package projetoteste
 */

get_header();
?>

	<div id="blogTop" class="site-blog site-blog--search">
		<?php if ( have_posts() ) : ?>

			<header class="site-blog__header">
				<div class="container">
					<h1 class="site-blog__header-title">
						<!-- Blog -->
						<?php echo get_search_query(); ?>
					</h1>

					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">							
						<input type="search" class="search-field"
							placeholder="<?php echo esc_attr_x( 'Busca', 'placeholder' ) ?>"
							value="<?php echo get_search_query() ?>" name="s"
							title="<?php echo esc_attr_x( 'Buscar por:', 'label' ) ?>" />
						<input type="submit" class="search-submit" value="" />
					</form>
				</div>
			</header>
			
			<div class="site-blog__content">			
				<div class="container">
				
					<div class="site-blog__navigation">
						<h3 class="site-blog__navigation-title">Categorias:</h3>
						<ul class="site-blog__navigation-categories">
							<?php $categories =  get_categories();  
								foreach  ($categories as $category) {
									echo '<li><a href="'.esc_url( get_category_link( $category->term_id ) ).'">'.$category->name.'</a></li>';
								} 
							?>
						</ul>
					</div>

					<div class="site-blog__posts">					
						<div class="site-blog__posts-list">							
							<?php
								while ( have_posts() ) : the_post();
									// get_template_part( 'template-parts/content', 'search' );
									get_template_part( 'template-parts/content', get_post_type() );
								endwhile;
							?>
						</div>

						<div class="site-blog__posts-pagination">
							<?php
								the_posts_pagination( array(
									'posts_per_page' => 4,
									'prev_text' => __( '&#8249;' ),
									'next_text' => __( '&#8250;' ),
								) );
							?>
						</div>
					</div>

				</div><!-- #container -->			
			</div>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>

	<?php // get_sidebar(); ?>
				
<?php get_footer();