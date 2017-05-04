

var position = 0;

function initialize_widget(){
/** Initializes the widgets with gridster. Appends to grid[i], with each entry representing a mini-grid*/


    // Initializing gridster
    grid = $("#grid ul").gridster({
        namespace: '#grid',
        widget_base_dimensions: [210, 1],
        widget_margins: [35, 9],
        autogrow_cols: true,

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
            stop: function(event, ui, $widget) {
                storeData();
                //position = ui.position.left;
            }
        }
    }).data('gridster');


}

num = getTitles();

for (i = 0; i < num; i++){
    prepareTitles(i);
}
prepareGrids();
// Program Begins
initialize_widget();
getData(0);

 // One time run
storeData();


// 'Mark as Complete' & 'Mark as Incomplete' toolbars
$toolbar = '<div class="tools"><div class="complete">Mark as Complete</div><div class="star">Mark as Important</div><br><div class="delete">Delete</div></div>';
$toolbar_complete = '<div class="tools"><div class="complete not">Mark as Incomplete</div><div class="star">Mark as Important</div><br><div class="delete">Delete</div></div>';

// CONSTANTS
TEXT_HEIGHT = 19;

function prepareTitles(num){
    $('#title').append('<div id="title_wrap' + num + '" class="title_wrap"><div class="settings"></div><div class="tooltip"><div class="clear_button">Clear Grid</div><div id="del_title' + num + '" class="del_title">Delete Grid</div></div><div class="progress"><div id="bar' + (num + 1) + '" class="bar"></div></div></div>');
}

function prepareGrids(){
    $('#title').append('<div class="title_wrap"><div class="add_grid" onclick="addGrid()"><span>Add Grid</span>+</div></div>');
    //win_height = window.innerHeight;
    //set_height = win_height - 110;
    //$(".add_grid").css('top', set_height + 'px');

    fixGridWidth();
}

function fixGridWidth(){
    num = $('.title_wrap').length;
    $('#background').css('width', (280 * num) + 'px');
}


function updateBar(){
/** Updates the progress bar*/

    for (i = 1; i < num + 1; i++) {
        num_of_comp = 0;
        total_widgets = -1;
        // For each column
        $('[data-col="' + i + '"]').each(function() {
            total_widgets += 1;
            if ($(this).hasClass('comp')){
                num_of_comp += 1;
            }
            if ($(this).hasClass('preview-holder')){
                total_widgets -= 1;
            }
        });   
        // Calculating bar width
        if (total_widgets <= 0) {
            bar_percentage = 0;
        }
        else{
            bar_percentage = num_of_comp/total_widgets;
        }
        // Set bar width
        bar_width = Math.round(bar_percentage * 200);
        try{
            document.getElementById('bar' + i).style.width = bar_width + 'px';
        }
        catch(err){

        }
    } 
}

updateBar();

function initializing_chars(){

    // Adding a widget
    $(document).on( "click", ".plus", addWidget($(this)) );
    // Deleting a widget
    $(document).on( "click", ".gridster li .delete",  deleteWidget($(this)) );
    // Marking a widget as complete
    $(document).on( "click", ".gridster li .complete", completeWidget($(this)) );
    // Editing the widget
    $(document).on( "click", ".gridster li .edit",  editWidget($(this)) );
    
    $(document).on( "dblclick", ".gridster li", editWidget($(this).find('.edit')) );
    // Staring the widget
    $(document).on( "click", ".gridster li .star",  starWidget($(this)) );
    // Deleting a grid
    $(document).on( "click", ".del_title", deleteGrid($(this)) );
    // Deleting a grid
    $(document).on( "click", ".clear_button", clearGrid($(this)) );
    // Toggling setting tooltip
    $(document).on( "click", ".settings",  openTooltip($(this)) );
}

initializing_chars();


$(document).on( "click", ".title_wrap", function() {
    saveOnEnter();
});

function openTooltip(element){
    element.toggleClass('set_on');
    widget = element.parent();
    widget.find('.tooltip').toggleClass('width');
    $(document).click(function(event) { 
        if(!$(event.target).closest(widget).length) {
            if($('.tooltip').hasClass('width')) {
                $('.settings').removeClass('set_on');
                $('.tooltip').removeClass('width');
            }
        }        
    })
}

