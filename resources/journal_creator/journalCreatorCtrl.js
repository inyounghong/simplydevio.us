angular.module('mainApp')
.controller('JournalCreatorCtrl', function ($scope, $sce) {
    'use strict';

    $scope.j = {}; // Watched data
    $scope.data = {}; // Not watched (password)

    setUp();
    checkit();

    $scope.$watch("j", checkit, true);



});
