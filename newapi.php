<?php
/**
 * @package API Plugin
 * @version 1.0
 */
/*
Plugin Name: API Plugin
Plugin URI: #
Description: Connects Worpdress Pages to XXXXXXXX and sends data from the page one is in to XXXXXXXXX API
Author: Grant
Version: 1.0
Author URI: #
Text Domain: api-plugin
*/


function register_session(){
    if( !session_id() )
        session_start();
}
add_action('init','register_session');


function page_404(){
    if( is_404() ){
            	$_SESSION['socialid'] = $_REQUEST['SocialID'];
		$_SESSION['graphicid'] = $_REQUEST['GraphicID'];
		if($_REQUEST['PageID'] == '')
		{
			$_SESSION['pageid'] = 0;
		}
		else
		{
			$_SESSION['pageid'] = $_REQUEST['PageID'];
		}
		$current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$urlpart = explode('/', $current_url);
		$guid = end($urlpart);
		$_SESSION['guid'] = $guid;
		$array = explode('?',$current_url); 
		$urlpart1 = explode('/', $array[0]);
		$urlpart2 = explode('&', $array[1]);	
		foreach($urlpart2 as $value){
			 $part = explode('=', $value);
			 $stringparameter[strtolower($part[0])] = $part[1];
		}
		$Username = end($urlpart1);		
		$len = strlen($Username);
		$first = $array[0];
		$referrer = substr($first,0,-$len);
		$_SESSION['Username'] = $Username;
		//print_r(json_encode($params));
		$curl = curl_init();
		$u = $_SESSION['Username'];
 		$p = $_SESSION['pageid'];
 		$g = $_SESSION['graphicid'];
 		$s = $_SESSION['socialid'];
 		$ip= $_SERVER['REMOTE_ADDR'];
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "<API URL HERE>",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\n    \"UserName\": \"$u\",\n    \"PageID\": \"$p\",\n    \"GraphicID\": \"$g\",\n    \"SocialID\": \"$s\",\n    \"IPAddress\": \"$ip\"\n}",
		  CURLOPT_HTTPHEADER => array(
		    "appkey: xxxxxxxx",
		    "cache-control: no-cache",
		    "content-type: application/json",
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		//echo $response;
		wp_redirect($referrer);
    }
}
add_action( 'template_redirect', 'page_404' );



function session_variables() { 
	return "Session variables - ".$_SESSION['Username'].", ".$_SESSION['pageid'].", ".$_SESSION['graphicid'].", ".$_SESSION['socialid'];
}
add_shortcode('api', 'session_variables');


function guid_generate() { 
	return $_SESSION['guid'];
}
add_shortcode('guid', 'guid_generate');

function baseguid_generate() { 
	return base64_encode($_SESSION['guid']);
}
add_shortcode('encoded_guid', 'baseguid_generate');


function user_generate() { 
	return $_SESSION['Username'];
}
add_shortcode('userid', 'user_generate');

function page_generate() { 
	return $_SESSION['pageid'];
}
add_shortcode('pageid', 'page_generate');

function social_generate() { 
	return $_SESSION['socialid'];
}
add_shortcode('socialid', 'social_generate');

function graphic_generate() { 
	return $_SESSION['graphicid'];
}
add_shortcode('graphicid', 'graphic_generate');
