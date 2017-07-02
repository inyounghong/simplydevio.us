angular.module('mainApp')
.directive('widgetPreview', function($window, $sce) {
    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/directives/templates/widgetPreview.html',
        controller: ['$scope', function ($scope) {

            $scope.trustAsHtml = function(string) {
                return $sce.trustAsHtml(string);
            }

            $scope.getCode = function() {
                $("#popup").fadeIn(100);
            }
        }]
    }
});
