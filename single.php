<?php
/**
 * Archivo Nocturno: modèle des articles de blog.
 *
 * @package ZionTattoo
 */
get_header();
?>
<main id="contenido" class="content-shell section"><?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'entry' ); ?>><header class="entry__header"><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p><h1><?php the_title(); ?></h1></header><?php if ( has_post_thumbnail() ) : ?><figure class="entry__media"><?php the_post_thumbnail( 'large' ); ?></figure><?php endif; ?><div class="entry__content"><?php the_content(); ?></div></article><?php endwhile; ?></main>
<?php get_footer(); ?>

