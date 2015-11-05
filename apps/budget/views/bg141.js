var typeName141Arr = [];
var list141Arr = [];
function bg141Form(param) {
    typeName141Arr = [];
    list141Arr = [];
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
        + '<table id="table141" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ชื่อตำแหน่ง</th>'
        + '<th colspan="5" class="text-center" style="vertical-align: middle;">อัตราเดิม (ตามบัญชีถือจ่าย ณ ต.ค.57)</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">คำชี้แจง</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">สถานะคำขอ</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle; min-width: 130px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;">ระดับ</th>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;">อัตราเงินเดือน</th>'
        + '<th colspan="2" class="text-center" style="vertical-align: middle;">จำนวนอัตรา</th>'
        + '<th rowspan="2" class="text-center" style="vertical-align: middle;">จำนวนเงินทั้งปี</th>'
        + '</tr>'
        + '<tr>'
        + '<th class="text-center" style="vertical-align: middle;">มีคนครอง</th>'
        + '<th class="text-center" style="vertical-align: middle;">อัตราว่าง</th>'
        + '</tr>'
        + '<tr>'
        + '<th></th>'
        + '<th class="text-center">รวมทั้งสิ้น</th>'
        + '<th></th>'
        + '<th></th>'
        + '<th></th>'
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
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '<form id="form" onsubmit="return false;">'
        + '<div class="form-group">'
        + '<label class="col-md-12 control-label text-bold req" for="positionName">ชื่อตำแหน่ง</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="positionName" name="positionName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group row">'
        + '     <div class="col-md-4 col-sm-4 col-xs-4">'
        + '         <label class="col-md-4 col-sm-4 col-xs-4 control-label text-bold req" for="rateNo">ระดับ</label>'
        + '         <div class="col-md-8 col-sm-8 col-xs-8">'
        + '             <input type="text" id="rateNo" name="rateNo" class="form-control input-sm" required>'
        + '          </div>'
        + '     </div>'
        + '     <div class="col-md-8 col-sm-8 col-xs-8">'
        + '         <label class="col-md-4 col-sm-4 col-xs-4 control-label text-bold req" for="salary">อัตราเงินเดือน</label>'
        + '         <div class="col-md-8 col-sm-8 col-xs-8">'
        + '             <input type="text" id="salary" name="salary" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '</div>'

        + '<div id="attachFileDiv" class="form-group">'
        + ' <div class="col-md-12 col-sm-12 col-xs-12">'
        + '    <div class="col-md-7 col-sm-7 col-xs-7 none-padding none-margin" id="contranerFile"><input  type="file" id="fileInput" name="fileInput"/></div>'
        + '    <label class="col-md-5 col-sm-5 col-xs-5 req text-right">แนบเอกสารประกอบคำของบประมาณ</label>'
        + ' </div>'
        + ' <label class="col-md-12 text-bold">คำอธิบายประกอบไฟล์</label>'
        + ' <div class="form-group col-md-12">'
            //+ '    <div class="col-md-12"><textarea type="text" id="desc" class="form-control input-sm" name="desc" placeholder="คำอธิบายประกอบไฟล์"></textarea></div>'
        + '    <div  class="summernote noteDesc" id="desc" name="desc"></div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 col-sm-12 col-xs-12 control-label text-bold">จำนวนอัตรา</label>'
        + ' <div class="col-md-12 col-sm-12 col-xs-12">'
        + '     <div class="col-md-3 col-sm-3 col-xs-3">'
        + '         <label class="control-label req text-right" for="occupy">มีคนครอง</label>'
        + '         <div>'
        + '             <input type="text" id="occupy" name="occupy" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-3 col-sm-3 col-xs-3">'
        + '         <label class="control-label req text-right" for="vacancy">อัตราว่าง</label>'
        + '         <div>'
        + '             <input type="text" id="vacancy" name="vacancy" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-6 col-sm-6 col-xs-6">'
        + '         <label class="col-md-12 control-label req" for="salaryTotal">จำนวนเงินทั้งปี</label>'
        + '         <div class="col-md-12">'
        + '             <input type="text" id="salaryTotal" name="salaryTotal" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + ' </div>'
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
        + '<td class="col-md-3 text-right">ชื่อตำแหน่ง : </td>'
        + '<td class="col-md-9 text-bold" id="positionNameDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-3 text-right">ระดับ : </td>'
        + '<td class="col-md-9 text-bold" id="rateNoDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-3 text-right">อัตราเงินเดือน : </td>'
        + '<td class="col-md-9 text-bold" id="salaryDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-3 text-right">จำนวนอัตรา : </td>'
        + '<td class="col-md-9">'
        + '<table>'
        + '<tr>'
        + '<td class="col-md-4 text-right">มีคนครอง : </td>'
        + '<td class="col-md-2 text-bold" id="occupyDel"></td>'
        + '<td class="col-md-4 text-right">อัตราว่าง : </td>'
        + '<td class="col-md-2 text-bold" id="vacancyDel"></td>'
        + '</tr>'
        + '</table>'
        + '</td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-3 text-right">จำนวนเงินทั้งปี : </td>'
        + '<td class="col-md-9 text-bold" id="salaryTotalDel"></td>'
        + '</tr>'
        + '<tr>'
        + '<td class="col-md-3 text-right">คำชี้แจง : </td>'
        + '<td class="col-md-9 text-bold" id="remarkDel"></td>'
        + '</tr>'
        + '</tbody>'
        + '</table>'
        + '</div>'
        + '<div class="modal-footer">'
        + ' <button type="button" class="btn btn-danger save"><i class="fa fa-trash"></i> ยืนยันการลบ</button>'
        + ' <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
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

            updateStatusBG("Budget141", list141Arr, STATUSWAITING, true);
        });
        bg141Detail(param);
    } else {

        $("button.approveBGbtn").show();
        $("button.requestBGbtn").hide();
        $("button.approveBGbtn").unbind("click").click(function () {

            updateStatusBG("Budget141", list141Arr, STATUSAPPROVE, true);
        });
        bg141DetailPlaningBudget(param);//กองแผนงาน
    }
    $('.summernote').summernote({height: 100});
    $('.summernoteApprove').summernote({height: 300});
}
//this function for Department
function bg141Detail(param) {

    $("#table141 tbody").html('<td colspan="9" class="text-center">Loading...</td>');
    $(".requestBGbtn").attr('disabled', 'disabled');
    setTimeout(function () {
        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget141", "post", dataJSONEN, "json");
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
                        + '<td>'
                        + '<button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                        + '</tr>';

                    typeName141Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["positionName"] + '</td>'
                            + '<td>' + value3["rateNo"] + '</td>'
                            + '<td class="number">' + value3["salary"] + '</td>'
                            + '<td>' + value3["occupy"] + '</td>'
                            + '<td>' + value3["vacancy"] + '</td>'
                            + '<td class="number">' + value3["salaryTotal"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td class="text-bold status">';

                        if (value3["statusId"] == STATUSEDITING) {
                            html += '<a href="javascript:void(0)" onclick="bg141ShowComment(' + value3["id"] + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + value3["statusDesc"] + '</a>';
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

                        list141Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table141 tbody").html(html);
            $('.number').number(true, 2);
            $(".requestBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table141").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table141").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table141").treetable("expandAll");
            });

            // when you press to add button
            $("button.addList").unbind("click").click(function () {
                var parentId = $(this).attr("data-pid");
                $('.summernote').code('');
                // reset form for new insert
                $("#modalHead").empty().html(typeName141Arr[parentId]);
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
                        bg141Insert(parentId, param, dataJSONEN, objAttment);
                    }
                });
            });

            bg141Action(param);
        }
    }, 100);
}

