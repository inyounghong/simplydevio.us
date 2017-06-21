const DARK = "#5E4948";
const YELLOW = "#ffd65a";
const BLUE = "#00576e";

const PAGE_URL = "http://www.simplydevio.us/#!/resources/journal_creator";
const BG_IMAGE_URL = "http://www.simplydevio.us/resources/journal_creator/images/yellow_pattern.jpg";

angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce, JournalService, TabFactory, CTabFactory) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.trustAsHtml = trustAsHtml;
    $scope.pageUrl = PAGE_URL;

    // Sidebar tabs
    $scope.toggleTab = TabFactory.toggleTab;
    $scope.isSelected = TabFactory.isSelected;

    // Code tabs
    $scope.setCTab = CTabFactory.setTab;
    $scope.isSelectedCTab = CTabFactory.isSelected;


    // Start Execution
    $scope.j = JournalService.setUpJournal();
    checkit();

    setTimeout(function() {
        TabFactory.toggleTab('box');
        $scope.$watch("j", checkit, true);
    }, 100);


    // Functions

    function checkit(){
        console.log("check");

        var font_string = JournalService.importFonts($scope.j);
        var css = JournalService.generateCss($scope.j);

        $scope.displayCss = css;
        $scope.displayHeader = "";

        $scope.previewCss = "<style>" + font_string + css + "</style>";
    }

    // Allow Html to be printed in DOM
    function trustAsHtml(string) {
        return $sce.trustAsHtml(string);
    };

    // Adjusts the placement of the sidebar
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if (scroll < 65){
            var pos = 65 - scroll
            $('.sidebar').css('top', pos + 'px');
        }
        else{
            $('.sidebar').css('top', '0px');
        }
    });

});
