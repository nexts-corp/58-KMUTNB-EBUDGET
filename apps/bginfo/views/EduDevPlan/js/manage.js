var myApp = angular.module('EduDevPlan', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('mainController', function($scope,$http) {
    

    $scope.dataType = {};
    $scope.dataIssueAndTarget = {};
    
    $http.get("fetchType").success(function(response) {
        //console.log(JSON.stringify(response.dataList, null, 4));
        $scope.dataType = response.dataList;
    });

    $scope.selectPlanChange = function() {
        
        var sendData = {pData:{mainPlanTypeId:$scope.selectPlan}};
        $http.post("fetchIssueAndTarget", JSON.stringify(sendData) ).then(function(response) {
            console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataIssueAndTarget = response.data.dataList;
        });
        

    };
    
    
    
    
    
    
});
