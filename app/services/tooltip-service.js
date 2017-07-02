angular.module('mainApp')
.service('TooltipService', function() {

    this.getTooltips = function() {
        return {
            getImageUrl: {
                url: '/#!/tutorials/get-image-url',
                text: 'Click for more info.'
            },
            font: {
                url: '/#!/tutorials/websafe-and-google-fonts',
                text: 'Use a websafe or Google Font. Click for more info.'
            },
            widgetLink: {
                url: '/#!/tutorials/get-link-to-profile-widget',
                text: 'Click for more info.'
            }
        }
    }
});
