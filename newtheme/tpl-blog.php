<?php /*Template Name: Layout: Blog Page*/?>
<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">

          <!--<div class="single_inner">
            <div class="grey_container">
              <div class="blog_container">
                <div class="blog_right">
                  <?php //if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Blog Recent Post Section') ) : ?>
                  <?php //endif;?>
                </div>
                <div class="blog_left"> <?php //echo do_shortcode('[ajax_load_more post_type="post"]'); ?> </div>
                <div class="clear"></div>
              </div>
            </div>
          </div>-->

          <div class="inr_wcnt">
          <div class="inr_wraper">
          <div class="inr_cntbox">
          <?php echo do_shortcode('[ajax_load_more post_type="post"  posts_per_page="10" category="blog" max_pages="0"]'); ?>  
          </div>
          </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>



<!--content section--> 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
<script async="async" src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1678362145770099',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> 
<script type="text/javascript">
jQuery(document).ajaxComplete(function() {
    FB.XFBML.parse(); // For Facebook button.
    twttr.widgets.load(); // For Twitter button.
    gapi.plusone.go(); // For Google plus button.
  IN.parse();// For Linkedin plus button.
});
</script>
<?php get_footer(); ?>
