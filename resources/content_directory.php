<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
    
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>
    
    <script> 
        $(function(){
            $("#nav").load("http://www.simplydevio.us/menu1.html");
            $("#resnav").load("http://www.simplydevio.us/resources/resnav.html"); 
            $("#footer").load("http://www.simplydevio.us/footer.html");
        });
    </script> 
    
    <title>Content Directory Creator</title>
    <link rel="icon" href="http://www.simplydevio.us/new128.png" sizes="128x128">
    
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-45010841-2', 'simplydevio.us');
      ga('send', 'pageview');
    </script>

    <!-- CSS STYLING UNIQUE TO THIS PAGE -->   

<style>
    .leftProfile textarea, .textchunk{
        padding:5px 10px;
        max-width:527px;
        width:527px;
        margin-bottom:5px;
        font-family:'Open Sans';
        font-size:15px;
        max-height:100px;
        height:80px;
    }

    .floatybar{
        position:relative;
        left:570px;
        top:-60px;
    }

</style>


</head>

<body>

<?php    

if(isset($_POST['create_directory']))
{
    $css = '<style type="text/css">\n\n';

    $htmlstring = '<div class="leftCol">\n';

    if(isset($_POST['includeArrow']) && 
    $_POST['includeArrow'] == 'Yes') 
    {
        $arrow = ' <span>&#10152;</span>';
    }
    else
    {
        $arrow = '';
    }    

    $butLink = $_POST['butLink'];
    $butName = $_POST['butName'];
    $descript = $_POST['descript'];

    for($i = 0; $i < count($_POST['butName']); $i++)
    {
        $htmlstring .= '<div class="wrap">';
        $htmlstring .= '<a href="' + $butLink[$i] + '">';
        $htmlstring .= '<div class="button">' + $butName[$i] + $arrow + '</div></a>\n';
        $htmlstring .= '<div class="info"><br>' + $descript[$i] + '</div></div>\n';
        $htmlstring .= 'done';
    }

    $htmlstring .= $descript[0];
    echo '<textarea>';
    echo $htmlstring;
    echo '</textarea>';
    echo 'done';

}   
else{} 

?>

<!--<script type="text/javascript">
function checkit()

