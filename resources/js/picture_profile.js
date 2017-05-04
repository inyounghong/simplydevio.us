


// Initial arrays
var img_src_array = ["http://img02.deviantart.net/fdcb/i/2015/146/6/d/the_great_story_by_m0thart-d8uueed.jpg", "http://img13.deviantart.net/a7e2/i/2015/149/f/b/shelter_for_a_moment_by_ildiko_neer-d8v6nds.jpg", "http://img04.deviantart.net/da33/i/2015/159/3/d/shanghai_evening_by_mrfarts-d8whox2.jpg", "http://orig08.deviantart.net/ce16/f/2015/157/9/c/9cf5af7669e37a8c6eda7d8597895fa9-d8wb98z.jpg", "http://img03.deviantart.net/fa13/i/2015/153/6/f/fineshrine_by_mylifethroughthelens-d8vt3xu.jpg", "http://orig10.deviantart.net/9592/f/2015/136/1/d/sunrise_by_nelleke-d8tjkbg.png"];
var img_zoom_array = [270, 330, 285, 250, 290, 250];
var img_pos_array = [35, 50, 100, 75, 50, 65];
var img_name_array = ["The Great Story", "Shelter for a Moment", "Shanghai Evening", "Banten - Java", "Fireshrine", "Sunrise"];

var old_rows = 0;
var old_cols = 0;

var button_number = 6;


$(document).ready(function(){

    // Update columns and rows
    old_rows = parseInt($("#rows").val());
    old_cols = parseInt($("#cols").val());

    $img_num = 0;
    $img_val = 0;

    

    for (var i = 1; i <=6; i++){
        add_button(i);
    }

    checkit();

    updateFontFamily();

    // Image Zoom
    $('.zoom').change(function(){
        $num = $(this).attr('data-num');
        $value = $(this).val();
        $("#image_src" + $num).attr("width", $value);
    });

    $("#include_text").change(function(){
        // Check whether to include text
        if (document.getElementById('include_text').checked){
            $('.button').each(function(){
                var i = $('.button').index($(this));
                $(this).prepend('<div class="button_name" id="button_name' + i + '"><div class="centering"></div>' + img_name_array[i] +'</div>');
            });
            $(".depends_include_text").show();
        }    
        else{
            // Remove all texts from preview
            $(".button_name").each(function(){
                $(this).remove();
            });
            $(".depends_include_text").hide();
        }
    })


    buttonUpdate();

});

// Update button
function buttonUpdate(){
    $('.name').keyup(function(){
        $num = $(this).index();
        $name = $(this).val();
        $('#button_name' + $num).text($name);
    });

    $('.url').change(function(){
        $num = $('.url').index($(this)) + 1;
        $value = $(this).val();
        $('#image_src' + $num).attr("src", $value);
    });

    $('.link').change(function(){
        $num = $(this).index() - 1;
        console.log($num);
        $value = $(this).val();
        $('#button' + $num).attr("href", $value);
    });

    $(".url").click(function(){
        $(".image_wrap").slideUp(200);
        $(this).next().slideDown(200);
    });
}

// Creating a button
function add_button(i){
    var button = document.createElement("a");
    button.className = "button";
    button.id = "button" + i;
    button.setAttribute("data-num", i);

    var img_src = "src";
    var img_zoom = 200;
    var img_pos = 20;
    var img_name = "My Button";
    var img_pos_left = 10;

    if (i <= button_number){
        img_src = img_src_array[i-1];
        img_zoom = img_zoom_array[i-1];
        img_pos = img_pos_array[i-1];
        img_name = img_name_array[i-1];
    }

    // Add live buttons
    $('.columns').append(button);

    $("#button" + i).append('<div class="button_name" id="button_name' + i + '""><div class="centering"></div>' + img_name +'</div>');
    $('#button' + i).append('<img id="image_src' + i + '" src="' + img_src + '" class="img' + i + '" width="' + img_zoom + '">');

    // Add inputs for button name and link url
    $("#button_names").append('<input class="name" name="name" value="' + img_name +'">');
    $("#button_urls").append('<input class="link" name="link" placeholder="http://">');

    // Add inputs for images
    $("#button_images").append('<input class="url" name="url" data-num="' + i + '" value="' + img_src + '" placeholder="Image URL"><div class="image_wrap"> <input id="zoom' + i + '" class="zoom" data-num="' + i + '" type="range" min="100" max="500" value="' + img_zoom + '"> <div class="range_label"></div><div class="col2"><input id="img_pos_top' + i + '" class="img_pos_top" data-num="' + i + '" type="range" min="0" max="200" value="' + img_pos + '"><div class="range_label"></div></div><div class="col2"><input id="img_pos_left' + i + '" class="img_pos_left" data-num="' + i + '" type="range" min="0" max="200" value="' + img_pos_left + '"><div class="range_label"></div></div></div>');

}

