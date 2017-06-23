angular.module('mainApp')
.controller('ProfileDirectoryCtrl', function ($scope, $sce, ImportFontService) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.data = {}; // Not watched (password)
    $scope.tab = "tab1";
    $scope.ctab = "ctab1";

    $scope.root = 'app/resources/profile_directory/';

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
    $scope.getCode = getCode;
    $scope.hidePopup = hidePopup;

    var NUM_BUTTONS = 5;
    var NUM_STATUS_BUTTONS = 3;
    var isLocked = true;

    setUp();
    checkit();

    $scope.$watch("j", checkit, true);

    function getCode() {
        $("#popup").fadeIn(100);
    }

    function hidePopup() {
        $("#popup").fadeOut(100);
    }

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
        $scope.j.customBackground = "";

        var green = "#9FCE54";
        var white = "#FFFFFF";
        var yellow = "#FFA53A";
        var brown = "#5E4948";

        $scope.j.buttonBackground = brown;
        $scope.j.buttonBackgroundHover = green;
        $scope.j.buttonColor = white;
        $scope.j.buttonColorHover = white;

        $scope.j.statusBackground = yellow;
        $scope.j.statusBackgroundHover = green;
        $scope.j.statusColor = white;
        $scope.j.statusColorHover = white;
        $scope.j.statusSize = 14;
        $scope.j.statusMarginTop = 5;

        $scope.j.descriptionColor = white;

        $scope.j.numCols = 2;
        $scope.data.password = "";

        $scope.j.includeStatus = true;
        $scope.j.includeTransitions = true;

        setUpStyles();
        setUpButtons();
    }

    function setUpStyles() {
        $scope.j.style = {};
        $scope.j.descriptionStyle = {};
        $scope.j.transitionStyle = {};
        setUpStyle($scope.j.style);
        setUpStyle($scope.j.descriptionStyle);
        setUpStyle($scope.j.transitionStyle);
    }

    function setUpStyle(style) {
        style.italic = false;
        style.bold = false;
        style.letterSpacing = false;
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

        if (j.includeStatus) {
            angular.forEach($scope.j.statusButtons, function(button) {
                html += '<div class="col"><a class="profileButton" href="' + button.url + '">' + button.name + '</a>\n';
                html += '<div class="description">' + button.description + '</div></div>';
            });
        }
        return html + '</div>';
    }

    // Returns a string for HTML
    function getHtml() {
        var j = $scope.j;
        var html = '<div class="columns">\n';

        // Add regular buttons
        angular.forEach($scope.j.buttons, function(button) {
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
    function getCss() {
        var j = $scope.j;
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

        var num = $scope.j.statusButtons.length;
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

    // Check password
    function checkPassword() {
        $("#passwordMessage").fadeOut(100);
        var pass = $scope.data.password.toLowerCase().trim();

        $.ajax({
            url: $scope.root + 'php/checkPassword.php',
            type: 'get',
            data: {password: pass},
            success: handlePasswordCheck,
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    // Handle response from checkPassword
    function handlePasswordCheck(res) {
        var passMsg = "Incorrect password!";
        var termMsg = "Please agree to the terms of use!";

        if (res == "false") { // Wrong password
            $scope.passwordMessage = passMsg;
            $("#passwordMessage").fadeIn(100);
        }
        else if (!$scope.data.terms) { // Terms not checked
            $scope.passwordMessage = termMsg;
            $("#passwordMessage").fadeIn(100);
        }
        else { // All correct
            $("#slide1").fadeOut(0);
            $("#slide2").fadeIn(200);
            isLocked = false;
            checkit();
        }
        $scope.$apply();
    }

    function getCompleteCss(css) {
        var completeCss = '';
        completeCss += ImportFontService.importFonts([$scope.j.buttonFontFamily]) + '\n\n';
        completeCss += '#preview_box a{font-weight:400;}';
        completeCss += css;
        completeCss += '.gr-box a{text-decoration:none;} .status .description{max-width:800px;}';
        completeCss += '.daInside{background:url("' + $scope.j.customBackground + '") no-repeat;';

        // Add google fonts

        return '<style>' + completeCss + '</style>';
    }

    function getCompleteHtml(html) {
        var completeHtml = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="gr-body"><div class="text">';
        completeHtml += html;
        completeHtml += '</div><div class="bottom"><a class="a commentslink" href="http://sta.sh/023q9vb62a0q#comments">No Comments</a></div></div>';
        return completeHtml;
    }

    function checkit() {

        // Generate codes
        var html = getHtml();
        var css = getCss();
        var completeCss = getCompleteCss(css);
        var completeHtml = getCompleteHtml(html);

        // Change preview HTML and CSS
        $scope.previewCss = completeCss;
        $scope.previewHtml = completeHtml;

        // Show user codes if unlocked
        if (!isLocked) {
            $scope.userCss = css;
            $scope.userHtml = html;
            $scope.userWidget = '<div class="popup2-moremenu"><div class="floaty-boat"><br><img src="' + $scope.j.customBackground + '"></div></div><div class="gr-box gr-genericbox">';
        }
    }

});
