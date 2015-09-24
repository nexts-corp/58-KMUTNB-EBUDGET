var typeName141Arr = [];
var list141Arr = [];
function bg141Form(param) {
    console.log(param);
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
        + '<table id="table141" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ชื่อตำแหน่ง</th>'
        + '<th colspan="5" class="text-center" style="vertical-align: middle;">อัตราเดิม (ตามบัญชีถือจ่าย ณ ต.ค.57)</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">คำชี้แจง</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">เครื่องมือ</th>'
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
        + '<label class="col-md-12 control-label req" for="positionName">ชื่อตำแหน่ง</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="positionName" name="positionName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="rateNo">ระดับ</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="rateNo" name="rateNo" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="salary">อัตราเงินเดือน</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="salary" name="salary" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label">จำนวนอัตรา</label>'
        + '<div class="col-md-12">'
        + '<label class="col-md-3 control-label req text-right" for="occupy">มีคนครอง</label>'
        + '<div class="col-md-3">'
        + '<input type="text" id="occupy" name="occupy" class="form-control input-sm" required>'
        + '</div>'

        + '<label class="col-md-3 control-label req text-right" for="vacancy">อัตราว่าง</label>'
        + '<div class="col-md-3">'
        + '<input type="text" id="vacancy" name="vacancy" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="salaryTotal">จำนวนเงินทั้งปี</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="salaryTotal" name="salaryTotal" class="form-control input-sm" required>'
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
        + '<button type="button" class="btn btn-danger save" data-dismiss="modal"><i class="fa fa-trash"></i> ยืนยันการลบ</button>'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);

    toggleShow("form");

    bg141Detail(param);
}

function bg141Detail(param) {

    $("#table141 tbody").html('<td colspan="9" class="text-center">Loading...</td>');

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
                        + '<td>'
                        + '<button class="btn btn-sm btn-success addList" data-pid="' + value2["id"] + '"><i class="fa fa-plus"></i> เพิ่ม</button>'
                        + '</td>'
                        + '</tr>';

                    typeName141Arr[value2["id"]] = value2["typeName"];

                    $.each(value2["budget"], function (key3, value3) {
                        html += '<tr data-tt-id="list' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["positionName"] + '</td>'
                            + '<td>' + value3["occupy"] + '</td>'
                            + '<td>' + value3["vacancy"] + '</td>'
                            + '<td>' + value3["rateNo"] + '</td>'
                            + '<td>' + value3["salary"] + '</td>'
                            + '<td>' + value3["salaryTotal"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td>'
                            + '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-warning editList" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '</div>'
                            + '</td>'
                            + '</tr>';

                        list141Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table141 tbody").html(html);

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

                // reset form for new insert
                $("#modalHead").empty().html(typeName141Arr[parentId]);
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
                        console.log(dataJSON);
                        var dataJSONEN = encodeURIComponent(dataJSON);
                        bg141Insert(parentId, param, dataJSONEN);
                    }
                });
            });

            bg141Action(param);
        }
    }, 100);
}

function bg141Action(param){
    // when you press to edit button
    $("button.editList").unbind("click").click(function(){
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        // reset form for new insert
        $("#modalHead").empty().html(typeName141Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function(){
            var fid = $(this).attr("id");
            $("#"+fid).val(list141Arr[id][fid]);
        });
        $("button.save").unbind("click").click(function(){
            var isValid = true;
            $('#form input[required]').each(function() {
                if($(this).val() == "" && !$(this).prop("disabled"))
                    isValid = false;
            });
            if(isValid){
                var fParam = param;
                fParam["budgetTypeId"] = parentId;
                fParam["id"] = id;
                $("#form input, #form textarea").each(function(){
                    var name = $(this).attr("name");
                    var val = $(this).val();

                    fParam[name] = val;
                });

                var fdata = [];
                fdata.push(fParam);
                var dataJSON = JSON.stringify({budget: fdata});
                var dataJSONEN = encodeURIComponent(dataJSON);

                bg141Edit(id, parentId, param, dataJSONEN);
            }
        });
    });

    // when you press to edit button
    $("button.deleteList").unbind("click").click(function(){
        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");

        $("#panelDeleteForm").modal("show");
        $("#panelDeleteForm").find('td').each (function() {
            if($(this).attr("id")){
                var aId = $(this).attr("id");
                var name = aId.replace('Del', '');
                $("#"+aId).html(list141Arr[id][name]);
            }
        });
        $("button.save").unbind("click").click(function(){
            var dataJSON = JSON.stringify({budgetId: id});
            var dataJSONEN = encodeURIComponent(dataJSON);
            bg141delete(id, parentId, dataJSONEN);
        });
    });
}


