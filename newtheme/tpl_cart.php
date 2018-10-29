<?php /* Template Name: Layout: Cart Page */ ?>
<?php get_header(); ?>
<!--content section-->
<main>
  <section class="zzz">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="">	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php endwhile; else: ?>
            <h1><?php _e('Not Found') ?></h1>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>
