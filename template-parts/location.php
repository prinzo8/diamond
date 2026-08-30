<?php
/**
 * Archivo Nocturno: LOCATION SECTION — coordonnées visibles et cliquables.
 *
 * @package ZionTattoo
 */

$maps_url = 'https://www.google.com/maps/search/?api=1&query=Zion+Tattoo%2C+Carrer+d%27Armany%C3%A0+2%2C+43004+Tarragona%2C+Spain';

$phone = '+34 661 519 571';
$email = 'hola@ziontattoo.es';
?>

<section class="section location" id="contacto">
	<div class="section-marker" aria-hidden="true">
		<span>05</span>
		<i></i>
	</div>

	<div class="location__grid">

		<div data-reveal>
			<p class="eyebrow"><?php esc_html_e( 'Tarragona', 'zion-tattoo' ); ?></p>

			<h2><?php esc_html_e( 'Ven a vernos.', 'zion-tattoo' ); ?></h2>

			<p class="lead">
				<?php esc_html_e( 'Carrer d’Armanyà 2, 43004 Tarragona, Spain', 'zion-tattoo' ); ?>
			</p>

			<a
				class="text-link"
				target="_blank"
				rel="noopener noreferrer"
				href="<?php echo esc_url( $maps_url ); ?>"
			>
				<svg class="icon icon--location" aria-hidden="true" viewBox="0 0 24 24">
					<path d="M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
				</svg>
				<?php esc_html_e( 'Abrir en Google Maps', 'zion-tattoo' ); ?>
			</a>
		</div>

		<div class="location__facts" data-reveal>

			<div>
				<span><?php esc_html_e( 'Horario', 'zion-tattoo' ); ?></span>
				<strong>
					<?php echo esc_html( zion_tattoo_mod( 'hours', '[OPENING HOURS]' ) ); ?>
				</strong>
			</div>

			<div>
				<span><?php esc_html_e( 'Contacto', 'zion-tattoo' ); ?></span>

				<strong>
					<a href="tel:+34661519571">
						<?php echo esc_html( $phone ); ?>
					</a>

					<br />

					<a href="mailto:hola@ziontattoo.es">
						<?php echo esc_html( $email ); ?>
					</a>
				</strong>
			</div>

		</div>
	</div>
</section>