function bg141Insert(parentId, param, dataJSONEN){
    $("#loadingForm").html("Loading...");

    setTimeout(function(){
        var datas = callAjax(js_context_path+"/api/budget/budgetSave/insertBudget141", "post", dataJSONEN, "json");
        if(typeof datas !== "undefined" && datas !== null){
            var data = datas["result"][0];
            if(data["result"] == true){
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var input = '<tr data-tt-id="list'+data["id"]+'" data-tt-parent-id="'+parentId+'">'
                    + '<td></td>'
                    + '<td>'+$("#positionName").val()+'</td>'
                    + '<td>'+$("#rateNo").val()+'</td>'
                    + '<td>'+$("#salary").val()+'</td>'
                    + '<td>'+$("#occupy").val()+'</td>'
                    + '<td>'+$("#vacancy").val()+'</td>'
                    + '<td>'+$("#salaryTotal").val()+'</td>'
                    + '<td>'+$("#remark").val()+'</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="'+parentId+'" data-id="'+data["id"]+'"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="'+parentId+'" data-id="'+data["id"]+'"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>'
                    + '</tr>';

                var node = $("#table141").treetable("node", parentId);
                $("#table141").treetable("loadBranch", node, input);

                list141Arr[data["id"]] = {
                    id: data["id"]
                }

                $("#form input, #form textarea").each(function(){
                    list141Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });

                bg141Action(param);
            }
            else{
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}

function bg141Edit(id, parentId, param, dataJSONEN){

    $("#loadingForm").html("Loading...");

    setTimeout(function(){
        var datas = callAjax(js_context_path+"/api/budget/budgetSave/updateBudget141", "post", dataJSONEN, "json");
        if(typeof datas !== "undefined" && datas !== null){
            if(datas["result"] == true){
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var input = '<td></td>'
                    + '<td>'+$("#positionName").val()+'</td>'
                    + '<td>'+$("#rateNo").val()+'</td>'
                    + '<td>'+$("#salary").val()+'</td>'
                    + '<td>'+$("#occupy").val()+'</td>'
                    + '<td>'+$("#vacancy").val()+'</td>'
                    + '<td>'+$("#salaryTotal").val()+'</td>'
                    + '<td>'+$("#remark").val()+'</td>'
                    + '<td>'
                    + '<div class="btn-group">'
                    + '<button class="btn btn-sm btn-warning editList" data-pid="'+parentId+'" data-id="'+id+'"><i class="fa fa-pencil"></i> แก้ไข</button>'
                    + '<button class="btn btn-sm btn-default deleteList" data-pid="'+parentId+'" data-id="'+id+'"><i class="fa fa-trash"></i> ลบ</button>'
                    + '</div>'
                    + '</td>';

                //var node = $("#table140").treetable("node", parentId);
                //$("#table140 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="list'+id+'"]').html(input);

                $("#form input, #form textarea").each(function(){
                    list141Arr[id][$(this).attr("name")] = $(this).val();
                });

                bg141Action(param);
            }
            else{
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}

function bg141delete(id, parentId, dataJSONEN){

    var datas = callAjax(js_context_path+"/api/budget/budgetSave/deleteBudget141", "post", dataJSONEN, "json");
    if(typeof datas !== "undefined" && datas !== null){
        if(datas["result"] == true){
            $("#table141").treetable("removeNode", "list"+id);
            var parent = $('#table141').treetable('node', parentId);
            if (parent.children.length == 0) {
                parent.row.find('.indenter').html('');
            }
        }
    }
}