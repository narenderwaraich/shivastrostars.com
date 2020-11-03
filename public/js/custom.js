jQuery(document).ready(function($) {      
  // Owl Carousel                     
  var owl = $('.carousel-default');
  owl.owlCarousel({
    nav: true,
    dots: true,
    items: 1,
    loop: true,
    navText: ["&#xe605","&#xe606"],
    autoplay: true,
    autoplayTimeout: 4000
  });

  // Owl Carousel content section  
  var owl = $('.carousel-blocks');
  owl.owlCarousel({
    nav: true,
    dots: false,
    items: 4,
    responsive: {
      0: {
        items: 1
      },
      481: {
        items: 3
      },
      769: {
        items: 4
      }
    },
    loop: true,
    navText: ["&#xe605","&#xe606"],
    autoplay: true,
    autoplayTimeout: 5000
  });
  
  // Owl Carousel content section
  var owl = $('.carousel-3-blocks');
  owl.owlCarousel({
    nav: true,
    dots: true,
    items: 3,
    responsive: {
      0: {
        items: 1
      },
      481: {
        items: 3
      },
      769: {
        items: 4
      }
    },
    loop: true,
    navText: ["&#xe605","&#xe606"],
    autoplay: true,
    autoplayTimeout: 5000
  });  
  
  var owl = $('.carousel-fade-transition');
  owl.owlCarousel({
    nav: true,
    dots: true,
    items: 1,
    loop: true,
    navText: ["&#xe605","&#xe606"],
    autoplay: true,
    animateOut: 'fadeOut',
    autoplayTimeout: 4000
  }); 
  
  // Sticky Nav Bar
  $(window).scroll(function() {
    if ($(this).scrollTop() > 20){  
        $('.web-top-navbar').addClass("fixed");
    }
    else{
        $('.web-top-navbar').removeClass("fixed");
    }
  });   
});

// mobile navbar show
  $('.show-mob-menu-btn').on('click', function(){ 
    $('#menu-list').addClass('show-menu');
    $('.hide-mob-menu-btn').show();
    $('.show-mob-menu-btn').hide();
  });

  $('.hide-mob-menu-btn').on('click', function(){ 
    $('#menu-list').removeClass('show-menu');
    $('.hide-mob-menu-btn').hide();
    $('.show-mob-menu-btn').show();
  }); 