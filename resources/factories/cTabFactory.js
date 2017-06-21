angular.module('mainApp')
.service('CTabFactory', function() {

    var f = {};
    _selectedTab = 1;

    f.setTab = function(t) {
        _selectedTab = t;
    }

    f.isSelected = function(t) {
        return _selectedTab === t;
    }

    return f;

});
