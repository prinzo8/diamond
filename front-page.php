<?php
/**
 * Archivo Nocturno: page d’accueil, composition éditoriale complète du studio.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="site-main">
	<?php get_template_part( 'template-parts/hero' ); ?>
	<?php get_template_part( 'template-parts/about' ); ?>
	<?php get_template_part( 'template-parts/services' ); ?>
	<?php get_template_part( 'template-parts/artists' ); ?>
	<?php get_template_part( 'template-parts/gallery' ); ?>
	<?php get_template_part( 'template-parts/booking' ); ?>
	<?php get_template_part( 'template-parts/location' ); ?>
</main>
<?php get_footer(); ?>