// Console.log shortcut
function l(text){
    console.log(text);
}

// Removes the last button
function remove_button(){
    $('.columns .button:last').remove();
    $('#button_names input:last').remove();
    $('#button_urls input:last').remove();
    $('#button_images .image_wrap:last').remove();
    $('#button_images input:last').remove();
    
}

// Changes max zoom values depending on cols
function change_maxes(cols){
    if(cols == 2){
        change_zoom(400);
    }
    else if(cols == 3){
        change_zoom(300);
    }
    else if(cols > 3){
        change_zoom(200);
    }
}

// Changes max zoom value for all zoom inputs
function change_zoom(val){
    $(".zoom").each(function(){
        $(this).attr("max", val);
        l("change");
    });
}

// Reconfigures cols and rows based on new settings
function reconfigure_cols(cols, rows){

    var old = old_rows * old_cols;

    // Add buttons
    if (cols * rows > old){
        for (var i = old + 1; i <= cols*rows; i++){
            add_button(i);
        }
        $(".url").unbind( "click" );
        buttonUpdate();
    }
    // Remove buttons
    else if (cols * rows < old){
        for (var i = 0; i < (old - (cols*rows)); i++){
            remove_button();
        }
    }

    // Update old values
    old_rows = rows;
    old_cols = cols;

}

// Color conversion

function hexToRgb(hex) {
    var bigint = parseInt(hex, 16);
    var r = (bigint >> 16) & 255;
    var g = (bigint >> 8) & 255;
    var b = bigint & 255;

    return r + "," + g + "," + b;
}

