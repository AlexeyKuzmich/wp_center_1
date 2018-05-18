<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section class="category_item">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="tag_page"><span class="glyphicon glyphicon-tag"></span> Miтки: <?php single_tag_title(''); ?></h2>
          </div>
        </div>

      	<?php while( have_posts() ) : the_post(); ?>
      		<?php $more = 1; ?>

          <h2 class="text-left"><?php the_title(); ?></h2>

          <div class="blog-info clearfix">
            <div class="author_field">
              <p class="author">
                <?php the_author(); ?>
                <?php the_time('j M Y'); ?>
              </p>
              <p class="comment"><?php comments_popup_link('0', '1', '%'); ?></p>
            </div>

          </div>
          <?php if ( has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
          <?php } ?>

          <?php the_content(); ?>
                    <div class="tags"><?php the_tags('<span>Схожі категорії: </span>', ' '); ?></div>
        <?php endwhile; ?>

        <?php
        if (function_exists('wp_pagenavi')) { wp_pagenavi(); }
        $wp_query = null; $wp_query = $temp; ?>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>