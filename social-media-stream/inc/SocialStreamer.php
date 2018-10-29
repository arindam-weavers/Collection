<?php


class SocialStreamer{

	/**
	** Ajax function to fetch and different feeds with pagination
	**/
	
	function getSocialFeedAjax(){
		
		if(isset($_REQUEST['feed_id'])) {
			$feed_id = $_REQUEST['feed_id'];
			$pag_id = $_REQUEST['pag_id'];
			global $wpdb;
			$table_name = $wpdb->prefix . "social_feed_post";

			$query             = "SELECT * FROM ".$table_name;
			$total_query       = "SELECT COUNT(1) FROM (${query}) AS combined_table WHERE feed_id = ".$feed_id;
			$total             = $wpdb->get_var( $total_query );
			$items_per_page    = 15;
			$page              = $pag_id;
			$offset            = ( $page * $items_per_page ) - $items_per_page;
			$feeds             = $wpdb->get_results( $query . " WHERE feed_id = ".$feed_id." ORDER BY smart_order ASC , post_timestamp DESC LIMIT ${offset}, ${items_per_page}" );
			$totalPage         = ceil($total / $items_per_page);
	
			$next_page_id = $pag_id + 1;

			if($next_page_id < $totalPage){
				$is_next_page = true;
			}else{
				$is_next_page = false;
			}
				
			$dataArr = array();
			
			foreach($feeds  as $feed){
				
				$data = '';
				$data .='<div class="picture-item__inner picture-item__inner--transition">
						<div class="ff-item-cont">';
							if($feed->post_header){
								$data .='<h4><a rel="nofollow" href="'.$feed->post_permalink.'" target="_blank">'.$feed->post_header.'</a></h4>';
							}
							$data .='<div class="ff-content" style="overflow-wrap: break-word;">
								'.$feed->post_text.'
							</div>';
							if($feed->image_url){
								$data .='<span class="ff-img-holder ff-img-landscape ff-img-loaded"><img class="ff-initial-image" src="'.$feed->image_url.'" style="min-height: '.$feed->image_height.'"></span>';
							}
							$data .='<div class="ff-item-meta">
								<span class="ff-userpic" style="background:url('.$feed->user_pic.')">
								<i class="ff-icon ff-label-user_timeline"><i class="ff-icon-inner"></i></i>
								</span>
								<h6><a rel="nofollow" href="'.$feed->user_link.'" class="ff-name " target="_blank">'.$feed->user_screenname.'</a></h6>
								<a rel="nofollow" href="'.$feed->user_link.'" class="ff-nickname" target="_blank">'.$feed->user_nickname.'</a>
								<a rel="nofollow" href="'.$feed->post_permalink.'" class="ff-timestamp" target="_blank">'. date("M d, Y h:m A",$feed->post_timestamp).'</a>
							</div>';
							$data .='<h6 class="ff-label-wrapper"><i class="ff-icon ff-label-user_timeline"><i class="ff-icon-inner"><span class="ff-label-text">'.$feed->post_type.'<span></i></i></h6>
						</div>';
				$data .='<h6 class="ff-item-bar">';
					
				$poast_aditional = json_decode($feed->post_additional,false);
					
				
				if($feed->post_type == 'twitter'){ 
					$data .='<a href="https://twitter.com/intent/tweet?in_reply_to='.$feed->post_id.'" class="ff-comments" target="_blank"> <i class="ff-icon-reply"> <span>'.$poast_aditional->comments.'</span> </i></a>
					<a href="https://twitter.com/intent/retweet?tweet_id='.$feed->post_id.'" class="ff-shares" target="_blank"><i class="ff-icon-shares"></i> <span>'.$poast_aditional->shares.'</span></a>
					<a href="https://twitter.com/intent/favorite?tweet_id='.$feed->post_id.'" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span>'.$poast_aditional->likes.'</span></a>';
				}else if($feed->post_type == 'google'){
					$gLink = $feed->post_permalink;
					$data .='<a href="'.$gLink.'" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span>'.$poast_aditional->likes.'</span></a>
					<a href="'.$gLink.'" class="ff-shares" target="_blank"> <i class="ff-icon-shares"> <span>'.$poast_aditional->shares.'</span> </i></a>
					<a href="'.$gLink.'" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span>'.$poast_aditional->comments.'</span></a>';
				}else if($feed->post_type == 'youtube'){
					$yLink = $feed->post_permalink;
					$data .='<a href="'.$yLink.'" class="ff-views" target="_blank"><i class="ff-icon-view"></i> <span>'.$poast_aditional->views.'</span></a>
					<a href="'.$yLink.'" class="ff-likes" target="_blank"> <i class="ff-icon-like"> <span>'.$poast_aditional->likes.'</span> </i></a>
					<a href="'.$yLink.'" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span>'.$poast_aditional->comments.'</span></a>';
				}else if($feed->post_type == 'facebook'){
					$fLink = $feed->post_permalink;
					$data .='<a href="'.$fLink.'" class="ff-likes" target="_blank"> <i class="ff-icon-like"> <span>'.$poast_aditional->likes.'</span> </i></a>
					<a href="'.$fLink.'" class="ff-shares" target="_blank"><i class="ff-icon-shares"></i> <span>'.$poast_aditional->shares.'</span></a>
					<a href="'.$fLink.'" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span>'.$poast_aditional->comments.'</span></a>';
				}
				
				$data .='<div class="ff-share-wrapper">
							<i class="ff-icon-share"></i>
							<div class="ff-share-popup">
								<a href="http://www.facebook.com/sharer.php?u='.$feed->post_permalink.'" class="ff-fb-share" target="_blank"><span>Facebook</span></a>
							<a href="https://twitter.com/share?url='.$feed->post_permalink.'" class="ff-tw-share" target="_blank"><span>Twitter</span></a>
							
							<a href="https://plus.google.com/share?url='.$feed->post_permalink.'" class="ff-gp-share" target="_blank"><span>Google+</span></a>
							
							<a href="https://www.pinterest.com/pin/create/button/?url='.$feed->post_permalink.'" class="ff-pin-share" target="_blank"><span>Pinterest</span></a>
							
							<a href="https://www.linkedin.com/cws/share?url='.$feed->post_permalink.'" class="ff-li-share" target="_blank"><span>Linkedin</span></a>
							
							<a href="mailto:?subject=&amp;body='.$feed->post_permalink.'" class="ff-email-share"><span>Email</span></a>
							</div>
						</div>
					</h6>
				  </div>';
					  
				$dataArr[] = array('item' => $feed,'data' => $data);
			
			}
			$feed_name =  $wpdb->prefix . "social_feed";
			$feedquery = 'SELECT * FROM `'.$feed_name.'` WHERE feed_id = "'.$feed_id.'"';
			$feedObj = $wpdb->get_row( $feedquery , OBJECT );	
			
			$feedFilters = '';
			$feedFilters .='<button class="ff-filter ff-type-all ff-filter--active" data-group="">all</button>';
			
			if($feedObj->is_tw){
				$feedFilters .='<button class="ff-filter" data-group="twitter"><i class="ff-type-twitter"></i></button>';
			}
			if($feedObj->is_fb){
				$feedFilters .='<button class="ff-filter" data-group="facebook"><i class="ff-type-facebook"></i></button>';
			}
			if($feedObj->is_gplus){
				$feedFilters .='<button class="ff-filter" data-group="google"><i class="ff-type-google"></i></button>';
			}	
			if($feedObj->is_youtube){
				$feedFilters .='<button class="ff-filter" data-group="youtube"><i class="ff-type-youtube"></i></button>';
			}
			
			$feedFilters .='<span class="ff-search"><input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" placeholder="Search" /></span>';
			
			
			$response = array('success'=>true,'data'=>$dataArr,'feed_id'=>$feed_id,'next_page_id'=>$next_page_id,'is_next_page'=>$is_next_page,'feedFilters' => $feedFilters);
			wp_send_json( $response, 200 );
		
		die();
		}
	}
	
	
	/* ShortCode For plugin front-end*/
	
