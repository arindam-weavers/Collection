<?php

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  This is for fetching all social media feeds data and insert them in	 :*/
/*::  custom database table     											 :*/
/*::  The functions written here can be accessed by calling anywhere over    :*/
/*::  the class object                                                       :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

class SocialFeeds{
	
	/**
	**Get Facebook Feed
	**/
	
	function getFacebookFeed($feed_id,$appID ,$appSecret,$page_id,$maximum,$caching,$token){
			
			$authentication = file_get_contents("https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id={$appID}&client_secret={$appSecret}&fb_exchange_token={$token}");
			$authResponse = json_decode($authentication);
			$response = file_get_contents("https://graph.facebook.com/{$page_id}/feed?access_token={$authResponse->access_token}&fields=id,message,picture,link,name,description,type,icon,created_time,from,object_id,attachments,shares,likes.summary(true),comments.summary(true)");
			
			$response = json_decode($response);
			$lastorder = 0;
			
			foreach($response->data as $fb){
				if(!empty($lastorder)){
					$lastorder = $this->getSMartOrder('facebook',$lastorder);
				}else{
					$lastorder = $this->getSMartOrder('facebook',1);
				}
				$postid = $fb->id;
				$post_type = 'facebook';
				$post_text = $fb->message;
				$post_permalink = $fb->link;
				$user_nickname = $fb->from->name;
				$user_screenname = $fb->from->name;
				$user_pic =  $this->getFbImage( $fb->from->id,$authResponse->access_token);
				$user_link = 'https://www.facebook.com/'.$fb->from->id;
				
				$post_additional = array();
				if(isset($post_additional->shares)){
					$post_additional['shares'] = $fb->shares->count;
				}else{
					$post_additional['shares'] = 0;
				}
				$post_additional['likes'] = $fb->likes->summary->total_count;
				$post_additional['comments'] = $fb->comments->summary->total_count;
				$post_additional = json_encode($post_additional);
				$post_timestamp = strtotime($fb->created_time);
				$image= array();
				$media= array();
				
						
				if ((isset($fb->object_id) && (($fb->type == 'photo')))){
					if (isset($fb->attachments) && isset($fb->attachments->data) && sizeof($fb->attachments->data) > 0){
						$subattachments = $this->getfbSubattachments($fb);
						if (sizeof($subattachments) > 0){
							$image = $subattachments[0];
							$image = $this->createImage($image->src, $image->width, $image->height);
							$media = $this->createMedia($image->src, $image->width, $image->height);
							
						}
					}
				}
			
			if (($fb->type == 'video')
			&& (!isset($fb->status_type) || $fb->status_type == 'added_video' ||
				$fb->status_type == 'shared_story' || $fb->status_type == 'mobile_status_update')){
				if (!isset($fb->object_id) && isset($fb->link) && strpos($fb->link, 'facebook.com') > 0 && strpos($fb->link, '/videos/') > 0){
					$path = parse_url($fb->link, PHP_URL_PATH);
					$tokens = explode('/', $path);
					if (empty($tokens[sizeof($tokens)-1])) unset($tokens[sizeof($tokens)-1]);
					$fb->object_id = $tokens[sizeof($tokens)-1];
				}
				if (isset($fb->object_id) && trim($fb->object_id) != ''){
					if (isset($fb->attachments) && isset($fb->attachments->data) && sizeof($fb->attachments->data) > 0){
						$subattachments = $this->getfbSubattachments($fb);
						if (sizeof($subattachments) > 0){
							$image= $subattachments[0];
							$width = $image->width;
							$height = $image->height;
							if ($width > 600) {
								$height = $this->getScaleHeight(600, $width, $height);
								$width = 600;
							}
							$image = $this->createImage($image->src, $width, $height);
							$media = $this->createMedia('http://www.facebook.com/video/embed?video_id=' . $fb->object_id, $width, $height, 'video');
							
						}
					}

				}
				else if (isset($fb->source)){
					if (strpos($fb->source, 'giphy.com') > 0) {
						$arr = parse_url( urldecode( $fb->source ) );
						parse_str( $arr['query'], $output );
						$image = $this->createImage( $output['gif_url'], $output['giphyWidth'], $output['giphy_height'] );
						$media = $this->createMedia( $output['gif_url'], $output['giphyWidth'], $output['giphy_height'] );
						
					}
					if (isset($fb->full_picture)){
						$image = $this->createImage($fb->full_picture);
						$type = (strpos($fb->source, '.mp4') > 0) ? 'video/mp4' : 'video';
						$media = $this->createMedia($fb->source, 600, $this->getScaleHeight(600, $image['width'], $image['height']), $type);
					}
					if (isset($fb->picture)){
						$image = $this->createImage($item->picture);
						$type = (strpos($fb->source, '.mp4') > 0) ? 'video/mp4' : 'video';
						$media = $this->createMedia($fb->source, 600, $this->getScaleHeight(600, $image['width'], $image['height']), $type);

					}
				}
			}
				
			if ((($fb->type == 'link') || ($fb->type == 'event')) && isset($fb->picture)){
				if (isset($fb->attachments->data) && sizeof($fb->attachments->data) > 0){
					$subattachments = $this->getfbSubattachments($fb);
					if (sizeof($subattachments) > 0){
						$image = $subattachments[0];
						if ($image->width > 35 || $image->height > 35){
							$image = $this->createImage($image->src, $image->width, $image->height);
							$media = $this->createMedia($image->src, $image->width, $image->height, 'image', true);
						}

					}
				}
				
				if (isset($fb->full_picture)){
					$image = $this->createImage($fb->full_picture);
					$media = $this->createMedia((pathinfo($fb->link, PATHINFO_EXTENSION) === 'gif') ? $fb->link : $fb->full_picture, null, null, 'image', true);
				}

				$image = $fb->picture;
				$parts = parse_url($image);
				if (isset($parts['query'])){
					parse_str($parts['query'], $attr);
					if (isset($attr['url'])) {
						$image = $attr['url'];
						$original = $this->createImage($image, null, null, false);
						if (150 > $original['width'] || 150 > $original['height']) return false;
						$image = $this->createImage($image, $original['width'], $original['height']);
						if (!empty($image['height'])) {
							$thismedia = $this->createMedia($image, null, null, 'image', true);
						}
					}
				}
				$image = $createImage($fb->picture);
				$media = $createMedia($fb->picture, null, null, 'image', true);
			}
		
		
				global $wpdb;
				$table_name = $wpdb->prefix . "social_feed_post";
			
				if(count($media)>0){
					$wpdb->insert(
							$table_name, //table
							array(
								'feed_id' => $feed_id,
								'post_id' => $postid,
								'post_type' => $post_type,
								'post_text' => $post_text,
								'post_permalink' => $post_permalink,
								'user_nickname' => $user_nickname,
								'user_screenname' => $user_screenname,
								'user_pic' => $user_pic,
								'user_link' => $user_link,
								'post_additional' => $post_additional,
								'post_timestamp' => $post_timestamp,
								'media_url'=>$media['url'],
								'media_width'=>$media['width'],
								'media_height'=>$media['height'],
								'media_type'=>$media['type'],
								'image_url'=>$image['url'],
								'image_width'=>$image['width'],
								'image_height'=>$image['height'],
								'post_header'=>$post_header,
								'smart_order' => $lastorder
							),
							array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',"%s","%s","%s","%s","%s","%s","%d") 
					);
					
				}else{
					$wpdb->insert(
							$table_name, //table
							array(
								'feed_id' => $feed_id, 
								'post_id' => $postid,
								'post_type' => $post_type,
								'post_text' => $post_text,
								'post_permalink' => $post_permalink,
								'user_nickname' => $user_nickname,
								'user_screenname' => $user_screenname,
								'user_pic' => $user_pic,
								'user_link' => $user_link,
								'post_additional' => $post_additional,
								'post_timestamp' => $post_timestamp,
								'post_header'=>$post_header,
								'smart_order' => $lastorder
							),
							array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%d') 
					);
				}

			}
	}
	
	/*getFbImage*/
	function getFbImage($user_id,$accesstoken){
		$response = file_get_contents("https://graph.facebook.com/".$user_id."?fields=picture&access_token=".$accesstoken);
		$response = json_decode($response);
		if(is_object($response)&& isset($response->picture)){
			return $response->picture->data->url;
		}
	}
	
	/*get fb subattachments*/
	private function getfbSubattachments($item){
		$attachments = array();
		if (isset($item->attachments) && isset($item->attachments->data) && sizeof($item->attachments->data) > 0){
			$data = $item->attachments->data[0];
			if (isset($data->media->image)){
				if ($item->type == 'link' && isset($item->status_type) && $item->status_type == 'shared_story'){}
				else $attachments[] = $data->media->image;
			}
			if (isset($data->subattachments) && isset($data->subattachments->data)){
				foreach ($data->subattachments->data as $el){
					$attachments[] = $el->media->image;
				}
			}
		}
		return $attachments;
	}
	
	/**
	**Get Twitter Feed
	**/
	
	function getTwitterFeed($feed_id,$consumerKey,$consumerSecret,$accessToken,$accessTokenSecret,$username,$maximum,$caching){
		global $wpdb;
		$filename = basename(__FILE__, '.php').'.json';
		$filetime = file_exists($filename) ? filemtime($filename) : time() - $caching - 1;
		if (time() - $caching > $filetime) {
			
			$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
			$base = 'GET&'.rawurlencode($url).'&'.rawurlencode("count={$maximum}&oauth_consumer_key={$consumerKey}&oauth_nonce={$filetime}&oauth_signature_method=HMAC-SHA1&oauth_timestamp={$filetime}&oauth_token={$accessToken}&oauth_version=1.0&screen_name={$username}");
			$key = rawurlencode($consumerSecret).'&'.rawurlencode($accessTokenSecret);
			$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base, $key, true)));
			$oauth_header = "oauth_consumer_key=\"{$consumerKey}\", oauth_nonce=\"{$filetime}\", oauth_signature=\"{$signature}\", oauth_signature_method=\"HMAC-SHA1\", oauth_timestamp=\"{$filetime}\", oauth_token=\"{$accessToken}\", oauth_version=\"1.0\", ";
			$curl_request = curl_init();
			curl_setopt($curl_request, CURLOPT_HTTPHEADER, array("Authorization: Oauth {$oauth_header}", 'Expect:'));
			curl_setopt($curl_request, CURLOPT_HEADER, false);
			curl_setopt($curl_request, CURLOPT_URL, $url."?screen_name={$username}&count={$maximum}");
			curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, false);
			$response = curl_exec($curl_request);
			curl_close($curl_request);
			file_put_contents($filename, $response);
		} else {
			$response = file_get_contents($filename);
		}
		
		$response = json_decode($response);
		$lastorder = 0;
	
		
		foreach($response as $tw){
			
			if(!empty($lastorder)){
				$lastorder = $this->getSMartOrder('twitter',$lastorder);
			}else{
				$lastorder = $this->getSMartOrder('twitter',0);
			}
			$postid = $tw->id_str;
			$post_type = 'twitter';
			$post_text = $tw->text;
			$post_permalink = $tw->entities->urls[0]->expanded_url;
			$user_nickname = $tw->user->screen_name;
			$user_screenname = $tw->user->name;
			$user_pic =  str_replace('.jpg', '_200x200.jpg', str_replace('_normal', '', (string)$tw->user->profile_image_url));
			$user_link = 'https://twitter.com/'.$tw->user->screen_name;
			$post_additional = array('shares' => (string)$tw->retweet_count, 'likes' => (string)$tw->favorite_count, 'comments' => (string)$tw->reply_count);
            $post_timestamp = strtotime($tw->created_at);
			
			
			//print_r($tw);exit;
			$table_name = $wpdb->prefix . "social_feed_post";
			
			$count = $wpdb->get_var($wpdb->prepare("SELECT id FROM " . $table_name . " WHERE post_id = %d  LIMIT 1",$postid));
			if($count>0){
				//
			}else{
				$wpdb->insert(
						$table_name, //table
						array(
							'feed_id' => $feed_id, 
							'post_id' => $postid,
							'post_type' => $post_type,
							'post_text' => $post_text,
							'post_permalink' => $post_permalink,
							'user_nickname' => $user_nickname,
							'user_screenname' => $user_screenname,
							'user_pic' => $user_pic,
							'user_link' => $user_link,
							'post_additional' => json_encode($post_additional),
							'post_timestamp' => $post_timestamp,
							'smart_order' => $lastorder
						),
						array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%d') 
				);
			}


		}
		
		
	}
	
	/**
	**Get Google Plus Feed
	**/
	
	function getGplusFeed($feed_id, $uid,$key,$maximum,$caching){
		 global $wpdb;

		$response = json_decode(file_get_contents('https://www.googleapis.com/plus/v1/people/' .$uid. '/activities/public?key='.$key.'&maxResults='.$maximum.'&prettyprint=false&fields=items(id,actor,object(attachments(displayName,fullImage,id,image,objectType,url,thumbnails),id,content,objectType,url,replies(totalItems),plusoners(totalItems),resharers(totalItems)),published,title,url)'));

		$lastorder = 0;
				
		foreach($response->items as $gp){
			$postid = (string)$gp->id;
			$post_type = 'google';
			if (isset($gp->object->content) && !empty($gp->object->content)) {
				$post_text = $gp->object->content;
			}
		
			$post_permalink = $gp->url;
			$user_nickname = $gp->actor->displayName;
			$user_screenname = $gp->actor->displayName;
			$user_pic =  $gp->actor->image->url;
			$user_link = $gp->actor->url;
			$post_additional = json_encode(array('shares' => (string)@$gp->object->resharers->totalItems, 'likes' => (string)@$gp->object->plusoners->totalItems, 'comments' => (string)@$gp->object->resharers->totalItems));
            $post_timestamp = strtotime($gp->published);
			$media = array();
			if(isset($item->type) || (isset($item->status_type) && $item->status_type != 'added_photos') && isset($item->name)){
				$post_header = $item->name;
			}else{
				$post_header = '';
			}
		
			
			if (isset($gp->object->attachments) && sizeof($gp->object->attachments) > 0 ) {
				$attach = $gp->object->attachments[0];
				$post_header = $attach->displayName;
				if ($attach->objectType == 'article') {
					if(isset($attach->fullImage)){
						$url = $attach->fullImage->url;
						
						$media = $this->createMedia($url, null, null, 'image', true);
						
						if ($media['width'] == null || $media['height'] == null){
							$url = $attach->image->url;
							$media = $this->createMedia($url, $attach->image->width, $attach->image->height, 'image', true);
						}
						$image = $this->createImage($url, $media['width'], $media['height']);
						$source = $attach->url;
					}
				}else if ($attach->objectType == 'photo'){
					$media = $this->createMedia($attach->fullImage->url, $attach->fullImage->width, $attach->fullImage->height, 'image', true);
					$image = $this->createImage($attach->fullImage->url, $media['width'], $media['height']);
					
				}else if ($attach->objectType == 'video'){
					$url = $attach->url;
					$image = $this->createImage($attach->image->url, $attach->image->width, $attach->image->height);
					if (strpos($url, 'youtube.com') > 0) {
						if ((strpos($url, '?v=') > 0 || strpos($url, '&v=') > 0)) {
							$query_str = parse_url( $url, PHP_URL_QUERY );
							parse_str( $query_str, $query_params );
							$videoId = $query_params['v'];
						}
						else if (strpos($url, 'www.youtube.com/attribution_link') > 0) {
							$url = urldecode($url);
							$query_string = @end(explode('?',$url));
							parse_str($query_string, $query_params);
							$videoId = $query_params['v'];
						}
						$height = $this->getScaleHeight(600, $image['width'], $image['height']);
						$media = $this->createMedia("http://www.youtube.com/v/{$videoId}?version=3&f=videos&autoplay=0", 600, $height, "application/x-shockwave-flash");
						$source = $attach->url;
					}
					else {
						$source = $attach->url;
						$media = $this->createMedia($attach->url, 600, $this->getScaleHeight(600, $image['width'], $image['height']), 'video');//application/x-shockwave-flash
						//TODO
					}
				}
				
			}
			
	
			if(!empty($lastorder)){
				$lastorder = $this->getSMartOrder('google',$lastorder);
			}else{
				$lastorder = $this->getSMartOrder('google',2);
			}
		
			$table_name = $wpdb->prefix . "social_feed_post";
			$media_table_name = $wpdb->prefix . "social_post_media";
			
			$count = $wpdb->get_var($wpdb->prepare("SELECT id FROM " . $table_name . " WHERE post_id = %s  LIMIT 1",$postid));
			if($count>0){
				continue;
			}else{
				if(count($media)>0){
					$wpdb->insert(
							$table_name, //table
							array(
								'feed_id' => $feed_id,
								'post_id' => $postid,
								'post_type' => $post_type,
								'post_text' => $post_text,
								'post_permalink' => $post_permalink,
								'user_nickname' => $user_nickname,
								'user_screenname' => $user_screenname,
								'user_pic' => $user_pic,
								'user_link' => $user_link,
								'post_additional' => $post_additional,
								'post_timestamp' => $post_timestamp,
								'media_url'=>$media['url'],
								'media_width'=>$media['width'],
								'media_height'=>$media['height'],
								'media_type'=>$media['type'],
								'image_url'=>$image['url'],
								'image_width'=>$image['width'],
								'image_height'=>$image['height'],
								'post_source'=>$source,
								'post_header'=>$post_header,
								'smart_order' => $lastorder
							),
							array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',"%s","%s","%s","%s","%s","%d") 
					);
					
						//print_r($media_item['width']);
						//print_r($media_item['height']);
						$wpdb->insert(
							$media_table_name, //table
							array( 'post_id' => $postid,'post_type' => $post_type,'media_url' => $media['url'],'media_width' => $media['width'],'media_height' => $media['height'],'media_type' => $media['type']),
							array('%s', '%s','%s','%d','%d','%s') 
						);
				
					
					
				}else{
					$wpdb->insert(
							$table_name, //table
							array('feed_id' => $feed_id, 'post_id' => $postid,'post_type' => $post_type,'post_text' => $post_text,'post_permalink' => $post_permalink,'user_nickname' => $user_nickname,'user_screenname' => $user_screenname,'user_pic' => $user_pic,'user_link' => $user_link,'post_additional' => $post_additional,'post_timestamp' => $post_timestamp,'post_header'=>$post_header,'smart_order' => $lastorder),
							array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',"%d") 
					);
				}

				
			}


		}
		
	}	
	
	/**
	**Get Youtube Channel
	**/
	
	function getYoutubeChannel($feed_id,$channelID,$key,$maximum,$caching){
		global $wpdb;
		 
		$response =  json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maximum.'&key='.$key));
		
		$lastorder = 0;
		foreach($response->items as $yc){
			$postid = (string)$yc->id->videoId;
			if(empty($postid)){
				continue;
			}
			$post_type = 'youtube';
			$post_text = '';
			if (isset($yc->snippet->description) && !empty($yc->snippet->description)) {
				$post_text = $this->wrapLinks(strip_tags( (string) $yc->snippet->description ));
			}
			//$post_permalink ='';
			$post_permalink = 'https://www.youtube.com/watch?v='.$postid;
			$user_nickname = $yc->snippet->channelTitle;
			$user_screenname = $yc->snippet->channelTitle;
			$user_pic =  $yc->snippet->thumbnails->high->url;
			$user_link = "https://www.youtube.com/channel/".$yc->snippet->channelId;
			//$user_link = "";
			//$stats = '' ;
			$stats = $this->getYoutubeStat($postid,$key);
			
			//$post_additional = '' ;
			$post_additional = json_encode(array('views' => (string)@$stats->viewCount, 'likes' => (string)@$stats->likeCount, 'dislikes' => (string)@$stats->dislikeCount,'comments' => (string)@$stats->commentCount));
            $post_timestamp = strtotime($yc->snippet->publishedAt);
			$media = array();
			$post_header = $yc->snippet->title;

			$thumbnail = null;
			if (isset($yc->snippet->thumbnails->maxres)){
				$thumbnail = $this->isSuitableThumbnail($yc->snippet->thumbnails->maxres);
			}

			if (is_null($image) && isset($yc->snippet->thumbnails->standard)) {
				$thumbnail = $isSuitableThumbnail($yc->snippet->thumbnails->standard, is_null($thumbnail));
			}

			if (is_null($image) && isset($yc->snippet->thumbnails->high)) {
				$thumbnail = $this->isSuitableThumbnail($yc->snippet->thumbnails->high, is_null($thumbnail));
			}

			if (is_null($image) && isset($yc->snippet->thumbnails->medium)) {
				$thumbnail = $this->isSuitableThumbnail($yc->snippet->thumbnails->medium, is_null($thumbnail));
			}

			if (is_null($image) && isset($yc->snippet->thumbnails->default)) {
				$thumbnail = $this->isSuitableThumbnail($yc->snippet->thumbnails->default, is_null($thumbnail));
			}

			if (is_null($image)){
				$image = $this->createImage($thumbnail->url, $thumbnail->width, $thumbnail->height);
			}

			$height = $this->getScaleHeight(600, $thumbnail->width, $thumbnail->height);
			$media = $this->createMedia("http://www.youtube.com/v/".$this->videoId."?version=3&f=videos&autoplay=0", 600, $height, "application/x-shockwave-flash");

			
			if(!empty($lastorder)){
				$lastorder = $this->getSMartOrder('youtube',$lastorder);
			}else{
				$lastorder = $this->getSMartOrder('youtube',3);
			}
			
			$table_name = $wpdb->prefix . "social_feed_post";
			$media_table_name = $wpdb->prefix . "social_post_media";
			
			$count = $wpdb->get_var($wpdb->prepare("SELECT id FROM " . $table_name . " WHERE post_id = %s  LIMIT 1",$postid));
			if($count>0){
				continue;
			}else{
				//echo $postid;
					
					
					if(count($media)>0){
						$wpdb->insert(
								$table_name, //table
								array(
									'feed_id' => $feed_id,
									'post_id' => $postid,
									'post_type' => $post_type,
									'post_text' => $post_text,
									'post_permalink' => $post_permalink,
									'user_nickname' => $user_nickname,
									'user_screenname' => $user_screenname,
									'user_pic' => $user_pic,
									'user_link' => $user_link,
									'post_additional' => $post_additional,
									'post_timestamp' => $post_timestamp,
									'media_url'=>$media['url'],
									'media_width'=>$media['width'],
									'media_height'=>$media['height'],
									'media_type'=>$media['type'],
									'image_url'=>$image['url'],
									'image_width'=>$image['width'],
									'image_height'=>$image['height'],
									'post_header'=>$post_header,
									'smart_order' => $lastorder
								),
								array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',"%s","%s","%s","%s","%d") 
						);
						
							$wpdb->insert(
								$media_table_name, //table
								array( 'post_id' => $postid,'post_type' => $post_type,'media_url' => $media['url'],'media_width' => $media['width'],'media_height' => $media['height'],'media_type' => $media['type']),
								array('%s', '%s','%s','%d','%d','%s') 
							);
					
						
						
					}else{
						$wpdb->insert(
								$table_name, //table
								array('feed_id' => 1, 'post_id' => $postid,'post_type' => $post_type,'post_text' => $post_text,'post_permalink' => $post_permalink,'user_nickname' => $user_nickname,'user_screenname' => $user_screenname,'user_pic' => $user_pic,'user_link' => $user_link,'post_additional' => $post_additional,'post_timestamp' => $post_timestamp,'post_header'=>$post_header,'smart_order' => $lastorder),
								array('%d','%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%d') 
						);
					}

				
			}


		}
		
	}
	
	
	
	public function createMedia($url, $width = null, $height = null, $type = 'image', $scale = false){
		if ($type == 'html'){
			return array('type' => $type, 'html' => $url);
		}
		if ($width == null || $height == null){
			$size = $this->size($url);
			$width = $size['width'];
			$height = $size['height'];
		}
		if ($type == 'image' && $scale == true && $width > 600){
			$height = $this->getScaleHeight(600, $width, $height);
			$width = 600;
		}
		return array('type' => $type, 'url' => $url, 'width' => $width, 'height' => $height);
	}
	
	/**
     * @param int $templateWidth
     * @param int $originalWidth
     * @param int $originalHeight
     * @return int|string
     */
    public function getScaleHeight($templateWidth, $originalWidth, $originalHeight){
        if (isset($originalWidth) && isset($originalHeight) && !empty($originalWidth)){
            $k = $templateWidth / $originalWidth;
            return (int)round( $originalHeight * $k );
        }
        return '';
    }
	
	
	/**
	 * @param $url
	 * @param $width
	 * @param $height
	 * @param bool $scale
	 *
	 * @return array
	 */
    protected function createImage($url, $width = null, $height = null, $scale = true){
    	if ($width != -1 && $height != -1) {
		    if ($width == null || $height == null){
				$size = $this->size($url);
			    $width = $size['width'];
			    $height = $size['height'];
		    }
		    if ($scale){
			    $tWidth = $width;
			    return array('url' => $url, 'width' => $tWidth, 'height' => $this->getScaleHeight($tWidth, $width, $height));
		    }
	    }
	    return array('url' => $url, 'width' => $width, 'height' => $height);
    }
	
	
	/**
	 * @param string $url
	 * @param string $original_url
	 *
	 * @return array
	 */
	public function size($url, $original_url = ''){
		$h = hash('md5', $url);
		if ($original_url != '') $url = $original_url;
		$image_cache = array();
		$new_images = array();
		if (!array_key_exists($h,$image_cache)){
			try{
				$time = date("Y-m-d H:i:s", time());
				if ($url && !empty($url)) {
					if (isset($_REQUEST['debug'])){
						ini_set('upload_max_filesize', '16M');
						ini_set('post_max_size', '16M');
						ini_set('max_input_time', '60');
					}
					@list($width, $height) = getimagesize($url);
					if (empty($width) || empty($height)){
						@list($width, $height) = $this->alternativeGetImageSize($url);
						if (empty($width) || empty($height)){
							$width  = -1;
							$height = -1;
						}
					}
					$data = array('creation_time' => $time, 'width' => $width, 'height' => $height, 'original_url' => $original_url);
				} else $data = array('creation_time' => $time, 'width' => -1, 'height' => -1, 'original_url' => $original_url);
				if ($data['width'] > 0 && $data['height'] > 0){
					$image_cache[$h] = $data;
					$new_images[$h] = $data;
				}
				return $data;
			} catch (\Exception $e) {
				//error_log($url);
				//error_log($e->getMessage());
				//error_log($e->getTraceAsString());
				return array('time' => time(), 'width' => -1, 'height' => -1, 'error' => $e->getMessage());
			}
		}
		return $image_cache[$h];
	}
	
	private function alternativeGetImageSize($url){
		$raw = $this->ranger($url);
		if ($raw === 'URL signature expired'){
			return array(-1, -1);
		}
		$im = imagecreatefromstring($raw);
		$width = imagesx($im);
		$height = imagesy($im);
		imagedestroy($im);
		return array($width, $height);
	}
	
	private function ranger($url){
		$headers = array(
			"Range: bytes=0-32768"
		);

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.80 Safari/537.36');
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 5000);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		$data = curl_exec($curl);
		curl_close($curl);
		return $data;
	}
	
	
	/**
	 * @param string $source
	 * @return mixed
	 */
	public static function wrapLinks($source){
		$pattern = '/(https?:\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/i';
		$replacement = '<a href="$1">$1</a>';
		return preg_replace($pattern, $replacement, $source);
	}
	
	protected function getYoutubeStat($vidId,$key){
		$response =  json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$vidId.'&key='.$key.'&part=statistics'));
		if(is_object($response)){
			return $response->items[0]->statistics;
		}else{
			return array();
		}
		return $response;
	}
	
	private function isSuitableThumbnail($thumbnail, $t_null = true){
		if ( round( $thumbnail->width / $thumbnail->height, 2) == 1.78) {
			$this->image = $this->createImage($thumbnail->url, $thumbnail->width, $thumbnail->height);
		}
		if ($t_null){
			return $thumbnail;
		}
		return null;
	}
	
	private function getSMartOrder($type,$lastorder=null){
		global $wpdb;
		if(is_null($lastorder)){
			$table_name =  $wpdb->prefix . "social_feed_post";
			$query = 'SELECT smart_order,post_type FROM `'.$table_name.'` WHERE post_type = "'.$type.'" ORDER BY id DESC';
			$feed = $wpdb->get_row( $query , OBJECT );
			if(is_object($feed)){
				$order = $feed->smart_order + 4;
				
			}
		}else{
			$order = $lastorder + 4;
		}
		return $order;
	}

}
