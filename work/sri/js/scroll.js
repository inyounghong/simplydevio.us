function stickyScroll(e) {
    if( window.pageYOffset > 50 ) {
        $('.nav-background').fadeIn(); 
        // $('.navbar a').css("color", "#000");    
    } else {
        $('.nav-background').fadeOut();
        $('.navbar a').css("color", "#fff");  
    }
}

window.addEventListener('scroll', stickyScroll, false);