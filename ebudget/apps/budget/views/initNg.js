
var myApp = angular.module('formBudget', ['commonApp']);
myApp.controller('mainController', function($scope,$http,$controller) {
    
    $scope.activeNg = false;
    $scope.activeTemplate = "no";
    
    $scope.openForm = function(form,param){
        $scope.activeNg = true;
        $scope.activeTemplate = form;
        $scope.param = param;
        
        window.scroll(0,0);
        //$scope.$broadcast(form+'Init');
    };
    
    
    
    
    
    //****************** Call form Static ******************//
    
//    $scope.checkDep = 0;
//    
//    $scope.$watch(
//    function () {
//        return window.departmentArr;
//    }, function(n,o){
//        
//        $scope.checkDep = $scope.checkDep+1;
//        //console.log($scope.checkDep);
//        
//        
//        if($scope.checkDep === 1){
//            $("#divHome").remove();
//            
//            window.budgetPeriodArr = {
//                2557 : 2557,
//                2558 : 2558,
//                2559 : 2559
//            };
//
//            window.budgetTypeArr = {
//                G : "เงินงบประมาณแผ่นดิน",
//                K : "เงินรายได้"
//            };
//
//            window.planArr = {
//                1 : "ดำเนินการตามกรอบข้อตกลงของประชาคมอาเซียน",
//                2 : "ขยายโอกาสและพัฒนาคุณภาพการศึกษา",
//                3 : "ส่งเสริมการวิจัยและพัฒนา"
//            };
//
//            window.projectArr = {
//                1 : "โครงการเตรียมความพร้อมสู่ประชาคมอาเซียน"
//            };
//
//            window.fundgroupArr = {
//                100 : "กองทุนทั่วไป",
//                200 : "กองทุนเพื่อการศึกษา",
//                300 : "กองทุนวิจัย",
//                400 : "กองทุนบริการวิชาการ",
//                500 : "กองทุนกิจการนักศึกษา",
//                600 : "กองทุนสินทรัพย์ถาวร",
//                700 : "กองทุนอื่น ๆ",
//                701 : "กองทุนทำนุบำรุงศิลปวัฒนธรรม ",
//                702 : "กองทุนสำรอง",
//                703 : "กองทุนสวัสดิการ",
//                704 : "กองทุนพัฒนาบุคลากร",
//                705 : "กองทุนคณะ",
//                706 : "กองทุนพัฒนาสถาบัน",
//                707 : "กองทุนเพื่อวัตถุประสงค์เฉพาะ",
//                708 : "กองทุนคงคลังสถาบัน",
//                709 : "กองทุนส่งเสริมการศึกษาและพัฒนาเทคโนโลยี มจพ."
//            };
//
//            window.facultyArr = {
//                10102 : "กองบริการการศึกษา",
//                10103 : "กองแผนงาน",
//                10104 : "กองกิจการนักศึกษา",
//                10105 : "กองบริหารและการจัดการทรัพยากรมนุษย์",
//                10122 : "โครงการจัดตั้ง มจพ.ระยอง",
//                20100 : "สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ",
//                20101 : "สำนักงานผู้อำนวยการ สำนักคอมพิวเตอร์ฯ",
//                20102 : "ฝ่ายวิศวกรรมระบบเครือข่าย",
//                20200 : "สถาบันนวัตกรรมเทคโนโลยีไทย-ฝรั่งเศส",
//                20300 : "สำนักพัฒนาเทคโนโลยีเพื่ออุตสาหกรรม",
//                20400 : "สำนักหอสมุดกลาง",
//                20500 : "สำนักพัฒนาเทคนิคศึกษา",
//                20600 : "สำนักวิจัยวิทยาศาสตร์และเทคโนโลยี",
//                20700 : "โครงการที่พักอาศัยเพื่อการเรียนรู้และสันทนาการ",
//                20800 : "สถาบันสหกิจศึกษาและพัฒนาสื่ออิเล็กทรอนิกส์ ไทย-เยอรมัน",
//                30100 : "คณะวิศวกรรมศาสตร์",
//                30200 : "คณะครุศาสตร์อุตสาหกรรม",
//                30300 : "วิทยาลัยเทคโนโลยีอุตสาหกรรม",
//                30400 : "คณะวิทยาศาสตร์ประยุกต์",
//                30500 : "คณะเทคโนโลยีและการจัดการอุตสาหกรรม",
//                30600 : "คณะเทคโนโลยีสารสนเทศ",
//                30700 : "คณะศิลปศาสตร์ประยุกต์",
//                30800 : "คณะอุตสาหกรรมเกษตร",
//                30900 : "บัณฑิตวิทยาลัย",
//                31000 : "บัณฑิตวิทยาลัยวิศวกรรมศาสตร์นานาชาติสิรินธรไทย-เยอรมัน",
//                31100 : "คณะสถาปัตยกรรมและการออกแบบ",
//                31200 : "คณะบริหารธุรกิจ",
//                31300 : "คณะวิศวกรรมศาสตร์และเทคโนโลยี",
//                31400 : "คณะวิทยาศาสตร์ พลังงาน และสิ่งแวดล้อม",
//                31402 : "สาขาวิชากระบวนการอุตสาหกรรมเคมีและสิ่งแวดล้อม (ICPE)",
//                31500 : "วิทยาลัยนานาชาติ",
//                31600 : "คณะพัฒนาธุรกิจและอุตสาหกรรม",
//                31700 : "คณะบริหารธุรกิจและอุตสาหกรรมบริการ",
//                90000 : "หน่วยบริหารส่วนกลาง",
//                91000 : "หน่วยกลาง มจพ."
//            };
//            
//            window.departmentArr = {
//                20101 : "สำนักงานผู้อำนวยการ สำนักคอมพิวเตอร์ฯ",
//                20102 : "ฝ่ายวิศวกรรมระบบเครือข่าย",
//                20103 : "ฝ่ายพัฒนาระบบสารสนเทศ",
//                20104 : "ฝ่ายบริการวิชาการและส่งเสริมการวิจัย",
//                20105 : "ฝ่ายเทคโนโลยีสารสนเทศ วิทยาเขตปราจีนบุรี"
//            };
//
//            $scope.tParam = {
//                budgetPeriodId: "2558",
//                budgetTypeCode: "K",
//                planId: "1",
//                projectId: "1",
//                fundgroupId: "100",
//                facultyId: "20100",
//                deptId: "20101"
//            };
//
//            $scope.openForm("project",$scope.tParam);
//
//        }
//
//    });
    

    
});

