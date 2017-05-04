jQuery(document).ready(function ($) {

    setInterval(function () {
        moveRight();
    }, 20000);
  
    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    

    function moveLeft() {
        $('#slider ul li:last-child').prependTo('#slider ul');
        $('#slider ul').css('left', '-600px')
        $('#slider ul').animate({
            left: 0
        }, 400);
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 400, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });

});    
