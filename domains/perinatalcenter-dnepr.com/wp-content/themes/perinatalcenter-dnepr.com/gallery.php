<?php
/*
 * Template Name: Галерея
 */
?>

<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <section>

        <?php if ( have_posts() ) : 
          while (have_posts()) : the_post(); ?> 
            <h1><?php the_title(); ?></h1>
            <?php if( function_exists('easy_image_gallery') ) {
              echo easy_image_gallery();
            }
          endwhile;
        endif; wp_reset_query(); ?>

      </section>
    </div>
  </div>
</div>

<?php get_footer(); ?>