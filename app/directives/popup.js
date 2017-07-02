angular.module('mainApp')
.directive('popup', function($window) {

    var isLocked = true;

    return {
        restrict: 'E',
        scope: false,
        templateUrl: 'app/directives/templates/popup.html',
        controller: ['$scope', function ($scope) {

            $scope.hidePopup = function() {
                $("#popup").fadeOut(100);
            }

            // Check password
            $scope.checkPassword = function() {
                $("#passwordMessage").fadeOut(100);

                if ($scope.password == undefined) {
                    $scope.password = '';
                }
                var pass = $scope.password.toLowerCase().trim();

                $.ajax({
                    url: $scope.root + 'php/checkPassword.php',
                    type: 'get',
                    data: {password: pass},
                    success: handlePasswordCheck,
                    error: function(xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                });
            }

            // Handle response from checkPassword
            function handlePasswordCheck(res) {
                var passMsg = "Incorrect password!";
                var termMsg = "Please agree to the terms of use!";

                if (res == "false") { // Wrong password
                    $scope.passwordMessage = passMsg;
                    $("#passwordMessage").fadeIn(100);
                }
                else if (!$scope.terms) { // Terms not checked
                    $scope.passwordMessage = termMsg;
                    $("#passwordMessage").fadeIn(100);
                }
                else { // All correct
                    $("#slide1").fadeOut(0);
                    $("#slide2").fadeIn(200);
                    $scope.isLocked = false;
                    $scope.checkit();
                }
                $scope.$apply();
            }
        }]
    }
});
