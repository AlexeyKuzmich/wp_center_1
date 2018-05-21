<?php get_header(); ?>
<!-- mainSlider -->
<div class="owl-carousel owl-mainSlider grabbable">
  <div class="item slide1"></div>
  <div class="item slide2"></div>
  <div class="item slide3"></div>
</div>
<!-- / mainSlider -->

<!-- direction -->
<section>
  <div class="container">
    <div class="row direction">
      <h1>Напрямки діяльності</h1>
      <h1><?php echo get_cat_name(2); ?></h1>
      <div class="col-sm-4">
        <a href="http://www.cps.org.ua" target="_blank">
          <div class="item">
            <img class="img-responsive center-block" src="<?php bloginfo('template_url'); ?>/images/treat.png" alt="img" />
            <h3><strong><em>Лікувально-діагностична робота</em></strong></h3>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="https://www.facebook.com/diagnostic.otdelenie" target="_blank">
          <div class="item">
            <img class="img-responsive center-block" src="<?php bloginfo('template_url'); ?>/images/consult.png" alt="img" />
            <h3><strong><em>Консультативна та організаційно-методична робота</em></strong></h3>
          </div>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="http://605.dsma.dp.ua" target="_blank">
          <div class="item">
            <img class="img-responsive center-block" src="<?php bloginfo('template_url'); ?>/images/research.png" alt="img" />
            <h3><strong><em>Наукова робота</em></strong></h3>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- / direction -->

<!-- headPhysician -->
<section class="headPhysician coloredSection">
  <div class="container">
    <div class="row">

      <?php if( have_posts() ) : query_posts( 'p=218' );
      while( have_posts() ) : the_post(); ?>

      <h1><?php echo get_post_meta( 218, 'appeal', true ); ?></h1>
      <div class="col-sm-4">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large', array('class' => 'img-responsive') ); ?></a>
      </div>
      <div class="col-sm-8">
        <p><?php echo get_post_meta( 218, 'appeal_content', true ); ?></p>
        <h3 class="text-right"><a href="<?php the_permalink(); ?>"><?php echo get_post_meta( 218, 'p_signature', true ); ?></a></h3>
      </div>

      <?php endwhile; endif; wp_reset_query(); ?>

    </div>
  </div>
</section>
<!--/ headPhysician -->

<!-- owlcarousel -->
<section>
  <div class="container">
    <h1>Керівництво закладом та завідувачі відділеннями</h1>
    <div class="owl-carousel owl-doctors grabbable">

      <?php if ( have_posts() ) : query_posts( 'cat=8' );
      while (have_posts()) : the_post(); ?>

      <div class="item">
        <?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
        <h3><?php the_title(); ?></h3>
        <p><?php echo get_post_meta( $post->ID, 'position', true ); ?></p>
        <a href="<?php the_permalink(); ?>">Докладнiше</a>
      </div>

      <?php endwhile; endif; wp_reset_query(); ?>

    </div>
  </div>
</section>
<!-- / owlcarousel -->

<!-- parallax -->
<div class="parallax-window">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 parrallax-inner">
        <span class="glyphicon glyphicon-thumbs-up"></span>
        <h2>ПІДТРИМКА ГРУДНОГО ВИГОДОВУВАННЯ</h2>
        <p>Ми живемо в світі, де люди та спільноти можуть миттєво контактувати один з одним, незважаючи на відстань. Кожен день створюються нові можливості для спілкування, і ми можемо використовувати ці інформаційні канали, щоб розширювати наші горизонти і поширювати інформацію та досвід про грудне вигодовування, незважаючи на відстані.</p>
      </div>
      <div class="col-sm-6 parrallax-inner">
        <span class="glyphicon glyphicon-leaf"></span>
        <h2>Орієнтованість на потреби пацієнта</h2>
        <p>«Пацієнт - понад усе!». Ми уважні до потреб наших пацієнтів. Ми виправдовуємо і намагаємося перевершити очікування.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 parrallax-inner">
        <span class="glyphicon glyphicon-heart"></span>
        <h2>Наші принципи</h2>
        <p>Наші цінності базуються на досвіді і слугують основою нашого розвитку. Наша задача – керуватися нишими цінностями в щоденній роботі.</p>
      </div>
      <div class="col-sm-6 parrallax-inner">
        <span class="glyphicon glyphicon-exclamation-sign"></span>
        <h2>Взаємна повага і довіра</h2>
        <p>Ми відрізняємося атмосферою довіри і відкритості. Ми поважаємо, підтримуємо і довіряємо один одному. Ми завжди готові подати руку допомоги колезі у важку мить.</p>
      </div>
    </div>
  </div>
</div>

<section class="descriptionText">
  <div class="container">

    <?php if ( have_posts() ) : query_posts( 'p=212' );
      while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div>
          <p><?php the_content(); ?></p>
          <button>Розгорнути</button>
        </div>
      <?php endwhile; endif; wp_reset_query(); ?>

  </div>
</section>

<section class="feedback coloredSection">
  <div class="container">
    <h1>запис на консультацію</h1>
    <h3><span>Будь ласка, залиште свої контактні дані і ми зв'яжемося з вами найближчим часом</span></h3>
    <form id="form">
      <div class="row">
        <div class="col-md-2"><h3 class="text-right"><label for="feedbackName">Ваше iм'я:</label></h3></div>
        <div class="col-md-4"><input type="text" name="name" id="feedbackName" required="required" /></div>
        <div class="col-md-2"><h3 class="text-right"><label for="feedbackPhone">Телефон:</label></h3></div>
        <div class="col-md-4"><input type="text" name="phone" id="feedbackPhone" required="required" /></div>
      </div>
      <div class="row">
        <div class="col-md-12"><input type="submit" value="Вiдправити повiдомлення" /></div>
      </div>
    </form>
  </div>
</section>

<?php get_footer(); ?>