var homeslider =  jQuery('#home_banner_slider');
jQuery(document).ready(function() {

    homeslider.bxSlider({
        mode: 'fade',
        auto: true,
        auto_controls: true,
        pager: false,
        controls: true,
        pause: 500,
        speed: 500,
        autoHover: true,
        /*nextSelector: '#nextid',
        prevSelector: '#previd',
        nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
        prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',*/
        touchEnabled: true
    });
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /**********************************Scroll To Option Code Starts**********************************/
    jQuery('.producttab_section li a').click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top - 0
        }, 700);
        return false;
    });
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 100
          , backToTop = function() {
            var scrollTop = jQuery(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                jQuery('#back-to-top').addClass('show');
            } else {
                jQuery('#back-to-top').removeClass('show');
            }
        };
        backToTop();
        jQuery(window).on('scroll', function() {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function(e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
    /***********************************Scroll To Option Code Ends***********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /********************************Search Effect Option Code Starts********************************/
    jQuery(".icn_srch").keyup(function() {
        var inputVal = jQuery(this).val();
        if (inputVal == '') {
            jQuery(".search").removeClass("active");
        } else {
            jQuery(".search").addClass("active");
        }
    });
    /*********************************Search Effect Option Code Ends*********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /**********************************Mobile Mega Menu Code Starts**********************************/
    jQuery(".menu_butn").click(function(event) {
        event.preventDefault();
        jQuery(".mobile_menu").animate({
            left: "0"
        });
        jQuery("body").addClass("menu_drawer");
    });
    jQuery(".close_butn").click(function(event) {
        event.preventDefault();
        jQuery(".mobile_menu").animate({
            left: "-80%"
        });
        jQuery("body").removeClass("menu_drawer");
    });
    /***********************************Mobile Mega Menu Code Ends***********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*********************************Contact Popup Menu Code Starts*********************************/
    jQuery('#OpnPop').click(function(event) {
        event.preventDefault();
        jQuery("#MegaCnt").slideToggle(800);
        jQuery("#MegaCmrl").slideUp(200);
        jQuery("#MegaRsdl").slideUp(200);
        jQuery("#MegaAcrs").slideUp(200);
        jQuery("#MegaScft").slideUp(200);
        jQuery("#MegaInvt").slideUp(200);
        jQuery("#MegaKeiser").slideUp(200);
    });
    jQuery('#ClsPop').click(function(event) {
        event.preventDefault();
        jQuery("#MegaCnt").slideToggle(800);
    });
    /**********************************Contact Popup Menu Code Ends**********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /**********************************Desktop Mega Menu Code Starts*********************************/
    jQuery('.main_menu .MegaCmrl_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaCmrl").slideToggle(800);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_1").hide();
        jQuery("#displayBx_1").show();
        jQuery("#hiddenBx_2").hide();
        jQuery("#hiddenBx_3").hide();
        jQuery("#hiddenBx_4").hide();
        jQuery("#hiddenBx_5").hide();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaRsdl_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaCmrl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaRsdl").slideToggle(800);
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_2").hide();
        jQuery("#hiddenBx_1").hide();
        jQuery("#displayBx_2").show();
        jQuery("#hiddenBx_3").hide();
        jQuery("#hiddenBx_4").hide();
        jQuery("#hiddenBx_5").hide();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaAcrs_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaCmrl_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaAcrs").slideToggle(800);
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_3").hide();
        jQuery("#hiddenBx_1").hide();
        jQuery("#hiddenBx_2").hide();
        jQuery("#displayBx_3").show();
        jQuery("#hiddenBx_4").hide();
        jQuery("#hiddenBx_5").hide();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaScft_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaCmrl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaScft").slideToggle(800);
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_4").hide();
        jQuery("#hiddenBx_1").hide();
        jQuery("#hiddenBx_2").hide();
        jQuery("#hiddenBx_3").hide();
        jQuery("#displayBx_4").show();
        jQuery("#hiddenBx_5").hide();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaInvt_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaCmrl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaInvt").slideToggle(800);
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_5").hide();
        jQuery("#hiddenBx_1").hide();
        jQuery("#hiddenBx_2").hide();
        jQuery("#hiddenBx_3").hide();
        jQuery("#hiddenBx_4").hide();
        jQuery("#displayBx_5").show();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaCybex_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaCmrl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaKeiser_OpnPop').removeClass("active");
        jQuery("#MegaCybex").slideToggle(800);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaKeiser").slideUp(400);
        jQuery("#disappearBx_5").hide();
        jQuery("#hiddenBx_1").hide();
        jQuery("#hiddenBx_2").hide();
        jQuery("#hiddenBx_3").hide();
        jQuery("#hiddenBx_4").hide();
        jQuery("#displayBx_5").show();
        jQuery("#hiddenBx_6").hide();
    });
    jQuery('.main_menu .MegaKeiser_OpnPop').click(function(event) {
        event.preventDefault();
        jQuery(this).addClass("active");
        jQuery('.MegaRsdl_OpnPop').removeClass("active");
        jQuery('.MegaAcrs_OpnPop').removeClass("active");
        jQuery('.MegaScft_OpnPop').removeClass("active");
        jQuery('.MegaInvt_OpnPop').removeClass("active");
        jQuery('.MegaCybex_OpnPop').removeClass("active");
        jQuery("#MegaCmrl").slideUp(400);
        jQuery("#MegaRsdl").slideUp(400);
        jQuery("#MegaAcrs").slideUp(400);
        jQuery("#MegaScft").slideUp(400);
        jQuery("#MegaInvt").slideUp(400);
        jQuery("#MegaCybex").slideUp(400);
        jQuery("#MegaKeiser").slideToggle(800);
        jQuery("#disappearBx_6").hide();
        jQuery("#displayBx_1").hide();
        jQuery("#hiddenBx_2").hide();
        jQuery("#hiddenBx_3").hide();
        jQuery("#hiddenBx_4").hide();
        jQuery("#hiddenBx_5").hide();
        jQuery("#hiddenBx_6").show();
    });
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    jQuery("#displayBx_1").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_1").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_1").show();
    });
    jQuery("#displayBx_2").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_2").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_2").show();
    });
    jQuery("#displayBx_3").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_3").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_3").show();
    });
    jQuery("#displayBx_4").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_4").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_4").show();
    });
    jQuery("#displayBx_5").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_5").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_5").show();
    });
    jQuery("#displayBx_6").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_6").slideDown();
        jQuery(this).hide();
        jQuery("#disappearBx_6").show();
    });
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    jQuery("#disappearBx_1").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_1").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_1").show();
    });
    jQuery("#disappearBx_2").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_2").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_2").show();
    });
    jQuery("#disappearBx_3").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_3").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_3").show();
    });
    jQuery("#disappearBx_4").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_4").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_4").show();
    });
    jQuery("#disappearBx_5").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_5").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_5").show();
    });
    jQuery("#disappearBx_6").click(function(event) {
        event.preventDefault();
        jQuery("#hiddenBx_6").slideUp();
        jQuery(this).hide();
        jQuery("#displayBx_6").show();
    });
    /***********************************Desktop Mega Menu Code Ends**********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /************************************Tab Shaffling Code Starts***********************************/

    jQuery('#ResidentialButton_home').click(function(event) {
        event.preventDefault();
        
        /*jQuery("html, body").animate({
            scrollTop: jQuery('#tab_box_detect').offset().top 
        }, 2000);*/
       jQuery("body, html").animate({ 
         scrollTop: jQuery( jQuery(this).attr('href') ).offset().top 
         }, 2000);

        jQuery("#ResidentialSection").show();
        jQuery("#CommercialSection").hide();
        
        jQuery("li.hd1").hide();
        jQuery("li.hd2").show();


    });

    jQuery('#CommercialButton_home').click(function(event) {
        event.preventDefault();
        
       /* jQuery("html, body").animate({
            scrollTop: jQuery('#tab_box_detect').offset().top 
        }, 2000);*/

        jQuery("#CommercialSection").show();
        jQuery("#ResidentialSection").hide();
        
        
        jQuery("body, html").animate({ 
         scrollTop: jQuery( jQuery(this).attr('href') ).offset().top 
        }, 2000);

        jQuery("li.hd2").hide();
        jQuery("li.hd1").show();        
        homeslider.reloadSlider();

        
    });

    //homeslider.reloadSlider();


    jQuery('#CommercialButton').click(function(event) {
        event.preventDefault();
        homeslider.reloadSlider();         
        jQuery("#CommercialSection").show();
        jQuery("#ResidentialSection").hide();
        jQuery("li.hd2").hide();
        jQuery("li.hd1").show();
    });
    jQuery('#ResidentialButton').click(function(event) {
        event.preventDefault();
        //jQuery("#home_banner_slider").reloadSlider();
        jQuery("#ResidentialSection").show();
        jQuery("#CommercialSection").hide();
        jQuery("li.hd1").hide();
        jQuery("li.hd2").show();
    });
    /*jQuery('.tab_box ul li.active a').click(function(event) {
        event.preventDefault();
        //homeslider.reloadSlider();
    });*/

    

    jQuery('span#gggggrip').click(function(event) {
        event.preventDefault();    
        //alert("vbbb");
        homeslider.reloadSlider();
    });

    jQuery('span#pppopkk').click(function(event) {
        event.preventDefault();    
        //alert("vbbb");
        
        setTimeout(loadslidercus, 100)
        //homeslider.reloadSlider();
    });
    /*************************************Tab Shaffling Code Ends***********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /********************************Best Product Slider Code Starts********************************/
    jQuery("#HomeBestSldr_Commercial").owlCarousel({
        loop: true,
        autoplay: 1000,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            500: {
                items: 2,
                nav: true
            },
            767: {
                items: 2,
                nav: true
            },
            768: {
                items: 3,
                nav: true
            },
            1000: {
                items: 4,
                nav: true
            },
            1400: {
                items: 5,
                nav: true,
            }
        }
    });
    jQuery("#HomeBestSldr_Residential").owlCarousel({
        loop: true,
        autoplayHoverPause: true,
        autoplay: 1000,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            500: {
                items: 2,
                nav: true
            },
            767: {
                items: 2,
                nav: true
            },
            768: {
                items: 3,
                nav: true
            },
            1000: {
                items: 4,
                nav: true
            },
            1400: {
                items: 5,
                nav: true,
            }
        }
    });
    /*********************************Best Product Slider Code Ends*********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /******************************Featured Product Slider Code Starts******************************/
    jQuery("#HomeFtrdSldr_Commercial").owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
            }
        }
    });


    /*jQuery("#home_banner_slider").owlCarousel({
        loop: true,
        autoplay: true,
        margin: 2,
        dots: false,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
            },
            600: {
                items: 1,
                nav: true,
            },
            1000: {
                items: 1,
                nav: true,
            }
        }
    });*/

    jQuery("#HomeFtrdSldr_Residential").owlCarousel({
        loop: true,
        autoplay: false,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
            }
        }
    });
    jQuery("#InnnrConsoleSldr").owlCarousel({
        loop: true,
        autoplay: false,
        slideSpeed: 1000,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: true
            },
            1000: {
                items: 1,
                nav: true,
            }
        }
    });
    /*******************************Featured Product Slider Code Ends*******************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /*********************************Brand Logo Slider Code Starts*********************************/
    jQuery("#LogoBrndSlrCmrcl").owlCarousel({
        loop: true,
        autoplay: 1000,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 3,
                nav: true
            },
            500: {
                items: 5,
                nav: true
            },
            767: {
                items: 7,
                nav: true
            },
            768: {
                items: 7,
                nav: true
            },
            1000: {
                items: 10,
                nav: true
            },
            1400: {
                items: 13,
                nav: true,
            }
        }
    });
    jQuery("#LogoBrndSlrRdntl").owlCarousel({
        loop: true,
        autoplay: 1000,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 3,
                nav: true
            },
            500: {
                items: 5,
                nav: true
            },
            767: {
                items: 7,
                nav: true
            },
            768: {
                items: 7,
                nav: true
            },
            1000: {
                items: 10,
                nav: true
            },
            1400: {
                items: 13,
                nav: true,
            }
        }
    });
    /**********************************Brand Logo Slider Code Ends**********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    /********************************Used Equipment Popup Code Starts*******************************/
    jQuery('.fancybox').fancybox({
        beforeLoad: function() {
            jQuery(".enquire_form").find("form").resetForm().clearForm()
            jQuery("span.wpcf7-not-valid-tip").css("display", "none");
            jQuery(".wpcf7-response-output").css("display", "none");
            var title = jQuery(this.element).attr('datatitle');
            var price = jQuery(this.element).attr('dataprice');
            jQuery("#product_title").val(title);
            jQuery("#product_price").val(price);
        }
    });
    /*********************************Used Equipment Popup Code Ends********************************/
    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
});
function headerFix() {
    jQuery("#MegaCmrl").hide();
    jQuery("#MegaRsdl").hide();
    jQuery("#MegaAcrs").hide();
    jQuery("#MegaScft").hide();
    jQuery("#MegaInvt").hide();
    jQuery("#MegaCybex").hide();
}
jQuery(window).resize(headerFix);
/*Agile Crm*/
jQuery(document).ready(function() {

    jQuery("form#contact_form_header").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            contact_no: "required",
            email_id: {
                required: true,
                email: true
            },
            message: "required",
        },
        submitHandler: function(form) {
            jQuery(".success_msg").css("opacity", "0");
            jQuery(".loader").css("visibility", "hidden");
            var current_url = jQuery("#current_url").val();
            var first_name = jQuery("#first_name").val();
            var last_name = jQuery("#last_name").val();
            var email_id = jQuery("#email_id").val();
            var contact_no = jQuery("#contact_no").val();
            var message = jQuery('#message').val();
            jQuery(".loader").css("visibility", "visible");
            jQuery.ajax({
                success: function(responseText) {
                    if (responseText) {
                        if (jQuery(".success_msg").length) {
                            jQuery(".success_msg").css("opacity", "1");
                            jQuery(".loader").css("visibility", "hidden");
                            jQuery("form#contact_form_header").resetForm();
                        }
                    }
                    console.log(responseText);
                },
                url: ajaxVars.ajaxurl,
                data: {
                    action: 'contact_form_header',
                    current_url: current_url,
                    first_name: first_name,
                    last_name: last_name,
                    email_id: email_id,
                    contact_no: contact_no,
                    message: message
                },
                type: 'POST',
                cache: false,
            });
            return false;
        }
    });
    jQuery("form#contact_page_form").validate({
        rules: {
            contact_page_first_name: "required",
            contact_page_last_name: "required",
            contact_page_email_id: {
                required: true,
                email: true
            },
            contact_page_message: "required",
        },
        submitHandler: function(form) {
            jQuery(".contact_page_success_msg").css("opacity", "0");
            jQuery(".contact_page_loader").css("visibility", "hidden");
            var contact_page_current_url = jQuery("#contact_page_current_url").val();
            var contact_page_first_name = jQuery("#contact_page_first_name").val();
            var contact_page_last_name = jQuery("#contact_page_last_name").val();
            var contact_page_email_id = jQuery("#contact_page_email_id").val();
            var contact_page_contact_no = jQuery("#contact_page_contact_no").val();
            var contact_page_message = jQuery('#contact_page_message').val();
            jQuery(".contact_page_loader").css("visibility", "visible");
            jQuery.ajax({
                success: function(responseText) {
                    if (responseText) {
                        if (jQuery(".contact_page_success_msg").length) {
                            jQuery(".contact_page_success_msg").css("opacity", "1");
                            jQuery(".contact_page_loader").css("visibility", "hidden");
                            jQuery("form#contact_page_form").resetForm();
                        }
                    }
                    console.log(responseText);
                },
                url: ajaxVars.ajaxurl,
                data: {
                    action: 'page_contact_form',
                    current_url: contact_page_current_url,
                    first_name: contact_page_first_name,
                    last_name: contact_page_last_name,
                    email_id: contact_page_email_id,
                    contact_no: contact_page_contact_no,
                    message: contact_page_message
                },
                type: 'POST',
                cache: false,
            });
            return false;
        }
    });
});




