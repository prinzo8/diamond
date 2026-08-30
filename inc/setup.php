<?php
/**
 * Archivo Nocturno: configuración, soporte de WordPress y contenidos editables.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configura las funciones estándar del tema.
 */
function zion_tattoo_setup() {
	load_theme_textdomain( 'zion-tattoo', ZION_TATTOO_PATH . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array( 'height' => 160, 'width' => 160, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor.css' );

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Menú principal', 'zion-tattoo' ),
			'footer'  => esc_html__( 'Menú del pie', 'zion-tattoo' ),
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Barra lateral', 'zion-tattoo' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	add_image_size( 'zion-hero', 1920, 1080, true );
	add_image_size( 'zion-artist', 800, 1000, true );
	add_image_size( 'zion-gallery-tall', 900, 1200, true );
}
add_action( 'after_setup_theme', 'zion_tattoo_setup' );

/**
 * Registra contenidos nativos y fáciles de editar desde el administrador.
 */
function zion_tattoo_register_content_types() {
	register_post_type(
		'zion_artist',
		array(
			'labels' => array(
				'name'          => esc_html__( 'Artistas', 'zion-tattoo' ),
				'singular_name' => esc_html__( 'Artista', 'zion-tattoo' ),
				'add_new_item'  => esc_html__( 'Añadir artista', 'zion-tattoo' ),
				'edit_item'     => esc_html__( 'Editar artista', 'zion-tattoo' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-art',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
			'has_archive'  => false,
			'rewrite'      => array( 'slug' => 'artistas' ),
		)
	);

	register_post_type(
		'zion_gallery',
		array(
			'labels' => array(
				'name'          => esc_html__( 'Galería', 'zion-tattoo' ),
				'singular_name' => esc_html__( 'Pieza de galería', 'zion-tattoo' ),
				'add_new_item'  => esc_html__( 'Añadir pieza', 'zion-tattoo' ),
				'edit_item'     => esc_html__( 'Editar pieza', 'zion-tattoo' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-format-gallery',
			'supports'     => array( 'title', 'excerpt', 'thumbnail', 'page-attributes' ),
			'has_archive'  => false,
			'rewrite'      => array( 'slug' => 'galeria' ),
		)
	);
}
add_action( 'init', 'zion_tattoo_register_content_types' );

/**
 * Crea los campos sencillos para la ficha de cada artista sin depender de plugins.
 */
function zion_tattoo_add_artist_metabox() {
	add_meta_box(
		'zion_artist_details',
		esc_html__( 'Datos del artista', 'zion-tattoo' ),
		'zion_tattoo_artist_metabox_content',
		'zion_artist',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'zion_tattoo_add_artist_metabox' );

function zion_tattoo_artist_metabox_content( $post ) {
	wp_nonce_field( 'zion_tattoo_save_artist_meta', 'zion_tattoo_artist_nonce' );
	$specialties = get_post_meta( $post->ID, '_zion_artist_specialties', true );
	$instagram   = get_post_meta( $post->ID, '_zion_artist_instagram', true );
	?>
	<p>
		<label for="zion_artist_specialties"><strong><?php esc_html_e( 'Especialidades', 'zion-tattoo' ); ?></strong></label><br />
		<input class="widefat" id="zion_artist_specialties" name="zion_artist_specialties" type="text" value="<?php echo esc_attr( $specialties ); ?>" placeholder="<?php esc_attr_e( 'Ej.: Blackwork · Fine Line', 'zion-tattoo' ); ?>" />
	</p>
	<p>
		<label for="zion_artist_instagram"><strong><?php esc_html_e( 'URL de Instagram o portfolio', 'zion-tattoo' ); ?></strong></label><br />
		<input class="widefat" id="zion_artist_instagram" name="zion_artist_instagram" type="url" value="<?php echo esc_url( $instagram ); ?>" placeholder="https://instagram.com/..." />
	</p>
	<?php
}

function zion_tattoo_save_artist_meta( $post_id ) {
	if ( ! isset( $_POST['zion_tattoo_artist_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['zion_tattoo_artist_nonce'] ) ), 'zion_tattoo_save_artist_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['zion_artist_specialties'] ) ) {
		update_post_meta( $post_id, '_zion_artist_specialties', sanitize_text_field( wp_unslash( $_POST['zion_artist_specialties'] ) ) );
	}
	if ( isset( $_POST['zion_artist_instagram'] ) ) {
		update_post_meta( $post_id, '_zion_artist_instagram', esc_url_raw( wp_unslash( $_POST['zion_artist_instagram'] ) ) );
	}
}
add_action( 'save_post_zion_artist', 'zion_tattoo_save_artist_meta' );

/**
 * Evita que las consultas de archivo principal muestren contenidos del estudio no deseados.
 */
function zion_tattoo_exclude_custom_types_from_search( $query ) {
	if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
		$query->set( 'post_type', array( 'post', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'zion_tattoo_exclude_custom_types_from_search' );
