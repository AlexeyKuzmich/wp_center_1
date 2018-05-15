<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <section class="post_output">

      	<?php while( have_posts() ) : the_post(); ?>
      		<?php $more = 1; ?>
      		<h2><?php the_title(); ?></h2>
      		
      		<?php the_time('j M Y') ?>
          <br />
            
      		<?php the_post_thumbnail('large', array('class' => 'img-responsive')); ?>
      		<?php the_content(); ?>
      	<?php endwhile; ?>

      </section>
    </div>

<?php get_sidebar(); ?>

  </div>
</div>

<?php get_footer(); ?>