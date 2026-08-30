<?php
/**
 * Gallery section — imágenes gestionadas desde Zion Studio.
 *
 * @package ZionTattoo
 */

$gallery_images = array();

for ( $i = 1; $i <= 6; $i++ ) {
	$image_id = absint( get_theme_mod( 'zion_gallery_image_' . $i, 0 ) );

	if ( $image_id ) {
		$gallery_images[] = array(
			'id'    => $image_id,
			'title' => get_the_title( $image_id ),
		);
	}
}
?>

<section class="section gallery" id="galeria">
	<div class="section-marker section-marker--light" aria-hidden="true">
		<span>04</span><i></i>
	</div>

	<div class="gallery__heading" data-reveal>
		<p class="eyebrow"><?php esc_html_e( 'Trabajos seleccionados', 'zion-tattoo' ); ?></p>
		<h2><?php esc_html_e( 'Piezas que hablan antes que nosotros.', 'zion-tattoo' ); ?></h2>
	</div>

	<div class="gallery__grid" data-gallery">

		<?php if ( ! empty( $gallery_images ) ) : ?>

			<?php foreach ( $gallery_images as $index => $image ) : ?>

				<?php
				$full = wp_get_attachment_image_url( $image['id'], 'full' );
				$alt  = get_post_meta( $image['id'], '_wp_attachment_image_alt', true );

				if ( ! $alt ) {
					$alt = $image['title'];
				}
				?>

				<button
					class="gallery-card"
					type="button"
					data-lightbox-src="<?php echo esc_url( $full ); ?>"
					data-lightbox-alt="<?php echo esc_attr( $alt ); ?>"
					data-reveal
				>
					<?php
					echo wp_get_attachment_image(
						$image['id'],
						'zion-gallery-tall',
						false,
						array(
							'loading' => 'lazy',
							'alt'     => $alt,
						)
					);
					?>

					<span>
						<?php echo esc_html( sprintf( 'Pieza %02d', $index + 1 ) ); ?>
						<i aria-hidden="true">+</i>
					</span>
				</button>

			<?php endforeach; ?>

		<?php else : ?>

			<p><?php esc_html_e( 'Añade imágenes desde Zion Studio → Galería.', 'zion-tattoo' ); ?></p>

		<?php endif; ?>

	</div>
</section>

<dialog
	class="lightbox"
	data-lightbox
	aria-label="<?php esc_attr_e( 'Vista ampliada de la galería', 'zion-tattoo' ); ?>"
>
	<button
		class="lightbox__close"
		type="button"
		data-lightbox-close
		aria-label="<?php esc_attr_e( 'Cerrar imagen', 'zion-tattoo' ); ?>"
	>×</button>

	<img src="" alt="" data-lightbox-image />
</dialog>
