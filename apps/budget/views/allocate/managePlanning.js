//ngContextPath


var myApp = angular.module('managePlanning', ['commonApp']);

myApp.controller('mainCtrl', function($scope,cde,$controller) {
    $controller('cmListController', {$scope: $scope});
    
    $scope.init = function(){
        $('[ng-app]').show();
        $scope.cmListYear();
        $scope.cmListBudgetType();
        $scope.cmListDepartment();
        
        $scope.dataAllocate = [];
        
        //$scope.testPath = cde.path("app//service//action/subAction");
    };
    
    
    $scope.addItem = function(){
        $scope.dataAllocate.push({
            department:$scope.department,
            education:$scope.education,
            academic:$scope.academic
        });
        
        $scope.education = "";
        $scope.academic = "";
        $scope.department = "udf";
    };
    
    
    $scope.delItem = function(index){
        if(confirm("ยืนยันการลบ")){
            //alert(index);
            $scope.dataAllocate.splice(index,1);
        }
    };
    
    
    $scope.sumRows = function(val1,val2){
        return parseFloat(val1)+parseFloat(val2);
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
