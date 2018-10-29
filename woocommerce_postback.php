<?php
/**
 * @package Woocommerce Postback Plugin
 * @version 1.0
 */
/*
Plugin Name: Woocommerce Postback Plugin
Plugin URI: #
Description: Sends Woocommerce Data Postback to XXXXX
Author: Grant
Version: 1.0
Author URI: #
Text Domain: woocommerce-plugin
*/
add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'Product Cvalue', 'custom_meta_box_markup', 'product', 'normal', 'high' );
}
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <label for="cvalue">CValue</label>
    <input name="cvalue" type="text" value="<?php echo get_post_meta($object->ID, "cvalue", true); ?>">
    <?php  
}
function save_custom_meta_box($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "product";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $meta_box_dropdown_value = "";
    $meta_box_checkbox_value = "";

    if(isset($_POST["cvalue"]))
    {
        $meta_box_text_value = $_POST["cvalue"];
    }   
    update_post_meta($post_id, "cvalue", $meta_box_text_value);
}

add_action("save_post", "save_custom_meta_box", 10, 3);

function woocompostback($order_id){
    //create an order instance
    $order = wc_get_order($order_id);
    $paymethod = $order->payment_method_title;
    $orderstat = $order->get_status();
    $encoded = do_shortcode('[encoded_guid]');
    //$cvalue = '40';   
    $order_data = $order->get_data();
    $order_tot = $order_data['total'];
    $order_id = $order_data['id'];
    //echo $order->get_order_number();
    $totcvalue = 0;
    foreach ($order->get_items() as $item_key => $item_values) {
        $item_data = $item_values->get_data();
        $product_id = $item_values->get_product_id();
        $prodcvalue = get_post_meta($product_id,'cvalue',true);
        $quantity = $item_data['quantity'];
        $result= $prodcvalue*$quantity;
        $totcvalue += $result;
    }
     $curlpostback = curl_init();
     curl_setopt_array($curlpostback, array(
        CURLOPT_URL => "<THE URL HERE>?sid=".$encoded."&CValue=".$totcvalue."&OrderTotal=".$order_tot."&OrderNumber=".$order_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
        ),
     ));

     $responsepostback = curl_exec($curlpostback);
     $errpostback = curl_error($curlpostback);

     curl_close($curlpostback);
}
add_action( 'woocommerce_thankyou', 'woocompostback' );
