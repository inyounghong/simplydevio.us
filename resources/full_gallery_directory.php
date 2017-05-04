<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="A CSS creator for making DeviantART gallery directories. Decorate your profile with your own fullsize gallery directory.">
    <meta name="keywords" content="deviantart, simplydevious, simplysilent, profile, gallery, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscolor.js"></script>
    <title>Full-Size Gallery Directory Creator</title>
    <link rel="icon" href="../images/new128.png" sizes="128x128">
    
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-45010841-2', 'simplydevio.us');
      ga('send', 'pageview');
    </script>
</head>
<body>
    <style>
    .gr-box{
        line-height:1.1em!important;
    }
    </style>
<script type="text/javascript">
$(document).ready(function(){
    checkit();
});
function checkit()
{
    var css = '<style type="text/css">\n\n';
    
 
// HTML BUILDING
    var htmlstring = '<div class=\"right\">\n\n';
    
    // Counting buttons
    
    for(var i = 0; i <= example.butName.length; i++){
        var buttonNumber = i;
    }
    // Sizes
    
    var size = parseFloat(document.getElementById('buttonSize').value);
    var margin = parseFloat(document.getElementById('buttonMargin').value);
    var padding = parseFloat(document.getElementById('buttonPadding').value) * 2;
    
    // Determining the height of the directory and the image
    
    var blankHeight = ((size + margin + padding + 2) * buttonNumber) - 1;
    var imageURLs = [];
    var imageLinks = [];
    var imageZooms = [];
    for(var i = 0; i < example.butName.length; i++)
    {
        imageURLs.push(example.imgURL[i].value);
        imageLinks.push(example.imgLink[i].value);
        imageZooms.push(example.imageZoom[i].value);
    }
     
    //  DIRECTORY BUTTONS
    
    for(var i = 0; i < example.butName.length; i++)
    {
        if(i == 0)
        {
            htmlstring += '<div class=\"wrap main\">';
        }
        else
        {
            htmlstring += '<div class=\"wrap\">';
        }
        htmlstring += '<a class=\"button\" href=\"' + example.butLink[i].value + '">';
        htmlstring += example.butName[i].value + '</a>';
        htmlstring += '<a href="' + imageLinks[i] + '" class="image">';
        htmlstring += '<img src="' + imageURLs[i] + '" width="' + imageZooms[i] + '"></a></div>\n\n';
    }
    
    htmlstring += '</div>';
    
// DONE WITH HTML BUILDING
// CSS BUILDING
    var textstring = '*{background:none; border:none; padding:0; margin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += '.gr-top, .bottom, a.external:after, .right br {display:none;}\n';
    textstring += 'a{text-decoration:none; font-weight:normal;}\n';
    textstring += '.external{display:block;}\n\n';
    
    textstring += '.gr-box{\n';
    textstring += 'z-index:99!important;\n';
    textstring += 'line-height:1.2em;\n';
    textstring += 'font-family:' + document.getElementById('buttonFontFamily').value + ';\n';
    textstring += 'font-size:' + document.getElementById('buttonSize').value + 'px;}\n\n';
    
    var top = document.getElementById('topMargin').value;
    textstring += '.text{\n';
    textstring += 'position:relative;\n';
    textstring += 'max-width:550px;\n';
    textstring += 'overflow:hidden;\n';
    textstring += 'margin:' + top + 'px auto;}\n\n';
    
    if (document.getElementById('buttonSide').checked)
    { 
        textstring += '.right{margin-left:65%;}\n';
        textstring += '.image{left:0;}\n';    
    }
    else
    {
        textstring += '.image{left:35%;}\n';
        textstring += '';}
    textstring += '.wrap{right:0;}\n\n';
    
    textstring += '.image{\n';
    textstring += 'display:none;\n'
    textstring += 'position:absolute;\n';
    textstring += 'top:0;\n';
        if (document.getElementById('includeShadow').checked){ textstring += 'box-shadow:0 0 20px #' + document.getElementById('shadow').value + ';\n';}
        else{ textstring += '';}
    textstring += 'background:#' + document.getElementById('imageBackground').value + ';\n';
    textstring += 'overflow:hidden;\n';
    textstring += 'height:' + blankHeight + 'px;\n';
    textstring += 'width:65%;\n';
    textstring += 'z-index:11;}\n\n';
    textstring += '.main .image{display:inline-block;}\n';
    textstring += '.image:after{\n';
    textstring += 'content:url(\'http://www.simplydevio.us/images/wsearch.png\');\n';
    textstring += 'height:32px;\n';
    textstring += 'width:32px;\n';
    textstring += 'position:absolute;\n';
    textstring += 'top:50%;\n';
    textstring += 'left:50%;\n';
    textstring += 'margin-left:-16px;\n';
    textstring += 'margin-top:-16px;\n';
    textstring += 'opacity:0;\n';
    textstring += 'transition:all .2s;}\n\n';
    textstring += '.image:hover:after{opacity:1;}\n';
    textstring += '.image:hover img{opacity:0.3;}\n\n';
    
    textstring += 'img{\n';
    textstring += 'position:relative;\n';
    textstring += 'max-width:750px!important;\n';
    textstring += 'max-height:750px;\n';
    textstring += 'display:inline;\n';
    textstring += 'transition:all 0.2s;}\n\n';
    textstring += '.wrap:hover .image{display:inline-block;}\n\n';
    textstring += '.button{\n';
    textstring += 'display:block;\n';
    textstring += 'color: #' + document.getElementById('buttonColor').value + '!important;\n';
    textstring += 'background: #' + document.getElementById('buttonBackground').value + ';\n';
    textstring += 'padding:' + document.getElementById('buttonPadding').value + 'px 0px ' + document.getElementById('buttonPadding').value + 'px 20px;\n';
    textstring += 'margin-bottom:' + document.getElementById('buttonMargin').value + 'px;\n';
    textstring += 'position:relative;\n';
        if (document.getElementById('includeTransition').checked)
        {
            textstring += 'transition:all 0.2s;}\n\n';
        }
        else
        {
            textstring += '}\n\n';
        }
    textstring += '.main .button{\n';
    textstring += 'background: #' + document.getElementById('buttonBackgroundGal').value + ';\n';
    textstring += 'color: #' + document.getElementById('buttonColorGal').value + '!important;}\n\n';
    
    textstring += '.button:hover{\n';
    textstring += 'color: #' + document.getElementById('buttonHoverColor').value + '!important;\n';
    textstring += 'background: #' + document.getElementById('buttonHoverBackground').value + ';\n';
    textstring += 'padding-left:30px;\n';
    textstring += 'font-weight:700;}\n\n';
    textstring += '.main .button:hover{\n';
    textstring += 'background: #' + document.getElementById('buttonHoverBackgroundGal').value + '!important;\n';
    textstring += 'color: #' + document.getElementById('buttonHoverColorGal').value + '!important;}\n\n';
    
    textstring += '.button:hover span{display:inline;}\n\n';
// CUSTOM BOX HTML BUILDING
    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += document.getElementById('customBackground').value;
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    
    
    // Write textstring to the textarea.
    document.getElementById("button_size_range").innerHTML = document.getElementById("buttonSize").value;
    document.getElementById("button_padding_range").innerHTML = document.getElementById("buttonPadding").value;
    document.getElementById("button_margin_range").innerHTML = document.getElementById("buttonMargin").value;
    document.getElementById("top_margin_range").innerHTML = document.getElementById("topMargin").value;
    
    // document.forms['example'].output.value = textstring;
    
    if (document.getElementById('password').value == 'oomoo') 
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
    complete_css += '.gr-box a{text-decoration:none;} .gr-box{ max-width:800px; padding: 20px 10px;} .description{max-width:800px;}';
    complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
    complete_css += '.gr-box{background:url(\"' + document.getElementById('customBackground').value + '\") no-repeat;</style>';
    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
    complete_html += htmlstring;
    complete_html += '</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
    document.getElementById('preview_box').innerHTML = complete_css + complete_html;
}
</script>
    <?php include '../includes/menu1.html' ?>
