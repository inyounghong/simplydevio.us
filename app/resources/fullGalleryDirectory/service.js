angular.module('mainApp')
.service('FullGalleryDirectoryService', function() {
    this.setUpJournal = setUpJournal;
    this.getUserHtml = getUserHtml;
    this.getUserCss = getUserCss;

    const END = '}\n\n';
    const ROOT = '/app/resources/slideshow/';

    function setUpJournal() {
        var j = {
            background: '',
            fontFamily: 'Verdana',
            fontSize: 14,
            position: 10,
            padding: 15,
            margin: 1,
            shadow: '#000',
            buttons: setUpButtons()
        };

        return j;
    }

    function setUpButtons() {
        return [
            {
                name: 'Gallery Folder 1',
                url: 'http://fav.me/d41e1au',
                image: ROOT + 'images/slideshow1.png',
            },
            {
                name: 'Gallery Folder 2',
                url: 'http://fav.me/d5wndae',
                image: ROOT + 'images/slideshow2.png',
            },
            {
                name: 'Gallery Folder 3',
                url: 'http://fav.me/d1efwgs',
                image: ROOT + 'images/slideshow3.png',
            },
            {
                name: 'Gallery Folder 4',
                url: 'http://fav.me/dep957',
                image: ROOT + 'images/slideshow4.png',
            },
            {
                name: 'Gallery Folder 5',
                url: 'http://serapstock.deviantart.com/art/Red-Morning-I-100397186',
                image: ROOT + 'images/slideshow5.png',
            }
        ];
    }

    function getUserCss(j) {

        var padding = j.padding * 2;
        var blankHeight = ((size + margin + padding + 2) * j.buttons.length) - 1;

        var css = '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .bottom, a.external:after, .right br {display:none;}\n';
        css += 'a{text-decoration:none; font-weight:normal;}\n';
        css += '.external{display:block;}\n\n';

        css += '.gr-box{\n';
        css += 'z-index:99!important;\n';
        css += 'line-height:1.2em;\n';
        css += 'font-family:' + j.fontFamily + ';\n';
        css += 'font-size:' + j.fontSize + 'px;}\n\n';

        css += '.text{\n';
        css += 'position:relative;\n';
        css += 'max-width:550px;\n';
        css += 'overflow:hidden;\n';
        css += 'margin:' + j.margin + 'px auto;}\n\n';

        if (j.buttonsOnRight) {
            css += '.right{margin-left: 65%;}\n';
            css += '.image{left: 0;}\n';
        } else {
            css += '.image{left: 35%;}\n';
        }
        css += '.wrap{right:0;}\n\n';

        css += '.image{\n';
        css += 'display:none;\n'
        css += 'position:absolute;\n';
        css += 'top:0;\n';
        if (j.includeShadow) {
            css += 'box-shadow: 0 0 20px #' + j.shadow + ';\n';
        }

        css += 'background:#' + document.getElementById('imageBackground').value + ';\n';
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
        css += 'color: #' + document.getElementById('buttonColor').value + '!important;\n';
        css += 'background: #' + document.getElementById('buttonBackground').value + ';\n';
        css += 'padding:' + document.getElementById('buttonPadding').value + 'px 0px ' + document.getElementById('buttonPadding').value + 'px 20px;\n';
        css += 'margin-bottom:' + document.getElementById('buttonMargin').value + 'px;\n';
        css += 'position:relative;\n';
            if (document.getElementById('includeTransition').checked)
            {
                css += 'transition:all 0.2s;}\n\n';
            }
            else
            {
                css += '}\n\n';
            }
        css += '.main .button{\n';
        css += 'background: #' + document.getElementById('buttonBackgroundGal').value + ';\n';
        css += 'color: #' + document.getElementById('buttonColorGal').value + '!important;}\n\n';

        css += '.button:hover{\n';
        css += 'color: #' + document.getElementById('buttonHoverColor').value + '!important;\n';
        css += 'background: #' + document.getElementById('buttonHoverBackground').value + ';\n';
        css += 'padding-left:30px;\n';
        css += 'font-weight:700;}\n\n';
        css += '.main .button:hover{\n';
        css += 'background: #' + document.getElementById('buttonHoverBackgroundGal').value + '!important;\n';
        css += 'color: #' + document.getElementById('buttonHoverColorGal').value + '!important;}\n\n';

        css += '.button:hover span{display:inline;}\n\n';

        var css = '';


        return css;
    }

    function getUserHtml(j) {
        var html = '';
        html += '<div class="right">\n\n';

        j.buttons.forEach(function(button, i) {
            var main = '';
            if (i === 0) {
                main =  '<div class="wrap main">';
            }
            html += '<div class="wrap' + main + '">';
            html += '<a class="button" href="' + button.url + '">' + button.name + '</a>';
            html += '<a href="' + button.url + '" class="image">';
            html += '<img src="' + button.image + '" width="' + button.zoom + '">'
            html += '</a></div>\n\n';
        })
        html += '</div>';

        return html;
    }
});
