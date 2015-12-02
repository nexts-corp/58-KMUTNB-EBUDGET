var typeName144Arr = [];
var list144Arr = [];

function bg144Form(param) {
    typeName144Arr = [];
    list144Arr = [];
    var html = '<div id="panelTable" class="col-md-12">'
        + '<div class="form-group">';

    if (budgetPeriodArr != null && budgetTypeArr != null && planArr != null && projectArr != null && fundgroupArr != null && departmentArr != null) {
        $("#navBgDept").html("จัดทำคำของบประมาณแผ่นดิน ง.144");

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
        $("#navBgPlan").html("ตรวจสอบคำของบประมาณ ง.144");
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
        + '<table id="table144" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th class="text-center" rowspan="2" style="vertical-align: middle;">ประเภท</th>'
        + '<th class="text-center" colspan="4">รายจ่ายจริง ปีงบประมาณที่ผ่านมา</th>'
        + '<th class="text-center" colspan="3">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน</th>'
        + '<th class="text-center" colspan="3">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ</th>'
        + '<th class="text-center" rowspan="2" style="vertical-align: middle;">คำชี้แจง</th>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;">สถานะคำขอ</th>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;min-width: 130px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th class="text-center">เงินนอกงบประมาณ</th><th class="text-center">เงินงบประมาณ</th>'
        + '<th class="text-center">รายจ่ายจริง</th><th class="text-center">รวมเงิน</th>'
        + '<th class="text-center">เงินนอกงบประมาณ</th>'
        + '<th class="text-center">เงินงบประมาณ</th>'
        + '<th class="text-center">รวมเงิน</th>'
        + '<th class="text-center">เงินนอกงบประมาณ</th>'
        + '<th class="text-center">เงินงบประมาณ</th>'
        + '<th class="text-center">รวมเงิน</th>'
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
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '<th class="text-center"></th>'
        + '</tr>'
        + '</thead>'
        + '<tbody>'
        + '<tr>'
        + '<td colspan="13" class="text-center">-</td>'
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
        + '     <label class="col-md-12 control-label text-bold req" for="utilName">ประเภท</label>'
        + '     <div class="col-md-12">'
        + '          <input type="text" id="utilName" name="utilName" class="form-control input-sm" required>'
        + '     </div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label text-bold req" for="utilDesc">คำอธิบาย</label>'
        + '<div class="col-md-12">'
        + '    <div  class="summernote noteUtilDesc" id="utilDesc" name="utilDesc"></div>'
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

        + '<div class="form-group">'
        + '   <div class="col-md-6">'
        + '     <label class="col-md-12 control-label text-bold req"  for="nonBgRequest">เงินนอกงบประมาณ</label>'
        + '     <div class="col-md-12">'
        + '         <input type="number" min="0" id="nonBgRequest" name="nonBgRequest"  class="form-control input-sm" required>'
        + '     </div>'
        + '   </div>'
        + '   <div class="col-md-6">'
        + '     <label class="col-md-12 control-label  text-bold req" for="bgRequest">เงินงบประมาณ</label>'
        + '     <div class="col-md-12">'
        + '         <input type="number" min="0" id="bgRequest" name="bgRequest" class="form-control input-sm" required>'
        + '     </div>'
        + '   </div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label text-bold" for="remark">คำชี้แจง</label>'
        + '<div class="col-md-12">'
        + '    <div  class="summernote noteRemark" id="remark" name="remark"></div>'
        + '</div>'
        + '</div>'
        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + ' <button type="button" class="btn btn-success save"><i class="fa fa-save"></i> บันทึก</button>'
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
        + '<td class="col-md-4 text-right">ประเภท : </td>'
        + '<td class="col-md-8 text-bold" id="utilNameDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">คำอธิบาย : </td>'
        + '<td class="col-md-8 text-bold" id="utilDescDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">เงินนอกงบประมาณ : </td>'
        + '<td class="col-md-8 text-bold" id="nonBgRequestDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">เงินงบประมาณ : </td>'
        + '<td class="col-md-8 text-bold" id="bgRequestDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-4 text-right">คำชี้แจง : </td>'
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

            updateStatusBG("Budget144", list144Arr, STATUSWAITING, true);
        });
        bg144Detail(param);
    } else {

        $("button.approveBGbtn").show();
        $("button.requestBGbtn").hide();
        $("button.approveBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget144", list144Arr, STATUSAPPROVE, true);
        });
        bg144DetailPlaningBudget(param);//กองแผนงาน
    }
    $('.summernote').summernote({height: 100});
    $('.summernoteApprove').summernote({height: 300});
}
//this function for Department
function bg144Detail(param) {

    var isAdd = true;
    $(".requestBGbtn").attr('disabled', 'disabled');
    $("#table144 tbody").html('<td colspan="20" class="text-center">Loading...</td>');

    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget144", "post", dataJSONEN, "json");
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
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td>'
                        + '<button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                        + '</tr>';

                    typeName144Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {
                        var total = parseFloat(value3["bgRequest"]) + parseFloat(value3["nonBgRequest"]);
                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["utilName"] + '<br> &nbsp;' + value3["utilDesc"] + '</td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td class="number">' + value3["nonBgRequest"] + '</td>'
                            + '<td class="number">' + value3["bgRequest"] + '</td>'
                            + '<td class="number">' + total + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">';

                        if (value3["statusId"] == STATUSEDITING) {

                            html += '<a href="javascript:void(0)" onclick="bg144ShowComment(' + value3["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value3["statusDesc"] + '</a>';
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

                        list144Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table144 tbody").html(html);
            $('.number').number(true, 2);
            $(".requestBGbtn").removeAttr('disabled');

            if (!isAdd) {
                $(".addList").hide();
            } else {
                $(".addList").show();
            }

            // set default table to tree table
            $("#table144").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table144").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table144").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function () {
                alert(999);
                var parentId = $(this).attr("data-pid");
                $('.summernote').code('');
                // reset form for new insert
                $("#modalHead").empty().html(typeName144Arr[parentId]);
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
                        var fParam = param;
                        fParam["budgetTypeId"] = parentId;
                        $("#form input, #form textarea").each(function () {
                            var name = $(this).attr("name");
                            var val = $(this).val();

                            fParam[name] = val;
                        });
                        fParam["remark"] = $(".noteRemark").code();
                        fParam["utilDesc"] = $(".noteUtilDesc").code();
                        fParam["statusId"] = STATUSPROGRESS;
                        console.log(fParam);

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

                        bg144Insert(parentId, param, dataJSONEN, objAttment);
                    }
                });
            });

            bg144Action(param);
        }
    }, 100);
}
//this function for กองแผน
function bg144DetailPlaningBudget(param) {

    $("#table144 tbody").html('<td colspan="20" class="text-center">Loading...</td>');
    $(".approveBGbtn").attr('disabled', 'disabled');

    setTimeout(function () {

        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget144", "post", dataJSONEN, "json");
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

                    typeName144Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {
                        var total = parseFloat(value3["bgRequest"]) + parseFloat(value3["nonBgRequest"]);
                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["utilName"] + '<br> &nbsp;' + value3["utilDesc"] + '</td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td class="number">' + value3["nonBgRequest"] + '</td>'
                            + '<td class="number">' + value3["bgRequest"] + '</td>'
                            + '<td class="number">' + total + '</td>'
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

                        list144Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table144 tbody").html(html);
            $('.number').number(true, 2);
            $(".approveBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table144").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table144").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table144").treetable("expandAll");
            });

            // when you press to editApprove button
            $("button.approveEdit").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                var objButton = this;
                $('.summernoteApprove').code(list144Arr[id]["comment"]);
                $("#panelCommentApprove").modal("show");

                $("button.approve").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg144updateStatusWithComment(txtComment, id, STATUSAPPROVE, objButton);
                    var fParam = [];
                    list144Arr[id]["comment"] = txtComment;
                    fParam.push(list144Arr[id]);
                    if (updateStatusBG("Budget144", fParam, STATUSAPPROVE, false)) {

                        if (list144Arr[id]["statusId"] != STATUSAPPROVE) {
                            list144Arr[id]["statusId"] = STATUSAPPROVE;
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSAPPROVE]);
                        }

                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });

                $("button.edit").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg144updateStatusWithComment(txtComment, id, STATUSEDITING, objButton);
                    var fParam = [];
                    list144Arr[id]["comment"] = txtComment;
                    fParam.push(list144Arr[id]);

                    if (updateStatusBG("Budget144", fParam, STATUSEDITING, false)) {

                        if (list144Arr[id]["statusId"] != STATUSEDITING) {
                            list144Arr[id]["statusId"] = STATUSEDITING;
                            $(objButton).addClass('disabled');
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSEDITING]);
                            $(objButton).closest('td').find('.approveFile').addClass('disabled');
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
                $("#attLink").html('<a href="' + js_context_path + "/uploads/ebudget/" + list144Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>');
                $("#descAttachment").html(list144Arr[id]["desc"]);
            });
        }
    }, 100);
}
function bg144Action(param) {
    // when you press to edit button
    $("button.editList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName144Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            if (fid != "fileInput")$("#" + fid).val(list144Arr[id][fid]);
        });

        $(".noteUtilDesc").code(list144Arr[id]["utilDesc"]);
        $('.noteDesc').code(list144Arr[id]["desc"]);
        $('.noteRemark').code(list144Arr[id]["remark"]);

        var ContranerFile = $("#contranerFile");

        if (list144Arr[id]["path"] != null && list144Arr[id]["path"] != "null") {
            ContranerFile.html('<a href="' + js_context_path + "/uploads/ebudget/" + list144Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>&nbsp;&nbsp;<a id="removeFile" style="text-decoration: underline;">ลบไฟล์</a>');
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
                fParam["utilDesc"] = $(".noteUtilDesc").code();

                var objAttment = updateAttachment(list144Arr[id]["attachmentId"], list144Arr[id]["path"], list144Arr[id]["id"], "144");
                if (!isEmptyObject(objAttment)) {
                    fParam["attachmentId"] = objAttment.id;
                    fParam["path"] = objAttment.path;
                    fParam["desc"] = objAttment.desc;
                }

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg144Edit(id, parentId, param, dataJSONEN, objAttment);
            }
        });
    });

    // when you press to delete button
    $("button.deleteList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        $("#panelDeleteForm").modal("show");
        $("#panelDeleteForm").find('td').each(function () {
            if ($(this).attr("id")) {
                var aId = $(this).attr("id");
                var name = aId.replace('Del', '');
                $("#" + aId).html(list144Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function () {
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg144delete(id, parentId, dataJSONEN);
        });
    });
}
function bg144Insert(parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget144", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');
                var total = parseFloat($("#bgRequest").val()) + parseFloat($("#nonBgRequest").val());
                // insert node in branch
                var input = '<tr data-tt-id="list' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td class="text-center"></td>'
                    + '<td>' + $("#utilName").val() + '</br> &nbsp;' + $(".noteUtilDesc").code() + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td class="number">' + $("#nonBgRequest").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td class="number">' + total + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class=" text-bold status">' + listSTATUSTRACKING[STATUSPROGRESS] + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table144").treetable("node", parentId);
                $("#table144").treetable("loadBranch", node, input);
                $('.number').number(true, 2);
                list144Arr[data["id"]] = {
                    id: data["id"]
                };

                $("#form input, #form textarea").each(function () {
                    list144Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                list144Arr[data["id"]]["budgetHeadId"] = data["budgetHeadId"];
                list144Arr[data["id"]]["utilDesc"] = $(".noteUtilDesc").code();
                list144Arr[data["id"]]["remark"] = $(".noteRemark").code();
                list144Arr[data["id"]]["statusId"] = STATUSPROGRESS;
                list144Arr[data["id"]]["statusDesc"] = listSTATUSTRACKING[STATUSPROGRESS];

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list144Arr[data["id"]]["attachmentId"] = objAttment.id;
                    list144Arr[data["id"]]["desc"] = objAttment.desc;
                    list144Arr[data["id"]]["path"] = objAttment.path;
                } else {
                    list144Arr[data["id"]]["desc"] = "";
                }
                $("#panelForm").modal("hide");

                bg144Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg144Edit(id, parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget144", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');
                var total = parseFloat($("#bgRequest").val()) + parseFloat($("#nonBgRequest").val());
                var input = '<td class="text-center"></td>'
                    + '<td>' + $("#utilName").val() + '</br> &nbsp;' + $(".noteUtilDesc").code() + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td class="number">' + $("#nonBgRequest").val() + '</td>'
                    + '<td class="number">' + $("#bgRequest").val() + '</td>'
                    + '<td class="number">' + total + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class="text-bold status">';

                if (list144Arr[id]["statusId"] == STATUSEDITING) {
                    input += '<a href="javascript:void(0)" onclick="bg144ShowComment(' + id + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + list144Arr[id]["statusDesc"] + '</a>';
                } else {
                    input += list144Arr[id]["statusDesc"];
                }

                input += '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table144").treetable("node", parentId);
                //$("#table144 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);
                $('.number').number(true, 2);
                $("#form input, #form textarea").each(function () {
                    list144Arr[id][$(this).attr("name")] = $(this).val();
                });

                list144Arr[id]["utilDesc"] = $(".noteUtilDesc").code();
                list144Arr[id]["remark"] = $(".noteRemark").code();

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list144Arr[id]["attachmentId"] = objAttment.id;
                    list144Arr[id]["desc"] = objAttment.desc;
                    list144Arr[id]["path"] = objAttment.path;
                }

                $("#panelForm").modal("hide");

                bg144Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg144delete(id, parentId, dataJSONEN) {

    var datas = callAjax(js_context_path + "/api/budget/budgetSave/deleteBudget144", "post", dataJSONEN, "json");
    if (typeof datas !== "undefined" && datas !== null) {
        if (datas["result"] == true) {
            $("#table144").treetable("removeNode", "list" + id);
            var parent = $('#table144').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
            $("#panelDeleteForm").modal("hide");
        }else{
            alert("ลบไม่สำเร็จ");
        }
    }
}
function bg144ShowComment(id) {
    $(".bodyComment").html('');//reset
    $(".bodyComment").html(list144Arr[id]["comment"]);
    $("#panelShowComment").modal("show");

}