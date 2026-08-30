<?php
/**
 * Archivo Nocturno: carga de recursos mediante las APIs de WordPress.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function zion_tattoo_enqueue_assets() {
	wp_enqueue_style( 'zion-tattoo-style', get_stylesheet_uri(), array(), ZION_TATTOO_VERSION );
	wp_enqueue_style( 'zion-tattoo-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Manrope:wght@400;500;600;700;800&display=swap', array(), null );
	wp_enqueue_style( 'zion-tattoo-main', ZION_TATTOO_URL . '/assets/css/main.css', array( 'zion-tattoo-style', 'zion-tattoo-fonts' ), ZION_TATTOO_VERSION );
	wp_enqueue_script( 'zion-tattoo-main', ZION_TATTOO_URL . '/assets/js/main.js', array(), ZION_TATTOO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'zion_tattoo_enqueue_assets' );

