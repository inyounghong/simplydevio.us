angular.module('mainApp')
.controller('FullGalleryDirectoryCtrl', function ($scope, $sce, ImportFontService, FullGalleryDirectoryService, CustomBoxService) {
    'use strict';

    $scope.j = FullGalleryDirectoryService.setUpJournal();
    $scope.root = '/app/resources/fullGalleryDirectory/';
    $scope.hideNote = true;
    $scope.isLocked = true;

    $scope.checkit = checkit;
    $scope.$watch("j", checkit, true);

    // Header data
    $scope.info = {
        name: 'full-size gallery directory',
        name_plural: 'full-size gallery directories',
        url: 'http://fav.me/d7siwzy',
        description: 'Make an full-size Gallery Directory for your profile.',
        title: 'Full-size Gallery Directory'
    }

    // Sidebar data
    $scope.tabs = ["Directory", "Colors", "Buttons"];

    $scope.addImage = function() {
        var image = {
            url: '',
            image: '',
        }
        $scope.j.images.push(image);
    }

    $scope.deleteImage = function(index) {
        $scope.j.images.splice(index, 1);
    }

    function getCompleteCss(userCss) {
        var css = userCss + '\n\n';
        css += '.gr-box{background:url("' + $scope.j.background + '") no-repeat;}';
        return '<style>' + css + '</style>';
    }

    function checkit() {
        var userHtml = FullGalleryDirectoryService.getUserHtml($scope.j);
        var userCss = FullGalleryDirectoryService.getUserCss($scope.j);
        console.log(userCss);

        $scope.completeCss = getCompleteCss(userCss);
        $scope.completeHtml = userHtml;

        if (!$scope.isLocked) {
            $scope.userHtml = userHtml;
            $scope.userCss = userCss;
            $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);
        }
    }
});
