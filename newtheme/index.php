<?php get_header(); ?>
<!--content section-->
<main>
  <!--=================================Commercial Tab Section Starts=================================-->  
  <div id="CommercialSection">
    <section class="banner_section">
      <div class="banner_box">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 item_col main_leftcol">
              <div class="row">
                <div class="col-xs-7 item_box sub_leftcol">
                  <div class="extralarge_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a1.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 item_box sub_rightcol">
                  <div class="large_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a2.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                  <div class="small_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a3.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 item_col main_rightcol">
              <div class="row">
                <div class="col-xs-5 item_box sub_rightcol">
                  <div class="medium_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a4.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                  <div class="medium_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a5.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-7 item_box sub_leftcol">
                  <div class="extralarge_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a6.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab_box">
        <ul>
          <li class="active"><a href="#">Commercial</a></li>
          <li><a href="#" id="ResidentialButton">Residential</a></li>
        </ul>
      </div>
    </section>
    <section class="bestseller_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="infobox">
              <h1>Bestsellers</h1>
              <p>The Apple Fitness Store stands behind all of the products we sell. That said,there are certain products that standout as exceptional because of their durability and track record.</p>
            </div>
          </div>
        </div>
        <div class="sellersldier_section">
          <ul class="row owl-carousel" id="HomeBestSldr_Commercial">
			<?php
            $featured_products_one = get_post_meta( $post->ID, 'best_products',true );
            $args_cmcl_best = array( 'post_type' => 'fitness_product' , 'order' => 'DESC' , 'fitness_product_cat' => 'Commercial', 'meta_query' => array( array( 'key' => 'best_products','value' => 1,'compare' => '==') ) ); 
            $wp_query = new WP_Query($args_cmcl_best);
            while ( have_posts() ) : the_post(); 
            ?>
            <li class="productbox item">
              <div class="thumbbox"> <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fitness-product-small' ); ?>
                <img src="<?php echo $image[0]; ?>"  />
                <?php } ?>
                </a> </div>
              <div class="dscbox">
                <h2><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h2>
                <p>
                  <?php $blg_content = get_the_excerpt(); echo substr($blg_content,0,120); ?>
                </p>
                <a class="more_butn" href="<?php the_permalink(); ?>">More</a> </div>
            </li>
            <?php endwhile; wp_reset_query(); ?>
          </ul>
        </div>        
      </div>
    </section>
    <section class="whatwelive_section" style="background:url(<?php bloginfo('template_directory'); ?>/images/fitness_image.jpg)top center no-repeat; background-size:cover;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <h2>Eros consequat a dis</h2>
              <p>Morbi blandit ridiculus pulvinar quis vulputate a lobortis per  vestibulum ridiculus pulvinar.</p>
              <a class="redbutn" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/wahtwelive_text.png" alt=""></a> </div>
          </div>
        </div>
      </div>
    </section>
    <section class="featured_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <h2>Featured</h2>
              <div id="HomeFtrdSldr_Commercial" class="owl-carousel">
				<?php 
                $featured_products_four = get_post_meta($post->ID,'featured_products',true);
                $args_rlsldr = array('post_type'=>'fitness_product','order'=>'DESC','fitness_product_cat'=>'Commercial','meta_query'=>array(array('key'=>'featured_products','value'=>1,'compare'=>'=='))); 
                $wp_query = new WP_Query($args_rlsldr);
                while(have_posts()): the_post(); 
                ?>
                <div class="item">
                  <?php if(has_post_thumbnail($post->ID)){ ?>
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'product-slide-image'); ?>
                  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                  <?php } ?>
                  <?php if(get_post_meta($post->ID,'slide_caption',true)){?>
                  <div class="ftrsldr_infbox">
                    <?php $slide_caption = get_post_meta($post->ID,'slide_caption',true); echo $slide_caption; ?>
                  </div>
                  <?php } ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="associatedlogo_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div id="LogoBrndSlr" class="owl-carousel">
			<?php 
            $args_logosldr = array('post_type'=>'brand_logo','order'=>'DESC','posts_per_page' => -1); 
            $wp_query = new WP_Query($args_logosldr);
            while(have_posts()): the_post();    
            $brand_url = get_post_meta($post->ID,'brand_url',true);    
            $brand_logo_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'brand-logo-id', NULL, 'full', NULL, TRUE);
            if( $brand_logo_image_url ) {
            ?>
              <div class="item"> <a href="<?php echo $brand_url; ?>" target="_blank"> <img src="<?php echo $brand_logo_image_url; ?>"> </a> </div>
              <?php } ?>
              <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="testimonial_section" style="background:url(<?php bloginfo('template_directory'); ?>/images/testimonialbg.jpg)top center no-repeat; background-size:cover;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="testimonial_container">
              <p>Morbi blandit ridiculus pulvinar quis vulputate a lobortis vestibulum per</p>
              <h5>Ridiculus Pulvinar</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--==================================Commercial Tab Section Ends===================================--> 
  <!--=================================Residential Tab Section Starts=================================-->
  <div id="ResidentialSection">
    <section class="banner_section">
      <div class="banner_box">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 item_col main_leftcol">
              <div class="row">
                <div class="col-xs-7 item_box sub_leftcol">
                  <div class="extralarge_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a6.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-5 item_box sub_rightcol">
                  <div class="medium_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a4.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                  <div class="medium_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a5.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 item_col main_rightcol">
              <div class="row">
                <div class="col-xs-5 item_box sub_rightcol">
                  <div class="large_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a2.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                  <div class="small_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a3.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-7 item_box sub_leftcol">
                  <div class="extralarge_imgbox image_itembox">
                    <div class="inner_imgbox"><img src="<?php bloginfo('template_directory'); ?>/images/banner_image-a1.jpg" alt=""></div>
                    <div class="infobox">
                      <div class="title">
                        <h3><a href="#">Apple Fitness</a></h3>
                      </div>
                      <div class="dsc">
                        <p>The Apple Fitness Store stands behind all of the products we sell.</p>
                        <a class="view_butn" href="#">View Link</a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab_box">
        <ul>
          <li><a href="#" id="CommercialButton">Commercial</a></li>
          <li class="active"><a href="#">Residential</a></li>
        </ul>
      </div>
    </section>
    <section class="bestseller_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="infobox">
              <h1>Bestsellers</h1>
              <p>The Apple Fitness Store stands behind all of the products we sell. That said,there are certain products that standout as exceptional because of their durability and track record.</p>
            </div>
          </div>
        </div>
        <!--*****************************************************************************************-->        
        <div class="sellersldier_section">
            	<ul class="row owl-carousel" id="HomeBestSldr_Residential">                
				<?php
                $featured_products_one = get_post_meta( $post->ID, 'best_products',true );
                $args_cmcl_best = array( 'post_type' => 'fitness_product' , 'order' => 'DESC' , 'fitness_product_cat' => 'Residential', 'meta_query' => array( array( 'key' => 'best_products','value' => 1,'compare' => '==') ) ); 
                $wp_query = new WP_Query($args_cmcl_best);
                while ( have_posts() ) : the_post(); 
                ?>
                <li class="productbox item">
                    	<div class="thumbbox">
                        	<a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fitness-product-small' ); ?>								
									<img src="<?php echo $image[0]; ?>"  />
								<?php } ?>
                            </a>
                        </div>
                        <div class="dscbox">
                        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php $blg_content = get_the_excerpt(); echo substr($blg_content,0,120); ?></p>
                            <a class="more_butn" href="<?php the_permalink(); ?>">More</a>
                        </div>
                    </li>                    
                   <?php endwhile; wp_reset_query(); ?> 
                </ul>
            </div>
      </div>
    </section>
    <section class="whatwelive_section" style="background:url(<?php bloginfo('template_directory'); ?>/images/fitness_image.jpg)top center no-repeat; background-size:cover;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <h2>Eros consequat a dis</h2>
              <p>Morbi blandit ridiculus pulvinar quis vulputate a lobortis per  vestibulum ridiculus pulvinar.</p>
              <a class="redbutn" href="#"><img src="<?php bloginfo('template_directory'); ?>/images/wahtwelive_text.png" alt=""></a> </div>
          </div>
        </div>
      </div>
    </section>
    <section class="featured_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <h2>Featured</h2>
              <div id="HomeFtrdSldr_Residential" class="owl-carousel">
				<?php 
                $featured_products_four = get_post_meta($post->ID,'featured_products',true);
                $args_rlsldr = array('post_type'=>'fitness_product','order'=>'DESC','fitness_product_cat'=>'Residential','meta_query'=>array(array('key'=>'featured_products','value'=>1,'compare'=>'=='))); 
                $wp_query = new WP_Query($args_rlsldr);
                while(have_posts()): the_post(); 
                ?>
                <div class="item">
                  <?php if(has_post_thumbnail($post->ID)){ ?>
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'product-slide-image'); ?>
                  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                  <?php } ?>
                  <?php if(get_post_meta($post->ID,'slide_caption',true)){?>
                  <div class="ftrsldr_infbox">
                    <p>
                      <?php $slide_caption = get_post_meta($post->ID,'slide_caption',true); echo $slide_caption; ?>
                    </p>
                  </div>
                  <?php } ?>
                </div>
                <?php endwhile; wp_reset_query(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="associatedlogo_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div id="LogoBrndSlr" class="owl-carousel">
			<?php 
            $args_logosldr = array('post_type'=>'brand_logo','order'=>'DESC','posts_per_page' => -1); 
            $wp_query = new WP_Query($args_logosldr);
            while(have_posts()): the_post();    
            $brand_url = get_post_meta($post->ID,'brand_url',true);    
            $brand_logo_image_url = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'brand-logo-id', NULL, 'full', NULL, TRUE);
            if( $brand_logo_image_url ) {
            ?>
              <div class="item"> <a href="<?php echo $brand_url; ?>" target="_blank"> <img src="<?php echo $brand_logo_image_url; ?>"> </a> </div>
              <?php } ?>
              <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="testimonial_section" style="background:url(<?php bloginfo('template_directory'); ?>/images/testimonialbg.jpg)top center no-repeat; background-size:cover;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="testimonial_container">
              <p>Morbi blandit ridiculus pulvinar quis vulputate a lobortis vestibulum per</p>
              <h5>Ridiculus Pulvinar</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--==================================Residential Tab Section Ends==================================--> 
</main>
<!--content section-->
<?php get_footer(); ?>