jQuery(document).ready(function() {


jQuery('.get_quote_popup').click(function (event) {
        event.preventDefault();
        var dataurl = jQuery(this).data('url');
        var prodname = jQuery(this).data('prodname');

        jQuery("form#contact_form_header_1").show();
        jQuery(".popup_quote_formbox .success_msg").hide();

        jQuery.fancybox([
            {   href : '#get_quote_1',
                maxWidth    : 800,
                maxHeight   : 600,
                fitToView   : true,
                autoSize    : true,
                closeClick  : false,
                openEffect  : 'fade',
                closeEffect : 'fade',
                beforeLoad: function() {
                    //var dataurl= jQuery(this).data('url');
                    jQuery("#customer_product_name").val(prodname);
                    jQuery("#customer_product_url").val(dataurl);
                    //alert(dataurl);
                },
            }
        ]);
});

    

    jQuery("form#contact_form_header_1").validate({
        rules: {
            customer_first_name: "required",
            customer_last_name: "required",
            customer_contact_no: "required",
            customer_email_id: {
                required: true,
                email: true
            },
            customer_message: "required",
            customer_product_name: "required",
        },
        submitHandler: function(form) {
            //jQuery(".success_msg").css("opacity", "0");
            //jQuery(".popup_quote_formbox .loader2").css("visibility", "hidden");
            //var current_url = jQuery("#current_url").val();
            var customer_first_name = jQuery("#customer_first_name").val();
            var customer_last_name = jQuery("#customer_last_name").val();
            var customer_email_id = jQuery("#customer_email_id").val();
            var customer_contact_no = jQuery("#customer_contact_no").val();
            var customer_product_name = jQuery("#customer_product_name").val();
            var customer_message = jQuery('#customer_message').val();
            jQuery(".popup_quote_formbox .loader2").show();
            jQuery.ajax({
                success: function(responseText) {
                    if (responseText) {
                        
                            jQuery(".popup_quote_formbox .success_msg").show();
                            jQuery(".popup_quote_formbox .loader2").hide();
                            jQuery("form#contact_form_header_1").resetForm();
                            jQuery("form#contact_form_header_1").hide();
                        
                    }
                    console.log(responseText);
                },
                url: ajaxVars.ajaxurl,
                data: {
                    action: 'contact_form_get_quote',
                    customer_first_name: customer_first_name,
                    customer_last_name: customer_last_name,
                    customer_email_id: customer_email_id,
                    customer_contact_no: customer_contact_no,
                    customer_product_name: customer_product_name,
                    customer_message: customer_message
                },
                type: 'POST',
                cache: false,
            });
            return false;
        }
    });


      jQuery("#recent_blog_slider").owlCarousel({
        loop: true,
        autoplay: 1000,
        smartSpeed: 1000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            500: {
                items: 2,
                nav: true
            },
            767: {
                items: 3,
                nav: true
            },
            768: {
                items: 4,
                nav: true
            },
            1000: {
                items: 7,
                nav: true
            },
            1400: {
                items: 7,
                nav: true,
            }
        }
    });


});


