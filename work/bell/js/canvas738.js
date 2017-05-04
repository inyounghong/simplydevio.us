

var canvas = document.getElementById('map');
var context = canvas.getContext('2d');


var w = window.innerWidth;
var h = window.innerHeight;
canvas.width = w;
canvas.height = 2000;

/** Create lines that connect to each other by
 * saving the endpoint of one and making it the
 * starting point of the next.
 **/

var m = 20;
var n = 20;

var o = '#fa7e00';
var b = '#00ada7';

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
function labelBack(x, y, color) {
    // x and y are numbers to determine lineTo
    // color is a string for a hexcode
    context.beginPath();
    context.moveTo(m, n);
    context.lineTo(x, y);
    context.lineWidth = 20;
    context.strokeStyle = color;
    context.lineCap = 'round';
    context.stroke();
}

/* Create standard text */
function label(t, x, y) {
    // t is a string. x and y are numbers
    context.fillStyle = "#fff";
    context.font = "12px Helvetica";
    context.fillText(t, x, y);
}

// START LEFT LINE

// h1
connector(300,20, o);

// v1
connector(300,800);

// h2
labelBack(140, 800);
connector(140, 800);
label('Place a request', 160, n+4);

// v2
connector(140, 1300);

// h3
labelBack(300, 1300);
connector(300, 1300);
label('See your deliverer', 140, n+4);

// v3
connector(300, 1800);

// h4
connector(120, 1800);

// END LEFT LINE

// START RIGHT LINE

save(600, 20);

// h1
connector(320, 20, b);

// v1
connector(320, 380);

// h2
connector(350, 380);

// v2
connector(350, 960);

// h3
connector(320, 960);

// v3
connector(320, 1150);

// h4
connector(400, 1150);

//context.bezierCurveTo(400, 250, 500, 300, 400, 400);
connector(400, 1300);


//context.bezierCurveTo(400, 420, 200, 400, 350, 600);

//save(350, 600);
connector(350, 1400);
connector(350, 1800);
connector(500, 1800);

// END RIGHT LINE



