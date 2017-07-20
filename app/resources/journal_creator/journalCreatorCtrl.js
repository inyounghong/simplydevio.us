const DARK = "#5E4948";
const BLUE = "#00576e";

const PAGE_URL = "http://www.simplydevio.us/#!/resources/journal_creator";

angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce, JournalService, TabFactory, CTabFactory, ImportFontService, TooltipService) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.trustAsHtml = trustAsHtml;
    $scope.pageUrl = PAGE_URL;
    $scope.root = 'app/resources/journal_creator/';
    $scope.tooltips = TooltipService.getTooltips();

    $scope.roots = {
        inputs: 'app/resources/journal_creator/inputs/',
        tabs: 'app/resources/journal_creator/tabs/',
    }

    // Sidebar tabs
    $scope.toggleTab = TabFactory.toggleTab;
    $scope.isSelected = TabFactory.isSelected;

    // Code tabs
    $scope.setCTab = CTabFactory.setTab;
    $scope.isSelectedCTab = CTabFactory.isSelected;

    // Sidebar blocks
    $scope.sidebarBlocks = [
        {id: "box", name: "Journal Box"},
        {id: "top", name: "Journal Top"},
        {id: "title", name: "Journal Title"},
        {id: "timestamp", name: "Timestamp"},
        {id: "textBox", name: "Text Box"},
        {id: "text", name: "Journal Text"},
        {id: "bottom", name: "Journal Bottom"},
        {id: "comments", name: "Comments Link"},
        {id: "blockquote", name: "Blockquote"},
        {id: "header", name: "Header"},
    ];


    // Start Execution
    $scope.j = JournalService.setUpJournal();
    checkit();

    setTimeout(function() {
        TabFactory.toggleTab('box');
        $scope.$watch("j", checkit, true);
    }, 100);


    // Functions

    function checkit(){

        var fontImportString = generateFontImportString($scope.j);
        var userCss = JournalService.generateCss($scope.j);
        var deviantCss = getDeviantCss();

        $scope.displayCss = userCss;
        $scope.displayHeader = "";

        $scope.previewCss = "<style>" + fontImportString + deviantCss + userCss + "</style>";
    }

    // CSS for canceling simplydevious css
    function getDeviantCss() {
        var str = "";
        str += '.commentslink:hover { color: ' + $scope.j.bottom.color + '}\n\n';
        return str;
    }

    function generateFontImportString (j) {
        var stringList = [j.title.family, j.timestamp.family, j.text.family, j.link.family, j.blockquote.family, j.comments.family];
        return ImportFontService.importFonts(stringList);
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
