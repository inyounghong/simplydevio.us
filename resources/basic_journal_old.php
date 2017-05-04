<!DOCTYPE html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link href="http://simplydevio.us/main.css" media="screen" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Lobster+Two:400,700" rel="stylesheet" type="text/css" />
	
    <title>Journal Skin Creator</title>
	
    <link href="http://www.simplydevio.us/new128.png" rel="icon" sizes="128x128" />
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>

    <style>
        input[type=range]{
            width:150px;
            padding:0;
        }

        .font{
            width:150px;
        }

        .heading{
            width:85px;
            display:inline-block;
        }

        .preview_box a{
            color:none!important;
        }

        .gr-box, .gr-body{
            position:relative;
            overflow:hidden;
        }

    </style>
    
    <script> 
    $(function(){
        $("#footer").load("http://www.simplydevio.us/footer.html");
        checkit();
	});</script>
    
    <script type="text/javascript">
 $(document).ready(function(){
 $("#useimage").click(function(){
 	$("#boximagerow").toggle();});
 $("#useimagetop").click(function(){
 	$("#topimagerow").toggle();});
 $("#useimagetxt").click(function(){
 	$("#txtimagerow").toggle();});
 $("#useimagebot").click(function(){
 	$("#botimagerow").toggle();});
  $("#useimageblock").click(function(){
    $("#blockimagerow").toggle();});
 $("#includemaxwidth").click(function(){
 	$("#boxwidthcol").toggle();});
 $("#useboxborder").click(function(){
    $("#boxborderdiv").toggle();});
 }); 
 
 

</script>

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

<?php include 'codes/functions.php' ?>

<script type="text/javascript">



function checkit()

