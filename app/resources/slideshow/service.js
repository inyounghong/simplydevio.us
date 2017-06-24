angular.module('mainApp')
.service('SlideshowService', function() {
    this.setUpJournal = setUpJournal;
    this.getUserHtml = getUserHtml;
    this.getUserCss = getUserCss;

    const END = '}\n\n';
    const ROOT = '/app/resources/slideshow/';

    function setUpJournal() {
        var j = {};

        j.maxWidth = 450;
        j.slideBackground = "000000";
        j.thumbBackground = "FFFFFF";
        j.background = '';
        j.images = setUpImages();
        return j;
    }

    function setUpImages() {
        return [
            {
                url: 'http://fav.me/d41e1au',
                image: ROOT + 'images/slideshow1.png',
            },
            {
                url: 'http://fav.me/d5wndae',
                image: ROOT + 'images/slideshow2.png',
            },
            {
                url: 'http://fav.me/d1efwgs',
                image: ROOT + 'images/slideshow3.png',
            },
            {
                url: 'http://fav.me/dep957',
                image: ROOT + 'images/slideshow4.png',
            },
            {
                url: 'http://serapstock.deviantart.com/art/Red-Morning-I-100397186',
                image: ROOT + 'images/slideshow5.png',
            },
            {
                url: 'http://fav.me/d5b7hyu',
                image: ROOT + 'images/slideshow6.png',
            },
            {
                url: 'http://fav.me/d4htknq',
                image: ROOT + 'images/slideshow7.png',
            }
        ];
    }

    function getUserCss(j) {

        var thumbHeight = (j.maxWidth/(j.images.length - 1));
        var slideHeight = Math.ceil(330 - thumbHeight);
        var maxThumb = thumbHeight * 2;

        var css = '*{background:none; border:none; padding:0; margin:0;} \n\n';
        css += '.gr{padding:0 !important;}\n';
        css += '.gr-top img, .gr1, .gr2, .gr3 {display:none;}\n';
        css += '.gr-top, .gr-box .bottom, a.external:after {display:none;}\n';
        css += '.gr-box br{display:none;}\n';
        css += 'a{text-decoration:none; font-weight:normal;}\n';
        css += '.external{display:block;}\n\n';

        css += '.gr-box{\n';
        css += 'z-index:99!important;\n';
        css += END;

        css += '.text{\n';
        css += 'max-width:' + j.maxWidth + 'px;\n';
        css += 'height:330px;\n';
        css += 'position:relative;\n';
        css += 'text-align:center;\n';
        css += 'padding-top:' + slideHeight + 'px;\n';
        css += 'margin:20px auto 0;';
        css += END;

        css += '.text br{display:none;}\n\n';

        css += '.thumb{\n';
        css += 'background: ' + j.thumbBackground + ';\n';
        css += 'position:relative;\n';
        css += 'height:' + thumbHeight + 'px;\n';
        css += 'width:' + thumbHeight + 'px;\n';
        css += 'z-index:100;\n';
        css += 'display:inline-block;\n';
        css += 'overflow:hidden;}\n\n';

        css += '.thumb img{\n';
        css += 'position:absolute;\n';
        css += 'left: 0;\n';
        css += 'max-height:' + maxThumb + 'px;\n';
        css += 'max-width:' + maxThumb + 'px;\n';
        css += 'opacity:1;\n';
        css += 'transition:opacity 0.2s;}\n\n';

        css += '.thumb img:hover{opacity:0.6;}\n\n';

        css += '.pic{display:inline-block;}\n\n';

        css += '.slide{\n';
        css += 'background: ' + j.slideBackground + ';\n';
        css += 'width:' + j.maxWidth + 'px;\n';
        css += 'top:0;\n';
        css += 'left:0;\n';
        css += 'display:none;\n';
        css += 'overflow:hidden;\n';
        css += 'position:absolute;\n';
        css += 'height:' + slideHeight + 'px;}\n\n';

        css += '.slide img{\n';
        css += 'max-width:1000px;}\n\n';

        css += '.main{display:block!important;}\n';
        css += '.pic:hover .slide{display:block;}\n';

        return css;
    }

    function getUserHtml(j) {
        var html = '';

        var thumbHeight = (j.maxWidth/(j.images.length - 1));
        var slideHeight = Math.ceil(330 - thumbHeight);
        var maxThumb = thumbHeight * 2;

        j.images.forEach(function(item, i) {

            html += '<div class="pic">'
            if(i == 0) {
                html += '<a href="' + item.url + '" class="slide';
                html += ' main';
            } else {
                html += '<a href="' + item.url + '" class="thumb">';
                html += '<img src="' + item.image + '"></a>';
                html += '<a href="' + item.link + '" class="slide';
                html += '';
            }
            html += '">';
            html += '<img src="' + item.image + '" height="' + slideHeight + '"></a>';
            html += '</div>'
        });
        return html;
    }
});
