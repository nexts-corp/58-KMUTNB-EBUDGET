var myApp = angular.module('report3D', ['commonApp']);

myApp.controller('mainController', function ($scope, $http, $controller, $filter) {


    var listPeriod = []; //Global Variable
    var listDeptGroupA = []; //Global Variable
    var listDeptGroupB = []; //Global Variable
    var listL3DPlan = []; //Global Variable
    var listL3DFund = []; //Global Variable
    var pathJavaserver = "http://202.44.34.67/reporter2/api";
    //var pathJavaserver = "http://localhost:8888/api";
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
                name: 'แบบสรุปคำของบประมาณของส่วนราชการ (ง. 112)',
                type: 'G',
                id: 'NG112'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณเงินเดือน (ง. 140)',
                type: 'G',
                id: 'NG140'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณค่าจ้างประจำ (ง. 141)',
                type: 'G',
                id: 'NG141'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณค่าจ้างชั่วคราว (ง. 142)',
                type: 'G',
                id: 'NG142'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณเงินอุดหนุนเป็นค่าใช้จ่ายดำเนินงาน(ค่าตอบแทน ใช้สอบและวัสดุ) (ง. 143)',
                type: 'G',
                id: 'NG143'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณค่าสาธารณูปโภค (ง. 144)',
                type: 'G',
                id: 'NG144'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณเงินอุดหนุนเป็นค่าครุภัณฑ์ ค่าที่ดิน/สิ่งก่อสร้าง (ง. 145)',
                type: 'G',
                id: 'NG145'
            },
            {
                name: 'แบบรายละเอียดคำของบประมาณเงินอุดหนุนปีงบประมาณที่ขอตั้งงบประมาณ (ง. 146)',
                type: 'G',
                id: 'NG146'
            },
            {
                name: 'แบบงบประมาณรายจ่ายเงินรายได้  จำแนกตามหน่วยงาน-ภาควิชา-สาขาวิชา/หมวดรายจ่าย (ร. 2-1)', type: 'K',
                id: 'LR2_1'
            },
            {
                name: 'แบบงบประมาณรายจ่ายเงินรายได้  จำแนกตามหน่วยงาน-ภาควิชา-สาขาวิชา/กองทุน (ร. 2-2)', type: 'K',
                id: 'LR2_2'
            },
            {
                name: 'คำชี้แจงงบประมาณรายจ่ายเงินรายได้ จำแนกตาม แผนงาน/กองทุน/หมวดรายจ่าย (ร.3)', type: 'K',
                id: 'LR3'
            },
            {
                name: 'แผน/ผล การใช้จ่ายงบประมาณรายจ่ายเงินรายได้ประจำปีงบประมาณ (ร.4)', type: 'K',
                id: 'LR4'
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
        var FACULTY_NAME = $scope.facultyId["deptName"];
        var DEPT_ID_START, DEPT_NAME_START, DEPT_ID_END, DEPT_NAME_END;
        var PLAN_ID_START, PLAN_NAME_START, PLAN_ID_END, PLAN_NAME_END;
        var FUND_ID_START, FUND_NAME_START, FUND_ID_END, FUND_NAME_END;

        if ($scope.deptId == null) {
            //select between
            DEPT_ID_START = $scope.resultFilterDept[0].id;
            DEPT_NAME_START = $scope.resultFilterDept[0].deptName;
            DEPT_ID_END = $scope.resultFilterDept[$scope.resultFilterDept.length - 1].id;
            DEPT_NAME_END = $scope.resultFilterDept[$scope.resultFilterDept.length - 1].deptName;

        } else {

            DEPT_ID_START = $scope.deptId["id"];
            DEPT_NAME_START = $scope.deptId["deptName"];
            DEPT_ID_END = $scope.deptId["id"];
            DEPT_NAME_END = $scope.deptId["deptName"];
        }

        if ($scope.l3dPlanId == null) {
            //select between
            PLAN_ID_START = $scope.listL3DPlan[0].id;
            PLAN_NAME_START = $scope.listL3DPlan[0].planName;
            PLAN_ID_END = $scope.listL3DPlan[$scope.listL3DPlan.length - 1].id;
            PLAN_NAME_END = $scope.listL3DPlan[$scope.listL3DPlan.length - 1].planName;

        } else {

            PLAN_ID_START = $scope.l3dPlanId["id"];
            PLAN_NAME_START = $scope.l3dPlanId["planName"];
            PLAN_ID_END = $scope.l3dPlanId["id"];
            PLAN_NAME_END = $scope.l3dPlanId["planName"];
        }

        if ($scope.l3dFundId == null) {
            //select between
            FUND_ID_START = $scope.listL3DFund[0].id;
            FUND_NAME_START = $scope.listL3DFund[0].fundgroupName;
            FUND_ID_END = $scope.listL3DFund[$scope.listL3DFund.length - 1].id;
            FUND_NAME_END = $scope.listL3DFund[$scope.listL3DFund.length - 1].fundgroupName;

        } else {

            FUND_ID_START = $scope.l3dFundId["id"];
            FUND_NAME_START = $scope.l3dFundId["fundgroupName"];
            FUND_ID_END = $scope.l3dFundId["id"];
            FUND_NAME_END = $scope.l3dFundId["fundgroupName"];
        }

        var STATUS;
        $http.get(ngContextPath + "/api/report/rptservice/bgsetting/" + PERIOD_ID).then(function (response) {

            STATUS = response.data["status"];

        }).finally(function () {

            var params = {

                REPORT_CODE: String(dataItem["id"]),
                BUDGET_TYPE: dataItem["type"],
                EXPORT_TYPE: exportType,
                PERIOD_ID: String($scope.budgetPeriodId["year"]),
                FACULTY_ID: String($scope.facultyId["id"]),
                FACULTY_NAME: $scope.facultyId["deptName"],
                DEPT_ID_START: String(DEPT_ID_START),
                DEPT_NAME_START: DEPT_NAME_START,
                DEPT_ID_END: String(DEPT_ID_END),
                DEPT_NAME_END: DEPT_NAME_END,
                PLAN_ID_START: String(PLAN_ID_START),
                PLAN_NAME_START: PLAN_NAME_START,
                PLAN_ID_END: String(PLAN_ID_END),
                PLAN_NAME_END: PLAN_NAME_END,
                FUND_ID_START: String(FUND_ID_START),
                FUND_NAME_START: FUND_NAME_START,
                FUND_ID_END: String(FUND_ID_END),
                FUND_NAME_END: FUND_NAME_END,
                STATUS: STATUS

            };

            console.log(params);

            var paramstr = encodeURIComponent(JSON.stringify(params));
            var bytes = utf8.encode(JSON.stringify(params));
            var paramstr = base64.encode(bytes);

            var url = pathJavaserver + "/ebudget/report/export?params=" + paramstr;
            window.open(url, "_blank");

        });

        //var params = {
        //
        //    REPORT_CODE: String(dataItem["id"]),
        //    BUDGET_TYPE: dataItem["type"],
        //    EXPORT_TYPE: exportType,
        //    PERIOD_ID: String($scope.budgetPeriodId["year"]),
        //    FACULTY_ID: String($scope.facultyId["id"]),
        //    FACULTY_NAME: $scope.facultyId["deptName"],
        //    DEPT_ID: String($scope.deptId["id"]),
        //    DEPT_NAME: $scope.deptId["deptName"],
        //    PLAN_ID: String($scope.l3dPlanId["id"]),
        //    PLAN_NAME: $scope.l3dPlanId["planName"],
        //    FUND_ID: String($scope.l3dFundId["id"]),
        //    FUND_NAME: $scope.l3dFundId["fundgroupName"]
        //};

    };


    $scope.checkShowTable = function () {

        if ($scope.budgetPeriodId != undefined && $scope.reportType != undefined && $scope.facultyId != undefined) {

            $scope.showTable = true;
        } else {
            $scope.showTable = false;
        }
    };

    $scope.getFilterDept = function (names, query) {

        if ($filter('filter')(names, query) != undefined) {
            $scope.resultFilterDept = $filter('filter')(names, query);
            $("#dept").select2("val", "");
        }
    };

});

// init jquery functions and plugins
$(document).ready(function () {

    $("#budgetPeriod,#faculty,#dept,#l3dplan,#l3dfund,#reportName,#reportType").select2().trigger("change");

});
