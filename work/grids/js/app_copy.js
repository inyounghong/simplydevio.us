var position = 0;

function initialize_widget(){
/** Initializes the grid under the name of grid */
    
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
            }
        }
    }).data('gridster');
}

num = getTitles();
// If there are no titles to begin with
if (num == null){
    num = 0;
}
for (i = 0; i < num; i++){
    prepareTitles(i);
}
prepareGrids();
// Program Begins

initialize_widget();
getData(0);
storeData();
updateBar();


// 'Mark as Complete' & 'Mark as Incomplete' toolbars
$toolbar = '<div class="tools"><div class="complete">Mark as Complete</div><div class="star">Mark as Important</div><br><div class="delete">Delete</div></div>';
$toolbar_complete = '<div class="tools"><div class="complete not">Mark as Incomplete</div><div class="star">Mark as Important</div><br><div class="delete">Delete</div></div>';
var color_toolbox = '<div class="color_tools"><div class="square teal"></div><div class="square pink"></div><div class="square yellow"></div><div class="square orange"></div></div>';
var formatting = '<div id="formatting-container"><div class="ql-format-button ql-bold">B</div><div class="ql-format-button ql-italic">I</div><div class="ql-format-button ql-underline">U</div></div>';
//<div title="Link" class="ql-format-button ql-link">L</div>
var colors = ['teal', 'pink', 'yellow', 'orange'];

// CONSTANTS
TEXT_HEIGHT = 19;

function prepareTitles(num){
    num = parseInt(num);
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
/** Takes the number of titles and sets the background width accordingly */
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
        catch(e){}
    } 
}

function initializing_chars(){

    // Adding a widget
    $(document).on( "click", ".plus", function() {
        addWidget($(this));
    });
    // Deleting a widget
    $(document).on( "click", ".gridster li .delete", function() {
        deleteWidget($(this));
    });
    // Marking a widget as complete
    $(document).on( "click", ".gridster li .complete", function() {
        completeWidget($(this));
    });
    // Editing the widget
    $(document).on( "click", ".gridster li .edit", function() {
        editWidget($(this));
    });
    $(document).on( "dblclick", ".gridster li", function() {
        editWidget($(this).find('.edit'));
    });
    // Staring the widget
    $(document).on( "click", ".gridster li .star", function() {
        starWidget($(this));
    });
    // Deleting a grid
    $(document).on( "click", ".del_title", function() {
        deleteGrid($(this));
    });
    // Deleting a grid
    $(document).on( "click", ".clear_button", function() {
        clearGrid($(this));
    });
    // Toggling setting tooltip
    $(document).on( "click", ".settings", function() {
        openTooltip($(this));
    });
    $(document).on( "focus", ".title_input", function() {
        openColorTools($(this));
    });
}

initializing_chars();


$(document).on( "click", ".title_wrap", function() {
    saveOnEnter();
});

function openTooltip(element){
    element.toggleClass('set_on');
    widget = element.parent();
    widget.find('.tooltip').toggleClass('width');
    widget.find('.tooltip').css('cursor', 'pointer');
    $(document).click(function(event) { 
        if(!$(event.target).closest(widget).length) {
            if($('.tooltip').hasClass('width')) {
                $('.settings').removeClass('set_on');
                $('.tooltip').removeClass('width');
                widget.find('.tooltip').css('cursor', 'default');
            }
        }        
    })
}

function openColorTools(input_box){
    input_box.before(color_toolbox);
    input_box.blur( function(){
        $('.color_tools').remove();
    });
    setChangeColor(input_box);
}

function setChangeColor(input_box){
    for (i = 0; i < colors.length; i++){
        //alert(colors[i])
        $('.square.' + colors[i]).click(function(){
            color = $(this).attr('class').split(' ');
            color = color[1]
            stripColors(input_box);            
            input_box.addClass(color);
            input_box.parent().addClass(color);
            storeData();
        }); 
    }
}

function stripColors(input_box){
    for (i = 0; i < colors.length; i++){
        input_box.removeClass(colors[i]);
        input_box.parent().removeClass(colors[i]);
    }
}


function addGrid(){
/** Adds a new title and grid space **/
    // Remove the add grid button temporarily
    num = getTitles();
    $('#title .title_wrap:last').remove();
    
    prepareTitles(num); // Add title spaces
    createTitles(num);
    /*grid.add_widget('<li><textarea autofocus id="textarea"></textarea></li>', 1, 6, num+1, 2);
    $(textarea).height((4*18)+5);
    saveOnReady();
    storeData();
    $('textarea').focus();*/

    prepareGrids();
    fixGridWidth();
    
    json = grid.serialize();
    json[json.length -1].col = $('#ul .title_widget:last').attr('data-col');
    storeData(json);
    getData();
}



