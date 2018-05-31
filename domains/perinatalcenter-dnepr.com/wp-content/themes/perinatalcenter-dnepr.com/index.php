<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section>
        <h1>INDEX</h1>

        <?php
        $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query('cat=-1,-5,-6,-7,-8,-10,-11&paged=' . $paged);
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_time('j M Y'); ?>
          <?php the_category(', '); ?>
          <?php comments_popup_link('0', '1', '%'); ?>
          <br />
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(250, 250)); ?></a>
          <?php the_content('Читать далее...'); ?>

        <?php endwhile;
        if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
        $wp_query = null; $wp_query = $temp; ?>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>