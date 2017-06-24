angular.module('mainApp')
.controller('SlideshowCtrl', function ($scope, $sce, ImportFontService, SlideshowService, CustomBoxService) {
    'use strict';

    $scope.j = SlideshowService.setUpJournal();
    $scope.password = '';
    $scope.root = '/app/resources/slideshow/';
    $scope.checkit = checkit;

    $scope.hideNote = true;

    // Header data
    $scope.info = {
        name: 'slideshow',
        name_plural: 'slideshows',
        url: 'http://fav.me/d7ijaqd',
        description: 'Make an image slideshow for your profile.',
        title: 'Gallery Slideshow'
    }

    // Sidebar data
    $scope.tabs = [
        {
            name: "Slideshow",
            id: "slideshow",
        },
        {
            name: "Images",
            id: "images",
        },
    ];


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

    $scope.$watch("j", checkit, true);

    function getCompleteCss(userCss) {
        var css = $scope.userCss + '\n\n';
        css += '.gr-box{background:url("' + $scope.j.background + '") no-repeat;}';
        return '<style>' + css + '</style>';
    }

    function checkit() {
        $scope.userHtml = SlideshowService.getUserHtml($scope.j);
        $scope.userCss = SlideshowService.getUserCss($scope.j);
        $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);
        $scope.completeCss = getCompleteCss($scope.userCss);
    }
});
