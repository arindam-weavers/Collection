<?php get_header(); ?>
<!--body section-->
<main>  
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <section class="producttab_section">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="inner_container">
            <ul>
              <?php $thecontent = get_the_content(); if(!empty($thecontent)){?>
              <li class="list active"><a href="#listscroll">list</a></li>
              <?php } ?>
              <?php if(get_post_meta($post->ID, 'measurement-height',true)|| get_post_meta($post->ID, 'measurement-length',true)|| get_post_meta($post->ID, 'measurement-width',true)|| get_post_meta($post->ID, 'features',true)|| get_post_meta($post->ID, 'specifications',true)){?>
              <li class="info"><a href="#infoscroll">info</a></li>
              <?php } ?>
               <?php if(get_post_meta($post->ID, '_console_post_item',true)){?>
              <li class="computer"><a href="#computerscroll">computer</a></li>
              <?php } ?>
              <!--<li class="camera"><a href="#cameracroll">camera</a></li>-->              
              <?php if(get_post_meta($post->ID, 'video_frame',true)){?>
              <li class="play"><a href="#playscroll">play</a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section class="product_container" id="listscroll">
      
      <div class="prod_dtls_logo_section">
          <div class="inner_container">
              <div class="row">
                  <div class="col-sm-12">
                      <div class="company_logo">
                        <?php
                        $company_image = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'product-company-logo-id', NULL, 'large', NULL, TRUE);
                        if($company_image){
                        ?>
                        <img src="<?php echo $company_image; ?>" alt="<?php the_title(); ?>">
                        <?php } ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <div id="prod_dtls_midsection" class="prod_dtls_midsection">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-6 left_col">
                      <div id="left_box" class="left_box">
                        <div class="prod_thumb_box">
                            <?php if(has_post_thumbnail($post->ID)){ ?>
                            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'fitness-product-large');
                              $featured_image = $image[0];
                             ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                            <?php } ?>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6 right_col">
                      <div id="right_box" class="right_box">
                          <div class="infobox">
                            <h1><?php the_title(); ?></h1>
                            <h2><?php if(get_post_meta($post->ID, 'product_sub_title',true)){ echo get_post_meta($post->ID, 'product_sub_title',true); } ?></h2>
                            <p><?php the_content(); ?></p>
                          </div>
                          <div class="cartbox">
                            <div class="quote_box">
                                <a href="#get_quote_1" class="red_btn_cls get_quote_popup" data-url="<?php echo get_the_permalink(); ?>" data-prodname="<?php echo get_the_title(); ?>">Get a Quote</a>
                            </div>
                            
                          </div>
                          <div class="contact_panel">
                              <ul>
                                  <li><a href="#">Live Chat</a></li>
                                  <li><a href="#">403-255-2299</a></li>
                                  <li><a href="#">Email Us</a></li>
                              </ul>
                          </div>
                          <div class="share_box">
                              <ul>
                                  <!--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                  <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                                   <li><a href="http://twitter.com/intent/tweet?status=<?php the_content(); ?>+<?php echo get_the_permalink($post->ID); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a></li>
              <li><a  href="javascript:void(0)" class="fb_share" data-url="<?php echo get_the_permalink($post->ID); ?>" data-image="<?php echo $featured_image;?>" data-title="<?php the_title(); ?>" data-description="<?php the_content(); ?>"><i class="fa fa-facebook"></i></a></li>
              <li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $featured_image;?>&url=<?php echo get_the_permalink($post->ID); ?>&is_video=false&description=<?php the_title(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-pinterest"></i></a></li>
                              </ul>
                              <h6>Share</h6>
                          </div>
                      </div>
                  </div>
              </div>
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
      
    
    <?php if(get_post_meta($post->ID, 'measurement-height',true)|| get_post_meta($post->ID, 'measurement-length',true)|| get_post_meta($post->ID, 'measurement-width',true)|| get_post_meta($post->ID, 'measurement-weight',true)){?>
    <div class="productinfo_section" id="infoscroll">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <div class="row">
                <?php if(get_post_meta($post->ID, 'measurement-height',true)|| get_post_meta($post->ID, 'measurement-length',true)|| get_post_meta($post->ID, 'measurement-width',true)){?>
                <div class="col-xs-6 itembox">
                  <ul class="dms">
                    <?php if(get_post_meta($post->ID, 'measurement-height',true)){?>
                    <li>H: <span class="bold_text"><?php echo get_post_meta($post->ID, 'measurement-height',true)?></span></li>
                    <?php } ?>
                    <?php if(get_post_meta($post->ID, 'measurement-length',true)){?>
                    <li>L: <span class="bold_text"><?php echo get_post_meta($post->ID, 'measurement-length',true)?></span></li>
                    <?php } ?>
                    <?php if(get_post_meta($post->ID, 'measurement-width',true)){?>
                    <li>W: <span class="bold_text"><?php echo get_post_meta($post->ID, 'measurement-width',true)?></span></li>
                    <?php } ?>
                  </ul>
                </div>
                <?php } ?>
                <?php if(get_post_meta($post->ID, 'measurement-weight',true)){?>
                <div class="col-xs-6 itembox">
                  <ul class="wgt">
                    <li>W: <span class="bold_text"><?php echo get_post_meta($post->ID, 'measurement-weight',true)?></span></li>
                  </ul>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if(get_post_meta($post->ID, 'features',true)){?>
    <div class="productfeature_section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <div class="row">
                <?php if(get_post_meta($post->ID, 'features',true)){?>
                <div class="col-md-6 itembox">
                  <h3>Features</h3>
                  <?php 
          $features = get_post_meta($post->ID, 'features',true);
          $newstring = "<ul>";
          $bits = explode("\n", $features);
          $count = count($bits);
          $first_col = ceil($count/2);
          $second_col = $count-$first_col;
          $i = 1;
          foreach($bits as $bit){
            $newstring .= "<li>" . $bit . "</li>";
            if($i==$first_col){
              $newstring .= '</ul></div><div class="col-md-6 itembox"><h3>&nbsp;</h3><ul>';
              }
            $i++;
            }
          $newstring .= "</ul>";
          echo $newstring;
          ?>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if(get_post_meta($post->ID, 'full_description',true)){?>
    <div class="productdesc_section">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <h3>Full Description</h3>
              <p>
                <?php $full_description = get_post_meta($post->ID, 'full_description',true); echo $full_description; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php


  $console_items = get_post_meta($post->ID, '_console_post_item',true);
  $consoles = explode(',',$console_items);
  //echo "ssssssssssssss";
    //print_r($console_items);
  if(!empty($console_items)){
  ?>
    <div class="productconsole_section" id="computerscroll"> 
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div id="InnnrConsoleSldr" class="owl-carousel">
              <?php foreach($consoles as $items){?>
              <div class="item">
                <div class="inner_container">                 
                  <?php $content_post = get_post($items); ?>
                  <div class="thumbbox">
          <?php if(has_post_thumbnail($content_post->ID)){ ?>
                    <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($content_post->ID), 'full'); ?>
                    <img src="<?php echo $image[0]; ?>"  />
                    <?php } ?>                    
                  </div>
                  <div class="infobox">
                    <div class="console_logo">
                     <?php 
          $console_company_image = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'product-console-company-logo-id', NULL, 'product-console-company-logo', NULL, TRUE);
          ?>
                    <?php if($console_company_image){ ?>
                    <img src="<?php echo $console_company_image; ?>" alt="">
                    <?php }else{ ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/liffitness_biglogo.png" alt="" />
                    <?php } ?>
                    </div>
                    <h3>Console</h3>
                    <p>
                      <?php 
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            echo $content;
            $console_link = get_post_meta($post->ID, 'console_link',true);
            ?>
                    </p>
                    <div> <a href="<?php echo get_permalink($content_post->ID); ?>">Read More</a> </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if(get_post_meta($post->ID, 'video_frame',true)){?>
    <div class="productvdo_section" id="playscroll">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner_container">
              <div class="vdobox">
                <?php $video_frame = get_post_meta($post->ID, 'video_frame',true); ?>
                <?php if($video_frame){ ?>
                <?php 
        $video_len = strlen($video_frame); 
        $video_pos = strpos($video_frame, '=')+1;
        $video_nxtlen = $video_len-$video_pos;
        $video_code = substr($video_frame, $video_pos, 11);  
        ?>
                <iframe src="//www.youtube.com/embed/<?php echo $video_code; ?>?feature=player_detailpage" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                <?php }else{ ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/product_vdo.jpg" alt="" />
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </section>
  <?php endwhile; else: ?>
  <h2><?php _e('Not Found')?></h2>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</main>


<script type="text/javascript">
 ///////////////////////////////////////// FB Share /////////////////////////////////////

  window.fbAsyncInit = function(){
  FB.init({
    appId: '649012348520869', status: true, cookie: true, xfbml: true }); 
  };
  (function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; 
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
    
  
  jQuery("a.fb_share").click(function() {
    var url = jQuery(this).data('url');
    var image = jQuery(this).data('image');
    var title = jQuery(this).data('title');
    var desc = jQuery(this).data('description');
    
    var obj = {method: 'feed',link: url, picture: image,name: title,description: desc};
    function callback(response){}
    FB.ui(obj, callback);
  
  });

  ///////////////////////////////////////// FB Share end /////////////////////////////////////
</script>

<?php get_footer(); ?>