<?php
/**
 * Template for displaying search forms in projetoteste
 *
 * @package WordPress
 * @subpackage projetoteste
 * @since projetoteste 1.0
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="s"  placeholder="<?php _e( 'Buscar' ); ?>" />
        <button type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Buscar', 'projetoteste' ); ?>"></button>
    </form>