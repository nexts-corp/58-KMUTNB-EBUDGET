var myApp = angular.module('report3D', ['commonApp']);


myApp.controller('mainController', function($scope,$http,$controller) {
    $controller('cmListController', {$scope: $scope});
    
    
    $scope.init = function () {
        $("[ng-app]").show();
        
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
        $scope.cmListFaculty(0);
        $scope.cmListFundgroup();
        //$scope.cmRevenuePlan();
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
