<?php /* Template Name: Layout: Links Page */?>
<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="single_inner">
            <h1>Links</h1>
            <?php 
            wp_list_bookmarks('title_li=&title_before=<h3>&title_after=</h3>&category_before=&category_after=&orderby=rating&order=DESC&show_description=1&between= —');
            ?>
		  </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>
