angular.module('mainApp')
.controller('FullGalleryDirectoryCtrl', function ($scope, $sce, ImportFontService, FullGalleryDirectoryService, CustomBoxService, TooltipService) {
    'use strict';

    $scope.j = FullGalleryDirectoryService.setUpJournal();
    $scope.root = '/app/resources/fullGalleryDirectory/';
    $scope.hideNote = false;
    $scope.isLocked = true;

    $scope.checkit = checkit;
    $scope.$watch("j", checkit, true);

    $scope.info = FullGalleryDirectoryService.getInfo();
    $scope.tabs = FullGalleryDirectoryService.getTabs();
    $scope.tooltips = TooltipService.getTooltips();

    $scope.addButton = function() {
        var button = {
            name: 'Gallery Folder',
            url: 'http://fav.me/d41e1au',
            image: ROOT + 'images/slideshow1.png',
        };
        $scope.j.buttons.push(button);
    }

    $scope.deleteButton = function(index) {
        $scope.j.buttons.splice(index, 1);
    }

    function getCompleteCss(userCss) {
        var css = '';
        css += ImportFontService.importFonts([$scope.j.fontFamily]) + '\n\n';
        css += userCss + '\n\n';
        css += '.gr-box{background:url("' + $scope.j.background + '") no-repeat;}';
        return '<style>' + css + '</style>';
    }

    function checkit() {
        var userHtml = FullGalleryDirectoryService.getUserHtml($scope.j);
        var userCss = FullGalleryDirectoryService.getUserCss($scope.j);
        // console.log(userCss);

        $scope.completeCss = getCompleteCss(userCss);
        $scope.completeHtml = userHtml;

        if (!$scope.isLocked) {
            $scope.userHtml = userHtml;
            $scope.userCss = userCss;
            $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);
        }
    }
});
