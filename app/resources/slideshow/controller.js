angular.module('mainApp')
.controller('SlideshowCtrl', function ($scope, $sce, ImportFontService, SlideshowService, CustomBoxService) {
    'use strict';

    $scope.j = SlideshowService.setUpJournal();
    $scope.root = '/app/resources/slideshow/';
    $scope.hideNote = true;
    $scope.isLocked = true;

    $scope.checkit = checkit;
    $scope.$watch("j", checkit, true);

    // Header data
    $scope.info = {
        name: 'slideshow',
        name_plural: 'slideshows',
        url: 'http://fav.me/d7ijaqd',
        description: 'Make an image slideshow for your profile.',
        title: 'Gallery Slideshow'
    }

    // Sidebar data
    $scope.tabs = ["Slideshow","Images"];

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
        var userHtml = SlideshowService.getUserHtml($scope.j);
        var userCss = SlideshowService.getUserCss($scope.j);

        $scope.completeCss = getCompleteCss(userCss);
        $scope.completeHtml = userHtml;

        if (!$scope.isLocked) {
            $scope.userHtml = userHtml;
            $scope.userCss = userCss;
            $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);
        }
    }
});
