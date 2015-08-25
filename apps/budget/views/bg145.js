function bg145Form(){
    var html = '<div class="col-md-12 text-center">'
        + '<h4>'
            + 'แบบรายละเอียดคำของบประมาณเงินอุดหนุนเป็นค่าครุภัณฑ์ ค่าที่ดิน/สิ่งก่อสร้าง (ง.145)'
        + '</h4>'
    + '</div>'

    + '<form>'
        + '<div class="form-group">'
            + '<div class="col-md-4">'
                + '<label class="col-md-4 control-label text-right" for="xxx">แผนงาน</label>'
                + '<div class="col-md-8">'
                    + '<select id="" name="" class="form-control input-sm" required>'
                    + '</select>'
                + '</div>'
            + '</div>'
        + '</div>'

        + '<div class="form-group">'
            + '<div class="col-md-4">'
                + '<label class="col-md-4 control-label text-right" for="xxx">ผลผลิต</label>'
                + '<div class="col-md-8">'
                    + '<select id="" name="" class="form-control input-sm" required>'
                    + '</select>'
                + '</div>'
            + '</div>'
        + '</div>'

        + '<div class="form-group">'
            + '<div class="col-md-4">'
                + '<label class="col-md-4 control-label text-right" for="xxx">หน่วยงาน</label>'
                + '<div class="col-md-8">'
                    + '<select id="" name="" class="form-control input-sm" required>'
                    + '</select>'
                + '</div>'
            + '</div>'

            + '<div class="col-md-8 text-right">'
                + '<button class="btn btn-success"><i class="fa fa-save"></i> บันทึก</button>&nbsp;'
                + '<button class="btn btn-default"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
            + '</div>'
        + '</div>'
    + '</form>'

    + '<div class="col-md-12" style="margin-top: 20px;">'
        + '<div class="panel-group" id="accordion">'
            + '<div class="panel panel-default">'
                + '<div class="panel-heading">'
                    + '<h4 class="panel-title">'
                        + '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">'
                            + '<i class="fa fa-plus-circle"></i> เพิ่มรายการ'
                        + '</a>'
                    + '</h4>'
                    + '</div>'
                    + '<div id="collapse1One" class="accordion-body collapse in">'
                        + '<div class="panel-body">'
                            + '<form>'
                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">หมวดรายจ่าย</label>'
                                        + '<div class="col-md-8">'
                                            + '<select id="" name="" class="form-control input-sm" required>'
                                            + '</select>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'

                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">ชื่อตำแหน่งอัตราเดิม</label>'
                                        + '<div class="col-md-8">'
                                            + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'

                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">ระดับ</label>'
                                        + '<div class="col-md-8">'
                                            + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                        
                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">อัตราเงินเดือน</label>'
                                        + '<div class="col-md-8">'
                                            + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                         
                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">จำนวนอัตรา</label>'
                                        + '<div class="col-md-4">'
                                            + '<label class="col-md-6 control-label text-right" for="xxx">มีคนครอง</label>'
                                            + '<div class="col-md-6">'
                                                + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                            + '</div>'
                                        + '</div>'
                                        + '<div class="col-md-4">'
                                            + '<label class="col-md-6 control-label text-right" for="xxx">อัตราว่าง</label>'
                                            + '<div class="col-md-6">'
                                                + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                            + '</div>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                         
                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">จำนวนเงินทั้งปี</label>'
                                        + '<div class="col-md-8">'
                                            + '<input type="text" id="" name="" class="form-control input-sm" required>'
                                        + '</div>'
                                    + '</div>'
                                 + '</div>'
                         
                                + '<div class="form-group">'
                                    + '<div class="col-md-9">'
                                        + '<label class="col-md-4 control-label text-right" for="xxx">คำชี้แจง</label>'
                                        + '<div class="col-md-8">'
                                            + '<textarea id="" name="" class="form-control input-sm">'
                                            + '</textarea>'
                                        + '</div>'
                                    + '</div>'
                                + '</div>'
                                
                                + '<div class="col-md-12 text-right">'
                                    + '<button class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่ม</button>&nbsp;'
                                    + '<button class="btn btn-default"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
                                + '</div>'
                            + '</form>'
                        + '</div>'
                    + '</div>'
            + '</div>'
        + '</div>'
    + '</div>'

    + '<div id="bidderTable" class="col-md-12">'
        + '<table id="table" class="table table-bordered table-striped table-condensed mb-none">'
            + '<thead>'
                + '<tr>'
                    + '<th class="text-center" rowspan="3" style="vertical-align: middle;">ลำดับที่</th>'
                    + '<th class="text-center" rowspan="3" style="vertical-align: middle;">ชื่อตำแหน่ง</th>'
                    + '<th class="text-center" colspan="5">อัตราเดิม (ตามบัญชีถือจ่าย ณ ต.ค.57)</th>'
                    + '<th class="text-center" rowspan="3" style="vertical-align: middle;">คำชี้แจง</th>'
                + '</tr>'
                + '<tr>'
                    + '<th class="text-center" rowspan="2" style="vertical-align: middle;">ระดับ</th>'
                    + '<th class="text-center" rowspan="2" style="vertical-align: middle;">อัตราเงินเดือน</th>'
                    + '<th class="text-center" colspan="2">จำนวนอัตรา</th>'
                    + '<th class="text-center" rowspan="2" style="vertical-align: middle;">จำนวนเงินทั้งปี</th>'
                + '</tr>'
                + '<tr>'
                    + '<th class="text-center">มีคนครอง</th>'
                    + '<th class="text-center">อัตราว่าง</th>'
                + '</tr>'

                + '<tr>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center">รวมทั้งสิ้น</th>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center"></th>'
                    + '<th class="text-center"></th>'
                + '</tr>'
            + '</thead>'
            + '<tbody id="bidderBody">'
                + '<tr>'
                    + '<td colspan="8" class="text-center">-</td>'
                + '</tr>'
            + '</tbody>'
        + '</table>'
    + '</div>';
    
    $("#formBudget").html(html);
    
     
}