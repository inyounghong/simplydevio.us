<!DOCTYPE html>
<html>
<head>
    <title>Make Your Own Profile Directory for DeviantART | Simplydevio.us</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Profile Directory creator for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/form.css" media="screen" />
    
    <?php include '../includes/fonts.html' ?>
    
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscolor.js"></script>
    
   
    <link rel="icon" href="../images/new128.png" sizes="128x128">
    
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-45010841-2', 'simplydevio.us');
      ga('send', 'pageview');
    </script>

    <style>
    .columns:nth-of-type(2n){
        margin-left:-1%;
    }
    </style>

</head>
<body>
<?php include 'codes/directory_functions.php' ?>
<script type="text/javascript">
$(document).ready(function(){
    checkit();
});

function checkit()
{
    var css = '<style type="text/css">\n\n';
 
// HTML BUILDING
    var htmlstring = '<div class=\"columns\">\n';
    // Include an arrow on hover?
    if(document.getElementById('includeArrow').checked)
    {
        var arrow = ' <span>&#10152;</span>';
    }
    else{
        var arrow = '';
    }
    
    // Looping through the appropriate number of names and links 
    
    //  LEFT SIDE DIRECTORY BUTTONS
    var check = '';
    if (document.getElementById('singleColumn').checked){
        check = ' class="long" ';
    }
    
    for(var i = 0; i < $('#button_names').children().length - 1; i++)
    {   
        htmlstring += '<a href="' + example.butLink[i].value + '"' + check + '>' + example.butName[i].value + arrow + '</a>';
    }

    htmlstring += '</div>\n\n';
    htmlstring += '<div class="status">\n';
    // STATUS BUTTONS
    if (!document.getElementById('includeStatus').checked){
        document.getElementById('statusBox').className = "visible";
        document.getElementById('status_colors').className = "visible";
        for(var i = 0; i < example.butStatus.length; i++)
        {
            htmlstring += '<div class="col"><a href="' + example.butStatusLink[i].value + '">';
            htmlstring += example.butStatus[i].value + '</a>\n';
            htmlstring += '<div class="description">' + example.butDescription[i].value + '</div></div>';
        }
    }
    else{
        document.getElementById('statusBox').className = "hidden";
        document.getElementById('status_colors').className = "hidden";
    };
    
    htmlstring += '</div>';
    
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

    textstring += '.columns a:nth-of-type(2n){\n';
    textstring += 'margin-right:0;\n';
    textstring += '}\n\n';

    textstring += '.columns a{\n';
    textstring += 'display:inline-block;\n';
    textstring += 'margin-right: ' + value('sideMargin') + '%;\n';
    textstring += 'width: ' + (100 - value('sideMargin'))/2 + '%;\n\n';
    textstring += 'color: #' + value('buttonColor') + ';\n';
    textstring += 'background: #' + value('buttonBackground') + ';\n';
    textstring += '-webkit-border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += '-moz-border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += 'border-radius:' + value('buttonRadius') + 'px;\n';
    textstring += 'padding:' + value('buttonPadding') + 'px 0px;\n';
    textstring += 'margin-bottom:' + value('buttonMargin') + 'px;\n';
    if (checked('includeTransition')){
        textstring += 'transition:all 0.2s;}\n\n';
    }
    else{
        textstring += '}\n\n';
    }

    textstring += '.columns .long{\n';
    textstring += 'width:100%;}\n\n';

    textstring += '.columns a:hover{\n';
    textstring += 'color: #' + value('buttonHoverColor') + ';\n';
    textstring += 'background: #' + value('buttonHoverBackground') + ';}\n\n';
    
    textstring += '.columns a span{\n';
    textstring += 'display:none;\n';
    textstring += 'font-size:0.85em;}\n\n';
    
    textstring += '.columns a:hover span{display:inline;}\n\n';

    var status_margin = value('sideMargin');
    var num = example.butStatus.length;
    var statusWidth = (100 - ((num - 1) * status_margin)) / num;
    
    
    if (!checked('includeStatus')){
        height = parseInt(value('buttonSize')) + 15;
        textstring += '.status{padding-bottom:' + height + 'px;}\n\n';
    
        textstring += '.status .col{\n';
        textstring += 'text-align:center;\ndisplay:inline-block;\n';
        textstring += 'margin-right: ' + status_margin + '%;\n';
        textstring += 'width: ' + statusWidth + '%;}\n\n';
        
        textstring += '.col a{\n';
        textstring += 'display:block;';
        textstring += 'color: #' + value('statusColor') + '!important;\n';
        textstring += 'background: #' + value('statusBackground') + ';\n';
        textstring += '-webkit-border-radius:' + value('buttonRadius') + 'px;\n';
        textstring += '-moz-border-radius:' + value('buttonRadius') + 'px;\n';
        textstring += 'border-radius:' + value('buttonRadius') + 'px;\n';
        textstring += 'padding:' + value('buttonPadding') + 'px 0px;\n';
        if (checked('includeTransition')){
            textstring += 'transition:all 0.2s;}\n\n';
        }
        else{
            textstring += '}\n\n';
        }
        
        textstring += '.status .col a:hover{\n';
        textstring += 'color: #' + value('statusHoverColor') + '!important;\n';
        textstring += 'background: #' + value('statusHoverBackground') + ';}\n\n';

        textstring += '.status .col:last-of-type{\n';
        textstring += 'margin-right:0;}\n\n';
        
        textstring += '.status .description{\n';
        textstring += 'margin-top:8px;\nposition:absolute;\nwidth:100%;\nleft:0;\ndisplay:none;\n';
        textstring += 'color: #' + value('descriptionColor') + ';}\n\n';
        
        textstring += '.col:hover .description {display:block;}\n';
    }
    else{
        
    }
    
// CUSTOM BOX HTML BUILDING
    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += value('customBackground');
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    // Write textstring to the textarea.
    document.getElementById("button_size_range").innerHTML = value("buttonSize");
    document.getElementById("button_padding_range").innerHTML = value("buttonPadding");
    document.getElementById("button_margin_range").innerHTML = value("buttonMargin");
    document.getElementById("side_margin_range").innerHTML = value("sideMargin");
    document.getElementById("button_radius_range").innerHTML = value("buttonRadius");
    document.getElementById("top_margin_range").innerHTML = value("topMargin");
    document.getElementById("width_range").innerHTML = value("maxWidth");
    
    // document.forms['example'].output.value = textstring;
    
    if (value('password') == 'miontre') 
    {
        document.getElementById("cssArea").value = textstring;
        document.getElementById("htmlArea").value = htmlstring;
        document.getElementById("widgetArea").value = widgetstring;
        document.getElementById('message').innerHTML = '&#10004;';
    }
    else
    {
    }
        
    var complete_css = '<style>#preview_box a{font-weight:400;}';
    complete_css += textstring;
    complete_css += '.gr-box a{text-decoration:none;} .gr-box{padding: 20px 10px 40px;} .description{max-width:800px;}';
    complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
    complete_css += '.gr-box{background:url(\"' + value('customBackground') + '\") no-repeat;</style>';
    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
    complete_html += htmlstring;
    complete_html += '</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
    document.getElementById('preview_box').innerHTML = complete_css + complete_html;
}
</script>
    <?php include '../includes/menu1.html' ?>

