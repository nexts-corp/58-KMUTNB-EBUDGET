//ngContextPath


var myApp = angular.module('managePlanning', ['commonApp']);

myApp.controller('mainCtrl', function($scope,cde,$controller) {
    $controller('cmListController', {$scope: $scope});
    
    $scope.init = function(){
        $('[ng-app]').show();
        $scope.cmListYear();
        $scope.cmListBudgetType();
        $scope.cmListDepartment();
        
        //$scope.testPath = cde.path("app//service//action/subAction");
        $('[ng-model=education],[ng-model=academic]').number( true, 2 );
    };
    
    $scope.sumProceeds = function(){
        
        var val1 =  parseFloat($scope.education);
        if(isNaN(val1)){
            val1 = 0; 
        }
        
        var val2 =  parseFloat($scope.academic);
        if(isNaN(val2)){
            val2 = 0; 
        }

        return val1+val2;
    };
    
    
    
    
    
});
