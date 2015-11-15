<?php
/**
 * @package AkuRekaGraphic
 * @author Jamaludin Rajalu
 * @version 1.0.0
 * 
 * Template Name: Page without Sidebar
 * 
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <?php while ( have_posts() ) : the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php endwhile; ?>
  </article>
</div>
<?php get_footer(); ?>