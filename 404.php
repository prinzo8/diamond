<?php
/**
 * Archivo Nocturno: page 404 utile et cohérente avec le thème.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="not-found section"><p class="not-found__number" aria-hidden="true">404</p><p class="eyebrow"><?php esc_html_e( 'Página no encontrada', 'zion-tattoo' ); ?></p><h1><?php esc_html_e( 'Esta línea no forma parte del diseño.', 'zion-tattoo' ); ?></h1><p><?php esc_html_e( 'Puede que el enlace haya cambiado o que la página ya no exista.', 'zion-tattoo' ); ?></p><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Volver al inicio', 'zion-tattoo' ); ?></a></main>
<?php get_footer(); ?>

