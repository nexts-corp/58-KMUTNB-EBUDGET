var myApp = angular.module('viewPlan', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('tableController', function($scope,$http) {
    
    $scope.data = {};
    $scope.txtPlanAddClass = [];
    
    
    $scope.selectChange = function() {

        if($scope.selectYear!=="udf" && $scope.selectBudget!=="udf"){

            $http.get("fetchPlan/2558/"+$scope.selectBudget).success(function(response) {
                $scope.data = response.listsPlan;
            });
            
        }

    };
    
    
    $scope.insertPlan = function(year,name,bugget) {
        
        
        $http.get("insertPlan/"+year+"/"+name+"/"+bugget).success(function(response) {
            if(response.reqInsertPlan!=="exist"){
                $scope.txtPlanAdd = "";
                $scope.data.push(response.reqInsertPlan);
                //console.log(JSON.stringify($scope.data, null, 4));
                $scope.txtPlanAddClass.pop('has-error');
            }else{
                $scope.txtPlanAddClass.push('has-error');
                console.log("exist");
            }
        });
    };
    
    $scope.updatePlan = function() {
        console.log("test");
    };
    
    $scope.deletePlan = function(index,id,bugget) {
        
        if(confirm("ยืนยันการลบ")){
            $http.get("deletePlan/"+id+"/"+bugget).success(function(response) {
                $scope.data.splice(index, 1);
            }); 
        }
        
    };
    
});