	function sm_social_streamer_shortcode( ) {
		?>
		<div class="social_nav" id="ff-stream-1">
			<div class="container-fluid">
			<div class="row">
			<!-- Tab links -->
				<div class="col-md-12 livefeed_tab_box " id="live_feed_tabs">
					<div class="tab_nav live_feed_tab_nav" >
						<ul class="ui-tabs-nav ">
							<?php 
								global $wpdb;
								$feedtable_name = $wpdb->prefix . "social_feed";
								$feedquery      = "SELECT * FROM ".$feedtable_name;
								$allfeed      = $wpdb->get_results( $feedquery );
								foreach($allfeed as $feeditem):
							?>
								<li class="ui-tabs-active ui-state-active"><button class="tablinks" data-id="<?php echo $feeditem->feed_id?>" > <?php echo $feeditem->feed_title?></button></li>
								
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			</div>
			<div class="container-fluid">
			<div class="ff-header">
				<div class="ff-filter-holder">
				  <div class="filter-options">
					<button class="ff-filter ff-type-all ff-filter--active" data-group="">all</button>
					<button class="ff-filter" data-group="facebook"><i class="ff-type-facebook"></i></button>
					<button class="ff-filter" data-group="twitter"><i class="ff-type-twitter"></i></button>
					<button class="ff-filter" data-group="google"><i class="ff-type-google"></i></button>
					<button class="ff-filter" data-group="youtube"><i class="ff-type-youtube"></i></button>
					<span class="ff-search"><input class="textfield filter__search js-shuffle-search" type="search" id="filters-search-input" placeholder="Search" /></span>
				  </div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<span class="sm-top-loader" style="display: none;">
						<span class="sm-square"></span>
						<span class="sm-square"></span>
						<span class="sm-square sm-last"></span>
						<span class="sm-square sm-clear"></span>
						<span class="sm-square"></span>
						<span class="sm-square sm-last"></span>
						<span class="sm-square sm-clear"></span>
						<span class="sm-square"></span>
						<span class="sm-square sm-last"></span>
					</span>
				</div>
			</div>
			<?php 

			$table_name = $wpdb->prefix . "social_feed_post";
			$customPagHTML     = "";
			$query             = "SELECT * FROM ".$table_name;
			$total_query       = "SELECT COUNT(1) FROM (${query}) AS combined_table WHERE feed_id = 1 ";
			$total             = $wpdb->get_var( $total_query );
			$items_per_page    = 15;
			$page              = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
			$offset            = ( $page * $items_per_page ) - $items_per_page;
			$feeds             = $wpdb->get_results( $query . " WHERE feed_id = 1 ORDER BY smart_order ASC , post_timestamp DESC LIMIT ${offset}, ${items_per_page}" );
			$totalPage         = ceil($total / $items_per_page);

			
			
			?>
			
			<div id="grid" class="row my-shuffle-container ff-upic-timestamp ff-upic-round ff-align-left ff-sc-label1 ff-outline-icon ff-gallery-on ">
				<?php 
				//print_r($result);
				foreach($feeds  as $feed){
					
					
					?>	
				<article class=" ff-<?=$feed->post_type?> ff-item picture-item" data-groups='["<?=$feed->post_type?>"]' data-date-created="<?=date('Y-m-d', $feed->post_timestamp)?>" data-title="Central Park">
				  <div class="picture-item__inner picture-item__inner--transition">
					<div class="ff-item-cont">
						<?php if($feed->post_header): ?>
							<h4><a rel="nofollow" href="<?=$feed->post_permalink; ?>" target="_blank"><?=$feed->post_header; ?></a></h4>
						<?php endif; ?>
						<div class="ff-content" style="overflow-wrap: break-word;">
							<?=$feed->post_text?>
						</div>
						<?php if($feed->image_url): ?>
							<span class="ff-img-holder ff-img-landscape ff-img-loaded"><img class="ff-initial-image" src="<?=$feed->image_url?>" style="min-height: <?=$feed->image_height?>;"></span>
						<?php endif; ?>
						<div class="ff-item-meta">
							<span class="ff-userpic" style="background:url(<?=$feed->user_pic?>)">
							<i class="ff-icon ff-label-user_timeline"><i class="ff-icon-inner"></i></i>
							</span>
							<h6><a rel="nofollow" href="<?=$feed->user_link?>" class="ff-name " target="_blank"><?=$feed->user_screenname?></a></h6>
							<a rel="nofollow" href="<?=$feed->user_link?>" class="ff-nickname" target="_blank"><?=$feed->user_nickname?></a>
							<a rel="nofollow" href="<?=$feed->post_permalink?>" class="ff-timestamp" target="_blank"><?php echo date('M d, Y h:m A',$feed->post_timestamp)?></a>
						</div>
						<h6 class="ff-label-wrapper"><i class="ff-icon ff-label-user_timeline"><i class="ff-icon-inner"><span class="ff-label-text"><?=$feed->post_type?></span></i></i></h6>
					</div>
					<h6 class="ff-item-bar">
						<?php 
							$poast_aditional = json_decode($feed->post_additional,false);
							//print_r($poast_aditional);
							$pLink = $feed->post_permalink;
						?>
						<?php if($feed->post_type == 'twitter'): ?>
							<a href="https://twitter.com/intent/tweet?in_reply_to=<?=$feed->post_id?>" class="ff-comments" target="_blank"> <i class="ff-icon-reply"> <span><?=$poast_aditional->shares?></span> </i></a>
							<a href="https://twitter.com/intent/retweet?tweet_id=<?=$feed->post_id?>" class="ff-shares" target="_blank"><i class="ff-icon-shares"></i> <span><?=$poast_aditional->likes?></span></a>
							<a href="https://twitter.com/intent/favorite?tweet_id=<?=$feed->post_id?>" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span><?=$poast_aditional->comments?></span></a>
						<?php endif; ?>
						
						<?php if($feed->post_type == 'google'): ?>
							<a href="<?=$pLink?>" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span><?=$poast_aditional->likes?></span></a>
							<a href="<?=$pLink?>" class="ff-shares" target="_blank"> <i class="ff-icon-shares"> <span><?=$poast_aditional->shares?></span> </i></a>
							<a href="<?=$pLink?>" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span><?=$poast_aditional->comments?></span></a>
						<?php endif; ?>
						
						<?php if($feed->post_type == 'youtube'): ?>
							<a href="<?=$pLink?>" class="ff-views" target="_blank"><i class="ff-icon-view"></i> <span><?=$poast_aditional->views?></span></a>
							<a href="<?=$pLink?>" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span><?=$poast_aditional->likes?></span></a>
							<a href="<?=$pLink?>" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span><?=$poast_aditional->comments?></span></a>
						<?php endif; ?>
						
						<?php if($feed->post_type == 'facebook'): ?>
							<a href="<?=$pLink?>" class="ff-likes" target="_blank"><i class="ff-icon-like"></i> <span><?=$poast_aditional->likes?></span></a>
							<a href="<?=$pLink?>" class="ff-shares" target="_blank"> <i class="ff-icon-shares"> <span><?=$poast_aditional->shares?></span> </i></a>
							<a href="<?=$pLink?>" class="ff-comments" target="_blank"><i class="ff-icon-comment"></i> <span><?=$poast_aditional->comments?></span></a>
						<?php endif; ?>
						
						<div class="ff-share-wrapper">
							<i class="ff-icon-share"></i>
							<div class="ff-share-popup">
								<a href="http://www.facebook.com/sharer.php?u=<?php echo $feed->post_permalink ?>" class="ff-fb-share" target="_blank"><span>Facebook</span></a>
							<a href="https://twitter.com/share?url=<?php echo $feed->post_permalink ?>" class="ff-tw-share" target="_blank"><span>Twitter</span></a>
							
							<a href="https://plus.google.com/share?url=<?php echo $feed->post_permalink ?>" class="ff-gp-share" target="_blank"><span>Google+</span></a>
							
							<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $feed->post_permalink ?>" class="ff-pin-share" target="_blank"><span>Pinterest</span></a>
							
							<a href="https://www.linkedin.com/cws/share?url=<?php echo $feed->post_permalink ?>" class="ff-li-share" target="_blank"><span>Linkedin</span></a>
							
							<a href="mailto:?subject=&amp;body=<?php echo $feed->post_permalink ?>" class="ff-email-share"><span>Email</span></a>
							</div>
						</div>
					</h6>
				  </div>
				</article>
				<?php 
				}
			?>
			</div>
		</div>
		</div>
		<div class="social-loadmore-wrapper">
			<button id="load-more-feed" data-page="2" data-feed="1" >View More</button>
			<span class="sm-loader" style="display:none">
				<span class="sm-square" ></span>
				<span class="sm-square"></span>
				<span class="sm-square sm-last"></span>
				<span class="sm-square sm-clear"></span>
				<span class="sm-square"></span>
				<span class="sm-square sm-last"></span>
				<span class="sm-square sm-clear"></span>
				<span class="sm-square"></span>
				<span class="sm-square sm-last"></span>
			</span>
		</div>
		
		<script>
			var script = document.createElement('script');
			script.src = "<?php echo plugins_url('../assets/js/public.js', __FILE__);?>";
			document.body.appendChild(script);
			
			style = document.createElement('link');
			style.type = "text/css";
			style.id = "ff_style";
			style.rel = "stylesheet"; 
			style.href = "<?php echo plugins_url( '../assets/css/public.css' , __FILE__) ?>";
			style.media = "screen";
			document.getElementsByTagName("head")[0].appendChild(style);	
			
			var style = document.createElement('link');
			style.type = "text/css";
			style.id = "ff_style";
			style.rel = "stylesheet";
			style.href = "<?php echo plugins_url( '../assets/css/stream-id1.css' , __FILE__) ?>";
			style.media = "screen";
			document.getElementsByTagName("head")[0].appendChild(style);
			
			
			function openNewTab(evt, tabId) {
				// Declare all variables
				var i, tabcontent, tablinks;

				// Get all elements with class="tabcontent" and hide them
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}

				// Get all elements with class="tablinks" and remove the class "active"
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}

