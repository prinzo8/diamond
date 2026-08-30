<?php
/**
 * Hero section.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$booking_url = zion_tattoo_get_booking_url();

$hero_image_id = absint( get_theme_mod( 'zion_hero_image', 0 ) );
$hero_image    = $hero_image_id ? wp_get_attachment_image_url( $hero_image_id, 'full' ) : '';
?>

<section class="hero" id="inicio">

	<?php if ( $hero_image ) : ?>
		<div class="hero__media" aria-hidden="true">
			<img
				src="<?php echo esc_url( $hero_image ); ?>"
				alt=""
				loading="eager"
				fetchpriority="high"
			/>
		</div>
	<?php else : ?>
		<div class="hero__placeholder" aria-hidden="true"></div>
	<?php endif; ?>

	<div class="hero__grain" aria-hidden="true"></div>

	<div class="hero__inner">

		<p class="eyebrow hero__eyebrow" data-reveal>
			<?php echo esc_html( zion_tattoo_mod( 'hero_eyebrow', 'Tarragona · Tattoo Studio' ) ); ?>
		</p>

		<h1 class="hero__title" data-reveal>
			<?php echo esc_html( zion_tattoo_mod( 'hero_title', 'Tu piel. Nuestra firma.' ) ); ?>
		</h1>

		<div class="hero__lower" data-reveal>

			<p class="hero__copy">
				<?php echo wp_kses_post( zion_tattoo_mod( 'hero_copy', 'Tatuaje, piercing y una identidad que habla por sí sola.' ) ); ?>
			</p>

			<div class="hero__buttons">

				<a
					class="button"
					href="<?php echo esc_url( $booking_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<svg class="icon icon--whatsapp" aria-hidden="true" viewBox="0 0 24 24">
						<path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.6 4.2 1.7 6L.2 24l6.4-1.7a11.8 11.8 0 0 0 5.5 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.2-3.5-8.4Zm-8.4 18.1h-.1c-1.7 0-3.4-.5-4.8-1.3l-.3-.2-3.8 1 1-3.7-.2-.3a9.7 9.7 0 1 1 8.2 4.5Zm5.3-7.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-1 1.2-.2.2-.4.2-.7.1-1.7-.8-2.8-1.5-3.9-3.4-.3-.5.3-.5.9-1.7.1-.2.1-.4 0-.6-.1-.2-.7-1.7-.9-2.3-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1.1-1.1 2.6 0 1.5 1.1 3 1.2 3.2.1.2 2.2 3.4 5.4 4.8.8.3 1.4.6 1.9.6.8.2 1.5.2 2 .1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.4Z"/>
					</svg>

					<?php esc_html_e( 'Reservar cita', 'zion-tattoo' ); ?>
				</a>

				<a class="button button--ghost" href="#galeria">
					<?php esc_html_e( 'Ver trabajos', 'zion-tattoo' ); ?>
					<span aria-hidden="true">↓</span>
				</a>

			</div>
		</div>

		<span class="hero__seal" aria-hidden="true">Z</span>

		<p class="hero__side-note" aria-hidden="true">
			Tinta · Metal · Piercing
		</p>

	</div>

</section>
