jQuery(document).ready(function(){
	    var touch = Modernizr.touch;


    var owl = jQuery("#owl-example");
    
    jQuery( ".menu-item-39" ).click(function(e) {
        e.preventDefault();
        jQuery( '.search' ).toggleClass( "open" );
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

jQuery(window).load(function() {
  
});