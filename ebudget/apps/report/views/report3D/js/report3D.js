var myApp = angular.module('report3D', ['commonApp']);

myApp.controller('mainController', function ($scope, $http, $controller) {


    var listPeriod = []; //Global Variable
    var listDeptGroupA = []; //Global Variable
    var listDeptGroupB = []; //Global Variable
    var listL3DPlan = []; //Global Variable
    var listL3DFund = []; //Global Variable
    var pathJavaserver = "http://localhost:9999/api";
    $controller('cmListController', {$scope: $scope});

    $scope.init = function () {
        $("[ng-app]").show();

        $scope.page = "home";
        $scope.reportId = 'ง.2';

        $scope.listReport = [
            {
                name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/กองทุน (ง. 1)', type: 'G',
                id: 'NG1'
            },
            {
                name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/กองทุน/งบรายจ่าย (ง. 2)',
                type: 'G',
                id: 'NG2'
            },
            {
                name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/สำนักงาน/ภาควิชา/สาขาวิชา/งบรายจ่าย (ง. 2-1)',
                type: 'G',
                id: 'NG2_1'
            },
            {
                name: 'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/หน่วยงาน/ภาควิชา/กองทุน (ง. 2-2)',
                type: 'G',
                id: 'NG2_2'
            },
            {
                name: 'รายละเอียดงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/กองทุน/งบรายจ่าย (ง. 3)',
                type: 'G',
                id: 'NG3'
            },
            {
                name: 'รายงานแผน/ผล การใช้งบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน (ง. 4)', type: 'G',
                id: 'NG4'
            },
            {
                name: 'รายงาน ร.1', type: 'K',
                id: 'R1'
            },
            {
                name: 'รายงาน ร.2', type: 'K',
                id: 'R2'
            },
            {
                name: 'รายงาน ร.3', type: 'K',
                id: 'R3'
            }
        ];

        $scope.listReportType = [
            {id: 'G', name: 'รายงานงบประมาณแผ่นดิน'},
            {id: 'K', name: 'รายงานเงินรายได้'}
        ];

        $scope.budgetPeriodIdLoading = true;
        $scope.facultyIdLoading = true;
        $scope.deptIdLoading = true;
        $scope.l3dPlanIdLoading = true;
        $scope.l3dFundIdLoading = true;
        $scope.showTable = false;

        $scope.fetchPeriod();
        $scope.cmListYear();
        $scope.fetchDept('A');
        $scope.fetchDept('B');
        $scope.fetchL3dPlan();
        $scope.fetchL3dFund();

    };

    $scope.getSelectReportPage = function (idReport) {
        $scope.reportId = idReport;
        $scope.page = "report";
    };

    $scope.back = function () {
        $scope.page = "home";
        $scope.selectYear = "udf";
    };


    $scope.fetchPeriod = function () {

        if (listPeriod.length <= 0) {
            $http.post(ngContextPath + "/api/common/lookup/listYear").then(function (response) {
                listPeriod = response.data.lists;
                $scope.listPeriod = response.data.lists;
            }).finally(function () {
                // Hide loading spinner whether our call succeeded or failed.
                $scope.budgetPeriodIdLoading = false;
            });
        } else {
            $scope.listPeriod = listPeriod;
        }
    };


    $scope.fetchDept = function (groupDept) {

        if (groupDept.toUpperCase() == "A") {

            if (listDeptGroupA.length <= 0) {
                $http.post(ngContextPath + "/api/report/rptservice/listDept/A").then(function (response) {
                    listDeptGroupA = response.data.lists;
                    $scope.listDeptA = response.data.lists;
                }).finally(function () {
                    // Hide loading spinner whether our call succeeded or failed.
                    $scope.facultyIdLoading = false;
                });
            } else {
                $scope.listDeptA = listPeriod;
            }

        } else if (groupDept.toUpperCase() == "B") {

            if (listDeptGroupB.length <= 0) {
                $http.post(ngContextPath + "/api/report/rptservice/listDept/B").then(function (response) {
                    listDeptGroupB = response.data.lists;
                    $scope.listDeptB = response.data.lists;
                }).finally(function () {
                    // Hide loading spinner whether our call succeeded or failed.
                    $scope.deptIdLoading = false;
                });
            } else {
                $scope.listDeptB = listPeriod;
            }
        }
    };

    $scope.fetchL3dPlan = function () {

        if (listL3DPlan.length <= 0) {
            $http.post(ngContextPath + "/api/report/rptservice/listl3dplan").then(function (response) {
                listL3DPlan = response.data.lists;
                $scope.listL3DPlan = response.data.lists;
            }).finally(function () {
                // Hide loading spinner whether our call succeeded or failed.
                $scope.l3dPlanIdLoading = false;
            });
        } else {
            $scope.listL3DPlan = listL3DPlan;
        }
    };

    $scope.fetchL3dFund = function () {

        if (listL3DFund.length <= 0) {
            $http.post(ngContextPath + "/api/report/rptservice/listl3dfund").then(function (response) {
                listL3DFund = response.data.lists;
                $scope.listL3DFund = response.data.lists;
            }).finally(function () {
                // Hide loading spinner whether our call succeeded or failed.
                $scope.l3dFundIdLoading = false;
            });
        } else {
            $scope.listL3DFund = listL3DFund;
        }
    };

    $scope.export = function (exportType, dataItem) {

        //All Parameter
        var REPORT_CODE = dataItem["id"];
        var BUDGET_TYPE = dataItem["type"];
        var EXPORT_TYPE = exportType;

        var PERIOD_ID = $scope.budgetPeriodId["year"];
        var FACULTY_ID = $scope.facultyId["id"];
        var DEPT_ID = $scope.deptId["id"];
        var PLAN_ID = $scope.l3dPlanId["id"];
        var FUND_ID = $scope.l3dFundId["id"];

        //var url = pathJavaserver + "/ebudget/report/export/" + REPORT_CODE + "/" + EXPORT_TYPE + "/" + PERIOD_ID + "/" + BUDGET_TYPE;
        //window.open(url);
    };

    $scope.checkShowTable = function () {

        if ($scope.budgetPeriodId != undefined && $scope.reportType != undefined && $scope.facultyId != undefined && $scope.deptId != undefined && $scope.l3dPlanId != undefined && $scope.l3dFundId != undefined) {

            $scope.showTable = true;
        } else {
            $scope.showTable = false;
        }
    };

});

// init jquery functions and plugins
$(document).ready(function () {

    $("#budgetPeriod,#faculty,#dept,#l3dplan,#l3dfund,#reportName,#reportType").select2().trigger("change");

});
