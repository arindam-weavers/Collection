<?php /*Template Name: Layout: Location Page*/?>
<?php get_header(); ?>
<!--content section-->
<main>
	<section class="inner_single_section">
    	<div class="container">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
        	<div class="row">
            	<div class="col-sm-12">
                	<div class="single_inner">
                    	<h1><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                        <div class="location_box">
                        	<div class="row">
                            	<div class="col-sm-5">
                                    	<?php if(is_active_sidebar('location-page-1st-address-info')): dynamic_sidebar('location-page-1st-address-info'); endif; ?>
                                </div>
                                <div class="col-sm-7">
                                    	<?php if(is_active_sidebar('location-page-1st-address-map')): dynamic_sidebar('location-page-1st-address-map'); endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="location_box">
                        	<div class="row">
                            	<div class="col-sm-5">
                                    	<?php if(is_active_sidebar('location-page-2nd-address-info')): dynamic_sidebar('location-page-2nd-address-info'); endif; ?>
                                </div>
                                <div class="col-sm-7">
                                    	<?php if(is_active_sidebar('location-page-2nd-address-map')): dynamic_sidebar('location-page-2nd-address-map'); endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
            <div class="row">
            	<div class="col-sm-12">
                	<div class="single_inner">
                        <h1><?php _e('Not Found') ?></h1>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<!--content section-->
<?php get_footer(); ?>