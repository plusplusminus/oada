jQuery(document).ready(function(){
	    var touch = Modernizr.touch;

    jQuery(window).scroll(function(){
        if  (jQuery(window).scrollTop() >= 70){
            jQuery('header').addClass('view');
        }
        else if  (jQuery(window).scrollTop() == 0){
            jQuery('header').removeClass('view');
        }
    });

    jQuery( ".menu-item-39" ).click(function(e) {
        e.preventDefault();
        jQuery( '.search' ).toggleClass( "open" );
    });

    jQuery('#carousel-example-generic').on('slide.bs.carousel', function (e,f) {
      console.log(e.relatedTarget);

    });

    var owl = jQuery("#owl-example");
    
    owl.owlCarousel({
        navigation : true, // Show next and prev buttons
        singleItem:true,
        pagination : false,
        afterMove: moved,
        navigationText : ['<span class="icon-wrap"><i class="fa fa-angle-left fa-3x"></i><img src="http://tympanus.net/Development/ArrowNavigationStyles/img/5.png" alt="Previous thumb"/></span>','<span class="icon-wrap"><i class="fa fa-angle-right fa-3x"></i><img src="http://tympanus.net/Development/ArrowNavigationStyles/img/5.png" alt="Previous thumb"/></span>'],
    });


    function moved() {
    var jowl = jQuery(".owl-carousel").data('owlCarousel');
    console.log(jowl);
    }

    owl.on('click', '.owl-item', function(e) {
        var carousel = jQuery(this).data('owl.carousel');
        e.preventDefault();
        console.log(carousel);
    });

      

    jQuery( ".social-widget a" ).hover(
      function() {
        var data = jQuery(this).data('tooltip');
        jQuery('#hover-info').html('<p>'+data+'</p>').show('slow');;
      }, function() {
         jQuery('#hover-info').empty();
      }
    );

	
    jQuery(window).scroll(function() {    
	    var scroll = jQuery(window).scrollTop();
	     //>=, not <=
	    if (scroll >= 300) {
	        //clearHeader, not clearheader - caps H
	        jQuery("body").addClass("stuck");
	    }
	    if (scroll <= 0) {
	        //clearHeader, not clearheader - caps H
	        jQuery("body").removeClass("stuck");
	    }
	});

    jQuery('.scrollToTop').click(function(){
        jQuery('html, body').animate({scrollTop : 0},800);
        return false;
    });


});