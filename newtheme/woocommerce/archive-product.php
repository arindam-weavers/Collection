<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>



<section class="product_container"  id="art_ajdiv">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="inner_container">
          <h1><?php single_cat_title(); ?></h1>
          	<div class="prodlistbox slowload">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action( 'woocommerce_before_main_content' );
	?>



		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				
				
				

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

					

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>
			
		</div>

		</div>
      </div>
    </div>
  </div>
</section>


<section class="bestseller_section">
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
<style type="text/css">
.slowload{
	display: none;
}
</style>

<?php get_footer( 'shop' ); ?>
