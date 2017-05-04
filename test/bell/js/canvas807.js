window.onload = resizing;
window.onresize = resizing;

    $(window).scroll( function(){
        /* Check the location of each desired element */
$('.faders').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height() - 800;
            
            /* If the object is completely visible in the window, fade it in */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},(2000));
                    
            }
            
        });
    });


function resizing() {
var wid = window.innerWidth;
var hi = window.innerHeight;

var lstr = wid/2 - 40;
var rstr = wid/2 + 40;

drawCanvas(wid, hi);

var midwid = wid/2;

drawIcons(midwid);

}

// must redraw function when screen size changes

var wid = window.innerWidth;
var hi = window.innerHeight;

function drawCanvas(wid, hi) {

var canvas = document.getElementById('map');
var context = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = $('#diagram').height();

/** Create lines that connect to each other by
 * saving the endpoint of one and making it the
 * starting point of the next.
 **/

var m = wid*.1;
var n = 80;

var o = '#fa7e00';
var b = '#00ada7';
var w = "#ffffff";
var d = '#0a192c';

function save(a, b) {
    // saves numbers set for a and b
    m = a
    n = b
}

function connector(x, y, color) {
    // x and y are numbers
    context.beginPath();
    context.strokeStyle = color;
    context.lineWidth = 5;
    context.lineCap = 'round';
    context.moveTo(m, n);
    context.lineTo(x, y);
    save(x, y);
    context.stroke();
}

/* Create backing labels for text */
function labelBack(x, y, x1, color) {
    // x and y are numbers to determine lineTo
    // color is a string for a hexcode
    context.beginPath();
    context.moveTo(x, y);
    context.lineTo(x1, y);
    context.lineWidth = 50;
    context.strokeStyle = color;
    context.lineCap = 'round';
    context.stroke();
}

/* Create standard text */
function label(t, x, y, color, s) {
    // t is a string. x and y are numbers
    context.fillStyle = color;
    context.font = s.toString()+"px Montserrat";
    context.fillText(t, x, y);
}

// START LEFT LINE

var s = 30;
var lstr = wid/2 - 40;
var rstr = wid/2 + 40;

// h1
connector(lstr,80, o);
label("Are you hungry?", m-270, n+40, o, s);

// v1
connector(lstr,n+600);

//
labelBack(lstr, n-20,lstr-240);
label('Place a request', lstr-240, n-10, w, s);

//
labelBack(lstr, n+480,lstr-290);
label('See your deliverer', lstr-285, n+490, w, s);

// v3
connector(lstr, n+1340);

// h4
label("You're happy", lstr-220, n+40, o, s);
connector(wid*.1, n);

// END LEFT LINE

label("OR", lstr+17, 120, d, s);

// START RIGHT LINE

save(wid*.9, 80);

// h1
label("Already shopping?", rstr+20, n+40, b, 30);
connector(rstr, 80, b);

// v1
labelBack(rstr,n+680, rstr+230);
connector(rstr, n+1000);
label("Find a request", rstr, n-310, w, s);

// h4
labelBack(rstr, n, rstr+240);
connector(rstr+260, n);
label("Accept delivery", rstr, n+10, w, s);

//context.bezierCurveTo(400, 250, 500, 300, 400, 400);

// v4
connector(rstr+190, n+240);

//context.bezierCurveTo(400, 420, 200, 400, 350, 600);

// d1
connector(rstr, n+200);

// d2
connector(rstr, n+500);

// h5
label("You're happy", rstr, n+40, b, s);
connector(wid*.9, n);

// END RIGHT LINE

};