<div class="section" id="resource">
    <div id="left">
        <div class="title">Profile Directory Creator</div>
        <div class="map"><a href="index.php">Resources</a> > Profile Creator</div>
    
            <!-- Start Journal Box Section -->
            <?php include 'includes/note.html' ?>
            <div class="cols lft">
            <form action="" id="profileDirectory" name="example" onchange="checkit()" onsubmit="checkit(); return false">
                <div class="tab_menu normal">
                    <div id="custom_box_link" class="tabby selected">Directory</div>
                    <div id="buttons_link" class="tabby not_selected">Colors</div>
                    <div id="button_name_link" class="tabby not_selected">Buttons</div>
                    <div id="status_link" class="tabby not_selected">Status</div>
                    <div id="buy_link" class="tabby not_selected">Purchase</div>
                </div>
                
                <div id="tab_one" class="tab_page visible">
                    
                    <div class="head">Background</div>
                    <div class="inputs">
                        <input name="" id="customBackground" placeholder="Image Source URL">
                        <div class="tooltip"><a href="http://www.simplydevio.us/resources/image_tutorial.php">?</a><div class="tool_info"><span>Click for a tutorial</span></div></div>
                    </div>
                    
                    <div class="head">Font Name</div>
                    <div class="inputs">
                        <input id="buttonFontFamily" value="Verdana">
                        <div class="tooltip">?<div class="tool_info"><span>Use a websafe font or Google Font here</span></div></div>
                    </div>
                    
                    <div class="head">Font Size</div>
                    <div class="inputs">
                        <input id="buttonSize" type="range" min="0" max="30" value="14">
                        <div class="range_label" id="button_size_range">14</div>
                    </div> 
                    
                    <div class="head">Position</div>
                    <div class="inputs">
                        <input id="topMargin" type="range" min="0" max="100" value="10">
                        <div class="range_label" id="top_margin_range">10</div>
                    </div> 
                    
                    <div class="head">Padding</div>
                    <div class="inputs">
                        <input id="buttonPadding" type="range" min="0" max="30" value="10">
                        <div class="range_label" id="button_padding_range">10</div>
                    </div> 
                    
                    <div class="head">Margin</div>
                    <div class="inputs">
                        <input id="buttonMargin" type="range" min="0" max="20" value="5">
                        <div class="range_label" id="button_margin_range">5</div>
                        <input id="sideMargin" type="range" min="0" max="3.0" value="1.0" step="0.1">
                        <div class="range_label" id="side_margin_range">5</div>
                    </div> 
                    
                    <div class="head">Roundness</div>
                    <div class="inputs">
                        <input id="buttonRadius" type="range" min="0" max="20" value="0">
                        <div class="range_label" id="button_radius_range">0</div>
                    </div> 

                    <div class="head">Width</div>
                    <div class="inputs">
                        <input id="maxWidth" type="range" min="0" max="500" value="500">
                        <div class="range_label" id="width_range">10</div>
                    </div> 
                    <div class="head"></div>
                    <div class="inputs">
                        <input type="checkbox" id="includeArrow"  class="check"> <label for="includeArrow">Include arrow (&#10152;) on hover</label><br>
                        <input type="checkbox" id="includeStatus" class="check"><label for="includeStatus"> Exclude Status Buttons</label><br>
                        <label><input type="checkbox" id="singleColumn"  class="check"> Single-Column Layout</label>
                    </div> 

                </div>
                
            
                <div id="tab_two" class="tab_page hidden">
                <table>
                    <tr>
                        <td colspan="5"><b>Normal Buttons</b></td>
                    </tr>
                    <tr>
                        <td style="width:110px;">Background</td>
                        <td>Normal</td>
                        <td><input id="buttonBackground" class="color" maxlength="6" value="5E4948"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverBackground" class="color" maxlength="6" value="9FCE54"></td>
                    </tr>
                    <tr>
                        <td>Text Color</td>
                        <td>Normal</td>
                        <td><input id="buttonColor" class="color" maxlength="6" value="FFFFFF"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverColor" class="color" maxlength="6" value="FFFFFF"></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                </table>
                <table id="status_colors">
                    <tr>
                        <td colspan="5"><b>Status Buttons</b></td>
                    </tr>
                    <tr>
                        <td style="width:110px;">Background</td>
                        <td>Normal</td>
                        <td><input id="statusBackground" class="color" maxlength="6" value="FFA53A"></td>
                        <td>Hover</td>
                        <td><input id="statusHoverBackground" class="color" maxlength="6" value="9FCE54"></td> 
                    </tr>
                    <tr>
                        <td>Text Color</td>
                        <td>Normal</td>
                        <td><input id="statusColor" class="color" maxlength="6" value="FFFFFF"></td>
                        <td>Hover</td>
                        <td><input id="statusHoverColor" class="color" maxlength="6" value="FFFFFF"> </td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td colspan="2"><input id="descriptionColor" class="color" maxlength="6" value="000000"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                </table>
                <input type="checkbox" id="includeTransition" class="check"><label for="includeTransition"> Include Transitions</label>
                
            </div>
                
                
            <div id="tab_three" class="tab_page hidden">
                <div id="button_names" class="w4">
                    <b>Button Name</b>
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                </div>

                <div id="button_urls" class="w8">
                    <b>URL or Widget URL</b>
                    <div class="tooltip"><a href="linking_widgets_tutorial.php" target="_blank">?</a><div class="tool_info"><span>Click for a tutorial on how to link widgets</span></div></div>
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                </div>
                <br>
                
                <div id="addLeft" class="add">Add Button</div><br>
                <div id="removeLeft" class="remove">Remove a Row</div>
            </div>
            <div id="tab_four" class="tab_page hidden">
                
                <div id="statusBox" class="visible">
                    
                    <div id="statusButtons">
                        <div id="statusNames" class="w4">
                            <b>Button Name</b>
                            <input class="name" name="butStatus" value="My Button">
                            <input class="name" name="butStatus" value="My Button">
                            <input class="name" name="butStatus" value="My Button">
                        </div>
                        <div id="statusLinks" class="w8">
                            <b>URL or Widget URL</b>
                            <div class="tooltip"><a href="linking_widgets_tutorial.php" target="_blank">?</a><div class="tool_info"><span>Click for a tutorial on how to link widgets</span></div></div>
                            <input class="url" name="butStatusLink" placeholder="http://">
                            <input class="url" name="butStatusLink" placeholder="http://">
                            <input class="url" name="butStatusLink" placeholder="http://">
                        </div>
                    </div>
                    <br>
                    <div id="statusDescriptions" class="w12">
                        <b>Button Descriptions</b>
                        <input name="butDescription" value="Digital Chibis and Pixel Icons (OPEN)">
                        <input name="butDescription" value="Digital Chibis and Pixel Icons (OPEN)">
                        <input name="butDescription" value="Digital Chibis and Pixel Icons (OPEN)">
                    </div>
                    
                    <div id="addStatus" class="add">Add Another Button</div><br>
                    <div id="removeStatus" class="remove">Remove a Button</div>
                
                </div> <!-- End of status Box -->
            </div>
            <div id="tab_five" class="tab_page hidden">
                To receive the codes needed to create your profile directory, please purchase the password and type it in below.
                <br>
                <input id="password" class="password" placeholder="Password">
                <div id="message"></div>
                <br>
                <a href="http://fav.me/d73p9tr" class="buy">Purchase Password</a>
            </div>
<script>
$("#addLeft").click(function(){
    $("#button_names").append('<input class="name" name="butName" value="My Button">');
    $("#button_urls").append('<input name="butLink" class="url" placeholder="http://">');
    checkit();

});
$("#removeLeft").click(function(){
    $("#button_names input:last").remove();
    $("#button_urls input:last").remove();
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
function toggle(){
    $("#custom_box_link").attr('class', 'tabby not_selected');
    $("#buttons_link").attr('class', 'tabby not_selected');
    $("#button_name_link").attr('class', 'tabby not_selected');
    $("#status_link").attr('class', 'tabby not_selected');
    $("#buy_link").attr('class', 'tabby not_selected');
    $(this).attr('class', 'tabby selected');
}
$("#custom_box_link").click(function(){
    $("#tab_one").attr('class', 'tab_page visible');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page hidden');
    $("#tab_four").attr('class', 'tab_page hidden');
    $("#tab_five").attr('class', 'tab_page hidden');
});
$("#buttons_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page visible');
    $("#tab_three").attr('class', 'tab_page hidden');
    $("#tab_four").attr('class', 'tab_page hidden');
    $("#tab_five").attr('class', 'tab_page hidden');
});
$("#button_name_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page visible');
    $("#tab_four").attr('class', 'tab_page hidden');
    $("#tab_five").attr('class', 'tab_page hidden');
});
$("#status_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page hidden');
    $("#tab_four").attr('class', 'tab_page visible');
    $("#tab_five").attr('class', 'tab_page hidden');
});
$("#buy_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page hidden');
    $("#tab_four").attr('class', 'tab_page hidden');
    $("#tab_five").attr('class', 'tab_page visible');
});
$("#custom_box_link").click(toggle);
$("#buttons_link").click(toggle);
$("#button_name_link").click(toggle);
$("#status_link").click(toggle);
$("#buy_link").click(toggle);
</script>
            </form>
        </div>
            <div class="cols rgt">
            <div class="right_preview_box">
                <div class="box_heading">Preview</div>
                <div id="preview_box"></div>
                <div class="notice">DeviantART has a max height of 350px, so anything below this line will be cut off!</div>
            </div>
            </div>
        
            
            <div class="cols lft">
                Need help using the codes below? Read this step-by-step <a href="http://www.simplydevio.us/resources/profile_tutorial.php" target="_blank">tutorial</a>.
                <br><br>
                <div class="codes">
                    <div class="ctab_menu">
                        <div id="ctab1" class="tabby selected">Widget</div>
                        <div id="ctab2" class="tabby not_selected">HTML</div>
                        <div id="ctab3" class="tabby not_selected">CSS</div>
                    </div>
                    <div id="cbox1" class="tab_page cpage visible">
                        <b>Widget Code</b>
                        <p>Paste into the text box of your Featured Deviation Widget</p>
                        <textarea id="widgetArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cbox2" class="tab_page cpage hidden">
                        <b>HTML Code</b>
                        <p>Paste into the text box of your journal in Sta.sh Writer</p>
                        <textarea id="htmlArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cbox3" class="tab_page cpage hidden">
                        <b>CSS Code</b>
                        <p>Paste into the main Skin CSS section of your journal</p>
                        <textarea id="cssArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                </div>
            </div>
            
            <br><br>
            </div>
        </td>
        
        </tr>
        </table>
        
        </div>
    </div>
<div class="section footer b">
    <div id="footer">&nbsp;</div>
</div>
<script>
// C Pages
function ctoggle(){
    $("#ctab1").attr('class', 'tabby not_selected');
    $("#ctab2").attr('class', 'tabby not_selected');
    $("#ctab3").attr('class', 'tabby not_selected');
    $(this).attr('class', 'tabby selected');
}
// Toggles box visibility
$("#ctab1").click(ctoggle);
$("#ctab2").click(ctoggle);
$("#ctab3").click(ctoggle);
function cbox_toggle(){
    $("#cbox1").attr('class', 'tab_page cpage hidden');
    $("#cbox2").attr('class', 'tab_page cpage hidden');
    $("#cbox3").attr('class', 'tab_page cpage hidden');
}
$("#ctab1").click(function(){
    cbox_toggle();
    $("#cbox1").attr('class', 'tab_page cpage visible');
});
$("#ctab2").click(function(){
    cbox_toggle();
    $("#cbox2").attr('class', 'tab_page cpage visible');
});
$("#ctab3").click(function(){
    cbox_toggle();
    $("#cbox3").attr('class', 'tab_page cpage visible');
});
</script>

<?php include '../includes/footer.html'; ?>

</body>
</html>