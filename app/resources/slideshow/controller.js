angular.module('mainApp')
.controller('SlideshowCtrl', function ($scope, $sce, ImportFontService, SlideshowService, CustomBoxService, TooltipService) {
    'use strict';

    $scope.j = SlideshowService.setUpJournal();
    $scope.root = '/app/resources/slideshow/';
    $scope.hideNote = true;
    $scope.isLocked = true;

    $scope.checkit = checkit;
    $scope.$watch("j", checkit, true);

    $scope.info = SlideshowService.getInfo();
    $scope.tabs = ["Slideshow","Images"];
    $scope.tooltips = TooltipService.getTooltips();

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
