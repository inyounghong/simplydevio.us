angular.module('mainApp')
.controller('MainController', function ($scope) {
    'use strict';

    console.log("controller");

    var root = '#!/resources/';

    var profileDirectory = {
        name: "Profile Directory",
        description: "Pretty up and organize your profile with a fancy profile directory.",
        url: root + 'profile_directory',
        img: 'profile_directory.png'
    };
    var profileGreeting = {
        name: "Profile Greeting",
        description: "Greet your visitors with a personalized welcome message.",
        url: root + 'profile_greeting',
        img: 'greeting.png'
    };
    var fullGallery = {
        name: "Full Gallery Directory",
        description: "Show off your best works with a gallery directory. Full-sized images put the emphasis on your artwork.",
        url: '/resources/full_gallery_directory.php',
        img: 'full_gallery_directory.png'
    };
    var galleryDirectory = {
        name: "Gallery Directory",
        description: "Show off your best works with a gallery directory.",
        url: '/resources/gallery_directory.php',
        img: 'gallery_directory.png'
    };
    var slideshow = {
        name: "Gallery Slideshow",
        description: "Create a gallery slideshow to display your best artworks in style.",
        url: '/resources/slideshow.php',
        img: 'gallery_slideshow.png'
    };

    $scope.resourceItems = [profileDirectory, profileGreeting, fullGallery, galleryDirectory, slideshow];

    $scope.journalCreator = {
        name: "Journal Creator",
        description: "Make your own DeviantART Journal skins using this free and easy-to-use tool.",
        url: '/resources/basic_journal.php',
        img: 'journal_creator.png'
    };

    $scope.tutorial = {
        name: "Adding Profile CSS",
        description: "Learn how to use CSS on your profile page.",
        url: '/resources/profile_tutorial.php',
        img: 'tutorial.png'
    };

    // Home page
    var newItem = profileGreeting;
    newItem.description = "New features include: Transparent backgrounds, text centering, greetings for groups.";
    $scope.newItems = [newItem];
})
