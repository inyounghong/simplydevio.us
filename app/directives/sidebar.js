angular.module('mainApp')
.directive('sidebar', function($window) {

    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/directives/templates/sidebar.html',
        controller: ['$scope', function ($scope) {

            $scope.selectedTab = $scope.tabs[0].id;

            $scope.changeTab = function(tab) {
                $scope.selectedTab = tab;
            }

            $scope.isSelected = function(tab) {
                return $scope.selectedTab == tab;
            }
        }]
    }
});
