//ngContextPath


var myApp = angular.module('managePlanning', ['commonApp']);

myApp.controller('mainCtrl', function($scope,cde) {
    
    $scope.init = function(){
        $('[ng-app]').show();
        //$scope.testPath = cde.path("app//service//action/subAction");
    };
    
    
    
});
