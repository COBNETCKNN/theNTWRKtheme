jQuery(document).ready(function (jQuery) {
  var owl = jQuery('.owl-carousel');
  owl.owlCarousel({
    nav: true,
    responsive: {
      0: {
        items: 2,
        margin: 50
      },
      400: {
        items: 2,
        margin: 40
      },
      600: {
        items: 3,
        margin: 40
      },
      960: {
        items: 3,
        margin: 20
      },
      1200: {
        items: 4,
        margin: 20
      },
      1440: {
        items: 5,
        margin: 20
      }
    }
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
  autoplay: true,
  autoplaySpeed: 4,
  speed: 1,
  slideSelector: '.my-slide',
  margin: 150
});
new ScrollCarousel(".my-carousel-reverse", {
  slideSelector: '.my-slide-reverse',
  autoplay: true,
  autoplaySpeed: 4,
  speed: 1,
  margin: 150,
  direction: 'ltr'
});
jQuery(document).ready(function () {
  // Cache jQuery objects for performance
  var cursorBlob = jQuery(".cursor-blob");
  if (jQuery(window).width() > 1024) {
    // Track mouse movement to update blob position
    jQuery(document).mousemove(function (event) {
      cursorBlob.css({
        left: event.pageX + "px",
        top: event.pageY + "px"
      });
    });

    // Add blob effect when specific div is hovered
    jQuery("#specificDiv").hover(function () {
      cursorBlob.addClass("blob-active");
    }, function () {
      cursorBlob.removeClass("blob-active");
    });
  }
});
