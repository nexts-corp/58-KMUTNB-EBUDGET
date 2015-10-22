var typeName146Arr = [];
var list146Arr = [];

function bg146Form(param) {
    //console.log(param);
    var html = '<div id="panelTable" class="col-md-12">'

        + '<div class="form-group">'

        + '<div class="col-md-6">'
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
        + '<div class="col-md-6">'
        + '<label class="col-md-4 control-label text-right">กองทุน : </label>'
        + '<div class="col-md-6">' + fundgroupArr[param["fundgroupId"]] + '</div>'
        + '</div>'

        + '<div class="col-md-6">'
        + '<label class="col-md-4 control-label text-right">หน่วยงาน : </label>'
        + '<div class="col-md-6">' + departmentArr[param["deptId"]] + '</div>'
        + '</div>'

        + '</div>'

        + '<section class="panel">'
        + '<div class="panel-body">'
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
        + '<th class="text-center" style="vertical-align: middle;min-width: 130px;">เครื่องมือ</th>'
        + '</tr>'
        + '<tr>'
        + '<th class="text-center"></th>'
        + '<th class="text-center">รวมทั้งสิ้น</th>'
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
        + '<label class="col-md-12 control-label req" for="bursaryName">รายการ - ประเภทเงินอุดหนุน</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="bursaryName" name="bursaryName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="bursaryDesc">คำอธิบาย</label>'
        + '<div class="col-md-12">'
        + ' <textarea type="text" id="bursaryDesc" name="bursaryDesc" class="form-control input-sm" required></textarea>'
        + '</div>'
        + '</div>'

        + '<div id="attachFileDiv" class="form-group">'
        + '<div class="col-md-12">'
        + '    <div class="col-md-7" id="contranerFile"><input  type="file" id="fileInput" name="fileInput"/></div>'
        + '    <label class="col-md-5 req text-right">แนบเอกสาร เช่น พิมพ์เขียว</label>'
        + '</div>'
        + '<div id="descFileDiv" class="form-group">'
        + '    <label class="col-md-12">คำอธิบายประกอบไฟล์</label>'
        + '    <div class="col-md-12"><textarea type="text" id="desc" class="form-control input-sm" name="desc" placeholder="คำอธิบายประกอบไฟล์"></textarea></div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="bgHistory">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน</label>'
        + '<div class="col-md-12">'
        + ' <input type="text" id="bgHistory" name="bgHistory" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="bgRequest">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ</label>'
        + '<div class="col-md-12">'
        + ' <input type="text" id="bgRequest" name="bgRequest" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label" for="remark">คำชี้แจงเหตุผลสรุป</label>'
        + '<div class="col-md-12">'
        + ' <textarea id="remark" name="remark" class="form-control input-sm"></textarea>'
        + '</div>'
        + '</div>'
        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-success save" ><i class="fa fa-save"></i> บันทึก</button>'
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
        + '</div>';

    $("#divForm").html(html);

    toggleShow("form");

    bg146Detail(param);
}

function bg146Detail(param) {

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
                    + '<td>'
                    + '<button class="btn btn-sm btn-success addList" data-pid="' + value["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                    + '</td>'
                    + '</tr>';

                typeName146Arr[value["id"]] = value["typeName"];

                $.each(value["lv2"], function (key2, value2) {
                    html += '<tr data-tt-id="list' + value2["id"] + '" data-tt-parent-id="' + value["id"] + '">'
                        + '<td class="text-center"></td>'
                        + '<td>' + value2["bursaryName"] + '<br> -&nbsp;' + value2["bursaryDesc"] + '</td>'
                        + '<td>' + value2["bgHistory"] + '</td>'
                        + '<td>' + value2["bgRequest"] + '</td>'
                        + '<td>' + value2["remark"] + '</td>'
                        + '<td>'
                        + '<div class="btn-group">'
                        + '<button class="btn btn-sm btn-warning editList" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                        + '</div>'
                        + '</td>'
                        + '</tr>';

                    list146Arr[value2["id"]] = value2;
                });
            });

            $("#table146 tbody").html(html);

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
                    + '<td>' + $("#bursaryName").val() + '</br> -&nbsp;' + $("#bursaryDesc").val() + '</td>'
                    + '<td>' + $("#bgHistory").val() + '</td>'
                    + '<td>' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table146").treetable("node", parentId);
                $("#table146").treetable("loadBranch", node, input);

                list146Arr[data["id"]] = {
                    id: data["id"]
                }

                $("#form input, #form textarea").each(function () {
                    list146Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

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
                    + '<td>' + $("#bursaryName").val() + '</br> -&nbsp;' + $("#bursaryDesc").val() + '</td>'
                    + '<td>' + $("#bgHistory").val() + '</td>'
                    + '<td>' + $("#bgRequest").val() + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table146").treetable("node", parentId);
                //$("#table146 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);

                $("#form input, #form textarea").each(function () {
                    list146Arr[id][$(this).attr("name")] = $(this).val();
                });

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