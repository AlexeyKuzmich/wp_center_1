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
      <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
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

      <?php if ( have_posts() ) : query_posts( $category );
      while (have_posts()) : the_post(); ?>

      <div class="item">
        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo get_post_meta( $post->ID, 'position', true ); ?></p>
        <a href="<?php echo get_post_meta( $post->ID, 'page_link', true ); ?>">Докладнiше</a>
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
    <h3>Телефони:</h3>
    <p>
      <a href="tel:<?php echo get_post_meta( $post->ID, 'phone_1', true ); ?>"><span class="glyphicon glyphicon-earphone"></span><?php echo get_post_meta( $post->ID, 'phone_1', true ); ?></a>
      <a href="tel:<?php echo get_post_meta( $post->ID, 'phone_2', true ); ?>"><span class="glyphicon glyphicon-earphone"></span><?php echo get_post_meta( $post->ID, 'phone_2', true ); ?></a>
      <a href="tel:<?php echo get_post_meta( $post->ID, 'mobile_1', true ); ?>"><span class="glyphicon glyphicon-phone"></span><?php echo get_post_meta( $post->ID, 'mobile_1', true ); ?></a>
      <a href="tel:<?php echo get_post_meta( $post->ID, 'mobile_2', true ); ?>"><span class="glyphicon glyphicon-phone"></span><?php echo get_post_meta( $post->ID, 'mobile_2', true ); ?></a>
    </p>
    <br />
    <h3>Электронна пошта:</h3>
    <p><a href="mailto:<?php echo get_post_meta( $post->ID, 'e-mail', true ); ?>"><span class="glyphicon glyphicon-envelope"></span><?php echo get_post_meta( $post->ID, 'e-mail', true ); ?></a></p>
<!--     <br />
<h3>Соцiальнiмережi / вебсайт:</h3>
<div class="row">
  <div class="col-md-6 text-center">
    <a style="margin-top: 16px;" href="https://www.facebook.com/%D0%94%D0%BD%D0%B5%D0%BF%D1%80%D0%BE%D0%BF%D0%B5%D1%82%D1%80%D0%BE%D0%B2%D1%81%D0%BA%D0%B8%D0%B9-%D0%9E%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D0%BD%D0%BE%D0%B9-%D0%A6%D0%B5%D0%BD%D1%82%D1%80-%D0%9F%D0%BB%D0%B0%D0%BD%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F-%D0%A1%D0%B5%D0%BC%D1%8C%D0%B8-1214228782030408/" target="_blank"><img src="images/facebook.png" alt="facebook"></a>
  </div>
  <div class="col-md-6 text-center">
    <a href="http://www.cps.org.ua" target="_blank"><img src="images/www.png" alt="website"></a>
  </div>
</div> -->
</div>
</section>

<?php get_footer(); ?>