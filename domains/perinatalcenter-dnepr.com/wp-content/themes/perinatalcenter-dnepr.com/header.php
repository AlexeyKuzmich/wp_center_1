<!DOCTYPE html>
<html lang="uk">
<head>
  <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="<?php if ( is_single() ) {
    single_post_title('', true); 
    } else {
      bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
    <meta name="keywords" content="Перинатальный, центр, Космическая, 17, Днепропетровск, Днепр, роддом, женская, консультация, гинекология, гинеколог" />

<style>
#preload {
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: #499FFF;
  z-index: 99999;
}
#preload > div {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.preloadSvg {
  margin: 0 auto;
  width: 48px;
  height: 48px;
  background: url(<?php bloginfo('template_url') ?>/images/preload.svg) center center no-repeat;
  background-size: 70px;
}
#preload p {
  font-size: 1.8em;
  text-align: center;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
}
#preload p:last-child {
  opacity: 0;
  font-size: 1.2em;
  text-align: center;
  color: blue;
  text-transform: none;
  letter-spacing: 1px;
  -webkit-transition: 1.5s;
  transition: 1.5s;
}
</style>

<?php wp_head(); ?>
</head>

<body>
<div id="preload">
  <div>
    <div class="preloadSvg"></div>
    <p>Дніпропетровський обласний<br /><small>Перинатальний центр</small></p>
    <p class="greeting">ми радi, що Ви з нами !</p>
  </div>
</div>

<header class="container-fluid">
  <div class="row clearfix topInfo">

    <div class="logo">
      <a href="http://perinatalcenter-dnepr.com">Дніпропетровський<br /><span>Перинатальний центр</span></a>
    </div>

    <div class="topContacts">
      <a href="tel:+380562685060">+38 0562 68 50 60</a>
      <a href="tel:+380562685060">+38 0562 68 50 60</a>
      <a href="mailto:dmpb2_glvr@ukr.net"><span>e-mail: </span>напишiть нам</a>
    </div>
    
    <span class="glyphicon glyphicon-search search-icon"></span>

    <div class="search-block">
      <div class="search-inner">
      <span class="glyphicon glyphicon-remove close-icon"></span>
        <form role="search" method="get" id="searchform" action="#">
          <input id="s" type="text" placeholder="Пошук..." name="s" value="">
          <span id="searchsubmit" class="glyphicon glyphicon-search" type="submit" value=""></span>
        </form>
      </div>
    </div>


  </div>
</header>

<nav>
  <div class="container-fluid">
    <a class="toggleMenu" href="#"><img src="<?php bloginfo('template_url') ?>/images/toggleMenu.png" width="256" height="256" alt="toggleMenu" /></a>
    <ul class="nav">

      <?php wp_nav_menu( array('theme_location' => 'menu') ); ?>

    </ul>
  </div>
</nav>

<div class="scrollBlock"></div>