angular.module('mainApp')
.controller('ProfileDirectoryCtrl', function ($scope, $sce, ImportFontService, ProfileDirectoryService, TooltipService) {
    'use strict';

    $scope.info = {
        name: 'profile directory',
        name_plural: 'profile directories',
        url: 'http://fav.me/d73p9tr',
        description: 'Make a directory for your profile.',
        title: 'Profile Directory Creator',
    }

    $scope.tooltips = TooltipService.getTooltips();
    $scope.tabs = ProfileDirectoryService.getTabs();

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
        return '<style>' + completeCss + '</style>';
    }



    function checkit() {

        // Generate codes
        var userHtml = ProfileDirectoryService.getUserHtml($scope.j);
        var userCss = ProfileDirectoryService.getUserCss($scope.j);

        // Change preview HTML and CSS
        $scope.completeCss = getCompleteCss(userCss);
        $scope.completeHtml = userHtml;

        // Show user codes if unlocked
        if (!$scope.isLocked) {
            $scope.userCss = userCss;
            $scope.userHtml = userHtml;
            $scope.userWidgetHtml = '<div class="popup2-moremenu"><div class="floaty-boat"><br><img src="' + $scope.j.customBackground + '"></div></div><div class="gr-box gr-genericbox">';
        }
    }

});
