angular.module('mainApp')
.controller('ProfileDirectoryCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {};
    $scope.tab = "tab1";
    $scope.ctab = "ctab1";

    $scope.trustAsHtml = trustAsHtml;
    $scope.changeTab = changeTab;
    $scope.changeCtab = changeCtab;
    $scope.isSelected = isSelected;
    $scope.addButton = addButton;
    $scope.deleteButton = deleteButton;
    $scope.addStatusButton = addStatusButton;
    $scope.deleteStatusButton = deleteStatusButton;
    $scope.checkPassword = checkPassword;
    $scope.checkit = checkit;

    var NUM_BUTTONS = 5;
    var NUM_STATUS_BUTTONS = 3;

    setUp();
    checkit();

    $scope.$watch("j", checkit, true);

    // Allow Html to be printed in DOM
    function trustAsHtml(string) {
        return $sce.trustAsHtml(string);
    };

    // Returns a new button object
    function newButton() {
        var b = {};
        b.name = "My Button";
        b.url = "";
        b.long = false;
        return b;
    }

    // Returns a new status button object
    function newStatusButton() {
        var s = {};
        s.name = "My Button";
        s.url = "";
        s.description = "Description Here";
        return s;
    }

    // Adds a button
    function addButton() {
        $scope.j.buttons.push(newButton());
    }

    function deleteButton(index) {
        $scope.j.buttons.splice(index, 1);
    }

    function addStatusButton() {
        $scope.j.statusButtons.push(newStatusButton());
    }

    function deleteStatusButton(index) {
        $scope.j.statusButtons.splice(index, 1);
    }

    // Set up initial variables
    function setUp() {
        $scope.j.buttonFontFamily = "Verdana";
        $scope.j.buttonSize = 14;
        $scope.j.topMargin = 10;
        $scope.j.buttonPadding = 10;
        $scope.j.buttonMargin = 5;
        $scope.j.sideMargin = 1;
        $scope.j.buttonRadius = 0;
        $scope.j.maxWidth = 500;

        $scope.j.buttonBackground = "#5E4948";
        $scope.j.buttonBackgroundHover = "#FFFFFF";
        $scope.j.buttonColor = "#FFFFFF";
        $scope.j.buttonColorHover = "#FFFFFF";

        $scope.j.statusBackground = "#FFA53A";
        $scope.j.statusBackgroundHover = "#FFFFFF";
        $scope.j.statusColor = "#9FCE54";
        $scope.j.statusColorHover = "#FFFFFF";

        $scope.j.descriptionColor =  "#FFFFFF";

        $scope.j.numCols = 2;
        $scope.password = "";

        setUpButtons();
        console.log("done with setup function");
    }

    // Sets up buttons for tabs 3 and 4
    function setUpButtons() {

        $scope.j.buttons = [];
        $scope.j.statusButtons = [];

        for (var i = 0; i < NUM_BUTTONS; i++) {
            $scope.j.buttons.push(newButton());
        }

        for (var i = 0; i < NUM_STATUS_BUTTONS; i++) {
            $scope.j.statusButtons.push(newStatusButton());
        }

        $scope.j.buttons[0].long = true;
    }

    function changeTab(tab) {
        $scope.tab = tab;
    }

    function changeCtab(ctab) {
        $scope.ctab = ctab;
    }

    function isSelected(tab) {
        if (tab === $scope.tab) {
            return "selected";
        }
        return "not_selected";
    }

    function getStatusHtml(j) {
        var html = '<div class="status">\n';

        if (j.excludeStatus) {
            angular.forEach($scope.j.statusButtons, function(button) {
                html += '<div class="col"><a href="' + button.url + '">' + button.name + '</a>\n';
                html += '<div class="description">' + button.description + '</div></div>';
            });
        }
        return html + '</div>';
    }

    // Returns a string for HTML
    function getHtml() {
        var j = $scope.j;
        var html = '<div class="columns">\n';

        // Include arrow
        var arrow = "";
        if (j.includeArrow) {
            arrow = ' <span>&#10152;</span>';
        }

        // Add regular buttons
        angular.forEach($scope.j.buttons, function(button) {
            var long = "";
            if (button.long) {
                long = ' long';
            }
            html += '<a class="profileButton' + long + '" href="' + button.url + '">' + button.name + arrow + '</a>';
        });

        html += '</div>\n\n';

        // Add status buttons
        html += getStatusHtml(j);
        return html;
    }


    // Returns CSS
    function getCss() {
        var j = $scope.j;
        var num_cols = j.numCols;
        var italic = "normal";
        var bold = "400";
        var letter_spacing = "0";
        if (j.italic){
            italic = "italic";
        }
        if (j.bold){
            bold = "bold";
        }
        if (j.letterSpacing){
            letter_spacing = "1px";
        }

        var status_italic = "normal";
        var status_bold = "400";
        var status_letter_spacing = "0";
        if (j.statusItalic){
            status_italic = "italic";
        }
        if (j.statusBold){
            status_bold = "bold";
        }
        if (j.statusLetterSpacing){
            status_letter_spacing = "1px";
        }

        var css = '';

        css += '/* Clean Up */\n';
        css += '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .bottom, a.external:after {display:none;}\n';
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

        var top = j.topMargin;
        j.sideMargin = parseInt(j.sideMargin);

        css += '.gr-body{\n';
        css += 'max-width:' + j.maxWidth + 'px;\n';
        css += 'margin:' + top + 'px auto 0\n';
        css += '}\n\n';

        console.log(j.buttonColor);

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
        css += 'font-style: ' + italic + ';\n';
        css += 'font-weight: ' + bold + '!important;\n';
        css += 'letter-spacing: ' + letter_spacing + ';\n';
        if (j.includeTransition){
            css += 'transition:all 0.2s;\n';
        }
        css += '}\n\n';

        css += '.long{\n';
        css += 'width: ' + (100 - j.sideMargin ) + '%;\n';
        css += '}\n\n';

        css += '.profileButton:hover{\n';
        css += 'color: ' + j.buttonHoverColor + '!important;\n';
        css += 'background: ' + j.buttonHoverBackground + ';\n';
        css += '}\n\n';

        css += '/* Button Arrows */\n';
        css += '.profileButton span{\n';
        css += 'display:none;\n';
        css += 'font-size:0.85em;\n';
        css += '}\n\n';

        css += '.profileButton:hover span{display:inline;}\n\n';

        var status_margin = j.sideMargin;
        var num = $scope.j.buttons.length;
        var statusWidth = (100 - ((num * status_margin))) / num;


        if (!j.excludeStatus){
            var height = parseInt(j.buttonSize) + 15;
            css += '/* Status Buttons */\n';
            css += '.status{padding-bottom:' + height + 'px;}\n\n';

            css += '.status .col{\n';
            css += 'text-align:center;\ndisplay:inline-block;\n';
            css += 'margin-right: ' + status_margin + '%;\n';
            css += 'width: ' + statusWidth + '%;\n';
            css += '}\n\n';

            css += '.col a{\n';
            css += 'display:block;';
            css += 'color: ' + j.statusColor + '!important;\n';
            css += 'background: ' + j.statusBackground + ';\n';
            css += 'width: 100%;\n';
            css += '}\n\n';

            css += '.status .col a:hover{\n';
            css += 'color: ' + j.statusHoverColor + '!important;\n';
            css += 'background: ' + j.statusHoverBackground + ';\n';
            css += '}\n\n';

            css += '/* Status Description */\n';
            css += '.status .description{\n';
            css += 'position:absolute;\nwidth:100%;\nleft:0;\ndisplay:none;\n';
            css += 'font-style: ' + status_italic + ';\n';
            css += 'font-weight: ' + status_bold + '!important;\n';
            css += 'letter-spacing: ' + status_letter_spacing + ';\n';
            css += 'font-size: ' + j.status_font_size + 'px;\n';
            css += 'color: ' + j.descriptionColor + ';\n';
            css += '}\n\n';

            css += '.col:hover .description {display:block;}\n';
        }
        return css;
    }

    function checkPassword() {

        var pass = $scope.password.toLowerCase().trim();
        var success = "Thanks for purchasing! Your codes have been created below.";
        var fail = "Incorrect password.";

        $.ajax({
            url: '/resources/profile_directory/php/checkPassword.php',
            type: 'get',
            data: {password: pass},
            success: function(res) {
                if (res == "true") {
                    $scope.passwordMessage = success;
                } else {
                    $scope.passwordMessage = fail;
                }
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    function getCompleteCss(css) {
        var complete_css = '<style>#preview_box a{font-weight:400;}';
        complete_css += css;
        complete_css += '.gr-box a{text-decoration:none;} .gr-box{padding: 20px 10px 40px;}  .description{max-width:800px;}';
        complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
        complete_css += '.gr-box{background:url("' + $scope.j.customBackground + '") no-repeat;</style>';
        return complete_css;
    }

    function getCompleteHtml(html) {
        var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
        complete_html += html;
        complete_html += '</div><div class="bottom"><a class="a commentslink" href="http://sta.sh/023q9vb62a0q#comments">No Comments</a></div></div>';
        return complete_html;
    }

    function checkit() {
        console.log("checkit");
        console.log($scope.j.buttonBackground);

        var htmlstring = getHtml();
        var textstring = getCss();

        var widgetstring = '<div class="popup2-moremenu"><div class="floaty-boat"><br><img src="' + $scope.j.customBackground + '"></div></div><div class="gr-box gr-genericbox">';

        var complete_css = getCompleteCss(textstring);
        var complete_html = getCompleteHtml(htmlstring);

        $scope.previewCss = complete_css;
        $scope.previewHtml = complete_html;
    }

});
