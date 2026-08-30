<?php
/**
 * Archivo Nocturno: modèle de secours WordPress pour les listes de contenus.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="content-shell section"><header class="archive-heading"><p class="eyebrow"><?php esc_html_e( 'Diario del estudio', 'zion-tattoo' ); ?></p><h1><?php bloginfo( 'name' ); ?></h1></header><?php if ( have_posts() ) : ?><div class="post-list"><?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'post-list__item' ); ?>><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?></article><?php endwhile; ?></div><?php the_posts_navigation(); else : ?><p><?php esc_html_e( 'Todavía no hay entradas publicadas.', 'zion-tattoo' ); ?></p><?php endif; ?></main>
<?php get_footer(); ?>

