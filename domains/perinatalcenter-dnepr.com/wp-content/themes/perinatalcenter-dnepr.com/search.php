<?php get_header(); ?>

<h1 style="color: red;">SEARCH-PAGE</h1>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section>        
        <?php if ( have_posts() ) : 
        while (have_posts()) : the_post(); ?>

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

            <div class="col-sm-8 col-md-8 pull-right">
              <div class="blog-info clearfix">
                <div class="author_field">
                  <p class="author">
                    <?php the_author(); ?>
                    <?php the_time('j M Y'); ?>
                  </p>
                  <p class="comment"><?php comments_popup_link('0', '1', '%'); ?></p>
                </div>
              </div>              
              <div class="read-more"><?php the_content('Дiзнатись бiльше...'); ?></div>
            </div>            

          </div>
        <?php endwhile; ?>
        <?php else : ?>
          <h1>ничего нет !!!</h1>
        <?php endif; ?>

        <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
        $wp_query = null; $wp_query = $temp; ?>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>               
</div>

<?php get_footer(); ?>