//this function for กองแผน
function bg141DetailPlaningBudget(param) {


    $("#table141 tbody").html('<td colspan="9" class="text-center">Loading...</td>');
    $(".approveBGbtn").attr('disabled', 'disabled');

    setTimeout(function () {

        var dataJSON = JSON.stringify({param: param});
        var dataJSONEN = encodeURIComponent(dataJSON);
        var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBudget141", "post", dataJSONEN, "json");
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
                    + '</tr>';

                var cCount = 0;
                $.each(value["lv2"], function (key2, value2) {
                    html += '<tr data-tt-id="' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                        + '<td class="text-center"></td>'
                        + '<td class="text-bold" style="padding-left: 20px;">' + pCount + '.' + (++cCount) + ' ' + value2["typeName"] + '</td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '<td></td>'
                        + '</tr>';

                    typeName141Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["positionName"] + '</td>'
                            + '<td>' + value3["rateNo"] + '</td>'
                            + '<td class="number">' + value3["salary"] + '</td>'
                            + '<td>' + value3["occupy"] + '</td>'
                            + '<td>' + value3["vacancy"] + '</td>'
                            + '<td class="number">' + value3["salaryTotal"] + '</td>'
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

                        list141Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table141 tbody").html(html);
            $('.number').number(true, 2);
            $(".approveBGbtn").removeAttr('disabled');

            // set default table to tree table
            $("#table141").treetable({
                expandable: true
            });

            // collapse all
            $("#collapseAll").unbind("click").click(function () {
                $("#table141").treetable("collapseAll");
            });

            // expand all
            $("#expandAll").unbind("click").click(function () {
                $("#table141").treetable("expandAll");
            });

            // when you press to editApprove button
            $("button.approveEdit").unbind("click").click(function () {
                var id = $(this).attr("data-id");
                var objButton = this;
                $('.summernoteApprove').code(list141Arr[id]["comment"]);
                $("#panelCommentApprove").modal("show");

                $("button.approve").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg141updateStatusWithComment(txtComment, id, STATUSAPPROVE, objButton);
                    var fParam = [];
                    list141Arr[id]["comment"] = txtComment;
                    fParam.push(list141Arr[id]);
                    if (updateStatusBG("Budget141", fParam, STATUSAPPROVE, false)) {

                        if (list141Arr[id]["statusId"] != STATUSAPPROVE) {
                            list141Arr[id]["statusId"] = STATUSAPPROVE;
                            $(objButton).closest('tr').find('.status').html(listSTATUSTRACKING[STATUSAPPROVE]);
                        }

                        $("#panelCommentApprove").modal("hide");
                    } else {
                        $("#loadingModalApprove").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
                    }
                });
                $("button.edit").unbind("click").click(function () {
                    var txtComment = $('.summernoteApprove').code();
                    //bg141updateStatusWithComment(txtComment, id, STATUSEDITING, objButton);
                    var fParam = [];
                    list141Arr[id]["comment"] = txtComment;
                    fParam.push(list141Arr[id]);

                    if (updateStatusBG("Budget141", fParam, STATUSEDITING, false)) {

                        if (list141Arr[id]["statusId"] != STATUSEDITING) {
                            list141Arr[id]["statusId"] = STATUSEDITING;
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

function bg141Action(param) {
    // when you press to edit button
    $("button.editList").unbind("click").click(function () {
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName141Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            if (fid != "fileInput")$("#" + fid).val(list141Arr[id][fid]);
        });

        $('.noteDesc').code(list141Arr[id]["desc"]);
        $('.noteRemark').code(list141Arr[id]["remark"]);

        var ContranerFile = $("#contranerFile");

        if (list141Arr[id]["path"] != null && list141Arr[id]["path"] != "null") {
            ContranerFile.html('<a href="' + js_context_path + "/uploads/ebudget/" + list141Arr[id]["path"] + '"><i class="fa fa-file-zip-o"></i> ดาวโหลดเอกสารที่แนบไว้</a>&nbsp;&nbsp;<a id="removeFile" style="text-decoration: underline;">ลบไฟล์</a>');
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
                var objAttment = updateAttachment(list141Arr[id]["attachmentId"], list141Arr[id]["path"], list141Arr[id]["id"], "141");
                if (!isEmptyObject(objAttment)) {
                    fParam["attachmentId"] = objAttment.id;
                    fParam["path"] = objAttment.path;
                    fParam["desc"] = objAttment.desc;
                }

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg141Edit(id, parentId, param, dataJSONEN, objAttment);
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
                $("#" + aId).html(list141Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function () {
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg141delete(id, parentId, dataJSONEN);
        });
    });
}
function bg141Insert(parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget141", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var input = '<tr data-tt-id="list' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td></td>'
                    + '<td>' + $("#positionName").val() + '</td>'
                    + '<td >' + $("#rateNo").val() + '</td>'
                    + '<td class="number">' + $("#salary").val() + '</td>'
                    + '<td>' + $("#occupy").val() + '</td>'
                    + '<td>' + $("#vacancy").val() + '</td>'
                    + '<td class="number">' + $("#salaryTotal").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class=" text-bold status">' + listSTATUSTRACKING[STATUSPROGRESS] + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table141").treetable("node", parentId);
                $("#table141").treetable("loadBranch", node, input);
                $('.number').number(true, 2);
                list141Arr[data["id"]] = {
                    id: data["id"]
                };

                $("#form input, #form textarea").each(function () {
                    list141Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });
                list141Arr[data["id"]]["remark"] = $(".noteRemark").code();
                list141Arr[data["id"]]["statusId"] = STATUSPROGRESS;
                list141Arr[data["id"]]["statusDesc"] = listSTATUSTRACKING[STATUSPROGRESS];

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list141Arr[data["id"]]["attachmentId"] = objAttment.id;
                    list141Arr[data["id"]]["desc"] = objAttment.desc;
                    list141Arr[data["id"]]["path"] = objAttment.path;
                } else {
                    list141Arr[data["id"]]["desc"] = "";
                }
                $("#panelForm").modal("hide");

                bg141Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg141Edit(id, parentId, param, dataJSONEN, objAttment) {

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget141", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var input = '<td></td>'
                    + '<td>' + $("#positionName").val() + '</td>'
                    + '<td>' + $("#rateNo").val() + '</td>'
                    + '<td class="number">' + $("#salary").val() + '</td>'
                    + '<td>' + $("#occupy").val() + '</td>'
                    + '<td>' + $("#vacancy").val() + '</td>'
                    + '<td class="number">' + $("#salaryTotal").val() + '</td>'
                    + '<td>' + $(".noteRemark").code() + '</td>'
                    + '<td class="text-bold status">';

                if (list141Arr[id]["statusId"] == STATUSEDITING) {
                    input += '<a href="javascript:void(0)" onclick="bg141ShowComment(' + id + ')" style="text-decoration: underline;" title="คลิกเพื่อดูบันทึกเพิ่มเติม">' + list141Arr[id]["statusDesc"] + '</a>';
                } else {
                    input += list141Arr[id]["statusDesc"];
                }

                input += '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table141").treetable("node", parentId);
                //$("#table141 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);
                $('.number').number(true, 2);
                $("#form input, #form textarea").each(function () {
                    list141Arr[id][$(this).attr("name")] = $(this).val();
                });

                list141Arr[id]["remark"] = $(".noteRemark").code();

                if (!isEmptyObject(objAttment)) {
                    // if have attachemnt
                    list141Arr[id]["attachmentId"] = objAttment.id;
                    list141Arr[id]["desc"] = objAttment.desc;
                    list141Arr[id]["path"] = objAttment.path;
                }

                $("#panelForm").modal("hide");

                bg141Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}
function bg141delete(id, parentId, dataJSONEN) {

    var datas = callAjax(js_context_path + "/api/budget/budgetSave/deleteBudget141", "post", dataJSONEN, "json");
    if (typeof datas !== "undefined" && datas !== null) {
        if (datas["result"] == true) {
            $("#table141").treetable("removeNode", "list" + id);
            var parent = $('#table141').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
        }
    }
}

function bg141ShowComment(id) {

    $(".bodyComment").html('');//reset
    $(".bodyComment").html(list141Arr[id]["comment"]);
    $("#panelShowComment").modal("show");

}