<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>
    
    <script> 
        $(function(){
            $("#resnav").load("http://www.simplydevio.us/resources/resnav.html"); 
            $("#footer").load("http://www.simplydevio.us/footer.html");
            checkit();
        });
    </script> 
    
    <title>Profile Greeting Creator</title>
    <link rel="icon" href="http://www.simplydevio.us/new128.png" sizes="128x128">
    
    
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
    if(document.getElementById('password').value == 'oomoo')
    {
        document.getElementById('username').readOnly = false;
        document.getElementById('password_check').innerHTML = '&#x2713;';
        document.getElementById('message').innerHTML = 'Go back to the Directory tab and change my username to yours.';
    }
    else{
    }
}
</script>

	<?php include '../menu1.html' ?>

    <style>
    input[type="submit"]{
        width:120px;
    }
    input[readonly="readonly"], input[readonly]{
        background:#ddd;
        color:#888;
    }
    input.small{
        width:120px;
        padding:0 3px;
    }
    }
    </style>

<div class="section w"><div class="tri tb"></div>

    <div class="content" id="resource">
    
        <table>
        
        <tr>
        
        <!-- Start main content -->
        <td id="left">
        
        <div class="title">Profile Greeting Creator</div>
        <div class="map"><a href="http://www.simplydevio.us/resources/index.php">Resources</a> > Profile Greeting Creator</div>
        
        <div class="descript">
            <p>Create your own Profile Directories with this easy-to-use tool.
            To receive the codes that will allow you to install this directory onto your profile, please 
            <a href="http://fav.me/d73p9tr">purchase the password</a>.</p>

        </div>


        <div class="bigwrapper">
            <div class="formwrap" style="float:left; padding:0;">
            

                <div class="tab_menu">
                    <div id="tab1" class="tabby selected">Directory</div>
                    <div id="tab2" class="tabby not_selected">Uploads</div>
                    <div id="tab5" class="tabby not_selected">Purchase</div>
                </div>
                <form name="la" id="la" method="post">
                <div id="box1" class="tab_page visible">
                    <table>

                        <tr>
                            <td style="width:100px;"><h2>Username</h2></td>
                            <td colspan="3"><input readonly type="text" id="username" name="username" value="<?php if(empty($_POST['username'])) {echo "simplysilent";} else{echo $_POST['username'];} ?>"></td>
                        </tr>
                        <tr>
                            <td style="width:110px;"><h2>Message</h2></td>
                            <td colspan="3"><input type="text" name="message1" value="<?php if(empty($_POST['message1'])) {echo "Hey, visitor!";} else {echo $_POST['message1'];} ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3"><input type="text" name="message2" value="<?php if(empty($_POST['message2'])) {echo "Welcome to my page.";} else {echo $_POST['message2'];} ?>"></td>
                        <tr>
                        <tr>
                            <td><h2>Colors</h2></td>
                            <td><input id="color" name="color" class="color" max="6" value="<?php echo $_POST['color']; ?>"></td>
                            <td><input id="background" name="background" class="color" max="6" value="<?php if(empty($_POST['background'])) {echo "000000";} else {echo $_POST['background'];} ?>"></td>
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
                            <td>X <input class="small" type="range" id="xpos" name="xpos" min="0" max="200" value="<?php if(empty($_POST['xpos'])) {echo "0";} else {echo $_POST['xpos'];} ?>" onchange="checkit();"><span class="range_label" id="xpos_range"></span></td>
                            <td>Y <input class="small" type="range" id="ypos" name="ypos" min="0" max="200" value="<?php if(empty($_POST['ypos'])) {echo "20";} else {echo $_POST['ypos'];} ?>" onchange="checkit();"><span class="range_label" id="ypos_range"></span></td>
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
                <table id="box2" class="tab_page hidden">
                    
                    

                    

                    </form>
                    <tr>
                        <td></td>
                        <td>
                            Upload a font file (.ttf) below if you'd like to use one that is not already available in the Fonts drop-down menu.
                            <form action=""  method="post" enctype="multipart/form-data">
                            <input type="file" name="file" id="file"><br>
                            <input type="submit" name="submit" value="Submit">
                            </form>
                            <?php echo $image_file?>
                            <br>
                            Click the Update Image button on the Directory tab to update the Fonts menu.
                        </td>

                </table>
                    

                    <?php


                    # Set simplysilent as the initial username
                    if(empty($_POST['username']))
                    {
                        $username = "simplysilent";
                    }
                    else
                    {
                        $username = $_POST['username'];
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

                    $_SESSION['username'] = $username;

                    $filename = "./greeting/" . $username . ".php";
                    $textfilename = "./greeting/" . $username . "info.php";



                    if(isset($_POST['create_image'])) 
                    { 

                        list($r, $g, $b) = sscanf($color, "%02x%02x%02x");
                        list($br, $bg, $bb) = sscanf($background, "%02x%02x%02x");

                    	$file = fopen($filename, "w") or die("Unable to open file!");

                        $_SESSION['username'] = $username;
                        $_SESSION['r'] = $r;
                        $_SESSION['g'] = $g;
                        $_SESSION['b'] = $b;
                        $_SESSION['br'] = $br;
                        $_SESSION['bg'] = $bg;
                        $_SESSION['bb'] = $bb;
                        $_SESSION['message1'] = $message1;
                        $_SESSION['message2'] = $message2;
                        $_SESSION['image_file'] = $_POST['image_file'];
                        $_SESSION['font'] = $_POST['font'];
                        $_SESSION['font_size'] = $_POST['font_size'];
                        $_SESSION['letter_width'] = $_POST['letter_width'];
                        $_SESSION['height'] = $_POST['height'];
                        $_SESSION['xpos'] = $_POST['xpos'];
                        $_SESSION['ypos'] = $_POST['ypos'];
                        $_SESSION['xpos2'] = $_POST['xpos2'];
                        $_SESSION['ypos2'] = $_POST['ypos2'];


                    	$string = "<?php session_start(); include \"../info.php\"; ?>";

                    	fwrite($file, $string);

                
                    	fclose($file);

                        $textfile = fopen($textfilename, "w") or die("Unable to open file!");

                        $textstring = $username;

                        fwrite($textfile, $textstring);
                        fclose($textfile);
                    }

                    if(isset($_POST['delete']))
                    {
                    	unlink($filename);
                    	echo "deleted";
                    }

                    include "upload_file.php";

                    ?>
                     

           

                <div id="box5" class="tab_page hidden">
                    To receive the codes needed to create your profile directory, please purchase the password and type it in below.
                    <br>
                    <input id="password" class="password" placeholder="Password" onchange="password_check()"><span id="password_check"></span>
                    <div id="message"></div>
                    <br>

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

        <div class="right_preview_box">

                <div id="preview_box"><br><br><?php echo "<img src=\"http://www.simplydevio.us/resources/greeting/simplysilent.php\">";?></div>
            </div>

            </div>
            <div class="clear"></div>
            
            <br><br>

            </div>

                </td>
                
                </tr>
                </table>
                Instructions
                
                <ol>
                    <li>Make sure to have a Visitors Widget on your page that is set to "Names" or "Names and Avatars" (you must have a PM).</li>
                    <li>The Visitor Greetor is currently set to my profile. 
        </div>
    </div>




<div class="section footer b">
    <div class="tri tw">&nbsp;</div>

    <div id="footer">&nbsp;</div>
</div>


</body>
</html>