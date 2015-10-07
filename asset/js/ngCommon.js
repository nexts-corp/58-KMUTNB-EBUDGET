var commonService = angular.module('commonService', []); 
         
commonService.service('cde', function () {
    
    this.path = function (path) {
        var subPath = path.split('//');
        
        var projectUri = 'kmutnb-ebudget';
        var appUri = 'budget';
        var serUri = 'allocate';
        
        if(subPath.length === 1){
            return '/'+projectUri+'/api/'+appUri+'/'+serUri+'/'+subPath[0];
        }else if(subPath.length === 2){
            return '/'+projectUri+'/api/'+appUri+'/'+subPath[0]+'/'+subPath[1];
        }else if(subPath.length === 3){
            return '/'+projectUri+'/api/'+subPath[0]+'/'+subPath[1]+'/'+subPath[2];
        }else{
            return "Path is error.";
        }
        
    };
    
});




var commonApp = angular.module('commonApp', ['commonService']);

commonApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
});


commonApp.controller('cmListController', function ($scope, $http) {

    $scope.cmListYear = function () {
        $http.post(ngContextPath+"/api/common/lookup/listYear", {}).then(function (response) {
            $scope.cmDataListYear = response.data.lists;
        });
    };

    $scope.cmListFaculty = function (campusId) {
        $http.post(ngContextPath+"/api/common/lookup/listFaculty", {campusId: campusId}).then(function (response) {
            $scope.cmDataListFaculty = response.data.lists;
        });
    };

    $scope.cmListDepartment = function (facultyId) {
        $http.post(ngContextPath+"/api/common/lookup/listDepartment", {facultyId: facultyId}).then(function (response) {
            $scope.cmDataListDepartment = response.data.lists;
        });
    };

    $scope.cmListFundgroup = function () {
        $http.post(ngContextPath+"/api/common/lookup/listFundgroup", {}).then(function (response) {
            $scope.cmDataListFundgroup = response.data.lists;
        });
    };

    $scope.cmRevenuePlan = function () {
        $http.post(ngContextPath+"/api/common/lookup/listRevenuePlan", {}).then(function (response) {
            $scope.cmDataListRevenuePlan = response.data.lists;
        });
    };

    $scope.cmListBudgetPlan = function (budgetYear) {
        $http.post(ngContextPath+"/api/common/lookup/listBudgetPlan", {budgetYear: budgetYear}).then(function (response) {
            $scope.cmDataListBudgetPlan = response.data.lists;
        });
    };
    
    $scope.cmListBudgetType = function () {
        $http.post(ngContextPath+"/api/common/lookup/listBudgetType").then(function (response) {
            $scope.cmDataListBudgetType = response.data.lists;
        });
    };
    
    
    
    
    $scope.cmListAffirmativeType = function () {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeType").then(function (response) {
            $scope.cmDataListAffirmativeType = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeIssue = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeIssue",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeIssue = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeTarget = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeTarget",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeTarget = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeStrategy = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeStrategy",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeStrategy = response.data.lists;
        });
    };
    
    
});
