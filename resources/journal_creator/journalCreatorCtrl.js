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

    // Get CSS functions

    function getBackground(e) {
        return "background: " + e.background.color + ";\n";
    }
    function getImage(e) {
        if (!e.image.useImage) {
            return "";
        }
        return "background-image: url('" + e.image.url + "')" + e.image.repeat + " " + e.image.horizontal + " " + e.image.vertical + ";\n";
    }
    function getRadius(e) {
        return "border-radius: " + e.radius + "px;\n";
    }
    function getBorder(e) {
        return "border: " + e.border.width + "px " + e.border.style + " " + e.border.color + ";\n";
    }
    function getTextAlign(e) {
        return "text-align: " + e.align + ";\n";
    }


    function generateCss() {

        var j = $scope.j;
        var css = "<style>";
        var end = "}\n\n";

        // GR-BOX SECTION
        css += '.gr-box{\n';
        css += getBackground(j.box);
        css += getImage(j.box);
        css += getRadius(j.box);
        css += getBorder(j.box);

        if (j.box.maxWidth && j.box.width.trim() != '') {
            css += 'max-width: ' +j.box.width + 'px;\n';
            css += 'margin: 0 auto;\n';
        }
        css += end;

        // GR TOP
        css += '.gr-top{\n';
        css += getBackground(j.top);
        css += getImage(j.top);
        css += getTextAlign(j.top);

        // var percent = document.getElementById('topalign').value;
        // var top_padding = Math.round(percent * 0.01 * j.top.height);
        // var bottom_padding = j.top.height - top_padding;
        // var side_padding = document.getElementById('toppadding').value;
        // css += '\npadding: ' + top_padding + 'px ' + side_padding + '% ' + bottom_padding + 'px ' + side_padding + '%;';
        css += end;

        // GR-TOP TITLE JUNK
        css += '.gr-top h2, .gr-top h2 a{\n';
        // font_color_imp('titlecolor');
        css += getColor(j.title);
        css += getFontFamily(j.top);
        css += getFontSize(j.title);
        css += getTextAlign(j.title);
        // text_transform(document.example.titletransform.options[document.example.titletransform.selectedIndex].value);
        css += end;

        // GR-TOP TIMESTAMP JUNK
        css += '.gr-top .timestamp{\n';
        css += getColor(j.timestamp);
        css += getFontFamily(j.timestamp);
        css += getFontSize(j.timestamp);
        // text_transform(document.example.timetransform.options[document.example.timetransform.selectedIndex].value);
        css += end;


        // TEXT
        css += '.text{\n';
        css += getBackground(j.text);
        css += getImage(j.text);
        css += getRadius(j.text);
        css += getBorder(j.text);
        css += getColor(j.text);
        css += getFontFamily(j.text);
        css += getFontSize(j.text);

        // text_align(document.example.mainalign.options[document.example.mainalign.selectedIndex].value);
        // css += '\nline-height: ' + document.getElementById('mainline').value + 'px;';

        // css += '\npadding: '
        //
        // var verpadding = document.getElementById('verpadding').value;
        // var horpadding = document.getElementById('horpadding').value;
        // vPixel(verpadding);
        // hPercent(horpadding);
        //
        // css += vpix + hper + vpix + hper + ';';
        //
        // css += '\nmargin: '
        //
        // var verpadding = document.getElementById('vermargin').value;
        // var horpadding = document.getElementById('hormargin').value;
        // vPixel(verpadding);
        // hPercent(horpadding)

        // css += vpix + hper + vpix + hper + ';';
        css += end;


        css += '.text a{';
        css += getColor(j.link);
        css += getFontFamily(j.link);
        css += end;

        // Blockquote
        css += 'blockquote{\n';
        css += getBackground(j.blockquote);
        css += getImage(j.blockquote);
        css += getRadius(j.blockquote);
        css += getBorder(j.blockquote);
        css += getFontDetails(j.blockquote);

        // text_align(document.example.blockalign.options[document.example.blockalign.selectedIndex].value);
        // css += 'padding:' + document.getElementById('blockpadding').value + 'px;\n';
        css += end;

        // GR-BOTTOM JUNK
        css += '.bottom{\n';
        css += getBackground(j.bottom);
        css += getImage(j.bottom);
        // var height = document.getElementById('botheight').value;
        // var percent = document.getElementById('botalign').value;
        // var top_padding = Math.round(percent * 0.01 * height);
        // var bottom_padding = height - top_padding;
        // var side_padding = document.getElementById('botpadding').value;
        // css += '\npadding: ' + top_padding + 'px ' + side_padding + '% ' + bottom_padding + 'px ' + side_padding + '%;';
        //
        // // Comment Align
        // css += '\ntext-align: ' + document.example.commentalign.options[document.example.commentalign.selectedIndex].value + ';';
        css += end;


        // GR-BOTTOM COMMENTSLINK JUNK
        css += '.commentslink{\n';
        css += getFontDetails(j.comments);

        css += end;

        css += '.credit{\n';
        css += 'left:0;\n';
        css += 'width:100%;\n';
        css += 'text-align:center;\n';
        css += 'position: absolute;\n';
        css += 'bottom: 10px;}\n\n';
        
        css += '.credit, .credit a{\n';
        css += 'text-decoration:none;'
        css += 'color: #222!important;\n';
        css += 'font-size: 10px;}\n\n';

        return css  + "</style>";
    }

    function getFontDetails() {
        var css = "";
        css += getColor(j.comments);
        css += getFontFamily(j.comments);
        css += getFontSize(j.comments);
        css += getTextTransform(j.comments);
        return css;
    }

    function getTextTransform(e) {
        return "text-transform: " + e.textTransform + ";\n";
    }
    function getColor(e) {
        return "color: " + e.color + ";\n";
    }
    function getFontFamily(e) {
        return "font-family: " + e.family + ";\n";
    }
    function getFontSize(e) {
        return "font-size: " + e.size + "px;\n";
    }

    function checkit(){

        // var font_string = importFonts();
        var css = generateCss();

        $scope.previewCss = css;

        console.log($scope.previewCss);
        return;

        textstring += 'hr{\n';
        textstring += 'border-bottom: 1px solid #' + document.getElementById('hr_color').value + ';\n';
        textstring += 'margin: 15px 0 5px;\n';
        textstring += end

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
