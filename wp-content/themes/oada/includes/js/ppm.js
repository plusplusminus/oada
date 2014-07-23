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


      
	jQuery('.home-image,.single-image').imageScroll({
        imageAttribute: (touch === true) ? 'image-mobile' : 'image',
        touch: touch,
        coverRatio:0.7,
        parallax:true
    });

    jQuery( ".social-widget a" ).hover(
      function() {
        var data = jQuery(this).data('tooltip');
        jQuery('#hover-info').html('<p>'+data+'</p>').show('slow');;
      }, function() {
         jQuery('#hover-info').empty();
      }
    );

	jQuery('body').scrollspy({ target: '.navbar-collapse' })

    

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


});