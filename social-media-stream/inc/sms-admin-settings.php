<div class="container">
	<div class="sm-row">
		<div class="sm-col-12">
			<h1 class="sm-settings-title">Social feeds</h1>
			<p>Please wait after submit untill the page reload. Cause we fetch data from social media</p>
		</div>
	</div>
	
	<?php 
		global $wpdb;
		$table_name = $wpdb->prefix . "social_feed";
		$query      = "SELECT * FROM ".$table_name;
		$customPagHTML     = "";
		$total_query    = "SELECT COUNT(1) FROM (${query}) AS combined_table";
		$total          = $wpdb->get_var( $total_query );
		$items_per_page = 10;
		$page              = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
		$offset            = ( $page * $items_per_page ) - $items_per_page;
		$feeds    	= $wpdb->get_results( $query . " ORDER BY feed_id  DESC LIMIT ${offset}, ${items_per_page}" );
	?>
	
	<!-- The Modal -->
	<div id="new-feed" class="modal">
	  <!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<form class="feed-add-form">
				<div class="sm-row">
					<div class="sm-col-12">
						<label>Feed Title</label>
						<input type="text" name="feed_title" class="sm-form-control" required>
					</div>
					<div class="sm-col-12">
						<label>Add facebook?</label>
						<input type="checkbox" name="is_fb" class="sm-form-control toggle-option" id="is_fb" data-id="facebook-wrap">
					</div>
					<div class="facebook-wrap" style="display:none">
						<div class="sm-col-12">
							<label>Facebook page id</label>
							<input type="text" name="fb_page_id" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Facebook access token</label>
							<input type="text" name="fb_access_token" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Facebook app id</label>
							<input type="text" name="fb_app_id" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Facebook app secret</label>
							<input type="text" name="fb_app_secret" class="sm-form-control">
						</div>
					</div>
					<div class="sm-col-12">
						<label>Add Google Plus?</label>
						<input type="checkbox" name="is_gplus" class="sm-form-control toggle-option" id="is_gplus" data-id="google-wrap" >
					</div>
					<div class="google-wrap" style="display:none">
						<div class="sm-col-12">
							<label>Google Plus Auth Token</label>
							<input type="text" name="gplus_auth_token" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Google Plus uid</label>
							<input type="text" name="gplus_uid" class="sm-form-control">
						</div>
					</div>
					<div class="sm-col-12">
						<label>Add youtube?</label>
						<input type="checkbox" name="is_youtube" class="sm-form-control toggle-option" id="is_youtube" data-id="youtube-wrap" >
					</div>
					<div class="youtube-wrap" style="display:none">
						<div class="sm-col-12">
							<label>Youtube Channel Id</label>
							<input type="text" name="yt_channel_id" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Youtube auth token</label>
							<input type="text" name="yt_auth_token" class="sm-form-control">
						</div>
					</div>
					<div class="sm-col-12">
						<label>Add Twitter?</label>
						<input type="checkbox" name="is_tw" class="sm-form-control toggle-option" id="is_tw" data-id="twitter-wrap">
					</div>
					<div class="twitter-wrap" style="display:none">
						<div class="sm-col-12">
							<label>Twitter consumer</label>
							<input type="text" name="tw_consumer" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Twitter consumer secret</label>
							<input type="text" name="tw_consumer_secret" class="sm-form-control">
						</div>	
						<div class="sm-col-12">
							<label>Twitter access token</label>
							<input type="text" name="tw_access_token" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Twitter access token secret</label>
							<input type="text" name="tw_access_token_secret" class="sm-form-control">
						</div>
						<div class="sm-col-12">
							<label>Twitter User Name</label>
							<input type="text" name="tw_user" class="sm-form-control">
						</div>
					</div>
					<input type="hidden" name="action" value="add_social_feed">
					<div class="sm-col-12">
						<input type="button" name="sbmit" value="submit" id="submit-add-feed">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="sm-row">
		<div class="sm-col-12">
			<button id="add-new-feed">Add New Feed</button>

		</div>
	</div>
	
	<div class="sm-row">
		<div class="sm-col-12">
			<div class="sm-settings-wrap">
			<table class="admin-table">
			  <thead>
				<tr>
				  <th>ID</th>
				  <th>Feed Title</th>
				  <th>Options</th>
				</tr>
			  </thead>
			  <tbody>
				<?php foreach($feeds as $feed): ?>
					<tr>
					  <td><?php echo $feed->feed_id?></td>
					  <td><?php echo $feed->feed_title?></td>
					  <td><a href="javascript:void(0)" data-id="<?php echo $feed->feed_id?>" class="delete-feed">delete</a></td>
					</tr>
				<?php endforeach; ?>
			  </tbody>
			</table>
			
			</div>
		</div>
	</div>
	<?php 
		if($totalPage > 1){
			$customPagHTML     =  '<div><span>Page '.$page.' of '.$totalPage.'</span>'.paginate_links( array(
			'base' => add_query_arg( 'cpage', '%#%' ),
			'format' => '',
			'prev_text' => __('&laquo;'),
			'next_text' => __('&raquo;'),
			'total' => $totalPage,
			'current' => $page
			)).'</div>';
		}
		echo $customPagHTML;
	?>
</div>

