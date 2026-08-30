<?php
/**
 * Archivo Nocturno: en-tête sombre, navigation sticky et accès direct à la réservation.
 *
 * @package ZionTattoo
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    const dot = document.querySelector('.zion-cursor-dot');
    const ring = document.querySelector('.zion-cursor-ring');
    if (!dot || !ring) return;

    let x = 0, y = 0, rx = 0, ry = 0;

    window.addEventListener('mousemove', function (e) {
        x = e.clientX;
        y = e.clientY;
        dot.style.transform = `translate(${x}px, ${y}px)`;
    }, { passive: true });

    function animate() {
        rx += (x - rx) * .15;
        ry += (y - ry) * .15;
        ring.style.transform = `translate(${rx}px, ${ry}px)`;
        requestAnimationFrame(animate);
    }

    animate();

    document.querySelectorAll('a, button, input, textarea, select, [role="button"]')
        .forEach(function (el) {
            el.addEventListener('mouseenter', () => ring.classList.add('hover'));
            el.addEventListener('mouseleave', () => ring.classList.remove('hover'));
        });
});
</script>

</head>
<body <?php body_class(); ?> style="<?php echo esc_attr( zion_tattoo_body_style() ); ?>">
<?php wp_body_open(); ?>

<div class="zion-cursor-dot" aria-hidden="true"></div>
<div class="zion-cursor-ring" aria-hidden="true"></div>
<a class="skip-link" href="#contenido"><?php esc_html_e( 'Saltar al contenido', 'zion-tattoo' ); ?></a>
<header class="site-header" data-site-header>
	<div class="site-header__inner">
		<?php if ( has_custom_logo() ) : ?>
			<div class="brand brand__custom-logo"><?php the_custom_logo(); ?></div>
		<?php else : ?>
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<span class="brand__seal" aria-hidden="true">Z</span>
				<span class="brand__wordmark"><strong>ZION</strong><small><?php esc_html_e( 'Tattoo Family', 'zion-tattoo' ); ?></small></span>
		</a>
		<?php endif; ?>

		<nav class="primary-nav" aria-label="<?php esc_attr_e( 'Navegación principal', 'zion-tattoo' ); ?>" data-primary-nav>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'nav__list',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'zion_tattoo_nav_fallback',
				)
			);
			?>
		</nav>

		<div class="site-header__actions">
	<a class="button button--compact" href="<?php echo esc_url( zion_tattoo_get_booking_url() ); ?>" target="_blank" rel="noopener noreferrer">
	<svg class="icon icon--whatsapp" aria-hidden="true" viewBox="0 0 24 24">
		<path d="M20.5 3.5A11.8 11.8 0 0 0 12.1 0C5.6 0 .3 5.3.3 11.8c0 2.1.6 4.2 1.7 6L.2 24l6.4-1.7a11.8 11.8 0 0 0 5.5 1.4h.1c6.5 0 11.8-5.3 11.8-11.8 0-3.2-1.2-6.2-3.5-8.4Zm-8.4 18.1h-.1c-1.7 0-3.4-.5-4.8-1.3l-.3-.2-3.8 1 1-3.7-.2-.3a9.7 9.7 0 1 1 8.2 4.5Zm5.3-7.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-1 1.2-.2.2-.4.2-.7.1-1.7-.8-2.8-1.5-3.9-3.4-.3-.5.3-.5.9-1.7.1-.2.1-.4 0-.6-.1-.2-.7-1.7-.9-2.3-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.6.1-.9.4-.3.3-1.1 1.1-1.1 2.6 0 1.5 1.1 3 1.2 3.2.1.2 2.2 3.4 5.4 4.8.8.3 1.4.5 1.9.6.8.2 1.5.2 2 .1.6-.1 1.8-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.1-.3-.2-.6-.4Z"/>
	</svg>
	<?php esc_html_e( 'Reservar cita', 'zion-tattoo' ); ?>
</a>
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" data-menu-toggle>
				<span class="screen-reader-text"><?php esc_html_e( 'Abrir menú', 'zion-tattoo' ); ?></span>
				<span></span><span></span>
			</button>
		</div>
	</div>
</header>
<div class="zion-scroll-progress" aria-hidden="true">
    <div class="zion-scroll-progress-bar"></div>
</div>

<button class="zion-back-section" type="button" aria-label="Previous section">
    ↑
</button>

