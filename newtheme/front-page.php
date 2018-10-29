<?php get_header(); ?>

<!--content section-->

<main>

  <?php $grant_theme_notice_default_banr = get_theme_value('grant_theme_notice_default_banr'); ?>
  <?php if($grant_theme_notice_default_banr == 'commercial'){ ?>
  <style type="text/css">
  #CommercialSection { display: block; }
  #ResidentialSection { display: none; }
  </style>
  <?php } ?>
  <?php if($grant_theme_notice_default_banr == 'residential'){ ?>
  <style type="text/css">
  #CommercialSection { display: none; }
  #ResidentialSection { display: block; }
  </style>
  <?php } ?>


  <style type="text/css">
   li.productbox .thumbbox{
      min-height: 305px;
    }
  </style>
  

  <!--=================================Commercial Tab Section Starts=================================-->  

  <div id="CommercialSection">
    <section class="banner_section">
      <div class="banner_box">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 item_col main_leftcol">
              <div class="row">
                <div class="col-xs-7 item_box sub_leftcol">
          <?php
				  $z=1;
				  $args_logosldr = array('post_type'=>'gallery_showcase','order'=>'ASC','orderby'=>'menu_order','gallery_showcase_cat' => 'Commercial','posts_per_page' => 6); 
				  $wp_query = new WP_Query($args_logosldr);
				  while(have_posts()): the_post();
				  $showcase_link = get_post_meta($post->ID,'showcase_link',true);
				  ?>

                    <div class="<?php if($z==1||$z==6){ ?>extralarge_imgbox <?php }elseif($z==2){ ?>large_imgbox <?php }elseif($z==3){?>small_imgbox <?php }elseif($z==4||$z==5){ ?>medium_imgbox <?php } ?>image_itembox<?php if($z==1){ ?> no_hover<?php } ?>">

                    <div class="inner_imgbox">

					<?php if(has_post_thumbnail($post->ID)){ ?>

                    <?php if($z==1||$z==6){ ?>

					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-extralarge-img'); ?>

                    <?php }elseif($z==2){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normalarge-img'); ?>

                    <?php }elseif($z==3){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normasmall-img'); ?>

                    <?php }elseif($z==4||$z==5){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normmedium-img'); ?>

                    <?php } ?>

                    <?php
                    $get_post_id = get_the_ID();
                    if($get_post_id == 376){
                    ?>
                      <div id="home_banner_slider" class="home_banner_carousel_cus">
                            <?php
                              if( have_rows('add_first_showcase_image_gallery_setting', 376) ):
                              // loop through the rows of data
                              while ( have_rows('add_first_showcase_image_gallery_setting', 376) ) : the_row();
                              // display a sub field value
                              ?>
                              <div class="bx-banner-cus">
                                <img src="<?php echo get_sub_field('add_image_first_showcase_image_gallery_setting', 376); ?>" alt="pp"/>
                              </div>
                              <?php
                              endwhile;
                              else :
                              endif;
                            ?>
                       </div>     
                    
                    <?php }else{ ?>
                      <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>"/>
                    <?php 
                            } 
                          } 
                    ?>

                    </div>
					<?php if($z==1){ }else{ ?>
                    <div class="infobox">

                    <div class="title">

                    <h3><a href="#"><?php the_title(); ?></a></h3>

                    </div>

                    <div class="dsc">

                    <p><?php the_content(); ?></p>

                    <?php if(!empty($showcase_link)){ ?><a class="view_butn" href="<?php echo $showcase_link; ?>">View Link</a><?php } ?> </div>
                    <?php if(!empty($showcase_link)){ ?>
                    <!--<a href="<?php echo $showcase_link; ?>" class="block-link" style=" position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: block; font-size: 0; ">More</a>-->
                    <?php } ?>

                    </div>
					<?php } ?>
                    </div>

                    <?php if($z==1){ ?>

                    </div>

                    <div class="col-xs-5 item_box sub_rightcol">

                    <?php } ?>

                    <?php if($z==3){ ?>

                    </div>

                    </div>

                    </div>

                    <div class="col-md-6 item_col main_rightcol">

                    <div class="row">

                    <div class="col-xs-5 item_box sub_rightcol">

                    <?php } ?>

                    <?php if($z==5){ ?>

                    </div>

                    <div class="col-xs-7 item_box sub_leftcol">

                    <?php } ?>

                  <?php $z++; endwhile; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab_box">
      
        <ul>

          <li class="active"><a href="#"><span id="gggggrip">Commercial</span></a></li>

          <li><a href="#" id="ResidentialButton">Residential</a></li>

        </ul>

        <!--<div id="pp">&nbsp;</div>
        <div id="qq">&nbsp;</div>-->

      </div>

    </section>

    <section class="bestseller_section">

      <div class="container-fluid">

      	<?php 

		$grant_theme_cmrclbstsellr_title =	get_theme_value('grant_theme_cmrclbstsellr_title');

		$grant_theme_cmrclbstsellr_cotnt =	get_theme_value('grant_theme_cmrclbstsellr_cotnt');

		?>

        <div class="row">

          <div class="col-sm-12">

            <div class="infobox">

              <h1><?php echo $grant_theme_cmrclbstsellr_title; ?></h1>

              <p><?php echo $grant_theme_cmrclbstsellr_cotnt; ?></p>

            </div>

          </div>

        </div>

        <div class="sellersldier_section commercial_slider">

          <ul class="row owl-carousel" id="HomeBestSldr_Commercial">

			<?php
            $a = 1;
            $featured_products_one = get_post_meta( $post->ID, 'best_products',true );

            $args_cmcl_best = array( 'post_type' => 'fitness_product' , 'order' => 'DESC' , 'fitness_product_cat' => 'Commercial', 'meta_query' => array( array( 'key' => 'best_products','value' => 1,'compare' => '==') ) ); 

            $wp_query = new WP_Query($args_cmcl_best);

            while ( have_posts() ) : the_post(); 

            ?>

            <li class="productbox item">

              <div class="thumbbox"> <a href="<?php the_permalink(); ?>">

                <?php if (has_post_thumbnail( $post->ID ) ){ ?>

                <?php $image_url = MultiPostThumbnails::get_post_thumbnail_url('fitness_product', 'secondary-featured-image', NULL, 'full', NULL, TRUE); ?>

                <img src="<?php echo $image_url; ?>"  />

                <?php } ?>

                </a> </div>

              <div class="dscbox">

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <p>
                <?php 
                $blg_content = get_the_excerpt(); //echo substr($blg_content,0,120); 
                echo limit_words($blg_content,20);
                ?>
              </p>
              </div>

                <div class="get_a_quote"><a href="#get_quote_1" class="red_btn_cls get_quote_popup" data-url="<?php echo get_the_permalink(); ?>" data-prodname="<?php echo get_the_title(); ?>">Get a Quote</a></div>
              
            </li>


            <?php 
            $a++;
            endwhile; 
            wp_reset_query(); ?>

          </ul>

        </div>        

      </div>


    <div id="get_quote_1" style="display:none;">
        <div class="popup_quote_formbox">
            <h2>Get a Quote</h2>
            <p>We love questions! If you want to know more about our products or are looking for a quote on a commercial or residential build please use the form below(or call us during business hours).</p>
            <form name="contact_form_header_getquote" id="contact_form_header_1" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form_row"><input class="form-control" type="text" name="customer_first_name" id="customer_first_name" placeholder="First Name*"></div>
                        <div class="form_row"><input class="form-control" type="text" name="customer_last_name" id="customer_last_name" placeholder="Last Name*"></div>
                        <div class="form_row"><input class="form-control" type="email" name="customer_email_id" id="customer_email_id" placeholder="Email ID*"></div>
                        <div class="form_row"><input class="form-control" type="text" name="customer_contact_no" id="customer_contact_no" placeholder="Contact No.*"></div>
                        <div class="form_row"><input class="form-control" type="text" name="customer_product_name" id="customer_product_name" placeholder="Product Name*" readonly="readonly" ></div>

                        <input type="hidden" name="customer_product_url" id="customer_product_url" value="" >
                    </div>
                        <div class="col-xs-6">
                            <div class="form_row"><textarea class="form-control" placeholder="Message*" name="customer_message" id="customer_message" ></textarea></div>
                        </div>
                    <div class="col-xs-12">
                        <input type="submit" name="submit" id="customer_submit" value="Submit">
                        <div class="loader2"><img src="<?php echo get_template_directory_uri();?>/images/ajax-loader.gif"></div>
                    </div>
                </div>
            </form>

        <div class="success_msg">Your message was sent successfully. Thanks.</div>
        </div>               
    </div>

    </section>

    <?php

    $grant_theme_cmrclfrstprlx_image =	get_theme_value('grant_theme_cmrclfrstprlx_image');

	$grant_theme_cmrclfrstprlx_title =	get_theme_value('grant_theme_cmrclfrstprlx_title');

	$grant_theme_cmrclfrstprlx_cotnt =	get_theme_value('grant_theme_cmrclfrstprlx_cotnt');

	$grant_theme_cmrclfrstprlx_bnimg =	get_theme_value('grant_theme_cmrclfrstprlx_bnimg');

	$grant_theme_cmrclfrstprlx_bnlnk =	get_theme_value('grant_theme_cmrclfrstprlx_bnlnk');

	?>

    <section class="whatwelive_section" style="background:url(<?php echo $grant_theme_cmrclfrstprlx_image; ?>)top center no-repeat; background-size:cover;">

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-12">

            <div class="inner_container">

              <h2><?php echo $grant_theme_cmrclfrstprlx_title; ?></h2>

              <p><?php echo $grant_theme_cmrclfrstprlx_cotnt; ?></p>

              <a class="redbutn" href="<?php echo $grant_theme_cmrclfrstprlx_bnlnk; ?>"><img src="<?php echo $grant_theme_cmrclfrstprlx_bnimg;  ?>" alt=""></a> </div>

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

                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); ?>
                  <div class="imgthumb">
                  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                  </div>
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

            <div id="LogoBrndSlrRdntl" class="owl-carousel">

			<?php 

            $args_logosldr = array('post_type'=>'brand_logo','orderby' => 'menu_order','order' => 'ASC','posts_per_page' => -1); 

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

    <?php

    $grant_theme_cmrclscndprlx_image =	get_theme_value('grant_theme_cmrclscndprlx_image');

	$grant_theme_cmrclscndprlx_quote =	get_theme_value('grant_theme_cmrclscndprlx_quote');

	$grant_theme_cmrclscndprlx_athor =	get_theme_value('grant_theme_cmrclscndprlx_athor');

	?>

    <section class="testimonial_section" style="background:url(<?php echo $grant_theme_cmrclscndprlx_image; ?>)top center no-repeat; background-size:cover;">

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-12">

            <div class="testimonial_container">

              <p><?php echo $grant_theme_cmrclscndprlx_quote; ?></p>

              <h5><?php echo $grant_theme_cmrclscndprlx_athor; ?></h5>

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

                  <?php

				  $z=1;

				  $args_logosldr = array('post_type'=>'gallery_showcase','order'=>'ASC','orderby'=>'menu_order','gallery_showcase_cat' => 'Residential','posts_per_page' => 6); 

				  $wp_query = new WP_Query($args_logosldr);

				  while(have_posts()): the_post();

				  $showcase_link = get_post_meta($post->ID,'showcase_link',true);

				  ?>

                    <div class="<?php if($z==1||$z==6){ ?>extralarge_imgbox <?php }elseif($z==2){ ?>large_imgbox <?php }elseif($z==3){?>small_imgbox <?php }elseif($z==4||$z==5){ ?>medium_imgbox <?php } ?>image_itembox<?php if($z==1){ ?> no_hover<?php } ?>">

                    <div class="inner_imgbox">

					<?php if(has_post_thumbnail($post->ID)){ ?>

                    <?php if($z==1||$z==6){ ?>

					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-extralarge-img'); ?>

                    <?php }elseif($z==2){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normalarge-img'); ?>

                    <?php }elseif($z==3){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normasmall-img'); ?>

                    <?php }elseif($z==4||$z==5){ ?>

                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'galleryshowcase-normmedium-img'); ?>

                    <?php } ?>

                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>

                    <?php } ?>

                    </div>
					<?php if($z==1){ }else{ ?>
                    <div class="infobox">

                    <div class="title">

                    <h3><a href="<?php echo $showcase_link; ?>"><?php the_title(); ?></a></h3>

                    </div>

                    <div class="dsc">

                    <p><?php the_content(); ?></p>

                    <?php if(!empty($showcase_link)){ ?><a class="view_butn" href="<?php echo $showcase_link; ?>">View Link</a><?php } ?> </div>

                    </div>
					<?php } ?>
                    </div>

                    <?php if($z==1){ ?>

                    </div>

                    <div class="col-xs-5 item_box sub_rightcol">

                    <?php } ?>

                    <?php if($z==3){ ?>

                    </div>

                    </div>

                    </div>

                    <div class="col-md-6 item_col main_rightcol">

                    <div class="row">

                    <div class="col-xs-5 item_box sub_rightcol">

                    <?php } ?>

                    <?php if($z==5){ ?>

                    </div>

                    <div class="col-xs-7 item_box sub_leftcol">

                    <?php } ?>

                  <?php $z++; endwhile; ?>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="tab_box">

        <ul>

          <li class="CommercialButtonCus_btn"><a href="#" id="CommercialButton"><span id ="pppopkk">Commercial</span></a></li>

          <li class="active"><a href="#">Residential</a></li>

        </ul>

      </div>

    </section>

    <section class="bestseller_section">

      <div class="container-fluid">

        <?php 

		$grant_theme_rsdntbstsellr_title =	get_theme_value('grant_theme_rsdntbstsellr_title');

		$grant_theme_rsdntbstsellr_cotnt =	get_theme_value('grant_theme_rsdntbstsellr_cotnt');

		?>

        <div class="row">

          <div class="col-sm-12">

            <div class="infobox">

              <h1><?php echo $grant_theme_rsdntbstsellr_title; ?></h1>

              <p><?php echo $grant_theme_rsdntbstsellr_cotnt; ?></p>

            </div>

          </div>

        </div>

        <!--*****************************************************************************************-->        

        <div class="sellersldier_section residential_slider">

            	<ul class="row owl-carousel products" id="HomeBestSldr_Residential">                

				<?php
                //$featured_products_one = get_post_meta( $post->ID, 'best_products',true );
                global $product;
                $args_cmcl_best = array( 'post_type' => 'product' , 'order' => 'DESC' , 'product_cat' => 'Residential','meta_query' => array( array( 'key' => 'best_products','value' => 1,'compare' => '==') )); 
                $wp_query = new WP_Query($args_cmcl_best);
                while ( have_posts() ) : the_post(); 

                $image_url = MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-featured-image', NULL, 'full', NULL, TRUE);

                if(!empty($image_url)){
                ?>

                <li class="productbox item">

                    	<div class="thumbbox">

                        	<a href="<?php the_permalink(); ?>">

                            <?php if (has_post_thumbnail( $post->ID ) ){ ?>

													

									<img src="<?php echo $image_url; ?>"  />

								<?php } ?>

                            </a>

                        </div>

                        <div class="dscbox">

                        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                            <p><?php $blg_content = get_the_excerpt(); //echo substr($blg_content,0,120); 
                                echo limit_words($blg_content,20);
                            ?></p>

                        
                        </div>


                        <div class="cart_panel">

                          <?php 
                            global  $woocommerce;
                            $product_id = get_the_ID();
                            $hide_add_to_cart_for_this_product = get_field('hide_add_to_cart_for_this_product',$product_id); 
                            $_product = wc_get_product( $product_id  ); 
                            $add_cart_path = site_url().'/?add-to-cart='.$product_id;
                            if(empty($hide_add_to_cart_for_this_product) && $hide_add_to_cart_for_this_product[0] != 'hide'){
                            ?>
                            <div class="residential-price-tag">
                            <?php if ( $product->is_type( 'variable' ) ) { 
                            echo $_product->get_price_html(); 
                            }else{ 
                            $currency_symbol = get_woocommerce_currency_symbol();
                            $sale_price = $_product->get_sale_price();   
                            $regular_price =  $_product->get_regular_price(); 
                            if(!empty($sale_price)){
                              $sale_cls = 'has_sale_custom_tag' ;
                            }else{
                              $sale_cls = '' ;
                            }
                            ?>
                            <span class="woocommerce-Price-amount amount <?php echo $sale_cls; ?>"><span class="inner-price-cus"><span class="woocommerce-Price-currencySymbol"><?php echo $currency_symbol ; ?></span><?php echo wc_format_decimal($regular_price, 2); ?></span></span>
                            <?php if(!empty($sale_price)){ ?>
                            <span class="woocommerce-Price-amount amount sale-custom-tag"><span class="inner-price-cus"><span class="woocommerce-Price-currencySymbol"><?php echo $currency_symbol ; ?></span><?php echo wc_format_decimal($sale_price, 2); ?></span></span>
                            <?php 
                                }
                              }
                            ?>
                          </div>
                          <?php 
                          }else{
                          ?>
                          <div class="residential-price-tag"></div>
                          <?php  
                          }
                          if(!empty($hide_add_to_cart_for_this_product) && $hide_add_to_cart_for_this_product[0] == 'hide'){
                          ?> 
                          <div class="get_a_quote"> 
                          <a href="#get_quote_1" class="red_btn_cls get_quote_popup" data-url="<?php echo get_the_permalink(); ?>" data-prodname="<?php echo get_the_title(); ?>">Get a Quote</a>
                          </div> 
                          <?php
                          }else{
                          ?>
                          <div class="cart_box">
                          <a rel="nofollow" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart" href="<?php echo $add_cart_path; ?>" data-quantity="1" data-product_id="<?php echo $product_id; ?>" tabindex="0">Add To Cart</a>
                          </div>
                          <?php } ?>
                              
                              
                          
                        </div>

                    </li>    

                    <?php } ?>                

                   <?php endwhile; wp_reset_query(); ?> 

                </ul>

            </div>

      </div>

    </section>

    <?php 

	$grant_theme_rsdntfrstprlx_image =	get_theme_value('grant_theme_rsdntfrstprlx_image');

	$grant_theme_rsdntfrstprlx_title =	get_theme_value('grant_theme_rsdntfrstprlx_title');

	$grant_theme_rsdntfrstprlx_cotnt =	get_theme_value('grant_theme_rsdntfrstprlx_cotnt');

	$grant_theme_rsdntfrstprlx_bnimg =	get_theme_value('grant_theme_rsdntfrstprlx_bnimg');

	$grant_theme_rsdntfrstprlx_bnlnk =	get_theme_value('grant_theme_rsdntfrstprlx_bnlnk');

	?>

    <section class="whatwelive_section" style="background:url(<?php echo $grant_theme_rsdntfrstprlx_image; ?>)top center no-repeat; background-size:cover;">

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-12">

            <div class="inner_container">

              <h2><?php echo $grant_theme_rsdntfrstprlx_title; ?></h2>

              <p><?php echo $grant_theme_rsdntfrstprlx_cotnt; ?></p>

              <a class="redbutn" href="<?php echo $grant_theme_rsdntfrstprlx_bnlnk; ?>"><img src="<?php echo $grant_theme_rsdntfrstprlx_bnimg; ?>" alt=""></a> </div>

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
                  $featured_slider_new_args = array(
                    'post_type'   =>'product', 
                    'post_status' =>'publish', 
                    'posts_per_page'=> -1,
                    'order'     => 'DESC',
                    'meta_key' => 'featured_products',
                    'meta_value' => '1'
                  );
                $featured_slider_new_queries = new WP_Query($featured_slider_new_args);
                //$featured_slider_new_queries = get_posts( $featured_slider_new_args );
                if( $featured_slider_new_queries->have_posts()) : while ( $featured_slider_new_queries->have_posts() ) : $featured_slider_new_queries->the_post(); 

                  $featured_slider_new_post_id = get_the_ID();            

                $image_url_featured_slider = MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-featured-image', NULL, 'full', NULL, TRUE);
                //$image_featured_slider = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');

                //if(!empty($image_url_featured_slider)){
                ?>

				      <?php 

                /*$featured_products_four = get_post_meta($post->ID,'featured_products',true);

                $args_rlsldr = array('post_type'=>'fitness_product','order'=>'DESC','fitness_product_cat'=>'Residential','meta_query'=>array(array('key'=>'featured_products','value'=>1,'compare'=>'=='))); 

                $wp_query = new WP_Query($args_rlsldr);

                while(have_posts()): the_post(); */
                //$featured_slider_new_post_id = $featured_slider_new_query->ID;
                //$image_featured_slider = wp_get_attachment_image_src(get_post_thumbnail_id($featured_slider_new_post_id),'full');
                ?>

                <div class="item">
        
                  <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($featured_slider_new_post_id),'full'); ?>

                  <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" />


                  <?php if(get_post_meta($featured_slider_new_post_id,'slide_caption',true)){?>

                  <div class="ftrsldr_infbox" data-slidersss="<?php echo get_the_permalink($featured_slider_new_post_id); ?>">

                    <p>

                      <?php $slide_caption = get_post_meta($featured_slider_new_post_id,'slide_caption',true); echo $slide_caption; ?>

                    </p>

                  </div>

                  <?php } ?>

                </div>

                <?php 
                  endwhile; endif; wp_reset_query();
                ?>

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

            <div id="LogoBrndSlrCmrcl" class="owl-carousel">

			<?php 

            $args_logosldr = array('post_type'=>'brand_logo','orderby' => 'menu_order','order' => 'ASC','posts_per_page' => -1); 

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

    <?php 

	$grant_theme_rsdntscndprlx_image =	get_theme_value('grant_theme_rsdntscndprlx_image');

	$grant_theme_rsdntscndprlx_quote =	get_theme_value('grant_theme_rsdntscndprlx_quote');

	$grant_theme_rsdntscndprlx_athor =	get_theme_value('grant_theme_rsdntscndprlx_athor');

	?>

    <section class="testimonial_section" style="background:url(<?php echo $grant_theme_rsdntscndprlx_image;  ?>)top center no-repeat; background-size:cover;">

      <div class="container-fluid">

        <div class="row">

          <div class="col-sm-12">

            <div class="testimonial_container">

              <p><?php echo $grant_theme_rsdntscndprlx_quote; ?></p>

              <h5><?php echo $grant_theme_rsdntscndprlx_athor; ?></h5>

            </div>

          </div>

        </div>

      </div>

    </section>

  </div>

    <section class="bestseller_section blog_slider_section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="infobox">
              <h2>RECENT POSTS</h2>
            </div>
          </div>
        </div>


        <div class="blog_slider">

          <?php 
           $recent_blog_args = array( 
            'post_type' => 'post' , 
            'order' => 'DESC', 
            'posts_per_page' => 14
            ); 
            $recent_blog_wp_query = new WP_Query($recent_blog_args);
            
          ?>
          <ul class="row owl-carousel owl-loaded owl-drag" id="recent_blog_slider">
          <?php 
          if ( $recent_blog_wp_query->have_posts() ): while ( $recent_blog_wp_query->have_posts() ) : $recent_blog_wp_query->the_post();  
          ?>
           <li class="productbox item">

              <div class="thumbbox"> 
                <a href="<?php the_permalink(); ?>">
                <?php //if (has_post_thumbnail( $post->ID ) ){ ?>
                <?php $image_url = MultiPostThumbnails::get_post_thumbnail_url('post', 'secondary-featured-image', NULL, 'full', NULL, TRUE); ?>
                <img src="<?php echo $image_url; ?>"  />
                <?php //} ?>

                </a> 
              </div>

              <div class="dscbox">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p>
                <?php 
                $blg_content = get_the_excerpt(); //echo substr($blg_content,0,120); 
                echo limit_words($blg_content,8);
                ?>
              </p>

                <a href="<?php the_permalink(); ?>" class="rd_mr_cls">READ MORE</a>
              </div>

            </li>

             <?php 
           endwhile; endif;
            wp_reset_query(); 
         ?>


          </ul>

          <a href="<?php echo get_the_permalink(1026); ?>" class="view_all_btn">View All Posts</a>
        </div> 

    </div>
   </section>

  <!--==================================Residential Tab Section Ends==================================--> 

</main>

<!--content section-->




<?php get_footer(); ?>