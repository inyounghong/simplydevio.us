<!DOCTYPE html>
<head>
    <title>Make Your Own Journal Skin for DeviantART | Simplydevio.us</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <link href="/assets/css/main.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/new.css" media="screen" rel="stylesheet" type="text/css" />

    <?php //include '/resources/includes/fonts.html'; ?>


    <link href="../images/new128.png" rel="icon" sizes="128x128" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="jscolorfixed.js"></script>
    <script type="text/javascript">

 $(document).ready(function(){
    setup();
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
<?php include 'functions.php' ?>
<script type="text/javascript">

var web_safe_fonts = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];


function capitalize(string){
    return string.toLowerCase().replace( /\b\w/g, function (m) {
        return m.toUpperCase();
    });
}

function importFonts(){
    var str = "";
    var els = [$("#titlefont"), $("#timefont"), $("#mainfont"), $("#linkfont"), $("#blockfont"), $("#commentfont")];
    var imported = [];
    for (var i = 0; i < els.length; i++) {
        var font = els[i].val().toLowerCase();
        if (web_safe_fonts.indexOf(font) == -1 && imported.indexOf(font) == -1){
            imported.push(font);
            font = capitalize(font);
            var font_name = font.replace(" ", "+");
            str += "@import url(http://fonts.googleapis.com/css?family=" + font_name + ");\n";
        }
    }
    return str;
}

function update(){
    console.log("updating");
    var str = checkit();
    $("#preview_box style").html(str);
}

function checkit(){
    var font_string = importFonts();
    textstring = "";

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

    textstring += 'hr{\n';
    textstring += 'border-bottom: 1px solid #' + document.getElementById('hr_color').value + ';\n';
    textstring += 'margin: 15px 0 5px;\n';
    textstring += '}\n\n'

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


    var clear = "";
    clear += '*{background:none; \nborder:none; \npadding:0; \nmargin:0;} \n\n';
    clear += '.gr{padding:0 !important;}\n';
    clear += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
    clear += 'a.external:after {display:none;}\n\n';

    document.getElementById("textstringArea").value = clear + textstring;

    var complete_css = font_string + clear + textstring;
    complete_css += '#preview_box{line-height:1em;} #preview_box h2{display:block;} #preview_box h1{font-weight:bold; font-size:18px; color:#414d4c; font-size:18pt; font-family:"Trebuchet MS"; margin-bottom:15px;}';
    complete_css += textstring;

    return complete_css;
}

function setup()
{
    var gatsby = '<p><h1>Heading 1</h1><b>In my younger</b> and more vulnerable years my father gave me some advice that I’ve been turning over in my mind ever since. "Whenever you feel like criticizing any one," he told me, "just remember that all the people in this world haven’t had the advantages that you’ve had." <a class="username" href="http://simplysilent.deviantart.com">SimplySilent</a></p> <br><blockquote>&lt;blockquote> He didn’t say any more, but we’ve always been unusually communicative in a reserved way, and I understood that he meant a great deal more than that. In consequence, I’m inclined to reserve all judgments, a habit that has opened up many curious natures to me and also made me the victim of not a few veteran bores. &lt;/blockquote></blockquote><br> <p>The abnormal mind is quick to detect and attach itself to this quality when it appears in a normal person, and so it came about that in college I was unjustly accused of being a politician, because I was privy to the secret griefs of wild, unknown men. </p><p>This is a divider &lt;hr>:</p><hr><br>  Most of the confidences were unsought—frequently I have feigned sleep, preoccupation, or a hostile levity when I realized by some unmistakable sign that an intimate revelation was quivering on the horizon; for the intimate revelations of young men, or at least the terms in which they express them, are usually plagiaristic and marred by obvious suppressions. Reserving judgments is a matter of infinite hope.</p> ';


    var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
    complete_html += gatsby;
    complete_html += '<div class="credit">Created at <a href="http://www.simplydevio.us/resources/basic_journal.php">simplydevio.us</a></div></div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
    document.getElementById('preview_box').innerHTML = '<style>' + checkit() + '</style>' + complete_html;
}

function set_range(range, element){
    document.getElementById(range).innerHTML = document.getElementById(element).value;
}
// -->
</script>
    <?php include '../../../../../includes/menu1.html' ?>
    <div class="main_window">
    <div class="section" id="resource">
        <div id="left">
            <div class="title">Journal Skin Creator</div>
            <div class="map"><a href="/#!/resources">Resources</a> > Journal Skin Creator</div>
            <div class="descript">
                <p>Make your own DeviantART Journal skins using this free and easy-to-use tool.</p>
            </div>
            <br>
            <!-- Start Journal Box Section -->
            <div id="preview_box"></div>
            <br><br>
            <!-- Rules -->
            <div class="cols even">
                <div class="note line-height:22px;">
                    <h2>Rules</h2>
                    <b>Non-commercial use only</b>. Feel free to create journal skins for yourself or upload skins as gifts, trades, requests, etc. for others, but you may not sell any skins that use code from this generator.
                    <br><br>
                    <b>Give credit.</b> Please include a link to my <a href="http://www.simplydevio.us/resources/basic_journal.php">CSS Creator page</a> either in the text of your journal skin or in the header/footer area. If you upload a skin that uses code from this creator, please include the link in both the Journal CSS as well as in the Skin Description. Credit to my DeviantART account at <a href="http://simplysilent.deviantart.com">SimplySilent</a> is also greatly appreciated.
                </div>
            </div>
            <!-- Get your code -->
            <div class="cols even">
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

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

<div class="sidebar">
        <form action="" id="profileDirectory" name="example" onchange="update()" onsubmit="update(); return false">
            <!-- Journal Box -->
            <div id="block1" class="block selected">Journal Box</div>
            <div id="tab1" class="side_page show">
                <?php background('boxbackcolor', '9FCE54', 'boxTransparent');?>
                <?php use_image('useimage', 'boximagerow', 'boxbackimage', 'boxbrep', 'boxbpos');?>
                <br>
                <input type="checkbox" id="includemaxwidth" class="check"><label for="includemaxwidth">Include Max Width</label>
                <span id="boxwidthcol" style="display: none">
                   <input id="boxwidth" class="pixellong" maxlength="4" value="900"> px
                </span>
                <?php use_border('useboxborder', 'boxborderdiv', 'boxbordercolor', '222222', 'boxborderstyle', 'boxborderwidth', '15', 'box_border_range');?>
                <br><span class="heading">Roundness</span>
                <input id="boxradius" type="range" min="0" max="50" value="0"><span class="range_label" id="box_radius_range"></span>
                <b>Links</b>
                <br><input id="linkcolor" class="color" maxlength="6" value="#e03e56">
                <input id="linkfont" class="font" value="Verdana">
            </div>
            <!-- Journal Top -->
            <div id="block2" class="block">Journal Top</div>
            <div id="tab2" class="side_page">
                <?php background('topbackcolor', '5E4948', 'topTransparent');?>
                <?php use_image('useimagetop', 'topimagerow', 'topbackimage', 'topbrep', 'topbpos');?>
                <hr>
                <b>Journal Top</b>
                <br><span class="heading">Height</span>
                <input id="topheight" type="range" min="0" max="300" value="100"><span class="range_label" id="top_height_range"></span>
                <br><span class="heading">Padding</span>
                <input id="toppadding" type="range" min="0" max="30" value="5"><span class="range_label" id="top_padding_range"></span>
            </div>
            <!-- Title and Time Stamp -->
            <div id="block6" class="block">Title &amp; Timestamp</div>
            <div id="tab6" class="side_page">
                <b>Title Text</b><br>
                <?php font_css_transform('titlecolor', 'FFFFFF', 'titlefont', 'Verdana', 'titlealign', 'titletransform', 'titlesize', '50', '24', 'title_size_range');?>
                <br><span class="heading">Position</span>
                <input id="topalign" type="range" min="0" max="100" value="50"><span class="range_label" id="top_align_range"></span>
                <hr>
                <b>Time Stamp</b><br>
                <?php font_css_transform('timecolor', 'FFFFFF', 'timefont', 'Verdana', 'timealign', 'timetransform', 'timesize', '50', '14', 'time_size_range');?>

        </div>

        <!-- Journal Text -->
        <div id="block3" class="block">Journal Text</div>
        <div id="tab3" class="side_page">
            <?php background('txtbackcolor', 'EEEEEE', 'txtTransparent');?>
            <?php use_image('useimagetxt', 'txtimagerow', 'txtbackimage', 'txtbrep', 'txtbpos');?>

            <br><span class="heading">Roundness</span>
            <input id="textradius" type="range" min="0" max="50" value="0"><span class="range_label" id="text_radius_range"></span>
            <hr>
            <b>Text</b><br>
            <?php font_css('maincolor', '222222', 'mainfont', 'Verdana', 'mainalign', 'mainsize', '20', '14', 'main_size_range');?>
            <span class="heading">Line Height</span>
            <input id="mainline" type="range" min="0" max="25" value="16"><span class="range_label" id="main_line_range"></span>
        </div>
        <!-- Journal Text -->
        <div id="block7" class="block">Padding &amp; Margin</div>
        <div id="tab7" class="side_page">
            <b>Padding</b>
            <br><span class="heading">Sides</span><input id="horpadding" type="range" min="0" max="20" value="5"><span class="range_label" id="hor_padding_range"></span>
            <br><span class="heading">Vertical</span><input id="verpadding" type="range" min="0" max="100" value="30"><span class="range_label" id="ver_padding_range"></span>
            <br>

            <b>Margin</b>
            <br><span class="heading">Sides</span><input id="hormargin" type="range" min="0" max="20" value="5"><span class="range_label" id="hor_margin_range"></span>
            <br><span class="heading">Vertical</span><input id="vermargin" type="range" min="0" max="100" value="30"><span class="range_label" id="ver_margin_range"></span>
        </div>
        <!-- Journal Bottom -->
        <div id="block4" class="block">Journal Bottom</div>
        <div id="tab4" class="side_page">
            <?php background('botbackcolor', '5E4948', 'botTransparent');?>
            <?php use_image('useimagebot', 'botimagerow', 'botbackimage', 'botbrep', 'botbpos');?>
            <hr>
            <b>Journal Bottom</b>
            <br><span class="heading">Height</span>
            <input id="botheight" type="range" min="0" max="300" value="100"><span class="range_label" id="bot_height_range"></span>
            <br><span class="heading">Padding</span>
            <input id="botpadding" type="range" min="0" max="30" value="5"><span class="range_label" id="bot_padding_range"></span>
            <hr>
            <b>Comments</b><br>
            <?php font_css_transform('commentcolor', 'FFFFFF', 'commentfont', 'Verdana', 'commentalign', 'commenttransform', 'commentsize', '30', '14', 'comment_size_range');?>
            <br><span class="heading">Position</span>
            <input id="botalign" type="range" min="0" max="100" value="50"><span class="range_label" id="bot_align_range"></span>

            <br><br>

        </div>
        <!-- Blockquote -->
        <div id="block5" class="block">Block Quote</div>
        <div id="tab5" class="side_page">
            <?php background('blockbackcolor', '5E4948', 'blockTransparent');?>
            <?php use_image('useimageblock', 'blockimagerow', 'blockbackimage', 'blockbrep', 'blockbpos');?>
            <br><br>
            <b>Text</b><br>
            <?php font_css_transform('blockcolor', 'FFFFFF', 'blockfont', 'Verdana', 'blockalign', 'blocktransform', 'blocksize', '30', '14', 'block_size_range');?>

            <br><span class="heading">Roundness</span>
            <input id="blockradius" type="range" min="0" max="50" value="0"><span class="range_label" id="block_radius_range"></span>
            <br><span class="heading">Padding</span>
            <input id="blockpadding" type="range" min="0" max="50" value="20"><span class="range_label" id="block_padding_range"></span>
        </div>

        <!-- Extras -->
        <div id="block8" class="block">Extras</div>
        <div id="tab8" class="side_page">
            <b>Hr (Divider)</b><br>
            <input id="hr_color" class="color" maxlength="6" value="888888">
        </div>
    </div>
   </div>
</div>

    </form>
</div>
</body>
</html>
<script>
function sidebarFlip(){
    for (i = 1; i <= $('.block').length; i++) {
        // When user clicks the block, the tab appears
        $('#block' + i).click(function(){
            $(this).addClass('selected'); // Selected
            id_name = $(this).attr('id');
            num = id_name.slice(-1);
            $('#tab' + num).slideToggle();
            for (i = 1; i <= $('.block').length; i++) {
                // All the other tabs slide up
                if (i != parseInt(num)){
                    $('#tab' + i).slideUp();
                    $('#block' + i).removeClass('selected');
                }
            }
        });
    }
}
sidebarFlip();
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
// Adjusts the placement of the sidebar
$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    if (scroll < 66){
        pos = 66 - scroll
        $('.sidebar').css('top', pos + 'px');
    }
    else{
        $('.sidebar').css('top', '0px');

    }
});
</script>
