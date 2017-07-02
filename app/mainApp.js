const resources = "assets/css/pages/resources/";
const tutorialCss = 'assets/css/pages/tutorials/tutorials.css';

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
        .when('/resources/slideshow', {
            templateUrl: 'app/resources/slideshow/index.html',
            controller: 'SlideshowCtrl',
            css: resources + 'slideshow.css'
        })
        .when('/resources/fullGalleryDirectory', {
            templateUrl: 'app/resources/fullGalleryDirectory/index.html',
            controller: 'FullGalleryDirectoryCtrl',
            css: resources + 'fullGalleryDirectory.css'
        })
        // .when('/resources/fullGalleryDirectory', {
        //     templateUrl: 'app/resources/galleryDirectory/index.html',
        //     controller: 'GalleryDirectoryCtrl',
        //     css: resources + 'galleryDirectory.css'
        // })
        .when('/resources/journal_creator', {
            templateUrl: 'app/resources/journal_creator/journal_creator.html',
            controller: 'JournalCreatorCtrl',
            css: resources + 'journal_creator.css'
        })

        // Tutorials

        .when('/tutorials/adding-profile-css', {
            templateUrl: 'app/tutorials/adding-profile-css.html',
            controller: 'TutorialCtrl',
            css: tutorialCss
        })
        .when('/tutorials/get-image-url', {
            templateUrl: 'app/tutorials/get-image-url.html',
            controller: 'TutorialCtrl',
            css: tutorialCss
        })
        .when('/tutorials/websafe-and-google-fonts', {
            templateUrl: 'app/tutorials/websafe-and-google-fonts.html',
            controller: 'TutorialCtrl',
            css: tutorialCss
        })
        .when('/tutorials/get-link-to-profile-widget', {
            templateUrl: 'app/tutorials/get-link-to-profile-widget.html',
            controller: 'TutorialCtrl',
            css: tutorialCss
        })

        // Other

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
