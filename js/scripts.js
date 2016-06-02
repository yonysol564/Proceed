jQuery(document).ready(function($) {

	var windowWidth = jQuery(window).width();

  jQuery('.home_right_row').slick({
		arrows: false,
		infinite: true,
		speed: 300,
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 3,
		slidesToScroll: 3,
		vertical : true,
		responsive: [
	    {
	      breakpoint: 991,
	      settings: {
	      	arrows: false,
					infinite: true,
					speed: 300,
					autoplay: true,
					autoplaySpeed: 3000,
					slidesToShow: 3,
					slidesToScroll: 3,
					vertical : false
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
					arrows: false,
					infinite: true,
					speed: 300,
					autoplay: true,
					slidesToShow: 2,
					slidesToScroll: 2,
					vertical : false
	      }
	    }
	  ]
  }); 

	jQuery('.news_div').slick({
		arrows: false,
		infinite: true,
		speed: 1000,
		autoplay: true,
		autoplaySpeed: 3000,
		slidesToShow: 3,
		slidesToScroll: 1,
		vertical : true,
		responsive: [
	    {
	      breakpoint: 768,
	      settings: {
	      	arrows: false,
					infinite: true,
						speed: 1000,
						autoplay: true,
						autoplaySpeed: 3000,
						slidesToShow: 3,
						slidesToScroll: 1,
					vertical : true
	      }
	    }
	  ]
  }); 

	if( windowWidth < 768 ) {
		jQuery('#bottom_navbar li a').after( "<div class='gradient_border_sub_menu'></div>");
		jQuery('#bottom_navbar li.current_page_item a').css('color','#fff');
		jQuery('#bottom_navbar li.current_page_item').children('.sub-menu').css('background-color','#60BFDF');
		
		jQuery('#bottom_navbar li.current_page_item a').css('font-size','16px');
	} else {
		jQuery('#bottom_navbar li.menu-item-has-children a').after( "<div class='gradient_border_sub_menu'></div>");
	}



	


});
