<?php
/*
*		Plugin Name: Social Media Stream
*		Description: Social media feeds for multiple users
*		Version: Latest-Version
*		Author: Grant Wilkinson

*/


/*enqueue scripts*/
add_action('wp_enqueue_scripts', 'sm_enqueue_script');
function sm_enqueue_script(){

	wp_enqueue_script('sm-jquery-shuffle',plugins_url('/assets/js/shuffle.js', __FILE__),array('jquery'),'',true);
	wp_register_script( "sm-jquery-socialstream_script", plugins_url('/assets/js/socialstream.js', __FILE__), array('jquery') );
	wp_localize_script( 'sm-jquery-socialstream_script', 'socialAjaxes', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        
	wp_enqueue_script( 'sm-jquery-socialstream_script' );
	wp_enqueue_script('sm-jquery-socialcustom',plugins_url('/assets/js/social-custom.js', __FILE__),array('jquery'),'',true);
	wp_enqueue_style( 'sm-shuffle-style', plugins_url( '/assets/css/shuffle-styles.css' , __FILE__), array(  ), '' );
	wp_enqueue_style( 'sm-plugin-style', plugins_url( '/assets/css/style.css' , __FILE__), array(  ), '' );
	wp_enqueue_style( 'sm-plugin-custom-style', plugins_url( '/assets/css/social-custom.css' , __FILE__), array(  ), '' );

}

require_once('inc/admin-functions.php');
require_once('inc/db-migration.php');

//Start defining plugin class
class SocialMediaStream {
	
	function create_socialmediastream_menu(){
		add_menu_page('SocialMediaStream', 'SocialMediaStream', 5, 'SocialMediaStream', array($this,'social_media_stream'),'dashicons-groups',86);
		
	}
	function social_media_stream(){ 
		require_once('inc/sms-admin-settings.php');
	}
	
}

//Initailize plugin class
$socialmediastream_plugin = new SocialMediaStream();
if(isset($socialmediastream_plugin)) {
	add_action('admin_menu', array($socialmediastream_plugin,'create_socialmediastream_menu'));	
}


$socialFeedManager = new SocialFeedManager();

add_action('wp_ajax_add_social_feed', array( $socialFeedManager, 'addSocialFeed'));
add_action('wp_ajax_nopriv_add_social_feed', array( $socialFeedManager, 'addSocialFeed'));


add_action('wp_ajax_fetch_social_feed', array( $socialFeedManager, 'fetchSocialfeed'));
add_action('wp_ajax_nopriv_fetch_social_feed', array( $socialFeedManager, 'fetchSocialfeed'));


$socialstreamer = new SocialStreamer();

add_action('wp_ajax_get_social_feed_ajax', array( $socialstreamer, 'getSocialFeedAjax'));
add_action('wp_ajax_nopriv_get_social_feed_ajax', array( $socialstreamer, 'getSocialFeedAjax'));


add_action('wp_ajax_truncate_table', array( $socialstreamer, 'truncateTable'));
add_action('wp_ajax_nopriv_truncate_table', array( $socialstreamer, 'truncateTable'));

add_action('wp_ajax_delete_feed', array( $socialstreamer, 'deleteFeedsFromTable'));
add_action('wp_ajax_nopriv_delete_feed', array( $socialstreamer, 'deleteFeedsFromTable'));

//addplugin shortcode
add_shortcode( 'sm_socialstream', array( $socialstreamer, 'sm_social_streamer_shortcode') );


register_activation_hook( __FILE__, 'sms_install' );

