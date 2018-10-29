<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
<meta name="google-site-verification" content="C5buideCe8ShqtUgQQkMuhUd9uma8YR0YPzdRfmsLMc" />
<?php wp_head(); ?>
<!-- Google Analytics Code (-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64304739-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Analytics Code )-->
<!--Start of Zendesk Chat Script-->

<!--End of Zendesk Chat Script-->
</head>
<!--/head-->
<body <?php body_class(); ?>>
<!--header section-->
<header class="header_section">
	<?php 
	$grant_theme_notice_default_banr =	get_theme_value('grant_theme_notice_default_banr');
	
	$grant_theme_notice_actsale_optn =	get_theme_value('grant_theme_notice_actsale_optn');
	$grant_theme_notice_sale_backgrd =	get_theme_value('grant_theme_notice_sale_backgrd');
	$grant_theme_notice_sale_textclr =	get_theme_value('grant_theme_notice_sale_textclr');
	$grant_theme_notice_sale_cnttext =	get_theme_value('grant_theme_notice_sale_cnttext');
	$grant_theme_notice_sale_lnktext =	get_theme_value('grant_theme_notice_sale_lnktext');
    $grant_theme_notice_button_text = get_theme_value('grant_theme_notice_button_text');
    $grant_theme_notice_button_link = get_theme_value('grant_theme_notice_button_link');
	?>
	<div class="topheader_section" style="background-color:<?php echo $grant_theme_notice_sale_backgrd; ?>"> 
        <div class="small_device_caption">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="header_text_panel">
                            <h6>
                                <?php if($grant_theme_notice_actsale_optn != 'false'){ ?>
                                <?php if(!empty($grant_theme_notice_sale_lnktext)){ ?><a href="<?php echo $grant_theme_notice_sale_lnktext; ?>"><?php } ?><?php echo $grant_theme_notice_sale_cnttext; ?><?php if(!empty($grant_theme_notice_sale_lnktext)){ ?></a><?php } ?>
                                <?php } ?>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                    <div id="switch_text" class="switch_button">
                        <ul>
                            <li class="hd1" style="display:none"><a href="#tab_box_detect" id="ResidentialButton_home">Switch To Residential</a></li>
                            <li class="hd2"><a href="#tab_box_detect" id="CommercialButton_home" >Switch To Commercial</a></li>
                        </ul>
                    </div>
                    <div class="header_text_panel">
                        <h6>
                            <?php if($grant_theme_notice_actsale_optn != 'false'){ ?>
                            <?php if(!empty($grant_theme_notice_sale_lnktext)){ ?><a href="<?php echo $grant_theme_notice_sale_lnktext; ?>"><?php } ?><?php echo $grant_theme_notice_sale_cnttext; ?><?php if(!empty($grant_theme_notice_sale_lnktext)){ ?></a><?php } ?>
                            <?php } ?>
                        </h6>
                        
                    </div>
                    <?php if(!empty($grant_theme_notice_button_text)){ ?>
                    <div class="contact_button">
                        <a id="OpnPop" href="<?php echo $grant_theme_notice_button_link; ?>"><?php echo $grant_theme_notice_button_text; ?></a>
                    </div>
                    <div class="support_button"><a id="support" href="javascript:void(0);">Live Chat</a></div>
                    <?php } ?>
                </div>
            </div>
        </div>   
        
        <?php if(!empty($grant_theme_notice_button_text)){ ?>
                    <div class="topheader_flyingbox">
                        <div class="commerce_panel">
                            <ul>
                                <!--<li class="cart"><a href="<?php //echo site_url().'/cart'; ?>">Cart <span class="counter">1</span></a></li>-->
                <?php 
                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $count = WC()->cart->cart_contents_count;
                ?>
                <li class="cart"><a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart-contents">Cart <span class="counter"><?php echo esc_html( $count ); ?></span></a></li>
                <?php } ?>
                                <!--<li class="user"><a href="#">User</a></li>-->

                            <?php if ( is_user_logged_in() ) { ?>
                            <li class="user">
                                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">User</a>
                            </li>
                            <?php }else{ ?>
                            <li class="user"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">User</a></li>
                            <?php } ?>

                            </ul>
                        </div>
                    </div>
                    
                    <?php } ?>
        
        <div class="header_social">
        <?php        
		$grant_theme_social_link_facebok =	get_theme_value('grant_theme_social_link_facebok');
		$grant_theme_social_link_twitter =	get_theme_value('grant_theme_social_link_twitter');
		$grant_theme_social_link_youtube =	get_theme_value('grant_theme_social_link_youtube');
		?>
        	<ul>
            	<li class="fb"><a target="_blank" href="<?php echo $grant_theme_social_link_facebok; ?>">Facebook</a></li>
                <li class="twt"><a target="_blank" href="<?php echo $grant_theme_social_link_twitter; ?>">Twitter</a></li>
                <li class="ytb"><a target="_blank" href="<?php echo $grant_theme_social_link_youtube; ?>">Youtube</a></li>
            </ul>
        </div>
        <div class="searchbox">
        	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
              <label class="search">
              <input class="icn_srch" type="text" name="s" id="s" value=""/>
              </label>
            </form>        	
        </div>
        <!--top megacontent box-->
        <div class="mega_contactbox" id="MegaCnt">
        	<div class="container">
            	<div class="row">
                	<?php 
					$grant_theme_topcontct_site_logo =	get_theme_value('grant_theme_topcontct_site_logo');
					$grant_theme_topcontct_txt_cntnt =	get_theme_value('grant_theme_topcontct_txt_cntnt');
					$grant_theme_topcontct_txt_shtce =	get_theme_value('grant_theme_topcontct_txt_shtce');
					?>
                	<div class="col-md-7 contactbox_left">
                    	<div class="top_section">
                        	<div class="row">
                            	<div class="col-sm-12">
                                	<div class="contact_logobox"><a href="<?php echo site_url(); ?>"><img src="<?php echo $grant_theme_topcontct_site_logo; ?>" alt="Apple Fitness"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_section">
                        	<div class="row">
                            	<div class="col-sm-4 infobox">
                                	<?php if(is_active_sidebar('footer-contact-1st-coloumn')): dynamic_sidebar('footer-contact-1st-coloumn'); endif; ?>
                                </div>
                                <div class="col-sm-4 infobox">
                                    <?php if(is_active_sidebar('footer-contact-2nd-coloumn')): dynamic_sidebar('footer-contact-2nd-coloumn'); endif; ?>
                                </div>
                                <div class="col-sm-4 infobox toplast">
                                	<div class="hourbox">
                                      <?php if(is_active_sidebar('footer-contact-3rd-coloumn')): dynamic_sidebar('footer-contact-3rd-coloumn'); endif; ?>
                                    </div>
                                    <div class="hourbox">
                                      <?php if(is_active_sidebar('footer-contact-4th-coloumn')): dynamic_sidebar('footer-contact-4th-coloumn'); endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 contactbox_right">
                        <div class="rightbox_outer">
                        	<?php if(!empty($grant_theme_topcontct_txt_cntnt)){ ?>
                            <div class="right_dscbox">
                                <p><?php echo $grant_theme_topcontct_txt_cntnt; ?></p>
                            </div>
                            <?php } ?>
                            <?php if(!empty($grant_theme_topcontct_txt_shtce)){ ?>
                            <div class="formbox">
                                <?php //echo do_shortcode($grant_theme_topcontct_txt_shtce);?>
                                <form name="contact_form_header" id="contact_form_header" method="post">
                                    <div class="row">
                                    <div class="col-xs-6">
                                    <input class="form-control" type="text" name="first_name" id="first_name" placeholder="First Name">
                                    </div>
                                    <div class="col-xs-6">
                                    <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xs-6">
                                    <input class="form-control" type="email" name="email_id" id="email_id" placeholder="Email ID">
                                    </div>
                                    <div class="col-xs-6">
                                    <input class="form-control" type="text" name="contact_no" id="contact_no" placeholder="Contact No.">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xs-12">
                                    <textarea class="form-control" placeholder="Message" name="message" id="message" ></textarea>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-xs-12 text-center">
                                    <input type="submit" name="submit" id="submit" value="Submit">
                                    <div class="loader"><img src="<?php echo get_template_directory_uri();?>/images/ajax-loader.gif"></div>
                                    </div>
                                    </div>
                                    <?php $current_url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
                                    <input id="current_url" name="current_url" type="hidden" value="<?php echo $current_url;?>"/>
                                </form>
                                <div class="success_msg">Your message was sent successfully. Thanks.</div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-sm-12">
                    	<div class="lowerbutton_section">
                        	<a id="ClsPop" href="#">Hide</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--top megacontent box-->
    </div>
    <div class="botmheader_section">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
                	<div class="menu_section">
                    <?php $grant_theme_general_header_logo =	get_theme_value('grant_theme_general_header_logo'); ?>
                    	<div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo $grant_theme_general_header_logo; ?>" alt="Apple Fitness"></a></div>
                        <div class="menu_butn">Menu</div>
                        <div class="main_menu">
                        	<?php wp_nav_menu(array('menu'=>'Primary Menu')); ?>                         	
                        </div>
                        <div class="mobile_menu" style="left:-80%;">
							<?php //wp_nav_menu(array('menu'=>'Primary Menu')); ?>
                            <div id="MobileAppndMenu">
                                <?php wp_nav_menu(array('menu'=>'Mobile Menu Header')); ?> 
                              <!--<ul>
                                <?php
                                $AllProdTax=get_terms(array('taxonomy'=>'fitness_product_cat','parent'=>0,'hide_empty'=> false));
                                foreach($AllProdTax as $SingleProdTax){
                                $ProdTaxID=$SingleProdTax->term_id;
                                $ProdTaxName=$SingleProdTax->name;
                                ?>
                                <li><a href="<?php echo get_term_link($SingleProdTax->term_id); ?>"><?php echo $ProdTaxName; ?></a>
                                    <?php
                                    $current_term = $ProdTaxID;
                                    $current_term_taxo = 'fitness_product_cat';
                                    $args = array('parent'  => $current_term,'hide_empty' => 0,'hierarchical' => true);
                                    $terms = get_terms($current_term_taxo,$args);
                                    if(!empty($terms)&& !is_wp_error($terms)){
                                    ?>
                                    <ul>
                                        <?php foreach($terms as $term){ ?>
                                        <li><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></li>        
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>  
                                </li>
                                <?php } ?>
                                <li><a href="<?php echo get_permalink(72); ?>">About Us 1</a></li>
                              </ul>-->
                            </div>
                            <div class="close_butn">Close</div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--megamenu-->
        <!--*****************************************************************************************-->
        <div class="megamenu" id="MegaCmrl">        	
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    <?php
					$current_term = 136;
					$current_term_taxo = 'product_cat';
					$args = array(
					'parent'  => $current_term,
					'hide_empty' => 0,
					'hierarchical' => true,					
					);
					$terms = get_terms($current_term_taxo,$args );
					if(! empty($terms) && ! is_wp_error( $terms ) ) {
					$i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 7){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 6){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_1">
                    <?php } ?>
                    <?php }elseif($i > 6 || $i <= 12){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                        
                    </div>                    
                    <?php $CmrlCnt = count($terms); ?>
                    <?php if($CmrlCnt > 6){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_1" href="#">Alternative Products</a>
                            <a id="disappearBx_1" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="megamenu" id="MegaRsdl">        	
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    <?php
					$current_term = 117;
					$current_term_taxo = 'product_cat';
					$args = array(
					'parent'  => $current_term,
					'hide_empty' => 0,
					'hierarchical' => true,					
					);
					$terms = get_terms($current_term_taxo,$args );
					if(! empty($terms) && ! is_wp_error( $terms ) ) {
					$i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 8){?>
                    <div class="productbox residential_prod">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox ">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 7){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_2">
                    <?php } ?>
                    <?php }elseif($i > 7 || $i <= 14){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                       
                    </div>
                    <?php $RsdlCnt = count($terms); ?>
                    <?php if($RsdlCnt > 7){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_2" href="#">Alternative Products</a>
                            <a id="disappearBx_2" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="megamenu" id="MegaAcrs">        	
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    <?php
					$current_term = 145;
					$current_term_taxo = 'product_cat';
					$args = array(
					'parent'  => $current_term,
					'hide_empty' => 0,
					'hierarchical' => true,					
					);
					$terms = get_terms($current_term_taxo,$args );
					if(! empty($terms) && ! is_wp_error( $terms ) ) {
					$i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 8){?>
                    <div class="productbox residential_prod">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 7){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_3">
                    <?php } ?>
                    <?php }elseif($i > 7 || $i <= 14){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                         
                    </div>
                    <?php $AcrsCnt = count($terms); ?>
                    <?php if($AcrsCnt > 7){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_3" href="#">Alternative Products</a>
                            <a id="disappearBx_3" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <div class="megamenu" id="MegaScft">        	
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    <?php
					$current_term = 153;
					$current_term_taxo = 'product_cat';
					$args = array(
					'parent'  => $current_term,
					'hide_empty' => 0,
					'hierarchical' => true,					
					);
					$terms = get_terms($current_term_taxo,$args );
					if(! empty($terms) && ! is_wp_error( $terms ) ) {
					$i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 7){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 6){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_4">
                    <?php } ?>
                    <?php }elseif($i > 6 || $i <= 12){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                         
                    </div>
                    <?php $ScftCnt = count($terms); ?>
                    <?php if($ScftCnt > 6){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_4" href="#">Alternative Products</a>
                            <a id="disappearBx_4" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="megamenu" id="MegaInvt">        	
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    <?php
					$current_term = 91;
					$current_term_taxo = 'fitness_product_cat';
					$args = array(
					'parent'  => $current_term,
					'hide_empty' => 0,
					'hierarchical' => true,					
					);
					$terms = get_terms($current_term_taxo,$args );
					if(! empty($terms) && ! is_wp_error( $terms ) ) {
					$i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 7){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 6){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_5">
                    <?php } ?>
                    <?php }elseif($i > 6 || $i <= 12){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>							
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                         
                    </div>
                    <?php $IvmtCnt = count($terms); ?>
                    <?php if($IvmtCnt > 6){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_5" href="#">Alternative Products</a>
                            <a id="disappearBx_5" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="megamenu" id="MegaCybex">            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    <?php
                    $current_term = 99;
                    $current_term_taxo = 'fitness_product_cat';
                    $args = array(
                    'parent'  => $current_term,
                    'hide_empty' => 0,
                    'hierarchical' => true,                 
                    );
                    $terms = get_terms($current_term_taxo,$args );
                    if(! empty($terms) && ! is_wp_error( $terms ) ) {
                    $i=1;; foreach ($terms as $term ) { ?>
                    <?php if($i < 7){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>                         
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php if($i == 6){?>
                    </div>
                    <div class="col-sm-12 hiddenBx" id="hiddenBx_5">
                    <?php } ?>
                    <?php }elseif($i > 6 || $i <= 12){?>
                    <div class="productbox">
                    <a href="<?php echo get_term_link($term->term_id); ?>">
                    <div class="thumbbox">
                    <?php if (function_exists('z_taxonomy_image_url')) { ?>                         
                    <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" alt="<?php echo $term->name; ?>"/>
                    <?php } ?>
                    </div>
                    <h4><?php echo $term->name; ?></h4>
                    </a>
                    </div>
                    <?php } ?>
                    <?php $i++; } } ?>                         
                    </div>
                    <?php $IvmtCnt = count($terms); ?>
                    <?php if($IvmtCnt > 6){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_5" href="#">Alternative Products</a>
                            <a id="disappearBx_5" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="megamenu" id="MegaKeiser">            
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $i=1;
                        $keiser_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 12,
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_ids',
                            'terms' => 158,
                            'include_children' => false
                            )
                          )
                        );                        
                        $keiser_query = new WP_Query( $keiser_args );
                        //print_r($keiser_query);
                        if ( $keiser_query->have_posts() ) { 
                            while ( $keiser_query->have_posts() ) { 
                                $keiser_query->the_post(); 
                                if(get_post_thumbnail_id()!=""){
                                    $postimg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                                }
                                if($i < 7){
                                ?>
                                <div class="productbox">
                                    <a href="<?php echo get_permalink($keiser_query->post->ID); ?>">
                                        <div class="thumbbox">
                                        <?php if (get_post_thumbnail_id()!="") { ?>                         
                                            <img src="<?php echo $postimg[0]; ?>" alt="<?php echo get_the_title(); ?>"/>
                                        <?php } ?>
                                        </div>
                                    <h4><?php echo get_the_title(); ?></h4>
                                    </a>
                                </div>
                                <?php if($i == 6){ ?>
                                </div>
                                <div class="col-sm-12 hiddenBx" id="hiddenBx_6">
                                <?php } ?>
                                <?php }elseif($i > 6 || $i <= 12){?>
                                    <div class="productbox">
                                            <a href="<?php echo get_permalink($keiser_query->post->ID); ?>">
                                            <div class="thumbbox">
                                            <?php if (get_post_thumbnail_id()!="") { ?>                         
                                                <img src="<?php echo $postimg[0]; ?>" alt="<?php echo get_the_title(); ?>"/>
                                            <?php } ?>
                                            </div>
                                        <h4><?php echo get_the_title(); ?></h4>
                                        </a>
                                    </div>
                            <?php  } $i++; }?>
                        <?php } ?>                         
                    </div>
                    <?php $IvmtCnt = count($keiser_query); ?>
                    <?php if($IvmtCnt > 6){ ?>
                    <div class="col-sm-12">
                        <div class="lowerbutn_section">
                            <a id="displayBx_6" href="#">Alternative Products</a>
                            <a id="disappearBx_6" href="#">Less</a>
                        </div>                    
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!--*****************************************************************************************-->
        <!--megamenu-->
        <div class="header_flying_box">
            <div class="commerce_panel">
                <!--<ul>
                    <li class="cart"><a href="#">Cart <span class="counter">1</span></a></li>
                    <li class="user"><a href="#">User</a></li>
                </ul>-->

                <ul>
                <?php 
                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                $count = WC()->cart->cart_contents_count;
                ?>
                <li class="cart"><a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart-contents">Cart <span class="counter"><?php echo esc_html( $count ); ?></span></a></li>
                <?php } ?>
                <!--<li class="user"><a href="#">User</a></li>-->
                <?php if ( is_user_logged_in() ) { ?>
                <li class="user">
                <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">User</a>
                </li>
                <?php }else{ ?>
                <li class="user"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">User</a></li>
                <?php } ?>
                </ul>

            </div>
        </div>
    </div>
</header>
<?php 	
$grant_theme_scndnt_actsale_optn =	get_theme_value('grant_theme_scndnt_actsale_optn');
$grant_theme_scndnt_sale_backgrd =	get_theme_value('grant_theme_scndnt_sale_backgrd');
$grant_theme_scndnt_sale_textclr =	get_theme_value('grant_theme_scndnt_sale_textclr');
$grant_theme_scndnt_sale_cnttext =	get_theme_value('grant_theme_scndnt_sale_cnttext');
$grant_theme_scndnt_sale_lnktext =	get_theme_value('grant_theme_scndnt_sale_lnktext');?>

<?php if($grant_theme_scndnt_actsale_optn != 'false'){ ?>
<div class="topheader_infobox" style="background:<?php echo $grant_theme_scndnt_sale_backgrd; ?>;" id="tab_box_detect">
	<div class="container">
    	<div class="row">
        	<div class="container">
            	<h2 style="color:<?php echo $grant_theme_scndnt_sale_textclr; ?>;">
				<?php if(!empty($grant_theme_scndnt_sale_lnktext)){ ?>
                <a style="color:<?php echo $grant_theme_scndnt_sale_textclr; ?>;" href="<?php echo $grant_theme_scndnt_sale_lnktext; ?>"><?php } ?><?php echo $grant_theme_scndnt_sale_cnttext; ?><?php if(!empty($grant_theme_scndnt_sale_lnktext)){ ?></a>
				<?php } ?>
                </h2>
            </div>
        </div>
    </div>
</div>
 <?php } ?>

<!--header section-->
<main>
<?php if(is_single()&& 'fitness_product' == get_post_type()){ ?>
<section class="breadcrumb_section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="inner_container">
          <ul>
            <?php 
			$args = array('orderby' => 'name','order' => 'ASC','fields' => 'all');
			$category = wp_get_post_terms($post->ID,'fitness_product_cat',$args);
			$cat_id =   $category[0]->term_id;
			$cat_data = get_option("fitness_product_cat_$cat_id");
			$my_cat_color = $cat_data['catBG'];
			if(!empty($my_cat_color)){
			$cat_bg = $my_cat_color;
			}else{
			$cat_bg = '#e9313a';
			}
			?>
            <style>.breadcrumb_section { background: none repeat scroll 0 0 <?php echo $cat_bg; ?>;}</style>
            <li>
              <?php if($category[0]->parent == 24){ ?>
              <a href="<?php echo site_url().'/'.$category[0]->taxonomy.'/residential'; ?>"><?php echo 'Residential'; ?></a>
              <?php }elseif($category[0]->parent == 23){ ?>
              <a href="<?php echo site_url().'/'.$category[0]->taxonomy.'/commercial'; ?>"><?php echo 'Commercial'; ?></a>
              <?php }elseif($category[0]->parent == 22){ ?>
              <a href="<?php echo site_url().'/'.$category[0]->taxonomy.'/accessories'; ?>"><?php echo 'Accessories'; ?></a>
              <?php }?>
            </li>
            <li><a href="<?php echo site_url().'/'.$category[0]->taxonomy.'/'.$category[0]->slug.''; ?>"><?php echo $category[0]->name; ?></a></li>
            <li><a><?php echo the_title(); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }elseif(is_archive()){?>

<?php }elseif(is_search()){ ?>
<section class="breadcrumb_section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="inner_container">
          <ul>
            <style>.breadcrumb_section { background: none repeat scroll 0 0 #e9313a;}</style>
            <form action="<?php bloginfo('home'); ?>/" method="get" id="customsearch">
              <input type="hidden" name="s" id="s" value="<?=$_GET['s']?>" />
              <input type="hidden" name="product_cat" id="tcat" value="" />
              <?php $args =  array('type' => 'fitness_product','parent' => '0','orderby' => 'name','order' => 'ASC','hide_empty' => 0,'taxonomy'=> 'fitness_product_cat');
			  $categories = get_categories($args); $ct=1; ?>
              <li class="inr_cat"><a <?php if((isset($_GET['product_cat'])&& $_GET['product_cat']=='')|| !isset($_GET['product_cat'])){ ?>class="search_active"<?php } ?> onclick="term_loader('<?=$category->slug;?>');" href="javascript:void(0);">All</a></li>
              <?php foreach($categories as $category){ ?>
              <li class="inr_cat"><a <?php if(isset($_GET['product_cat'])&& $_GET['product_cat']==$category->slug){ ?>class="search_active"<?php } ?> onclick="term_loader('<?=$category->slug;?>');" href="javascript:void(0);">
                <?=$category->cat_name;?>
                </a></li>
              <?php  $ct++; } ?>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