<div class="section" id="resource">
    <div id="left">
        
        <div class="title">Fullsize Gallery Directory Creator</div>
        <div class="map"><a href="index.php">Resources</a> > Gallery Creator</div>
    
            <?php include 'includes/note.html' ?>
            <div class="cols lft">
            <form action="" id="profileDirectory" name="example" onsubmit="checkit(); return false">
                <div class="tab_menu">
                    <div id="tab1" class="tabby selected">Directory</div>
                    <div id="tab2" class="tabby not_selected">Colors</div>
                    <div id="tab3" class="tabby not_selected">Buttons</div>
                    <div id="tab4" class="tabby not_selected">Images</div>
                    <div id="tab5" class="tabby not_selected">Purchase</div>
                </div>
                <div id="box1" class="tab_page visible">
                    <table>
                        <tr>
                            <td class="w25"><b>Background </b></td>
                            <td class="lg"><input name="" id="customBackground" placeholder="Image Source URL" onchange="checkit()"><div class="tooltip"><a href="image_tutorial.php">?</a><div class="tool_info"><span>Click for a tutorial</span></div></div></td>
                        </tr>
                        <tr>
                            <td><b>Font Name</b></td>
                            <td colspan="4"><input id="buttonFontFamily" value="Verdana" onchange="checkit()"><a title="Use a Web Safe Font or Google Font here" class="tooltip">[?]</a></td>
                        </tr>   
                        <tr>
                            <td><b>Font Size</b></td>
                            <td><input id="buttonSize" type="range" min="0" max="30" value="14" onchange="checkit()"><span class="range_label" id="button_size_range">14</span></td>
                        </tr>   
                        <tr>
                            <td><b>Position</b></td>
                            <td><input id="topMargin" type="range" min="0" max="100" value="10" onchange="checkit()"><span class="range_label" id="top_margin_range">10</span></td>
                        </tr>
                        <tr>
                            <td><b>Padding</b></td>
                            <td colspan="4"><input id="buttonPadding" type="range" min="0" max="30" value="15" onchange="checkit()"><span class="range_label" id="button_padding_range">10</span></td>
                        </tr>
                        <tr>
                            <td><b>Margin</b></td>
                            <td colspan="4"><input id="buttonMargin" type="range" min="0" max="20" value="1" onchange="checkit()"><span class="range_label" id="button_margin_range">5</span></td>
                        </tr>
                    </table>
                    <br>
                    <input type="checkbox" id="buttonSide" class="check" onchange="checkit()" checked><label for="buttonSide">Right-side Buttons</label><br>
                    <input type="checkbox" id="includeTransition" class="check" onchange="checkit()" checked><label for="includeTransition">Include Transitions</label>&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="includeShadow" class="check" onchange="checkit()" checked><label for="includeShadow">Include Shadow</label> 
                    <input id="shadow" class="color" maxlength="6" value="222222" onchange="checkit()">
                </div>
                
            
                <div id="box2" class="tab_page hidden">
                <table>
                    <tr>
                        <td colspan="5"><b>Gallery Button </b></td>
                    </tr>
                    <tr>
                        <td style="width:110px;">Background</td>
                        <td>Normal</td>
                        <td><input id="buttonBackgroundGal" class="color" maxlength="6" value="9FCE54" onchange="checkit()"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverBackgroundGal" class="color" maxlength="6" value="e03e56" onchange="checkit()"></td>
                    </tr>
                    <tr>
                        <td>Text</td>
                        <td>Normal</td>
                        <td><input id="buttonColorGal" class="color" maxlength="6" value="FFFFFF" onchange="checkit()"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverColorGal" class="color" maxlength="6" value="FFFFFF" onchange="checkit()"></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td colspan="5"><b>Regular Buttons </b></td>
                    </tr>
                    <tr>
                        <td style="width:110px;">Background</td>
                        <td>Normal</td>
                        <td><input id="buttonBackground" class="color" maxlength="6" value="5E4948" onchange="checkit()"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverBackground" class="color" maxlength="6" value="e03e56" onchange="checkit()"></td>
                    </tr>
                    <tr>
                        <td>Text</td>
                        <td>Normal</td>
                        <td><input id="buttonColor" class="color" maxlength="6" value="FFFFFF" onchange="checkit()"></td>
                        <td>Hover</td>
                        <td><input id="buttonHoverColor" class="color" maxlength="6" value="FFFFFF" onchange="checkit()"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><h2>Image</h2></td>
                        <td><input id="imageBackground" class="color" maxlength="6" value="e03e56" onchange="checkit()"></td>
                    </tr>
                </table>
                <br>
            
                
            </div>
                
            <!-- BUTTONS TAB -->
            <div id="box3" class="tab_page hidden">
                <div id="leftButtons">
                    <?php
                        $i = 0;
                        while($i < 5)
                        {
                            echo 
                            '<table class="aButton">
                                <tr>
                                    <td class="w35"><input class="name" name="butName" value="My Gallery" onchange="checkit()"> </td>
                                    <td class="full"><input name="butLink" class="url" placeholder="URL of Gallery Folder" onchange="checkit()"></td>
                                </tr>
                            </table>';
                            $i++;
                        }
                    ?>
                </div><br>
                <div id="addLeft" class="add">Add a Row</div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="removeLeft" class="remove">Remove a Row</div>
            </div>
            <!-- IMAGES TAB -->
            <div id="box4" class="tab_page hidden">
                <div id="leftImages">
                    <table>
                    <tr>
                        <td class="w50"><b>Page URL</b>  <a title="The URL of the page you want the image to redirect to when clicked" class="tooltip">[?]</a></td>
                        <td class="full"><b>Image URL</b></td>
                    </tr>
                </table>
                <!-- Creating Image Inputs -->
                <?php
                    $images = array("slideshow5.png", "slideshow6.png", "slideshow1.png", "slideshow2.png", "slideshow3.png");
                    $i = 0;
                    while($i < 5)
                    {
                        echo 
                        '<table class="aButton range_s">
                            <tr>
                                <td class="w50"><input name="imgLink" class="url" placeholder="Page URL" onchange="checkit()"></td>
                                <td class="full"><input name="imgURL" class="url" value="http://www.simplydevio.us/resources/images/' . $images[$i] . '" onchange="checkit()"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Zoom <input name="imageZoom" type="range" min="300" max="1000" value="500" onchange="checkit()"><span class="range_label" name="zoom_range"></span></td>
                            </tr>
                        </table>';
                        $i++;
                    }
                ?>
                </div>
                <br><br>
            </div>
            <div id="box5" class="tab_page hidden">
                To receive the codes needed to create your gallery directory, please purchase the password and type it in below.
                <br>
                <input id="password" class="password" placeholder="Password" onchange="checkit()">
                <div id="message"></div>
                <br><br>
                <a href="http://fav.me/d7siwzy" class="buy">Purchase Password</a>
            </div>
