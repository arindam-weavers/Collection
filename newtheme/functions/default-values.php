<?php
function get_general_header_logo(){ return get_template_directory_uri().'/images/logo.png';	}
function get_general_footer_logo(){ return get_template_directory_uri().'/images/footer_logo.png'; }
function get_topcontct_site_logo(){ return get_template_directory_uri().'/images/contactbox_logo.png'; }

function get_cmrclfrstprlx_image(){ return get_template_directory_uri().'/images/fitness_image.jpg';	}
function get_cmrclfrstprlx_bnimg(){ return get_template_directory_uri().'/images/wahtwelive_text.png';	}
function get_rsdntfrstprlx_image(){ return get_template_directory_uri().'/images/fitness_image.jpg';	}
function get_rsdntfrstprlx_bnimg(){ return get_template_directory_uri().'/images/wahtwelive_text.png';	}
function get_cmrclscndprlx_image(){ return get_template_directory_uri().'/images/testimonialbg.jpg'; }
function get_rsdntscndprlx_image(){ return get_template_directory_uri().'/images/testimonialbg.jpg'; }

function all_default_values($field){
	$default=array();
	/* General Setting */
	$default['grant_theme_general_header_logo'] = get_general_header_logo();
	$default['grant_theme_general_footer_logo'] = get_general_footer_logo();
	/* Top Bar Setting */	
	$default['grant_theme_notice_sale_cnttext'] = "This Week Only 20% OFF All Accessories";
	$default['grant_theme_notice_sale_lnktext'] = "";
	
	$default['grant_theme_scndnt_sale_backgrd'] = "#e4313a";
	$default['grant_theme_scndnt_sale_textclr'] = "#FFFFFF";
	$default['grant_theme_scndnt_sale_cnttext'] = "We're Closed Monday the 10th. Happy Thanksgiving!";
	$default['grant_theme_scndnt_sale_lnktext'] = "";
	/* Top Contact Info */
	$default['grant_theme_topcontct_site_logo'] = get_topcontct_site_logo();
	$default['grant_theme_topcontct_txt_cntnt'] = "We love questions! If you want to know more about our products or are looking for a quote on a commercial or residential build please use the form below(or call us during business hours).";
	$default['grant_theme_topcontct_txt_shtce'] = '[contact-form-7 id="6" title="Contact Form"]';
	/* Social Setting */
	$default['grant_theme_social_link_facebok'] = "#";
	$default['grant_theme_social_link_twitter'] = "#";
	$default['grant_theme_social_link_youtube'] = "#";
	/* Best Sellers */
	$default['grant_theme_cmrclbstsellr_title'] = "BESTSELLERS";
	$default['grant_theme_cmrclbstsellr_cotnt'] = "The Apple Fitness Store stands behind all of the products we sell. That said,there are certain products that standout as exceptional because of their durability and track record.";
	$default['grant_theme_rsdntbstsellr_title'] = "BESTSELLERS";
	$default['grant_theme_rsdntbstsellr_cotnt'] = "The Apple Fitness Store stands behind all of the products we sell. That said,there are certain products that standout as exceptional because of their durability and track record.";
	/* First Parrallax */
	$default['grant_theme_cmrclfrstprlx_image'] = get_cmrclfrstprlx_image();
	$default['grant_theme_cmrclfrstprlx_title'] = "Eros consequat a dis";
	$default['grant_theme_cmrclfrstprlx_cotnt'] = "Morbi blandit ridiculus pulvinar quis vulputate a lobortis per  vestibulum ridiculus pulvinar.";
	$default['grant_theme_cmrclfrstprlx_bnimg'] = get_cmrclfrstprlx_bnimg();
	$default['grant_theme_cmrclfrstprlx_bnlnk'] = "#";
	$default['grant_theme_rsdntfrstprlx_image'] = get_rsdntfrstprlx_image();
	$default['grant_theme_rsdntfrstprlx_title'] = "Eros consequat a dis";
	$default['grant_theme_rsdntfrstprlx_cotnt'] = "Morbi blandit ridiculus pulvinar quis vulputate a lobortis per  vestibulum ridiculus pulvinar.";
	$default['grant_theme_rsdntfrstprlx_bnimg'] = get_rsdntfrstprlx_bnimg();
	$default['grant_theme_rsdntfrstprlx_bnlnk'] = "#";
	/* Second Parrallax */
	$default['grant_theme_cmrclscndprlx_image'] = get_cmrclscndprlx_image();
	$default['grant_theme_cmrclscndprlx_quote'] = "Morbi blandit ridiculus pulvinar quis vulputate a lobortis vestibulum per";
	$default['grant_theme_cmrclscndprlx_athor'] = "Ridiculus Pulvinar";
	$default['grant_theme_rsdntscndprlx_image'] = get_rsdntscndprlx_image();
	$default['grant_theme_rsdntscndprlx_quote'] = "Morbi blandit ridiculus pulvinar quis vulputate a lobortis vestibulum per";
	$default['grant_theme_rsdntscndprlx_athor'] = "Ridiculus Pulvinar";

	/*******************************/
	$default['grant_theme_notice_button_text'] = "";
	$default['grant_theme_notice_button_link'] = "";
	$default['grant_theme_notice_default_banr'] = "";
	$default['grant_theme_notice_actsale_optn'] = "";
	$default['grant_theme_scndnt_actsale_optn'] = "";
	$default['grant_theme_notice_sale_backgrd'] = "";
	$default['grant_theme_notice_sale_textclr'] = ""; 

	
	return $default[$field];
	}
?>