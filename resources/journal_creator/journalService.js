angular.module('mainApp')
.service('JournalService', function() {

    this.setUpJournal = setUpJournal;
    this.generateCss = generateCss;

    // Returns an object with default Journal values
    function setUpJournal() {
        var j = {
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

        Object.keys(j).forEach(function(key,index) {
            fullSetUp(j[key]);
        });

        j.box.background.color = YELLOW;
        j.box.background.image = BG_IMAGE_URL;
        j.box.maxWidth = false;
        j.box.width = 900;
        j.box.radius = 10;
        j.box.padding = 50;

        j.top.background.color = "FFFFFF";
        j.top.align = "center";
        j.top.paddingV = 25;

        j.title.size = 42;
        j.title.bold = true;
        j.title.margin = 10;

        j.timestamp.size = 18;

        j.header.size = 32;

        j.text.background.color = "FFFFFF";
        j.text.paddingH = 4;
        j.text.paddingV = 20;
        j.text.marginH = 0;
        j.text.marginV = 18;
        j.text.family = "Verdana";
        j.text.lineHeight = 19;

        j.blockquote.family = "Verdana";
        j.blockquote.background.color = YELLOW;
        j.blockquote.padding = 20;

        j.bottom.background.color = "FFFFFF";
        j.bottom.size = 20;
        j.bottom.padding = 10;
        j.bottom.bold = true;

        console.log(j);
        return j;


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
    }

    const N = ';\n';
    const END = "}\n\n";

    // Generate display CSS
    function generateCss(j) {

        var css = "";

        css += '/* CSS Made at ' + PAGE_URL + ' */\n\n';
        css += '*{\nbackground:none; \nborder:none; \npadding:0; \nmargin:0;\n} \n\n';
        css += '.gr{padding:0!important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += 'a.external:after {display:none;}\n\n';

        // GR-BOX SECTION
        css += '.gr-box{\n';
        css += getBackground(j.box);
        css += getRadius(j.box);
        css += getBorder(j.box);
        css += 'padding:' + px(j.box.padding) + N;
        if (j.box.maxWidth) {
            css += 'max-width:' + px(j.box.width) + N;
            css += 'margin: 0 auto;\n';
        }
        css += END;

        // GR TOP
        css += '.gr-top{\n';
        css += getBackground(j.top);
        css += getTextAlign(j.top);
        css += 'padding:' + px(j.top.paddingV) + px(j.top.paddingH) + N;
        css += getRadius(j.top);
        css += END;

        // GR-TOP TITLE JUNK
        css += '.gr-top h2, .gr-top h2 a{\n';
        css += getColor(j.title);
        css += getFontFamily(j.title);
        css += getFontSize(j.title);
        css += getStyles(j.title);
        css += 'line-height:' + px(j.title.size) + N;
        css += 'margin-bottom:' + px(j.title.margin) + N;
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
        css += 'padding:' + px(j.text.paddingV) + per(j.text.paddingH) + N;
        css += 'margin:' + px(j.text.marginV) + per(j.text.marginH) + N;
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
        css += 'padding:' + px(j.bottom.padding) + " " + px(0) + N;
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
        css += 'bottom: 10px;\n}\n\n';

        css += '.credit, .credit a{\n';
        css += 'text-decoration:none;\n'
        css += 'color: #222!important;\n';
        css += 'font-size: 10px;\n}\n\n';

        return css;
    }



    // Helper functions


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
        var str = "border-radius:" + px(e.radius) + N;
        str += "-moz-border-radius:" + px(e.radius) + N;
        str += "-webkit-border-radius:" + px(e.radius) + N;
        return str;
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

    function getLineHeight(e) {
        return 'line-height:' + px(e.lineHeight) + N;
    }
    function getTextTransform(e) {
        return "text-transform: " + e.textTransform + N;
    }
    function getColor(e) {
        return "color: " + e.color + N;
    }
    function getFontFamily(e) {
        return "font-family: " + e.family + N;
    }
    function getFontSize(e) {
        return "font-size:" + px(e.size) + N;
    }
    function getBorder(e) {
        return "border:" + px(e.border.width) + " " + e.border.style + " " + e.border.color + N;
    }
    function getTextAlign(e) {
        return "text-align: " + e.align + N;
    }
    function getHeight(e) {
        return 'height:' + px(e.height) + N;
    }
    function getBoxSizing() {
        return 'box-sizing: border-box' + N;
    }

    function px(n) {
        return ' ' + n + "px";
    }
    function per(n) {
        return ' ' + n + "%";
    }
});
