<?php
/*
Template Name: Страница отделения KDO
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

    <div class="row text-center phones">
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
      <div class="col-xs-4">
        <a href="mailto:<?php echo get_post_meta( $post->ID, 'e-mail', true ); ?>">
          <img width="64" height="64" src="<?php bloginfo('template_url') ?>/images/email_64x64.png" alt="e-mail">
        </a>
      </div>
      <div class="col-xs-4">
        <a href="<?php echo get_post_meta( $post->ID, 'facebook', true ); ?>" target="_blank">
          <img width="64" height="64" src="<?php bloginfo('template_url') ?>/images/facebook_64x64.png" alt="facebook">
        </a>
      </div>
      <div class="col-xs-4">
        <a href="<?php echo get_post_meta( $post->ID, 'instagram', true ); ?>" target="_blank">
          <img width="64" height="64" src="<?php bloginfo('template_url') ?>/images/instagram_64x64.png" alt="instagram">
        </a>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>