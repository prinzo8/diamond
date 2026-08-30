<?php
/**
 * Zion Tattoo — ABOUT / ESTUDIO
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_image_id  = absint( zion_tattoo_mod( 'about_image' ) );
$about_image_url = $about_image_id
	? wp_get_attachment_image_url( $about_image_id, 'full' )
	: zion_tattoo_asset( 'images/zion-about-detail.jpg' );
?>

<section class="section about" id="estudio">

	<div class="section-marker" aria-hidden="true">
		<span>01</span>
		<i></i>
	</div>

	<div class="about__layout">

		<div class="about__heading" data-reveal>
			<p class="eyebrow">
				<?php esc_html_e( 'El estudio', 'zion-tattoo' ); ?>
			</p>

			<h2>
				<?php esc_html_e( 'Hecho para las historias que eliges llevar contigo.', 'zion-tattoo' ); ?>
			</h2>
		</div>

		<div class="about__copy" data-reveal>

			<p class="lead">
				<?php esc_html_e( 'Zion Tattoo Family es un espacio de tatuaje y piercing en Tarragona donde el oficio, la escucha y el detalle guían cada cita.', 'zion-tattoo' ); ?>
			</p>

			<p>
				<?php esc_html_e( 'Creamos cada pieza de forma personalizada, cuidando el diseño, la técnica y cada detalle del proceso.', 'zion-tattoo' ); ?>
			</p>

			<a class="text-link" href="#reserva">
				<?php esc_html_e( 'Conoce el proceso', 'zion-tattoo' ); ?>
				<span aria-hidden="true">↘</span>
			</a>

		</div>

		<figure class="about__figure" data-reveal>

			<img
				class="about__image"
				src="<?php echo esc_url( $about_image_url ); ?>"
				alt="<?php esc_attr_e( 'Interior del estudio Zion Tattoo en Tarragona', 'zion-tattoo' ); ?>"
				loading="lazy"
			/>

			<figcaption>
				<?php esc_html_e( 'Zion Tattoo Family · Tarragona', 'zion-tattoo' ); ?>
			</figcaption>

		</figure>

	</div>

</section>
