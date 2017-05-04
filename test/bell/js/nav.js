$(document).ready(function() {
    var divs = $('.nav_background');
    $('.nav_background').css({'display': 'none'});
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
      if($(window).scrollTop()>710)
      {
        divs.stop(true, true).fadeIn("fast");
        document.getElementById("title").style.color = "#fe7e00";
        document.getElementById("title").style.textShadow = "none";
        document.getElementById("menu_icon").innerHTML = '<img src="images/menu_blue.png" alt="menu">';
      }
      else
      {
        divs.stop(true, true).fadeOut("fast");
        document.getElementById("title").style.color = "#fff";
        document.getElementById("title").style.textShadow = "1px 1px 4px #000;";
        document.getElementById("menu_icon").innerHTML = '<img src="images/menu.png" alt="menu">';
      }
    });
});

