var typeName146Arr = [];
var list146Arr = [];

function bg146Form(param) {
    typeName146Arr = [];
    list146Arr = [];
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
        + '<table id="table146" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th class="text-center">ลำดับ</th>'
        + '<th class="text-center">รายการ - ประเภทเงินอุดหนุน</th>'
        + '<th class="text-center">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน</th>'
        + '<th class="text-center">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ</th>'
        + '<th class="text-center">คำชี้แจงเหตุผลสรุป</th>'
        + '<th class="text-center" style="vertical-align: middle;">สถานะคำขอ</th>'
        + '<th class="text-center" style="vertical-align: middle;min-width: 130px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th class="text-center"></th>'
        + '<th class="text-center">รวมทั้งสิ้น</th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '</tr>'
        + '</thead>'
        + '<tbody>'
        + '<tr>'
        + '<td colspan="6" class="text-center">-</td>'
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
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '<form id="form" onsubmit="return false;">'
        + '<div class="form-group">'
        + '<label class="col-md-12 control-label text-bold req" for="bursaryName">รายการ - ประเภทเงินอุดหนุน</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="bursaryName" name="bursaryName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label text-bold req" for="bursaryDesc">คำอธิบาย</label>'
        + ' <div class="col-md-12">'
            //+ ' <textarea type="text" id="bursaryDesc" name="bursaryDesc" class="form-control input-sm" required></textarea>'
        + '    <div  class="summernote noteBursaryDesc" id="bursaryDesc" name="bursaryDesc"></div>'
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
        + '     <label class="col-md-12 control-label text-bold req"  for="bgHistory">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน</label>'
        + '     <div class="col-md-12">'
        + '         <input type="number" min="0" id="bgHistory" name="bgHistory"  class="form-control input-sm" required>'
        + '     </div>'
        + '   </div>'
        + '   <div class="col-md-6">'
        + '     <label class="col-md-12 control-label  text-bold req" for="bgRequest">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ</label>'
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
        + '<div class="modal-footer">'
        + ' <button type="button" class="btn btn-success save" ><i class="fa fa-save"></i> บันทึก</button>'
        + ' <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
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
        + '<td class="col-md-4 text-right">รายการ - ประเภทเงินอุดหนุน : </td>'
        + '<td class="col-md-8 text-bold" id="bursaryNameDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">คำอธิบาย : </td>'
        + '<td class="col-md-8 text-bold" id="bursaryDescDel"</td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน : </td>'
        + '<td class="col-md-8 text-bold" id="bgHistoryDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ : </td>'
        + '<td class="col-md-8 text-bold" id="bgRequestDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">คำชี้แจงเหตุผลสรุป : </td>'
        + '<td class="col-md-8 text-bold" id="remarkDel"></td>'
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
        + '     <h4 class="modal-title" id="myModalLabel">บันทึกเพิ่มเติม</h4>'
        + '</div>'
        + '<div class="modal-body bodyComment">'

        + '</div>'
        + '     <div id="loadingModalApprove" class="col-md-12 text-center"></div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");

    if (PERMISSION == "DEPARTMENT") {
        $("button.approveBGbtn").hide();
        $("button.requestBGbtn").show();
        $("button.requestBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget146", list146Arr, STATUSWAITING, true);
        });
        bg146Detail(param);
    } else {

        $("button.approveBGbtn").show();
        $("button.requestBGbtn").hide();
        $("button.approveBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget146", list146Arr, STATUSAPPROVE, true);
        });
        bg146DetailPlaningBudget(param);//กองแผนงาน
    }
    $('.summernote').summernote({height: 100});
    $('.summernoteApprove').summernote({height: 300});
}

