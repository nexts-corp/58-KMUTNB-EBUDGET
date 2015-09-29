var myApp = angular.module('formBudget', ['commonApp']);
myApp.controller('mainController', function($scope,$http,$controller) {
    
    $scope.activeNg = false;
    $scope.activeTemplate = "no";
    
    $scope.openForm = function(form){
        $scope.activeNg = true;
        $scope.activeTemplate = form;
    };
    
});

