<?php
echo '<!-- ARTISTS TEST OK -->';
/**
 * Archivo Nocturno: ARTISTS SECTION.
 *
 * Las imágenes de los 3 artistas se gestionan desde:
 * Apariencia > Personalizar > Zion Tattoo · Estudio.
 *
 * @package ZionTattoo
 */
?>

<section class="section artists" id="artistas">

	<div class="section-marker" aria-hidden="true">
		<span>03</span><i></i>
	</div>

	<div class="artists__top" data-reveal>
		<div>
			<p class="eyebrow"><?php esc_html_e( 'El equipo', 'zion-tattoo' ); ?></p>
			<h2><?php esc_html_e( 'Manos con una firma propia.', 'zion-tattoo' ); ?></h2>
		</div>

		<p>
			<?php esc_html_e( 'Consulta los perfiles y referencias de cada artista antes de reservar.', 'zion-tattoo' ); ?>
		</p>
	</div>

	<div class="artists__grid">

		<?php for ( $i = 1; $i <= 3; $i++ ) : ?>

			<?php
			$image_id = absint(
				get_theme_mod( 'zion_artist_image_' . $i, 0 )
			);
			?>

			<article class="artist-card" data-reveal>

				<div class="artist-card__image">

					<?php if ( $image_id ) : ?>

						<?php
						echo wp_get_attachment_image(
							$image_id,
							'zion-artist',
							false,
							array(
								'loading' => 'lazy',
							)
						);
						?>

					<?php else : ?>

						<?php zion_tattoo_placeholder_image(); ?>

					<?php endif; ?>

				</div>

				<div class="artist-card__body">

					<p class="eyebrow">
						<?php
						echo esc_html(
							sprintf(
								__( 'Artista %02d', 'zion-tattoo' ),
								$i
							)
						);
						?>
					</p>

					<h3>
						<?php
						echo esc_html(
							sprintf(
								__( 'Nombre del artista %d', 'zion-tattoo' ),
								$i
							)
						);
						?>
					</h3>

					<p>
						<?php esc_html_e( 'Perfil del artista próximamente.', 'zion-tattoo' ); ?>
					</p>

				</div>

			</article>

		<?php endfor; ?>

	</div>

</section>
