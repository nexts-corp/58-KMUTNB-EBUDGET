var listBuildingArr = [];

function buildingOneForm(param) {

    var html = '<div class="col-md-12 text-center">'
        + '<h4>'
        + 'คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี'
        + '</h4>'
        + '</div>'

        + '<form id="form" onsubmit="return false">'
        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">แผนงาน</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="plan" name="plan"  value="' + planArr[param["planId"]] + '" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">ผลผลิต</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="product" name="product" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">รายการ</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="name" name="name" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">สถานที่ดำเนินการ</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="place" name="place" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">เหตุผลความจำเป็น</label>'
        + '<div class="col-md-8">'
        + '<textarea id="rationale" name="rationale" class="form-control input-sm" required>'
        + '</textarea>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">งบประมาณทั้งสิ้น</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="costTotal" name="costTotal" class="form-control input-sm">'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<label class="col-md-4 control-label text-right" for="xxx">พื้นที่/ปริมาณงาน</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="area" name="area" class="form-control input-sm">'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-12">'
        + '<label class="col-md-4 control-label text-right" for="xxx">ลักษณะการก่อสร้าง ปรับปรุง ขนาด และประมาณราคา</label>'
        + '<div class="col-md-8 text-right">'
        + '<button type="button" class="btn btn-success add" style="margin-bottom: 5px;"><i class="fa fa-plus-circle"></i> เพิ่ม</button>'
        + '</div>'
        + '</div>'
        + '<div class="col-md-12">'
        + '<table id="table" class="table table-bordered table-striped table-condensed mb-none">'
        + '<thead>'
        + ' <tr>'

        + '     <th rowspan="2" class="col-md-3 text-center" >รายการ</th>'
        + '     <th rowspan="2" class="col-md-1 text-center">หน่วย</th>'
        + '     <th rowspan="2" class="col-md-1 text-center">จำนวน</th>'
        + '     <th rowspan="1" colspan="2" class="col-md-2 text-center">ราคาวัสดุสิ่งของ</th>'
        + '     <th rowspan="1" colspan="2" class="col-md-2 text-center">ค่าแรงงาน</th>'
        + '     <th rowspan="2" class="col-md-2 text-center">รวม</th>'
        + '     <th rowspan="2" class="col-md-3 text-center" >เครื่องมือ</th>'

        + ' </tr>'
        + ' <tr>'
        + '     <th rowspan="1" class="col-md-1 text-center">ราคาต่อหน่วย</th>'
        + '     <th rowspan="1" class="col-md-1 text-center">จำนวนเงิน</th>'
        + '     <th rowspan="1" class="col-md-1 text-center">ราคาต่อหน่วย</th>'
        + '     <th rowspan="1" class="col-md-1 text-center">จำนวนเงิน</th>'
        + ' </tr>'
        + '</thead>'
        + '<tbody id="buildTbody">'

        + '</tbody>'
        + '<tfoot id="buildTfoot">'
        + '<tr>'
        + ' <td class="text-center" colspan="3">รวม</td>'
        + ' <td class="text-center"></td>'
        + ' <td class="text-center"></td>'
        + ' <td class="text-center"></td>'
        + ' <td class="text-center"></td>'
        + ' <td class="text-center"></td>'
        + ' <td class="text-center"></td>'
        + '</tr>'
        + '</tfoot>'
        + '</table>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '<div class="col-md-9">'
        + '<div class="col-md-12" style="margin: 3px 0;">'
        + '<label class="col-md-4 control-label text-right" for="xxx">แผนการดำเนินงาน</label>'
        + '<div class="col-md-8">'
        + '<label class="col-md-4 control-label text-right" for="xxx">ออกแบบ</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="timeDesign" name="timeDesign" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '<div class="col-md-12" style="margin: 3px 0;">'
        + '<label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '<div class="col-md-8">'
        + '<label class="col-md-4 control-label text-right" for="xxx">ประกวดราคา</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="timeBid" name="timeBid" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '<div class="col-md-12" style="margin: 3px 0;">'
        + '<label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '<div class="col-md-8">'
        + '<label class="col-md-4 control-label text-right" for="xxx">เซ็นสัญญา</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="timeContract" name="timeContract" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '<div class="col-md-12" style="margin: 3px 0;">'
        + '<label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '<div class="col-md-8">'
        + '<label class="col-md-4 control-label text-right" for="xxx">ระยะเวลาการดำเนินการ</label>'
        + '<div class="col-md-8">'
        + '<input type="text" id="timeOperate" name="timeOperate" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>'

        + '<div class="col-md-12 text-right">'
        + '<button type="button" class="btn btn-success save"><i class="fa fa-save"></i> บันทึก</button>&nbsp;'
        + '<button type="button" class="btn btn-default"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
        + '</div>'
        + '</form>'

        + '<div class="col-md-12">'
        + '<p class="control-label"><b>หมายเหตุ </b>แผนการดำเนินงานในแต่ละรายการจะต้องกำหนดระยะเวลาให้ต่อเนื่องกันและเซ็นสัญญาภายในไตรมาศที่ 1 (ตุลาคม-ธันวาคม)</p>'
        + '</div>'

        + '<div id="panelForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + '</div>'
        + '<div class="modal-body">'
        + '<form id="formModal" onsubmit="return false;">'

        + '<div class="form-group">'
        + '<label class="col-md-12 control-label req" for="floorDesc">รายการ</label>'
        + '<div class="col-md-12">'
        + '<input type="text" id="floorDesc" name="floorDesc" class="form-control input-sm" required>'
        + '</div>'
        + '</div>'

        + '<div class="form-group">'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label req">หน่วย</label>'
        + '      <div class="col-md-12">'
        + '         <input type="text" id="unit" name="unit" class="form-control input-sm" required>'
        + '     </div>'
        + '  </div>'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label req" for="quantity">จำนวน</label>'
        + '      <div class="col-md-12">'
        + '         <input type="number" min="0" id="quantity" name="quantity" class="form-control input-sm" required onKeyUp="keyPressedOne(this)">'
        + '     </div>'
        + '  </div>'
        + '</div>'

        + '<div class="form-group">'
        + '  <label class="col-md-12 control-label"><b>ราคาวัสดุสิ่งของ</b></label>'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label req" for="matUnit">ราคาต่อหน่วย</label>'
        + '      <div class="col-md-12">'
        + '         <input type="number" min="0" id="matUnit" name="matUnit" class="form-control input-sm" required onKeyUp="keyPressedOne(this)">'
        + '     </div>'
        + '  </div>'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label" for="matTotal">จำนวนเงิน</label>'
        + '      <div class="col-md-12">'
        + '         <input type="text" id="matTotal" name="matTotal" class="form-control input-sm" required disabled>'
        + '     </div>'
        + '  </div>'
        + '</div>'

        + '<div class="form-group">'
        + '  <label class="col-md-12 control-label"><b>ค่าแรงงาน</b></label>'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label req" for="wegUnit">ราคาต่อหน่วย</label>'
        + '      <div class="col-md-12">'
        + '         <input type="number" min="0" id="wegUnit" name="wegUnit" class="form-control input-sm" required onKeyUp="keyPressedOne(this)">'
        + '     </div>'
        + '  </div>'
        + '  <div class="col-md-6">'
        + '      <label class="col-md-12 control-label" for="wegTotal">จำนวนเงิน</label>'
        + '      <div class="col-md-12">'
        + '         <input type="text" id="wegTotal" name="wegTotal" class="form-control input-sm" required disabled>'
        + '     </div>'
        + '  </div>'
        + '</div>'

        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer">'
        + '<button type="button" class="btn btn-success save-modal" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก</button>'
        + '<button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");
    buildingOneAction();
}