<style type="text/css">
	input#sm-save-settings {
		padding: 5px 15px;
		background: #56ca39;
		box-shadow: 1px 1px #c2d6bd;
		border-radius: 4px;
		color: #ffffff;
		font-size: 15px;
	}
	.sm-settings-wrap label {
		margin-right: 5px;
		font-size: 16px;
		font-weight: 600;
	}
	.sm-settings-title {
		letter-spacing: 1px;
		text-transform: uppercase;
		font-weight: 800;
		border: 1px solid #248a3f;
		width: 27%;
		padding: 20px;
	}
	.sm-text-center {
		text-align: center;
	}
    .sm-form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .sm-form-control:focus {
        border-color: #66afe9;
        outline: 0;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    }
    .sm-form-control::-moz-placeholder {
        color: #999;
        opacity: 1;
    }
    .sm-form-control:-ms-input-placeholder {
        color: #999;
    }
    .sm-form-control::-webkit-input-placeholder {
        color: #999;
    }
    .sm-form-control::-ms-expand {
        border: 0;
        background-color: transparent;
    }
    .sm-form-control[disabled],
    .sm-form-control[readonly],
    fieldset[disabled] .sm-form-control {
        background-color: #eeeeee;
        opacity: 1;
    }
    .sm-form-control[disabled],
    fieldset[disabled] .sm-form-control {
        cursor: not-allowed;
    }
    select.sm-form-control {
        height: @input-height-small;
        line-height: @input-height-small;
    }
    textarea.sm-form-control {
        height: auto;
    }
    .sm-form-group {
        margin-bottom: 15px;
    }
    .form-group {
        display: inline-block;
        margin-bottom: 0;
        vertical-align: middle;
    }

    .sm-row {
        margin-right: -15px;
        margin-left: -15px;
        margin-bottom: 15px;
    }

    .sm-row:before,.sm-row:after
    {
        display: table;
        content: " ";
    }
    .sm-row:after
    {
        clear: both;
    }
    .sm-col-6 {
        width: 50%;
        float: left;
    }
    .sm-col-8 {
        width: 66.66%;
        float: left;
    }
    .sm-col-7 {
        width: 58.33%;
        float: left;
    }
    .sm-col-5 {
        width: 41.66%;
        float: left;
    }
    .sm-col-4 {
        width: 33.33%;
        float: left;
    }
	.sm-col-1 {
		width: 8.33%;
        float: left;
	}
	.sm-col-11{
		width: 91.66%;
        float: left;
	}
    .sm-col-1, .sm-col-5,.sm-col-6, .sm-col-8, .sm-col-7, .sm-col-11, .sm-col-12 {
        position: relative;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
    }
	.container {
	  padding-right: 15px;
	  padding-left: 15px;
	  margin-right: auto;
	  margin-left: auto;
	}
	@media (min-width: 768px) {
	  .container {
		width: 750px;
	  }
	}
	@media (min-width: 992px) {
	  .container {
		width: 970px;
	  }
	}
	@media (min-width: 1200px) {
	  .container {
		width: 1170px;
	  }
	}
	
	.admin-table thead th {
		border: 1px solid #ccc4c4;
		font-weight: 600;
		font-size: 16px;
		height: 25px;
		color: #1d47e0;
		text-transform: uppercase;
	}
	table.admin-table {
		width: 95%;
		overflow-x: scroll;
	}
	button#add-new-feed {
		float: right;
		margin-right: 10%;
		padding: 8px 15px;
		background-color: #24b722;
		border-radius: 5px;
		color: #fff;
		text-transform: uppercase;
		font-weight: 800;
	}
	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 9999; /* Sit on top */
		margin-top:20px;
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
		overflow:scroll;
		height:100%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
	form.feed-add-form {
		padding: 15px;
	}
	table.admin-table tbody tr td {
		border: 1px solid #c7c3c0;
		padding: 5px;
		text-align: center;
		font-size: 15px;
		color: #7699e6;
	}
</style>

<script>
	// Get the modal
	var modal = document.getElementById('new-feed');

	// Get the button that opens the modal
	var btn = document.getElementById("add-new-feed");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
		modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	jQuery(document).ready(function(){
		jQuery('.feed-add-form .toggle-option').change(function(){
			//console.log('hi');
			if(jQuery(this).val() == 1){
				jQuery(this).val(0);
			}else{
				jQuery(this).val(1);
			}
			var dataId = jQuery(this).attr('data-id');
			jQuery("."+dataId).toggle();
		});
		jQuery("#submit-add-feed").click(function(e){
			var form = jQuery(this).parents('form');
			var url = "<?php echo admin_url('admin-ajax.php')?>";

			jQuery.ajax({
			   type: "POST",
			   url: url,
			   data: form.serialize(),
			   success: function(response)
			   {
					if(response.success){
					   fetchSocialFeed(response.feed_id);
					   //location.reload();
					}
			   }
			});

			e.preventDefault();
		})
	})
	
	function fetchSocialFeed(feed_id){
		var url = "<?php echo admin_url('admin-ajax.php')?>";
		jQuery.ajax({
		   type: "POST",
		   url: url,
		   data: {action: 'fetch_social_feed',feed_id: feed_id},
		   success: function(response)
		   {
				if(response.success){
				    location.reload();
				}
		   }
		});
	}
	
	jQuery("#truncateTable").click(function(){
		var url = "<?php echo admin_url('admin-ajax.php')?>";
		jQuery.ajax({
		   type: "POST",
		   url: url,
		   data: {action: 'truncate_table'},
		   success: function(response)
		   {
				if(response.success){
				    location.reload();
				}
		   }
		});
	})
	
	jQuery(".delete-feed").click(function(){
		var url = "<?php echo admin_url('admin-ajax.php')?>";
		var feed_id = jQuery(this).attr('data-id');
		jQuery.ajax({
		   type: "POST",
		   url: url,
		   data: {action: 'delete_feed',feed_id: feed_id},
		   success: function(response)
		   {
				if(response.success){
				   location.reload();
				}
		   }
		});
	})
	
	
</script>
