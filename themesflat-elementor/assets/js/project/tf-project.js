;(function($) {

    "use strict";

    var tfProject = function() {
        var owl_carousel = $(".wrap-project-post.owl-carousel");
        if (owl_carousel.length > 0) {
            owl_carousel.each(function() {
                var $this = $(this),
                    $items = ($this.data('items')) ? $this.data('items') : 1,
                    $loop = ($this.attr('data-loop')) ? $this.data('loop') : true,
                    $navdots = ($this.data('nav-dots')) ? $this.data('nav-dots') : false,
                    $navarrows = ($this.data('nav-arrows')) ? $this.data('nav-arrows') : false,
                    $autoplay = ($this.attr('data-autoplay')) ? $this.data('autoplay') : false,
                    $autospeed = ($this.attr('data-autospeed')) ? $this.data('autospeed') : 3500,
                    $smartspeed = ($this.attr('data-smartspeed')) ? $this.data('smartspeed') : 950,
                    $autohgt = ($this.data('autoheight')) ? $this.data('autoheight') : false,
                    $space = ($this.attr('data-space')) ? $this.data('space') : 15,
                    $center = ($this.data('center')) ? $this.data('center') : false;

                $(this).owlCarousel({
                    loop: $loop,                    
                    dots: $navdots,
                    autoplayTimeout: $autospeed,
                    smartSpeed: $smartspeed,
                    autoHeight: $autohgt,
                    margin: $space,
                    nav: $navarrows,
                    navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
                    autoplay: $autoplay,
                    autoplayHoverPause: true,
                    center: true,
                    items: $items,
                    responsive: {
                        0: {
                            items: ($this.data('xs-items')) ? $this.data('xs-items') : 1,
                            nav: false,
                            center: false,
                        },
                        600: {
                            items: ($this.data('sm-items')) ? $this.data('sm-items') : 2,
                            nav: false,
                            center: false,
                        },
                        1000: {
                            items: ($this.data('md-items')) ? $this.data('md-items') : 2,
                            center: false,
                        },
                        1240:{
                            items: $items
                        }
                    },
                });
            });
        }
    }

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfproject.default', tfProject );
    });

})(jQuery);
