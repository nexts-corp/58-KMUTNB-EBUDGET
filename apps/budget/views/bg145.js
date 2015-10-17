var typeName145Arr = [];
var list145Arr = [];

function bg145Form(param) {

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
        + '<table id="table145" class="table table-bordered table-striped mb-none treetable">'
        + '<thead>'
        + '<tr>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;">ลำดับ</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">หมวดรายจ่ายรายการและรายละเอียดประกอบ</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">จำนวนหน่วย</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">หน่วยนับ Unit</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">ราคาต่อหน่วย</th>'
        + '<th class="text-center" rowspan="3" style="vertical-align: middle;">รวมเงิน</th>'
        + '<th class="text-center" colspan="3">คำชี้แจง</th><th class="text-center" rowspan="3" style="vertical-align: middle;">เหตุผลความจำเป็น</th>'
        + '<th rowspan="3" class="text-center" style="vertical-align: middle;min-width: 130px;">เครื่องมือ</th>'
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
        + '</tr>'
        + '</thead>'
        + '<tbody>'
        + '<tr>'
        + '<td colspan="10" class="text-center">-</td>'
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
        + '<label class="col-md-12 control-label req" for="durableName">หมวดรายจ่าย-รายการ</label>'
        + '<div class="col-md-12">'
        + ' <input type="text" id="durableName" name="durableName" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="durableDesc">รายละเอียดประกอบ</label>'
        + '<div class="col-md-12">'
        + ' <textarea id="durableDesc" name="durableDesc" class="form-control input-sm"></textarea>'
        + '</div>'
        + '</div>'

        + '<div id="attachFileDiv" class="form-group">'
        + '<div class="col-md-12">'
        + '    <input class="col-md-6" type="file" id="fileInput" name="fileInput"/>'
        + '    <label class="col-md-6 req text-right">แนบเอกสาร เช่น พิมพ์เขียว</label>'
        + '</div>'
        + '<div class="col-md-12">'
        + '     <textarea type="text" id="fileDesc" class="form-control" name="fileDesc" placeholder="คำอธิบายประกอบไฟล์"></textarea>'
        + '</div>'
        + '<div class="col-md-12 text-center" style="padding-top: 5px;">'
        + '    <label id="statusUploadFile" class="text-center col-md-8"></label>'
        + '     <button type="button" onclick="AttachmentsFile();" class="btn btn-default col-md-4">Upload File</button>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-3 control-label req" for="unit">หน่วยนับ</label>'
        + '<div class="col-md-9">'
        + ' <input type="text" id="unit" name="unit" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-3 control-label req" for="qty">จำนวนหน่วย</label>'
        + '<div class="col-md-9">'
        + ' <input type="number" min="0" id="qty" name="qty" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-3 control-label req" for="price">ราคาต่อหน่วย</label>'
        + '<div class="col-md-9">'
        + ' <input type="number" min="0" id="price" name="price" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-3 control-label" for="totalPrice">รวมเงิน</label>'
        + '<div class="col-md-9">'
        + ' <input disabled type="text" id="totalPrice" name="totalPrice" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label">คำชี้แจง</label>'
        + ' <div class="col-md-12">'
        + '     <label class="col-md-4 control-label req" for="numNeeded">ความต้องการทั้งสิ้น</label>'
        + ' <div class="col-md-8">'
        + '     <input type="text" id="numNeeded" name="numNeeded" class="form-control input-sm" required>'
        + ' </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-12">'
        + '     <label class="col-md-12 control-label" for="occupy">มีอยู่แล้ว</label>'
        + ' <div class="col-md-6">'
        + '     <label class="col-md-6 control-label req" for="numWork">ใช้การได้</label>'
        + '     <div class="col-md-6"><input type="number" min="0" id="numWork" name="numWork" class="form-control input-sm" required></div>'
        + ' </div>'
        + ' <div class="col-md-6">'
        + '     <label class="col-md-6 control-label req" for="numUnwork">ใช้การไม่ได้</label>'
        + '     <div class="col-md-6"><input type="number" min="0" id="numUnwork" name="numUnwork" class="form-control input-sm" required></div>'
        + ' </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label" for="remark">เหตุผลความจำเป็น</label>'
        + '<div class="col-md-12">'
        + '<textarea id="remark" name="remark" class="form-control input-sm"></textarea>'
        + '</div>'
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
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");
    bg145Detail(param);
}

