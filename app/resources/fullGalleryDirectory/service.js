angular.module('mainApp')
.service('FullGalleryDirectoryService', function() {

    this.setUpJournal = setUpJournal;
    this.getUserHtml = getUserHtml;
    this.getUserCss = getUserCss;

    const NUM_ITEMS;

    function setUpJournal() {
        var j = {};
        j.items = setUpItems();
        return j;
    }

    function setUpItems() {
        var items = [];
        for (var i = 0; i < NUM_ITEMS; i++) {
            items.push(newItem(i));
        }
        items[0].image = 'http://www.simplydevio.us/resources/images/slideshow5.png';
       return items;
    }

    function newItem(id) {
        return {
            id: id,
            name: "Button " + id,
            url: '#',
            image: ''
        }
    }

    function getUserCss() {

        var size = parseFloat(document.getElementById('buttonSize').value);
        var margin = parseFloat(document.getElementById('buttonMargin').value);
        var padding = parseFloat(document.getElementById('buttonPadding').value) * 2;
        // Determining the height of the directory and the image
        var blankHeight = ((size + margin + padding) * buttonNumber);

        var css = '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .bottom, a.external:after, .left br {display:none;}\n';
        css += 'a{text-decoration:none; font-weight:normal;}\n';
        css += '.external{display:block;}\n\n';

        css += '.gr-box{\n';
        css += 'z-index:99!important;\n';
        css += 'line-height:1.1em!important;\n';
        css += 'font-family:' + document.getElementById('buttonFontFamily').value + ';\n';
        css += 'text-align:center;\n';
        css += 'font-size:' + document.getElementById('buttonSize').value + 'px;}\n\n';

        var top = document.getElementById('topMargin').value;
        css += '.text{\n';
        css += 'position:relative;\n';
        css += 'width:500px;\n';
        css += 'margin:' + top + 'px auto;}\n\n';

        css += '.left{width:45%;}\n\n';

        css += '.image{\n';
        css += 'display:none;\n'
        css += 'position:absolute;\n';
        css += 'left:50%;\n';
        css += 'top:0;}\n\n';

        css += '.celvas{\n';
        css += 'height:' + blankHeight + 'px;\n';
        css += 'vertical-align:middle;\n';
        css += 'display:inline-block;}\n\n';

        css += 'img{\n';
        css += 'position:relative;\n';
        css += 'max-width:96%;\n';
        css += 'max-height:' + blankHeight + 'px;\n';
        css += 'display:inline;\n';
        css += 'vertical-align:middle;}\n\n';

        css += '.wrap:hover .image{display:inline-block;}\n\n';

        css += '.button{\n';
        css += 'display:block;\n';
        css += 'color: #' + document.getElementById('buttonColor').value + '!important;\n';
        css += 'background: #' + document.getElementById('buttonBackground').value + ';\n';
        css += 'border-radius:' + document.getElementById('buttonRadius').value + 'px;\n';
        css += 'padding:' + document.getElementById('buttonPadding').value + 'px 0px;\n';
        css += 'margin-bottom:' + document.getElementById('buttonMargin').value + 'px;\n';
        if (document.getElementById('includeTransition').checked){
            css += 'transition:all 0.2s;\n';
        }
        css += '}\n\n';

        css += '.button:hover{\n';
        css += 'color: #' + document.getElementById('buttonHoverColor').value + '!important;\n';
        css += 'background: #' + document.getElementById('buttonHoverBackground').value + ';}\n\n';

        css += '.button span{\n';
        css += 'display:none;\n';
        css += 'font-size:0.85em;}\n\n';

        css += '.button:hover span{display:inline;}\n\n';
    }

    function getUserHtml(j) {

        var html = '<div class=\"left\">\n\n';

        $scope.items.forEach(function(item) {
            html += '<div class=\"wrap\">'
            html += '<a class=\"button\" href=\"' + item.url + '">' + item.name '</a>';
            html += '<div class="image"><div class="celvas"></div>\n';
            html += '<img src=\"' + item.image + '\"></div></div>\n\n';
        })

        html += '</div>\n\n<div class=\"clear\"></div>';
        return html;
    }

});
