jQuery(document).ready(function() {
    // define variables
    var navOffset, scrollPos = 0;
    console.log('script is running');
    // add utility wrapper elements for positioning

    jQuery(".modelnav").wrap('<div class="nav-placeholder"></div>');
    jQuery(".modelnav").wrapInner('<div class="nav-inner"></div>');
    jQuery(".nav-inner").wrapInner('<div class="nav-inner-most"></div>');

    // function to run on page load and window resize
    function stickyUtility() {

        // only update navOffset if it is not currently using fixed position
        if (!jQuery(".modelnav").hasClass("fixed")) {
            navOffset = jQuery(".modelnav").offset().top;
            console.log('not having offset class'+navOffset);
        }

        // apply matching height to nav wrapper div to avoid awkward content jumps
       // jQuery(".nav-placeholder").height(jQuery(".modelnav").outerHeight());

    } // end stickyUtility function

    // run on page load
    stickyUtility();

    // run on window resize
    jQuery(window).resize(function() {
        stickyUtility();
    });

    // run on scroll event
    jQuery(window).scroll(function() {

        scrollPos = jQuery(window).scrollTop();
        //$(".status").html(scrollPos);

        if (scrollPos >= navOffset) {
            jQuery(".modelnav").addClass("fixed");
        } else {
            jQuery(".modelnav").removeClass("fixed");
        }
		
		if($(this).scrollTop()>400){
			$('.scroll').fadeIn();
		}
		else{
			$('.scroll').fadeOut();
		}
		
    });
	
	$('.scroll').click(function(){
		$('html,body').animate({scrollTop:0},800);
		return false;
	});
	

});