function buildingOneAction() {

    $("button.save").unbind("click").click(function () {
        var fParam = {};
        $("#form input, #form textarea").each(function () {
            var name = $(this).attr("name");
            var val = $(this).val();
            fParam[name] = val;
        });
        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({building: fdata, buildingDetail: listBuildingArr});
        var dataJSONEN = encodeURIComponent(dataJSON);
        buildingOneInsert(dataJSONEN);
    });

    // property building
    $("button.add").unbind("click").click(function () {
        //insert data in modal form
        $("#formModal").trigger('reset');
        $("#panelForm").modal("show");

        $("button.save-modal").unbind("click").click(function () {

            var fParam = {};
            var html = '<tr>';
            var total = 0;
            $("#panelForm input").each(function () {
                var name = $(this).attr("name");
                var val = $(this).val();
                fParam[name] = val;
                html += '<td>' + val + '</td>';
            });
            listBuildingArr.push(fParam);
            html += '<td>รวม</td>';
            html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i></button>';
            html += '<button type="button" class="btn btn-default delete-btn"><i class="fa fa-trash"></i></button></td></tr>';

            $("#buildTbody").append(html);

            toolsEvent();
        });
        //button.add
    });

}

function toolsEvent() {

    $("button.edit-btn").unbind("click").click(function () {
        //edit button modal
        var rowIndex = $(this).closest('tr').index();
        $("#panelForm").modal("show");

        $("#panelForm input").each(function () {
            var name = $(this).attr("name");
            var val = listBuildingArr[rowIndex][name];
            $(this).val(val);
        });

        $("button.save-modal").unbind("click").click(function () {
            var fParam = {};
            var edit_row = '';
            $("#panelForm input").each(function () {
                var name = $(this).attr("name");
                var val = $(this).val();
                fParam[name] = val;
                edit_row += '<td>' + val + '</td>';
            });
            edit_row += '<td>รวม</td>';
            edit_row += '<td class="text-center"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i></button>';
            edit_row += '<button type="button" class="btn btn-default delete-btn"><i class="fa fa-trash"></i></button></td>';
            listBuildingArr[rowIndex] = fParam; //replace array
            $("#buildTbody tr:eq(" + rowIndex + ")").html(edit_row);

            toolsEvent(); //add event new

        });
        //end edit button event
    });

    $("button.delete-btn").unbind("click").click(function () {
        //delete button modal
        var respond = confirm("ต้องการลบใช่ไหม ?");
        if (respond == true) {
            var rowIndex = $(this).closest('tr').index();
            listBuildingArr.splice(rowIndex, 1);
            $(this).closest('tr').remove();
        } else {

        }
    });

}


function buildingOneInsert(dataJSONEN) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBuilding", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            console.log(datas);
        }

    }, 500);
}

function keyPressedOne(obj) {

    var quantity = parseFloat($("#quantity").val());
    var name = $(obj).attr("name");

    if (name == "matUnit") {
        var total = parseFloat($(obj).val()) * quantity;
        if (isNaN(total)) total = 0;
        $("#matTotal").val(total);

    } else if (name == "wegUnit") {
        var total = parseFloat($(obj).val()) * quantity;
        if (isNaN(total)) total = 0;
        $("#wegTotal").val(total);
    } else if (name == "quantity") {
        var totalWeg = parseFloat($("#wegUnit").val()) * quantity;
        var totalMat = parseFloat($("#matUnit").val()) * quantity;
        if (isNaN(totalWeg)) totalWeg = 0;
        if (isNaN(totalMat)) totalMat = 0;
        $("#wegTotal").val(totalWeg);
        $("#matTotal").val(totalMat);
    }

}