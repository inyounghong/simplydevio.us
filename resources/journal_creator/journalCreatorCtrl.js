var DARK = "#5E4948";
var WEB_SAFE_FONTS = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

var N = ';\n';
var END = "}\n\n";


angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.trustAsHtml = trustAsHtml;
    $scope.toggleTab = toggleTab;
    $scope.tab = 0;
    $scope.tabs = [];

    for (var i = 1; i < $(".side_page").length; i++) {
        $scope.tabs[i] = false;
    }
    $scope.tabs[1] = true;

    setUp();
    checkit();

    $scope.$watch("j", checkit, true);


    function toggleTab(t) {
        var tab = $("#tab" + t);
        if (tab.css("display") == "none") { // Show tab
            tab.slideDown(200);
            $scope.tabs[t] = true;
        } else {
            tab.slideUp(200);
            $scope.tabs[t] = false;
        }
    }

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
            blockquote: {},
            hr: {}
        };

        Object.keys($scope.j).forEach(function(key,index) {
            fullSetUp($scope.j[key]);
        });

        $scope.j.box.background.color = "CEEAF5";
        $scope.j.box.maxWidth = false;
        $scope.j.box.width = 900;

        $scope.j.top.background.color = "FFFFFF";
        $scope.j.top.positionH = "center";
        $scope.j.top.positionV = "center";
        $scope.j.top.align = "center";
        $scope.j.top.height = 60;
        $scope.j.top.paddingV = 15;

        $scope.j.title.size = 22;

        $scope.j.text.background.color = "FFFFFF";
        $scope.j.text.paddingH = 5;
        $scope.j.text.paddingV = 0;
        $scope.j.text.marginH = 5;
        $scope.j.text.marginV = 10;

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
        var j = $scope.j;
        var str = "";
        var e = [j.title, j.timestamp, j.text, j.link, j.blockquote, j.comments];
        var imported = [];

        for (var i = 0; i < e.length; i++) {
            var font = e[i].family.toLowerCase().trim();
            if (WEB_SAFE_FONTS.indexOf(font) == -1 && imported.indexOf(font) == -1){
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
        if (e.background.transparent) {
            return "";
        }
        return "background: " + e.background.color + ";\n";
    }
    function getImage(e) {
        if (!e.image.useImage) {
            return "";
        }
        return "background-image: url('" + e.image.url + "')" + e.image.repeat + " " + e.image.horizontal + " " + e.image.vertical + ";\n";
    }
    function getRadius(e) {
        return "border-radius: " + px(e.radius) + ";\n";
    }
    function getBorder(e) {
        return "border: " + px(e.border.width) + e.border.style + " " + e.border.color + ";\n";
    }
    function getTextAlign(e) {
        return "text-align: " + e.align + ";\n";
    }


    function getHeight(e) {
        return 'height: ' + px(e.height) + N;
    }
    function getBoxSizing() {
        return 'box-sizing: border-box' + N;
    }

    function generateCss() {

        var j = $scope.j;
        var css = "<style>";


        css += '*{background:none; \nborder:none; \npadding:0; \nmargin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += 'a.external:after {display:none;}\n\n';

        // GR-BOX SECTION
        css += '.gr-box{\n';
        css += getBackground(j.box);
        css += getImage(j.box);
        css += getRadius(j.box);
        css += getBorder(j.box);
        css += 'padding: ' + j.box.padding + N;
        if (j.box.maxWidth && j.box.width.trim() != '') {
            css += 'max-width: ' +j.box.width + 'px;\n';
            css += 'margin: 0 auto;\n';
        }
        css += END;

        // GR TOP
        css += '.gr-top{\n';
        css += getBackground(j.top);
        css += getImage(j.top);
        css += getTextAlign(j.top);
        css += 'padding: ' + px(j.top.positionTop) + px(j.top.paddingH) + 0 + N;
        css += getHeight(j.top);
        css += getBoxSizing();
        css += END;

        console.log(css);

        // GR-TOP TITLE JUNK
        css += '.gr-top h2, .gr-top h2 a{\n';
        css += getColor(j.title);
        css += getFontFamily(j.top);
        css += getFontSize(j.title);
        css += getTextTransform(j.title);
        css += 'margin-bottom: ' + j.title.margin + N;
        css += END;

        // GR-TOP TIMESTAMP JUNK
        css += '.gr-top .timestamp{\n';
        css += getColor(j.timestamp);
        css += getFontFamily(j.timestamp);
        css += getFontSize(j.timestamp);
        css += getTextTransform(j.timestamp);
        css += END;

        // TEXT
        css += '.text{\n';
        css += getBackground(j.text);
        css += getImage(j.text);
        css += getRadius(j.text);
        css += getBorder(j.text);
        css += getColor(j.text);
        css += getFontFamily(j.text);
        css += getFontSize(j.text);
        css += getTextAlign(j.text);
        css += getLineHeight(j.text);
        css += 'padding: ' + px(j.text.paddingV) + per(j.text.paddingH) + N;
        css += 'margin: ' + px(j.text.marginV) + per(j.text.marginH) + N;
        css += END;

        css += '.text a{';
        css += getColor(j.link);
        css += getFontFamily(j.link);
        css += END;

        // Blockquote
        css += 'blockquote{\n';
        css += getBackground(j.blockquote);
        css += getImage(j.blockquote);
        css += getRadius(j.blockquote);
        css += getBorder(j.blockquote);
        css += getColor(j.blockquote);
        css += getFontFamily(j.blockquote);
        css += getFontSize(j.blockquote);
        css += getTextTransform(j.blockquote);
        css += getTextAlign(j.blockquote);
        css += 'padding:' + px(j.blockquote.padding) + N;
        css += END;

        // GR-BOTTOM JUNK
        css += '.bottom{\n';
        css += getBackground(j.bottom);
        css += getImage(j.bottom);
        var top_padding = Math.round(j.bottom.align * 0.01 * j.bottom.height);
        var bottom_padding = j.bottom.height - top_padding;
        css += '\npadding: ' + px(top_padding) + per(j.bottom.paddingH) + px(bottom_padding) + N;
        css += getTextAlign(j.bottom);
        css += END;

        // GR-BOTTOM COMMENTSLINK JUNK
        css += '.commentslink{\n';
        css += getColor(j.comments);
        css += getFontFamily(j.comments);
        css += getFontSize(j.comments);
        css += getTextTransform(j.comments);
        css += END;

        css += 'hr{\n';
        css += 'border-bottom: 1px solid #' + j.hr.color + N;
        css += 'margin: 15px 0 5px;\n';
        css += END;

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

    // function getFontDetails() {
    //     var css = "";
    //     css += getColor(j.comments);
    //     css += getFontFamily(j.comments);
    //     css += getFontSize(j.comments);
    //     css += getTextTransform(j.comments);
    //     return css;
    // }

    function px(n) {
        return n + "px ";
    }
    function per(n) {
        return n + "% ";
    }
    function getLineHeight(e) {
        return 'line-height: ' + px(e.lineHeight) + ';\n';
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
        return "font-size: " + px(e.size) + ";\n";
    }

    function checkit(){
        console.log("check");

        var font_string = importFonts();
        var css = generateCss();

        $scope.previewCss = font_string + css;

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

});
