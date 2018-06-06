<?php
/*
Template Name: Страница отделения CPS
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
      <h3>Телефони:</h3>
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
        <a href="tel:<?php echo get_post_meta( $post->ID, 'mobile_2', true ); ?>"><span class="glyphicon glyphicon-phone"></span><?php echo get_post_meta( $post->ID, 'mobile_2', true ); ?></a>
      </div>
    </div>

    <div class="row text-center socials">
      <h3>Электронна пошта, cоцiальнiмережi, вебсайт:</h3>
      <div class="col-sm-4 col-md-4">
        <a href="mailto:<?php echo get_post_meta( $post->ID, 'e-mail', true ); ?>"><span class="glyphicon glyphicon-envelope"></span><?php echo get_post_meta( $post->ID, 'e-mail', true ); ?></a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?php echo get_post_meta( $post->ID, 'facebook', true ); ?>" target="_blank"><svg version="1.1" x="0px" y="0px" viewBox="0 0 430.1 430.1" xml:space="preserve"><g><path d="M158.1,83.3c0,10.8,0,59.2,0,59.2h-43.4v72.4h43.4v215.2h89.1V214.9H307c0,0,5.6-34.7,8.3-72.7 c-7.8,0-67.8,0-67.8,0s0-42.1,0-49.5c0-7.4,9.7-17.4,19.3-17.4c9.6,0,29.8,0,48.6,0c0-9.9,0-43.9,0-75.4c-25,0-53.5,0-66,0 C155.9,0,158.1,72.5,158.1,83.3z"></path></g></svg>facebook</a>
      </div>
      <div class="col-sm-4 col-md-4">
        <a href="<?php echo get_post_meta( $post->ID, 'www', true ); ?>" target="_blank"><span class="glyphicon glyphicon-globe"></span>www.cps.org.ua</a>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>