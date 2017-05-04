angular.module('myApp', ['ngRoute', 'minicolors']).config(function ( $routeProvider ) {
  'use strict';
    // configure urls
    $routeProvider
    .when('/', {
        templateUrl: 'views/profile_greeting.html',
        controller: 'ProfileGreetingCtrl',
    })
    .when("/faq", {
        templateUrl: 'views/faq.html',
        controller: 'ProfileGreetingCtrl',
    })
    .otherwise({ // default
        redirectTo: '/'
    });
});

angular.module('myApp').config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'top left'
  });
});
