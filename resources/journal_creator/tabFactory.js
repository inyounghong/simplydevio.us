angular.module('mainApp')
.service('TabFactory', function() {

    _selectedTab = 'box';

    var f = {};
    f.isSelected = isSelected;
    f.toggleTab = toggleTab;
    return f;

    function toggleTab(t) {
        var tab = $("#tab-" + t);
        if (isSelected(t)) { // Hide
            tab.slideUp(200);
            _selectedTab = -1;
        } else { // Show
            $("#tab-" + _selectedTab).slideUp(200);
            tab.slideDown(200);
            _selectedTab = t;
        }
    }

    function isSelected(t) {
        return _selectedTab == t;
    }

});
