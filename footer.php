<?php
/**
 * Archivo Nocturno: pied de page.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$booking_url = zion_tattoo_get_booking_url();
$instagram   = zion_tattoo_mod( 'instagram', '[INSTAGRAM URL]' );
?>

<footer class="site-footer">

	<div class="site-footer__top">

		<div class="footer-intro">
			<span class="brand__seal" aria-hidden="true">Z</span>

			<p class="eyebrow">Tarragona · Catalunya</p>

			<h2>
				<?php esc_html_e( 'La próxima pieza empieza con una conversación.', 'zion-tattoo' ); ?>
			</h2>

			<a
				class="text-link"
				href="<?php echo esc_url( $booking_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
			>
				<svg class="icon icon--whatsapp" aria-hidden="true" viewBox="0 0 24 24">
					<path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.6 4.2 1.7 6L.2 24l6.4-1.7a11.8 11.8 0 0 0 5.5 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.2-3.5-8.4Zm-8.4 18.1h-.1c-1.7 0-3.4-.5-4.8-1.3l-.3-.2-3.8 1 1-3.7-.2-.3a9.7 9.7 0 1 1 8.2 4.5Zm5.3-7.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-1 1.2-.2.2-.4.2-.7.1-1.7-.8-2.8-1.5-3.9-3.4-.3-.5.3-.5.9-1.7.1-.2.1-.4 0-.6-.1-.2-.7-1.7-.9-2.3-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1.1-1.1 2.6 0 1.5 1.1 3 1.2 3.2.1.2 2.2 3.4 5.4 4.8.8.3 1.4.5 1.9.6.8.2 1.5.2 2 .1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.4Z"/>
				</svg>

				<?php esc_html_e( 'Reservar una cita', 'zion-tattoo' ); ?>
			</a>
		</div>


		<div class="footer-details">

			<div>
				<h3><?php esc_html_e( 'Estudio', 'zion-tattoo' ); ?></h3>

				<p>
					<?php esc_html_e( 'Carrer d’Armanyà 2, 43004 Tarragona, Spain', 'zion-tattoo' ); ?>
				</p>

				<p>
					<?php echo esc_html( zion_tattoo_mod( 'hours', '[OPENING HOURS]' ) ); ?>
				</p>
			</div>


			<div>
				<h3><?php esc_html_e( 'Contacto', 'zion-tattoo' ); ?></h3>

				<p>
					<a href="tel:+34661519571">+34 661 519 571</a>
				</p>

				<p>
					<a href="mailto:hola@ziontattoo.es">hola@ziontattoo.es</a>
				</p>
			</div>


			<div>
				<h3><?php esc_html_e( 'Sigue el proceso', 'zion-tattoo' ); ?></h3>

				<?php if ( filter_var( $instagram, FILTER_VALIDATE_URL ) ) : ?>

					<p>
						<a
							href="<?php echo esc_url( $instagram ); ?>"
							target="_blank"
							rel="noopener noreferrer"
						>
							Instagram ↗
						</a>
					</p>

				<?php endif; ?>

			</div>

		</div>

	</div>


	<div class="site-footer__bottom">

		<p>
			© <?php echo esc_html( wp_date( 'Y' ) ); ?>
			<?php bloginfo( 'name' ); ?>.
		</p>

		<div class="footer-legal-links">

			<a href="#" data-legal-open="privacy">
				<?php esc_html_e( 'Política de privacidad', 'zion-tattoo' ); ?>
			</a>

			<a href="#" data-legal-open="legal">
				<?php esc_html_e( 'Aviso legal', 'zion-tattoo' ); ?>
			</a>

		</div>

	</div>

</footer>


<!-- POPUP POLÍTICA DE PRIVACIDAD -->

<dialog class="legal-dialog" data-legal-dialog="privacy">

	<div class="legal-dialog__inner">

		<button
			class="legal-dialog__close"
			type="button"
			data-legal-close
			aria-label="<?php esc_attr_e( 'Cerrar', 'zion-tattoo' ); ?>"
		>
			×
		</button>

		<p class="eyebrow">
			<?php esc_html_e( 'Información legal', 'zion-tattoo' ); ?>
		</p>

		<h2>
			<?php esc_html_e( 'Política de privacidad', 'zion-tattoo' ); ?>
		</h2>

		<div class="legal-dialog__content">

			<p>
				<?php esc_html_e( 'En Zion Tattoo respetamos la privacidad de las personas que visitan este sitio web y tratamos los datos personales de forma responsable y transparente.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Datos que podemos recibir', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Podemos recibir información que nos facilites voluntariamente cuando contactas con el estudio, por ejemplo mediante WhatsApp, teléfono o correo electrónico.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Finalidad', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Los datos se utilizan únicamente para atender consultas, gestionar solicitudes de información y coordinar citas o servicios relacionados con el estudio.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Conservación y seguridad', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Los datos se conservan durante el tiempo necesario para atender la solicitud correspondiente y se aplican medidas razonables para protegerlos frente a accesos no autorizados.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Derechos', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Puedes solicitar información sobre tus datos personales, así como su rectificación, supresión u otros derechos reconocidos por la normativa aplicable, contactando con el estudio.', 'zion-tattoo' ); ?>
			</p>

			<p class="legal-dialog__note">
				<?php esc_html_e( 'Este texto es informativo y deberá adaptarse a la situación jurídica y a los tratamientos de datos reales del establecimiento.', 'zion-tattoo' ); ?>
			</p>

		</div>

	</div>

</dialog>


<!-- POPUP AVISO LEGAL -->

<dialog class="legal-dialog" data-legal-dialog="legal">

	<div class="legal-dialog__inner">

		<button
			class="legal-dialog__close"
			type="button"
			data-legal-close
			aria-label="<?php esc_attr_e( 'Cerrar', 'zion-tattoo' ); ?>"
		>
			×
		</button>

		<p class="eyebrow">
			<?php esc_html_e( 'Información legal', 'zion-tattoo' ); ?>
		</p>

		<h2>
			<?php esc_html_e( 'Aviso legal', 'zion-tattoo' ); ?>
		</h2>

		<div class="legal-dialog__content">

			<h3>
				<?php esc_html_e( 'Titular del sitio web', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Este sitio web pertenece a Zion Tattoo, estudio de tatuaje situado en Tarragona, Catalunya.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Objeto', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'El objetivo de este sitio es ofrecer información sobre el estudio, sus servicios, trabajos, artistas y formas de contacto y reserva.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Uso del sitio', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'La persona usuaria se compromete a utilizar este sitio de forma lícita y respetuosa, evitando cualquier uso que pueda perjudicar al sitio, al estudio o a terceros.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Propiedad intelectual', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<?php esc_html_e( 'Los textos, imágenes, logotipos, diseños y demás contenidos publicados en este sitio están protegidos por la normativa aplicable y no podrán utilizarse sin la autorización correspondiente.', 'zion-tattoo' ); ?>
			</p>

			<h3>
				<?php esc_html_e( 'Contacto', 'zion-tattoo' ); ?>
			</h3>

			<p>
				<a href="mailto:hola@ziontattoo.es">
					hola@ziontattoo.es
				</a>
			</p>

			<p class="legal-dialog__note">
				<?php esc_html_e( 'Este texto es informativo y deberá completarse con los datos legales reales del titular antes de publicar el sitio definitivamente.', 'zion-tattoo' ); ?>
			</p>

		</div>

	</div>

</dialog>



<?php wp_footer(); ?>

</body>
</html>
