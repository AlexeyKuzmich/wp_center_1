<?php
/*
Template Name: Страница контактов
*/
?>
<?php get_header(); ?>

<section class="schedule">
  <div class="container">
    <div class="row">
      <h1>контактні дані</h1>

			<?php
    	$arr_departments = array( 16,18,27,13,41,47,49,43,55,45,53,51,38,57 ); // id страниц отделений (напр. 16 - CPS, 18 - KDO)
    	$arr_length = count( $arr_departments );
    	for ($i = 0; $i < $arr_length; $i++)
		  {
		  	$department_id = $arr_departments[$i];
				$post_id = get_post( $department_id );
				$page_title = $post_id->post_title;
			?>

      <div class="col-sm-6 col-md-6 col-lg-4 item">
        <a href="<?php echo get_page_link( $post_id ); ?>">
        	
          <div class="inner">
          	<h2 class="text-left"><?php echo $page_title; ?></h2>

						<p><span class="glyphicon glyphicon-home"></span><?php echo get_post_meta( $department_id, 'local_address', true ); ?></p>
            <p><span class="glyphicon glyphicon-phone"></span><?php echo get_post_meta( $department_id, 'mobile_1', true ); ?></p>
            <p><span class="glyphicon glyphicon-asterisk"></span><?php echo get_post_meta( $department_id, 'work_schedule', true ); ?></p>

            <div class="shadeFull"></div>
            <div class="shade">
              <p>Докладніше</p>
            </div>
          </div>
        </a>
      </div>

    	<?php } ?>

	  </div>
	</div>
</section>

<section class="map">
  <div class="container">
    <h1>наше розташування</h1>
    <div class="mapResponsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10593.600624785779!2d35.06795445513916!3d48.41046153353493!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc93a703c0b44fe24!2z0JTQvdC10L_RgNC-0L_QtdGC0YDQvtCy0YHQutC40Lkg0L7QsdC70LDRgdGC0L3QvtC5INC_0LXRgNC40L3QsNGC0LDQu9GM0L3Ri9C5INGG0LXQvdGC0YA!5e0!3m2!1sru!2sua!4v1515142935750" width="600" height="450" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</section>

<?php get_footer(); ?>