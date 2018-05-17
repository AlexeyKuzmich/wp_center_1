<?php
/*
Template Name: Cтраница Новостей
*/
?>

<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section>        
        <?php $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query('cat=-1,-5,-6,-7,-8,-10,-11,-12&paged=' . $paged);
        while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

          <div class="row category_item">

              <div class="col-xs-12">
                <h2 class="text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              </div>

            <div class="col-sm-4 col-md-4">
              <?php if ( has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
              <?php } else { ?>
                <a href="<?php the_permalink(); ?>">
                  <img class="img-responsive text-left" src="<?php bloginfo('template_url'); ?>/images/no_image.jpg" alt="no_image" width="300" height="300" />
                </a>
              <?php } ?>
            </div>

            <div class="col-sm-8 col-md-8">
              <div class="blog-info clearfix">
                
                <div class="author_field">
                  <p class="author">
                    <?php the_author(); ?>
                    <?php the_time('j M Y'); ?>
                  </p>
                  <p class="comment"><?php comments_popup_link('0', '1', '%'); ?></p>
                </div>
              </div>              
              <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
            </div>

          </div>

        <?php endwhile;
        if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
        $wp_query = null; $wp_query = $temp; ?>

      </section>
    </div>

    <?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>