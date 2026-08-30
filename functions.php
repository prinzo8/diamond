<?php
/**
 * Archivo Nocturno: punto de entrada ligero del tema Zion Tattoo Family.
 * Todas las funciones están separadas por responsabilidad para facilitar su mantenimiento.
 *
 * @package ZionTattoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ZION_TATTOO_VERSION', '1.0.0' );
define( 'ZION_TATTOO_PATH', get_template_directory() );
define( 'ZION_TATTOO_URL', get_template_directory_uri() );

require_once ZION_TATTOO_PATH . '/inc/setup.php';
require_once ZION_TATTOO_PATH . '/inc/enqueue.php';
require_once ZION_TATTOO_PATH . '/inc/customizer.php';
require_once ZION_TATTOO_PATH . '/inc/template-functions.php';

