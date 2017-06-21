angular.module('mainApp')
.service('TabFactory', function() {

    var f = {};
    f.selectedTab;
    f.isSelected = isSelected;
    f.toggleTab = toggleTab;
    return f;

    function toggleTab(t) {
        var tab = $("#tab-" + t);
        if (isSelected(t)) { // Hide
            tab.slideUp(200);
            f.selectedTab = -1;
        } else { // Show
            $("#tab-" + f.selectedTab).slideUp(200);
            tab.slideDown(200);
            f.selectedTab = t;
        }
    }

    function isSelected(t) {
        console.log(f.selectedTab);
        return f.selectedTab == t;
    }

});
