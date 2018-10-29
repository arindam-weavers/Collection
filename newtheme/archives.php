<?php /*Template Name: Layout: Archives*/?>
<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="single_inner">
            <h1><?php _e('Archives') ?></h1>
            <h3><?php _e('Archives by Month') ?></h3>
            <ul><?php wp_get_archives('type=monthly'); ?></ul>
            <p>&nbsp;</p>
            <h3><?php _e('Archives by Subject') ?></h3>
            <ul><?php wp_list_cats(); ?></ul>
            <?php if( function_exists('wp_tag_cloud') ) { ?>
            <p>&nbsp;</p>
            <h3><?php _e('Tags') ?></h3>
            <?php wp_tag_cloud(); ?>
            <?php } ?>    
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>