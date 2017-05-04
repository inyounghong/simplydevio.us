var app = angular.module('myApp', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
        	templateUrl: 'partials/main.html',
            controller: 'MainController'
        })
     	.when('/about', {
        	templateUrl: 'partials/about.html',
            controller: 'MainController'
        })
    
    	.otherwise({
            redirectTo: '/'
        });
}]);