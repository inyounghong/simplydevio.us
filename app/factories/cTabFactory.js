angular.module('mainApp')
.service('CTabFactory', function() {

    var f = {};
    f.selectedTab = 1;

    f.setTab = function(t) {
        f.selectedTab = t;
    }

    f.isSelected = function(t) {
        return f.selectedTab === t;
    }

    return f;

});