// Checks all form inputs and updates live display
function checkit()
{
    var css = '<style type="text/css">;\n\n';

    // Check button number
    var cols = parseInt($("#cols").val());
    var rows = parseInt($("#rows").val());

    // If the rows/cols have changed, reconfigure
    if (cols != old_cols || rows != old_rows){
        reconfigure_cols(cols, rows);
        change_maxes(cols);
    }





    // Initialize transition types
    var transition_type = $("#transition_type").val();


    var initial_radius = $("#buttonRadius").val();
    var final_radius = $("#buttonRadius").val();
    var slide_transition = "";

    var zoom_css = "1.0";

    // If not a sliding transition
    if(transition_type.indexOf("slide") == -1){
        $("#slide_display").hide();
        $("#zoom_display").hide();

        // Is a zooming transition
        if(transition_type.indexOf("zoom") != -1){
            $("#zoom_display").show();
            zoom_css = "0.8";
            if(transition_type == "zoom_in"){
                zoom_css = "1.2";
            }

        }

        else if(transition_type == "round_in"){
            console.log('here');
            initial_radius = 0;
            if (final_radius == 0){
                final_radius = 20;
                $("#buttonRadius").val(20);
            }
        }
        else { // round-out
            final_radius = 0;
            if (initial_radius == 0){
                final_radius = 20;
                $("#buttonRadius").val(20);
            }
        }
        slide_transition = "";
    }
    else{
        $("#slide_display").show();
    }
    
    var vertical_padding = value('padding');
    var button_height_css = "";
    if (document.getElementById('fill_text').checked){
        vertical_padding = 0;
        button_height_css = "height: 100%;\n";
        document.getElementById('show_text_hover').checked = true;
    }
    
    
// DONE WITH HTML BUILDING
// CSS BUILDING
    var textstring = '*{background:none; border:none; padding:0; margin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += '.gr-top, .bottom, a.external:after {display:none;}\n';
    textstring += '.gr-box br{display:none;}\n';
    textstring += 'a{text-decoration:none; font-weight:normal;}\n';
    textstring += '.external{display:block;}\n\n';
    
    textstring += '.gr-box{\n';
    textstring += 'z-index:99!important;\n'
    textstring += 'line-height:1.1em!important;\n'
    textstring += 'font-family:' + value('buttonFontFamily') + ';\n';
    textstring += 'text-align:center;\n';
    textstring += 'font-size:' + value('buttonSize') + 'px;}\n\n';
    
    var top = value('topMargin');
    
    textstring += '.text{\n';
    textstring += 'max-width:' + value('maxWidth') + 'px;\n';
    textstring += 'margin:' + top + 'px auto 0;}\n\n';

    textstring += '.button:nth-of-type(' +  cols + 'n){\n';
    textstring += 'margin-right:0;\n';
    textstring += '}\n\n';

    textstring += '.button{\n';
    textstring += 'position: relative;\n';
    textstring += 'display:inline-block;\n';
    textstring += 'overflow: hidden;\n';
    textstring += 'z-index: 99;\n';
    textstring += 'margin-right: ' + value('sideMargin') + '%;\n';
    textstring += 'width: ' + (100 - cols*value('sideMargin'))/cols + '%;\n\n';
    textstring += 'color: #' + value('buttonColor') + '!important;\n';
    textstring += '-webkit-border-radius:' + initial_radius + 'px;\n';
    textstring += '-moz-border-radius:' + initial_radius + 'px;\n';
    textstring += 'border-radius:' + initial_radius + 'px;\n';
    textstring += 'height:' + value('buttonHeight') + 'px;\n';
    textstring += 'margin-bottom:' + value('buttonMargin') + 'px;\n';
    textstring += 'transition:all ' + value('transition_speed') + 's;\n';
    textstring += '}\n\n';


    textstring += '.button .long{\n';
    textstring += 'width:100%;}\n\n';

    textstring += '.button:hover{\n';
    textstring += '-webkit-border-radius:' + final_radius + 'px;\n';
    textstring += '-moz-border-radius:' + final_radius + 'px;\n';
    textstring += 'border-radius:' + final_radius + 'px;\n';
    textstring += '}\n\n';

    
    textstring += '.button img{\n';
    textstring += 'max-width: 500px;\n';
    textstring += 'transition:all ' + value('transition_speed') + 's;\n';
    textstring += '}\n\n';

    textstring += ".button:hover img{\n";
    textstring += "transform: scale(" + zoom_css + ");\n";
    textstring += "}\n";

    textstring += '.button_name{\n';
    textstring += 'position: absolute;\n';
    textstring += 'background: rgba(' + hexToRgb($("#text_background_color").val()) + ', ' + $("#text_background_opacity").val() + ');\n';
    textstring += 'padding: ' + vertical_padding + 'px ' + value('padding2') + '%;\n';
    textstring += 'transition: opacity 0.2s;\n';
    textstring += 'width: ' + (100 - (2 * value('padding2')))+ '%;\n';
    textstring += 'bottom: 0px;\n';
    textstring += 'z-index: 99;\n';
    textstring += button_height_css;

    if (document.getElementById("show_text_hover").checked){
        textstring += 'opacity: 0;\n';
    }

    textstring += '}\n\n';

    textstring += '.button:hover .button_name{\n';
    textstring += 'opacity: 1;\n';
    textstring += '}\n\n';

    textstring += '.centering {\n'
    textstring += 'display: inline-block;\n'
    textstring += 'height: 100%;\n'
    textstring += 'vertical-align: middle;\n'
    textstring += 'width: 1px;\n'
    textstring += '}\n'

    // Update all image margin-top

    $('.img_pos_top').each(function(){
        $img_num = $('.img_pos_top').index($(this)) + 1;
        $img_val = parseInt($(this).val());

        var slide_top = 0;
        var slide_left = 0;

        if(transition_type.indexOf("slide") != -1){

            var slide = $("#slide").val();
            console.log(slide);

            if(transition_type == "slide_up"){ 
                slide_top = -1 * slide;
            }
            else if(transition_type == "slide_down"){ 
                slide_top = slide;
            }
            else if(transition_type == "slide_right"){ 
                slide_left = slide;
            }
            else if(transition_type == "slide_left"){ 
                slide_left = -1 * slide;
            }

        }

        var add_slide_top = parseInt($img_val) + parseInt(slide_top);

        textstring += ".img" + $img_num + " { margin-top: " + (-1*$img_val) + "px;} \n";
        textstring += ".button:hover .img" + $img_num + " { margin-top: -" + add_slide_top + "px; margin-left: " + slide_left + "px;} \n";
    });
   
    
    // CUSTOM BOX HTML BUILDING
    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += value('customBackground');
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    updateRangeLabels();
    

    if (value('password') == 'miontre') 
    {
        document.getElementById("cssArea").value = textstring;
        //document.getElementById("htmlArea").value = htmlstring;
        document.getElementById("widgetArea").value = widgetstring;
        document.getElementById('message').innerHTML = '&#10004;';
    }
    else
    {
    }
        
    var complete_css = '<style>@import url(http://fonts.googleapis.com/css?family=Indie+Flower); #preview_box a{font-weight:400;}';
    complete_css += textstring;
    complete_css += '.gr-box a{text-decoration:none;} .gr-box{padding: 20px 10px 40px;} .description{max-width:800px;}';
    complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
    complete_css += '.gr-box{background:url(\"' + value('customBackground') + '\") no-repeat;</style>';

    $('#styling').html("");
    $('#styling').prepend(complete_css);
}