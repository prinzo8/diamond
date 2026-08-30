<?php
/**
 * Archivo Nocturno: BOOKING SECTION — appel à l’action sobre et direct.
 *
 * @package ZionTattoo
 */
?>

<section class="booking" id="reserva">
	<div class="booking__ornament" aria-hidden="true">Z</div>

	<div class="booking__content" data-reveal>
		<p class="eyebrow">
			<?php esc_html_e( 'Reserva', 'zion-tattoo' ); ?>
		</p>

		<h2>
			<?php esc_html_e( 'Una idea merece su tiempo.', 'zion-tattoo' ); ?>
		</h2>

		<p>
			<?php esc_html_e( 'Cuéntanos qué tienes en mente, dónde quieres llevarlo y cuál es tu disponibilidad. Te responderemos para preparar la cita.', 'zion-tattoo' ); ?>
		</p>

			<a class="button button--ivory" href="<?php echo esc_url( zion_tattoo_get_booking_url() ); ?>" target="_blank" rel="noopener noreferrer">
			<svg class="icon icon--whatsapp" aria-hidden="true" viewBox="0 0 24 24">
				<path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.6 4.2 1.7 6L.2 24l6.4-1.7a11.8 11.8 0 0 0 5.5 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.2-3.5-8.4Zm-8.4 18.1h-.1c-1.7 0-3.4-.5-4.8-1.3l-.3-.2-3.8 1 1-3.7-.2-.3a9.7 9.7 0 1 1 8.2 4.5Zm5.3-7.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-1 1.2-.2.2-.4.2-.7.1-1.7-.8-2.8-1.5-3.9-3.4-.3-.5.3-.5.9-1.7.1-.2.1-.4 0-.6-.1-.2-.7-1.7-.9-2.3-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1.1-1.1 2.6 0 1.5 1.1 3 1.2 3.2.1.2 2.2 3.4 5.4 4.8.8.3 1.4.5 1.9.6.8.2 1.5.2 2 .1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.4Z"/>
			</svg>
			<?php esc_html_e( 'Reservar cita', 'zion-tattoo' ); ?>
		</a>
	</div>
</section>

