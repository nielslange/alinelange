jQuery(document).ready(function($) {

    $('.scrollup').fadeOut();

	$(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    $(document).on('click.nav','.navbar-collapse.in',function(e) {
    	if( $(e.target).is('a') ) {
    		$(this).removeClass('in').addClass('collapse');
    	}
    });

    $("ul.nav a").smoothScroll( {
        offset:-70,
        speed:1e3
    });

    $("a#more").smoothScroll( {
        offset:-70,
        speed:1e3
    });

    $("ul.navbar-left li a i").addClass("fa-lg");

    $(".archive .woocommerce-result-count").detach().prependTo("#shop .container");
    $(".archive .page-title").detach().prependTo("#shop .container");

    $('.your-class').slick({
        draggable: true,
        autoplay: true, /* this is the new line */
        autoplaySpeed: 5000,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        touchThreshold: 1000,
        fade: true,
        cssEase: 'linear'
    });
});