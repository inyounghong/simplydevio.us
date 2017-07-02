angular.module('mainApp')
.controller('GalleryDirectoryCtrl', function ($scope, $sce, ImportFontService, GalleryDirectoryService, CustomBoxService) {
    'use strict';

    $scope.j = GalleryDirectoryService.setUpJournal();

    function checkit() {

        $scope.userHtml = GalleryDirectoryService.getUserHtml($scope.j);
        $scope.userCss = GalleryDirectoryService.getUserCss($scope.j);
        $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);

        // document.forms['example'].output.value = textstring;
        if (document.getElementById('password').value == 'pandas') {
            document.getElementById("cssArea").value = textstring;
            document.getElementById("htmlArea").value = htmlstring;
            document.getElementById("widgetArea").value = widgetstring;
            document.getElementById('message').innerHTML = '&#10004;';
        }


        var complete_css = '<style>#preview_box a{font-weight:400;}';
        complete_css += textstring;
        complete_css += '.gr-box a{text-decoration:none;} .gr-box{max-width:800px; padding: 20px 10px;} .description{max-width:800px;}';
        complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
        complete_css += '.gr-box{background:url(\"' + document.getElementById('customBackground').value + '\") no-repeat;</style>';
        var complete_html = '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="body"><div class="text">';
        complete_html += htmlstring;
        complete_html += '</div><div class=\"bottom\"><a class=\"a commentslink\" href=\"http://sta.sh/023q9vb62a0q#comments\">No Comments</a></div></div>';
        document.getElementById('preview_box').innerHTML = complete_css + complete_html;
    }
 