function cleanTitle(html){
    // Remove color toolbox on reload
    html = html.replace('<div class="color_tools"><div class="square teal"></div><div class="square pink"></div><div class="square yellow"></div><div class="square orange"></div></div>', ''); 
    html.replace(color_toolbox, '');
    return html;
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
            html = cleanTitle(this.htmlContent);
            // If a column was deleted
            if (col_index != 0){
                // If we need to scoot the widget
                if (this.col > col_index){
                    grid.add_widget('<li>' + html + '</li>', this.size_x, this.size_y, this.col - 1, this.row);
                }
                // Proceed without scooting
                else if (this.col != col_index){
                    grid.add_widget('<li>' + html + '</li>', this.size_x, this.size_y, this.col, this.row);
                }
            }
            // If a column was not deleted (normal state of things)
            else{
                grid.add_widget('<li>' + html + '</li>', this.size_x, this.size_y, this.col, this.row);
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
        $('#title .title_wrap:last').remove();
        fixGridWidth();
        prepareTitles(0); // Add title spaces
        createTitles(0, 'pink', 'Getting Started');
        prepareTitles(1); // Add title spaces
        createTitles(1, 'teal', 'Click to add title');
        prepareGrids();

        grid.add_widget('<li><div class="text">Welcome to <b>Things I Wanna Do.</b></div><div class="edit"></div></li>', 1, 4, 1, 4);
        grid.add_widget('<li><div class="text">I\'m a card. Try <b>dragging</b> me around.</div><div class="edit"></div></li>', 1, 4, 1, 8);
        grid.add_widget('<li><div class="text"><b>Double click</b> me or click the pencil icon in the right hand corner to edit.</div><div class="edit"></div></li>', 1, 5, 1, 12);
        grid.add_widget('<li><div class="text">Press <b>Enter</b> or click anywhere off the card to save your card.</div><div class="edit"></div></li>', 1, 4, 1, 17);
        grid.add_widget('<li><div class="text">Start your own grid here.</div><div class="edit"></div></li>', 1, 3, 2, 4);
        grid.add_widget('<li><div class="text">No need to make an account or login. Your cards will be saved on your browser.</div><div class="edit"></div></li>', 1, 5, 2, 9);
        json = grid.serialize();
        // Adjusting serialized data (grr)
        json[1].col = 2;
        json[1].row = 1;
        json[json.length - 2].row = 4;
        json[json.length - 1].row = 8;
        storeData(json);
        getData();
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
        class_name = $(this).attr('class').split(' ');
        color = class_name[1];
        $(this).parent().addClass(color);
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

function createTitles(index, color, value){
    color = color;
    if (color === undefined){
        color = 'teal';
    }
    value = value;
    if (value === undefined){
        value = 'Title';
    }
    grid.add_widget('<li><input type="text" class="title_input ' + color + '" id="title' + index + '" name="title' + index + '" value="' + value + '" onclick="this.select()"><div class="plus">+</div></li>', 1, 3, index + 1, 5);
    //grid.disable($('#title_input' + index));

    // Issues arise when a not-last grid is deleted -- this ensures the new title scoots one right
    correct_col = $('.title_input').length; 
    $('li:last').attr('data-col', correct_col);
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
    setTimeout(function(){ 
        storeData();
    }, 50); // This appears to be necessary
}

function clearGrid(element){
/** Clears a grid
    element: clear button */
    id = element.parent().parent().attr('id');
    id = parseInt(id.slice(-1));
    $.each($('[data-col="' + (id + 1) + '"]'), function() {
        if ($(this).attr('data-row') != 1){
            grid.remove_widget($(this));
            grid.remove_empty_cells(id + 1, 1, 1, 3);
        }
    });
    storeData(col);
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

function addWidget(element){
/** Adds a widget to the grid when the button is pressed 
    element: .plus, child of widget */
    // Only run if no other widgets are active
    if ($('#textarea').length == 0){
        col = element.parent().attr('data-col');
        grid.add_widget('<li><div id="textarea"></div></li>', 1, 6, col, 100);
        editWidget($('#textarea'), 1); // Only one widget should be in edit mode, so we send a 1
    }
}

function getTextHtml(widget){
/** Returns: the html that is inputted into the widget
    widget: jquery wrapped widget */
    widget_html = widget.find('.text').html()
    if (widget_html === undefined){
        widget_html = '';
    }
    return widget_html;
    
}

function editWidget(element, n){
/** Edits the widget
    element: Some child of the widget, the edit button */
    if (n === undefined){
        n = 0;
    }
    // Runs only when there are no other widgets in edit mode
    if ($('#textarea').length == n){
        var widget = element.parent();

        widget.css('z-index', '99');
        //alert('hi')
        var widget_html = getTextHtml(widget); // Get the widget's html

        editWidgetHeight(widget, 3, 4); // Adjust height
        final_toolbar = configToolbar(widget); // configuration of the toolbar (stars, comp)

        // SWITCH FROM TEXT TO TEXTAREA
        widget.html(formatting + '<div id="textarea" >' + widget_html + '</div>' + final_toolbar);
        // Initializing Quill
        var editor = new Quill('#textarea', {
            modules: {
              'toolbar': { container: '#formatting-container' },
              'link-tooltip': true
            }
          });

        // Edit text area configs
        
        $('#textarea').height(((height + 1)*TEXT_HEIGHT));
        editor.focus();
        grid.disable($('#textarea').parent()); // No dragging a widget open for editing
        
        document.addEventListener("mousedown", outsideClickListener);
        document.addEventListener("keydown", enterKeyListener);
    }
}

function configToolbar(widget){
/** Sets up the toolbar for completed and starred widgets
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
    var textarea = widget.find('#textarea')
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
                grid.remove_widget($(this));
                grid.remove_empty_cells(col, 1, 1, 3);
            }
            else if (i > col){ // If greater than deleted col
                $(this).attr('data-col', i-1)
            }
        });
    }
    json = grid.serialize();
    for (i = 0; i < json.length; i++){
        if (json[i].col > col){
            json[i].col -= 1;
        }
    }

    backTitle();
    
    setTimeout(function(){ 
        storeData(json);
        getData();
    }, 250);
    
}


function storeData(json){
/** Stores data in local storage */

    if (json === undefined){
        s = grid.serialize();
    }
    else{
        s = json;
    }
    string = JSON.stringify(s);
    if (typeof(Storage) != "undefined") {
        localStorage.setItem("positions", string);
    }
    //alert(JSON.stringify(s))
    updateBar();
    storeTitles();
}



function storeTitles(){
/** Stores title data in local storage */
    t = $("form").serializeArray();
    localStorage.setItem("title_texts", JSON.stringify(t));
    setTimeout(function(){ 
        num = $('.title_input').length;
        localStorage.setItem("titles", num);
    }, 1);
}

function storeTitles2(){
/** Stores title data in local storage */
    num = $('.title_input').length;
    localStorage.setItem("titles", num - 1);
}

function getTitles(){
/** Returns the title data [null if there is no title data to be had] */

    num = localStorage.getItem("titles")
    if (num == null){
        num = 0;
    }
    return num;
    /*titles = JSON.parse(localStorage.getItem("titles"));
    $.each(titles, function (i, field){
        $('#title' + i).val(field.value)
        storeTitles();
    });*/
}

function deleteWidget(element){
/** Delete the widget 
    element: Some grand child of widget */
    grid.enable($('#textarea').parent()); // Make draggable again
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
    saveWidgetText($('#textarea'));
}


function saveOnReady(){
/** Saving the text on BLUR or ENTER */
    
    /*$('textarea').blur(function() {
        saveWidgetText($(this));
    });
    $('textarea').on( "keydown", function( event ) {
        if (event.which == 13){
            saveWidgetText($(this));
        }
    });*/
}

function outsideClickListener(){
/** Listens for a click outside of the textarea and it's children NEEDS FIX */
    if ($('#textarea').length > 0){
        if(!$(event.target).closest($('#textarea').parent()).length) {
            saveWidgetText($('#textarea'));
            document.removeEventListener("click", outsideClickListener);
        }    
    }
}

function enterKeyListener(){
/** Listens for an enter key press while the user is in edit mode */
    if ($('#textarea').length > 0){
        if (event.which == 13){
            saveWidgetText($('#textarea'));
            document.removeEventListener("keydown", enterKeyListener);
        }
    }
}

function saveWidgetText(textarea){
/** Sets widget value to textarea value */

    document.removeEventListener("click", outsideClickListener);
    document.removeEventListener("keydown", enterKeyListener);

    grid.enable($('#textarea').parent()); // Make draggable again

    if ($('.ql-editor').length > 0){
        value = $('.ql-editor').html().replace('<br>', '');
        index = value.indexOf('>');
        value = value.slice(index + 1);
        index = value.lastIndexOf('<');
        value = value.slice(0, index);
    }
    else{
        value = 0;
    }

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
        widget = textarea.parent();
        checkStatus(textarea);
        editWidgetHeight(widget, 2)
        widget.css('z-index', '2');
    }
    storeData();
}

function editWidgetHeight(widget, add, min){
/** Edit the height of the widget 
    widget: jQuery wrapped widget
    add: [int] units to add to the height of the widget
    min: [int: optional] minimum height */
    height = Math.round(widget.find('.text').height()/TEXT_HEIGHT) ; // Height of text box
    if (height < min){
        height = min;  // Default widget size
    }
    grid.resize_widget(widget, 1, height + add);
}

function getGridHeight(){
    height = $('#ul').height() + 50;
    if (height < 500){
        height = 500;
    }
}

function checkStatus(textarea){
/** Checks for status of the widget (comp, starred) and adds to text (s, stars)  
    textarea: child to widget */
    var comp = '';
    var star = '';
    if (textarea.parent().hasClass('comp')){
        comp = ' s';
    }
    if (textarea.parent().hasClass('starred')){
        star = ' stars';
    }
    $html = '<div class="text' + comp + star + '">' + value + '</div><div class="edit"></div>';
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