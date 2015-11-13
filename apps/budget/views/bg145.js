var typeName145Arr = [];
var list145Arr = [];

function bg145Form(param) {
    typeName145Arr = [];
    list145Arr = [];

    var html = '<div id="panelTable" class="col-md-12">'
        + '<div class="form-group">';

    if (budgetPeriodArr != null && budgetTypeArr != null && planArr != null && projectArr != null && fundgroupArr != null && departmentArr != null) {
        $("#navBgDept").html("จัดทำคำของบประมาณแผ่นดิน ง.145");

        html += '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">ปีงบประมาณ : </label>'
            + '<div class="col-md-6">' + budgetPeriodArr[param["budgetPeriodId"]] + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">แหล่งเงิน : </label>'
            + '<div class="col-md-6">' + budgetTypeArr[param["budgetTypeCode"]] + '</div>'
            + '</div>'
            + '</div>'

            + '<div class="form-group">'
            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">แผนงาน : </label>'
            + '<div class="col-md-6">' + planArr[param["l3dPlanId"]] + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">กองทุน : </label>'
            + '<div class="col-md-6">' + fundgroupArr[param["fundgroupId"]] + '</div>'
            + '</div>'
            + '</div>'

            + '<div class="form-group">'
            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">หน่วยงาน/สำนักงาน : </label>'
            + '     <div class="col-md-6">' + facultyArr[param["facultyId"]] + '</div>'
            + ' </div>'

            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">ภาควิชา : </label>'
            + '     <div class="col-md-6">' + departmentArr[param["deptId"]] + '</div>'
            + ' </div>'
            + '</div>';

    } else {
        $("#navBgPlan").html("ตรวจสอบคำของบประมาณ ง.145");
        //for กองแผน (Angular js)
        html += '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">ปีงบประมาณ : </label>'
            + '<div class="col-md-6">' + param.budgetPeriodId + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">แหล่งเงิน : </label>'
            + '<div class="col-md-6">' + param.budgetTypeName + '</div>'
            + '</div>'

            + '</div>'

            + '<div class="form-group">'
            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">แผนงาน : </label>'
            + '<div class="col-md-6">' + param.l3dPlanName + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">กองทุน : </label>'
            + '<div class="col-md-6">' + param.fundName + '</div>'
            + '</div>'
            + '</div>'

            + '<div class="form-group">'
            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">หน่วยงาน/สำนักงาน : </label>'
            + '     <div class="col-md-6">' + param.facultyName + '</div>'
            + ' </div>'

            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">ภาควิชา : </label>'
            + '     <div class="col-md-6">' + param.deptName + '</div>'
            + ' </div>'
            + '</div>';
    }

    html += '<section class="panel">'
        + '<div class="panel-body">'
        + ' <div class="col-md-12 text-right">'
        + '     <button class="requestBGbtn btn btn-success" type="button">ส่งข้อมูลคำของบประมาณ</button>'
        + '     <button class="approveBGbtn btn btn-success" type="button">อนุมัติคำขอทั้งหมด</button>'
        + ' </div>'
        + '<div class="col-md-12 text-right">'
        + '<a href="#" id="expandAll"><i class="fa fa-plus-square"></i> แสดงทั้งหมด</a>&nbsp;/&nbsp;'
        + '<a href="#" id="collapseAll"><i class="fa fa-minus-square"></i> ซ่อนทั้งหมด</a>'
        + '</div>'
        + '<table id="table145" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">หมวดรายจ่ายรายการและรายละเอียดประกอบ</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">จำนวนหน่วย</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">หน่วยนับ</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">ราคาต่อหน่วย</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">รวมเงิน</th>'
        + '<th class="text-center" colspan="3">คำชี้แจง</th><th class="text-center" rowspan="3" style="vertical-align: middle;">เหตุผลความจำเป็น</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">สถานะคำขอ</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;min-width: 230px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th class="text-center" rowspan="2" style="vertical-align: middle;">ความต้องการทั้งสิ้น</th>'
        + '<th class="text-center" colspan="2">มีอยู่แล้ว</th></tr><tr><th class="text-center">ใช้การได้</th>'
        + '<th class="text-center">ใช้การไม่ได้</th></tr><tr><th class="text-center"></th>'
        + '<th class="text-center">รวมทั้งสิ้น</th><th class="text-center"></th>'
        + '<th class="text-center"></th><th class="text-center"></th>'
        + '<th class="text-center"></th><th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '</tr>'
        + '</thead>'
        + '<tbody>'
        + '<tr>'
        + ' <td colspan="10" class="text-center">-</td>'
        + '</tr>'
        + '</tbody>'
        + '</table>'
        + '</div>'
        + '</section>'
        + '</div>'

        + '<div id="panelForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + ' <div class="modal-dialog">'
        + ' <div class="modal-content">'
        + ' <div class="modal-header">'
        + '     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '     <h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + ' </div>'
        + '<div class="modal-body">'

        + '<form id="form" onsubmit="return false;">'
        + ' <div class="form-group">'
        + '     <label class="col-md-12 control-label text-bold req" for="durableName">หมวดรายจ่าย-รายการ</label>'
        + '     <div class="col-md-12">'
        + '         <input type="text" id="durableName" name="durableName" class="form-control input-sm" required>'
        + '     </div>'
        + ' </div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label text-bold req" for="durableDesc">รายละเอียดประกอบ</label>'
        + '<div class="col-md-12">'
        + '    <div  class="summernote noteDurableDesc" id="durableDesc" name="durableDesc"></div>'
        + '</div>'
        + '</div>'

        + '<div id="attachFileDiv" class="form-group">'
        + ' <div class="col-md-12 col-sm-12 col-xs-12">'
        + '    <div class="col-md-7 col-sm-7 col-xs-7 none-padding none-margin" id="contranerFile"><input  type="file" id="fileInput" name="fileInput"/></div>'
        + '    <label class="col-md-5 col-sm-5 col-xs-5 req text-right">แนบเอกสารประกอบคำของบประมาณ</label>'
        + ' </div>'
        + ' <label class="col-md-12 text-bold">คำอธิบายประกอบไฟล์</label>'
        + ' <div class="form-group col-md-12">'
        + '    <div  class="summernote noteDesc" id="desc" name="desc"></div>'
        + ' </div>'
        + '</div>'

            //+ '<div class="form-group">'
            //+ '<label class="col-md-3 control-label req" for="unit">หน่วยนับ</label>'
            //+ '<div class="col-md-9">'
            //+ ' <input type="text" id="unit" name="unit" class="form-control input-sm" required>'
            //+ '</div>'
            //+ '</div>'
            //
            //+ '<div class="form-group">'
            //+ '<label class="col-md-3 control-label req" for="qty">จำนวนหน่วย</label>'
            //+ '<div class="col-md-9">'
            //+ ' <input type="number" min="0" id="qty" name="qty" class="form-control input-sm" required>'
            //+ '</div>'
            //+ '</div>'
            //
            //+ '<div class="form-group">'
            //+ '<label class="col-md-3 control-label req" for="price">ราคาต่อหน่วย</label>'
            //+ '<div class="col-md-9">'
            //+ ' <input type="number" min="0" id="price" name="price" class="form-control input-sm" required>'
            //+ '</div>'
            //+ '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-12 col-sm-12 col-xs-12">'
        + '     <div class="col-md-2 col-sm-2 col-xs-2">'
        + '         <label class="control-label req text-right text-bold" for="occupy">หน่วยนับ</label>'
        + '         <div>'
        + '             <input type="text" id="unit" name="unit" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-3 col-sm-3 col-xs-3">'
        + '         <label class="control-label req text-right text-bold" for="vacancy">จำนวนหน่วย</label>'
        + '         <div>'
        + '             <input type="number" min="0" id="qty" name="qty" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-3 col-sm-3 col-xs-3">'
        + '         <label class="col-md-12 control-label req text-bold" for="salaryTotal">ราคาต่อหน่วย</label>'
        + '         <div class="col-md-12">'
        + '             <input type="number" min="0" id="price" name="price" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-4 col-sm-4 col-xs-4">'
        + '         <label class="col-md-12 control-label req text-bold" for="totalPrice">รวมเงิน</label>'
        + '         <div class="col-md-12">'
        + '             <input disabled type="text" id="totalPrice" name="totalPrice" class="form-control input-sm text-right" required>'
        + '         </div>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold">คำชี้แจง</label>'
        + ' <div class="col-md-12 col-sm-12 col-xs-12">'
        + '     <div class="col-md-4 col-sm-4 col-xs-4">'
        + '         <label class="control-label req text-right text-bold" for="numNeeded">ความต้องการทั้งสิ้น</label>'
        + '         <div>'
        + '             <input type="number" min="0" id="numNeeded" name="numNeeded" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-4 col-sm-4 col-xs-4">'
        + '         <label class="control-label req text-right text-bold" for="numWork">ใช้การได้</label>'
        + '         <div>'
        + '             <input type="number" min="0" id="numWork" name="numWork" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-4 col-sm-4 col-xs-4">'
        + '         <label class="col-md-12 control-label req text-bold" for="numUnwork">ใช้การไม่ได้</label>'
        + '         <div class="col-md-12">'
        + '             <input type="number" min="0" id="numUnwork" name="numUnwork" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + ' </div>'
        + '</div>'


        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold" for="remark">เหตุผลความจำเป็น</label>'
        + ' <div class="col-md-12">'
        + '    <div  class="summernote noteRemark" id="remark" name="remark"></div>'
        + ' </div>'
        + '</div>'
        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-success save"><i class="fa fa-save"></i> บันทึก</button>'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div id="panelDeleteForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">ลบคำของบประมาณ</h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '<table>'
        + '<tbody>'
        + '<tr>'
        + '<td class="col-md-5 text-right">หมวดรายจ่าย-รายการ : </td>'
        + '<td class="col-md-7 text-bold" id="durableNameDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">รายละเอียดประกอบ : </td>'
        + '<td class="col-md-7 text-bold" id="durableDescDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">หน่วยนับ : </td>'
        + '<td class="col-md-7 text-bold" id="unitDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">จำนวนหน่วย : </td>'
        + '<td class="col-md-7 text-bold" id="qtyDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">ราคาต่อหน่วย : </td>'
        + '<td class="col-md-7 text-bold" id="priceDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">รวมเงิน : </td>'
        + '<td class="col-md-7 text-bold" id="totalPriceDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">ความต้องการทั้งสิ้น : </td>'
        + '<td class="col-md-7 text-bold" id="numNeededDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">ใช้การได้ : </td>'
        + '<td class="col-md-7 text-bold" id="numWorkDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">ใช้การไม่ได้ : </td>'
        + '<td class="col-md-7 text-bold" id="numUnworkDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-5 text-right">คำชี้แจง : </td>'
        + '<td class="col-md-7 text-bold" id="remarkDel"></td>'
        + '</tr>'
        + '</tbody>'
        + '</table>'
        + '</div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-danger save"><i class="fa fa-trash"></i> ยืนยันการลบ</button>'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '<div id="contranerAttacment"></div>'

        + '<div id="panelCommentApprove" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">บันทึกเพิ่มเติม</h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '    <div class="summernoteApprove"></div>'
        + '</div>'
        + '<div id="loadingModalApprove" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + '     <button type="button" class="btn btn-success approve"><i class="fa fa-check"></i> อนุมัติ</button>'
        + '     <button type="button" class="btn btn-warning edit"><i class="fa fa-pencil"></i> แก้ไข</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div id="panelShowComment" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '     <h4 class="modal-title" id="myModalLabel">บันทึกเพิ่มเติม</h4>'
        + '</div>'
        + '<div class="modal-body bodyComment">'

        + '</div>'
        + '     <div id="loadingModalApprove" class="col-md-12 text-center"></div>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div id="panelShowAttachment" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">เอกสารแนบ</h4>'
        + '</div>'
        + '<div class="modal-body bodyShowAttachment">'
        + '  <div id="attLink"></div><br>'
        + '  <label class="text-bold">คำอธิบายประกอบไฟล์</label>'
        + '  <div id="descAttachment"></div>'
        + '</div>'
        + '<div id="loadingModalShowAttachment" class="col-md-12 text-center"></div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");

    if (PERMISSION == "DEPARTMENT") {
        $("button.approveBGbtn").hide();
        $("button.requestBGbtn").show();
        $("button.requestBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget145", list145Arr, STATUSWAITING, true);
        });
        bg145Detail(param);
    } else {

        $("button.approveBGbtn").show();
        $("button.requestBGbtn").hide();
        $("button.approveBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget145", list145Arr, STATUSAPPROVE, true);
        });
        bg145DetailPlaningBudget(param);//กองแผนงาน
    }
    $('.summernote').summernote({height: 100});
    $('.summernoteApprove').summernote({height: 300});
}
//for department
function bg145Detail(param) {

    var isAdd = true;
    $(".requestBGbtn").attr('disabled', 'disabled');
    $("#table145 tbody").html('<td colspan="12" class="text-center">Loading...</td>');

    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var html = '';
            var pCount = 0;
            $.each(datas["budget"], function (key, value) {
                html += '<tr data-tt-id="' + value["id"] + '">'
                    + '<td class="text-center"></td>'
                    + '<td class="text-bold">' + (++pCount) + '. ' + value["typeName"] + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td>';
                if (value['id'] != '20300000') {
                    html += '<div class="btn-group">';
                    html += '<button class="btn btn-sm btn-success addList" data-pid="' + value["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>';
                    html += '</div>';
                }
                html += '</td>';
                html += '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function (key2, value2) {
                    if (value['id'] == '20300000') {
                        html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td class="text-bold" style="padding-left: 20px;">'
                            + pCount + '.' + (++cCount) + ' ' + value2["typeName"]
                            + '</td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td>'
                            + '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                            + '</div>'
                            + '</td>'
                            + '</tr>'
                    } else {
                        //ค่าที่ดินและสิ่งก่อสร้าง
                        html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value2["durableName"] + '<br> &nbsp;' + value2["durableDesc"] + '</td>'
                            + '<td class="number">' + value2["qty"] + '</td>'
                            + '<td>' + value2["unit"] + '</td>'
                            + '<td class="number">' + value2["price"] + '</td>'
                            + '<td class="number">' + value2["totalPrice"] + '</td>'
                            + '<td>' + value2["numNeeded"] + '</td>'
                            + '<td>' + value2["numWork"] + '</td>'
                            + '<td>' + value2["numUnwork"] + '</td>'
                            + '<td>' + value2["remark"] + '</td>'
                            + '<td class="text-bold status">';

                        if (value2["statusId"] == STATUSEDITING) {

                            html += '<a href="javascript:void(0)" onclick="bg145ShowComment(' + value2["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value2["statusDesc"] + '</a>';
                        } else {
                            html += value2["statusDesc"];
                        }

                        html += '</td>'
                            + '<td>';

                        if (value2["statusId"] == STATUSPROGRESS || value2["statusId"] == STATUSEDITING) {

                            html += '<div class="btn-group col-md-12 none-padding">'
                                + '<button class="btn btn-sm btn-warning editList col-md-6" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                                + '<button class="btn btn-sm btn-default deleteList col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                                + '<div class="col-md-12"></div>'
                                + '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                                + '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>'
                                + '</div>';
                        } else {

                            html += '<div class="btn-group col-md-12 none-padding">'
                                + '<button class="btn btn-sm btn-warning editList col-md-6 disabled" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                                + '<button class="btn btn-sm btn-default deleteList col-md-6 disabled"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                                + '<div class="col-md-12"></div>'
                                + '<button class="btn btn-sm btn-primary buildingOne col-md-6 disabled"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                                + '<button class="btn btn-sm btn-info buildingMore col-md-6 disabled"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>'
                                + '</div>';
                        }

                        html += '</td>'
                            + '</tr>';

                        if (value2["statusId"] == STATUSWAITING)  isAdd = false;

                        list145Arr[value2["id"]] = value2;
                    }

                    typeName145Arr[value2["id"]] = value2["typeName"];
                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["durableName"] + '<br> &nbsp;' + value3["durableDesc"] + '</td>'
                            + '<td class="number">' + value3["qty"] + '</td>'
                            + '<td>' + value3["unit"] + '</td>'
                            + '<td class="number">' + value3["price"] + '</td>'
                            + '<td class="number">' + value3["totalPrice"] + '</td>'
                            + '<td>' + value3["numNeeded"] + '</td>'
                            + '<td>' + value3["numWork"] + '</td>'
                            + '<td>' + value3["numUnwork"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">';

                        if (value3["statusId"] == STATUSEDITING) {

                            html += '<a href="javascript:void(0)" onclick="bg145ShowComment(' + value3["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value3["statusDesc"] + '</a>';
                        } else {
                            html += value3["statusDesc"];
                        }

                        html += '</td>'
                            + '<td>';

                        if (value3["statusId"] == STATUSPROGRESS || value3["statusId"] == STATUSEDITING) {

                            html += '<div class="btn-group">'
                                + '<button class="btn btn-sm btn-warning editList" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                                + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                                + '</div>';

                        } else {

                            html += '<div class="btn-group">'
                                + '<button class="btn btn-sm btn-warning editList disabled" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                                + '<button class="btn btn-sm btn-default deleteList disabled"  data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                                + '</div>';
                        }
                        html += '</td>'
                            + '</tr>';

                        if (value3["statusId"] == STATUSWAITING)  isAdd = false;

                        list145Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table145 tbody").html(html);
            $('.number').number(true, 2);
            $(".requestBGbtn").removeAttr('disabled');
            if (!isAdd) {
                $(".addList").hide();
            } else {
                $(".addList").show();
            }

            // set default table to tree table
            $("#table145").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table145").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table145").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function () {

                var parentId = $(this).attr("data-pid");
                $('.summernote').code('');
                // reset form for new insert
                $("#modalHead").empty().html(typeName145Arr[parentId]);
                $("#loadingForm").html('');
                $("#form").trigger('reset');
                $("#contranerFile").html('<input  type="file" id="fileInput" name="fileInput"/>');
                $("#panelForm").modal("show");


                $('#qty').keyup(function () {
                    var price = parseFloat($("#price").val());
                    var qty = parseFloat($(this).val());
                    if (qty == "" || qty == undefined || isNaN(qty)) {
                        qty = 0;
                    }
                    if (price == "" || price == undefined || isNaN(price)) {
                        price = 0;
                    }
                    $("#totalPrice").val(qty * price);
                });

                $('#price').keyup(function () {
                    var qty = parseFloat($("#qty").val());
                    var price = parseFloat($(this).val());
                    if (qty == "" || qty == undefined || isNaN(qty)) {
                        qty = 0;
                    }
                    if (price == "" || price == undefined || isNaN(price)) {
                        price = 0;
                    }
                    $("#totalPrice").val(qty * price);
                });

                $("button.save").unbind("click").click(function () {
                    $("#loadingForm").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                    // save on add event
                    var isValid = true;
                    $('#form input[required]').each(function () {
                        if ($(this).val() == "" && !$(this).prop("disabled"))
                            isValid = false;
                    });
                    if (isValid) {
                        var fParam = tofParam(param);

                        fParam["budgetTypeId"] = parentId;
                        $("#form input, #form textarea").each(function () {
                            var name = $(this).attr("name");
                            var val = $(this).val();

                            fParam[name] = val;
                        });
                        fParam["remark"] = $(".noteRemark").code();
                        fParam["durableDesc"] = $(".noteDurableDesc").code();
                        fParam["statusId"] = STATUSPROGRESS;

                        var objAttment = InsertAttachment();

                        //objAttment empty is not insert to table Attachment
                        if (!isEmptyObject(objAttment)) {
                            fParam["attachmentId"] = objAttment.id;
                            fParam["path"] = objAttment.path;
                            fParam["desc"] = objAttment.desc;
                        }
                        var fdata = [];
                        fdata.push(fParam);
                        var dataJSON = JSON.stringify({budget: fdata});
                        var dataJSONEN = encodeURIComponent(dataJSON);
                        bg145Insert(parentId, param, dataJSONEN, objAttment);
                    }
                });
            });

            bg145Action(param);
        }
    }, 100);
}
//for BudgetPlaning
function bg145DetailPlaningBudget(param) {

    $(".requestBGbtn").attr('disabled', 'disabled');
    $("#table145 tbody").html('<td colspan="12" class="text-center">Loading...</td>');

    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var html = '';
            var pCount = 0;
            $.each(datas["budget"], function (key, value) {
                html += '<tr data-tt-id="' + value["id"] + '">'
                    + '<td class="text-center"></td>'
                    + '<td class="text-bold">' + (++pCount) + '. ' + value["typeName"] + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td>'
                    + '</td>'
                    + '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function (key2, value2) {

                    if (value['id'] == '20300000') {
                        html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td class="text-bold" style="padding-left: 20px;">'
                            + pCount + '.' + (++cCount) + ' ' + value2["typeName"]
                            + '</td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td>'
                            + '</div>'
                            + '</td>'
                            + '</tr>'
                    } else {
                        //ค่าที่ดินและสิ่งก่อสร้าง
                        html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value2["durableName"] + '<br> &nbsp;' + value2["durableDesc"] + '</td>'
                            + '<td class="number">' + value2["qty"] + '</td>'
                            + '<td>' + value2["unit"] + '</td>'
                            + '<td class="number">' + value2["price"] + '</td>'
                            + '<td class="number">' + value2["totalPrice"] + '</td>'
                            + '<td>' + value2["numNeeded"] + '</td>'
                            + '<td>' + value2["numWork"] + '</td>'
                            + '<td>' + value2["numUnwork"] + '</td>'
                            + '<td>' + value2["remark"] + '</td>'
                            + '<td class="text-bold status">' + value2["statusDesc"] + '</td>'
                            + '<td>';
                        if (value2["statusId"] == STATUSWAITING || value2["statusId"] == STATUSAPPROVE) {
                            //ค่าที่ดินและสิ่งก่อสร้าง
                            var htmlBtnBuildOne = '';
                            var htmlBtnBuildMore = '';
                            $.each(value2["listBuild"], function (keyBuild, valueBuild) {
                                //if have building
                                if (valueBuild["typeId"] == 1) {
                                    // build one
                                    htmlBtnBuildOne = '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>';
                                } else {
                                    // build more
                                    htmlBtnBuildMore = '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>';
                                }
                            });

                            if (value2["path"] != null) {
                                //if have file attachement
                                html += '<div class="btn-group col-md-12 none-padding">' +
                                    '<button class="btn btn-sm btn-warning approveEdit col-md-6" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                    htmlBtnBuildOne +
                                    '<div class="col-md-12"></div>' +
                                    '<button class="btn btn-sm btn-primary approveFile col-md-6" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-file-zip-o"></i> เอกสารแนบ</button>' +
                                    htmlBtnBuildMore +
                                    '</div>';
                            } else {

                                html += '<div class="btn-group col-md-12 none-padding">' +
                                    '<button class="btn btn-sm btn-warning approveEdit col-md-6" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                    htmlBtnBuildOne +
                                    '<div class="col-md-12"></div>' +
                                    htmlBtnBuildMore +
                                    '</div>';
                            }

                        } else {

                            html += '<div class="btn-group col-md-12 none-padding">' +
                                '<button style="width: 85px;" class="btn btn-sm btn-warning approveEdit disabled" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                '</div>';
                        }
                        html += '</td>'
                            + '</tr>';

                        list145Arr[value2["id"]] = value2;

                    }
                    typeName145Arr[value2["id"]] = value2["typeName"];
                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["durableName"] + '<br> &nbsp;' + value3["durableDesc"] + '</td>'
                            + '<td class="number">' + value3["qty"] + '</td>'
                            + '<td>' + value3["unit"] + '</td>'
                            + '<td class="number">' + value3["price"] + '</td>'
                            + '<td class="number">' + value3["totalPrice"] + '</td>'
                            + '<td>' + value3["numNeeded"] + '</td>'
                            + '<td>' + value3["numWork"] + '</td>'
                            + '<td>' + value3["numUnwork"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">' + value3["statusDesc"] + '</td>'
                            + '<td>';
                        if (value3["statusId"] == STATUSWAITING || value3["statusId"] == STATUSAPPROVE) {

                            if (value3["path"] != null) {
                                //if have file attachement
                                html += '<div class="btn-group">' +
                                    '<button style="width: 85px;" class="btn btn-sm btn-warning approveEdit" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                    '<div class="col-md-12"></div>' +
                                    '<button style="width: 85px;" class="btn btn-sm btn-primary approveFile" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-file-zip-o"></i> เอกสารแนบ</button>' +
                                    '</div>';
                            } else {
                                html += '<div class="btn-group">' +
                                    '<button style="width: 85px;" class="btn btn-sm btn-warning approveEdit" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                    '</div>';
                            }

                        } else {

                            html += '<div class="btn-group">' +
                                '<button style="width: 85px;" class="btn btn-sm btn-warning approveEdit disabled" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                '</div>';
                        }
                        html += '</td>'
                            + '</tr>';

                        list145Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table145 tbody").html(html);
            $('.number').number(true, 2);
            $(".requestBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table145").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table145").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table145").treetable("expandAll");
            });

            // when you press to editApprove button
            $("button.approveEdit").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                var objButton = this;
                $('.summernoteApprove').code(list145Arr[id]["comment"]);
                $("#panelCommentApprove").modal("show");

                $("button.approve").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg145updateStatusWithComment(txtComment, id, STATUSAPPROVE, objButton);
                    var fParam = [];
                    list145Arr[id]["comment"] = txtComment;
                    fParam.push(list145Arr[id]);
                    if (updateStatusBG("Budget145", fParam, STATUSAPPROVE, false)) {

                        if (list145Arr[id]["statusId"] != STATUSAPPROVE) {
                            list145Arr[id]["statusId"] = STATUSAPPROVE;
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSAPPROVE]);
                        }

                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
                $("button.edit").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg145updateStatusWithComment(txtComment, id, STATUSEDITING, objButton);
                    var fParam = [];
                    list145Arr[id]["comment"] = txtComment;
                    fParam.push(list145Arr[id]);

                    if (updateStatusBG("Budget145", fParam, STATUSEDITING, false)) {

                        if (list145Arr[id]["statusId"] != STATUSEDITING) {
                            list145Arr[id]["statusId"] = STATUSEDITING;
                            $(objButton).addClass('disabled');
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSEDITING]);
                            $(objButton).closest('td').find('.approveFile').addClass('disabled');
                            $(objButton).closest('td').find('.buildingOne').addClass('disabled');
                            $(objButton).closest('td').find('.buildingMore').addClass('disabled');
                        }
                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
            });

            $("button.approveFile").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                $("#panelShowAttachment").modal("show");
                $("#attLink").html('<a href="' + js_context_path + "/uploads/ebudget/" + list145Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>');
                $("#descAttachment").html(list145Arr[id]["desc"]);
            });

            // when you press to add button

            bg145Action(param);
        }
    }, 100);
}
function bg145Action(param) {

    // when you press to edit button
    $("button.editList").unbind("click").click(function () {

        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName145Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            if (fid != "fileInput")$("#" + fid).val(list145Arr[id][fid]); //not set val in inputFile
        });

        $(".noteDurableDesc").code(list145Arr[id]["durableDesc"]);
        $('.noteDesc').code(list145Arr[id]["desc"]);
        $('.noteRemark').code(list145Arr[id]["remark"]);

        var ContranerFile = $("#contranerFile");

        if (list145Arr[id]["path"] != null && list145Arr[id]["path"] != "null") {
            ContranerFile.html('<a href="' + js_context_path + "/uploads/ebudget/" + list145Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>&nbsp;&nbsp;<a id="removeFile" style="text-decoration: underline;">ลบไฟล์</a>');
        } else {
            ContranerFile.html('<input  type="file" id="fileInput" name="fileInput"/>');
        }

        $("#removeFile").unbind("click").click(function () {
            if (confirm('ต้องการยกเลิกไฟล์นี้ ?')) {
                ContranerFile.html('<input  type="file" id="fileInput" name="fileInput"/>');
            }
        });

        $("button.save").unbind("click").click(function () {
            $("#loadingForm").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
            // save on edit event
            var isValid = true;
            $('#form input[req]').each(function () {
                if ($(this).val() == "" && !$(this).prop("disabled"))
                    isValid = false;
            });
            if (isValid) {
                var fParam = tofParam(param);
                fParam["budgetTypeId"] = parentId;
                fParam["id"] = id;
                $("#form input, #form textarea").each(function () {
                    var name = $(this).attr("name");
                    var val = $(this).val();
                    fParam[name] = val;
                });

                fParam["remark"] = $(".noteRemark").code();
                fParam["durableDesc"] = $(".noteDurableDesc").code();

                var objAttment = updateAttachment(list145Arr[id]["attachmentId"], list145Arr[id]["path"], list145Arr[id]["id"], "145");
                if (!isEmptyObject(objAttment)) {
                    fParam["attachmentId"] = objAttment.id;
                    fParam["path"] = objAttment.path;
                    fParam["desc"] = objAttment.desc;
                }
                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);
                bg145Edit(id, parentId, param, dataJSONEN, objAttment);
            }
        });

        //total price
        $('#qty').keyup(function () {
            var price = parseFloat($("#price").val());
            var qty = parseFloat($(this).val());
            if (qty == "" || qty == undefined || isNaN(qty)) {
                qty = 0;
            }
            if (price == "" || price == undefined || isNaN(price)) {
                price = 0;
            }
            $("#totalPrice").val(qty * price);
        });

        $('#price').keyup(function () {
            var qty = parseFloat($("#qty").val());
            var price = parseFloat($(this).val());
            if (qty == "" || qty == undefined || isNaN(qty)) {
                qty = 0;
            }
            if (price == "" || price == undefined || isNaN(price)) {
                price = 0;
            }
            $("#totalPrice").val(qty * price);
        });

    });

    $("button.deleteList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        $("#panelDeleteForm").modal("show");
        $("#panelDeleteForm").find('td').each(function () {
            if ($(this).attr("id")) {
                var aId = $(this).attr("id");
                var name = aId.replace('Del', '');
                $("#" + aId).html(list145Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function () {
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg145delete(id, parentId, dataJSONEN);
        });
    });

    $("button.buildingOne").unbind("click").click(function () {
        var bg145Id = $(this).closest("tr").attr("data-tt-id");
        param.bg145Id = bg145Id;
        buildingOneForm(param);
    });
    $("button.buildingMore").unbind("click").click(function () {
        var bg145Id = $(this).closest("tr").attr("data-tt-id");
        param.bg145Id = bg145Id;
        buildingMoreForm(param);
    });
}
function bg145Insert(parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var html = '<tr data-tt-id="' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td></td>'
                    + '<td>' + $("#durableName").val() + '</br> &nbsp;' + $(".noteDurableDesc").code() + '</td>'
                    + '<td class="number">' + $("#qty").val() + '</td>'
                    + '<td>' + $("#unit").val() + '</td>'
                    + '<td class="number">' + $("#price").val() + '</td>'
                    + '<td class="number">' + $("#totalPrice").val() + '</td>'
                    + '<td>' + $("#numNeeded").val() + '</td>'
                    + '<td>' + $("#numWork").val() + '</td>'
                    + '<td>' + $("#numUnwork").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class=" text-bold status">' + listSTATUSTRACKING[STATUSPROGRESS] + '</td>'
                    + '<td>';

                if (parentId == "20400000") {
                    html += '<div class="btn-group col-md-12 none-padding">'
                        + '<button class="btn btn-sm btn-warning editList col-md-6" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList col-md-6"  data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                        + '<div class="col-md-12"></div>'
                        + '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + parentId + '" data-id="' + data["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                        + '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + parentId + '" data-id="' + data["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>';

                } else {
                    html += '<div class="btn-group">'
                        + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>';
                }

                html += '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table145").treetable("node", parentId);
                $("#table145").treetable("loadBranch", node, html);
                $('.number').number(true, 2);
                list145Arr[data["id"]] = {
                    id: data["id"]
                };


                $("#form input, #form textarea").each(function () {
                    list145Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                list145Arr[data["id"]]["budgetHeadId"] = data["budgetHeadId"];
                list145Arr[data["id"]]["durableDesc"] = $(".noteDurableDesc").code();
                list145Arr[data["id"]]["remark"] = $(".noteRemark").code();
                list145Arr[data["id"]]["statusId"] = STATUSPROGRESS;
                list145Arr[data["id"]]["statusDesc"] = listSTATUSTRACKING[STATUSPROGRESS];

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list145Arr[data["id"]]["attachmentId"] = objAttment.id;
                    list145Arr[data["id"]]["desc"] = objAttment.desc;
                    list145Arr[data["id"]]["path"] = objAttment.path;
                } else {
                    list145Arr[data["id"]]["desc"] = "";
                }
                $("#panelForm").modal("hide");
                bg145Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg145Edit(id, parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var html = '<td></td>'
                    + '<td>' + $("#durableName").val() + '</br> &nbsp;' + $(".noteDurableDesc").code() + '</td>'
                    + '<td class="number">' + $("#qty").val() + '</td>'
                    + '<td>' + $("#unit").val() + '</td>'
                    + '<td class="number">' + $("#price").val() + '</td>'
                    + '<td class="number">' + $("#totalPrice").val() + '</td>'
                    + '<td>' + $("#numNeeded").val() + '</td>'
                    + '<td>' + $("#numWork").val() + '</td>'
                    + '<td>' + $("#numUnwork").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class="text-bold status">';

                if (list145Arr[id]["statusId"] == STATUSEDITING) {
                    html += '<a href="javascript:void(0)" onclick="bg145ShowComment(' + id + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + list145Arr[id]["statusDesc"] + '</a>';
                } else {
                    html += list145Arr[id]["statusDesc"];
                }

                if (parentId == "20400000") {

                    html += '<td><div class="btn-group col-md-12 none-padding">'
                        + '<button class="btn btn-sm btn-warning editList col-md-6" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList col-md-6"  data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                        + '<div class="col-md-12"></div>'
                        + '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + parentId + '" data-id="' + id + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                        + '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + parentId + '" data-id="' + id + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>';

                } else {
                    html += '<td><div class="btn-group">'
                        + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>';
                }
                html += '</div>'
                    + '</td>';

                //var node = $("#table145").treetable("node", parentId);
                //$("#table145 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="' + id + '"]').html(html);
                $('.number').number(true, 2);
                $("#form input, #form textarea").each(function () {
                    list145Arr[id][$(this).attr("name")] = $(this).val();
                });

                list145Arr[id]["durableDesc"] = $(".noteDurableDesc").code();
                list145Arr[id]["remark"] = $(".noteRemark").code();

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list145Arr[id]["attachmentId"] = objAttment.id;
                    list145Arr[id]["desc"] = objAttment.desc;
                    list145Arr[id]["path"] = objAttment.path;
                }

                $("#panelForm").modal("hide");
                bg145Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg145delete(id, parentId, dataJSONEN) {

    var datas = callAjax(js_context_path + "/api/budget/budgetSave/deleteBudget145", "post", dataJSONEN, "json");
    if (typeof datas !== "undefined" && datas !== null) {
        if (datas["result"] == true) {
            $("#table145").treetable("removeNode", "" + id);
            var parent = $('#table145').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
            $("#panelDeleteForm").modal("hide");
        } else {
            alert("ไม่สามารถลบได้");
        }
    }
}
function bg145ShowComment(id) {

    $(".bodyComment").html('');//reset
    $(".bodyComment").html(list145Arr[id]["comment"]);
    $("#panelShowComment").modal("show");

}




