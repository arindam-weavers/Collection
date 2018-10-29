function setSocialRowSize(){
	var wwd = jQuery(window).outerWidth();
	if(wwd >= 1e4 ){
		var devider = 5;
	}else if(wwd >= 1200){
		var devider = 5;
	}else if(wwd >= 1024){
		var devider = 4;
	}else if(wwd >= 768){
		var devider = 3;
	}else if(wwd >= 480){
		var devider = 2;
	}else if(wwd >= 380){
		var devider = 2;
	}
	
	var itemWd = wwd/devider;
	//console.log(itemWd);
	jQuery('.ff-item.picture-item').each(function() {
		jQuery(this).outerWidth(itemWd);
	});
}
jQuery(window).resize(function(){
	setSocialRowSize();
});
jQuery(document).ready(function(){
	setSocialRowSize();
});

jQuery("body").on('click' , '.ff-icon-share' , function(){
	console.log('hi')
	jQuery(this).parents('.ff-share-wrapper').toggleClass('ff-popup__visible');
})
