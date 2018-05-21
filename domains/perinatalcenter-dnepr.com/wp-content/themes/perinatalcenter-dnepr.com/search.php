<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section class="search_page">
        <div class="row">
          <div class="col-sm-12">
              <h3><span class="glyphicon glyphicon-search"></span>
                <?php $allsearch = &new WP_Query("s=$s&showposts=-1");
                $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e('');
                echo $count . ' ';
                _e('результатiв'); wp_reset_query(); ?>
                для <span><?php echo get_search_query(); ?></span>
              </h3>
            <div class="search-block-page">
              <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Пошук …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Пошук:', 'label' ) ?>" required autofocus />
                <input id="search_submit_page_ID" type="submit" class="search-submit" value="<?php echo esc_attr_x( '', 'submit button' ) ?>" />
                <label for="search_submit_page_ID"><span class="glyphicon glyphicon-search"></span></label>
              </form>
            </div>
          </div>
        </div>

        <?php if ( have_posts() ) : 
        while (have_posts()) : the_post(); ?>

          <div class="row category_item">

            <div class="col-xs-12">
                <h2 class="text-left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              </div>

            <div class="col-sm-4 col-md-4">
              <?php if ( has_post_thumbnail()) { ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?></a>
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
          <div class="row">
            <div class="col-sm-12">
              <div class="no_result">
                <h2>По вашому запиту нічого не знайдено</h2>
                <h3 class="text-left">Рекомендації з пошуку</h3>
                <p>1. Використовуйте синоніми</p>
                <p>2. Використовуйте більше ключових слів</p>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
        $wp_query = null; $wp_query = $temp; ?>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>               
</div>

<?php get_footer(); ?>