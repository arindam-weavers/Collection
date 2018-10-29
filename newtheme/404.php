<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="single_inner">
            <h1><?php _e('Error') ?>404 - <?php _e('Not Found') ?></h1>
            <h2>This is somewhat embarrassing, isn’t it?</h2>
            <p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>