function bg146Detail(param) {

    $(".requestBGbtn").attr('disabled', 'disabled');
    $("#table146 tbody").html('<td colspan="11" class="text-center">Loading...</td>');

    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget146", "post", dataJSONEN, "json");
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
                    + '<td>'
                    + '<button class="btn btn-sm btn-success addList" data-pid="' + value["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                    + '</td>'
                    + '</tr>';

                typeName146Arr[value["id"]] = value["typeName"];

                $.each(value["lv2"], function (key2, value2) {
                    html += '<tr data-tt-id="list' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                        + '<td class="text-center"></td>'
                        + '<td>' + value2["bursaryName"] + '<br> &nbsp;' + value2["bursaryDesc"] + '</td>'
                        + '<td class="number">' + value2["bgHistory"] + '</td>'
                        + '<td class="number">' + value2["bgRequest"] + '</td>'
                        + '<td>' + value2["remark"] + '</td>'
                        + '<td class="text-bold status">';

                    if (value2["statusId"] == STATUSEDITING) {

                        html += '<a href="javascript:void(0)" onclick="bg146ShowComment(' + value2["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value2["statusDesc"] + '</a>';
                    } else {
                        html += value2["statusDesc"];
                    }

                    html += '</td>'
                        + '<td>';

                    if (value2["statusId"] == STATUSPROGRESS || value2["statusId"] == STATUSEDITING) {

                        html += '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-warning editList" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '</div>';

                    } else {

                        html += '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-warning editList disabled" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList disabled"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '</div>';
                    }
                    html += '</td>'
                        + '</tr>';

                    list146Arr[value2["id"]] = value2;
                });
            });

            $("#table146 tbody").html(html);
            $('.number').number(true, 2);
            $(".requestBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table146").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table146").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table146").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function () {
                var parentId = $(this).attr("data-pid");

                // reset form for new insert
                $("#modalHead").empty().html(typeName146Arr[parentId]);
                $("#loadingForm").html('');
                $('.summernote').code('');
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
                        fParam["bursaryDesc"] = $(".noteBursaryDesc").code();

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
                        bg146Insert(parentId, param, dataJSONEN, objAttment);
                    }
                });
            });

            bg146Action(param);
        }
    }, 100);
}

