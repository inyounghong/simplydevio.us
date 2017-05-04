$(document).ready(function(){
    checkit();

    $("#addLeft").click(function(){
        $("#button_names").append('<input class="name" name="butName" value="My Button">');
        $("#button_urls").append('<input name="butLink" class="url" placeholder="http://">');
        var button_number = $("#button_long .long").length;
        $("#button_long").append('<input type="checkbox" class="check long" id="long' + button_number + '">');
        checkit();
    });

    $("#removeLeft").click(function(){
        $("#button_names input:last").remove();
        $("#button_urls input:last").remove();
         $("#button_long .check:last").remove();
        checkit();
    });

    $("#removeStatus").click(function(){
        $("#statusNames input:last").remove();
        $("#statusLinks input:last").remove();
        $("#statusDescriptions input:last").remove();
        checkit();
    });

    $("#addStatus").click(function(){
        $("#statusNames").append('<input class="name" name="butStatus" value="My Button">');
        $("#statusLinks").append('<input class="url" name="butStatusLink" placeholder="http://">');
        $("#statusDescriptions").append('<input name="butDescription" value="Digital Chibis and Pixel Icons (OPEN)">');
        checkit();
    });
});

function checkit()
{
    updateFontFamily();

    var css = '<style type="text/css">\n\n';
 
// HTML BUILDING
    var htmlstring = '';

    // Include an arrow on hover?
    var arrow = '';
    if(document.getElementById('includeArrow').checked) arrow = ' <span>&#10152;</span>';
    
    // Looping through the appropriate number of names and links 
    
    //  LEFT SIDE DIRECTORY BUTTONS
    var check = '';
    console.log("hello");
    for(var i = 0; i < $('#button_names').children().length - 1; i++)
    {   
        var link = "";
        var name = "";
        try {
            link = example.butLink[i].value;
            name = example.butName[i].value;
            
        } catch(err) {
            
            link = example.butLink.value;
            name = example.butName.value;
        }
        

        long_class = '';
        if (document.getElementById('long' + i).checked){
            long_class = ' long';
        }
        htmlstring += '<a class="button' + long_class + '" href="' + link + '"' + check + '>' + name + arrow + '</a>';
    }

    htmlstring += '</div>\n\n';
    htmlstring += '<div class="status">\n';
    // STATUS BUTTONS
    if (!document.getElementById('includeStatus').checked){
        document.getElementById('statusBox').className = "visible";
        document.getElementById('status_colors').className = "visible";
        for(var i = 0; i < example.butStatus.length; i++)
        {
            htmlstring += '<div class="col"><a class="button" href="' + example.butStatusLink[i].value + '">';
            htmlstring += example.butStatus[i].value + '</a>\n';
            htmlstring += '<div class="description">' + example.butDescription[i].value + '</div></div>';
        }
    }
    else{
        document.getElementById('statusBox').className = "hidden";
        document.getElementById('status_colors').className = "hidden";
    };
    
    
// DONE WITH HTML BUILDING
// CSS BUILDING
    var num_cols = $("#num_cols").val();

    // Set font-styles
    var italic = "normal";
    var bold = "400";
    var letter_spacing = "0";
    if (document.getElementById('italic').checked){
        italic = "italic";
    }
    if (document.getElementById('bold').checked){
        bold = "bold";
    }
    if (document.getElementById('letter_spacing').checked){
        letter_spacing = "1px";
    }

    var status_italic = "normal";
    var status_bold = "400";
    var status_letter_spacing = "0";
    if (document.getElementById('status_italic').checked){
        status_italic = "italic";
    }
    if (document.getElementById('status_bold').checked){
        status_bold = "bold";
    }
    if (document.getElementById('status_letter_spacing').checked){
        status_letter_spacing = "1px";
    }

    var textstring = '';

    textstring += '/* Clean Up */\n';
    textstring += '*{background:none; border:none; padding:0; margin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += '.gr-top, .bottom, a.external:after {display:none;}\n';
    textstring += '.gr-box br{display:none;}\n';
    textstring += 'a{text-decoration:none; font-weight:normal;}\n';
    textstring += '.external{display:block;}\n\n';
    
    textstring += '/* Journal Box */\n';
    textstring += '.gr-box{\n';
    textstring += 'z-index:99!important;\n'
    textstring += 'line-height:1.1em!important;\n'
    textstring += 'font-family:' + value('buttonFontFamily') + ';\n';
    textstring += 'text-align:center;\n';
    textstring += 'font-size:' + value('buttonSize') + 'px;\n';
    textstring += '}\n\n';
    
    var top = value('topMargin');

    textstring += '.gr-body{\n';
    textstring += 'max-width:' + value('maxWidth') + 'px;\n';
    textstring += 'margin:' + top + 'px auto 0\n';
    textstring += '}\n\n';
    
    textstring += '/* Main Buttons */\n';
    textstring += '.button{\n';
    textstring += 'display:inline-block;\n';
    textstring += 'margin-right: ' + value('sideMargin') + '%;\n';
    textstring += 'margin-bottom: ' + $('#buttonMargin').val() + 'px;\n';
    textstring += 'width: ' + ((100 - (value('sideMargin') * num_cols) )/num_cols)+ '%;\n';
    textstring += 'color: #' + value('buttonColor') + '!important;\n';
    textstring += 'background: #' + value('buttonBackground') + ';\n';
    textstring += '-webkit-border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += '-moz-border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += 'border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += 'padding:' + value('buttonPadding') + 'px 0px;\n';
    textstring += 'font-style: ' + italic + ';\n';
    textstring += 'font-weight: ' + bold + '!important;\n';
    textstring += 'letter-spacing: ' + letter_spacing + ';\n';
    if (checked('includeTransition')){
        textstring += 'transition:all 0.2s;\n';
    }
    textstring += '}\n\n';


    textstring += '.long{\n';
    textstring += 'width: ' + (100 - value('sideMargin') ) + '%;\n';
    textstring += '}\n\n';

    textstring += '.button:hover{\n';
    textstring += 'color: #' + value('buttonHoverColor') + '!important;\n';
    textstring += 'background: #' + value('buttonHoverBackground') + ';\n';
    textstring += '}\n\n';
    
    textstring += '/* Button Arrows */\n';
    textstring += '.button span{\n';
    textstring += 'display:none;\n';
    textstring += 'font-size:0.85em;\n';
    textstring += '}\n\n';
    
    textstring += '.button:hover span{display:inline;}\n\n';

    var status_margin = value('sideMargin');
    var num = example.butStatus.length;
    var statusWidth = (100 - ((num * status_margin))) / num;
    
    
    if (!checked('includeStatus')){
        height = parseInt(value('buttonSize')) + 15;
        textstring += '/* Status Buttons */\n';
        textstring += '.status{padding-bottom:' + height + 'px;}\n\n';
    
        textstring += '.status .col{\n';
        textstring += 'text-align:center;\ndisplay:inline-block;\n';
        textstring += 'margin-right: ' + status_margin + '%;\n';
        textstring += 'width: ' + statusWidth + '%;\n';
        textstring += '}\n\n';
        
        textstring += '.col a{\n';
        textstring += 'display:block;';
        textstring += 'color: #' + value('statusColor') + '!important;\n';
        textstring += 'background: #' + value('statusBackground') + ';\n';
        textstring += 'width: 100%;\n';
        textstring += '}\n\n';
        
        textstring += '.status .col a:hover{\n';
        textstring += 'color: #' + value('statusHoverColor') + '!important;\n';
        textstring += 'background: #' + value('statusHoverBackground') + ';\n';
        textstring += '}\n\n';

        textstring += '/* Status Description */\n';
        textstring += '.status .description{\n';
        textstring += 'position:absolute;\nwidth:100%;\nleft:0;\ndisplay:none;\n';
        textstring += 'font-style: ' + status_italic + ';\n';
        textstring += 'font-weight: ' + status_bold + '!important;\n';
        textstring += 'letter-spacing: ' + status_letter_spacing + ';\n';
        textstring += 'font-size: ' + $("#status_font_size").val() + 'px;\n';
        textstring += 'color: #' + value('descriptionColor') + ';\n';
        textstring += '}\n\n';
        
        textstring += '.col:hover .description {display:block;}\n';
    }
    else{
        
    }
    
// CUSTOM BOX HTML BUILDING
    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += value('customBackground');
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    updateRangeLabels();
    
    // document.forms['example'].output.value = textstring;
    
    if (value('password') == 'miontre') 
    {
        document.getElementById("cssArea").value = textstring;
        document.getElementById("htmlArea").value = htmlstring;
        document.getElementById("widgetArea").value = widgetstring;
        document.getElementById('message').innerHTML = '&#10004;';
    }
        
    var complete_css = '<style>#preview_box a{font-weight:400;}';
    complete_css += textstring;
    complete_css += '.gr-box a{text-decoration:none;} .gr-box{padding: 20px 10px 40px;} .description{max-width:800px;}';
    complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
    complete_css += '.gr-box{background:url(\"' + value('customBackground') + '\") no-repeat;</style>';
    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="gr-body"><div class="text">';
    complete_html += htmlstring;
    complete_html += '</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
    document.getElementById('preview_box').innerHTML = complete_css + complete_html;
}