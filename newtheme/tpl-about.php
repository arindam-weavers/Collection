<?php /*Template Name: Layout: About Page*/?>
<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="single_inner">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>
