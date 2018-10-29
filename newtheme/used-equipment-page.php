<?php /*Template Name: Layout: Used Equipment*/?>
<?php get_header(); ?>
<!--body section-->
<div class="inner_single_section grey_container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            	<?php if (have_posts()) : ?>
                <div class="eqpmntbanner_section">
                    <div class="sliderbox">
						<?php
                        $used_equipment_banner = MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'top-banner-image', NULL, 'used-equipment-banner', NULL, TRUE);
                        if($used_equipment_banner){ ?>
                        <img src="<?php echo $used_equipment_banner; ?>" alt="<?php the_title(); ?>">
                        <?php }else{ ?>
                        <img src="<?php bloginfo('template_directory'); ?>/images/equipment_banner.jpg" alt="<?php the_title(); ?>" />
                        <?php } ?>
                    </div>
                    <div class="infobox">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
                
            <div class="eqpmnt_container">
                <div class="eqp_greybox">
                	<p><?php the_content(); ?></p>
                </div>    
                <div class="searchresult_section">
                	<div id="enquire" class="enquire_form" style="display:none">
                	<h2>Used Equipment Enquiry Form</h2>
                    <div class="eqpmnt_formbox">        
                    	<?php echo do_shortcode('[contact-form-7 id="367" title="Popup Contact Form"]'); ?>
                    </div>
                </div>
                <!--<h2>Search Result</h2>-->
                <h2>Current Used Equipment</h2>
                
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array( 'post_type' => 'used_equipment','paged' => $paged , 'order' => 'DESC','posts_per_page' => -1); 
                $wp_query = new WP_Query($args);
                while ( have_posts() ) : the_post();    
                ?>
                <div class="resultbox">
                	<div class="innerbox">
                        <div class="thumb">
                            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'used-equipment-thumb' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"/>
                            <?php }else{ ?>
                            <img width="230" height="150" src="<?php bloginfo('template_directory'); ?>/images/search-result-noimage.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <h4><?php $type_name = wp_get_post_terms($post->ID, $epmnt_type_taxmy, array("fields" => "names")); echo $type_name[0]; ?>
                        <br />
                        <?php $year_name = get_post_meta ($post->ID,'_year_section_value_key', true); if($year_name == 'None'){}else{ echo $year_name; } ?>
                        <br />
                        <?php $cntn_id = get_post_meta ($post->ID,'_condition_section_value_key', true);?>
                        <?php $condtn_tax = wp_get_post_terms($post->ID, 'equipment_condition'); foreach($condtn_tax as $cd){ echo $cd->name; }?></h4>
                        <div class="price">$ <?php $price_value = get_post_meta ($post->ID,'_price_section_value_key', true); echo $price_value; ?></div>       
                        <a class="enq_butn fancybox" href="#enquire" datatitle="<?php the_title(); ?>" dataprice="<?php echo '$'.$price_value; ?>">Enquire Now</a>
                    </div>
                </div>
                <?php  endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--body section-->
<?php get_footer(); ?>