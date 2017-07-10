<?php header( 'Location: /#!/resources/slideshow' ) ; ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Gallery Slideshow Directory creator for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, gallery, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gallery Slideshow Creator for DeviantART</title>

    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscolor.js"></script>
    <script type="text/javascript" src="js/slideshow.js"></script>

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

    <?php include '../includes/menu1.html' ?>
<div class="section" id="resource">
    <div id="left">

        <div class="title">Gallery Slideshow Creator</div>
        <div class="map"><a href="/#!/resources">Resources</a> > Slideshow #1 Creator</div>
            <!-- Start Journal Box Section -->
            <div class="cols lft">
            <form action="" id="profileDirectory" name="example" onchange="checkit()" onsubmit="checkit(); return false">
                <div class="tab_menu">
                    <div id="custom_box_link" class="tabby selected">Slide Show</div>
                    <div id="buttons_link" class="tabby not_selected">Images</div>
                    <div id="button_name_link" class="tabby not_selected">Purchase</div>
                </div>

                <table id="tab_one" class="tab_page visible">
                    <tr>
                        <td style="width:110px;"><h2>Background </h2></td>
                        <td colspan="4"><input name="" id="customBackground" placeholder="Image Source URL"><div class="tooltip"><a href="image_tutorial.php">?</a><div class="tool_info"><span>Click for a tutorial</span></div></div></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td><h2>Color</h2></td>
                        <td>Slide Background</td>
                        <td><input id="slideBackground" class="color" maxlength="6" value="000000"></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>Thumb Background</td>
                        <td><input id="thumbBackground" class="color" maxlength="6" value="FFFFFF"></td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td><h2>Width</h2></td>
                        <td colspan="4"><input id="maxWidth" type="range" min="200" max="550" value="450" step="10"><span class="range_label" id="max_width_range">450</span></td>
                    </tr>
                </table>
            <div id="tab_two" class="tab_page hidden">
                <table id="leftButtons">

                    <tr>
                        <td class="w50"><b>Page URL</b> <a title="The URL of you want the image to redirect to when clicked." class="tooltip" href="image_tutorial.php">[?]</a></td>
                        <td class="full"><b>Image URL</b> <a title="Click for a tutorial on how to find Image URL's" class="tooltip" href="image_tutorial.php">[?]</a></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/d41e1au"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow1.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/d5wndae"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow2.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/d1efwgs" > </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow3.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/dep957"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow4.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://serapstock.deviantart.com/art/Red-Morning-I-100397186"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow5.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/d5b7hyu"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow6.png"></td>
                    </tr>
                    <tr class="aButton">
                        <td><input name="butName" value="http://fav.me/d4htknq"> </td>
                        <td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow7.png"></td>
                    </tr>
                </table><br>
                <div id="addLeft" class="add">Add another Image</div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div id="removeLeft" class="remove">Remove an Image</div>
            </div>
            <div id="tab_three" class="tab_page hidden">
                To receive the codes needed to create your profile directory, please purchase the password and type it in below.
                <br>
                <input id="password" class="password" placeholder="Password">
                <div id="message"></div>
                <br><br>
                <a href="http://simplysilent.deviantart.com/gallery/" class="buy">Purchase Password</a>
            </div>
<script>
$("#addLeft").click(function(){
    $("#leftButtons").append('<tr class="aButton"><td><input name="butName" value="http://fav.me/d41e1au"> </td><td><input name="butLink" value="http://www.simplydevio.us/resources/images/slideshow1.png"></td></tr>');
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
    $("#buy_link").attr('class', 'tabby not_selected');
    $(this).attr('class', 'tabby selected');
}
$("#custom_box_link").click(function(){
    $("#tab_one").attr('class', 'tab_page visible');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page hidden');
});
$("#buttons_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page visible');
    $("#tab_three").attr('class', 'tab_page hidden');
});
$("#button_name_link").click(function(){
    $("#tab_one").attr('class', 'tab_page hidden');
    $("#tab_two").attr('class', 'tab_page hidden');
    $("#tab_three").attr('class', 'tab_page visible');
});
$("#custom_box_link").click(toggle);
$("#buttons_link").click(toggle);
$("#button_name_link").click(toggle);
</script>
<br><br>
            </form>
        </div>

            <div class="cols rgt">
                <div class="right_preview_box" style="margin-left:50px;">
                    <div class="box_heading">Preview</div>
                    <div id="preview_box" style="max-height:400px; overflow:hidden;"></div>

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
            </div><!-- End cols left -->

            <br><br>
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
