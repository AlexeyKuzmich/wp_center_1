<?php
/*
Template Name: Страница отделения
*/
?>

<?php get_header(); ?>

<?php while( have_posts() ) : the_post(); ?>

<section class="departmentImg">
  <div class="container">
    <div class="row">
      <h1><?php the_title(); ?></h1>
      <?php the_post_thumbnail('large', array( 'class' => 'img-responsive') ); ?>
    </div>
  </div>
</section>

<?php $category = 'cat=' . get_post_meta( $post->ID, 'category', true ); ?> <!-- получение номера категории (доп. поле -> ссылка на рубрику с перечнем врачей -->

<?php endwhile; ?>

<!-- owlcarousel -->
<section>
  <div class="container">
    <h1>ДОКТОРА ВІДДІЛЕННЯ</h1>
    <div class="owl-carousel owl-doctors grabbable">

      <?php if (have_posts()) : query_posts( $category );
      while (have_posts()) : the_post(); ?>

      <div class="item">
        <?php the_post_thumbnail( 'large', array('class' => 'img-responsive') ); ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo get_post_meta( $post->ID, 'position', true ); ?></p>
        <a href="<?php the_permalink(); ?>">Докладнiше</a>
      </div>

      <?php endwhile; endif; wp_reset_query(); ?>

    </div>
  </div>
</section>
<!-- / owlcarousel -->

<?php while( have_posts() ) : the_post(); ?>

<section class="descriptionText">
  <div class="container">

    <h1>опис вiддiлення</h1>
    <div>
      <p><?php the_content(); ?></p>
      <button>Розгорнути</button>
    </div>

  </div>
</section>

<?php endwhile; ?>

<section class="deparmentContacts coloredSection">
  <div class="container">
    <h1>контактні дані вiддiлення</h1>

    <div class="row text-center">
      <h3>Телефони / eлектронна пошта:</h3>
      <div class="col-sm-3 col-md-3">
        <a href="tel:<?php echo get_post_meta( $post->ID, 'phone_1', true ); ?>"><span class="glyphicon glyphicon-earphone"></span><?php echo get_post_meta( $post->ID, 'phone_1', true ); ?></a>
      </div>
      <div class="col-sm-3 col-md-3">
        <a href="tel:<?php echo get_post_meta( $post->ID, 'phone_2', true ); ?>"><span class="glyphicon glyphicon-earphone"></span><?php echo get_post_meta( $post->ID, 'phone_2', true ); ?></a>
      </div>
      <div class="col-sm-3 col-md-3">
        <a href="tel:<?php echo get_post_meta( $post->ID, 'mobile_1', true ); ?>"><span class="glyphicon glyphicon-phone"></span><?php echo get_post_meta( $post->ID, 'mobile_1', true ); ?></a>
      </div>
      <div class="col-sm-3 col-md-3">
        <a href="mailto:<?php echo get_post_meta( $post->ID, 'e-mail', true ); ?>"><span class="glyphicon glyphicon-envelope"></span><?php echo get_post_meta( $post->ID, 'e-mail', true ); ?></a>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>