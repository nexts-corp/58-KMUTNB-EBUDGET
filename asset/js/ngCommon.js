var commonApp = angular.module('commonApp',[]);

commonApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


commonApp.controller('cmListController',function($scope,$http){
    
    $scope.cmListYear = function(){
        $http.post("../../common/lookup/listYear",{}).then(function(response) {
            $scope.cmDataListYear = response.data.lists;
        });
    };
    
    $scope.cmListFaculty = function(){
        $http.post("../../common/lookup/listFaculty",{}).then(function(response) {
            $scope.cmDataListFaculty = response.data.lists;
        });
    };
    
    $scope.cmListDepartment = function(facultyId){
        $http.post("../../common/lookup/listDepartment",{facultyId:facultyId}).then(function(response) {
            $scope.cmDataListDepartment = response.data.lists;
        });
    };
    
    $scope.cmListFundgroup = function(){
        $http.post("../../common/lookup/listFundgroup",{}).then(function(response) {
            $scope.cmDataListFundgroup = response.data.lists;
        });
    };
    
    $scope.cmRevenuePlan = function(){
        $http.post("../../common/lookup/listRevenuePlan",{}).then(function(response) {
            $scope.cmDataListRevenuePlan = response.data.lists;
        });
    };
    
    $scope.cmBudgetPlan = function(){
        $http.post("../../common/lookup/listBudgetPlan",{}).then(function(response) {
            $scope.cmDataListBudgetPlan = response.data.lists;
        });
    };
    
});          
