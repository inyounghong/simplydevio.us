<!DOCTYPE html>
<html>
<head>
    <title>Make Your Own Profile Directory for DeviantART | Simplydevio.us</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Profile Directory creator for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/main2.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/form.css" media="screen" />
    
    <?php include '../includes/fonts.html' ?>
    
    <script src="../js/jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/jscolor.js"></script>
    <script type="text/javascript" src="js/profile_tabs.js"></script>
    <script type="text/javascript" src="js/profile_directory.js"></script>
    
    
   
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
<?php include 'codes/directory_functions.php' ?>

    <?php include '../includes/menu1.html' ?>

<div class="section" id="resource">
    <div id="left">
        <div class="title">Profile Directory Creator</div>
        <div class="map"><a href="index.php">Resources</a> > Profile Creator</div>
    
            <!-- Start Journal Box Section -->

            <div class="cols lft">
            <form action="" id="profileDirectory" name="example" onchange="checkit()">
                <div class="tab_menu normal">
                    <div id="custom_box_link" class="tabby selected">Directory</div>
                    <div id="buttons_link" class="tabby not_selected">Colors</div>
                    <div id="button_name_link" class="tabby not_selected">Buttons</div>
                    <div id="status_link" class="tabby not_selected">Status</div>
                    <div id="buy_link" class="tabby not_selected">Purchase</div>
                </div>
                
                <div id="page1" class="tab_page selected">
                    
                    <div class="head">Background</div>
                    <div class="inputs">
                        <input class="i85" id="customBackground" placeholder="Image Source URL">
                        <div class="tooltip"><a href="http://www.simplydevio.us/resources/image_tutorial.php">?</a><div class="tool_info"><span>Click for a tutorial</span></div></div>
                    </div>
                    
                    <div class="head">Font Name</div>
                    <div class="inputs">
                        <input class="i85" id="buttonFontFamily" value="Open Sans">
                        <div class="tooltip">?<div class="tool_info"><span>Use a websafe font or Google Font here</span></div></div>
                    </div>

                    <div class="head">Font Style</div>
                    <div class="inputs">
                        <input type="checkbox" id="italic"  class="check"> <label for="italic">Italic</label>
                        <input type="checkbox" id="bold"  class="check"> <label for="bold">Bold</label>
                        <input type="checkbox" id="letter_spacing"  class="check"> <label for="letter_spacing">Letter Spacing</label>
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
                        <input id="buttonRadius" type="range" min="0" max="50" value="0">
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
                    </div> 

                </div>
                
            
                <div class="tab_page" id="page2">
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
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><b>Description</b></td>
                        <td colspan="2"><input id="descriptionColor" class="color" maxlength="6" value="000000"></td>
                    </tr>
                    <tr>
                        <td>Font Style</td>
                        <td colspan="4"><input type="checkbox" id="status_italic"  class="check"> <label for="status_italic">Italic</label>
                        <input type="checkbox" id="status_bold"  class="check"> <label for="status_bold">Bold</label>
                        <input type="checkbox" id="status_letter_spacing"  class="check"> <label for="status_letter_spacing">Letter Spacing</label></td>
                    </tr>
                    <tr>
                        <td>Font Size</td>
                        <td colspan="4"><input id="status_font_size" type="range" min="0" max="30" value="14">
                        <div class="range_label" id="button_size_range">14</div></td>
                    </tr>
                </table>

                <input type="checkbox" id="includeTransition" class="check" checked><label for="includeTransition"> Include Transitions</label>
                
            </div>
                
                
            <div class="tab_page" id="page3">
                <b>Columns</b>&nbsp;&nbsp;&nbsp;
                <input type="text" id="num_cols" class="small" value="2"><br>

                <div id="button_names" class="w4">
                    <b>Button Name</b>
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                    <input class="name" name="butName" value="My Button">
                </div>

                <div id="button_urls" class="w7">
                    <b>URL or Widget URL</b>
                    <div class="tooltip"><a href="linking_widgets_tutorial.php" target="_blank">?</a><div class="tool_info"><span>Click for a tutorial on how to link widgets</span></div></div>
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                    <input name="butLink" class="url" placeholder="http://">
                </div>

                <div id="button_long" class="w1">
                    <b>Long</b><br>
                    <input type="checkbox" class="check long" id="long0" checked>
                    <input type="checkbox" class="check long" id="long1">
                    <input type="checkbox" class="check long" id="long2">
                    <input type="checkbox" class="check long" id="long3">
                    <input type="checkbox" class="check long" id="long4">

                </div>

                
                <div id="addLeft" class="add">Add Button</div><br>
                <div id="removeLeft" class="remove">Remove a Row</div>
            </div>


            <div class="tab_page" id="page4">
                
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


            <div class="tab_page" id="page5">
                To receive the codes needed to create your profile directory, please purchase the password and type it in below.
                <br>
                <input id="password" class="password i85" placeholder="Password">
                <div id="message"></div>
                <br>
                <a href="http://fav.me/d73p9tr" class="buy">Purchase Password</a>
            </div>

            </form>
        </div>
            <div class="cols rgt">
            <div class="right_preview_box">
                <div id="imports"></div>
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
                        <div class="ctabby selected">Widget</div>
                        <div class="ctabby">HTML</div>
                        <div class="ctabby">CSS</div>
                    </div>
                    <div id="cpage1" class="ctab_page selected">
                        <b>Widget Code</b>
                        <p>Paste into the text box of your Featured Deviation Widget</p>
                        <textarea id="widgetArea" class="textarea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cpage2" class="ctab_page">
                        <b>HTML Code</b>
                        <p>Paste into the text box of your journal in Sta.sh Writer</p>
                        <textarea id="htmlArea" class="textarea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                    <div id="cpage3" class="ctab_page">
                        <b>CSS Code</b>
                        <p>Paste into the main Skin CSS section of your journal</p>
                        <textarea id="cssArea" class="textarea">These codes will appear once you purchase and type in the password.</textarea>
                    </div>
                </div>
            </div>
            
            <br><br>
            </div>
        </td>
        
        </tr>
        </table>

        <div class="versionlog">
            <ul>
                <li>v.3 Updated July 7, 2015</li>
                <li><a href="profile_directory_v2.php">v.2</a> Updated January, 2015</li>
        </div>
        
        </div>
    </div>
<div class="section footer b">
    <div id="footer">&nbsp;</div>
</div>


<?php include '../includes/footer.html'; ?>

</body>
</html>