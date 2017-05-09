<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Gallery Directory creator for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, gallery, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscolor.js"></script>

    <title>Profile Greeting Creator</title>
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
function checkit(){
    document.getElementById("height_range").innerHTML = document.getElementById("height").value;
    document.getElementById("letter_width_range").innerHTML = document.getElementById("letter_width").value;
    document.getElementById("font_size_range").innerHTML = document.getElementById("font_size").value;
    document.getElementById("xpos_range").innerHTML = document.getElementById("xpos").value;
    document.getElementById("ypos_range").innerHTML = document.getElementById("ypos").value;
    document.getElementById("xpos2_range").innerHTML = document.getElementById("xpos2").value;
    document.getElementById("ypos2_range").innerHTML = document.getElementById("ypos2").value;

}
function password_check()
{
    if(document.getElementById('password').value == 'schatz')
    {
        document.getElementById('username').readOnly = false;
        document.getElementById('message').innerHTML = '&#x2713;';
        document.getElementById('notice').innerHTML = 'Go back to the Directory tab and change my username to yours. This will make the image read your visitor widget instead of mine.';
    }
    else{
    }
}
function submit_form(){
    document.forms["la"].submit();
}
</script>
	<?php include '../includes/menu1.html' ?>
    <style>
    input[type="submit"]{
        width:120px;
    }
    input[readonly="readonly"], input[readonly]{
        background:#ddd;
        color:#888;
    }
    input.small{
        width:70%;
        padding:0 3px;
    }
    td.half{
        width:40%;
    }
    input.three{
        width:20px;
    }
    }
    </style>
