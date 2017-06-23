const resources = "css/pages/resources/";

angular.module('mainApp', ['ngRoute', 'minicolors', 'ngSanitize'])
.config(['$routeProvider', function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl: 'app/views/index.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/resources', {
            templateUrl: 'resources/main/resources.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/resources/profile_greeting', {
            templateUrl: 'app/resources/profile_greeting/profile_greeting.html',
            controller: 'ProfileGreetingCtrl',
            css: resources + 'profile_greeting.css'
        })
        .when('/resources/profile_directory', {
            templateUrl: 'resources/profile_directory/profile_directory.html',
            controller: 'ProfileDirectoryCtrl',
            css: resources + 'profile_directory.css'
        })
        .when('/resources/journal_creator', {
            templateUrl: 'app/resources/journal_creator/journal_creator.html',
            controller: 'JournalCreatorCtrl',
            css: resources + 'journal_creator.css'
        })
        .when('/scripts', {
            templateUrl: 'scripts/scripts.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/contact', {
            templateUrl: 'contact/contact.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .otherwise({ // default
            redirectTo: '/'
        });
}])


angular.module('mainApp').config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'bottom left'
  });
});
