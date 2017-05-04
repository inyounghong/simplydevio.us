function stickyScroll(e) {

    if( window.pageYOffset < 30 ) {   
        $('#nav').css("position", "relative"); 
        $('#nav').css("border-bottom", "none"); 
    } else {
        $('#nav').css("position", "fixed");    
        $('#nav').css("top", "0");
        $('#nav').css("border-bottom", "1px solid #ddd");
    }
}

window.addEventListener('scroll', stickyScroll, false);