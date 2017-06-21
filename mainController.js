angular.module('mainApp')
.controller('MainController', function ($scope) {
    'use strict';

    console.log("controller");

    var root = '#!/resources/';

    var profileDirectory = {
        name: "Profile Directory",
        description: "Pretty up and organize your profile with a fancy profile directory.",
        url: root + 'profile_directory',
        img: 'profile.png'
    };
    var profileGreeting = {
        name: "Profile Greeting",
        description: "Greet your visitors with a personalized welcome message.",
        url: root + 'profile_greeting',
        img: 'greeting.jpg'
    };
    var fullGallery = {
        name: "Full Gallery Directory",
        description: "Show off your best works with a gallery directory. Full-sized images put the emphasis on your artwork.",
        url: root + '/resources/full_gallery_directory.php',
        img: 'full_gallery.png'
    };
    var galleryDirectory = {
        name: "Gallery Directory",
        description: "Show off your best works with a gallery directory.",
        url: root + '/resources/gallery_directory.php',
        img: 'gallery.png'
    };
    var slideshow = {
        name: "Gallery Slideshow",
        description: "Create a gallery slideshow to display your best artworks in style.",
        url: root + '/resources/slideshow.php',
        img: 'slideshow.png'
    };

    $scope.resourceItems = [profileDirectory, profileGreeting, fullGallery, galleryDirectory, slideshow];

    $scope.journalCreator = {
        name: "Journal Creator",
        description: "Make your own DeviantART Journal skins using this free and easy-to-use tool.",
        url: '/resources/basic_journal.php',
        img: 'journal.png'
    };

})

// Resource
.directive('resource', function() {
    return {
        restrict: 'E',
        scope: { item: '=' },
        templateUrl: '/resources/partials/resourceItem.html',
    }
});
