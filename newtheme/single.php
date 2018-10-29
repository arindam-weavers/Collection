<?php get_header(); ?>
<!--content section-->
<main>
  <section class="inner_single_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="single_inner">
			<?php while ( have_posts() ) : the_post(); ?>
            <div class="blogCntr">
            <div class="blog_thumb">
            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-large-thumb' ); ?>								
            <img src="<?php echo $image[0]; ?>"  />
            <?php } ?>
            </div>
            <div class="single_left">
            <?php echo get_post_time('j M Y'); ?>
            </div>
            <div class="single_right">
            <div class="scl_sec">
            <div class="share-box">
            <div class="share-buttons">	
            <div class="share-button-wrap facebook">
            <div class="share-button" data-service="facebook" title="">
            <i class="icon-facebook icon"></i>
            <div><div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-type="button_count"></div></div>
            </div>
            </div>            
            <div class="share-button-wrap twitter">
            <div class="share-button" data-service="twitter" title="">
            <i class="icon-twitter icon"></i>
            <div><a href="<?php echo get_permalink(); ?>" class="twitter-share-button" data-lang="en">Tweet</a></div>
            </div>
            </div>            
            <div class="share-button-wrap linkedin">
            <div class="share-button" data-service="linkedin" title="">
            <i class="icon-linkedin icon"></i>
            <div><script type="IN/Share" data-url="<?php echo get_permalink(); ?>" data-counter="right"></script></div>
            </div>
            </div>            
            <div class="share-button-wrap googleplus">
            <div class="share-button" data-service="googleplus" title="">
            <i class="icon-google-plus icon"></i>
            <div><div class="g-plus" data-action="share" data-annotation="none" data-href="<?php echo get_permalink(); ?>"></div></div>
            </div>
            </div>          
            </div>
            </div>
            </div>
            <h1><?php the_title();?></h1>
            <?php the_content(); ?>

            
            </div>
            <div class="clear"></div>
            </div>
            <?php endwhile; ?>
    	  </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!--content section-->
<?php get_footer(); ?>