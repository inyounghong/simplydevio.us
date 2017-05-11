angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.trustAsHtml = trustAsHtml;

    setUp();
    checkit();

    // $scope.$watch("j", checkit, true);

    var web_safe_fonts = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

    // Allow Html to be printed in DOM
    function trustAsHtml(string) {
        return $sce.trustAsHtml(string);
    };

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
            blockquote: {}
        };

        Object.keys($scope.j).forEach(function(key,index) {
            fullSetUp($scope.j[key]);
        });

        $scope.j.box.maxWidth = false;
        $scope.j.box.width = "900";

        console.log($scope.j);
    }

    function fullSetUp(e) {
        setUpText(e);
        setUpImage(e);
        setUpBorder(e);
        setUpBackground(e);
        e.radius = 0;
    }

    function setUpText(e) {
        e.color = "#000";
        e.family = "Verdana";
        e.align = "left";
        e.size = 15;
    }

    function setUpImage(e) {
        e.image = {};
        e.image.useImage = false;
        e.image.repeat = "repeat";
    }

    function setUpBackground(e) {
        e.background = {};
        e.background.color = "#9FCE54";
        e.background.transparent = false;
    }

    function setUpBorder(e) {
        e.border = {};
        e.border.width = 1;
        e.border.color = "#000";
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

    function getBackground(e) {
        return "background: " + e.color + ";\n";
    }

    function getImage(e) {
        if (!e.useImage) {
            return "";
        }
        return "background-image: url('" + e.url + "')" + e.repeat + " " + e.horizontal + " " + e.vertical + ";\n";
    }

    function getRadius(e) {
        return "border-radius: " + e.radius + "px;\n";
    }

    function getBorder(e) {
        return "border: " + e.width + "px " + e.style + " " + e.color + ";\n";
    }

    function getTextAlign(e) {
        return "text-align: " + e.align + ";\n";
    }

    function generateCss() {

        var j = $scope.j;
        var css = "<style>";

        // GR-BOX SECTION
        css += '.gr-box{\n';
        css += getBackground(j.box.background);
        css += getImage(j.box.image);
        css += getRadius(j.box);
        css += getBorder(j.box.border);

        if (j.box.maxWidth && j.box.width.trim() != '') {
            css += 'max-width: ' +j.box.width + 'px;\n';
            css += 'margin: 0 auto;\n';
        }
        css += '}\n';

        // GR TOP
        css += '.gr-top{\n';
        css += getBackground(j.top.background);
        css += getImage(j.top.image);
        css += getTextAlign(j.top);

        // var percent = document.getElementById('topalign').value;
        // var top_padding = Math.round(percent * 0.01 * j.top.height);
        // var bottom_padding = j.top.height - top_padding;
        // var side_padding = document.getElementById('toppadding').value;
        // css += '\npadding: ' + top_padding + 'px ' + side_padding + '% ' + bottom_padding + 'px ' + side_padding + '%;';
        css += '}\n\n';

        return css  + "</style>";
    }

    function checkit(){

        // var font_string = importFonts();
        var css = generateCss();

        $scope.previewCss = css;

        console.log($scope.previewCss);
        return;

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

    function setup() {


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
