angular.module('mainApp')
.directive('resource', function($window) {
    return {
        restrict: 'E',
        scope: {
            item: '=',
            color: '@'
        },
        templateUrl: 'app/directives/resourceItem.html',
        link: function (scope, element, attrs) {
            element.on('click', function() {
                $window.location.href = scope.item.url;
            });
        }
    }
});
