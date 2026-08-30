<?php
/**
 * Archivo Nocturno: opciones editables desde Apariencia > Personalizar.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitiza campos multilínea.
 */
function zion_tattoo_sanitize_multiline( $value ) {
	return wp_kses_post( $value );
}

/**
 * Registra las opciones personalizables del tema.
 */
function zion_tattoo_customize_register( $wp_customize ) {

	/**
	 * Sección principal de Zion Tattoo.
	 */
	$wp_customize->add_section(
		'zion_studio_options',
		array(
			'title'       => esc_html__( 'Zion Tattoo · Estudio', 'zion-tattoo' ),
			'priority'    => 30,
			'description' => esc_html__( 'Actualiza la información principal, imágenes y contenido del estudio.', 'zion-tattoo' ),
		)
	);

	/**
	 * Campos de texto.
	 */
	$fields = array(
		'hero_eyebrow' => array(
			'label'    => esc_html__( 'Antetítulo del hero', 'zion-tattoo' ),
			'default'  => 'Tarragona · Est. 20XX',
			'sanitize' => 'sanitize_text_field',
		),

		'hero_title' => array(
			'label'    => esc_html__( 'Título del hero', 'zion-tattoo' ),
			'default'  => 'Tu piel. Tu historia. Nuestro oficio.',
			'sanitize' => 'sanitize_text_field',
		),

		'hero_text' => array(
			'label'    => esc_html__( 'Texto del hero', 'zion-tattoo' ),
			'default'  => '[STUDIO DESCRIPTION]',
			'sanitize' => 'zion_tattoo_sanitize_multiline',
			'type'     => 'textarea',
		),

		'tattoo_styles' => array(
			'label'    => esc_html__( 'Estilos de tatuaje (separados por comas)', 'zion-tattoo' ),
			'default'  => 'Traditional, Neo Traditional, Blackwork, Realism, Fine Line, Custom Tattoo',
			'sanitize' => 'sanitize_text_field',
		),

		'booking_url' => array(
			'label'    => esc_html__( 'URL de reserva', 'zion-tattoo' ),
			'default'  => '[BOOKING URL]',
			'sanitize' => 'esc_url_raw',
		),

		'phone' => array(
			'label'    => esc_html__( 'Teléfono', 'zion-tattoo' ),
			'default'  => '[PHONE]',
			'sanitize' => 'sanitize_text_field',
		),

		'email' => array(
			'label'    => esc_html__( 'Email', 'zion-tattoo' ),
			'default'  => '[EMAIL]',
			'sanitize' => 'sanitize_email',
		),

		'address' => array(
			'label'    => esc_html__( 'Dirección', 'zion-tattoo' ),
			'default'  => '[STUDIO ADDRESS], Tarragona',
			'sanitize' => 'sanitize_text_field',
		),

		'hours' => array(
			'label'    => esc_html__( 'Horario', 'zion-tattoo' ),
			'default'  => '[OPENING HOURS]',
			'sanitize' => 'sanitize_text_field',
		),

		'maps_url' => array(
			'label'    => esc_html__( 'URL de Google Maps', 'zion-tattoo' ),
			'default'  => '[GOOGLE MAPS URL]',
			'sanitize' => 'esc_url_raw',
		),

		'instagram' => array(
			'label'    => esc_html__( 'URL de Instagram', 'zion-tattoo' ),
			'default'  => '[INSTAGRAM URL]',
			'sanitize' => 'esc_url_raw',
		),
	);

	foreach ( $fields as $id => $field ) {

		$wp_customize->add_setting(
			'zion_' . $id,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => $field['sanitize'],
			)
		);

		$wp_customize->add_control(
			'zion_' . $id,
			array(
				'label'   => $field['label'],
				'section' => 'zion_studio_options',
				'type'    => isset( $field['type'] ) ? $field['type'] : 'text',
			)
		);
	}

	/**
	 * Color principal.
	 */
	$wp_customize->add_setting(
		'zion_primary_color',
		array(
			'default'           => '#1E4C4D',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'zion_primary_color',
			array(
				'label'   => esc_html__( 'Color petróleo de marca', 'zion-tattoo' ),
				'section' => 'colors',
			)
		)
	);

	/**
	 * Imagen del estudio.
	 */
	$wp_customize->add_setting(
		'zion_about_image',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'zion_about_image',
			array(
				'label'     => esc_html__( 'Imagen del estudio', 'zion-tattoo' ),
				'section'   => 'zion_studio_options',
				'mime_type' => 'image',
			)
		)
	);

	/**
	 * Imágenes de la galería.
	 *
	 * Imagen 01 = primera posición
	 * Imagen 02 = segunda posición
	 * Imagen 03 = tercera posición
	 * etc.
	 */
	for ( $i = 1; $i <= 6; $i++ ) {

		$wp_customize->add_setting(
			'zion_gallery_image_' . $i,
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'zion_gallery_image_' . $i,
				array(
					'label'     => sprintf(
						esc_html__( 'Imagen de galería %02d', 'zion-tattoo' ),
						$i
					),
					'section'   => 'zion_studio_options',
					'mime_type' => 'image',
				)
			)
		);
	}

	/**
	 * Imágenes de los artistas.
	 *
	 * Imagen 01 = artista 01
	 * Imagen 02 = artista 02
	 * Imagen 03 = artista 03
	 */
	for ( $i = 1; $i <= 3; $i++ ) {

		$wp_customize->add_setting(
			'zion_artist_image_' . $i,
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'zion_artist_image_' . $i,
				array(
					'label'     => sprintf(
						esc_html__( 'Imagen del artista %02d', 'zion-tattoo' ),
						$i
					),
					'section'   => 'zion_studio_options',
					'mime_type' => 'image',
				)
			)
		);
	}

	/**
	 * Imagen principal del hero.
	 */
	$wp_customize->add_setting(
		'zion_hero_image',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Media_Control(
			$wp_customize,
			'zion_hero_image',
			array(
				'label'     => esc_html__( 'Imagen del hero', 'zion-tattoo' ),
				'section'   => 'zion_studio_options',
				'mime_type' => 'image',
			)
		)
	);
}

add_action( 'customize_register', 'zion_tattoo_customize_register' );
