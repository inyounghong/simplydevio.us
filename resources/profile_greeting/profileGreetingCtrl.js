angular.module('mainApp')
.controller('ProfileGreetingCtrl', function ($scope) {
    'use strict';

    var visitor = "";
    var isLocked = true;
    var domain = window.location.href.split("/")[2];
    var start = '<div align="center"><img src="http://' + domain + '/resources/profile_greeting/user_greetings/';
    var end = '"></div>';

    $scope.refresh = refresh;
    $scope.hidePopup = hidePopup;
    $scope.getCode = getCode;
    $scope.checkPassword = checkPassword;
    $scope.checkUsername = checkUsername;
    $scope.inputUpdate = updateDisplayImageStyle;
    $scope.submitUploadFont = submitUploadFont;

    $scope.imageData = {};

    // Set default values
    setDefaultInputValues();
    getFontList();

    // Show image
    updateDisplayImage();


    //////// Functions

    function setDefaultInputValues() {
        $scope.imageData.message1 = "Hey visitor!";
        $scope.imageData.message2 = "Welcome to my page!";
        $scope.imageData.color = "#FFFFFF";
        $scope.imageData.background = "#000000";
        $scope.imageData.fontSize = 15;
        $scope.imageData.paddingX = 20;
        $scope.imageData.paddingY = 20;
        $scope.imageData.lineSpacing = 10;
        $scope.imageData.transparent = false;
        $scope.imageData.font = "arberkley.ttf";
    }

    function getCode() {
        $("#popup").fadeIn(100);

        // Updating real image after making changes to display image
        if (!isLocked) {
            updateRealImage(true);
            showCodes();
        }
    }

    function hidePopup() {
        $("#popup").fadeOut(100);
    }

    // Completely update display image and execute function for name
    function updateDisplayImage(refreshPopup) {
        var i = generateImageObject();
        i.visitor = "";
        postCreateImage(i, refreshPopup);
    }

    // Update only the style of the display image
    function updateDisplayImageStyle() {
        var i = generateImageObject();
        postCreateImage(i);
    }

    // Update the real image
    function updateRealImage(refreshPopup) {
        var i = generateImageObject();
        i.generate = true;
        return postCreateImage(i, refreshPopup);
    }

    function refresh() {
        $("#daWidget").css("opacity", "0.5");
        updateDisplayImage();
    }

    function colorStrip(color) {
        return color.replace(/#/, '');
    }

    // Button 1 in Popup
    function checkPassword() {
        var pass = $scope.imageData.password;
        if (pass == undefined) {
            handlePasswordCheck("false");
            return;
        }
        pass = pass.trim().toLowerCase();
        $scope.imageData.username = "";
        $.ajax({
            url: '/resources/profile_greeting/php/checkGreetingPassword.php',
            type: 'get',
            data: {password: pass},
            success: function(res) {
                handlePasswordCheck(res);
                isLocked = false;
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    // Check slide 1
    function handlePasswordCheck(res) {
        var passMsg = "Incorrect password!";
        var termMsg = "Please agree to the terms of use!";

        if(res == "false") { // Wrong password
            $scope.passwordMessage = passMsg
            $("#passwordMessage").fadeIn(100);
        }
        else if (!$("#terms1").is(":checked")){
            $scope.passwordMessage = termMsg
            $("#passwordMessage").fadeIn(100);
        }
        else{
            $("#slide1").fadeOut(0);
            $("#slide2").fadeIn(200);
        }
        $scope.$apply();
    }

    // Slide 3 show codes
    function showCodes() {
        var username = getUsername();
        $("#recommended").val(start + getFilename(username) + end);
    }

    // Slide 3 show real image
    function showPopupImage() {
        var username = getUsername();
        $("#generatedImage").html(start + getFilename(username) + "?" + new Date().getTime() + end);
    }

    // Slide 2 -> Slide 3
    function checkUsername() {
        var userMsg = "Please enter your username!";
        var username = $scope.imageData.username.trim().toLowerCase();

        if(username == '') {
            $scope.usernameMessage = userMsg;
            $("#usernameMessage").fadeIn(100);
        } else {
            $("#slide2").fadeOut(0);
            $("#slide3").fadeIn(200);
            $("#popupLoad").show();

            $.when(updateRealImage()).done(function() {
                updateDisplayImage(true);
            });

            showCodes();
            $("#displayUsername").text(username);
            $("#displayUsername").attr("href", "http://" + username + ".deviantart.com");
        }
    }

    function getUsername() {
        var username = $scope.imageData.username;
        if (username == undefined || isLocked || username.trim() == "") {
            return "simplysilent";
        }
        return username.trim().toLowerCase();
    }

    // Generates an object of all image details to be passed in AJAX call
    function generateImageObject() {
        var i = $scope.imageData;
        i.color = $scope.imageData.color;
        i.background = $scope.imageData.background;
        i.username = getUsername();
        i.visitor = visitor;
        i.generate = false;

        // Generate file name from today's date
        i.filename = getFilename(i.username);
        i.default = "visitor"; // EDIT
        return i;
    }

    // Return date in two digit format (ie 5 -> 05)
    function padDate(num) {
        if (num < 10) {
            return '0' + num;
        }
        return num;
    }

    // Returns recommended filename for user: username-date.php
    function getFilename(username) {
        var today = new Date();
        var dateString = today.getFullYear() + "" + padDate(today.getMonth()+1) + "" + padDate(today.getDate());
        return username + "-" + dateString + ".php";
    }

    // AJAX call to create image from given [i] image details
    function postCreateImage(i, hidePopup) {
        return $.ajax({
            url: '/resources/profile_greeting/php/createImage.php',
            type: 'get',
            data: i,
            success: function(data) {
                $("#previewImage").attr("src", "/resources/profile_greeting/user_greetings/display.php?" + new Date().getTime());
                $("#loading").hide();
                $("#daWidget").css("opacity", "1");
                $("#previewImage").show();
                visitor = data;

                if (hidePopup) { // Handle show popup image
                    showPopupImage();
                    $("#popupLoad").hide();
                }
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    }

    // Gets an array of all the fonts on the server
    function getFontList() {
        $.ajax({
            url: '/resources/profile_greeting/php/getFontList.php',
            type: 'get',
            success: function(data) {
                $scope.fonts = data;
            },
            error: function(xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
                return [];
            },
            dataType:"json"
        });
    }


    function showUploadForm() {
        $("#uploadForm").show();
    }

    function submitUploadFont() {
        $("#uploadForm").submit();
    }
});
