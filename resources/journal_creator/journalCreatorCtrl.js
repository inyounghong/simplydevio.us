const DARK = "#5E4948";
const YELLOW = "#ffd65a";
const BLUE = "#00576e";
const WEB_SAFE_FONTS = ["georgia", "palatino linotype", "book antiqua", "palatino", "times new roman", "times", "serif", "sans-serif", "cursive", "arial", "helvetica", "comic sans ms", "impact", "lucida sans unicode", "tahoma", "trebuchet ms", "verdana", "geneva", "courier new", "lucida console"];

const N = ';\n';
const END = "}\n\n";
const PAGE_URL = "http://www.simplydevio.us/#!/resources/journal_creator";


angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.trustAsHtml = trustAsHtml;

    // Variables
    $scope.pageUrl = PAGE_URL;

    // Sidebar tabs
    $scope.toggleTab = toggleTab;
    $scope.selectedTab = 'box';
    $scope.isSelected = isSelected;

    // Code tabs
    $scope.setCTab = setCTab;
    $scope.isSelectedCTab = isSelectedCTab;
    $scope.selectedCTab = 1;

    function setCTab(t) {
        $scope.selectedCTab = t;
    }

    function isSelectedCTab(t) {
        return $scope.selectedCTab === t;
    }

    setUp();
    checkit();
    
    setTimeout(function() {
        $("#tab-box").show();
        $scope.$watch("j", checkit, true);
    }, 100);

    function isSelected(t) {
        return $scope.selectedTab == t;
    }

    function toggleTab(t) {
        var tab = $("#tab-" + t);
        if (isSelected(t)) { // Hide
            tab.slideUp(200);
            $scope.selectedTab = -1;
        } else { // Show
            $("#tab-" + $scope.selectedTab).slideUp(200);
            tab.slideDown(200);
            $scope.selectedTab = t;
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
            header: {}
        };

        Object.keys($scope.j).forEach(function(key,index) {
            fullSetUp($scope.j[key]);
        });

        $scope.j.box.background.color = YELLOW;
        $scope.j.box.background.image = "resources/journal_creator/images/yellow_pattern.jpg";
        $scope.j.box.maxWidth = false;
        $scope.j.box.width = 900;
        $scope.j.box.radius = 10;
        $scope.j.box.padding = 50;

        $scope.j.top.background.color = "FFFFFF";
        $scope.j.top.align = "center";
        $scope.j.top.paddingV = 25;

        $scope.j.title.size = 42;
        $scope.j.title.bold = true;
        $scope.j.title.margin = 10;

        $scope.j.timestamp.size = 18;

        $scope.j.header.size = 32;

        $scope.j.text.background.color = "FFFFFF";
        $scope.j.text.paddingH = 4;
        $scope.j.text.paddingV = 20;
        $scope.j.text.marginH = 0;
        $scope.j.text.marginV = 18;
        $scope.j.text.family = "Verdana";
        $scope.j.text.lineHeight = 19;

        $scope.j.blockquote.family = "Verdana";
        $scope.j.blockquote.background.color = YELLOW;
        $scope.j.blockquote.padding = 20;

        $scope.j.bottom.background.color = "FFFFFF";
        $scope.j.bottom.size = 20;
        $scope.j.bottom.padding = 10;
        $scope.j.bottom.bold = true;

        console.log($scope.j);
    }

    function fullSetUp(e) {
        setUpText(e);
        setUpBorder(e);
        setUpBackground(e);
        e.radius = 10;
    }

    function setUpText(e) {
        e.color = BLUE;
        e.family = "Patrick Hand SC";
        e.align = "left";
        e.size = 13;
    }

    function setUpBackground(e) {
        e.background = {};
        e.background.color = "#9FCE54";
        e.background.transparent = false;
        e.background.image = "";
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
                // font = capitalize(font);
                var font_name = e[i].family.replace(/\s/g, "+");
                str += "@import url(http://fonts.googleapis.com/css?family=" + font_name + ");\n";
            }
        }
        return str;
    }

    // Get CSS functions

    function getBackground(e) {
        var color = e.background.color;
        var image = "";
        if (e.background.transparent) {
            color = "transparent";
        }
        if (e.background.image.trim()) {
            image = " url('" + e.background.image + "')";
        }
        return "background: " + color + image +  N;
    }

    function getRadius(e) {
        var str = "border-radius: " + px(e.radius) + N;
        str += "-moz-border-radius: " + px(e.radius) + N;
        str += "-webkit-moz-border-radius: " + px(e.radius) + N;
        return str;
    }
    function getBorder(e) {
        return "border: " + px(e.border.width) + e.border.style + " " + e.border.color + N;
    }
    function getTextAlign(e) {
        return "text-align: " + e.align + N;
    }


    function getHeight(e) {
        return 'height: ' + px(e.height) + N;
    }
    function getBoxSizing() {
        return 'box-sizing: border-box' + N;
    }

    function getStyles(e) {
        var css = "";
        if (e.bold) {
            css += "font-weight: bold" + N;
        }
        if (e.italic) {
            css += "font-style: italic" + N;
        }
        if (e.underline) {
            css += "text-decoration: underline" + N;
        }
        return css;
    }

    function generateCss() {

        var j = $scope.j;
        var css = "";

        css += '*{background:none; \nborder:none; \npadding:0; \nmargin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += 'a.external:after {display:none;}\n\n';

        // GR-BOX SECTION
        css += '.gr-box{\n';
        css += getBackground(j.box);
        css += getRadius(j.box);
        css += getBorder(j.box);
        css += 'padding: ' + j.box.padding + N;
        if (j.box.maxWidth) {
            css += 'max-width: ' + j.box.width + 'px;\n';
            css += 'margin: 0 auto;\n';
        }
        css += END;

        // GR TOP
        css += '.gr-top{\n';
        css += getBackground(j.top);
        css += getTextAlign(j.top);
        css += 'padding: ' + px(j.top.paddingV) + px(j.top.paddingH) + N;
        // css += getHeight(j.top);
        // css += getBoxSizing();
        css += getRadius(j.top);
        css += END;

        // GR-TOP TITLE JUNK
        css += '.gr-top h2, .gr-top h2 a{\n';
        css += getColor(j.title);
        css += getFontFamily(j.title);
        css += getFontSize(j.title);
        css += getStyles(j.title);
        css += 'line-height: ' + px(j.title.size) + N;
        css += 'margin-bottom: ' + px(j.title.margin) + N;
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
        css += getRadius(j.text);
        css += getBorder(j.text);
        css += getColor(j.text);
        css += getFontFamily(j.text);
        css += getFontSize(j.text);
        css += getTextAlign(j.text);
        css += getLineHeight(j.text);
        css += getStyles(j.text);
        css += 'padding: ' + px(j.text.paddingV) + per(j.text.paddingH) + N;
        css += 'margin: ' + px(j.text.marginV) + per(j.text.marginH) + N;
        css += END;

        css += '.text a{';
        css += getColor(j.text);
        css += getFontFamily(j.text);
        css += END;

        // Blockquote
        css += 'blockquote{\n';
        css += getBackground(j.blockquote);
        css += getRadius(j.blockquote);
        css += getColor(j.blockquote);
        css += getFontFamily(j.blockquote);
        css += getFontSize(j.blockquote);
        css += 'padding:' + px(j.blockquote.padding) + N;
        css += END;

        // GR-BOTTOM JUNK
        css += '.bottom{\n';
        css += getBackground(j.bottom);
        css += 'padding: ' + px(j.bottom.padding) + px(0) + N;
        css += 'text-align: center' + N;
        css += getRadius(j.bottom);
        css += END;

        // GR-BOTTOM COMMENTSLINK JUNK
        css += '.commentslink{\n';
        css += getColor(j.bottom);
        css += getFontFamily(j.bottom);
        css += getFontSize(j.bottom);
        css += getStyles(j.bottom);
        css += END;

        css += '.text h1{\n';
        css += getColor(j.header);
        css += getFontFamily(j.header);
        css += getFontSize(j.header);
        css += getTextAlign(j.header);
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

        return css;
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

        $scope.displayCss = css;
        $scope.displayHeader = "";

        $scope.previewCss = "<style>" + font_string + css + "</style>";
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
