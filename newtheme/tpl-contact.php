<?php /*Template Name: Layout: Contact Page*/?>
<?php get_header(); ?>
<!--content section-->
<main>
	<section class="inner_single_section">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                	<div class="single_inner">
                    	<h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                        <div class="contact_lowerform">
                            <form name="contact_page_form" id="contact_page_form" method="post">
                                <div class="contact_formbox" >
                                <div class="row">
                                <div class="col-xs-12">
                                <input class="form-control" type="text" name="contact_page_first_name" id="contact_page_first_name" placeholder="First Name">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12">
                                <input class="form-control" type="text" name="contact_page_last_name" id="contact_page_last_name" placeholder="Last Name">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12">
                                <input class="form-control" type="email" name="contact_page_email_id" id="contact_page_email_id" placeholder="Email ID">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12">
                                <input class="form-control" type="text" name="contact_page_contact_no" id="contact_page_contact_no" placeholder="Phone (optional)">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12">
                                <textarea class="form-control" placeholder="Comment" name="contact_page_message" id="contact_page_message" ></textarea>
                                </div>
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                <div class="col-sm-12 text-center">
                                <input type="submit" name="submit" id="submit" value="Submit">
                                <div class="contact_page_loader"><img src="<?php echo get_template_directory_uri();?>/images/ajax-loader.gif"></div>
                                </div>
                                </div>
                                </div>
                                <?php $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
                                <input id="contact_page_current_url" name="contact_page_current_url" type="hidden" value="<?php echo $current_url;?>"/>
                            </form>
                            <div class="contact_page_success_msg">Your message was sent successfully. Thanks.</div>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<!--content section--> 
<?php get_footer(); ?>