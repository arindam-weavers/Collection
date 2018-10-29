</main>
<!--footer section-->

<div id="zendesk_id_cus">
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="https://v2.zopim.com/?5GMZjQGn8eRgq7yXBWdqL3bU3vG4dtyW";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
</div>
<footer class="footer_section">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="inner_container">
                	<?php
					$grant_theme_general_footer_logo =	get_theme_value('grant_theme_general_footer_logo');
					$grant_theme_social_link_facebok =	get_theme_value('grant_theme_social_link_facebok');
					$grant_theme_social_link_twitter =	get_theme_value('grant_theme_social_link_twitter');
					$grant_theme_social_link_youtube =	get_theme_value('grant_theme_social_link_youtube');
					?>
                	<div class="ftrtop_section">
                    	<div class="footer_logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo $grant_theme_general_footer_logo; ?>" alt="Apple Fitness"></a></div>
                        <div class="footer_social">
                            <ul>
                            	<li class="fb"><a target="_blank" href="<?php echo $grant_theme_social_link_facebok; ?>">Facebook</a></li>
                                <li class="twt"><a target="_blank" href="<?php echo $grant_theme_social_link_twitter; ?>">Twitter</a></li>
                                <li class="ytb"><a target="_blank" href="<?php echo $grant_theme_social_link_youtube; ?>">Youtube</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="ftrmid_section">
                    	<div class="row">
                        	<div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-menu-1st-coloumn')): dynamic_sidebar('footer-menu-1st-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-menu-2nd-coloumn')): dynamic_sidebar('footer-menu-2nd-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-menu-3rd-coloumn')): dynamic_sidebar('footer-menu-3rd-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-menu-4th-coloumn')): dynamic_sidebar('footer-menu-4th-coloumn'); endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="ftrlower_section">
                    	<div class="row">
                            <div class="col-sm-3 col-xs-6">
                                <?php if(is_active_sidebar('footer-contact-1st-coloumn')): dynamic_sidebar('footer-contact-1st-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                                <?php if(is_active_sidebar('footer-contact-2nd-coloumn')): dynamic_sidebar('footer-contact-2nd-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-contact-3rd-coloumn')): dynamic_sidebar('footer-contact-3rd-coloumn'); endif; ?>
                            </div>
                            <div class="col-sm-3 col-xs-6">
                            	<?php if(is_active_sidebar('footer-contact-4th-coloumn')): dynamic_sidebar('footer-contact-4th-coloumn'); endif; ?>
<table width="135" border="0" cellpadding="2" cellspacing="0" title="Click to Verify - This site chose Symantec SSL for secure e-commerce and confidential communications."><tr><td width="135" align="center" valign="top"><script type="text/javascript" src="https://seal.websecurity.norton.com/getseal?host_name=grant_theme.com&amp;size=L&amp;use_flash=NO&amp;use_transparent=No&amp;lang=en"></script><br /><a href="https://www.websecurity.symantec.com/ssl-certificate" target="_blank"  style="color:#000000; text-decoration:none; font:bold 10px verdana,sans-serif; letter-spacing:.5px;text-align:center; margin:0px; padding:0px;"></a></td></tr></table>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" id="back-to-top" title="Back to top">
<img src="<?php echo get_bloginfo('template_directory')?>/images/uparrow.png" />
</a>
<!--footer section-->
<?php wp_footer(); ?>


<style type="text/css">
.prodloopbox {
    min-height: 210px;
}
</style>

<script type="text/javascript">
var busy = false,limit = 8,offset = 0,num = 1;
var hidTerm = jQuery("input#hidTerm").val()
var $container = jQuery('#grid');
function displayRecords(lim, off){
	jQuery.ajax({
		type: "GET",
		async: false,
		url: "<?php echo get_bloginfo('template_directory')?>/ajax-masonry.php",
		data: "limit=" + lim + "&offset=" + off + "&num="+num +"&hidTerm=" + hidTerm,
		cache: false,
		beforeSend: function(){
			jQuery("#loader_message").html("").hide();
			jQuery('#loader_image').show();
			},
		success: function(html){
			if(html=='no'){
				jQuery("#grid").attr('data-load','no');
			} else {
			jQuery("#grid").append(html);
			new AnimOnScroll(document.getElementById('grid'), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2,
				});
			jQuery('#loader_image').hide();
			window.busy = false;
			}
			}
		});
	}
jQuery(document).ready(function(){
	if(busy == false){
		busy = true;
		displayRecords(limit, offset);
		}
	jQuery(window).scroll(function(){
		if(jQuery(window).scrollTop()+ jQuery(window).height()> jQuery("#art_ajdiv").height()&& !busy){
			busy = true;
			offset = limit + offset;
			setTimeout(function(){ displayRecords(limit, offset); }, 300);
			}
		});
	});
new AnimOnScroll(document.getElementById('grid2'), {
	minDuration : 0.4,
	maxDuration : 0.7,
	viewportFactor : 0.2
	});
function term_loader(tid){
	document.getElementById('tcat').value = tid;
	jQuery("#customsearch").submit();
	}
</script>
<script type="text/javascript">
jQuery('a#support').click(function(){

    /*jQuery("a#support").toggleClass("chatshow");

    if (jQuery("a#support").hasClass("chatshow")) {
     jQuery('.zopim:nth-child(2)').show();
     jQuery('.zopim:nth-child(1)').hide();
    }else{     
        jQuery('.zopim:nth-child(2)').hide();
        jQuery('.zopim:nth-child(1)').show();
       // jQuery('.meshim_widget_components_chatWindow_PreChatOfflineForm.cwp_medium').hide();
    }*/

    $zopim.livechat.window.toggle();
    
});
/*jQuery('#jx_ui_Widget').click(function(){
    if(jQuery('.zopim').css('display') == 'none'){
        jQuery('.zopim').css('display','block');
    }
    if(jQuery('.zopim').css('display') == 'block'){
        jQuery('.zopim').css('display','none');
    }
});*/

   
</script>

<script type="text/javascript">
jQuery('a#live_chat').click(function(){

    $zopim.livechat.window.toggle();

    /*jQuery("a#live_chat").toggleClass("chatshow2");
    if (jQuery("a#live_chat").hasClass("chatshow2")) {

    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="https://v2.zopim.com/?5GMZjQGn8eRgq7yXBWdqL3bU3vG4dtyW";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
     jQuery('.zopim:nth-child(2)').show();
    }else{     
        jQuery('.zopim:nth-child(2)').hide();
       // jQuery('.meshim_widget_components_chatWindow_PreChatOfflineForm.cwp_medium').hide();
    }*/
});
</script>

</body>
</html>