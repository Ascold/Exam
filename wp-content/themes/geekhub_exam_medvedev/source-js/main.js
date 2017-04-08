jQuery(document).ready(function () {
    jQuery('#tab-head-1').on('click', function () {
        jQuery('#tabs ul li').removeClass('active');
        jQuery('#tab-head-1').addClass('active');
        jQuery('#tab-item-1').addClass('active')
    });
    jQuery('#tab-head-2').on('click', function () {
        jQuery('#tabs ul li').removeClass('active');
        jQuery('#tab-head-2').addClass('active');
        jQuery('#tab-item-2').addClass('active')
    });
    jQuery('#tab-head-3').on('click', function () {
        jQuery('#tabs ul li').removeClass('active');
        jQuery('#tab-head-3').addClass('active');
        jQuery('#tab-item-3').addClass('active')
    });
    jQuery('#tab-head-4').on('click', function () {
        jQuery('#tabs ul li').removeClass('active');
        jQuery('#tab-head-4').addClass('active');
        jQuery('#tab-item-4').addClass('active')
    });
    jQuery('#tab-head-5').on('click', function () {
        jQuery('#tabs ul li').removeClass('active');
        jQuery('#tab-head-5').addClass('active');
        jQuery('#tab-item-5').addClass('active')
    });
});
jQuery(document).ready(function () {
    jQuery(".owl-carousel").owlCarousel({
        items: 4,
        loop: true,
        autoplay: false,
        center: true,
        mouseDrag: true,
        nav: false,
        dots: false
    });
});