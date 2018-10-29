<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id = $product->post->ID; 
$add_cart_path = site_url().'/?add-to-cart='.$product_id;
$_product = wc_get_product( $product_id  ); 

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
<div class="thumbbox prodloopbox">
<a href="<?php the_permalink(); ?>">
<?php if (has_post_thumbnail( $post->ID ) ){ ?>
<?php $image_url = MultiPostThumbnails::get_post_thumbnail_url('product', 'secondary-featured-image', NULL, 'full', NULL, TRUE); ?>               
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

<div class="cart_panel">
<?php 
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
?>
<?php
$prdid = get_the_ID();
$prd_terms = get_the_terms( $prdid , 'product_cat' );
$taxids = array(); 
foreach ($prd_terms as $prd_term) {
	$taxids[] = $prd_term->term_taxonomy_id;
}
if(empty($hide_add_to_cart_for_this_product) && $hide_add_to_cart_for_this_product[0] != 'hide'){
if(!in_array(125, $taxids))
  {
?>
<div class="cart_box">
<a rel="nofollow" data-product_sku="" class="button product_type_simple add_to_cart_button ajax_add_to_cart" href="<?php echo $add_cart_path; ?>" data-quantity="1" data-product_id="<?php echo $product_id; ?>" tabindex="0">Add To Cart</a>
</div>
<?php
  }
}else{
?>
 <div class="get_a_quote"> 
	<a href="#get_quote_1" class="red_btn_cls get_quote_popup" data-url="<?php echo get_the_permalink(); ?>" data-prodname="<?php echo get_the_title(); ?>">Get a Quote</a>
 </div> 
<?php 	
  }
?>

<?php
/*
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
<?php } */?>
</div>
</li>

