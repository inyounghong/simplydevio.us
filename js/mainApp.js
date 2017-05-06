angular.module('mainApp', ['ngRoute']).config(function ( $routeProvider ) {
  'use strict';
    // configure urls
    $routeProvider
    .when('/', {
        templateUrl: 'views/index.html',
        controller: 'MainController',
    })
    .otherwise({ // default
        redirectTo: '/'
    });
});

// angular.module('mainApp').config(function (minicolorsProvider) {
//   angular.extend(minicolorsProvider.defaults, {
//     control: 'hue',
//     position: 'top left'
//   });
// });
