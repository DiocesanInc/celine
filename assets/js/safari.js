jQuery(document).ready(function ($) {
    var is_safari = navigator.vendor && navigator.vendor.indexOf('Apple') > -1 &&
                    navigator.userAgent &&
                    navigator.userAgent.indexOf('CriOS') == -1 &&
                    navigator.userAgent.indexOf('FxiOS') == -1;
    if(is_safari){
	    $('.archive .staff-member-image, .ministry-image-wrapper .teaser-img').addClass('safari');
    }
});