function equalmatchHeight() {
     
        if (jQuery(window).width() < 1280) {
            jQuery("#left_box").height('auto');  
        }
        else {
            var prod_dtls_midsectionHeight = jQuery("#right_box").height(); 
            jQuery("#left_box").height(prod_dtls_midsectionHeight);   
        }
}


jQuery(document).ready(equalmatchHeight);
jQuery(window).resize(equalmatchHeight);





(function( $ ) {
    // the sameHeight functions makes all the selected elements of the same height
    $.fn.sameHeight = function() {
        var selector = this;
        var heights = [];

        // Save the heights of every element into an array
        selector.each(function(){
            var height = $(this).height();
            heights.push(height);
        });

        // Get the biggest height
        var maxHeight = Math.max.apply(null, heights);
        // Show in the console to verify
        console.log(heights,maxHeight);

        // Set the maxHeight to every selected element
        selector.each(function(){
            $(this).height(maxHeight);
        }); 
    };
 
}( jQuery ));

jQuery(document).ready(function() {
    //jQuery('body.tax-product_cat .residential-price-tag').sameHeight();
    //jQuery('.sellersldier_section .residential-price-tag').sameHeight();

     jQuery(".sellersldier_section ul li .cart_panel .residential-price-tag").height(65);
     setTimeout(function(){ productsize(); }, 3000);
});


jQuery(window).resize(function(){
    // Do it when the window resizes too
    jQuery('body.tax-product_cat .residential-price-tag').sameHeight();
    jQuery('body.post-type-archive-product .residential-price-tag').sameHeight();

   // jQuery('.sellersldier_section .residential-price-tag').sameHeight();
   
   setTimeout(function(){ productsize(); }, 3000);
});


jQuery(window).load(function() {
     jQuery(".slowload").fadeIn("slow");

     jQuery('body.tax-product_cat .residential-price-tag').sameHeight();
     jQuery('body.post-type-archive-product .residential-price-tag').sameHeight();

     //jQuery('.sellersldier_section .residential-price-tag').sameHeight();
     
});



function loadslidercus() {     
    homeslider.reloadSlider();
 }

function productsize(){
    var product_size = [];
    jQuery('ul.products li.single_item').each(function(){
        product_size.push(jQuery(this).height());
    });
    //console.log(past_event);
    var product_sizemaxheight = Math.max.apply(Math, product_size);
    //console.log(product_sizemaxheight);
    jQuery('ul.products li.single_item').css('height', product_sizemaxheight);
}