jQuery(document).ready(function(jQuery){
    // About Us masonry
    jQuery('.gridAboutUs').masonry({
        // options
        itemSelector: '.gridAboutUs-item',
        columnWidth: 150
        });
      
        var owl = jQuery('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            nav:true,
            margin:20,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },            
                960:{
                    items:5
                },
                1200:{
                    items:5
                }
            }
        });
        owl.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                owl.trigger('next.owl');
            } else {
                owl.trigger('prev.owl');
            }
            e.preventDefault();
        });
});