angular.module('mainApp')
.directive('tooltip', function($window) {
    return {
        restrict: 'E',
        scope: {
            info: '='
        },
        templateUrl: 'app/directives/templates/tooltip.html',
        link: function (scope, element, attrs) {
            element.on('click', function() {
                window.open(scope.info.url);
            });
        }
    }
});
