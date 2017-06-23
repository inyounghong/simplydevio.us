const resources = "assets/css/pages/resources/";


angular.module('mainApp', ['ngRoute', 'minicolors', 'ngSanitize'])
.config(['$routeProvider', function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl: 'app/views/index.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })

        .when('/resources', {
            templateUrl: 'app/resources/index/resources.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/resources/profile_greeting', {
            templateUrl: 'app/resources/profile_greeting/profile_greeting.html',
            controller: 'ProfileGreetingCtrl',
            css: resources + 'profile_greeting.css'
        })
        .when('/resources/profile_directory', {
            templateUrl: 'app/resources/profile_directory/profile_directory.html',
            controller: 'ProfileDirectoryCtrl',
            css: resources + 'profile_directory.css'
        })
        .when('/resources/journal_creator', {
            templateUrl: 'app/resources/journal_creator/journal_creator.html',
            controller: 'JournalCreatorCtrl',
            css: resources + 'journal_creator.css'
        })

        .when('/tutorials/adding-profile-css', {
            templateUrl: 'app/tutorials/adding-profile-css.html',
            controller: 'TutorialCtrl',
            css: 'assets/css/pages/tutorials/tutorials.css'
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