function bg145Detail(param) {

    $("#table145 tbody").html('<td colspan="11" class="text-center">Loading...</td>');

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
                            + '<td>' + value2["durableName"] + '<br> -&nbsp;' + value2["durableDesc"] + '</td>'
                            + '<td>' + value2["qty"] + '</td>'
                            + '<td>' + value2["unit"] + '</td>'
                            + '<td class="number">' + value2["price"] + '</td>'
                            + '<td class="number">' + value2["totalPrice"] + '</td>'
                            + '<td>' + value2["numNeeded"] + '</td>'
                            + '<td>' + value2["numWork"] + '</td>'
                            + '<td>' + value2["numUnwork"] + '</td>'
                            + '<td>' + value2["remark"] + '</td>'
                            + '<td>'
                            + '<div class="btn-group col-md-12">'
                            + '<button class="btn btn-sm btn-warning editList col-md-6" data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '<div class="col-md-12"></div>'
                            + '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                            + '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + value["id"] + '" data-id="' + value2["id"] + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>'
                            + '</div>'
                            + '</td>'
                            + '</tr>';
                        list145Arr[value2["id"]] = value2;

                    }
                    typeName145Arr[value2["id"]] = value2["typeName"];
                    $.each(value2["budget"], function (key3, value3) {

                        html += '<tr data-tt-id="' + value3["id"] + '" data-tt-parent-id="' + value2["id"] + '">'
                            + '<td class="text-center"></td>'
                            + '<td>' + value3["durableName"] + '<br> -&nbsp;' + value3["durableDesc"] + '</td>'
                            + '<td>' + value3["qty"] + '</td>'
                            + '<td>' + value3["unit"] + '</td>'
                            + '<td>' + value3["price"] + '</td>'
                            + '<td>' + value3["totalPrice"] + '</td>'
                            + '<td>' + value3["numNeeded"] + '</td>'
                            + '<td>' + value3["numWork"] + '</td>'
                            + '<td>' + value3["numUnwork"] + '</td>'
                            + '<td>' + value3["remark"] + '</td>'
                            + '<td>'
                            + '<div class="btn-group">'
                            + '<button class="btn btn-sm btn-warning editList" data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                            + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + value2["id"] + '" data-id="' + value3["id"] + '"><i class="fa fa-trash"></i> ลบ</button>'
                            + '</div>'
                            + '</td>'
                            + '</tr>';
                        list145Arr[value3["id"]] = value3;
                    });
                });
            });

            $("#table145 tbody").html(html);
            $('.number').number(true, 2);

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

                // reset form for new insert
                $("#modalHead").empty().html(typeName145Arr[parentId]);
                $("#loadingForm").html('');
                $("#attachFileDiv").addClass('hidden');
                $("#form").trigger('reset');
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
                        bg145Insert(parentId, param, dataJSONEN);
                    }
                });
            });

            bg145Action(param);
        }
    }, 100);
}
function bg145Action(param) {

    // when you press to edit button
    $("button.editList").unbind("click").click(function () {

        var parentId = $(this).attr("data-pid");
        var id = $(this).attr("data-id");
        var totalPrice = 0;
        // reset form for new insert
        $("#modalHead").empty().html(typeName145Arr[parentId]);
        $("#loadingForm").html('');
        $("#form").trigger('reset');
        $("#attachFileDiv").removeClass('hidden');
        $("#panelForm").modal("show");

        $("#form input, #form textarea").each(function () {
            var fid = $(this).attr("id");
            $("#" + fid).val(list145Arr[id][fid]);
        });
        $("button.save").unbind("click").click(function () {

            var isValid = true;
            $('#form input[req]').each(function () {
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

                bg145Edit(id, parentId, param, dataJSONEN);
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
function bg145Insert(parentId, param, dataJSONEN) {

    $("#loadingForm").html("Loading...");

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            var data = datas["result"][0];
            if (data["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                // insert node in branch
                var html = '<tr data-tt-id="' + data["id"] + '" data-tt-parent-id="' + parentId + '">'
                    + '<td></td>'
                    + '<td>' + $("#durableName").val() + '</br> -&nbsp;' + $("#durableDesc").val() + '</td>'
                    + '<td>' + $("#qty").val() + '</td>'
                    + '<td>' + $("#unit").val() + '</td>'
                    + '<td>' + $("#price").val() + '</td>'
                    + '<td>' + $("#totalPrice").val() + '</td>'
                    + '<td>' + $("#numNeeded").val() + '</td>'
                    + '<td>' + $("#numWork").val() + '</td>'
                    + '<td>' + $("#numUnwork").val() + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>';

                if (parentId == "20400000") {
                    html += '<div class="btn-group col-md-12">'
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

                list145Arr[data["id"]] = {
                    id: data["id"]
                };

                $("#form input, #form textarea").each(function () {
                    list145Arr[data["id"]][$(this).attr("name")] = $(this).val();
                });
                $("#panelForm").modal("hide");
                bg145Action(param);
            }
            else {
                $("#loadingForm").html('<span class="text-danger">ไม่สามารถบันทึกข้อมูลได้</span>');
            }
        }
    }, 500);
}

function bg145Edit(id, parentId, param, dataJSONEN) {
    $("#loadingForm").html("Loading...");

    setTimeout(function () {
        var datas = callAjax(js_context_path + "/api/budget/budgetSave/updateBudget145", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas["result"] == true) {
                $("#loadingForm").html('<span class="text-success">บันทึกข้อมูลเรียบร้อย</span>');

                var html = '<td></td>'
                    + '<td>' + $("#durableName").val() + '</br> -&nbsp;' + $("#durableDesc").val() + '</td>'
                    + '<td>' + $("#qty").val() + '</td>'
                    + '<td>' + $("#unit").val() + '</td>'
                    + '<td>' + $("#price").val() + '</td>'
                    + '<td>' + $("#totalPrice").val() + '</td>'
                    + '<td>' + $("#numNeeded").val() + '</td>'
                    + '<td>' + $("#numWork").val() + '</td>'
                    + '<td>' + $("#numUnwork").val() + '</td>'
                    + '<td>' + $("#remark").val() + '</td>'
                    + '<td>';
                if (parentId == "20400000") {
                    html += '<div class="btn-group col-md-12">'
                        + '<button class="btn btn-sm btn-warning editList col-md-6" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList col-md-6"  data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>'
                        + '<div class="col-md-12"></div>'
                        + '<button class="btn btn-sm btn-primary buildingOne col-md-6"  data-pid="' + parentId + '" data-id="' + id + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี"><i class="fa fa-file-text-o"></i> 1ปี</button>'
                        + '<button class="btn btn-sm btn-info buildingMore col-md-6"  data-pid="' + parentId + '" data-id="' + id + '" title="คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้างต่อเนื่อง"><i class="fa fa-file-text-o"></i> ต่อเนื่อง</button>';

                } else {
                    html += '<div class="btn-group">'
                        + '<button class="btn btn-sm btn-warning editList" data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-pencil"></i> แก้ไข</button>'
                        + '<button class="btn btn-sm btn-default deleteList"  data-pid="' + parentId + '" data-id="' + id + '"><i class="fa fa-trash"></i> ลบ</button>';
                }
                html += '</div>'
                    + '</td>';

                //var node = $("#table145").treetable("node", parentId);
                //$("#table145 ").treetable("loadBranch", node, input);
                $('tr[data-tt-id="' + id + '"]').html(html);

                $("#form input, #form textarea").each(function () {
                    list145Arr[id][$(this).attr("name")] = $(this).val();
                });
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
            $("#table145").treetable("removeNode", "list" + id);
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

