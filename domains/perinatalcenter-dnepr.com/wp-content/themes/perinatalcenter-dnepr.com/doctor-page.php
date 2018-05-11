<?php
/*
Template Name: Cтраница доктора
*/
?>

<?php get_header(); ?>

<section class="person">
  <h1><?php echo get_post_meta( $post->ID, 'department', true ); ?></h1>
  <div class="container">
    <div class="row">
      <div class="col-md-4 personImg">
        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
      </div>
      <div class="col-md-8 persontext">
        <h2><strong><?php the_title(); ?></strong></h2>
        <h2><strong><?php echo get_post_meta( $post->ID, 'position', true ); ?></strong></h2>
        <h3><em><?php echo get_post_meta( $post->ID, 'grade', true ); ?></em></h3>
      </div>
    </div>
  </div>
</section>

<section class="personDescription">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <?php while( have_posts() ) : the_post(); 
          the_content();
        endwhile; ?>

      </div>
    </div>
  </div>    
</section>

<?php get_footer(); ?>