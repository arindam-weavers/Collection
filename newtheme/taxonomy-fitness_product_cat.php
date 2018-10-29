<?php get_header(); ?>

<section class="product_container"  id="art_ajdiv">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="inner_container">
          <h1><?php single_cat_title(); ?></h1>
          <?php
          /*$queried_object = get_queried_object();
          $service_category_id = $queried_object->term_id;
          $service_category_name = $queried_object->name;*/
          ?>
          <?php 
          $TermID = get_queried_object()->term_id;
          // echo $TermID ;
          ?>

          <div class="prodlistbox">
            <div id="container"><div id="content" role="main">
              <ul class="grid_custom effect-2 products" id="grid_2_custom">
<?php
      $fitness_product_cat_args = array(
      'post_type' => 'fitness_product',
      'posts_per_page' => -1,
      'order' => 'DESC',
      //'paged' => $paged,
      //$taxonomy->query_var => $term->slug,
      'tax_query' => array(
        array(
          'taxonomy' => 'fitness_product_cat',
          'field' => 'id',
          'terms' => $TermID,
        )
      ),
    );
    $fitness_product_cat_query = new WP_Query($fitness_product_cat_args);
    if ( $fitness_product_cat_query->have_posts() ) : while ( $fitness_product_cat_query->have_posts() ) : $fitness_product_cat_query->the_post();

  $product_id = get_the_ID(); 
    $featured_products = get_post_meta($product_id,'featured_products',true);
$best_products = get_post_meta($product_id,'best_products',true);
    
    ?>

                <li class="col-md-3 col-sm-6 col-xs-6 box single_item"> 
                  
                  <?php if($featured_products == 1){ ?> 
                  <span class="feature_tag">Featured</span>
                  <?php } ?>
                  <?php if($best_products == 1){ ?> 
                  <span class="bestseller_tag">Best Seller</span>
                  <?php } ?>
                <div class="thumbbox">
                <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                <?php $image_url = MultiPostThumbnails::get_post_thumbnail_url('fitness_product', 'secondary-featured-image', NULL, 'full', NULL, TRUE); ?>               
                <img src="<?php echo $image_url; ?>"  />
                <?php } ?>
                </a>
                </div>
                <div class="dscbox">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php $blg_content = get_the_excerpt(); //echo substr($blg_content,0,120); 
                echo limit_words($blg_content,15);
                ?></p>
                </div>

                <div class="get_a_quote"><a href="#get_quote_1" class="red_btn_cls get_quote_popup" data-url="<?php echo get_the_permalink(); ?>" data-prodname="<?php echo get_the_title(); ?>">Get a Quote</a></div>

                </li>

    <?php
    endwhile;  
    endif;      
    //wp_reset_postdata();
    ?> 

  </ul>

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
</div>
</div>






          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>
