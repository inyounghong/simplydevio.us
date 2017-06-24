angular.module('mainApp')
.controller('ProfileDirectoryCtrl', function ($scope, $sce, ImportFontService, ProfileDirectoryService) {
    'use strict';

    $scope.info = {
        name: 'profile directory',
        name_plural: 'profile directories',
        url: 'http://fav.me/d73p9tr',
        description: 'Make a directory for your profile.',
        title: 'Profile Directory Creator'
    }

    $scope.j = ProfileDirectoryService.setUpJournal();
    $scope.password = "";

    $scope.root = 'app/resources/profile_directory/';

    // $scope.isSelected = isSelected;
    $scope.addButton = addButton;
    $scope.deleteButton = deleteButton;
    $scope.addStatusButton = addStatusButton;
    $scope.deleteStatusButton = deleteStatusButton;

    $scope.checkit = checkit;


    $scope.isLocked = true;

    // Sidebar data
    $scope.tabs = [
        {
            name: "Directory",
            id: "directory",
        },
        {
            name: "Colors",
            id: "colors",
        },
        {
            name: "Buttons",
            id: "buttons",
        },
        {
            name: "Status",
            id: "status",
        }
    ];

    checkit();

    $scope.$watch("j", checkit, true);

    // Adds a button
    function addButton() {
        $scope.j.buttons.push(ProfileDirectoryService.newButton());
    }

    function deleteButton(index) {
        $scope.j.buttons.splice(index, 1);
    }

    function addStatusButton() {
        $scope.j.statusButtons.push(ProfileDirectoryService.newStatusButton());
    }

    function deleteStatusButton(index) {
        $scope.j.statusButtons.splice(index, 1);
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
        var userHtml = ProfileDirectoryService.getUserHtml($scope.j);
        var userCss = ProfileDirectoryService.getUserCss($scope.j);

        // Change preview HTML and CSS
        $scope.completeCss = getCompleteCss(userCss);
        $scope.completeHtml = getCompleteHtml(userHtml);

        // Show user codes if unlocked
        if (!$scope.isLocked) {
            $scope.userCss = userCss;
            $scope.userHtml = userHtml;
            $scope.userWidgetHtml = '<div class="popup2-moremenu"><div class="floaty-boat"><br><img src="' + $scope.j.customBackground + '"></div></div><div class="gr-box gr-genericbox">';
        }
    }

});
