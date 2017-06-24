angular.module('mainApp')
.controller('FullGalleryDirectoryCtrl', function ($scope, $sce, ImportFontService, FullGalleryDirectoryService, CustomBoxService) {
    'use strict';

    $scope.j = FullGalleryDirectoryService.setUpJournal();


    function checkit() {

        $scope.userHtml = FullGalleryDirectoryService.getUserHtml($scope.j);
        $scope.userCss = FullGalleryDirectoryService.getUserCss($scope.j);
        $scope.userWidgetHtml = CustomBoxService.getUserWidgetHtml($scope.j.background);

        if (document.getElementById('password').value == 'oomoo') {
            $scope.userCss = userCss;
            $scope.userHtml = userHtml;
            $scope.userWidgetHtml = userWidgetHtml;
            document.getElementById('message').innerHTML = '&#10004;';
        }

        var complete_css = '<style>#preview_box a{font-weight:400;}';
        complete_css += $scope.userCss;
        complete_css += '.gr-box a{text-decoration:none;} .gr-box{ max-width:800px; padding: 20px 10px;} .description{max-width:800px;}';
        complete_css += '.maxheight{position:absolute;top:370px;display:block;border-top:1px dotted #777; width:100%; text-align:center; padding-top:5px;}';
        complete_css += '.gr-box{background:url(\"' + $scope.background + '\") no-repeat;</style>';

        var completeWidgetHtml = CustomBoxService.getWidgetHtml();
        document.getElementById('preview_box').innerHTML = complete_css + $scope.completeWidgetHtml;
    }
});



angular.module('mainApp')
.service('FullGalleryDirectoryService', function() {

    this.setUpJournal = setUpJournal;
    this.getUserHtml = getUserHtml;
    this.getUserCss = getUserCss;

    const NUM_ITEMS;

    function setUpJournal() {
        var j = {};
        j.button = {};
        j.galButton = {};
        j.items = setUpItems();
        return j;
    }

    // Returns an array of NUM_ITEMS item objects
    function setUpItems() {
        var items = [];
        items.push(newItem("My Gallery", 0, true));

        for (int i = 1; i < NUM_BUTTONS; i++) {
            items.push(newItem("Gallery Folder " + i, i, false));
        }
        return items;

        function newItem(name, id, isGalButton) {
            var item = {};
            item.id = id;
            item.name = name;
            item.isGalButton = isGalButton;
            item.image = '';
            item.url = '';
            item.zoom = '';
            return item;
        }
    }

    // Returns user CSS string
    function getUserCss = function(j) {
        var css = '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .bottom, a.external:after, .right br {display:none;}\n';
        css += 'a{text-decoration:none; font-weight:normal;}\n';
        css += '.external{display:block;}\n\n';

        css += '.gr-box{\n';
        css += 'z-index:99!important;\n';
        css += 'line-height:1.2em;\n';
        css += 'font-family:' + j.family + ';\n';
        css += 'font-size:' + j.size + 'px;}\n\n';

        css += '.text{\n';
        css += 'position:relative;\n';
        css += 'max-width:550px;\n';
        css += 'overflow:hidden;\n';
        css += 'margin:' + j.topMargin + 'px auto;}\n\n';

        if (j.buttonSide){
            css += '.right{margin-left:65%;}\n';
            css += '.image{left:0;}\n';
        } else {
            css += '.image{left:35%;}\n';
        }
        css += '.wrap{right:0;}\n\n';

        css += '.image{\n';
        css += 'display:none;\n'
        css += 'position:absolute;\n';
        css += 'top:0;\n';
        if (j.includeShadow){
            css += 'box-shadow:0 0 20px #' + j.shadow + ';\n';
        }

        var size = parseFloat(j.button.size);
        var margin = parseFloat(j.button.margin);
        var padding = parseFloat(j.button.padding) * 2;
        var blankHeight = ((size + margin + padding + 2) * buttonNumber) - 1;

        css += 'background:#' + j.image + ';\n';
        css += 'overflow:hidden;\n';
        css += 'height:' + blankHeight + 'px;\n';
        css += 'width:65%;\n';
        css += 'z-index:11;}\n\n';
        css += '.main .image{display:inline-block;}\n';
        css += '.image:after{\n';
        css += 'content:url(\'http://www.simplydevio.us/images/wsearch.png\');\n';
        css += 'height:32px;\n';
        css += 'width:32px;\n';
        css += 'position:absolute;\n';
        css += 'top:50%;\n';
        css += 'left:50%;\n';
        css += 'margin-left:-16px;\n';
        css += 'margin-top:-16px;\n';
        css += 'opacity:0;\n';
        css += 'transition:all .2s;}\n\n';
        css += '.image:hover:after{opacity:1;}\n';
        css += '.image:hover img{opacity:0.3;}\n\n';

        css += 'img{\n';
        css += 'position:relative;\n';
        css += 'max-width:750px!important;\n';
        css += 'max-height:750px;\n';
        css += 'display:inline;\n';
        css += 'transition:all 0.2s;}\n\n';
        css += '.wrap:hover .image{display:inline-block;}\n\n';
        css += '.button{\n';
        css += 'display:block;\n';
        css += 'color: #' + j.color + '!important;\n';
        css += 'background: #' + j.background + ';\n';
        css += 'padding:' + j.padding + 'px 0px ' + j.padding + 'px 20px;\n';
        css += 'margin-bottom:' + j.margin + 'px;\n';
        css += 'position:relative;\n';
        if (j.includeTransition) {
            css += 'transition:all 0.2s;';
        }
        css += '}\n\n';

        css += '.main .button{\n';
        css += 'background: #' + j.galButton.background + ';\n';
        css += 'color: #' + j.galButton.color + '!important;}\n\n';

        css += '.button:hover{\n';
        css += 'color: #' + j.button.hoverColor + '!important;\n';
        css += 'background: #' + j.button.hoverBackground + ';\n';
        css += 'padding-left:30px;\n';
        css += 'font-weight:700;}\n\n';

        css += '.main .button:hover{\n';
        css += 'background: #' + j.galButton.hoverBackground + '!important;\n';
        css += 'color: #' + j.galButton.hoverColor + '!important;}\n\n';

        css += '.button:hover span{display:inline;}\n\n';
        return css;
    }

    // Get User HTML string
    function getUserHtml = function(j) {
        var html = '<div class=\"right\">\n\n';
        $scope.items.forEach(function(item) {
            var main = (item.id === 0) ? ' main' : '';
            html += '<div class="wrap' + main + '">';
            html += '<a class="button" href="' + item.url + '">' + item.name + '</a>';
            html += '<a href="' + item.url + '" class="image">';
            html += '<img src="' + item.image + '" width="' + item.zoom + '"></a></div>\n\n';
        });
        html += '</div>';
        return html;
    }

    function getItemHtml(item) {
        var html = '';

        return html;
    }
});
 
