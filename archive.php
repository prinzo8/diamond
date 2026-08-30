<?php
/**
 * Archivo Nocturno: modèle des archives de WordPress.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="content-shell section"><header class="archive-heading"><p class="eyebrow"><?php esc_html_e( 'Archivo', 'zion-tattoo' ); ?></p><h1><?php the_archive_title(); ?></h1><?php the_archive_description( '<div>', '</div>' ); ?></header><?php if ( have_posts() ) : ?><div class="post-list"><?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'post-list__item' ); ?>><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article><?php endwhile; ?></div><?php the_posts_navigation(); else : ?><p><?php esc_html_e( 'No se han encontrado contenidos.', 'zion-tattoo' ); ?></p><?php endif; ?></main>
<?php get_footer(); ?>

