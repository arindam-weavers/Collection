<?php get_header(); ?>
<!--content section-->
<section class="product_container">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="inner_container">
            <h1>Search Results for "<?php echo $_GET['s'];?>"</h1>
            <div class="prodlistbox">
              <ul class="row grid effect-2" id="grid2">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <li class="col-sm-3 inrprd_box"> <a href="<?php the_permalink(); ?>">
                  <div class="thumb">
                    <?php if (has_post_thumbnail( get_the_ID())){ ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()),'fitness-product-small'); ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                    <?php } ?>
                  </div>
                  <div class="infobox">
                    <h5><?php the_title(); ?></h5>
                  </div>
                  </a>
                  <?php $meta = get_post_meta( get_the_ID()); ?>
                  <?php if(get_post_meta( get_the_ID(),'best_products',true)){?>
                  <span class="bestseller">Best Seller</span>
                  <?php } ?>
                  <?php if(get_post_meta( get_the_ID(),'featured_products',true)){?>
                  <span class="feature">Featured</span>
                  <?php } ?>
                </li>
                <?php $y=$y+1; endwhile; else: ?>
                <h2><?php _e('Not Found')?></h2>
                <p><?php _e('Sorry,no posts matched your criterias.'); ?></p>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_footer(); ?>
