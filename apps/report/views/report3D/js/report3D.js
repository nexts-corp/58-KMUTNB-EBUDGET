var myApp = angular.module('report3D', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});

myApp.controller('mainController', function($scope,$http) {

    
    
    $scope.init = function () {
        
        $scope.page = "report";
        $scope.reportId = 'ง.2';
        
        $scope.dataListReport = [
            {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/กองทุน (ง. 1)',id:'ง.1'},
            {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/กองทุน/งบรายจ่าย (ง. 2)',id:'ง.2'},
            {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/สำนักงาน/ภาควิชา/สาขาวิชา/งบรายจ่าย (ง. 2-1)',id:'ง.2-1'},
            {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/หน่วยงาน/ภาควิชา/กองทุน (ง. 2-2)',id:'ง.2-2'},
            {name:'รายละเอียดงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/กองทุน/งบรายจ่าย (ง. 3)',id:'ง.3'},
            {name:'รายงานแผน/ผล การใช้งบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน (ง. 4)',id:'ง.4'}
        ];
        
        $scope.dataListClassReport = [
            {id:'1',name:'จำแนกตามหน่วยงาน / งบรายจ่าย'},
            {id:'2',name:'จำแนกตามแผนงาน / งบรายจ่าย'},
            {id:'3',name:'จำแนกตามหน่วยงาน / แผนงาน / กองทุน'},
            {id:'4',name:'จำแนกตามหน่วยงาน - ภาควิชา / กองทุน'},
            {id:'5',name:'จำแนกตามหน่วยงาน / กองทุน / งบรายจ่าย'},
            {id:'6',name:'จำแนกตามหน่วยงาน / งบรายจ่าย'},
            {id:'7',name:'จำแนกตามแผนงาน / หน่วยงาน / งบรายจ่าย'}
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
