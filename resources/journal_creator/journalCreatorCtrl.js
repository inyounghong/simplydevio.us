angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {}; // Watched data

    setUp();
    // checkit();

    // $scope.$watch("j", checkit, true);

    var web_safe_fonts = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

    function setUp() {
        $scope.j = {
            box: {},
            top: {},
            link: {},
            title: {},
            timestamp: {},
            text: {},
            bottom: {},
            comments: {},
        };

        Object.keys($scope.j).forEach(function(key,index) {
            fullSetUp($scope.j[key]);
        });

        $scope.j.box = {}
        $scope.j.box.maxWidth = false;
        $scope.j.box.width = "900";

        console.log($scope.j);
    }

    function fullSetUp(e) {
        setUpText(e);
        setUpImage(e);
        setUpBorder(e);
        setUpBackground(e);
    }

    function setUpText(e) {
        // e = {};
        e.color = "#000";
        e.family = "Verdana";
        e.align = "left";
        e.size = 15;
    }

    function setUpImage(e) {
        e.image = {};
        e.image.repeat = "repeat";
    }

    function setUpBackground(e) {
        e.background = {};
        e.background.color = "#9FCE54";
        e.background.transparent = false;
    }

    function setUpBorder(e) {
        e.border = {};
        e.border.style = "none";
    }

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


    function checkit(){
        return;
        // var font_string = importFonts();
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

    // Adjusts the placement of the sidebar
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll < 66){
            var pos = 66 - scroll
            $('.sidebar').css('top', pos + 'px');
        }
        else{
            $('.sidebar').css('top', '0px');

        }
    });

    function sidebarFlip(){
        for (var i = 1; i <= $('.block').length; i++) {
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



});
