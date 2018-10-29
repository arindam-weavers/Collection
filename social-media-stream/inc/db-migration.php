<?php 

global $sms_db_version;
$sms_db_version = '1.0';

function sms_install() {
	global $wpdb;
	global $sms_db_version;

	$social_feed_table_name = $wpdb->prefix . 'social_feed';
	$social_feed_post_table_name = $wpdb->prefix . 'social_feed_post';
	$social_post_media_table_name = $wpdb->prefix . 'social_post_media';
	
	$charset_collate = $wpdb->get_charset_collate();

	$social_feed_sql = "CREATE TABLE $social_feed_table_name (
		  `feed_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		  `feed_title` varchar(256) NOT NULL,
		  `is_fb` tinyint(1) NOT NULL DEFAULT '0',
		  `fb_page_id` varchar(256) DEFAULT NULL,
		  `fb_access_token` text NOT NULL,
		  `fb_app_id` varchar(256) DEFAULT NULL,
		  `fb_app_secret` varchar(256) DEFAULT NULL,
		  `is_gplus` tinyint(1) NOT NULL DEFAULT '0',
		  `gplus_auth_token` varchar(256) DEFAULT NULL,
		  `gplus_uid` varchar(256) DEFAULT NULL,
		  `is_youtube` tinyint(1) NOT NULL DEFAULT '0',
		  `yt_channel_id` varchar(256) DEFAULT NULL,
		  `yt_auth_token` varchar(256) DEFAULT NULL,
		  `is_tw` tinyint(1) NOT NULL DEFAULT '0',
		  `tw_consumer` varchar(256) DEFAULT NULL,
		  `tw_consumer_secret` varchar(256) DEFAULT NULL,
		  `tw_access_token` varchar(256) DEFAULT NULL,
		  `tw_access_token_secret` varchar(256) NOT NULL,
		  `tw_user` varchar(256) DEFAULT NULL,
		   PRIMARY KEY  (feed_id)
		) $charset_collate;";	
		
	$social_feed_post_sql = "CREATE TABLE $social_feed_post_table_name (
		  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
		  `feed_id` int(11) UNSIGNED NOT NULL,
		  `post_id` text NOT NULL,
		  `post_type` varchar(10) NOT NULL,
		  `post_text` longtext NOT NULL,
		  `post_permalink` text NOT NULL,
		  `post_header` text,
		  `user_nickname` varchar(100) NOT NULL,
		  `user_screenname` varchar(200) NOT NULL,
		  `user_pic` text NOT NULL,
		  `user_link` text NOT NULL,
		  `image_url` text,
		  `image_width` int(11) DEFAULT NULL,
		  `image_height` int(11) DEFAULT NULL,
		  `media_url` text NOT NULL,
		  `media_width` int(11) DEFAULT NULL,
		  `media_height` int(11) DEFAULT NULL,
		  `media_type` varchar(100) DEFAULT NULL,
		  `post_timestamp` int(11) NOT NULL,
		  `post_status` varchar(15) NOT NULL DEFAULT 'approved',
		  `post_source` text,
		  `post_additional` text NOT NULL,
		  `user_bio` varchar(256) NOT NULL,
		  `user_counts_media` int(11) NOT NULL DEFAULT '0',
		  `user_counts_follows` int(11) NOT NULL DEFAULT '0',
		  `user_counts_followed_by` int(11) NOT NULL DEFAULT '0',
		  `location` varchar(256) DEFAULT NULL,
		  `smart_order` int(11) DEFAULT NULL,
		   PRIMARY KEY  (id)
		) $charset_collate;";	
		
	$social_post_media_sql = "CREATE TABLE $social_post_media_table_name (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `post_id` text NOT NULL,
		  `post_type` varchar(10) NOT NULL,
		  `media_url` text,
		  `media_width` int(11) DEFAULT NULL,
		  `media_height` int(11) DEFAULT NULL,
		  `media_type` varchar(100) DEFAULT NULL
		) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $social_feed_sql );
	dbDelta( $social_feed_post_sql );
	dbDelta( $social_post_media_sql );

	add_option( 'sms_db_version', $sms_db_version );
}

register_deactivation_hook( __FILE__, 'sms_plugin_remove_database' );
function sms_plugin_remove_database() {
    global $wpdb;
	global $sms_db_version;
    $social_feed_table_name = $wpdb->prefix . 'social_feed';
	$social_feed_post_table_name = $wpdb->prefix . 'social_feed_post';
	$social_post_media_table_name = $wpdb->prefix . 'social_post_media';
	
	$social_feed_sql = "DROP TABLE IF EXISTS $social_feed_table_name";
	$social_feed_post_sql = "DROP TABLE IF EXISTS $social_feed_post_table_name";
	$social_post_media_sql = "DROP TABLE IF EXISTS $social_post_media_table_name";
    
    $wpdb->query($social_feed_sql);
    $wpdb->query($social_feed_post_sql);
    $wpdb->query($social_post_media_sql);
	
    delete_option($sms_db_version);
}   
