<!DOCTYPE html>
<head>
	<style>
#outer-dropzone {
    height: 140px;
}

#inner-dropzone {
    height: 80px;
}

.dropzone {
    background-color: #ccc;
    border: dashed 4px transparent;
    border-radius: 4px;
    margin: 10px auto 30px;
    padding: 10px;
    width: 80%;
    transition: background-color 0.3s, border-color 0.3s;
}

.drop-active {
    border-color: #666;
}

.drop-target {
    background-color: #29e;
}

.drag-drop {
    display: inline-block;
    min-width: 40px;
    padding: 2em 0.5em;

    background-color: #99e;
    border: solid 2px white;

    -webkit-transform: translate(0px, 0px);
            transform: translate(0px, 0px);

    transition: background-color 0.3s;
}

.drag-drop.can-drop { background-color: #4e4; }

.wrap{
	margin-top:100px;
	height:500px;
	background:#eee;
	width:300px;
}

	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>

<body>
	<script src="interact.js"></script>

	<div class="wrap">
		<div id="yes-drop" class="draggable drag-drop"> #no-drop </div>

		<div id="yes-drop" class="draggable drag-drop"> #yes-drop </div>

		<div id="outer-dropzone" class="dropzone">
		    #outer-dropzone
		    
		</div>

        <div id="inner-dropzone" class="dropzone">#inner-dropzone</div>
	</div>

	<script>
// target elements with the "draggable" class
interact('.draggable')
    .draggable({
        // allow dragging of multple elements at the same time
        max: Infinity,

        // call this function on every dragmove event
        onmove: function (event) {
            var target = event.target,
                // keep the dragged position in the data-x/data-y attributes
                x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
                y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

            // translate the element
            target.style.webkitTransform =
            target.style.transform =
                'translate(' + x + 'px, ' + y + 'px)';

            // update the posiion attributes
            target.setAttribute('data-x', x);
            target.setAttribute('data-y', y);
        },
        // call this function on every dragend event
        onend: function (event) {
            var textEl = event.target.querySelector('p');
            
            textEl && (textEl.textContent =
                'moved a distance of '
                + (Math.sqrt(event.dx * event.dx +
                             event.dy * event.dy)|0) + 'px');

        }
    })
    .snap({
        mode: 'grid',
        grid: { x: 30, y: 30 },
        range: Infinity,
        elementOrigin: { x: 0, y: 0 }
    }) 
    // enable inertial throwing
    .inertia(true)
    // keep the element within the area of it's parent
    .restrict({
        drag: "parent",
        endOnly: true,
        elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
    });

    // allow more than one interaction at a time
    interact.maxInteractions(Infinity);


// enable draggables to be dropped into this
interact('.dropzone').dropzone({
    // only accept elements matching this CSS selector
    accept: '#yes-drop',
    // Require a 75% element overlap for a drop to be possible
    overlap: 0.75,

    // listen for drop related events:

    ondropactivate: function (event) {
        // add active dropzone feedback
        event.target.classList.add('drop-active');
    },
    ondragenter: function (event) {
        var draggableElement = event.relatedTarget,
            dropzoneElement = event.target;

        // feedback the possibility of a drop
        dropzoneElement.classList.add('drop-target');
        draggableElement.classList.add('can-drop');
        //draggableElement.textContent = 'Dragged in';

    },
    ondragleave: function (event) {
        // remove the drop feedback style
        event.target.classList.remove('drop-target');
        event.relatedTarget.classList.remove('can-drop');
        //event.relatedTarget.textContent = 'Dragged out';
    },
    ondrop: function (event) {
        //event.relatedTarget.textContent = 'Dropped';

    },
    ondropdeactivate: function (event) {
        // remove active dropzone feedback
        event.target.classList.remove('drop-active');
        event.target.classList.remove('drop-target');
    }
});
	</script>
	
</body>