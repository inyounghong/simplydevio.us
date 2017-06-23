angular.module('mainApp')
.directive('sidebarBlock', function($window) {
    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/resources/journal_creator/directives/sidebarBlock.html',
    }
});