<script>
$("#addLeft").click(function(){
    $("#leftButtons").append('<table class="aButton"><tr><td><input class="name" name="butName" value="My Button" onchange="checkit()"> </td><td><input name="butLink" class="url" placeholder="URL to Gallery Folder" onchange="checkit()"></td></tr></table>');
    $("#leftImages").append('<tr> <td><input name="imgLink" class="url" placeholder="Page URL" onchange="checkit()"></td><td><input name="imgURL" class="url" value="http://www.simplydevio.us/resources/images/slideshow5.png" onchange="checkit()"></td></tr><tr><td colspan="2">Zoom <input name="imageZoom" type="range" min="300" max="1000" value="500" onchange="checkit()"><span class="range_label" name="zoom_range"></span></td></tr>');
  checkit();
});
$("#removeLeft").click(function(){
    $("#leftButtons .aButton:last").remove();
    $("#leftImages .aButton:last").remove();
    checkit();
});
function toggle(){
    $("#tab1").attr('class', 'tabby not_selected');
    $("#tab2").attr('class', 'tabby not_selected');
    $("#tab3").attr('class', 'tabby not_selected');
    $("#tab4").attr('class', 'tabby not_selected');
    $("#tab5").attr('class', 'tabby not_selected');
    $(this).attr('class', 'tabby selected');
}
// Toggles box visibility
function box_toggle(){
    $("#box1").attr('class', 'tab_page hidden');
    $("#box2").attr('class', 'tab_page hidden');
    $("#box3").attr('class', 'tab_page hidden');
    $("#box4").attr('class', 'tab_page hidden');
    $("#box5").attr('class', 'tab_page hidden');
}
$("#tab1").click(toggle);
$("#tab2").click(toggle);
$("#tab3").click(toggle);
$("#tab4").click(toggle);
$("#tab5").click(toggle);
$("#tab1").click(function(){
    box_toggle();
    $("#box1").attr('class', 'tab_page visible');
});
$("#tab2").click(function(){
    box_toggle();
    $("#box2").attr('class', 'tab_page visible');
});
$("#tab3").click(function(){
    box_toggle();
    $("#box3").attr('class', 'tab_page visible');
});
$("#tab4").click(function(){
    box_toggle();
    $("#box4").attr('class', 'tab_page visible');
});
$("#tab5").click(function(){
    box_toggle();
    $("#box5").attr('class', 'tab_page visible');
});
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
                Need help using the codes below? Read this step-by-step <a href="profile_tutorial.php" target="_blank">tutorial</a>.
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
            </div> <!-- End cols left -->
            </div>
        
        </div>
    </div>
<div class="section footer b">
<?php include '../includes/footer.html'; ?>
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
</body>
</html>