				// Show the current tab, and add an "active" class to the button that opened the tab
				document.getElementById(tabId).style.display = "block";
				evt.currentTarget.className += " active";
			}
			
		</script>

			
		<?php 
	
	}

	
	public function truncateTable(){
		
		global $wpdb;
		$social_feed_table_name = $wpdb->prefix . 'social_feed';
		$social_feed_post_table_name = $wpdb->prefix . 'social_feed_post';
		$social_post_media_table_name = $wpdb->prefix . 'social_post_media';
	
		$delete_social_feed_table = $wpdb->query("TRUNCATE TABLE $social_feed_table_name");
		$delete_social_feed_post_table_name = $wpdb->query("TRUNCATE TABLE $social_feed_post_table_name");
		$delete_social_post_media_table_name = $wpdb->query("TRUNCATE TABLE $social_post_media_table_name");
		$response = array('success'=>true);
		wp_send_json( $response, 200 );
		die();
	}
	
	public function deleteFeedsFromTable(){
		
		if(isset($_REQUEST['feed_id'])) {
			$feedId = $_REQUEST['feed_id'];
			global $wpdb;
			$social_feed_table_name = $wpdb->prefix . 'social_feed';
		
			$delete_social_feed_table = $wpdb->query("DELETE FROM ".$social_feed_table_name." WHERE feed_id = ".$feedId ." ");

		}
		
		$response = array('success'=>true);
		wp_send_json( $response, 200 );
		die();
	}
	
}