function addWidget(element){
/** Adds a widget to the grid when the button is pressed 
    element: .plus, child of widget */
    col = element.parent().attr('data-col');
    grid.add_widget('<li><textarea autofocus id="textarea"></textarea></li>', 1, 6, col, 100);
    $(textarea).height((4*18)+5);
    saveOnReady();
    $('textarea').focus();
}


function addGrid(){
/** Adds a new title and grid space **/
    // Remove the add grid button temporarily
    num = getTitles();

    $('#title .title_wrap:last').remove();
    
    prepareTitles(num); // Add title spaces
    createTitles(num);
    console.log(num);
    /*grid.add_widget('<li><textarea autofocus id="textarea"></textarea></li>', 1, 6, num+1, 2);
    $(textarea).height((4*18)+5);
    saveOnReady();
    storeData();
    $('textarea').focus();*/

    prepareGrids();
    fixGridWidth();
    
    storeData();
    grid.add_widget('<li><textarea autofocus id="textarea"></textarea></li>', 1, 6, col, 100);
}


function getData(col_index){
/** Gets data from local storage 
    col_index: [0 or 1] index of the col that was deleted */
    grid.remove_all_widgets();
    s = JSON.parse(localStorage.getItem("positions"));
    t = JSON.parse(localStorage.getItem("title_texts"));
    num = getTitles();
    try{
        $.each(s, function() {
            // If a column was deleted
            if (col_index != 0){
                // If we need to scoot the widget
                if (this.col > col_index){
                    grid.add_widget('<li>' + this.htmlContent + '</li>', this.size_x, this.size_y, this.col - 1, this.row);
                }
                // Proceed without scooting
                else if (this.col != col_index){
                    grid.add_widget('<li>' + this.htmlContent + '</li>', this.size_x, this.size_y, this.col, this.row);
                }
            }
            // If a column was not deleted (normal state of things)
            else{
                grid.add_widget('<li>' + this.htmlContent + '</li>', this.size_x, this.size_y, this.col, this.row);
            }
        });
        // Adjust title id numbers
        numberTitles();
        // Set titles
        $.each(t, function(i, field) {
            n = field.name.slice(-1)
            $('#title' + n).val(field.value);
        });
        if ($('.title_input') < 1){
            for (i = 0; i < num; i++){
                prepareTitles(i);
            }
        }
    }
    // If the user has no info to begin with (new user)
    catch(err){
        addGrid();
        addGrid();
        grid.add_widget('<li><div class="text">Hello, there! Welcome to <br><b>Things I Wanna Do</b>!</div><div class="edit"></div></li>', 1, 5, 1, 4);
        
    }
    getTitles();
    backComplete();
    backStarred();
    // Make widgets have class of title_widget
    backTitle();
    
}

function backTitle(){
    $.each($('.title_input'), function() {
        $(this).parent().addClass('title_widget');
        //$(this).parent().attr('data-sizey', 3)
    });
}

function numberTitles(){
    $.each($('.title_input'), function() {
       parent_col = $(this).parent().attr('data-col');
       $(this).attr('id', 'title' + parent_col);
       $(this).attr('name', 'title' + parent_col);
    });
}

function createTitles(index){
    grid.add_widget('<li><input type="text" class="title_input" id="title' + index + '" name="title' + index + '" value="Title" onclick="this.select()"><div class="plus">+</div></li>', 1, 3, index + 1, 5);
    //grid.disable($('#title_input' + index));

    // Issues arise when a not-last grid is deleted -- this ensures the new title scoots one right
    correct_col = $('.title_input').length; 
    $('li:last').attr('data-col', correct_col);
    $('li:last').addClass('title_widget');
}



function deleteGrid(element){
/** Deletes a grid
    element: delete button which has an id **/
    // Get id of button, which is the grid id
    id = element.attr('id');
    id = id.slice(-1);
    $('#title_wrap' + id).remove();
    scootTitles(parseInt(id));
    scootGrids(id);
    numberTitles();
    fixGridWidth();
    //alert(JSON.stringify(grid.serialize()));
    storeData();
    storeTitles();
}

function clearGrid(element){
    id = element.parent().parent().attr('id');
    id = parseInt(id.slice(-1));
    $.each($('[data-col="' + (id + 1) + '"]'), function() {
        if ($(this).attr('data-row') != 1){
            grid.remove_widget($(this));
        }
    });
    setTimeout(function(){ 
        getData(col);
        storeData(col);
    }, 250);
}

function checkTitles(){
    cols = [];
    s = grid.serialize($('.comp'));
    $.each(s, function() {
        col = s.col
        if (cols.indexOf(col) != -1){
            cols.append(col)
        }
        // If a repeat
        else{

        }
    });

}

