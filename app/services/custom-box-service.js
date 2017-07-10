angular.module('mainApp')
.service('CustomBoxService', function() {

    this.getUserWidgetHtml = getUserWidgetHtml;
    this.getWidgetHtml = getWidgetHtml;

    function getUserWidgetHtml(background) {
        var html = '<div class="popup2-moremenu"><div class="floaty-boat"><br>';
        html += '<img src="' + background + '">';
        html += '</div></div><div class="gr-box gr-genericbox">';
        return html;
    }

    function getWidgetHtml(background) {
        var widgetHtml = '';
        widgetHtml += '<div class="gr-box"><div class="gr-top"><div class="gr"><h2><img src="http:/\/st.deviantart.net/minish/gruzecontrol/icons/journal.gif?2" style="vertical-align:middle"><a href="#">Devious Journal Entry</a></h2><span class="timestamp">Tue Oct 22, 2013, 7:04 AM</span></div></div><div class="gr-body"><div class="text">';
        widgetHtml += getUserWidgetHtml(background);
        widgetHtml += '</div><div class="bottom"><a class="a commentslink" href="">No Comments</a></div></div>';
        return widgetHtml;
    }
});