{

    var css = '<style type="text/css">\n\n';
    
 
// HTML BUILDING

    var htmlstring = '<div class=\"leftCol\">\n';
    
    if(document.getElementById('includeArrow').checked)
    {
        var arrow = ' <span>&#10152;</span>';
    }
    else{
        var arrow = '';
    }
    
    //  LEFT SIDE DIRECTORY BUTTONS
    for(var i = 0; i < example.butName.length; i++)
    {
        htmlstring += '<div class="wrap">';
        htmlstring += '<a href="' + example.butLink[i].value + '">';
        htmlstring += '<div class="button">' + example.butName[i].value + arrow + '</div></a>\n';
        htmlstring += '<div class="info"><br>' + example.descript[i].value + '</div></div>\n';
    }

    htmlstring += '</div>';
    htmlstring += '<div class="rightCol\"><br>' + document.getElementById('contentDescription').value + '</div>';
    
// DONE WITH HTML BUILDING


// CSS BUILDING

    var textstring = '*{background:none; border:none; padding:0; margin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += '.gr-top, .bottom, a.external:after {display:none;}\n';
    textstring += '.gr-box br{display:none;}\n';
    textstring += 'a{text-decoration:none; font-weight:normal;}\n';
    textstring += '.external{display:block;}\n\n';
    
    var top = document.getElementById('topMargin').value;
    var right = parseInt(document.getElementById('rightMargin').value);
    var bottom = document.getElementById('bottomMargin').value;
    var left = document.getElementById('leftMargin').value;
    

    textstring += '.gr-box{\n';
    textstring += 'z-index:99!important;\n';
    textstring += 'margin:' + top + 'px ' + right + '% ' + bottom + 'px ' + left + '%;}\n\n';
    
    textstring += '.button{\n';
    textstring += 'color: #' + document.getElementById('buttonColor').value + ';\n';
    textstring += 'background: #' + document.getElementById('buttonBackground').value + ';\n';
    textstring += 'font-family:' + document.getElementById('buttonFontFamily').value + ';\n';
    textstring += 'text-align:center;\n';
    textstring += 'font-size:' + document.getElementById('buttonSize').value + 'px;\n';
    textstring += '-webkit-border-radius:' + document.getElementById('buttonRadius').value + 'px;\n';
    textstring += '-moz-border-radius:' + document.getElementById('buttonRadius').value + 'px;\n';
    textstring += 'border-radius:' + document.getElementById('buttonRadius').value + 'px;\n';
    textstring += 'padding:' + document.getElementById('buttonPadding').value + 'px 0px;\n';
    textstring += 'margin-bottom:' + document.getElementById('buttonMargin').value + 'px;}\n\n';
    
    textstring += '.button:hover{\n';
    textstring += 'color: #' + document.getElementById('buttonHoverColor').value + ';\n';
    textstring += 'background: #' + document.getElementById('buttonHoverBackground').value + ';}\n\n';
    
    textstring += '.button span{\n';
    textstring += 'display:none;\n';
    textstring += 'font-size:0.85em;}\n\n';
    
    textstring += '.button:hover span{display:inline;}\n\n';

    var leftWidth = document.getElementById('leftWidth').value;
    var leftPosition = parseInt(leftWidth) + parseInt(left);

    textstring += '.leftCol{width:' + leftWidth + '%;}\n\n'

    var padValue = parseInt(document.getElementById('contentPadding').value);

    textstring += '.rightCol{right:0;}\n\n';

    textstring += '.info{\n';
    textstring += 'display:none;\n';
    textstring += 'left:' + leftWidth + '%;\n';
    textstring += 'text-align:left;\n';
    textstring += 'z-index:100;\n';
    textstring += '}\n\n';

    textstring += '.info, .rightCol{\n';
    textstring += '-webkit-border-radius:' + document.getElementById('contentRadius').value + 'px;\n';
    textstring += '-moz-border-radius:' + document.getElementById('contentRadius').value + 'px;\n';
    textstring += 'border-radius:' + document.getElementById('contentRadius').value + 'px;\n';
    textstring += 'font-family:' + document.getElementById('textFontFamily').value + ';\n';
    textstring += 'font-size:' + document.getElementById('textSize').value + 'px;\n';
    textstring += 'background: #' + document.getElementById('contentBackground').value + ';\n';
    textstring += 'color: #' + document.getElementById('textColor').value + ';\n';
    textstring += 'width:' + (100 - (parseInt(right)) - parseInt(leftWidth) - padValue) + '%;\n';
    textstring += 'padding:0 ' + padValue + '%;\n';
    textstring += 'position:absolute;\n';
    textstring += 'top:0;\n';
    textstring += 'height:98%;\n';
    textstring += 'overflow:auto;\n';
    textstring += '}\n\n';

    textstring += '.wrap:hover .info{display:inline-block;}\n\n'

    textstring += '.info br, .rightCol br{display:block;}'


 


// CUSTOM BOX HTML BUILDING

    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';
    widgetstring += document.getElementById('customBackground').value;
    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';
    
    
    // Write textstring to the textarea.

    // document.forms['example'].output.value = textstring;
    
    if (document.getElementById('password').value == 'serenata') 
    {
        document.getElementById("cssArea").value = textstring;
        document.getElementById("htmlArea").value = htmlstring;
        document.getElementById("widgetArea").value = widgetstring;
    }
    else
    {
        
    }
        

    var w = window.open('titlepage.html', 'newwindow', config='height=500, width=600, toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
    var d = w.document;
    d.open();
    d.write(css);
    d.write(textstring);
    d.write('.gr-box a{text-decoration:none;} .gr-box{min-width:400px; position:relative;} .description{max-width:800px;} .rightCol, .info{height:100%;}'); 
    d.write('.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}');
    d.write('body{background:url(\"' + document.getElementById('customBackground').value + '\") no-repeat;');
    d.write("</style>");
    d.write("<scri" + "pt type=\"text/javascript\">$(document).ready(function(){$(\"#termsagreement\").click(function(){ $(\"#previewtext\").toggle();});});<\/script>");
    d.write("<link rel=\"stylesheet\" type=\"text/css\" href=\"http://simplydevio.us/mainp.css\" media=\"screen\" /></head><body><div id=\"previewpage\">");
    d.write("<div class=\"gr-box\"><div class=\"gr-top\"><div class=\"gr\"><h2><img src=\"http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2\" style=\"vertical-align:middle\" alt=\"\"><a href=\"#\">Devious Journal Entry</a></h2><span class=\"timestamp\">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class=\"body\"><div class=\"text\">" + htmlstring + "</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div></div>");
    d.write("<div class=\"maxheight\">DeviantART has a max height of 350px, so anything below this line will be cut off!</div>");
    d.close();
   
}



</script>
-->
    <div class="navwrap"><div id="nav">&nbsp;</div></div>

<div class="section w"><div class="tri tb"></div>

    <div class="content" id="resource">
    
        <table>
        
        <tr>
        
        <!-- Sidebar on right side -->
        <td id="right">
            <div id="resnav" class="sidebarNavigation">&nbsp;</div>
        </td>
        
        <!-- Start main content -->
        <td id="left">
        
        <div class="title">Content Directory Creator</div>
        
        <div class="description">
            <p>UNDER CONSTRUCTION! Create your own Content Directories with this easy-to-use tool. This directory can be used to display text or text with images.
            To receive the codes that will allow you to install this directory onto your profile, please <a href="#">purchase the password</a>.</p>
            
        </div>
        
        <div class="banner">
            <a href="http://simplysilent.deviantart.com/"><img src="images/profile.png"></a>
        </div>
        
        <div class="buttonWrap">
                <a href="http://simplysilent.deviantart.com" target="_blank"><div class="button g search"><span>Live Demo</span></div></a>
                <a href="#" target="_blank"><div class="button g buy"><span>Purchase</span></div></a>
            </div>
        
            
    </td>
    </table>
            
                    
                <!-- Start Journal Box Section -->
                For fonts, you can use either <a href="">Web Safe Fonts</a> or <a href="http://www.google.com/fonts">Google Fonts</a>. 
            Please note that in this website's preview, Google Fonts will not display properly. 
            However, Google Fonts will work normally when pasted into DeviantART's journal CSS.
  
                <form id="profileDirectory" name="example" action="content_directory.php" method="post">
                <h1>Custom Box</h1>

                <table>
                    <tr>
                        <td width="140"><h2>Background <a title="What image do you want to use for the background of your widget?" class="tooltip">[?]</a></h2></td>
                        <td colspan="6">Image URL <input name="" id="customBackground" class="url" placeholder="http://">
                    </tr>
                    <tr>
                        <td><h2>Margin <a title="How much spacing do you want between your buttons and the outside border of the Custom Box?" class="tooltip">[?]</a></h2></td>
                        <td>Top:</td>
                        <td><input id="topMargin" class="pixel" maxlength="3" value="10">px</td>
                        <td>Bottom:</td>
                        <td><input id="bottomMargin" class="pixel" maxlength="3" value="10">px</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Left:</td>
                        <td><input id="leftMargin" class="percent" maxlength="2" value="10">%</td>
                        <td>Right:</td>
                        <td><input id="rightMargin" class="percent" maxlength="2" value="10">%</td>
                        
                    </tr>
                </table>

                <h1>Content Box</h1>

                <table>
                    
                    <tr>
                        <td><h2>Text </h2></td>
                        <td colspan="2"><a title="Use a Web Safe Font or Google Font here" class="tooltip"><input id="textFontFamily" style="width:150px;" value="Verdana"> &nbsp;&nbsp;</a></td>
                        <td>Size: &nbsp;&nbsp;</td>
                        <td><input id="textSize" class="pixel" maxlength="2" value="13">px &nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td><h2>Colors </h2></td>
                        <td>Text: </td>
                        <td><input id="textColor" class="color" maxlength="6" value="000000"></td>
                        <td>Background: </td>
                        <td><input id="contentBackground" class="color" maxlength="6" value="9FCE54"></td>
                    </tr>
                    <tr>
                        <td><b>Shape  &nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                        <td>Padding:</td>
                        <td><a title="How much padding do you want there to be on the sides of the box?" class="tooltip"><input id="contentPadding" class="pixel" maxlength="3" value="10"></a> px  &nbsp;&nbsp;</td>
                        <td>Roundness: &nbsp;</td>
                        <td><a title="The larger the number, the more round your box will be" class="tooltip"><input id="contentRadius" class="pixel" maxlength="2" value="0"></a> px</td>
                    </tr>
                </table>
                <textarea id="contentDescription" class="textchunk">Default Content Text</textarea>

                
                <h1>Buttons</h1>
                
                <table>
                    <tr>
                        <td><h2>Font </h2></td>
                        <td colspan="2"><a title="Use a Web Safe Font or Google Font here" class="tooltip"><input id="buttonFontFamily" value="Verdana" style="width:150px"> &nbsp;&nbsp;</a></td>
                        <td>Size: </td>
                        <td><input id="buttonSize" class="pixel" maxlength="2" value="13">px &nbsp;&nbsp;</td>
                    </tr>

                    <tr>
                        <td width="140"><h2>Background </h2></td>
                        <td>Normal: &nbsp;</td>
                        <td><input id="buttonBackground" class="color" maxlength="6" value="5E4948"></td>
                        <td>On Hover: </td>
                        <td><input id="buttonHoverBackground" class="color" maxlength="6" value="9FCE54"></td>
                    </tr>
                    <tr>
                        <td><h2>Text Color</h2></td>
                        <td>Normal: </td>
                        <td><input id="buttonColor" class="color" maxlength="6" value="FFFFFF"> &nbsp;&nbsp;</td>
                        <td>On Hover: </td>
                        <td><input id="buttonHoverColor" class="color" maxlength="6" value="FFFFFF"></td>
                    </tr>
                    <tr>
                        <td><b>Shape  &nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                        <td>Padding:</td>
                        <td><a title="How tall do you want your buttons to be?" class="tooltip"><input id="buttonPadding" class="pixel" maxlength="3" value="10"></a> px  &nbsp;&nbsp;</td>
                        <td>Roundness: &nbsp;</td>
                        <td><a title="The larger the number, the more round your button will be" class="tooltip"><input id="buttonRadius" class="pixel" maxlength="2" value="0"></a> px</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Margin:</td>
                        <td><a title="How much vertical spacing do you want between the buttons?" class="tooltip"><input id="buttonMargin" class="pixel" maxlength="3" value="5"></a> px</td>
                        <td>Width:</td>
                        <td><input id="leftWidth" class="pixel" maxlength="3" value="35"> %</td>
                   </tr>
                   
                    <tr>
                        <td></td>
                        <td colspan="5"><input type="checkbox" name="includeArrow" class="check" value="1"> <label for="includeArrow">Include arrow (&#10152;) on hover</label></td>
                    </tr>
                </table>

                <br>



                
                
                <div class="leftProfile">
                    <table id="leftButtons">
                    
                        <tr>
                            <td><b>Button Name</b></td>
                            <td><b>URL</b> <a href="http://www.simplydevio.us/resources/linking_widgets_tutorial.html" target="_blank" title="Click for a tutorial on how to link to widgets" class="tooltip">[info]</a></td>
                        </tr>
                        <tr>
                            <td><input class="name" name="butName[]" style="width:150px;" value="My Button"> </td>
                            <td><input name="butLink[]" style="width:350px;" placeholder="http://"></td>
                        </tr>
                        <tr class="aButton"><td colspan="2"><textarea name="descript[]">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</textarea><br></td></tr>

                        <tr class="aButton">
                            <td><input class="name" name="butName[]" style="width:150px;" value="My Button"> </td>
                            <td><input name="butLink[]" style="width:350px;" placeholder="http://"></td>
                        </tr>
                        <tr class="aButton"><td colspan="2"><textarea name="descript[]">Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea></td></tr>

                        <tr class="aButton">
                            <td><input class="name" name="butName[]" style="width:150px;" value="My Button"> </td>
                            <td><input name="butLink[]" style="width:350px;" placeholder="http://"></td>
                        <tr class="aButton"><td colspan="2"><textarea name="descript[]">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</textarea></td></tr>
                        </tr>
                        

                    </table>
                    <div class="floatybar">
                        <div id="addLeft" class="add">Add Another Button</div><br>
                        <div id="removeLeft" class="remove">Remove a Button</div>
                    </div>
                </div>
                
                
                <div class="clear"></div>
                
            

<script>
$("#addLeft").click(function(){
  $("#leftButtons").append("<tr class=\"aButton\"><td><input class=\"name\" name=\"butName\" style=\"width:150px;\" value=\"My Button\"> </td><td><input name=\"butLink\" style=\"width:350px;\" placeholder=\"http://\"></td></tr>\n<tr class=\"aButton\"><td colspan=\"2\"><textarea name=\"descript\">Description</textarea></td></tr>")
});

$("#removeLeft").click(function(){
    $("#leftButtons .aButton:last").remove();
    $("#leftButtons .aButton:last").remove();
});



</script>
                
                
                <div class="submitwrap"><input class="submit" type="submit" name="create_directory" value="Create Directory!" /></div>
            </form>
            

            To receive the codes needed to create your content directory, please purchase the password and type it in below:
            

            <div align="center"><input id="password" class="password" placeholder="Password"></div>
            <br><br>
            
            Need help using the codes below? Read this step-by-step <a href="http://www.simplydevio.us/resources/profile_tutorial.html" target="_blank">tutorial</a>.

            <br><br>
            
            
            
            <table class="profile">
                <tr style="font-weight:bold;">
                    <td>Widget Code <a title="Paste into the text box of your Featured Deviation Widget" class="tooltip">[?]</a></td>
                    <td>HTML Code <a title="Paste into the text box of your journal in Sta.sh Writer" class="tooltip">[?]</a></td>
                    <td>CSS Code <a title="Paste into the main Skin CSS section of your journal" class="tooltip">[?]</a></td>
                </tr>
                <tr>
                    <td><textarea id="widgetArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea> </td>
                    <td><textarea id="htmlArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea> </td>
                    <td><textarea id="cssArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea> </td>
                </tr>

            </table>
            
            <br><br>

            </div>

        </td>
        
        </tr>
        </table>
        
        </div>
    </div>

<div class="section footer b">
    <div class="tri tw">&nbsp;</div>

    <div id="footer">&nbsp;</div>
</div>





