check();

/** Calls check function whenever window is resized */
window.onresize = function(){
    check();
}

/** Adds/removes event listeners for menu dropdown */
function check(){
    if ($("#menu_icon").is(":visible")){
        document.addEventListener("mousedown", outsideClickListener);
    }
    else{
        document.removeEventListener("mousedown", outsideClickListener);
    }
}

/* Toggles the menu sliding */
function toggleMenu(){
    if ($(".menulinks").is(":visible")){
        $(".menulinks").slideUp(200);
    }
    else{
        $(".menulinks").slideDown(200);
    }
}

/* If something other than the menu is clicked, the menu slides up */
function outsideClickListener(event){
    if(!$(event.target).closest($('#menu_icon').parent()).length) {
        $(".menulinks").slideUp(200);
    }
}