<div class="section" id="resource">
    <div class="content">

        <!-- Start main content -->
        <div id="left">

        <div class="title">Profile Greeting Creator</div>
        <div class="map"><a href="index.php">Resources</a> > Profile Greeting Creator</div>
        <div class="cols even">
            <div class="formwrap" style="padding:0;">
                <div class="tab_menu">
                    <div id="tab1" class="tabby selected">Directory</div>
                    <div id="tab2" class="tabby not_selected">Upload</div>
                    <div id="tab5" class="tabby not_selected">Purchase</div>
                </div>
                <form name="la" id="la" method="post">
                <div id="box1" class="tab_page visible">
                    <table>
                        <tr>
                            <td class="w25"><h2>Username</h2></td>
                            <td class="full">
                                <input readonly type="text" id="username" name="username" value="<?php if(empty($_POST['username'])) {echo "simplysilent";} else{echo $_POST['username'];} ?>">
                                <div class="tooltip">?<div class="tool_info"><span>You'll be able to put your own username here once you purchase the password.</span></div></div>
                                <input style="display:none" readonly class="three" type="text" maxlength="2" id="pin" name="pin" value="<?php if(empty($_POST['pin'])) {echo rand(1,10);} else {echo $_POST['pin'];} ?>"></td>
                        </tr>
                        <tr>
                            <td style="width:110px;"><h2>Message</h2></td>
                            <td colspan="3"><input type="text" name="message1" value="<?php if(empty($_POST['message1'])) {echo "Hey, visitor!";} else {echo $_POST['message1'];} ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3"><input type="text" name="message2" placeholder="Message Line 2" value="<?php if(empty($_POST['message2'])) {echo "Hey, visitor!";} else {echo $_POST['message2'];} ?>"></td>
                        <tr>
                        <tr>
                            <td><h2>Colors</h2></td>
                            <td><input id="color" name="color" class="color" max="6" value="<?php echo $_POST['color']; ?>">
                            <input id="background" name="background" class="color" max="6" value="<?php if(empty($_POST['background'])) {echo "000000";} else {echo $_POST['background'];} ?>"></td>
                        </tr>
                        <tr>
                            <td><h2>Font</h2></td>
                            <td colspan="3">
                                <select name="font" value="<?php echo $_POST['font']; ?>" >
                                    <?php
                                    $dir    = 'greeting/uploaded_fonts';
                                    $files1 = scandir($dir);
                                    $i = 2;
                                    while ($i < count($files1))
                                    {
                                        if ($files1[$i] == $_POST['font'])
                                        {
                                            echo '<option selected value="';
                                        }
                                        else
                                        {
                                            echo '<option value="';
                                        }

                                        echo $files1[$i];
                                        echo '">';
                                        echo $files1[$i];
                                        echo '</option>"';
                                        $i++;
                                    }
                                    ?>
                                </select>
                                <div class="tooltip">?<div class="tool_info"><span>Use one of the fonts here or upload your own by clicking the "Upload" tab.</span></div></div>
                            </td>


                        </tr>
                        <tr>
                            <td><h2>Font Size</h2></td>
                            <td colspan="3"><input type="range" name="font_size" id="font_size" min="1" max="50" value="<?php if(empty($_POST['font_size'])) {echo "15";} else {echo $_POST['font_size'];} ?>" onchange="checkit()"><span class="range_label" id="font_size_range"></span></td>
                        </tr>
                        <tr>
                            <td><h2>Height</h2></td>
                            <td colspan="3"><input type="range" id="height" name="height" min="10" max="200" value="<?php if(empty($_POST['height'])) {echo "50";} else {echo $_POST['height'];} ?>" onchange="checkit();"><span class="range_label" id="height_range"></span></td>
                        </tr>
                        <tr>
                            <td><h2>Width</h2></td>
                            <td colspan="3"><input type="range" id="letter_width" name="letter_width" min="1" max="50" value="<?php if(empty($_POST['letter_width'])) {echo "10";} else {echo $_POST['letter_width'];} ?>" onchange="checkit();"><span class="range_label" id="letter_width_range"></span></td>
                        </tr>
                        <tr>
                            <td><h2>Position 1</h2></td>
                            <td class="half">X <input class="small" type="range" id="xpos" name="xpos" min="0" max="200" value="<?php if(empty($_POST['xpos'])) {echo "0";} else {echo $_POST['xpos'];} ?>" onchange="checkit();"><span class="range_label" id="xpos_range"></span></td>
                            <td class="half">Y <input class="small" type="range" id="ypos" name="ypos" min="0" max="200" value="<?php if(empty($_POST['ypos'])) {echo "20";} else {echo $_POST['ypos'];} ?>" onchange="checkit();"><span class="range_label" id="ypos_range"></span></td>
                        </tr>
                        <tr>
                            <td><h2>Position 2</h2></td>
                            <td >X <input class="small" type="range" id="xpos2" name="xpos2" min="0" max="200" value="<?php if(empty($_POST['xpos2'])) {echo "0";} else {echo $_POST['xpos2'];} ?>" onchange="checkit();"><span class="range_label" id="xpos2_range"></span></td>
                            <td >Y <input class="small" type="range" id="ypos2" name="ypos2" min="0" max="200" value="<?php if(empty($_POST['ypos2'])) {echo "50";} else {echo $_POST['ypos2'];} ?>" onchange="checkit();"><span class="range_label" id="ypos2_range"></span></td>
                        </tr>
                        <tr>
                            <td><h2></h2></td>
                            <td><input type="submit" value="Update Image" name="create_image" style="background:#e03e56; padding:10px 5px; height:40px; border:none; color:#fff;"></td>
                            <!-- <td><input type="submit" value="Delete" name="delete"></td>-->
                        </tr>
                    </table>
                </div>
                <div id="box2" class="tab_page hidden">
                    Upload a font file (.ttf) below if you'd like to use one that is not already available in the Fonts drop-down menu.
                    <form action=""  method="post" enctype="multipart/form-data">
                    <input type="file" name="file" id="file"><br>
                    <input type="submit" name="submit" value="Submit">
                    </form>
                    <?php echo $image_file?>
                    <br>
                    Click the Update Image button on the Directory tab to update the Fonts menu.
                </div>

                    <?php
                    # Set simplysilent as the initial username
                    if(empty($_POST['username']))
                    {
                        $username = "simplysilent";
                        $pin = '';
                    }
                    else
                    {
                        $username = $_POST['username'];
                        $pin = $_POST['pin'];
                    }

                    $color = $_POST['color'];
                    $background = $_POST['background'];
                    $message1 = $_POST['message1'];
                    $message2 = $_POST['message2'];
                    $image_file = $_POST['image_file'];
                    $font = $_POST['font'];
                    $font_size = $_POST['font_size'];
                    $letter_width = $_POST['letter_width'];
                    $xpos = $_POST['xpos'];
                    $ypos = $_POST['ypos'];
                    $xpos2 = $_POST['xpos2'];
                    $ypos2 = $_POST['ypos2'];
                    $height = $_POST['height'];
                    if($username == 'simplysilent'){
                        $pin = '';
                        $filename = "./greeting/" . $username . ".php"; # Real version
                        $display_filename = "./greeting/" . $username . "2.php"; # Display version
                    }
                    else
                    {
                        $filename = "./greeting/" . $username . $pin . ".php"; # Real version
                        $display_filename = "./greeting/" . $username . $pin . "2.php"; # Display version
                    }
                    if(isset($_POST['create_image']))
                    {
                        list($r, $g, $b) = sscanf($color, "%02x%02x%02x");
                        list($br, $bg, $bb) = sscanf($background, "%02x%02x%02x");
                        $r = $r;
                    	$file = fopen($filename, "w") or die("Unable to open file!");
                    	$string = "<?
session_start();
header('Content-type: image/png');
$" . "visitor = exec(\"python ../image.py '$username'\");
$" . "new_message1 = str_replace(\"visitor\",$" . "visitor, '$message1');
$" . "new_message2 = str_replace(\"visitor\",$" . "visitor, '$message2');
$" . "font = './uploaded_fonts/' . '$font';
# Determine the longer of the two  messages
if (strlen($" . "new_message2) > 0)
{
    if (strlen($" . "new_message1) <= strlen($" . "new_message2))
    {
        $" . "longer_message = $" . "new_message2;
    }
    else
    {
        $" . "longer_message = $" . "new_message1;
    }
}
else
{
    $" . "longer_message = $" . "new_message1;
}
$" . "width  = ($letter_width * strlen($" . "longer_message));
$" . "im = imagecreatetruecolor ($" . "width,$height);
$" . "background = imagecolorallocate($" . "im, $br, $bg, $bb);
imagefill($" . "im,0,0,$" . "background);
$" . "color = imagecolorallocate($" . "im, $r, $g, $b);
imagettftext($" . "im, $font_size, 0, $xpos, $ypos, $" . "color, $" . "font, $" . "new_message1);
imagettftext($" . "im, $font_size, 0, $xpos2, $ypos2, $" . "color, $" . "font, $" . "new_message2);
imagepng($" . "im);
imagedestroy($" . "im);
?>";
                    	fwrite($file, $string);
                    	fclose($file);
                        $file = fopen($display_filename, "w") or die("Unable to open file!");
                        $string = "<?
session_start();
header('Content-type: image/png');
$" . "visitor = exec(\"python ../image_with_name.py '$username'\");
$" . "new_message1 = str_replace(\"visitor\",$" . "visitor, '$message1');
$" . "new_message2 = str_replace(\"visitor\",$" . "visitor, '$message2');
$" . "font = './uploaded_fonts/' . '$font';
# Determine the longer of the two  messages
if (strlen($" . "new_message2) > 0)
{
    if (strlen($" . "new_message1) <= strlen($" . "new_message2))
    {
        $" . "longer_message = $" . "new_message2;
    }
    else
    {
        $" . "longer_message = $" . "new_message1;
    }
}
else
{
    $" . "longer_message = $" . "new_message1;
}
$" . "width  = ($letter_width * strlen($" . "longer_message));
$" . "im = imagecreatetruecolor ($" . "width,$height);
$" . "background = imagecolorallocate($" . "im, $br, $bg, $bb);
imagefill($" . "im,0,0,$" . "background);
$" . "color = imagecolorallocate($" . "im, $r, $g, $b);
imagettftext($" . "im, $font_size, 0, $xpos, $ypos, $" . "color, $" . "font, $" . "new_message1);
imagettftext($" . "im, $font_size, 0, $xpos2, $ypos2, $" . "color, $" . "font, $" . "new_message2);
imagepng($" . "im);
imagedestroy($" . "im);
?>";
                        fwrite($file, $string);
                        fclose($file);
                    }
                    if(isset($_POST['delete']))
                    {
                    	unlink($filename);
                    	echo "deleted";
                    }
                    include "upload_file.php";
                    ?>


                <div id="box5" class="tab_page hidden">
                    To generate your own greeting image, please purchase the password and type it in below. <a href="http://fav.me/d7xy8te">Purchase Password</a>.
                    <br>
                    <input id="password" class="password" placeholder="Password" onchange="password_check()"><span id="message"></span>
                    <div id="notice"></div>
                    <br>
                    <div class="note">
                        <ul>
                            <li>You must be a Premium Member for this image to work</li>
                            <li>Make sure to have a Visitors Widget on your page. Set it to "Names" or "Names and Avatars".</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
<script>
// Toggles tab select
function toggle(){
    $("#tab1").attr('class', 'tabby not_selected');
    $("#tab2").attr('class', 'tabby not_selected');
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
$("#tab5").click(toggle);
$("#tab1").click(function(){
    box_toggle();
    $("#box1").attr('class', 'tab_page visible');
});
$("#tab2").click(function(){
    box_toggle();
    $("#box2").attr('class', 'tab_page visible');
});
$("#tab5").click(function(){
    box_toggle();
    $("#box5").attr('class', 'tab_page visible');
});
</script>
    <div class="cols even">
        <div class="right_preview_box">
                <div class="ptab_menu">
                    <div id="ptab1" class="tabby selected g">Preview</div>
                    <div id="ptab2" class="tabby not_selected g">HTML</div>
                </div>
                <div class="page_wrap">
                    <div id="pbox1" class="tab_page visible">
                        Create/update the image by clicking the "Update Image" button after each change.<br><br>
                        <?php echo "<img src=\"greeting/" . $username . $pin . "2.php\">";?></div>
                    </div>
                    <div id="pbox2" class="tab_page hidden">
                        <p>Copy and paste one of the codes into a widget:</p>

                        <p><b>Recommended:</b> Greets visible deviants by name and displays "visitor" for all other visitors.</p>
                        <textarea style="width:90%; height:50px;"><?php echo "<img src=\"http://www.simplydevio.us/resources/greeting/" . $username . $pin . ".php\">";?></textarea>

                        <p>Always displays the name of the most recent visitor.</p>
                        <textarea style="width:90%; height:50px;"><?php echo "<img src=\"http://www.simplydevio.us/resources/greeting/" . $username . $pin . "2.php\">";?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearing"></div>

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
</body>
</html>
<script>
// C Pages
function ptoggle(){
    $("#ptab1").attr('class', 'tabby not_selected g');
    $("#ptab2").attr('class', 'tabby not_selected g');
    $(this).attr('class', 'tabby selected g');
}
// Toggles box visibility
$("#ptab1").click(ptoggle);
$("#ptab2").click(ptoggle);
function pbox_toggle(){
    $("#pbox1").attr('class', 'tab_page ppage hidden');
    $("#pbox2").attr('class', 'tab_page ppage hidden');
}
$("#ptab1").click(function(){
    pbox_toggle();
    $("#pbox1").attr('class', 'tab_page ppage visible');
});
$("#ptab2").click(function(){
    pbox_toggle();
    $("#pbox2").attr('class', 'tab_page ppage visible');
});
</script>
<?php include '../includes/footer.html'; ?>
