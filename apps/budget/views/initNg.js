
var myApp = angular.module('formBudget', ['commonApp']);
myApp.controller('mainController', function($scope,$http,$controller) {
    
    $scope.activeNg = false;
    $scope.activeTemplate = "no";
    
    $scope.openForm = function(form,param){
        $scope.activeNg = true;
        $scope.activeTemplate = form;
        $scope.param = param;
        
        window.scroll(0,0);
        //$scope.$broadcast(form+'Init');
        
    };
    
    //use for project
    //$scope.openForm("project",tParam);
    
});

