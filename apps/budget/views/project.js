//function projectForm(){
//    var html = '<div class="col-md-12 text-center">'
//        + '<h4>'
//            + 'แบบเสนอโครงการที่ตอบสนองยุทธศาสตร์การพัฒนามหาวิทยาลัย<br>'
//            + 'ประจำปีงบประมาณ พ.ศ.25xx<br>'
//            + 'มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ'
//        + '</h4>'
//    + '</div>'
//
//    + '<form class="form-horizontal form-bordered">'
//        + '<div class="form-group">'
//            + '<div class="col-md-12">'
//                + '<h5>1. ชื่อโครงการ</h5>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//        + '</div>'
//
//        + '<div class="form-group">'
//            + '<div class="col-md-12">'
//                + '<h5>2. หน่วยงานที่รับผิดชอบโครงการ</h5>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">คณะ/สำนัก/วิทยาลัย</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12" style="margin: 5px 0;">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">ภาควิชา/ศูนย์/ฝ่าย/กอง</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12" style="margin: 5px 0;">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">ผู้รับผิดชอบ</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//        + '</div>'
//
//        + '<div class="form-group">'
//            + '<div class="col-md-12">'
//                + '<h5>3. ความเชื่อมโยงสอดคล้องกับแผนพัฒนาการศึกษาระดับอุดมศึกษาฯ ฉบับที่ 11 (พ.ศ. 2555-2559)</h5>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">ประเด็นยุทธศาสตร์ที่</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12" style="margin: 5px 0;">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">เป้าประสงค์ที่</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12" style="margin: 5px 0;">'
//                + '<label class="col-md-2 control-label text-right" for="xxx">กลยุทธ์ที่</label>'
//                + '<div class="col-md-6">'
//                    + '<input type="text" id="" name="" class="form-control input-sm" required>'
//                + '</div>'
//            + '</div>'
//        + '</div>'
//
//        + '<div class="form-group">'
//            + '<div class="col-md-12">'
//                + '<h5>4. ลักษณะโครงการ/กิจกรรม</h5>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio1_1" name="project" checked="">'
//                    + '<label for="radio1">โครงการใหม่</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio1_2" name="project">'
//                    + '<label for="radio2">โครงการต่อเนื่อง</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio1_3" name="project">'
//                    + '<label for="radio3">งานประจำ</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio1_4" name="project">'
//                    + '<label for="radio4">งานพัฒนา</label>'
//                + '</div>'
//            + '</div>'
//        + '</div>'
//
//        + '<div class="form-group">'
//            + '<div class="col-md-12">'
//            + '<h5>5. การบูรณาการโครงการ</h5>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio2_1" name="project2" checked="">'
//                    + '<label for="radio1">บูรณาการกับการเรียนการสอน</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio2" name="project">'
//                    + '<label for="radio2">โครงการต่อเนื่อง</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio3" name="project">'
//                    + '<label for="radio3">งานประจำ</label>'
//                + '</div>'
//            + '</div>'
//
//            + '<div class="col-md-12">'
//                + '<div class="col-md-2"></div>'
//                + '<div class="col-md-6 radio-custom radio-primary">'
//                    + '<input type="radio" id="radio4" name="project">'
//                    + '<label for="radio4">งานพัฒนา</label>'
//                + '</div>'
//            + '</div>'
//        + '</div>'
//
//        + '<div class="col-md-12 text-right">'
//            + '<button class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>&nbsp;'
//            + '<button class="btn btn-default"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
//        + '</div>'
//    + '</form>';
//
//    $("#formBudget").html(html);
//
//}

myApp.controller('projectForm', function($scope,$http,$controller) {
    $scope.text = "ssss";
});

myApp.directive('projectTemplate', function() {
  return {
    restrict: 'E',
    templateUrl: js_context_path+'/apps/budget/views/project.html'
  };
});
