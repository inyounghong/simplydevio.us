<!DOCTYPE html>

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Gallery Directory creator for DeviantART">

    <meta name="keywords" content="deviantart, simplysilent, profile, gallery, directory, css, journal">

    <meta name="author" content="SimplySilent">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>





    <script src="../js/jquery.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript" src="js/jscolor.js"></script>



    <title>Gallery Directory Creator</title>

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



<script type="text/javascript">

$(document).ready(function(){

    checkit();

});



function checkit()



{



    var css = '<style type="text/css">\n\n';





// HTML BUILDING



    var htmlstring = '<div class=\"left\">\n\n';



    // Include an arrow on hover?



    if(document.getElementById('includeArrow').checked)

    {

        var arrow = ' <span>&#10152;</span>';

    }

    else{

        var arrow = '';

    }



    // Counting buttons



    for(var i = 0; i <= example.butName.length; i++){

        var buttonNumber = i;

    }



    // Sizes



    var size = parseFloat(document.getElementById('buttonSize').value);

    var margin = parseFloat(document.getElementById('buttonMargin').value);

    var padding = parseFloat(document.getElementById('buttonPadding').value) * 2;



    // Determining the height of the directory and the image



    var blankHeight = ((size + margin + padding) * buttonNumber);



    //  LEFT SIDE DIRECTORY BUTTONS



    for(var i = 0; i < example.butName.length; i++)

    {



        htmlstring += '<div class=\"wrap\"><a class=\"button\" href=\"' + example.butLink[i].value + '">';

        htmlstring += example.butName[i].value + arrow + '</a>';

        htmlstring += '<div class="image"><div class="celvas"></div>\n';

        htmlstring += '<img src=\"' + example.imgLink[i].value + '\"></div></div>\n\n';

    }



    htmlstring += '</div>\n\n<div class=\"clear\"></div>';



// DONE WITH HTML BUILDING





// CSS BUILDING



    var textstring = '*{background:none; border:none; padding:0; margin:0;} \n\n';

    textstring += '.gr{padding:0 !important;}\n';

    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';

    textstring += '.gr-top, .bottom, a.external:after, .left br {display:none;}\n';

    textstring += 'a{text-decoration:none; font-weight:normal;}\n';

    textstring += '.external{display:block;}\n\n';



    textstring += '.gr-box{\n';

    textstring += 'z-index:99!important;\n';

    textstring += 'line-height:1.1em!important;\n';

    textstring += 'font-family:' + document.getElementById('buttonFontFamily').value + ';\n';

    textstring += 'text-align:center;\n';

    textstring += 'font-size:' + document.getElementById('buttonSize').value + 'px;}\n\n';



    var top = document.getElementById('topMargin').value;





    textstring += '.text{\n';

    textstring += 'position:relative;\n';

    textstring += 'width:500px;\n';

    textstring += 'margin:' + top + 'px auto;}\n\n';



    textstring += '.left{width:45%;}\n\n';



    textstring += '.image{\n';

    textstring += 'display:none;\n'

    textstring += 'position:absolute;\n';

    textstring += 'left:50%;\n';

    textstring += 'top:0;}\n\n';



    textstring += '.celvas{\n';

    textstring += 'height:' + blankHeight + 'px;\n';

    textstring += 'vertical-align:middle;\n';

    textstring += 'display:inline-block;}\n\n';



    textstring += 'img{\n';

    textstring += 'position:relative;\n';

    textstring += 'max-width:96%;\n';

    textstring += 'max-height:' + blankHeight + 'px;\n';

    textstring += 'display:inline;\n';

    textstring += 'vertical-align:middle;}\n\n';



    textstring += '.wrap:hover .image{display:inline-block;}\n\n';



    textstring += '.button{\n';

    textstring += 'display:block;\n';

    textstring += 'color: #' + document.getElementById('buttonColor').value + '!important;\n';

    textstring += 'background: #' + document.getElementById('buttonBackground').value + ';\n';

    textstring += 'border-radius:' + document.getElementById('buttonRadius').value + 'px;\n';

    textstring += 'padding:' + document.getElementById('buttonPadding').value + 'px 0px;\n';

    textstring += 'margin-bottom:' + document.getElementById('buttonMargin').value + 'px;\n';



        if (document.getElementById('includeTransition').checked){

            textstring += 'transition:all 0.2s;}\n\n';

        }

        else{

            textstring += '}\n\n';

        }



    textstring += '.button:hover{\n';

    textstring += 'color: #' + document.getElementById('buttonHoverColor').value + '!important;\n';

    textstring += 'background: #' + document.getElementById('buttonHoverBackground').value + ';}\n\n';



    textstring += '.button span{\n';

    textstring += 'display:none;\n';

    textstring += 'font-size:0.85em;}\n\n';



    textstring += '.button:hover span{display:inline;}\n\n';







// CUSTOM BOX HTML BUILDING



    var widgetstring = '<div class=\"popup2-moremenu\"><div class=\"floaty-boat\"><br><img src=\"';

    widgetstring += document.getElementById('customBackground').value;

    widgetstring += '\"></div></div><div class=\"gr-box gr-genericbox\">';









    // Write textstring to the textarea.



    document.getElementById("button_size_range").innerHTML = document.getElementById("buttonSize").value;

    document.getElementById("button_padding_range").innerHTML = document.getElementById("buttonPadding").value;

    document.getElementById("button_margin_range").innerHTML = document.getElementById("buttonMargin").value;

    document.getElementById("button_radius_range").innerHTML = document.getElementById("buttonRadius").value;

    document.getElementById("top_margin_range").innerHTML = document.getElementById("topMargin").value;







    // document.forms['example'].output.value = textstring;



    if (document.getElementById('password').value == 'pandas')

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

    complete_css += '.gr-box a{text-decoration:none;} .gr-box{max-width:800px; padding: 20px 10px;} .description{max-width:800px;}';

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



        <div class="title">Gallery Directory Creator</div>

        <div class="map"><a href="/#!/resources">Resources</a> > Gallery Creator</div>



            <!-- Start Journal Box Section -->

            <?php include 'includes/note.html' ?>



            <div class="cols lft">



            <form action="" id="profileDirectory" name="example" onchange="checkit()" onsubmit="checkit(); return false">



                <div class="tab_menu four">

                    <div id="custom_box_link" class="tabby selected">Directory</div>

                    <div id="buttons_link" class="tabby not_selected">Colors</div>

                    <div id="button_name_link" class="tabby not_selected">Buttons</div>

                    <div id="status_link" class="tabby not_selected">Purchase</div>

                </div>



                <table id="tab_one" class="tab_page visible">

                    <tr>

                        <td class="w25"><b>Background </b></td>

                        <td class="lg"><input name="" id="customBackground" placeholder="Image Source URL"><div class="tooltip"><a href="image_tutorial.php">?</a><div class="tool_info"><span>Click for a tutorial</span></div></div></td>

                    </tr>



                    <tr>

                        <td><b>Font Name</b></td>

                        <td colspan="4"><input id="buttonFontFamily" value="Verdana"><a title="Use a Web Safe Font or Google Font here" class="tooltip">[?]</a></td>

                    </tr>

                    <tr>

                        <td><b>Font Size</b></td>

                        <td><input id="buttonSize" type="range" min="0" max="30" value="14"><span class="range_label" id="button_size_range">14</span></td>

                    </tr>

                    <tr>

                        <td><b>Position</b></td>

                        <td><input id="topMargin" type="range" min="0" max="100" value="10"><span class="range_label" id="top_margin_range">10</span></td>

                    </tr>

                    <tr>

                        <td><b>Padding</b></td>

                        <td colspan="4"><input id="buttonPadding" type="range" min="0" max="30" value="10"><span class="range_label" id="button_padding_range">10</span></td>

                    </tr>

                    <tr>

                        <td><b>Margin</b></td>

                        <td colspan="4"><input id="buttonMargin" type="range" min="0" max="20" value="5"><span class="range_label" id="button_margin_range">5</span></td>

                    </tr>

                    <tr>

                        <td><b>Roundness</b></td>

                        <td colspan="4"><input id="buttonRadius" type="range" min="0" max="20" value="0"><span class="range_label" id="button_radius_range">0</span></td>

                    </tr>

                    <tr>

                        <td></td>

                        <td colspan="5"><input type="checkbox" id="includeArrow"  class="check"> <label for="includeArrow">Include arrow (&#10152;) on hover</label></td>

                    </tr>

                </table>





                <div id="tab_two" class="tab_page hidden">

                <table>

                    <tr>

                        <td style="width:110px;"><b>Background </b></td>

                        <td>Normal:</td>

                        <td><input id="buttonBackground" class="color" maxlength="6" value="5E4948"></td>

                        <td>Hover:</td>

                        <td><input id="buttonHoverBackground" class="color" maxlength="6" value="9FCE54"></td>

                    </tr>

                    <tr>

                        <td><b>Text Color</b></td>

                        <td>Normal:</td>

                        <td><input id="buttonColor" class="color" maxlength="6" value="FFFFFF"></td>

                        <td>Hover:</td>

                        <td><input id="buttonHoverColor" class="color" maxlength="6" value="FFFFFF"></td>

                    </tr>

                    <tr><td>&nbsp;</td></tr>

                </table>





                <input type="checkbox" id="includeTransition" class="check"><label for="includeTransition">Include Transitions</label>



            </div>





            <div id="tab_three" class="tab_page hidden">



                <div id="leftButtons">



                    <table class="aButton">

                        <tr>

                            <td class="w35"><input class="name" name="butName" value="My Button"> </td>

                            <td class="full"><input name="butLink" class="url" placeholder="Gallery URL"></td>

                        </tr>

                        <tr>

                            <td></td>

                            <td><input name="imgLink" class="url" value="http://www.simplydevio.us/resources/images/slideshow5.png"></td>

                        </tr>

                    </table>

                    <table class="aButton">

                        <tr>

                            <td class="w35"><input class="name" name="butName" value="My Button"> </td>

                            <td class="full"><input name="butLink" class="url" placeholder="Gallery URL"></td>

                        </tr>

                        <tr>

                            <td></td>

                            <td><input name="imgLink" class="url" placeholder="Image Source URL"></td>

                        </tr>

                    </table>

                    <table class="aButton">

                        <tr>

                            <td class="w35"><input class="name" name="butName" value="My Button"> </td>

                            <td class="full"><input name="butLink" class="url" placeholder="Gallery URL"></td>

                        </tr>

                        <tr>

                            <td></td>

                            <td><input name="imgLink" class="url" placeholder="Image Source URL"></td>

                        </tr>

                    </table>



                </div><br>







                <div id="addLeft" class="add">Add a Row</div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                <div id="removeLeft" class="remove">Remove a Row</div>

            </div>



            <div id="tab_four" class="tab_page hidden">

                To receive the codes needed to create your profile directory, please purchase the password and type it in below.

                <br>

                <input id="password" class="password" placeholder="Password">



                <div id="message"></div>

                <br>

                <a href="http://fav.me/d75xzuy" class="buy">Purchase Password</a>



            </div>





<script>

$("#addLeft").click(function(){

    $("#leftButtons").append('<table class="aButton"><tr><td class="w35"><input class="name" name="butName" value="My Button"> </td><td class="full"><input name="butLink" class="url" placeholder="Gallery URL"></td></tr><tr><td></td><td><input name="imgLink" class="url" placeholder="Image Source URL"></td></tr></table>')

  checkit();

});





$("#removeLeft").click(function(){

    $("#leftButtons .aButton:last").remove();

    checkit();

});









function toggle(){

    $("#custom_box_link").attr('class', 'tabby not_selected');

    $("#buttons_link").attr('class', 'tabby not_selected');

    $("#button_name_link").attr('class', 'tabby not_selected');

    $("#status_link").attr('class', 'tabby not_selected');

    $(this).attr('class', 'tabby selected');

}



$("#custom_box_link").click(function(){

    $("#tab_one").attr('class', 'tab_page visible');

    $("#tab_two").attr('class', 'tab_page hidden');

    $("#tab_three").attr('class', 'tab_page hidden');

    $("#tab_four").attr('class', 'tab_page hidden');

});



$("#buttons_link").click(function(){

    $("#tab_one").attr('class', 'tab_page hidden');

    $("#tab_two").attr('class', 'tab_page visible');

    $("#tab_three").attr('class', 'tab_page hidden');

    $("#tab_four").attr('class', 'tab_page hidden');

});



$("#button_name_link").click(function(){

    $("#tab_one").attr('class', 'tab_page hidden');

    $("#tab_two").attr('class', 'tab_page hidden');

    $("#tab_three").attr('class', 'tab_page visible');

    $("#tab_four").attr('class', 'tab_page hidden');

});



$("#status_link").click(function(){

    $("#tab_one").attr('class', 'tab_page hidden');

    $("#tab_two").attr('class', 'tab_page hidden');

    $("#tab_three").attr('class', 'tab_page hidden');

    $("#tab_four").attr('class', 'tab_page visible');

});



$("#custom_box_link").click(toggle);

$("#buttons_link").click(toggle);

$("#button_name_link").click(toggle);

$("#status_link").click(toggle);





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

            </div><!-- End cols lft -->



            <br><br>



            </div>



        </div>

    </div>



<div class="section footer b">



    <?php include '../includes/footer.html' ?>

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



</div>





</body>

</html>
