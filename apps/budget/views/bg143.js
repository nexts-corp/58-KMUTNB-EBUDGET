var typeName143Arr = [];
var list143Arr = [];

function bg143Form(param) {
    typeName143Arr = [];
    list143Arr = [];
    var html = '<div id="panelTable" class="col-md-12">'
        + '<div class="form-group">';

    if (budgetPeriodArr != null && budgetTypeArr != null && planArr != null && projectArr != null && fundgroupArr != null && departmentArr != null) {

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
            + '<div class="col-md-6">' + planArr[param["planId"]] + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">ผลผลิต/โครงการ : </label>'
            + '<div class="col-md-6">' + projectArr[param["projectId"]] + '</div>'
            + '</div>'
            + '</div>'

            + '<div class="form-group">'
            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">กองทุน : </label>'
            + '     <div class="col-md-6">' + fundgroupArr[param["fundgroupId"]] + '</div>'
            + ' </div>'

            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">หน่วยงาน : </label>'
            + '     <div class="col-md-6">' + departmentArr[param["deptId"]] + '</div>'
            + ' </div>'
            + '</div>';

    } else {

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
            + '<div class="col-md-6">' + param.planName + '</div>'
            + '</div>'

            + '<div class="col-md-6">'
            + '<label class="col-md-4 control-label text-right">ผลผลิต/โครงการ : </label>'
            + '<div class="col-md-6">' + param.projectName + '</div>'
            + '</div>'
            + '</div>'

            + '<div class="form-group">'
            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">กองทุน : </label>'
            + '     <div class="col-md-6">' + param.fundName + '</div>'
            + ' </div>'

            + ' <div class="col-md-6">'
            + '     <label class="col-md-4 control-label text-right">หน่วยงาน : </label>'
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
        + '<table id="table143" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th class="text-center" style="vertical-align: middle;">หมวดรายจ่าย-รายการ</th>'
        + '<th class="text-center" style="vertical-align: middle;">งบประมาณที่ได้รับการจัดสรรปีปัจจุบัน</th>'
        + '<th class="text-center" style="vertical-align: middle;">คำของบประมาณปีงบประมาณที่ขอตั้ง</th>'
        + '<th class="text-center" style="vertical-align: middle;">คำชี้แจงเหตุผลสรุป</th>'
        + '<th class="text-center" style="vertical-align: middle;">สถานะคำขอ</th>'
        + '<th class="text-center" style="vertical-align: middle; min-width: 130px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th></th>'
        + '<th class="text-center" style="vertical-align: middle;">รวมทั้งสิ้น</th>'
        + '<th></th>'
        + '<th></th>'
        + '<th></th>'
        + '<th></th>'
        + '<th></th>'
        + '</tr>'
        + '</thead>'
        + '<tbody>'
        + '<tr>'
        + '<td colspan="9" class="text-center">-</td>'
        + '</tr>'
        + '</tbody>'
        + '</table>'
        + '</div>'
        + '</section>'
        + '</div>'

        + '<div id="panelForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + ' <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + ' <h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '<form id="form" onsubmit="return false;">'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold req" for="operName">หมวดรายจ่าย-รายการ</label>'
        + ' <div class="col-md-12">'
        + '     <input type="text" id="operName" name="operName" class="form-control input-sm" required>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold req" for="operDesc">คำอธิบาย</label>'
        + ' <div class="col-md-12">'
        + '    <div  class="summernote noteOperdesc" id="operDesc" name="operDesc"></div>'
        + ' </div>'
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

        + '<div class="form-group">'
        + '   <div class="col-md-6">'
        + '     <label class="col-md-12 control-label text-bold req" for="bgHistory">งบประมาณที่ได้รับการจัดสรรปีปัจจุบัน</label>'
        + '     <div class="col-md-12">'
        + '         <input type="number" min="0"id="bgHistory" name="bgHistory" class="form-control input-sm" required>'
        + '     </div>'
        + '   </div>'
        + '   <div class="col-md-6">'
        + '     <label class="col-md-12 control-label  text-bold req" for="bgRequest">คำของบประมาณปีงบประมาณที่ขอตั้ง</label>'
        + '     <div class="col-md-12">'
        + '         <input type="number" min="0" id="bgRequest" name="bgRequest" class="form-control input-sm" required>'
        + '     </div>'
        + '   </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold" for="remark">คำชี้แจงเหตุผลสรุป</label>'
        + ' <div class="col-md-12">'
        + '    <div  class="summernote noteRemark" id="remark" name="remark"></div>'
        + ' </div>'
        + '</div>'
        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + ' <div class="modal-footer">'
        + '     <button type="button" class="btn btn-success save"><i class="fa fa-save"></i> บันทึก</button>'
        + '     <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + ' </div>'
        + ' </div>'
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
        + '<td class="col-md-6 text-right">หมวดรายจ่าย : </td>'
        + '<td class="col-md-6 text-bold" id="operNameDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-6 text-right">หมวดรายจ่าย-รายการ : </td>'
        + '<td class="col-md-6 text-bold" id="operDescDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-6 text-right">งบประมาณที่ได้รับการจัดสรรปีปัจจุบัน : </td>'
        + '<td class="col-md-6 text-bold" id="bgHistoryDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<tr>'
        + '<td class="col-md-6 text-right">คำของบประมาณปีงบประมาณที่ขอตั้ง : </td>'
        + '<td class="col-md-6 text-bold" id="bgRequestDel"></td>'
        + '</tr>'
        + '</td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-6 text-right">คำชี้แจง : </td>'
        + '<td class="col-md-6 text-bold" id="remarkDel"></td>'
        + '</tr>'
        + '</tbody>'
        + '</table>'
        + '</div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-danger save" data-dismiss="modal"><i class="fa fa-trash"></i> ยืนยันการลบ</button>'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'

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
        + '<h4 class="modal-title" id="myModalLabel">บันทึกเพิ่มเติม</h4>'
        + '</div>'
        + '<div class="modal-body bodyComment">'

        + '</div>'
        + '<div id="loadingModalApprove" class="col-md-12 text-center"></div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");
    if (PERMISSION == "DEPARTMENT") {
        $("button.approveBGbtn").hide();
        $("button.requestBGbtn").show();
        $("button.requestBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget143", list143Arr, STATUSWAITING, true);
        });
        bg143Detail(param);
    } else {

        $("button.approveBGbtn").show();
        $("button.requestBGbtn").hide();
        $("button.approveBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget143", list143Arr, STATUSAPPROVE, true);
        });
        bg143DetailPlaningBudget(param);//กองแผนงาน
    }
    $('.summernote').summernote({height: 100});
    $('.summernoteApprove').summernote({height: 300});
}
//this function for Department
function bg143Detail(param) {


    $(".requestBGbtn").attr('disabled', 'disabled');
    $("#table143 tbody").html('<td colspan="9" class="text-center">Loading...</td>');

    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget143", "post", dataJSONEN, "json");
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
                    + '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function (key2, value2) {
                    html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                        + '<td class="text-center"></td>'
                        + '<td class="text-bold" style="padding-left: 20px;">'
                        + pCount + '.' + (++cCount) + ' ' + value2["typeName"]
                        + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td>'
                        + ' <button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                        + '</tr>';

                    typeName143Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {
                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["operName"] + '</br> &nbsp;' + value3["operDesc"] + '</td>'
                            + '<td class="number">' + value3["bgHistory"] + '</td>'
                            + '<td class="number">' + value3["bgRequest"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">';

                        if (value3["statusId"] == STATUSEDITING) {

                            html += '<a href="javascript:void(0)" onclick="bg143ShowComment(' + value3["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value3["statusDesc"] + '</a>';
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

                        list143Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table143 tbody").html(html);
            $('.number').number(true, 2);

            $(".requestBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table143").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table143").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table143").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function () {
                var parentId = $(this).attr("data-pid");
                $('.summernote').code('');
                // reset form for new insert
                $("#modalHead").empty().html(typeName143Arr[parentId]);
                $("#loadingForm").html('');
                $("#form").trigger('reset');
                $("#contranerFile").html('<input  type="file" id="fileInput" name="fileInput"/>');
                $("#panelForm").modal("show");

                $("button.save").unbind("click").click(function () {

                    $("#loadingForm").html('<i class="fa fa-spinner fa-spin"></i> Loading...');
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
                        fParam["operDesc"] = $(".noteOperdesc").code();
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

                        bg143Insert(parentId, param, dataJSONEN, objAttment);
                    }
                });
            });

            bg143Action(param);
        }
    }, 100);
}
//this function for กองแผน
function bg143DetailPlaningBudget(param) {

    $("#table143 tbody").html('<td colspan="9" class="text-center">Loading...</td>');
    $(".approveBGbtn").attr('disabled', 'disabled');

    setTimeout(function () {

        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget143", "post", dataJSONEN, "json");
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
                    + '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function (key2, value2) {
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
                        + '</tr>';

                    typeName143Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["operName"] + '</br> &nbsp;' + value3["operDesc"] + '</td>'
                            + '<td class="number">' + value3["bgHistory"] + '</td>'
                            + '<td class="number">' + value3["bgRequest"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">' + value3["statusDesc"] + '</td>'
                            + '<td>';
                        if (value3["statusId"] == STATUSWAITING || value3["statusId"] == STATUSAPPROVE) {

                            html += '<div class="btn-group">' +
                                '<button class="btn btn-sm btn-warning approveEdit" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                '</div>';
                        } else {

                            html += '<div class="btn-group">' +
                                '<button class="btn btn-sm btn-warning approveEdit disabled" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                                '</div>';
                        }
                        html += '</td>'
                            + '</tr>';

                        list143Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table143 tbody").html(html);
            $('.number').number(true, 2);
            $(".approveBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table143").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table143").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table143").treetable("expandAll");
            });

            // when you press to editApprove button
            $("button.approveEdit").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                var objButton = this;
                $('.summernoteApprove').code(list143Arr[id]["comment"]);
                $("#panelCommentApprove").modal("show");

                $("button.approve").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg143updateStatusWithComment(txtComment, id, STATUSAPPROVE, objButton);
                    var fParam = [];
                    list143Arr[id]["comment"] = txtComment;
                    fParam.push(list143Arr[id]);
                    if (updateStatusBG("Budget143", fParam, STATUSAPPROVE, false)) {

                        if (list143Arr[id]["statusId"] != STATUSAPPROVE) {
                            list143Arr[id]["statusId"] = STATUSAPPROVE;
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSAPPROVE]);
                        }

                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
                $("button.edit").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg143updateStatusWithComment(txtComment, id, STATUSEDITING, objButton);
                    var fParam = [];
                    list143Arr[id]["comment"] = txtComment;
                    fParam.push(list143Arr[id]);

                    if (updateStatusBG("Budget143", fParam, STATUSEDITING, false)) {

                        if (list143Arr[id]["statusId"] != STATUSEDITING) {
                            list143Arr[id]["statusId"] = STATUSEDITING;
                            $(objButton).addClass('disabled');
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSEDITING]);
                        }
                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
            });
        }
    }, 100);
}
function bg143Action(param) {
    // when you press to edit button
    $("button.editList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName143Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            if (fid != "fileInput")$("#" + fid).val(list143Arr[id][fid]);
        });

        $(".noteOperdesc").code(list143Arr[id]["operDesc"]);
        $('.noteDesc').code(list143Arr[id]["desc"]);
        $('.noteRemark').code(list143Arr[id]["remark"]);

        var ContranerFile = $("#contranerFile");

        if (list143Arr[id]["path"] != null && list143Arr[id]["path"] != "null") {
            ContranerFile.html('<a href="' + js_context_path + "/uploads/ebudget/" + list143Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>&nbsp;&nbsp;<a id="removeFile" style="text-decoration: underline;">ลบไฟล์</a>');
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
            var isValid = true;
            $('#form input[required]').each(function () {
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
                fParam["operDesc"] = $(".noteOperdesc").code();

                var objAttment = updateAttachment(list143Arr[id]["attachmentId"], list143Arr[id]["path"], list143Arr[id]["id"], "143");
                if (!isEmptyObject(objAttment)) {
                    fParam["attachmentId"] = objAttment.id;
                    fParam["path"] = objAttment.path;
                    fParam["desc"] = objAttment.desc;
                }

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg143Edit(id, parentId, param, dataJSONEN, objAttment);
            }
        });
    });

    // when you press to edit button
    $("button.deleteList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        $("#panelDeleteForm").modal("show");
        $("#panelDeleteForm").find('td').each(function () {
            if ($(this).attr("id")) {
                var aId = $(this).attr("id");
                var name = aId.replace('Del', '');
                $("#" + aId).html(list143Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function () {
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg143delete(id, parentId, dataJSONEN);
        });
    });
}
function bg143Insert(parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget143", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var input = '<tr data-tt-id="list' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td></td>'
                    + '<td>' + $("#operName").val() + '</br> &nbsp;' + $(".noteOperdesc").code() + '</td>'
                    + '<td class="number">' + $("#bgHistory").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class=" text-bold status">' + listSTATUSTRACKING[STATUSPROGRESS] + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + ' <button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + ' <button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table143").treetable("node", parentId);
                $("#table143").treetable("loadBranch", node, input);
                $('.number').number(true, 2);

                list143Arr[data["id"]] = {
                    id: data["id"]
                };

                $("#form input, #form textarea").each(function () {
                    list143Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                list143Arr[data["id"]]["operDesc"] = $(".noteOperdesc").code();
                list143Arr[data["id"]]["remark"] = $(".noteRemark").code();
                list143Arr[data["id"]]["statusId"] = STATUSPROGRESS;
                list143Arr[data["id"]]["statusDesc"] = listSTATUSTRACKING[STATUSPROGRESS];

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list143Arr[data["id"]]["attachmentId"] = objAttment.id;
                    list143Arr[data["id"]]["desc"] = objAttment.desc;
                    list143Arr[data["id"]]["path"] = objAttment.path;
                } else {
                    list143Arr[data["id"]]["desc"] = "";
                }
                $("#panelForm").modal("hide");

                bg143Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg143Edit(id, parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget143", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var input = '<td></td>'
                    + '<td>' + $("#operName").val() + '</br> &nbsp;' + $(".noteOperdesc").code() + '</td>'
                    + '<td class="number">' + $("#bgHistory").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class="text-bold status">';

                if (list143Arr[id]["statusId"] == STATUSEDITING) {
                    input += '<a href="javascript:void(0)" onclick="bg143ShowComment(' + id + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + list143Arr[id]["statusDesc"] + '</a>';
                } else {
                    input += list143Arr[id]["statusDesc"];
                }

                input += '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table140").treetable("node", parentId);
                //$("#table140 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);
                $('.number').number(true, 2);

                $("#form input, #form textarea").each(function () {
                    list143Arr[id][$(this).attr("name")] = $(this).val();
                });

                list143Arr[id]["operDesc"] = $(".noteOperdesc").code();
                list143Arr[id]["remark"] = $(".noteRemark").code();

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list143Arr[id]["attachmentId"] = objAttment.id;
                    list143Arr[id]["desc"] = objAttment.desc;
                    list143Arr[id]["path"] = objAttment.path;
                }
                $("#panelForm").modal("hide");

                bg143Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}

function bg143delete(id, parentId, dataJSONEN) {
    var datas = callAjax(js_context_path + "/api/budget/budgetSave/deleteBudget143", "post", dataJSONEN, "json");
    if (typeof datas !== "undefined" && datas !== null) {
        if (datas["result"] == true) {
            $("#table143").treetable("removeNode", "list" + id);
            var parent = $('#table143').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
        }
    }
}
function bg143ShowComment(id) {

    $(".bodyComment").html('');//reset
    $(".bodyComment").html(list143Arr[id]["comment"]);
    $("#panelShowComment").modal("show");

}