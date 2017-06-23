const resources = "css/pages/resources/";

angular.module('mainApp', ['ngRoute', 'minicolors', 'ngSanitize'])
.config(['$routeProvider', function($routeProvider){
    $routeProvider
        .when('/', {
            templateUrl: 'views/index.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/resources', {
            templateUrl: 'resources/main/resources.html',
            controller: 'MainController',
            css: resources + 'resources.css'
        })
        .when('/resources/profile_greeting', {
            templateUrl: 'resources/profile_greeting/profile_greeting.html',
            controller: 'ProfileGreetingCtrl',
            css: resources + 'profile_greeting.css'
        })
        .when('/resources/profile_directory', {
            templateUrl: 'resources/profile_directory/profile_directory.html',
            controller: 'ProfileDirectoryCtrl',
            css: resources + 'profile_directory.css'
        })
        .when('/resources/journal_creator', {
            templateUrl: 'resources/journal_creator/journal_creator.html',
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
.directive('head', ['$rootScope','$compile',
	function($rootScope, $compile){
		return {
			restrict: 'E',
			link: function(scope, elem){
				var html = '<link rel="stylesheet" ng-repeat="(routeCtrl, cssUrl) in routeStyles" ng-href="{{cssUrl}}" >';
				elem.append($compile(html)(scope));

                scope.routeStyles = {};

				$rootScope.$on('$routeChangeStart', function (e, next, current) {

					if(current && current.$$route && current.$$route.css){
						if(!Array.isArray(current.$$route.css)){
							current.$$route.css = [current.$$route.css];
						}
						angular.forEach(current.$$route.css, function(sheet){
							scope.routeStyles[sheet] = undefined;
						});
					}

					if(next && next.$$route && next.$$route.css){
						if(!Array.isArray(next.$$route.css)){
							next.$$route.css = [next.$$route.css];
						}
						angular.forEach(next.$$route.css, function(sheet){
							scope.routeStyles[sheet] = sheet;
						});
					}

				});

			}
		};
	}
]);

angular.module('mainApp').config(function (minicolorsProvider) {
  angular.extend(minicolorsProvider.defaults, {
    control: 'hue',
    position: 'bottom left'
  });
});
