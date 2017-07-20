angular.module('mainApp')
.service('JournalService', function() {

    this.setUpJournal = setUpJournal;
    this.generateCss = generateCss;

    // Returns an object with default Journal values
    function setUpJournal() {
        const MAIN_COLOR = "F9AAAE";
        const WHITE = "FFFFFF";
        const MAIN_FONT = "Roboto Slab";

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

        j.box.background = WHITE;
        j.box.useImage = true;
        j.box.image = "https://eagoradezoito.files.wordpress.com/2011/06/2907768688_2c6c300590_z_large.jpg";
        j.box.maxWidth = false;
        j.box.width = 900;
        j.box.padding = 0;
        j.box.radius = 20;

        j.top.background = MAIN_COLOR;
        j.top.align = "center";
        j.top.paddingV = 40;

        j.title.size = 18;
        j.title.bold = true;
        j.title.italic = true;
        j.title.lineHeight = 2.4;
        j.timestamp.size = 12;

        j.header.size = 16;
        j.header.lineHeight = 0.8;
        j.header.bold = true;
        j.header.italic = true;

        j.text.background = MAIN_COLOR;
        j.text.paddingH = 4;
        j.text.paddingV = 30;
        j.text.marginH = 5;
        j.text.marginV = 50;
        j.text.lineHeight = 1.8;
        j.text.radius = 20;

        j.blockquote.background = WHITE;
        j.blockquote.color = MAIN_COLOR;
        j.blockquote.padding = 20;
        j.blockquote.radius = 20;
        j.blockquote.italic = true;

        j.bottom.background = MAIN_COLOR;
        j.bottom.size = 14;
        j.bottom.padding = 40;
        j.bottom.bold = true;
        j.bottom.italic = true;

        return j;


        function fullSetUp(e) {
            setUpText(e);
            setUpBorder(e);
            setUpBackground(e);
            e.radius = 0;
        }
        function setUpText(e) {
            e.color = WHITE;
            e.family = MAIN_FONT;
            e.align = "left";
            e.size = 13;
        }
        function setUpBackground(e) {
            e.background = "#9FCE54";
            e.transparent = false;
            e.image = "";
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
        css += getLineHeight(j.title);
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

        css += '.text a{\n';
        css += getColor(j.text);
        css += getFontFamily(j.text);
        css += END;

        // Blockquote
        css += 'blockquote{\n';
        css += getBackground(j.blockquote);
        css += getRadius(j.blockquote);
        css += getColor(j.blockquote);
        css += getStyles(j.blockquote);
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

        css += '.gr-box .text h1{\n';
        css += getColor(j.header);
        css += getFontFamily(j.header);
        css += getFontSize(j.header);
        css += getTextAlign(j.header);
        css += getStyles(j.header);
        css += getLineHeight(j.header);
        css += END;

        css += '.credit{\n';
        css += 'left:0;\n';
        css += 'width:100%;\n';
        css += 'text-align:center;\n';
        css += 'position: absolute;\n';
        css += 'bottom: 0px;\n}\n\n';

        css += '.credit, .credit a{\n';
        css += 'text-decoration:none;\n'
        css += 'color: #222!important;\n';
        css += 'font-size: 9px;\n}\n\n';

        return css;
    }



    // Helper functions


    function getBackground(e) {
        if (e.useImage) {
            return "background: url('" + e.image.trim() + "')" + N;
        }
        if (e.transparent) {
            return "background: none" + N;
        }
        return "background: " + e.background + N;
    }

    function getRadius(e) {
        var str = "border-radius:" + px(e.radius) + N;
        str += "-moz-border-radius:" + px(e.radius) + N;
        str += "-webkit-border-radius:" + px(e.radius) + N;
        return str;
    }

    function getStyles(e) {
        var css = "";
        css += "font-weight: " + (e.bold ? "700" : "400") + N;
        css += (e.italic) ? "font-style: italic" + N : "";
        css += (e.underline) ? "text-decoration: underline" + N : "";
        return css;
    }

    function getLineHeight(e) {
        return 'line-height:' + e.lineHeight + "em" + N;
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
