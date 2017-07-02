angular.module('mainApp')
.service('ProfileDirectoryService', function() {
    this.setUpJournal = setUpJournal;
    this.getUserHtml = getUserHtml;
    this.getUserCss = getUserCss;

    this.newButton = newButton;
    this.newStatusButton = newStatusButton;

    const NUM_BUTTONS = 5;
    const NUM_STATUS_BUTTONS = 3;

    this.getTabs = function() {
        return ["Directory","Colors","Buttons","Status"];
    }

    function getUserHtml(j) {
        var html = '<div class="columns">\n';

        // Add regular buttons
        angular.forEach(j.buttons, function(button) {
            var long = "";
            if (button.long) {
                long = ' long';
            }
            html += '<a class="profileButton' + long + '" href="' + button.url + '">' + button.name  + '</a>';
        });

        html += '</div>\n\n';

        // Add status buttons
        html += getStatusHtml(j);
        return html;
    }

    function getStatusHtml(j) {
        var html = '<div class="status">\n';

        if (j.includeStatus) {
            angular.forEach(j.statusButtons, function(button) {
                html += '<div class="col"><a class="profileButton" href="' + button.url + '">' + button.name + '</a>\n';
                html += '<div class="description">' + button.description + '</div></div>';
            });
        }
        return html + '</div>';
    }

    function getStyle(style) {
        var o = {};
        o.italic = "normal";
        o.bold = "400";
        o.letterSpacing = "0";

        if (style.italic) {
            o.italic = "italic";
        }
        if (style.bold) {
            o.bold = "bold";
        }
        if (style.letterSpacing) {
            o.letterSpacing = "1px";
        }
        return o;
    }


    // Returns CSS
    function getUserCss(j) {

        var num_cols = j.numCols;

        var style = getStyle(j.style);
        var descriptionStyle = getStyle(j.descriptionStyle);
        var transitionStyle = getStyle(j.transitionStyle);

        var css = '';

        css += '/* Clean Up */\n';
        css += '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .gr-box .bottom, a.external:after {display:none;}\n';
        css += '.gr-box br{display:none;}\n';
        css += 'a{text-decoration:none; font-weight:normal;}\n';
        css += '.external{display:block;}\n\n';

        css += '/* Journal Box */\n';
        css += '.gr-box{\n';
        css += 'z-index:99!important;\n'
        css += 'line-height:1.1em!important;\n'
        css += 'font-family:' + j.buttonFontFamily + ';\n';
        css += 'text-align:center;\n';
        css += 'font-size:' + j.buttonSize + 'px;\n';
        css += '}\n\n';

        j.sideMargin = parseInt(j.sideMargin);

        css += '.gr-body{\n';
        css += 'max-width:' + j.maxWidth + 'px;\n';
        css += 'margin:' + j.topMargin + 'px auto 0\n';
        css += '}\n\n';

        css += '/* Main Buttons */\n';
        css += '.profileButton{\n';
        css += 'display:inline-block;\n';
        css += 'margin-right: ' + j.sideMargin + '%;\n';
        css += 'margin-bottom: ' + j.buttonMargin + 'px;\n';
        css += 'width: ' + ((100 - (j.sideMargin * j.numCols))/j.numCols)+ '%;\n';
        css += 'color: ' + j.buttonColor + '!important;\n';
        css += 'background: ' + j.buttonBackground + ';\n';
        css += '-webkit-border-radius:' + j.buttonRadius + 'px;\n';
        css += '-moz-border-radius:' + j.buttonRadius + 'px;\n';
        css += 'border-radius:' + j.buttonRadius + 'px;\n';
        css += 'padding:' + j.buttonPadding + 'px 0px;\n';
        css += 'font-style: ' + style.italic + ';\n';
        css += 'font-weight: ' + style.bold + '!important;\n';
        css += 'letter-spacing: ' + style.letterSpacing + ';\n';
        if (j.includeTransitions){
            css += 'transition:all 0.2s;\n';
        }
        css += '}\n\n';

        css += '.long{\n';
        css += 'width: ' + (100 - j.sideMargin ) + '%;\n';
        css += '}\n\n';

        css += '.profileButton:hover{\n';
        css += 'color: ' + j.buttonColorHover + '!important;\n';
        css += 'background: ' + j.buttonBackgroundHover + ';\n';
        css += 'font-style: ' + transitionStyle.italic + ';\n';
        css += 'font-weight: ' + transitionStyle.bold + '!important;\n';
        css += 'letter-spacing: ' + transitionStyle.letterSpacing + ';\n';
        css += '}\n\n';

        var num = j.statusButtons.length;
        var statusWidth = (100 - (num * j.sideMargin)) / num;

        if (j.includeStatus){
            var height = parseInt(j.buttonSize) + 15;
            css += '/* Status Buttons */\n';
            css += '.status{padding-bottom:' + height + 'px;}\n\n';

            css += '.status .col{\n';
            css += 'text-align:center;\ndisplay:inline-block;\n';
            css += 'margin-right: ' + j.sideMargin + '%;\n';
            css += 'width: ' + statusWidth + '%;\n';
            css += '}\n\n';

            css += '.col a{\n';
            css += 'display:block;';
            css += 'color: ' + j.statusColor + '!important;\n';
            css += 'background: ' + j.statusBackground + ';\n';
            css += 'width: 100%;\n';
            css += '}\n\n';

            css += '.status .col a:hover{\n';
            css += 'color: ' + j.statusColorHover + '!important;\n';
            css += 'background: ' + j.statusBackgroundHover + ';\n';
            css += '}\n\n';

            css += '/* Status Description */\n';
            css += '.status .description{\n';
            css += 'position:absolute;\nwidth:100%;\nleft:0;\ndisplay:none;\n';
            css += 'margin-top: ' + j.statusMarginTop + ';\n';
            css += 'font-size: ' + j.statusSize + ';\n';
            css += 'font-style: ' + descriptionStyle.italic + ';\n';
            css += 'font-weight: ' + descriptionStyle.bold + '!important;\n';
            css += 'letter-spacing: ' + descriptionStyle.letterSpacing + ';\n';
            css += 'color: ' + j.descriptionColor + ';\n';
            css += '}\n\n';

            css += '.col:hover .description {display:block;}\n';
        }
        return css;
    }


    function setUpJournal() {
        var j = {};
        j.buttonFontFamily = "Verdana";
        j.buttonSize = 14;
        j.topMargin = 10;
        j.buttonPadding = 10;
        j.buttonMargin = 5;
        j.sideMargin = 1;
        j.buttonRadius = 0;
        j.maxWidth = 500;
        j.customBackground = "";

        var green = "#9FCE54";
        var white = "#FFFFFF";
        var yellow = "#FFA53A";
        var brown = "#5E4948";

        j.buttonBackground = brown;
        j.buttonBackgroundHover = green;
        j.buttonColor = white;
        j.buttonColorHover = white;

        j.statusBackground = yellow;
        j.statusBackgroundHover = green;
        j.statusColor = white;
        j.statusColorHover = white;
        j.statusSize = 14;
        j.statusMarginTop = 5;

        j.descriptionColor = white;

        j.numCols = 2;

        j.includeStatus = true;
        j.includeTransitions = true;

        j.style = {};
        j.descriptionStyle = {};
        j.transitionStyle = {};

        j.style = setUpStyle();
        j.descriptionStyle = setUpStyle();
        j.transitionStyle = setUpStyle();

        j.buttons = setUpButtons();
        j.statusButtons = setUpStatusButtons();

        return j;
    }

    function setUpStyle() {
        var style = {};
        style.italic = false;
        style.bold = false;
        style.letterSpacing = false;
        return style;
    }

    function setUpStatusButtons() {
        var buttons = [];
        for (var i = 0; i < NUM_STATUS_BUTTONS; i++) {
            buttons.push(newStatusButton());
        }
        return buttons;
    }

    function setUpButtons() {
        var buttons = [];
        for (var i = 0; i < NUM_STATUS_BUTTONS; i++) {
            buttons.push(newButton());
        }
        buttons[0].long = true;
        return buttons;
    }

    function newButton() {
        var b = {};
        b.name = "My Button";
        b.url = "";
        b.long = false;
        return b;
    }

    function newStatusButton() {
        var s = {};
        s.name = "My Button";
        s.url = "";
        s.description = "Description Here";
        return s;
    }


});
