<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section class="category_item">

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
        <?php endwhile; ?>

        <div class="tags"><?php the_tags('<span>Схожі категорії: </span>', ' '); ?></div>

        <div class="prev_next_posts clearfix">
          <div class="prev_post">
            <p>Попередній запис:</p>
            <p><?php previous_post_link( '%link', '< %title', true ); ?></p>
          </div>
          <div class="next_post">
            <p>Наступний запис:</p>
            <p><?php next_post_link( '%link', '%title >', true ); ?></p>
          </div>
        </div>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>