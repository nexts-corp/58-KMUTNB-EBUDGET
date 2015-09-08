var myApp = angular.module('report3D', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('mainController', function($scope,$http) {

    $scope.init = function () {
        $scope.page = "budget";
        
        $scope.dataListReport = [
                {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/กองทุน (ง. 1)',dataForm:'140'},
                {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/กองทุน/งบรายจ่าย (ง. 2)',dataForm:'141'},
                {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามหน่วยงาน/แผนงาน/สำนักงาน/ภาควิชา/สาขาวิชา/งบรายจ่าย (ง. 2-1)',dataForm:'142'},
                {name:'แบบสรุปงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/หน่วยงาน/ภาควิชา/กองทุน (ง. 2-2)',dataForm:'143'},
                {name:'รายละเอียดงบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน จำแนกตามแผนงาน/กองทุน/งบรายจ่าย (ง. 3)',dataForm:'144'},
                {name:'รายงานแผน/ผล การใช้งบประมาณรายจ่ายเงินรายได้จากงบประมาณแผ่นดิน (ง. 4)',dataForm:'145'}
        ];
    };
    
    $scope.pages = function (name) {
        $scope.page = name;
    };
    
    
});
