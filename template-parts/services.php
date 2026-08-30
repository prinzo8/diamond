<?php
/**
 * Archivo Nocturno: SERVICES SECTION — disciplines modifiables directement dans ce fichier.
 *
 * @package ZionTattoo
 */
$styles = zion_tattoo_get_tattoo_styles();
?>
<section class="section services" id="tatuaje">
	<div class="section-marker section-marker--light" aria-hidden="true"><span>02</span><i></i></div>
	<div class="services__intro" data-reveal><p class="eyebrow"><?php esc_html_e( 'Tatuaje y piercing', 'zion-tattoo' ); ?></p><h2><?php esc_html_e( 'Lenguajes distintos. La misma precisión.', 'zion-tattoo' ); ?></h2><p><?php esc_html_e( 'Cada artista tiene una mirada propia. Cuéntanos tu idea y te orientaremos hacia el estilo y la persona adecuados.', 'zion-tattoo' ); ?></p></div>
	<div class="style-list" data-reveal><?php foreach ( $styles as $index => $style ) : ?><a class="style-list__item" href="#artistas"><span>0<?php echo esc_html( $index + 1 ); ?></span><strong><?php echo esc_html( $style ); ?></strong><i aria-hidden="true">↗</i></a><?php endforeach; ?></div>
	<div class="piercing-panel" id="piercing" data-reveal><div><p class="eyebrow"><?php esc_html_e( 'Piercing', 'zion-tattoo' ); ?></p><h3><?php esc_html_e( 'Materiales, higiene y una colocación cuidada.', 'zion-tattoo' ); ?></h3></div><p><?php esc_html_e( '[Añade la información específica del servicio de piercing, joyería y cuidados posteriores.]', 'zion-tattoo' ); ?></p><a class="button button--outline" href="#reserva"><?php esc_html_e( 'Pedir información', 'zion-tattoo' ); ?></a></div>
</section>
