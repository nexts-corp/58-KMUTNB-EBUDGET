var typeName144Arr = [];
var list144Arr = [];

function bg144Form(param) {
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
        + '<table id="table144" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th class="text-center" rowspan="2" style="vertical-align: middle;">ประเภท</th>'
        + '<th class="text-center" colspan="4">รายจ่ายจริง ปีงบประมาณที่ผ่านมา</th>'
        + '<th class="text-center" colspan="3">งบประมาณที่ได้รับการจัดสรรปีงบประมาณปัจจุบัน</th>'
        + '<th class="text-center" colspan="3">คำของบประมาณปีงบประมาณที่ขอตั้งงบประมาณ</th>'
        + '<th class="text-center" rowspan="2" style="vertical-align: middle;">คำชี้แจง</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;min-width: 130px;">เครื่องมือ</th>'
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
        + '<label class="col-md-12 control-label req" for="utilName">ประเภท</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="utilName" name="utilName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="utilDesc">คำอธิบาย</label>'
        + '<div class="col-md-12">'
        + ' <textarea  id="utilDesc" name="utilDesc" class="form-control input-sm" required></textarea>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="nonBgRequest">เงินนอกงบประมาณ</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="nonBgRequest" name="nonBgRequest" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="bgRequest">เงินงบประมาณ</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="bgRequest" name="bgRequest" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label" for="remark">คำชี้แจง</label>'
        + '<div class="col-md-12">'
        + '<textarea id="remark" name="remark" class="form-control input-sm"></textarea>'
        + '</div>'
        + '</div>'
        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-success save" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก</button>'
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
        + '</div>';

    $("#divForm").html(html);

    toggleShow("form");

    bg144Detail(param);
}

function bg144Detail(param) {

    $("#table144 tbody").html('<td colspan="13" class="text-center">Loading...</td>');

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
                        + '<td>'
                        + '<button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                        + '</tr>';

                    typeName144Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {
                        var total = parseFloat(value3["bgRequest"]) + parseFloat(value3["nonBgRequest"]);
                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["utilName"] + '<br> -&nbsp;' + value3["utilDesc"] + '</td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td></td>'
                            + '<td>' + value3["nonBgRequest"] + '</td>'
                            + '<td>' + value3["bgRequest"] + '</td>'
                            + '<td>' + total + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td>'
                            + '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-warning editList" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '</div>'
                            + '</td>'
                            + '</tr>';

                        list144Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table144 tbody").html(html);

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
                var parentId = $(this).attr("data-pid");

                // reset form for new insert
                $("#modalHead").empty().html(typeName144Arr[parentId]);
                $("#loadingForm").html('');
                $("#form").trigger('reset');
                $("#panelForm").modal("show");

                $("button.save").unbind("click").click(function () {
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

                        var fdata = [];
                        fdata.push(fParam);
                        var dataJSON = JSON.stringify({budget: fdata});
                        var dataJSONEN = encodeURIComponent(dataJSON);

                        bg144Insert(parentId, param, dataJSONEN);
                    }
                });
            });

            bg144Action(param);
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
            $("#" + fid).val(list144Arr[id][fid]);
        });
        $("button.save").unbind("click").click(function () {
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

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg144Edit(id, parentId, param, dataJSONEN);
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
function bg144Insert(parentId, param, dataJSONEN) {
    $("#loadingForm").html("Loading...");

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
                    + '<td>' + $("#utilName").val() + '</br> -&nbsp;' + $("#utilDesc").val() + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td>' + $("#nonBgRequest").val() + '</td>'
                    + '<td>' + $("#bgRequest").val() + '</td>'
                    + '<td>' + total + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + data["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table144").treetable("node", parentId);
                $("#table144").treetable("loadBranch", node, input);

                list144Arr[data["id"]] = {
                    id: data["id"]
                }

                $("#form input, #form textarea").each(function () {
                    list144Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                bg144Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}

function bg144Edit(id, parentId, param, dataJSONEN) {
    $("#loadingForm").html("Loading...");

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget144", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');
                var total = parseFloat($("#bgRequest").val()) + parseFloat($("#nonBgRequest").val());
                var input = '<td class="text-center"></td>'
                    + '<td>' + $("#utilName").val() + '</br> -&nbsp;' + $("#utilDesc").val() + '</td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td></td>'
                    + '<td>' + $("#nonBgRequest").val() + '</td>'
                    + '<td>' + $("#bgRequest").val() + '</td>'
                    + '<td>' + total + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table144").treetable("node", parentId);
                //$("#table144 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list' + id + '"]').html(input);

                $("#form input, #form textarea").each(function () {
                    list144Arr[id][$(this).attr("name")] = $(this).val();
                });

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
        }
    }
}