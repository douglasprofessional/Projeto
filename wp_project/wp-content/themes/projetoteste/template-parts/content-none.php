<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package projetoteste
 */

?>

	<header class="site-blog__header">
		<div class="container">
			<h1 class="site-blog__header-title">
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
				<h2 class="site-blog__navigation-title">Categorias:</h2>
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
					<div class="content-without">
						<div class="content-without__container">
							<h2 class="content-without__title">
								Não encontramos o conteúdo desejado.
							</h2>
							<h3 class="content-without__subtitle">
								Fique à vontade para fazer uma nova busca por palavra-chave ou 
								pelo menu de categorias.
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #container -->			
	</div>

<?php
get_footer();
