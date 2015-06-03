<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-8-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php endwhile; ?>
  </article>
  <aside class="aside col-4-12">
    <?php get_sidebar(); ?>
  </aside>
</div>
<?php get_footer(); ?>