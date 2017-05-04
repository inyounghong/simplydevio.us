<!doctype html>
<html>
<head>
    <title>Things I Wanna Do</title>
    <link rel="stylesheet" type="text/css" href="jquery.gridster.css">
    <link rel="stylesheet" type="text/css" href="demo.css">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Over+the+Rainbow' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic' rel='stylesheet' type='text/css'>


</head>

<body>
    <?php 
        function writeGrid($grid_num){
        // Writes the HTML of one grid
            // $i: int, looping index
            // $grid_num: number of grids

            for ($i = 0; $i < $grid_num; $i++) {
                echo '
                <li id="main' . $i . '" data-row="1" data-col="' . ($i + 1) . '" data-sizex="1" data-sizey="1">
                    <div class="header">
                        <div class="title" id="title' . $i . '">I Want To...</div>
                        <a class="ask_delete_grid" id="ask_delete_grid' . $i . '"><img src="images/delete.png"></a>
                    </div>
                    <div class="progress"><div class="bar" id="bar' . $i . '"></div></div>
                    <div class="task" id="task' . $i . '"></div>
                    <div id="grid-' . $i . '" class="gridster">
                        <ul class="ul'  . $i . '">
                            
                        </ul>
                        
                    </div>
                    <div id="add_button'  . $i . '" class="button"><span>+ add task</span></div>
                </li>';
            } 
        }
    ?>
    <div class="nav">
        <h1>Things I Wanna do</h1>
    </div>
    <div class="view_container">
        <div id="main_grid" class="gridster">
            <ul id="main_ul">
                <?php 
                    if (isset($_GET['grids'])){
                        $num = $_GET['grids'];
                    }
                    else{
                        $num = 0;
                    }
                    writeGrid($num);
                    echo '</ul></div>'; // End page HTML
                    echo '<a href="index.php?grids=' . (string) ($num + 1) . '" id="add_grid_button" onclick="addGrid()">Add a Grid</a>';
                ?>
        <div class="cheat_space">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div>
    </div>


    <script type="text/javascript" src="jquery.js"></script>
    
    <script src="jquery.gridster.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">

    
        var grid = [];
        var number_of_grids = $( ".gridster" ).length - 1;

        function initialize_grid(){
        /** Initializes the main grid with gridster*/
            main_grid = $("#main_grid > #main_ul").gridster({
                namespace: '#main_grid',
                widget_base_dimensions: [250, 500],
                widget_margins: [20, 40],
                /*resize: {
                    enabled: true,
                    max_size: [1, 5],
                    min_size: [1, 2]
                  },*/
                // Setting up which parameters to store
                serialize_params: function ($w, wgd) {
                    return {
                        id: wgd.el[0].id,
                        col: wgd.col,
                        row: wgd.row,
                        size_x: wgd.size_x,
                        size_y: wgd.size_y,
                        htmlContent: $($w).html(),
                    };
                },
                draggable: 
                {
                    // After a widget is dropped, the environment is saved
                    stop: function(event, ui) {
                        storeData();
                    }
                }
            }).data('gridster');
        }

        function initialize_widget(){
        /** Initializes the widgets with gridster. Appends to grid[i], with each entry representing a mini-grid*/
            for (i = 0; i < $( ".gridster" ).length -1; i++) { 
            // Initializing gridster
                grid[i] = $("#grid-" + String(i) + " ul").gridster({
                    namespace: '#grid-' + String(i),
                    widget_base_dimensions: [210, 3],
                    widget_margins: [0, 8],
                    // Setting up which parameters to store
                    serialize_params: function ($w, wgd) {
                        return {
                            id: wgd.el[0].id,
                            col: wgd.col,
                            row: wgd.row,
                            size_x: wgd.size_x,
                            size_y: wgd.size_y,
                            htmlContent: $($w).html(),
                        };
                    },
                    draggable: 
                    {
                        // After a widget is dropped, the environment is saved
                        stop: function(event, ui) {
                            storeData();
                        }
                    }
                }).data('gridster');
            }
        }

        // Program Begins
        redirectPage();


        // 'Mark as Complete' & 'Mark as Incomplete' toolbars
        $toolbar = '<div class="complete">Mark as Complete</div><div class="delete">Delete</div>';
        $toolbar_complete = '<div class="complete not">Mark as Incomplete</div><div class="delete">Delete</div>';

        // CONSTANTS
        TEXT_HEIGHT = 19;

        function redirectPage(){
        /** Redirects index.php to the correct ?grids page OR begins the program */
            if (window.location.href.slice(-3) == 'php'){
                num_grids = 1;
                // If not a new visitor
                if (JSON.parse(localStorage.getItem("main_positions")) != null){
                    num_grids = JSON.parse(localStorage.getItem("main_positions")).length;
                }
                window.location.replace('index.php?grids=' + num_grids); // replace the url
            }
            else{
                initialize_grid();
                //main_grid.disable(); // Turn off dragging
                initialize_widget();
                getData();
                storeData();
            }
        }

        function updateBar(){
        /** Updates the progress bar*/
            for (i = 0; i < grid.length; i++) {
                // For each grid
                total_widgets = $('#grid-' + String(i)).children().find('.gs-w').length;
                num_of_comp = $('#grid-' + String(i)).children().find('.comp').length;

                deleted_widgets = $('#grid-' + String(i)).children().find('.activ').length;
                deleted_complete_widgets = $('#grid-' + String(i)).children().find('.comp.activ').length;
                
                total_widgets = total_widgets - deleted_widgets;
                num_of_comp = num_of_comp - deleted_complete_widgets;

                // Calculating bar width
                if (total_widgets == 0) {
                    bar_percentage = 0
                }
                else{
                    bar_percentage = num_of_comp/total_widgets;
                }
                bar_width = Math.round(bar_percentage *230);

                // Set bar width and task number
                document.getElementById('bar' + i).style.width = bar_width + 'px';
                //document.getElementById('task' + i).innerHTML = String(total_widgets) + '';
            } 
        }

        updateBar();

        function initializing_chars(){
            // Adding a widget
            for (i = 0; i < grid.length; i++) { 
              addWidget("#add_button" + String(i), grid[i]);
              askDeleteGrid("#ask_delete_grid" + i, i);
              
            }

            // Deleting a widget
            $(document).on( "click", ".gridster li li .delete", function() {
                deleteWidget($(this));
            });

            // Marking a widget as complete
            $(document).on( "click", ".gridster li li .complete", function() {
                completeWidget($(this));
            });

            // Editing the widget
            $(document).on( "click", ".gridster li li .edit", function() {
                editWidget($(this));
            });
        }

        initializing_chars();

        
        $(document).on( "click", ".title", function() {
            editTitle($(this));
        });


        function addWidget(button, grid){
        /** Adds a widget to the grid when the button is pressed */
            $(document).on( "click", button, function() {
                //$html = $(button).parent().html();
                //if ($html.indexOf('<textarea') > 0) {// If there is an active widget
                    grid.add_widget('<li><textarea autofocus id="textarea"></textarea><div class="delete">Delete</div></li>', 1, 6, 1, 100);
                    $(textarea).height((4*18)+5);
                    saveOnReady();
                    updateBar();
                    storeData();
                    $(button).parent().find('textarea').focus();
                //}
            });
        }

        function askDeleteGrid(button, index){
        /** Creates overlay to ask user whether to delete the grid */
            $(document).on( "click", button, function() {
                $('.ask_overlay').remove();
                href = grid.length - 1;
                $('#main' + index).append('<div class="ask_overlay"><a href="index.php?grids=' + href + '" class="delete_grid" id="delete_grid' + index + '">Delete Grid</a><br><div class="cancel">Cancel</div></div>');
                deleteGrid("#delete_grid" + index, index);
                cancelOverlay();
            });

        }

        function deleteGrid(button, index){
        /** Deletes the grid with corresponding title and widgets 
            button: delete button, appears only after affirmative on askDeleteGrid()
            index: index of the grid */
            $(document).on( "click", button, function() {
                // Delete widget data + shuffle down
                localStorage.removeItem("positions" + index); 
                shuffleWidgets(index);
                // Delete grid data
                m = localStorage.getItem("main_positions");
                grids = m.split('}');
                grid_to_delete = grids[index].slice(1) + '},';
                new_m = m.replace(grid_to_delete, '');
                // Set as new_m
                localStorage.setItem("main_positions", new_m); 
            });
        }

        function cancelOverlay(){
            $(document).on( "click", '.cancel', function() {
                $('.ask_overlay').remove();
            });
        }

        function shuffleWidgets(index){
        /** Reasigns grid data, helper to deleteGrid() 
            index: int, deleted grid */
            for (i = 0; i < grid.length; i++) { 
                // For the grids after the deleted grid, reshuffle one down
                if (i > index){
                    current_widgets = localStorage.getItem("positions" + i); 
                    localStorage.setItem("positions" + (i - 1), current_widgets); 
                }
            }
            // Delete the last grid
            localStorage.removeItem("positions" + (grid.length - 1));
        }

        /*
        function deleteGrid(){
        /** Deletes a grid, deletes a grid's widgets and title 
            index = grid.length - 1;
            localStorage.removeItem("positions" + index); // Delete widget data
            m = localStorage.getItem("main_positions");
            m = m.slice(0, m.lastIndexOf(',{')); // Remove the deleted grid's data (title)
            localStorage.setItem("main_positions", m + ']'); // Set as m

        }*/

        function editWidget(element){
        /** Edits the widget
            element: Some child of the widget, the edit button */
            var id = gridID(element);
            $widget_html = cleanText(element.parent().html()); // Grab the html of the widget
            height = Math.round(element.parent().height()/TEXT_HEIGHT) + 2; // Height of text box
            // Default widget size is 6 units
            if (height < 5){
                height = 6; 
            }
            grid[id].resize_widget(element.parent(), 1, height);
            // Set toolbar depending on whether li is complete or not
            toolbar = $toolbar;
            if (element.parent().hasClass('comp')){
                toolbar = $toolbar_complete;
            }
            element.parent().html('<textarea id="textarea"></textarea>' + toolbar);
            // Set textarea height and focus
            $('#grid-' + id).find('textarea').height(((height-2)*TEXT_HEIGHT)+5);
            $('#grid-' + id).find('textarea').focus().val('').val($widget_html);
            saveOnReady();
        }

        function cleanText(text){
        /** Cleans the given text
            text: html, the text that will go in the textarea */
            clean = text.replace($toolbar, '');
            clean = clean.replace('<div class="text">', '');
            clean = clean.replace('</div>', '');
            clean = clean.replace('<div class="text s">', '');
            clean = clean.replace('<div class="edit"></div>', '');
            return clean
        }

        function editTitle(title_edit){
        /** Edits the title
            title_edit: some subelement of widget, title click */
            $grid_html = title_edit.parent().html();
            $start = $grid_html.indexOf('<div class="title"');
            $end = $grid_html.indexOf('</div>');
            $title_html = $grid_html.slice($start + 31, $end); 
            $title_id = $grid_html.slice($start + 28, $start + 29); // Find title id
            
            $the_rest_of_header = $grid_html.slice($end);

            if ($title_html.indexOf('input') < 0){ // If it has not already been double clicked
                $title = $title_html.replace('<div class="title">', '');
                title_edit.parent().html('<input type="text" id="input" value="' + $title + '" onfocus="this.value = this.value;">' + $the_rest_of_header);
                saveOnEnter($the_rest_of_header, $title_id);
            }
            document.getElementById("input").focus();
            //document.getElementById('title' + String(i)).innerHTML = title; 
        }

        function saveOnEnter(the_rest_of_header, title_id){
            $('input#input').blur(function() {
                saveTitle($('input#input'), the_rest_of_header, title_id);
            });
            $('input#input').on( "keydown", function( event ) {
                if (event.which == 13)
                {
                    saveTitle($('input#input'), the_rest_of_header, title_id);
                }
            });

        }

        function saveTitle(input, the_rest_of_header, title_id){
            $html = input.val();
            /*if ($html == '')
            {
                $html = 'Enter a Title';
            }*/
            input.parent().html('<div class="title" id="title' + title_id + '">' + $html + the_rest_of_header);
            storeData();
        }


        function clearWidgets(){
        /** Delete all widgets */
            for (i = 0; i < grid.length; i++) { 
                grid[i].remove_all_widgets();
            }
            main_grid.remove_all_widgets();
            storeData();
        }

        function getData(){
             //Probably get rid of this to save things in another way 
                //main_grid.remove_all_widgets();
                
                /*m = JSON.parse(localStorage.getItem("main_positions"));
                
                try{
                    var i = 0;
                    $.each(m, function() {

                        var html = '<div class="header"><div class="title">Title</div></div><div id="grid-' + String(i) + '" class="gridster"><ul class="ul'  + String(i) + '"><li id="li1" data-row="1" data-col="1" data-sizex="1" data-sizey="1"></li></ul></div> <input id="add_button'  + String(i) + '" class="button" type="button" value="Add Button ' + String(i) + '">';
                        main_grid.add_widget('<li>' + html + '</li>', this.size_x, this.size_y, this.col, this.row);
                        i = i + 1;

                    });      
                }
                catch(err){

                }*/

            // Adding widgets
            if (grid.length != null){
                for (i = 0; i < grid.length; i++) { 
                    grid[i].remove_all_widgets();
                    s = JSON.parse(localStorage.getItem("positions" + String(i)));
                    
                    try{
                        $.each(s, function() {
                            grid[i].add_widget('<li>' + this.htmlContent + '</li>', this.size_x, this.size_y, this.col, this.row);
                        });    
                    }
                    catch(err){
                    }
                }
            }

            // Adding titles
            m = JSON.parse(localStorage.getItem("main_positions")); // Grab grid data with titles
            try{
                i = 0; // Grid index
                $.each(m, function() {

                    $grid_html = this.htmlContent;
                    $start = $grid_html.indexOf('<div class="title"');
                    $end = $grid_html.indexOf('</div>');
                    $title = $grid_html.slice($start + 31, $end);
                    //$title = 'title'

                    document.getElementById('title' + i).innerHTML = $title; // Set title with parsed title from data
                    i += 1;
                });   
            }
            catch(err){
            }

        }

        function storeData(){
        /** Stores data in local storage */
            if (grid.length != null) {
                for (i = 0; i < grid.length; i++) { 
                    s = grid[i].serialize();
                    if (typeof(Storage) != "undefined") {
                        localStorage.setItem("positions" + String(i), JSON.stringify(s));
                    }
                }
            }
            m = main_grid.serialize();
            if (typeof(Storage) != "undefined") {
                localStorage.setItem("main_positions", JSON.stringify(m));
                //document.getElementById('json').innerHTML = JSON.stringify(m);
                
            }
            

        }


        function deleteWidget(element){
        /** Delete the widget 
            element: Some child of widget */
            element.parent().addClass("activ");
            id = gridID(element);
            grid[id].remove_widget($('.activ'));
            updateBar();
            storeData();
        }

        function completeWidget(element){
        /** Completes the widget
            element: Some child of widget, .complete */
            if (element.hasClass('not')){
                element.parent().removeClass("comp");
            }
            else{
                element.parent().addClass("comp");
            }
            saveWidgetText($('textarea'));
            updateBar();
        }

        function gridID(element){
        /** Returns: id of the grid that contains the given element */
            var id = element.parent().parent().parent().html();
            id = id.trim();
            id = parseInt(id.slice(13,14));
            return id;
        }

        function saveOnReady(){
        /** Saving the text on BLUR or ENTER */
            $('textarea').blur(function() {
                saveWidgetText($(this));
            });
            $('textarea').on( "keydown", function( event ) {
                if (event.which == 13)
                {
                    saveWidgetText($(this));
                }
            });
        }
        
        function saveWidgetText(textarea){
        /** Sets widget value to textarea value */
            value = textarea.val().replace('<div class="edit"></div>', '');
            if (textarea.parent().hasClass('comp')){
                $html = '<div class="text s">' + value + '</div><div class="edit"></div>';
            }
            else{
                $html = '<div class="text">' + value + '</div><div class="edit"></div>';
            }
            textarea.parent().html($html);
            
            $widget = textarea.parent();
            id = gridID(textarea);
            height = $widget.find('.text').height();
            if (height < 36){
                unit_height = 2;
            }
            else{
                unit_height = Math.round(height / TEXT_HEIGHT) + 1;
            }
            grid[id].resize_widget($widget, 1, unit_height);
            
            storeData();
        }


    </script>

</body>
</html>