function editWidget(element){
/** Edits the widget
    element: Some child of the widget, the edit button */
    var widget = element.parent();
    // z-index + overlay

    $widget_html = cleanText(widget.html()); // Grab the html of the widget
    height = Math.round(widget.find('.text').height()/TEXT_HEIGHT) ; // Height of text box
    // Default widget size is 6 units
    if (height < 4){
        height = 4; 
    }
    grid.resize_widget(widget, 1, height + 3);

    // configuration of the toolbar
    final_toolbar = configToolbar(widget);
    var formatting = '<div id="formatting-container"><button title="Bold" class="ql-format-button ql-bold">Bold</button><button title="Italic" class="ql-format-button ql-italic">Italic</button><button title="Underline" class="ql-format-button ql-underline">Under</button><button title="Link" class="ql-format-button ql-link">Link</button></div>';
    widget.html(formatting + '<textarea id="textarea"></textarea>' + final_toolbar);
    // Set textarea height and focus
    $('#grid').find('textarea').height(((height + 1)*TEXT_HEIGHT));
    $('#grid').find('textarea').focus().val('').val($widget_html); // set value of widget
    
    saveOnReady();

}

function configToolbar(widget){
/** Sets up what the toolbar says when a widget is edited
    widget: widget */ 
    toolbar = $toolbar;
    if (widget.hasClass('comp')){
        toolbar = $toolbar_complete;
    }
    if (widget.hasClass('starred')){
        toolbar = toolbar.replace('<div class="star">Mark as Important</div>', '<div class="star">Undo Mark as Important</div>');
    }
    return toolbar;
}

function starWidget(element){
/** Stars the widget
    element: Some grand child of the widget, the star button */ 
    var widget = element.parent().parent();
    var textarea = widget.find('textarea')
    if (widget.hasClass('starred')){
        $('.star').html('Mark as Important');
        widget.removeClass('starred');
    }
    else{
        $('.star').html('Undo Mark as Important');
        widget.addClass('starred');
    }
    saveWidgetText(textarea);
    
}

function cleanText(text){
/** Cleans the given text
    text: html, the text that will go in the textarea */
    clean = text.replace($toolbar, '');
    clean = clean.replace('<div class="text s stars">', '');
    clean = clean.replace('<div class="text">', '');
    clean = clean.replace('</div>', '');
    clean = clean.replace('<div class="text s">', '');
    clean = clean.replace('<div class="text stars">', '');
    clean = clean.replace('<div class="text stars s">', '');
    clean = clean.replace('<div class="edit"></div>', '');
    return clean
}

function saveOnEnter(){
/** Calls storeTitle on blur or enter */
    $('#title input').blur(function() {
        storeTitles();
    });
    $('#title input').on( "keydown", function( event ) {
        if (event.which == 13)
        {
            storeTitles();
        }
    });
}


function clearWidgets(){
/** Delete all widgets */
    grid.remove_all_widgets();
    storeData();
}



function scootTitles(id){ // Say grid 1 is deleted
    $.each($('.title_wrap'), function(index) { // when you get to the new grid 1 
        if (index >= id){
            $(this).attr('id', 'title_wrap' + index); // set to id 1
            $(this).find('.del_title').attr('id', 'del_title' + index);
            $(this).find('.bar').attr('id', 'bar' + (index + 1));
            //$(this).find('.title_input').attr('id', 'title' + index);
            
        }
    });  
}

function scootGrids(id){
    col = parseInt(id) + 1;
    length = getTitles();

    for (i = 1; i <= length; i++){ // Counting begins at col 1
        $('[data-col="' + i + '"]').each(function() { // Check that col
            if (i == col){ // If the same as deleted ool
                //grid.remove_widget($(this));
                $(this).css('opacity', 0)
            }
            else if (i > col){ // If greater than deleted col
                $(this).attr('data-col', i-1)
                
                /*new_col = i;
                r = $(this).attr('data-row');
                x = $(this).attr('data-sizex');
                y = $(this).attr('data-sizey');
                html = $(this).html();*/
                //grid.add_widget('<li>' + html + '</li>', x, y, i - 1, r);
                //grid.remove_widget($(this));
                //grid.mutate_widget_in_gridmap($(this), { col: col, row: r, size_x: x, size_y: y }, { col: i-1, row: r, size_x: x, size_y: y });
                
            }
        });
        
       /* if (i == col){ // If the same as deleted ool
            grid.remove_widget($'[data-row="' + i + '"]'));
        }
        else if (i > col){ // If greater than deleted col
            grid.mutate_widget_in_gridmap($('[data-row="' + i + ']"), { col: 7, row: 1, size_x: 6, size_y: 1 }, { col: 6, row: 1, size_x: 7, size_y: 1 });
        }*/
    }

    backTitle();
    //alert(JSON.stringify(grid.serialize()));
    setTimeout(function(){ 
        getData(col);
        //alert(JSON.stringify(grid.serialize()));
    }, 250);
    //alert(JSON.stringify(grid.serialize()));
    storeData();
    

}






