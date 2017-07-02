angular.module('mainApp')
.directive('resourceHeader', function($window) {

    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/directives/templates/resourceHeader.html',
    }
});
