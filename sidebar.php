<?php
/**
 * Archivo Nocturno: zone latérale optionnelle, sans widget obligatoire.
 *
 * @package ZionTattoo
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside class="sidebar" aria-label="<?php esc_attr_e( 'Barra lateral', 'zion-tattoo' ); ?>"><?php dynamic_sidebar( 'sidebar-1' ); ?></aside>

