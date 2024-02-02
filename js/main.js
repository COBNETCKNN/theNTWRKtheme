jQuery(document).ready(function (jQuery) {
  var owl = jQuery('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    nav: true,
    margin: 20,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      960: {
        items: 5
      },
      1200: {
        items: 5
      }
    }
  });
  owl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY > 0) {
      owl.trigger('next.owl');
    } else {
      owl.trigger('prev.owl');
    }
    e.preventDefault();
  });

  // Single project Load more button
  jQuery(function () {
    jQuery(".singleCredentials_wrapper").slice(0, 4).css('display', 'flex');
    jQuery("body").on('click touchstart', '.projectsPostsSingle_loadMore__button', function (e) {
      e.preventDefault();
      jQuery(".singleCredentials_wrapper:hidden").slice(0, 30).slideDown().css('display', 'flex');
      if (jQuery(".singleCredentials_wrapper:hidden").length == 0) {
        jQuery(".projectsPostsSingle_loadMore__button").css('display', 'none');
      }
    });
  });

  // Mobile Header Menu
  jQuery(".nav-toggler").click(function () {
    jQuery("#navigation").toggle("slide");
    jQuery('.navbar_grid__dropdown').addClass('open');
    jQuery('body').css('overflow', 'hidden');
  });
  jQuery(".nav_close__button").click(function () {
    jQuery('.navbar_grid__dropdown').removeClass('open');
    jQuery('body').css('overflow', 'auto');
  });
});
new ScrollCarousel(".my-carousel", {
  slideSelector: '.my-slide',
  margin: 150
});
new ScrollCarousel(".my-carousel-reverse", {
  slideSelector: '.my-slide-reverse',
  margin: 150,
  direction: 'ltr'
});
