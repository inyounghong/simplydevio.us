angular.module('mainApp', ['ngRoute', 'minicolors', 'ngSanitize'])
.config(function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl: 'views/index.html',
            controller: 'MainController',
        })
        .when('/resources', {
            templateUrl: 'resources/main/resources.html',
            controller: 'MainController',
        })
        .when('/resources/profile_greeting', {
            templateUrl: 'resources/profile_greeting/profile_greeting.html',
            controller: 'ProfileGreetingCtrl',
        })
        .when('/resources/profile_directory', {
            templateUrl: 'resources/profile_directory/profile_directory.html',
            controller: 'ProfileDirectoryCtrl',
            // css: 'resources/profile_directory/css/profile_directory.css'
        })
        .when('/scripts', {
            templateUrl: 'scripts/scripts.html',
            controller: 'MainController',
        })
        .when('/contact', {
            templateUrl: 'contact/contact.html',
            controller: 'MainController',
        })
        .otherwise({ // default
            redirectTo: '/'
        });
});

angular.module('mainApp').config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'top left'
  });
});
