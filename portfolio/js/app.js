var app = angular.module('myApp', ['ngRoute', 'ngSanitize']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider
        .when('/', {
        	templateUrl: 'partials/home.html',
            controller: 'MainController'
        })
     	.when('/about', {
        	templateUrl: 'partials/about.html',
        })
        .when('/resume', {
            templateUrl: 'partials/resume.html',
        })
        .when('/projects', {
            templateUrl: 'partials/projects.html',
        })
        .when('/design', {
            templateUrl: 'partials/design.html',
        })
        .when('/webdev', {
            templateUrl: 'partials/webdev.html',
        })
        .when('/programming', {
            templateUrl: 'partials/programming.html',
        })
        .when('/contact', {
            templateUrl: 'partials/contact.html',
        })
        .when('/project/:id',{
            templateUrl: 'partials/project.html',
            controller: 'MainController'
        })
    
    	.otherwise({
            redirectTo: '/'
        });
}]);

