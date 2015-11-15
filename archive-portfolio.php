<?php
/**
 * @package argcom
 * @since 1.0
 */
get_header(); ?>
<div class="wrap column pad-top pad-bottom">
  <div id="primary" class="content-area col-8-12">
    <div id="content" class="site-content pad-right" role="main">
      <h1><?php _e( 'Projects', 'argcom' ); ?></h1>
      <!-- slider -->
      <div class="column">
        <?php
          $args = array(
            'post_type'               => 'portfolio',
            'posts_per_archive_page'  => -1,
            'order'                   => 'ASC',
            'orderby'                 => 'title'
          );

          $query = new WP_Query( $args );

          while( $query->have_posts() ) : $query->the_post(); ?>
          <div class="portfolio-holder">
            <div class="portfolio-image">
              <img src="<?php echo get_post_meta(get_the_ID(),'_argcom_portfolio_image',true); ?>">
            </div>
            <div class="portfolio-image-title">
              <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
    <div class="col-4-12 pad-left">
    <ul class="widget-page-list">
      <?php 
        $args = array(
          'post_type' => 'portfolio',
          'title_li'  => '<h3> '. __( 'Portfolios' ) .' </h3>'
        );
        wp_list_pages( $args ); 
      ?>
    </ul>
  </div>
</div>
<?php get_footer(); ?>