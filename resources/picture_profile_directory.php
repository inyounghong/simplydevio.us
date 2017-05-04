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
    <script type="text/javascript" src="js/picture_profile.js"></script>
    <script type="text/javascript" src="js/profile_tabs.js"></script>

   
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
    <?php include '../includes/menu1.html' ?>

    <?php 
        // Initial arrays
        $img_src_array = array("http://img02.deviantart.net/fdcb/i/2015/146/6/d/the_great_story_by_m0thart-d8uueed.jpg", "d", "d", "d", "d", "d");
        $img_zoom_array = array(270, 0, 0, 0, 0, 0);
        $img_pos_array = array(35, 0, 0, 0, 0, 0);

        $name_array = array("the great story", 0, 0, 0, 0, 0);

    ?>

<div class="section" id="resource">
    <div id="left">
        <div class="title">Profile Directory Creator</div>
        <div class="map"><a href="index.php">Resources</a> > Profile Creator</div>
    
            <!-- Start Journal Box Section -->
            
            <div class="cols lft">
            <form action="" id="profileDirectory" name="example" onchange="checkit(); return false">
                <div class="tab_menu normal">
                    <div class="tabby selected">Directory</div>
                    <div class="tabby">Buttons</div>
                    <div class="tabby">Transitions</div>
                    <div class="tabby">Status</div>
                    <div class="tabby">Purchase</div>
                </div>
                
                <div class="tab_page selected" id="page1">
                    
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
                    
                    <div class="head">Height</div>
                    <div class="inputs">
                        <input id="buttonHeight" type="range" min="0" max="300" value="80">
                        <div class="range_label" id="button_height_range">80</div>
                    </div> 
                    
                    <div class="head">Margin</div>
                    <div class="inputs">
                        <input id="buttonMargin" type="range" min="0" max="20" value="5">
                        <div class="range_label" id="button_margin_range">5</div>
                        <input id="sideMargin" type="range" min="0" max="3.0" value="1.0" step="0.1">
                        <div class="range_label" id="side_margin_range">5</div>
                    </div> 

                    <div class="head">Padding</div>
                    <div class="inputs">
                        <input id="padding" type="range" min="0" max="50" value="5">
                        <div class="range_label" id="button_padding_range">5</div>
                        <input id="padding2" type="range" min="0" max="50" value="5">
                        <div class="range_label" id="button_padding_range2">5</div>
                    </div> 
                    
                    <div class="head">Roundness</div>
                    <div class="inputs">
                        <input id="buttonRadius" type="range" min="0" max="40" value="0">
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
                    </div> 

                </div>

                <div class="tab_page" id="page2">

                    <input name="cols" id="cols" value="2"> Columns 
                    <input name="rows" id="rows" value="3"> Rows <br>
                    

                    <div id="button_names" class="w4">
                        <b>Button Name</b>
                        <!-- Dynamically created -->

                    </div>

                    <div id="button_urls" class="w8">
                        <b>URL or Widget URL</b>
                        <div class="tooltip"><a href="linking_widgets_tutorial.php" target="_blank">?</a><div class="tool_info"><span>Click for a tutorial on how to link widgets</span></div></div>
                        <input name="link" class="link" placeholder="http://">
                        <input name="link" class="link" placeholder="http://">
                        <input name="link" class="link" placeholder="http://">
                        <input name="link" class="link" placeholder="http://">
                        <input name="link" class="link" placeholder="http://">
                        <input name="link" class="link" placeholder="http://">
                    </div>
                    <br>
                    
                    <div id="addLeft" class="add">Add Button</div><br>
                    <div id="removeLeft" class="remove">Remove a Row</div>
                </div>
                
            
                <div class="tab_page" id="page3">
                    <div class="head">Background</div>
                    <div class="inputs">
                        Normal
                        <input id="buttonBackground" class="color" maxlength="6" value="5E4948">
                    </div>

                    <div class="head">Text Color</div>
                        <div class="inputs">Normal
                        <input id="buttonColor" class="color" maxlength="6" value="FFFFFF">
                        Hover
                        <input id="buttonHoverColor" class="color" maxlength="6" value="FFFFFF">
                    </div>

                    <br>

                    <div class="head">Transition Type</div>
                    <div class="inputs">
                        <select id="transition_type">
                            <option value="fade_in">Fade In</option>
                            <option value="fade_out">Fade Out</option>
                            <option value="round_in">Round In</option>
                            <option value="round_out">Round Out</option>
                            <option selected value="slide_up">Slide Up</option>
                            <option value="slide_down">Slide Down</option>
                            <option value="slide_right">Slide Right</option>
                            <option value="slide_left">Slide Left</option>
                        </select>
                    </div>

                    <div id="slide_display">
                        <div class="head">Slide Amount</div>
                        <div class="inputs">
                        
                            <input id="slide" type="range" min="10" max="50" value="20">
                            <div class="range_label" id="slide_range">0.2</div>
                        </div>
                    </div>

                    <div class="head">Transition Speed</div>
                    <div class="inputs">
                        <input id="transition_speed" type="range" min="0" max="3.0" value="0.2" step="0.1">
                        <div class="range_label" id="transition_speed_range">0.2</div>
                    </div>


                </table>
                

                
            </div>
                
                
            

            <div class="tab_page" id="page4">
                <div id="button_images" class="visible">
                    <b>Button Image</b>
                    
                
                </div> 
            </div>

            <div class="tab_page" id="page5">
                To receive the codes needed to create your profile directory, please purchase the password and type it in below.
                <br>
                <input id="password" class="password" placeholder="Password">
                <div id="message"></div>
                <br>
                <a href="http://fav.me/d73p9tr" class="buy">Purchase Password</a>
            </div>

            </form>
        </div>
            <div class="cols rgt">
            <div class="right_preview_box">
                <div class="box_heading">Preview</div>
                <div id="preview_box">
                    <div id="imports"></div>
                    <div id="styling">
                    </div>
                    <!-- DA coding -->
                    <div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body">
                    <div class="text">
                        <div class="columns" id="columns">

                            <!-- Dynamically created button previews -->

                        </div>
                    </div>
                    <div class="bottom"><a class="a commentslink" href="http://sta.sh/023q9vb62a0q#comments">No Comments</a></div></div>



                </div>
                <div class="notice">DeviantART has a max height of 350px, so anything below this line will be cut off!</div>
            </div>
            </div>
        
            
            <div class="cols lft">
                Need help using the codes below? Read this step-by-step <a href="http://www.simplydevio.us/resources/profile_tutorial.php" target="_blank">tutorial</a>.
                <br><br>
                <div class="codes">
                    <div class="ctab_menu">
                        <div class="ctabby selected">Widget</div>
                        <div class="ctabby">HTML</div>
                        <div class="ctabby">CSS</div>
                    </div>
                    <div id="cpage1" class="ctab_page selected">
                        <b>Widget Code</b>
                        <p>Paste into the text box of your Featured Deviation Widget</p>
                        <textarea id="widgetArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cpage2" class="ctab_page">
                        <b>HTML Code</b>
                        <p>Paste into the text box of your journal in Sta.sh Writer</p>
                        <textarea id="htmlArea" class="textArea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cpage3" class="ctab_page">
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


<?php include '../includes/footer.html'; ?>

</body>
</html>