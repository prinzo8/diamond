<?php
/**
 * Archivo Nocturno: résultats de recherche WordPress.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="content-shell section"><header class="archive-heading"><p class="eyebrow"><?php esc_html_e( 'Búsqueda', 'zion-tattoo' ); ?></p><h1><?php printf( esc_html__( 'Resultados para: %s', 'zion-tattoo' ), esc_html( get_search_query() ) ); ?></h1></header><?php if ( have_posts() ) : ?><div class="post-list"><?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'post-list__item' ); ?>><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article><?php endwhile; ?></div><?php the_posts_navigation(); else : ?><p><?php esc_html_e( 'No encontramos resultados. Prueba con otro término.', 'zion-tattoo' ); ?></p><?php get_search_form(); endif; ?></main>
<?php get_footer(); ?>