{

    var gatsby = '<p><h1>Heading 1</h1><b>In my younger</b> and more vulnerable years my father gave me some advice that I’ve been turning over in my mind ever since. "Whenever you feel like criticizing any one," he told me, "just remember that all the people in this world haven’t had the advantages that you’ve had." <a class="username" href="http://simplysilent.deviantart.com">SimplySilent</a></p> <br><blockquote>He didn’t say any more, but we’ve always been unusually communicative in a reserved way, and I understood that he meant a great deal more than that. In consequence, I’m inclined to reserve all judgments, a habit that has opened up many curious natures to me and also made me the victim of not a few veteran bores.</blockquote><br> <p>The abnormal mind is quick to detect and attach itself to this quality when it appears in a normal person, and so it came about that in college I was unjustly accused of being a politician, because I was privy to the secret griefs of wild, unknown men. Most of the confidences were unsought—frequently I have feigned sleep, preoccupation, or a hostile levity when I realized by some unmistakable sign that an intimate revelation was quivering on the horizon; for the intimate revelations of young men, or at least the terms in which they express them, are usually plagiaristic and marred by obvious suppressions. Reserving judgments is a matter of infinite hope.</p> <p>I am still a little afraid of missing something if I forget that, as my father snobbishly suggested, and I snobbishly repeat, a sense of the fundamental decencies is parcelled out unequally at birth.And, after boasting this way of my tolerance, I come to the admission that it has a limit. Conduct may be founded on the hard rock or the wet marshes, but after a certain point I don’t care what it’s founded on. When I came back from the East last autumn I felt that I wanted the world to be in uniform and at a sort of moral attention forever; I wanted no more riotous excursions with privileged glimpses into the human heart. Only Gatsby, the man who gives his name to this book, was exempt from my reaction—Gatsby, who represented everything for which I have an unaffected scorn.</p>';
    var css = '<style type="text/css">\n\n';
    textstring = '';
    textstring += '*{background:none; \nborder:none; \npadding:0; \nmargin:0;} \n\n';
    textstring += '.gr{padding:0 !important;}\n';
    textstring += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    textstring += 'a.external:after {display:none;}\n\n';
 
// GR-BOX SECTION
 

    textstring += '.gr-box{\n';
    
    background_color('boxbackcolor', 'boxTransparent');
    bpos = document.example.boxbpos.options[document.example.boxbpos.selectedIndex].value
    brep = document.example.boxbrep.options[document.example.boxbrep.selectedIndex].value
    background_image('boxbackimage');
    border_radius('boxradius');
	
	// Max Width
	var boxwidth = document.getElementById('boxwidth');
	
	if (document.getElementById('includemaxwidth').checked && boxwidth.value != '') {
		textstring += '\nmax-width: ' + boxwidth.value + 'px;';
		textstring += '\nmargin: 0 auto;';}
	else {
		textstring += ''; }

    use_border('useboxborder', 'boxbordercolor', 'boxborderwidth', 'boxborderstyle');

	textstring += '}\n\n';

 // GR-TOP JUNK
 
    textstring += '.gr-top{\n';
 
    background_color('topbackcolor', 'topTransparent');
    bpos = document.example.topbrep.options[document.example.topbrep.selectedIndex].value
    brep = document.example.topbpos.options[document.example.topbpos.selectedIndex].value
    background_image('topbackimage');

	var height = document.getElementById('topheight').value;
	var percent = document.getElementById('topalign').value;

    var top_padding = Math.round(percent * 0.01 * height);
    var bottom_padding = height - top_padding;
    var side_padding = document.getElementById('toppadding').value;

    textstring += '\npadding: ' + top_padding + 'px ' + side_padding + '% ' + bottom_padding + 'px ' + side_padding + '%;';

	text_align(document.example.timealign.options[document.example.timealign.selectedIndex].value)
	
	textstring += '}\n\n';
	
// GR-TOP TITLE JUNK

    textstring += '.gr-top h2, .gr-top h2 a{\n';
	font_color_imp('titlecolor');
    font_family('titlefont');
	font_size('titlesize');
	text_align(document.example.titlealign.options[document.example.titlealign.selectedIndex].value);
	text_transform(document.example.titletransform.options[document.example.titletransform.selectedIndex].value);
	textstring += '}\n\n';
	
// GR-TOP TIMESTAMP JUNK

    textstring += '.gr-top .timestamp{\n';
	font_color('timecolor');
    font_family('timefont');
	font_size('timesize');
	text_transform(document.example.timetransform.options[document.example.timetransform.selectedIndex].value);
	textstring += '}\n\n';
	
		
 // TEXT JUNK
 
    textstring += '.text{\n';
 
    background_color('txtbackcolor', 'txtTransparent');

    bpos = document.example.txtbrep.options[document.example.txtbrep.selectedIndex].value;
    brep = document.example.txtbpos.options[document.example.txtbpos.selectedIndex].value;
    background_image('txtbackimage');
    border_radius('textradius');

	
	// Text Color
	font_color('maincolor');
    font_family('mainfont');
	font_size('mainsize');
	text_align(document.example.mainalign.options[document.example.mainalign.selectedIndex].value);
    textstring += '\nline-height: ' + document.getElementById('mainline').value + 'px;';
	
	// Text Padding
	textstring += '\npadding: '
    
    var verpadding = document.getElementById('verpadding').value;
	var horpadding = document.getElementById('horpadding').value;
    vPixel(verpadding);
    hPercent(horpadding);
    
    textstring += vpix + hper + vpix + hper + ';';
    
    // Text Margin
	textstring += '\nmargin: '
	
	var verpadding = document.getElementById('vermargin').value;
	var horpadding = document.getElementById('hormargin').value;
    vPixel(verpadding);
    hPercent(horpadding)
    
    textstring += vpix + hper + vpix + hper + ';';
	textstring += '}\n\n';

    textstring += '.text a{';
    font_color_imp('linkcolor');
    font_family('linkfont');
    textstring += '}\n\n';

    // Blockquote
    textstring += 'blockquote{\n';
    background_color('blockbackcolor', 'blockTransparent');
    bpos = document.example.blockbrep.options[document.example.blockbrep.selectedIndex].value
    brep = document.example.blockbpos.options[document.example.blockbpos.selectedIndex].value
    background_image('blockbackimage');
    font_color_imp('blockcolor');
    font_family('blockfont');
    font_size('blocksize');
    text_align(document.example.blockalign.options[document.example.blockalign.selectedIndex].value);
    text_transform(document.example.blocktransform.options[document.example.blocktransform.selectedIndex].value);
    border_radius('blockradius');
    textstring += 'padding:' + document.getElementById('blockpadding').value + 'px;\n';
    textstring += '}\n\n';
	
	
 // GR-BOTTOM JUNK
 
    textstring += '.bottom{\n';

    background_color('botbackcolor', 'botTransparent');
    
    bpos = document.example.botbrep.options[document.example.botbrep.selectedIndex].value
    brep = document.example.botbpos.options[document.example.botbpos.selectedIndex].value
    background_image('botbackimage');

	var height = document.getElementById('botheight').value;
    var percent = document.getElementById('botalign').value;

    var top_padding = Math.round(percent * 0.01 * height);
    var bottom_padding = height - top_padding;
    var side_padding = document.getElementById('botpadding').value;

    textstring += '\npadding: ' + top_padding + 'px ' + side_padding + '% ' + bottom_padding + 'px ' + side_padding + '%;';
		
	// Comment Align
	textstring += '\ntext-align: ' + document.example.commentalign.options[document.example.commentalign.selectedIndex].value + ';';
		
	textstring += '}\n\n';
		
// GR-BOTTOM COMMENTSLINK JUNK

	textstring += '.commentslink{\n';
	font_color_imp('commentcolor');
    font_family('commentfont');
	font_size('commentsize');
	text_transform(document.example.commenttransform.options[document.example.commenttransform.selectedIndex].value);
	
	textstring += '}\n\n';
	
    textstring += '.credit{\n';
    textstring += 'left:0;\n';
    textstring += 'width:100%;\n';
    textstring += 'text-align:center;\n';
    textstring += 'position: absolute;\n';
    textstring += 'bottom: 10px;}\n\n';

    textstring += '.credit, .credit a{\n';
    textstring += 'text-decoration:none;'
    textstring += 'color: #222!important;\n';
    textstring += 'font-size: 10px;}\n\n';
	// Write textstring to the textarea.

    set_range('box_radius_range', 'boxradius');
    set_range('box_border_range', 'boxborderwidth');

    set_range('top_height_range', 'topheight');
    set_range('time_size_range', 'timesize');
    set_range('title_size_range', 'titlesize');

    set_range('main_size_range', 'mainsize');
    set_range('main_line_range', 'mainline');
    set_range('text_radius_range', 'textradius');
    set_range('block_size_range', 'blocksize');
    set_range('block_radius_range', 'blockradius');
    set_range('block_padding_range', 'blockpadding');

    set_range('hor_padding_range', 'horpadding');
    set_range('ver_padding_range', 'verpadding');
    set_range('hor_margin_range', 'hormargin');
    set_range('ver_margin_range', 'vermargin');

    set_range('bot_height_range', 'botheight');
    set_range('comment_size_range', 'commentsize');

    document.getElementById("top_align_range").innerHTML = document.getElementById("topalign").value + '%';
    document.getElementById("top_padding_range").innerHTML = document.getElementById("toppadding").value + '%';

    document.getElementById("bot_align_range").innerHTML = document.getElementById("botalign").value + '%';
    document.getElementById("bot_padding_range").innerHTML = document.getElementById("botpadding").value + '%';


	// document.forms['example'].output.value = textstring;
	    document.getElementById("textstringArea").value = textstring;
      
/**/
    var complete_css = '<style> #preview_box{line-height:1em;} #preview_box h2{display:block;} #preview_box h1{font-weight:bold; font-size:18px; color:#414d4c; font-size:18pt; font-family:"Trebuchet MS"; margin-bottom:15px;}';
	complete_css += textstring;
	complete_css += '</style>';

    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
    complete_html += gatsby;
    complete_html += '<div class="credit">Created at <a href="http://www.simplydevio.us/resources/basic_journal.php">simplydevio.us</a></div></div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';

    document.getElementById('preview_box').innerHTML = complete_css + complete_html;


}

