<?php
require_once('SocialStreamer.php');

class SocialFeedManager{
	
	
	function addSocialFeed(){
		if(isset($_REQUEST['feed_title'])) {
			if(isset($_REQUEST['feed_title']) && !empty($_REQUEST['feed_title'])){
				$feed_title = $_REQUEST['feed_title'];
			}else{
				$feed_title = '';
			}
			
			if(isset($_REQUEST['is_fb']) && !empty($_REQUEST['is_fb'])){
				$is_fb = $_REQUEST['is_fb'];
			}else{
				$is_fb = 0;
			}
			
			if(isset($_REQUEST['fb_page_id']) && !empty($_REQUEST['fb_page_id'])){
				$fb_page_id = $_REQUEST['fb_page_id'];
			}else{
				$fb_page_id = '';
			}
			
			if(isset($_REQUEST['fb_access_token']) && !empty($_REQUEST['fb_access_token'])){
				$fb_access_token = $_REQUEST['fb_access_token'];
			}else{
				$fb_access_token = '';
			}
			
			if(isset($_REQUEST['fb_app_id']) && !empty($_REQUEST['fb_app_id'])){
				$fb_app_id = $_REQUEST['fb_app_id'];
			}else{
				$fb_app_id = '';
			}	
			
			if(isset($_REQUEST['fb_app_secret']) && !empty($_REQUEST['fb_app_secret'])){
				$fb_app_secret = $_REQUEST['fb_app_secret'];
			}else{
				$fb_app_secret = '';
			}	
			
			if(isset($_REQUEST['is_gplus']) && !empty($_REQUEST['is_gplus'])){
				$is_gplus = $_REQUEST['is_gplus'];
			}else{
				$is_gplus = 0;
			}
			
			if(isset($_REQUEST['gplus_auth_token']) && !empty($_REQUEST['gplus_auth_token'])){
				$gplus_auth_token = $_REQUEST['gplus_auth_token'];
			}else{
				$gplus_auth_token = '';
			}
			
			if(isset($_REQUEST['gplus_uid']) && !empty($_REQUEST['gplus_uid'])){
				$gplus_uid = $_REQUEST['gplus_uid'];
			}else{
				$gplus_uid = '';
			}
			
			if(isset($_REQUEST['is_youtube']) && !empty($_REQUEST['is_youtube'])){
				$is_youtube = $_REQUEST['is_youtube'];
			}else{
				$is_youtube = '';
			}
			
			if(isset($_REQUEST['yt_channel_id']) && !empty($_REQUEST['yt_channel_id'])){
				$yt_channel_id = $_REQUEST['yt_channel_id'];
			}else{
				$yt_channel_id = '';
			}
			
			if(isset($_REQUEST['yt_auth_token']) && !empty($_REQUEST['yt_auth_token'])){
				$yt_auth_token = $_REQUEST['yt_auth_token'];
			}else{
				$yt_auth_token = '';
			}	
			
			if(isset($_REQUEST['is_tw']) && !empty($_REQUEST['is_tw'])){
				$is_tw = $_REQUEST['is_tw'];
			}else{
				$is_tw = 0;
			}	
			
			if(isset($_REQUEST['tw_consumer']) && !empty($_REQUEST['tw_consumer'])){
				$tw_consumer = $_REQUEST['tw_consumer'];
			}else{
				$tw_consumer = '';
			}
			
			if(isset($_REQUEST['tw_consumer_secret']) && !empty($_REQUEST['tw_consumer_secret'])){
				$tw_consumer_secret = $_REQUEST['tw_consumer_secret'];
			}else{
				$tw_consumer_secret = '';
			}
			
			if(isset($_REQUEST['tw_access_token']) && !empty($_REQUEST['tw_access_token'])){
				$tw_access_token = $_REQUEST['tw_access_token'];
			}else{
				$tw_access_token = '';
			}
			
			if(isset($_REQUEST['tw_access_token_secret']) && !empty($_REQUEST['tw_access_token_secret'])){
				$tw_access_token_secret = $_REQUEST['tw_access_token_secret'];
			}else{
				$tw_access_token_secret = '';
			}	
			
			if(isset($_REQUEST['tw_user']) && !empty($_REQUEST['tw_user'])){
				$tw_user = $_REQUEST['tw_user'];
			}else{
				$tw_user = '';
			}
			
			global $wpdb;
			$table_name =  $wpdb->prefix . "social_feed";
			$wpdb->insert(
				$table_name, //table
				array(
					'feed_title' => $feed_title, 
					'is_fb' => $is_fb,
					'fb_page_id' => $fb_page_id,
					'fb_access_token' => $fb_access_token,
					'fb_app_id' => $fb_app_id,
					'fb_app_secret' => $fb_app_secret,
					'is_gplus' => $is_gplus,
					'gplus_auth_token' => $gplus_auth_token,
					'gplus_uid' => $gplus_uid,
					'is_youtube' => $is_youtube,
					'yt_channel_id' => $yt_channel_id,
					'yt_auth_token'=>$yt_auth_token,
					'is_tw'=>$is_tw,
					'tw_consumer'=>$tw_consumer,
					'tw_consumer_secret'=>$tw_consumer_secret,
					'tw_access_token'=>$tw_access_token,
					'tw_access_token_secret'=>$tw_access_token_secret,
					'tw_user'=>$tw_user
				),
				array('%s','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') 
			);
			
			$lastid = $wpdb->insert_id;
			$response = array('success'=>true,'feed_id'=>$lastid);
			wp_send_json( $response, 200 );
		}else{
			$response = array('success'=>false);
			wp_send_json( $response, 200 );
		}
	}	
	
	function fetchSocialfeed(){
	
		ini_set('memory_limit', '-1');
		set_time_limit(0);
		
		global $wpdb;
		
		
		if(isset($_REQUEST['feed_id']) && !empty($_REQUEST['feed_id'])) {
			$socialstreamer = new SocialStreamer();
			$feed_id = $_REQUEST['feed_id'];
			$table_name =  $wpdb->prefix . "social_feed";
			$query = 'SELECT * FROM `'.$table_name.'` WHERE feed_id = "'.$feed_id.'"';
			$feed = $wpdb->get_row( $query , OBJECT );
			
			if($feed->is_fb == 1){
				$socialstreamer->getFacebookFeed($feed_id,$feed->fb_app_id,$feed->fb_app_secret,$feed->fb_page_id,100,0,$feed->fb_access_token);
			}
			
			if($feed->is_tw == 1){
				$socialstreamer->getTwitterFeed($feed_id,$feed->tw_consumer,$feed->tw_consumer_secret,$feed->tw_access_token,$feed->tw_access_token_secret,$feed->tw_user,100,0);
			}
			
			if($feed->is_youtube == 1){
				$socialstreamer->getYoutubeChannel($feed_id,$feed->yt_channel_id,$feed->yt_auth_token,50,0);
			}
			
			if($feed->is_gplus == 1){
				$socialstreamer->getGplusFeed($feed_id,$feed->gplus_uid,$feed->gplus_auth_token,100,0);
			}

			$response = array('success'=>true);
			wp_send_json( $response, 200 );
		}else{
			$response = array('success'=>false);
			wp_send_json( $response, 200 );
		}
	}
}