function storeData(){
/** Stores data in local storage */
    s = grid.serialize();
    if (typeof(Storage) != "undefined") {
        localStorage.setItem("positions", JSON.stringify(s));
    }
    //alert(JSON.stringify(s))
    updateBar();
    storeTitles();
}



function storeTitles(){
/** Stores title data in local storage */
    t = $("form").serializeArray();
    localStorage.setItem("title_texts", JSON.stringify(t));
    num = $('.title_input').length;
    localStorage.setItem("titles", num);

}

function storeTitles2(){
/** Stores title data in local storage */
    num = $('.title_input').length;
    localStorage.setItem("titles", num - 1);
}

function getTitles(){
/** Sets the title data */
    return localStorage.getItem("titles");
    /*titles = JSON.parse(localStorage.getItem("titles"));
    $.each(titles, function (i, field){
        $('#title' + i).val(field.value)
        storeTitles();
    });*/
}

function deleteWidget(element){
/** Delete the widget 
    element: Some grand child of widget */
    element.parent().parent().addClass("activ");
    grid.remove_widget($('.activ'));
    storeData();
}

function completeWidget(element){
/** Completes the widget
    element: Some child of widget, .complete */

    if (element.hasClass('not')){
        element.parent().parent().removeClass("comp");
    }
    else{
        element.parent().parent().addClass("comp");

    }
    saveWidgetText($('textarea'));
}


function saveOnReady(){
/** Saving the text on BLUR or ENTER */
    $('textarea').parent().css('z-index', 'auto');
    $('textarea').blur(function() {
        saveWidgetText($(this));
    });
    $('textarea').on( "keydown", function( event ) {
        if (event.which == 13){
            saveWidgetText($(this));
        }
    });
}

function saveWidgetText(textarea){
/** Sets widget value to textarea value */
    value = textarea.val().replace('<div class="edit"></div>', '');

    // If value is blank
    if (value.length < 1){
        try{
            element = textarea.parent().find('.delete');
            deleteWidget(element);
        }
        catch(err){
            textarea.parent().addClass("activ");
            grid.remove_widget($('.activ'));
            storeData();
        }
    }
    else{
        $widget = textarea.parent();
        // Set value in textarea
        checkComplete(textarea);

        // Edit height of widget
        height = $widget.find('.text').height();
        // Set min height of 3
        if (height < TEXT_HEIGHT){
            unit_height = 1;
        }
        else{
            unit_height = Math.round(height / TEXT_HEIGHT);
        }
        grid.resize_widget($widget, 1, unit_height + 2);
        
    }
    storeData();
}

function getGridHeight(){
    height = $('#ul').height() + 50;
    if (height < 500){
        height = 500;
    }
    
}

function checkComplete(textarea){
/** Checks for completeness and sets text class appropriately. 
    textarea: child to widget */
    $comp = '';
    $star = '';
    if (textarea.parent().hasClass('comp')){
        $comp = ' s';
    }
    if (textarea.parent().hasClass('starred')){
        $star = ' stars';
    }
    $html = '<div class="text' + $comp + $star + '">' + value + '</div><div class="edit"></div>';
    textarea.parent().html($html);
}

function checkStarred(textarea){
/** Checks for starred and sets text class appropriately. 
    textarea: child to widget */   
    if (textarea.parent().hasClass('starred')){
        $html = '<div class="text stars">' + value + '</div><div class="edit"></div>';
    }
    else{
        $html = '<div class="text">' + value + '</div><div class="edit"></div>';
    }
    textarea.parent().html($html);
}


function backComplete(){
    $('.s').each(function() {
        $(this).parent().addClass('comp');
    });
}

function backStarred(){
    $('.stars').each(function() {
        $(this).parent().addClass('starred');
    });
}