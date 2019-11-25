(function( $ ) {
// Smooth Scroll to anchor
// From https://css-tricks.com/snippets/jquery/smooth-scrolling/
// Modified to work with mobile menu

  $('nav a[href*="#"]:not([href="#"])').on('click', function() {

    if( $('html').hasClass('open-the-menu') ) {

        $('html').removeClass('open-the-menu');
    
    } else {

      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        
        if (target.length) {
          
          $('html,body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;

        }
      }

    }
  
  });
  
})( jQuery );