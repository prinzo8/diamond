<?php
/**
 * Archivo Nocturno: funciones de presentación reutilizables y escapadas.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function zion_tattoo_mod( $key, $default = '' ) {
	return get_theme_mod( 'zion_' . $key, $default );
}

function zion_tattoo_asset( $path ) {
	return esc_url( ZION_TATTOO_URL . '/assets/' . ltrim( $path, '/' ) );
}

function zion_tattoo_placeholder_image( $class = '' ) {
	printf( '<img class="%1$s" src="%2$s" alt="%3$s" loading="lazy" />', esc_attr( $class ), zion_tattoo_asset( 'images/studio-placeholder.svg' ), esc_attr__( 'Imagen de muestra sustituible desde WordPress', 'zion-tattoo' ) );
}

function zion_tattoo_nav_fallback() {
	?>
<ul id="primary-menu" class="nav__list">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#inicio"><?php esc_html_e( 'Inicio', 'zion-tattoo' ); ?></a></li>
		<li><a href="#estudio"><?php esc_html_e( 'Estudio', 'zion-tattoo' ); ?></a></li>
		<li><a href="#tatuaje"><?php esc_html_e( 'Tatuaje', 'zion-tattoo' ); ?></a></li>
		<li><a href="#piercing"><?php esc_html_e( 'Piercing', 'zion-tattoo' ); ?></a></li>
		<li><a href="#artistas"><?php esc_html_e( 'Artistas', 'zion-tattoo' ); ?></a></li>
		<li><a href="#galeria"><?php esc_html_e( 'Galería', 'zion-tattoo' ); ?></a></li>
	</ul>
	<?php
}

function zion_tattoo_get_booking_url() {
	$phone   = '34661519571';
	$message = 'Hola, me gustaría reservar una cita en Zion Tattoo.';

	return 'https://wa.me/' . $phone . '?text=' . rawurlencode( $message );
}

function zion_tattoo_get_tattoo_styles() {
	$styles = zion_tattoo_mod( 'tattoo_styles', 'Traditional, Neo Traditional, Blackwork, Realism, Fine Line, Custom Tattoo' );
	$styles = array_filter( array_map( 'sanitize_text_field', explode( ',', $styles ) ) );
	return apply_filters( 'zion_tattoo_styles', $styles );
}

function zion_tattoo_body_style() {
	$color = zion_tattoo_mod( 'primary_color', '#1E4C4D' );
	if ( ! $color ) {
		$color = '#1E4C4D';
	}
	return '--zion-petrol:' . esc_attr( $color ) . ';';
}