function set_range(range, element){
    document.getElementById(range).innerHTML = document.getElementById(element).value;
}

// -->
</script>
</div>
<!-- Start White Section -->

    <?php include '../menu1.html' ?>

<div class="section w">

    <div class="content" id="resource">
        <table>
        
        <tr>
        
        <!-- Start main content -->
        <td id="left">

        <div class="title">Journal Skin Creator</div>
        
        <div class="descript">
			<p>Make your own DeviantART Journal skins using this free and easy-to-use tool.</p>
        </div>

            <!-- Start Journal Box Section -->
            For fonts, you can use either <a href="">Web Safe Fonts</a> or <a href="http://www.google.com/fonts">Google Fonts</a>. 
            Please note that in this website's preview, Google Fonts will not display properly. 
            However, Google Fonts will work normally when pasted into DeviantART's journal CSS.
            <br><br>

            
            <div class="small">

                <form action="" id="profileDirectory" name="example" onsubmit="checkit(); return false">
                    <div class="formfail" style="float:left;">

                    <div class="tab_menu five">
                        <div id="custom_box_link" class="tabby selected">Box</div>
                        <div id="buttons_link" class="tabby not_selected">Top</div>
                        <div id="button_name_link" class="tabby not_selected">Text</div>
                        <div id="status_link" class="tabby not_selected">Bottom</div>
                        <div id="buy_link" class="tabby not_selected">+</div>
                    </div>

                    <!-- Journal Box -->
                    <div id="tab_one" class="tab_page visible">

                        <?php background('boxbackcolor', '9FCE54', 'boxTransparent');?>
                        <?php use_image('useimage', 'boximagerow', 'boxbackimage', 'boxbrep', 'boxbpos');?>

                        <br>
    	                <input type="checkbox" id="includemaxwidth" class="check" onchange="checkit()"><label for="includemaxwidth">Include Max Width</label>

    				    <span id="boxwidthcol" style="display: none" onchange="checkit()">
    					   <input id="boxwidth" class="pixellong" maxlength="4" value="900" onchange="checkit()"> px
                        </span>

                        <?php use_border('useboxborder', 'boxborderdiv', 'boxbordercolor', '222222', 'boxborderstyle', 'boxborderwidth', '15', 'box_border_range');?>

                        <br><span class="heading">Roundness</span>
                        <input id="boxradius" type="range" min="0" max="50" value="0" onchange="checkit()"><span class="range_label" id="box_radius_range"></span>

                    </div>

                    <!-- Journal Top -->

                    <div id="tab_two" class="tab_page hidden">

                        <?php background('topbackcolor', '5E4948', 'topTransparent');?>
                        <?php use_image('useimagetop', 'topimagerow', 'topbackimage', 'topbrep', 'topbpos');?>

                        <hr>

                        <b>Journal Top</b>

                        <br><span class="heading">Height</span>
                        <input id="topheight" type="range" min="0" max="300" value="100" onchange="checkit()"><span class="range_label" id="top_height_range"></span>

                        <br><span class="heading">Padding</span>
                        <input id="toppadding" type="range" min="0" max="30" value="5" onchange="checkit()"><span class="range_label" id="top_padding_range"></span>

                        <hr>

                    	<b>Title Text</b><br>
                        <?php font_css_transform('titlecolor', 'FFFFFF', 'titlefont', 'Verdana', 'titlealign', 'titletransform', 'titlesize', '50', '24', 'title_size_range');?>

                        <br><span class="heading">Position</span>
                        <input id="topalign" type="range" min="0" max="100" value="50" onchange="checkit()"><span class="range_label" id="top_align_range"></span>

                        <hr>

                        <b>Time Stamp</b><br>
                        <?php font_css_transform('timecolor', 'FFFFFF', 'timefont', 'Verdana', 'timealign', 'timetransform', 'timesize', '50', '14', 'time_size_range');?>
    	                
                </div>
                    
                <div id="tab_three" class="tab_page hidden">

                    <?php background('txtbackcolor', 'EEEEEE', 'txtTransparent');?>
                    <?php use_image('useimagetxt', 'txtimagerow', 'txtbackimage', 'txtbrep', 'txtbpos');?>
    				
                    <br><span class="heading">Roundness</span>
                    <input id="textradius" type="range" min="0" max="50" value="0" onchange="checkit()"><span class="range_label" id="text_radius_range"></span>

                    <hr>

                    <b>Text</b><br>

                    <?php font_css('maincolor', '222222', 'mainfont', 'Verdana', 'mainalign', 'mainsize', '20', '14', 'main_size_range');?>

                    <span class="heading">Line Height</span>
                    <input id="mainline" type="range" min="0" max="25" value="14" onchange="checkit()"><span class="range_label" id="main_line_range"></span>

                    <hr>

                    <b>Padding</b>
                    <br><span class="heading">Sides</span><input id="horpadding" type="range" min="0" max="20" value="5" onchange="checkit()"><span class="range_label" id="hor_padding_range"></span>
                    <br><span class="heading">Vertical</span><input id="verpadding" type="range" min="0" max="100" value="30" onchange="checkit()"><span class="range_label" id="ver_padding_range"></span>
                    <br>
                    
                    <b>Margin</b>
                    <br><span class="heading">Sides</span><input id="hormargin" type="range" min="0" max="20" value="5" onchange="checkit()"><span class="range_label" id="hor_margin_range"></span>
                    <br><span class="heading">Vertical</span><input id="vermargin" type="range" min="0" max="100" value="30" onchange="checkit()"><span class="range_label" id="ver_margin_range"></span>


                </div>


                <div id="tab_four" class="tab_page hidden">

                    <?php background('botbackcolor', '5E4948', 'botTransparent');?>
                    <?php use_image('useimagebot', 'botimagerow', 'botbackimage', 'botbrep', 'botbpos');?>

                    <hr>

                    <b>Journal Bottom</b>

                    <br><span class="heading">Height</span>
                    <input id="botheight" type="range" min="0" max="300" value="100" onchange="checkit()"><span class="range_label" id="bot_height_range"></span>

                    <br><span class="heading">Padding</span>
                    <input id="botpadding" type="range" min="0" max="30" value="5" onchange="checkit()"><span class="range_label" id="bot_padding_range"></span>

                    <hr>

                    <b>Comments</b><br>

                    <?php font_css_transform('commentcolor', 'FFFFFF', 'commentfont', 'Verdana', 'commentalign', 'commenttransform', 'commentsize', '30', '14', 'comment_size_range');?>

                    <br><span class="heading">Position</span>
                    <input id="botalign" type="range" min="0" max="100" value="50" onchange="checkit()"><span class="range_label" id="bot_align_range"></span>
                
                    <br><br>
                    
                </div>

                <div id="tab_five" class="tab_page hidden">
                    <b>Links</b>
                    <br><input id="linkcolor" class="color" maxlength="6" value="#e03e56" onchange="checkit()">
                    <input id="linkfont" class="font" value="Verdana" onchange="checkit()">
                    <hr>
                    <b>Blockquote</b>
                    <?php background('blockbackcolor', '5E4948', 'blockTransparent');?>
                    <?php use_image('useimageblock', 'blockimagerow', 'blockbackimage', 'blockbrep', 'blockbpos');?>
                    <br><br>
                    <b>Blockquote Text</b><br>
                    <?php font_css_transform('blockcolor', 'FFFFFF', 'blockfont', 'Verdana', 'blockalign', 'blocktransform', 'blocksize', '30', '14', 'block_size_range');?>
                    
                    <br><span class="heading">Roundness</span>
                    <input id="blockradius" type="range" min="0" max="50" value="0" onchange="checkit()"><span class="range_label" id="block_radius_range"></span>
                    <br><span class="heading">Padding</span>
                    <input id="blockpadding" type="range" min="0" max="50" value="20" onchange="checkit()"><span class="range_label" id="block_padding_range"></span>

                </div>

           </div>

        </div>

            <div class="large">
                <div class="box_heading">Preview</div>
                <div id="preview_box" style="max-width:780px; padding:10px;"></div>
            </div>

            

            </form>
            <div class="clearing"></div>

            
            <div class="small">

                    <div class="ctab_menu">
                        <div id="ctab1" class="tabby selected">Main CSS</div>
                        <div id="ctab2" class="tabby not_selected">Header</div>
                        <div id="ctab3" class="tabby not_selected">Footer</div>
                    </div>
                        
                    <div id="cbox1" class="tab_page cpage visible">
                        <b>Main CSS</b>
                        <p>Paste into the main Skin CSS section of your journal.</p>
                        <textarea id="textstringArea"></textarea>
                    </div>
                    <div id="cbox2" class="tab_page cpage hidden">
                        <b>HTML Code</b>
                        <p>Paste into the Header CSS section of your journal.</p>
                        <textarea id="htmlArea" class="textArea"></textarea>
                    </div>
                    <div id="cbox3" class="tab_page cpage hidden">
                        <b>CSS Code</b>
                        <p>Paste into the Footer CSS section of your journal.</p>
                        <textarea id="cssArea" class="textArea"><div class="credit">Created at <a href="http://www.simplydevio.us/resources/basic_journal.php">simplydevio.us</a></div></textarea>
                    </div>

            </div>
            
            <div class="large">
                <div class="box_heading b">Rules</div>
                <div class="box_white">

                    <ul style="line-height:22px;">
                        <b>Non-commercial use only</b>. Feel free to create journal skins for yourself or upload skins as gifts, trades, requests, etc. for others, but you may not sell any skins that use code from this generator.
                        <br><br>
                        <b>Give credit.</b> Please include a link to my <a href="http://www.simplydevio.us/resources/basic_journal">CSS Creator page</a> either in the text of your journal skin or in the header/footer area. If you upload a skin that uses code from this creator, please include the link in both the Journal CSS as well as in the Skin Description. Credit to my DeviantART account at <a href="http://simplysilent.deviantart.com">SimplySilent</a> is also greatly appreciated.
                    </ul>
                </div>
            </div>

            <div class="clear">&nbsp;</div>
                            
                        </div>
                    </div>
                
                </div>
                


            </div>

        </td>
        
        </tr>
        </table>
        
        </div>
    </div>

<div class="section footer b">

    <div id="footer">&nbsp;</div>
</div>

</body>

</html>


<script>

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