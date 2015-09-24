var myApp = angular.module('report3D', ['commonApp']);

myApp.controller('mainController', function ($scope, $http, $controller) {

    $controller('cmListController', {$scope: $scope});

    $scope.init = function () {
        $("[ng-app]").show();

        $scope.page = "home";
        $scope.reportId = 'ง.2';

        $scope.dataListReport = [
            {name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/กองทุน (ง. 1)', id: 'ง.1'},
            {name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/กองทุน/งบรายจ่าย (ง. 2)', id: 'ง.2'},
            {name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/สำนักงาน/ภาควิชา/สาขาวิชา/งบรายจ่าย (ง. 2-1)', id: 'ง.2-1'},
            {name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/หน่วยงาน/ภาควิชา/กองทุน (ง. 2-2)', id: 'ง.2-2'},
            {name: 'รายละเอียดงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/กองทุน/งบรายจ่าย (ง. 3)', id: 'ง.3'},
            {name: 'รายงานแผน/ผล การใช้งบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน (ง. 4)', id: 'ง.4'}
        ];

        $scope.dataListClassReport = [
            {id: '1', name: 'จำแนกตามหน่วยงาน / งบรายจ่าย'},
            {id: '2', name: 'จำแนกตามแผนงาน / งบรายจ่าย'},
            {id: '3', name: 'จำแนกตามหน่วยงาน / แผนงาน / กองทุน'},
            {id: '4', name: 'จำแนกตามหน่วยงาน - ภาควิชา / กองทุน'},
            {id: '5', name: 'จำแนกตามหน่วยงาน / กองทุน / งบรายจ่าย'},
            {id: '6', name: 'จำแนกตามหน่วยงาน / งบรายจ่าย'},
            {id: '7', name: 'จำแนกตามแผนงาน / หน่วยงาน / งบรายจ่าย'}
        ];


        $scope.cmListYear();
        $scope.cmListFaculty('0');
        $scope.cmBudgetPlan(2558);
    };

    $scope.getSelectReportPage = function (idReport) {
        $scope.reportId = idReport;
        $scope.page = "report";
    };

    $scope.back = function () {
        $scope.page = "home";
        $scope.selectYear = "udf";
    };


});
