var myApp = angular.module('report3D', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});

myApp.controller('mainController', function($scope,$http) {

    
    
    $scope.init = function () {
        
        $scope.page = "home";
        //$scope.reportId = 'ง.2';
        
        $scope.dataListReport = [
            {name:'แบบจำแนกตามแผนงาน/กองทุน/หมวดรายจ่าย (ร. 2)',id:'ร.2'},
            {name:'แบบงบประมาณรายจ่ายเงินรายได้ จำแนกตามหน่วยงาน-ภาควิชา-สาขาวิชา/หมวดรายจ่าย (ร. 2-1)',id:'ร.2-1'},
            {name:'แบบงบประมาณรายจ่ายเงินรายได้ จำแนกตามหน่วยงาน-ภาควิชา-สาขาวิชา/กองทุน (ร. 2-2)',id:'ร.2-2'},
            {name:'คำชี้แจงงบประมาณรายจ่ายเงินรายได้ จำแนกตามแผนงาน/กองทุน/หมวดรายจ่าย (ร. 3)',id:'ร.3'},
            {name:'แผน/ผล การใช้จ่ายงบประมาณรายจ่ายเงินรายได้ (ร. 4)',id:'ร.4'}
        ];
        
        
        $scope.cmListYear();
        $scope.cmListFaculty();
        $scope.cmListFundgroup();
        $scope.cmRevenuePlan();
        $scope.cmBudgetPlan();
    };
    
    
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
    
    
    
    
    
    $scope.getSelectReportPage = function(idReport){
        $scope.reportId = idReport;
        $scope.page = "report";
    };
    
    $scope.back = function(){
        $scope.page = "home";
        $scope.selectYear = "udf";
    };
    
    
});
