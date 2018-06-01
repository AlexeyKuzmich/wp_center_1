<?php
/*
Template Name: О центре
*/
?>

<?php get_header(); ?>

<section class="departmentImg descriptionText">
  <div class="container">
    <div class="row">

      <?php while( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_post_thumbnail('large', array( 'class' => 'img-responsive') ); ?>
        <div>
          <p><?php the_content(); ?></p>
          <button>Розгорнути</button>
        </div>
      <?php endwhile; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>