function bg146DetailPlaningBudget(param) {

    $("#table146 tbody").html('<td colspan="20" class="text-center">Loading...</td>');
    $(".approveBGbtn").attr('disabled', 'disabled');

    setTimeout(function () {

        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget146", "post", dataJSONEN, "json");
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

                typeName146Arr[value["id"]] = value["typeName"];

                $.each(value["lv2"], function (key2, value2) {

                    html += '<tr data-tt-id="list' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                        + '<td class="text-center"></td>'
                        + '<td>' + value2["bursaryName"] + '<br> &nbsp;' + value2["bursaryDesc"] + '</td>'
                        + '<td class="number">' + value2["bgHistory"] + '</td>'
                        + '<td class="number">' + value2["bgRequest"] + '</td>'
                        + '<td>' + value2["remark"] + '</td>'
                        + '<td class="text-bold status">' + value2["statusDesc"] + '</td>'
                        + '<td>';
                    if (value2["statusId"] == STATUSWAITING || value2["statusId"] == STATUSAPPROVE) {

                        html += '<div class="btn-group">' +
                            '<button class="btn btn-sm btn-warning approveEdit" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                            '</div>';
                    } else {

                        html += '<div class="btn-group">' +
                            '<button class="btn btn-sm btn-warning approveEdit disabled" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>' +
                            '</div>';
                    }
                    html += '</td>'
                        + '</tr>';

                    list146Arr[value2["id"]] = value2;
                });
            });

            $("#table146 tbody").html(html);
            $('.number').number(true, 2);
            $(".approveBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table146").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table146").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table146").treetable("expandAll");
            });

            // when you press to editApprove button
            $("button.approveEdit").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                var objButton = this;
                $('.summernoteApprove').code(list146Arr[id]["comment"]);
                $("#panelCommentApprove").modal("show");

                $("button.approve").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg146updateStatusWithComment(txtComment, id, STATUSAPPROVE, objButton);
                    var fParam = [];
                    list146Arr[id]["comment"] = txtComment;
                    fParam.push(list146Arr[id]);
                    if (updateStatusBG("Budget146", fParam, STATUSAPPROVE, false)) {

                        if (list146Arr[id]["statusId"] != STATUSAPPROVE) {
                            list146Arr[id]["statusId"] = STATUSAPPROVE;
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSAPPROVE]);
                        }

                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
                $("button.edit").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg146updateStatusWithComment(txtComment, id, STATUSEDITING, objButton);
                    var fParam = [];
                    list146Arr[id]["comment"] = txtComment;
                    fParam.push(list146Arr[id]);

                    if (updateStatusBG("Budget146", fParam, STATUSEDITING, false)) {

                        if (list146Arr[id]["statusId"] != STATUSEDITING) {
                            list146Arr[id]["statusId"] = STATUSEDITING;
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
function bg146Action(param) {

    // when you press to edit button
    $("button.editList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName146Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            if (fid != "fileInput")$("#" + fid).val(list146Arr[id][fid]);
        });

        $(".noteBursaryDesc").code(list146Arr[id]["bursaryDesc"]);
        $('.noteDesc').code(list146Arr[id]["desc"]);
        $('.noteRemark').code(list146Arr[id]["remark"]);

        var ContranerFile = $("#contranerFile");

        if (list146Arr[id]["path"] != null && list146Arr[id]["path"] != "null") {
            ContranerFile.html('<a href="' + js_context_path + "/uploads/ebudget/" + list146Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>&nbsp;&nbsp;<a id="removeFile" style="text-decoration: underline;">ลบไฟล์</a>');
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
                var fParam = param;
                fParam["budgetTypeId"] = parentId;
                fParam["id"] = id;
                $("#form input, #form textarea").each(function () {
                    var name = $(this).attr("name");
                    var val = $(this).val();

                    fParam[name] = val;
                });

                fParam["remark"] = $(".noteRemark").code();
                fParam["bursaryDesc"] = $(".noteBursaryDesc").code();

                var objAttment = updateAttachment(list146Arr[id]["attachmentId"], list146Arr[id]["path"], list146Arr[id]["id"], "146");
                if (!isEmptyObject(objAttment)) {
                    fParam["attachmentId"] = objAttment.id;
                    fParam["path"] = objAttment.path;
                    fParam["desc"] = objAttment.desc;
                }

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg146Edit(id, parentId, param, dataJSONEN, objAttment);
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
                $("#" + aId).html(list146Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function () {
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg146delete(id, parentId, dataJSONEN);
        });
    });

}
function bg146Insert(parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget146", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var input = '<tr data-tt-id="list' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td></td>'
                    + '<td>' + $("#bursaryName").val() + '</br> &nbsp;' + $(".noteBursaryDesc").code() + '</td>'
                    + '<td class="number">' + $("#bgHistory").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class=" text-bold status">' + listSTATUSTRACKING[STATUSPROGRESS] + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table146").treetable("node", parentId);
                $("#table146").treetable("loadBranch", node, input);
                $('.number').number(true, 2);
                list146Arr[data["id"]] = {
                    id: data["id"]
                };

                $("#form input, #form textarea").each(function () {
                    list146Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                list146Arr[data["id"]]["bursaryDesc"] = $(".noteBursaryDesc").code();
                list146Arr[data["id"]]["remark"] = $(".noteRemark").code();
                list146Arr[data["id"]]["statusId"] = STATUSPROGRESS;
                list146Arr[data["id"]]["statusDesc"] = listSTATUSTRACKING[STATUSPROGRESS];

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list146Arr[data["id"]]["attachmentId"] = objAttment.id;
                    list146Arr[data["id"]]["desc"] = objAttment.desc;
                    list146Arr[data["id"]]["path"] = objAttment.path;
                } else {
                    list146Arr[data["id"]]["desc"] = "";
                }
                $("#panelForm").modal("hide");

                bg146Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg146Edit(id, parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget146", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var input = '<td></td>'
                    + '<td>' + $("#bursaryName").val() + '</br> &nbsp;' + $(".noteBursaryDesc").code() + '</td>'
                    + '<td class="number">' + $("#bgHistory").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class="text-bold status">';

                if (list146Arr[id]["statusId"] == STATUSEDITING) {

                    input += '<a href="javascript:void(0)" onclick="bg146ShowComment(' + id + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + list146Arr[id]["statusDesc"] + '</a>';
                } else {

                    input += list146Arr[id]["statusDesc"];
                }

                input += '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table146").treetable("node", parentId);
                //$("#table146 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);
                $('.number').number(true, 2);
                $("#form input, #form textarea").each(function () {
                    list146Arr[id][$(this).attr("name")] = $(this).val();
                });

                list146Arr[id]["bursaryDesc"] = $(".noteBursaryDesc").code();
                list146Arr[id]["remark"] = $(".noteRemark").code();

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list146Arr[id]["attachmentId"] = objAttment.id;
                    list146Arr[id]["desc"] = objAttment.desc;
                    list146Arr[id]["path"] = objAttment.path;
                } else {
                    list146Arr[id]["desc"] = "";
                }

                $("#panelForm").modal("hide");
                bg146Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg146delete(id, parentId, dataJSONEN) {

    var datas = callAjax(js_context_path + "/api/budget/budgetSave/deleteBudget146", "post", dataJSONEN, "json");
    if (typeof datas !== "undefined" && datas !== null) {
        if (datas["result"] == true) {
            $("#table146").treetable("removeNode", "list" + id);
            var parent = $('#table146').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
        }
    }
}
function bg146ShowComment(id) {

    $(".bodyComment").html('');//reset
    $(".bodyComment").html(list146Arr[id]["comment"]);
    $("#panelShowComment").modal("show");

}