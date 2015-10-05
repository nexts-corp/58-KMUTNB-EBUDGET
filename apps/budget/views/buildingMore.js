var listBuildingMoreArr = [];

function buildingMoreForm(param) {

    var html = '<div class="col-md-12 text-center">'
        + '<h4>'
        + ' คำชี้แจงรายละเอียดรายการที่ดินและสิ่งก่อสร้าง'
        + '</h4>'
        + '</div>'

        + '<form id="form" onsubmit="return false">'
        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">แผนงาน</label>'
        + '         <div class="col-md-8">'
        + '             <input type="text" id="plan" name="plan"  value="' + planArr[param["planId"]] + '" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">ผลผลิต</label>'
        + '     <div class="col-md-8">'
        + '         <input type="text" id="product" name="product" class="form-control input-sm" required>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">รายการ</label>'
        + '     <div class="col-md-8">'
        + '         <input type="text" id="name" name="name" class="form-control input-sm" required>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">สถานที่ดำเนินการ</label>'
        + '     <div class="col-md-8">'
        + '         <input type="text" id="place" name="place" class="form-control input-sm" required>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">หลักการและเหตุผล</label>'
        + '     <div class="col-md-8">'
        + '         <textarea rows="5" id="rationale" name="rationale" class="form-control input-sm" required>'
        + '         </textarea>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">วัตถุประสงค์</label>'
        + '     <div class="col-md-8">'
        + '         <textarea rows="3"  id="objective" name="objective" class="form-control input-sm"></textarea>'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">งบประมาณทั้งสิ้น</label>'
        + '     <div class="col-md-8">'
        + '         <input type="text" id="costTotal" name="costTotal" class="form-control input-sm">'
        + '     </div>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <label class="col-md-4 control-label text-right" for="xxx">เป้าหมายของโครงการ</label>'
        + '     <div class="col-md-8">'
        + '         <textarea type="text" id="goal" name="goal" class="form-control input-sm"></textarea>'
        + '     </div>'
        + ' </div>'
        + '</div>'

            //+ '<div class="form-group">'
            //+ ' <div class="col-md-12">'
            //+ '     <label class="col-md-4 control-label text-right" for="xxx">ลักษณะการก่อสร้าง ปรับปรุง ขนาด และประมาณราคา</label>'
            //+ '     <div class="col-md-8 text-right">'
            //+ '         <button type="button" class="btn btn-success add" style="margin-bottom: 5px;"><i class="fa fa-plus-circle"></i> เพิ่ม</button>'
            //+ '     </div>'
            //+ ' </div>'
            //+ '<div class="col-md-12">'
            //+ ' <table id="table" class="table table-bordered table-striped table-condensed mb-none">'
            //+ ' <thead>'
            //+ '     <tr>'
            //+ '         <th class="col-md-4 text-center">กิจกรรม/ดำเนินงาน</th>'
            //+ '         <th class="col-md-2 text-center" >ขนาด/ปริมาณ</th>'
            //+ '         <th class="col-md-2 text-center">ราคาต่อหน่วย</th>'
            //+ '         <th class="col-md-2 text-center">เงิน</th>'
            //+ '         <th class="col-md-2 text-center">เครื่องมือ</th>'
            //+ '     </tr>'
            //+ ' </thead>'
            //+ ' <tbody id="buildTbody">'
            //
            //+ ' </tbody>'
            //+ ' <tfoot id="buildTfoot">'
            //+ '     <tr>'
            //+ '         <td class="text-center">รวม</td>'
            //+ '         <td class="text-center"></td>'
            //+ '         <td class="text-center"></td>'
            //+ '         <td class="text-center"></td>'
            //+ '         <td class="text-center"></td>'
            //+ '     </tr>'
            //+ ' </tfoot>'
            //+ '</table>'
            //+ '</div>'
            //+ '</div>'

        + '<div class="form-group col-md-12">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>พื้นที่ใช้สอยอาคาร ประกอบด้วย</b></label>'
        + '     </div>'
        + ' </div>'
        + '<div class="col-md-3 text-right"><button type="button" class="btn btn-success" style="margin-bottom: 5px;" onclick="addBuildingDetailHtml()"><i class="fa fa-plus-circle"></i> เพิ่ม</button></div>'
        + '</div>'

        + '<div id="buildNo7Warpper" class="form-group">'

        + '<div id="floor0" class="form-group">'
        + ' <div class="form-group">'
        + '     <label class="col-md-3 text-right">ชั้นที่</label>'
        + '     <div class="col-md-3"><input type="text" class="form-control input-sm" name="floorNo"></div>'
        + '     <label class="col-md-1 text-center">พื้นที่</label>'
        + '     <div class="col-md-3"><input type="number" min="0" class="form-control input-sm" name="area" onKeyUp="keyPressed(this)"></div>'
        + '     <label class="col-md-2 text-left">ตรม.</label>'
        + ' </div>'

        + ' <div class="form-group">'
        + '     <label class="col-md-3 text-right">- </label>'
        + '     <div class="col-md-7"><textarea type="text" rows="3" class="form-control input-sm" placeholder="ใส่คำอธิบาย" name="floorDesc"></textarea></div>'
        + '     <label class="col-md-2 text-left">ตรม.</label>'
        + ' </div>'
        + '</div>'
        + '</div>'

        + ' <div class = "col-md-12 form-group"><label class="col-md-5 text-right"><b>รวมพื้นที่</b></label><div class="col-md-3"><input type="number" disabled id = "totalArea" name="totalArea" class="form-control input-sm"></div><label class="col-md-4 text-left"><b>ตรม.</b></label></div>'

        + '<div id="budgetBuilding" class="form-group">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>งบประมาณก่อสร้างอาคาร</b></label>'
        + '     </div>'
        + ' </div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานสถาปัตยกรรม</label><div class="col-md-3"><input type="number" min="0" id = "costAchitec" name="costAchitec" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานวิศวกรรมโครงสร้าง</label><div class="col-md-3"><input type="number" min="0" id = "costStruct" name="costStruct" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานวิศวกรรมไฟฟ้าและสื่อสาร</label><div class="col-md-3"><input type="number" min="0" id = "costElec" name="costElec" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานวิศวกรรมสุขาภิบาลและดับเพลิง</label><div class="col-md-3"><input type="number" min="0" id = "costSanit" name="costSanit" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานวิศวกรรมระบบปรับอากาศและระบายอากาศ</label><div class="col-md-3"><input type="number" min="0" id = "none" name="none" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานลิฟต์โดยสาร</label><div class="col-md-3"><input type="number" min="0" id = "costElev" name="costElev" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right"><b>รวมราคาก่อสร้าง</b></label><div class="col-md-3"><input min="0" disabled id = "costTotal" name="costTotal" class="form-control input-sm"></div><label class="col-md-4 text-left"><b>บาท</b></label></div>'
        + '</div>'

        + '<div id="installment" class="form-group" style="padding-left: 5%;padding-right: 5%">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>การแบ่งตามงวดงาน</b></label>'
        + '     </div>'
        + ' </div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-2">ปีงบประมาณ</label><div class="col-md-2"><input type="number" min="0" id="ph1BudgetYear" name="ph1BudgetYear" class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" id="ph1BudgetWork" name="ph1BudgetWork" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1">งวดงาน</label><div class="col-md-2"><input type="number" id="ph1BudgetAmount" name="ph1BudgetAmount" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1 text-left">บาท</label></div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-2">ปีงบประมาณ</label><div class="col-md-2"><input type="number" min="0" id="ph2BudgetYear" name="ph2BudgetYear" class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" id="ph2BudgetWork" name="ph2BudgetWork" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1">งวดงาน</label><div class="col-md-2"><input type="number" id="ph2BudgetAmount" name="ph2BudgetAmount" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1 text-left">บาท</label></div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-2">ปีงบประมาณ</label><div class="col-md-2"><input type="number" min="0" id="ph3BudgetYear" name="ph3BudgetYear" class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" id="ph3BudgetWork" name="ph3BudgetWork" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1">งวดงาน</label><div class="col-md-2"><input type="number" id="ph3BudgetAmount" name="ph3BudgetAmount" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-1 text-left">บาท</label></div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-5"><b>รวม</b></label><div class="col-md-2"><input type="number" id="totalWork" name="totalWork" class="form-control input-sm" disabled></div><label class="col-md-1"><b>งวดงาน</b></label><div class="col-md-2"><input type="number" id="totalAmount" name="totalAmount" class="form-control input-sm" disabled></div><label class="col-md-1 text-left"><b>บาท</b></label></div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>แผนการดำเนินการ</b></label>'
        + '     </div>'
        + ' </div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-4">ประกวดราคา</label><div class="col-md-4"><input type="text" name="timeBid" class="form-control input-sm"></div></div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-4">เซ็นสัญญา</label><div class="col-md-4"><input type="text" name="timeContract" class="form-control input-sm"></div></div>'
        + '<div class = "col-md-12 text-right form-group"><label class="col-md-4">ระยะเวลาดำเนินการ</label><div class="col-md-4"><input type="text" name="timeOperate" class="form-control input-sm"></div></div>'
        + '</div>'

        + '<div class="col-md-12 text-right">'
        + '<button type="button" class="btn btn-success save"><i class="fa fa-save"></i> บันทึก</button>&nbsp;'
        + '<button type="button" class="btn btn-default"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
        + '</div>'
        + '</form>'

        + '<div id="panelForm" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + ' <div class="modal-dialog">'
        + '     <div class="modal-content">'
        + '     <div class="modal-header">'
        + '         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '         <h4 class="modal-title" id="myModalLabel">คำของบประมาณ : <span id="modalHead"></span></h4>'
        + '     </div>'
        + ' <div class="modal-body">'
        + '     <form id="formModal" onsubmit="return false;">'
        + '     <div class="form-group">'
        + '         <label class="col-md-12 control-label req" for="activity">กิจกรรม/ดำเนินงาน</label>'
        + '     <div class="col-md-12">'
        + '         <input type="text" id="activity" name="activity" class="form-control input-sm" required>'
        + '     </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label req" for="amount">ขนาด/ปริมาณ</label>'
        + ' <div class="col-md-12">'
        + '     <input type="text" id="amount" name="amount" class="form-control input-sm" required>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label req" for="price">ราคาต่อหน่วย</label>'
        + ' <div class="col-md-12">'
        + '     <input type="text" id="price" name="price" class="form-control input-sm" required>'
        + ' </div>'
        + '</div>'

        + '<div class="form-group">'
        + ' <label class="col-md-12 control-label req" for="money">เงิน</label>'
        + ' <div class="col-md-12">'
        + '     <input type="text" id="money" name="money" class="form-control input-sm" required>'
        + ' </div>'
        + '</div>'

        + '</form>'
        + '</div>'
        + '<div id="loadingForm" class="col-md-12 text-center"></div>'
        + ' <div class="modal-footer">'
        + '     <button type="button" class="btn btn-success save" data-dismiss="modal"><i class="fa fa-save"></i> บันทึก</button>'
        + '     <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>'
        + ' </div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divForm").html(html);
    toggleShow("form");
    buildingMoreAction();
}

function buildingMoreAction() {

    $("button.save").unbind("click").click(function () {
        var fParam = {};
        var buildingNo7 = [];

        $("#form input, #form textarea").each(function () {
            var name = $(this).attr("name");
            var val = $(this).val();
            if (val != undefined && name != "floorNo" && name != "area" && name != "floorDesc") {
                fParam[name] = val;
            }
        });

        $("#buildNo7Warpper > div").each(function () {
            var div = $(this).attr("id");
            if (div != undefined) {
                div = "#" + div;
                var obj = {};
                $(div + " input, " + div + " textarea").each(function () {
                    var name = $(this).attr("name");
                    var value = $(this).val();
                    if (name == "floorNo" && value == "") return false;
                    obj[name] = value;
                });
                if (!isEmptyObject(obj)) {
                    buildingNo7.push(obj);
                }
            }
        });

        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({building: fdata, buildingDetail: buildingNo7});
        var dataJSONEN = encodeURIComponent(dataJSON);
        buildingMoreInsert(dataJSONEN);
    });

}

function buildingMoreInsert(dataJSONEN) {

    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBuilding", "post", dataJSONEN, "json");

        if (typeof datas !== "undefined" && datas !== null) {
            console.log(datas);
        }

    }, 500);
}

function keyPressed(obj) {

    var name = $(obj).attr('name');
    if (name == "area" || name == "removeArea") {
        //removeArea use for trigger when remove
        var totalArea = 0;
        $("#buildNo7Warpper input").each(function () {

            var name = $(this).attr('name');
            var val = parseFloat($(this).val());
            if (name == 'area' && !isNaN(val)) {
                totalArea += val;
            }
        });
        $("#totalArea").val("" + totalArea);

    } else if (name == "ph1BudgetWork" || name == "ph2BudgetWork" || name == "ph3BudgetWork") {

        var totoalBudgetWork = 0;
        $("#installment input").each(function () {
            var name = $(this).attr('name');
            var val = parseFloat($(this).val());
            if ((name == "ph1BudgetWork" || name == "ph2BudgetWork" || name == "ph3BudgetWork") && !isNaN(val)) {
                totoalBudgetWork += val;
            }
        });
        $("#totalWork").val("" + totoalBudgetWork);

    } else if (name == "ph1BudgetAmount" || name == "ph2BudgetAmount" || name == "ph3BudgetAmount") {

        var totoalBudgetAmount = 0;
        $("#installment input").each(function () {
            var name = $(this).attr('name');
            var val = parseFloat($(this).val());
            if ((name == "ph1BudgetAmount" || name == "ph2BudgetAmount" || name == "ph3BudgetAmount") && !isNaN(val)) {
                totoalBudgetAmount += val;
            }
        });
        $("#totalAmount").val("" + totoalBudgetAmount);
    }
    else {

        var totalBudgetBuilding = 0;
        $("#budgetBuilding input").each(function () {

            var name = $(this).attr('name');
            var val = parseFloat($(this).val());
            if (name != 'costTotal' && !isNaN(val)) {
                totalBudgetBuilding += val;
            } else if (name == 'costTotal') {
                $(this).val(totalBudgetBuilding);
            }
        });
    }
}


var divFloorID = 1;
function addBuildingDetailHtml() {

    var html = '';

    html += '<div id="floor' + divFloorID + '" class="form-group">';
    html += ' <div class="form-group">';
    html += '     <label class="col-md-3 text-right">ชั้นที่</label>';
    html += '     <div class="col-md-3"><input type="text" class="form-control input-sm" name="floorNo"></div>';
    html += '     <label class="col-md-1 text-center">พื้นที่</label>';
    html += '     <div class="col-md-3"><input type="number" min="0" class="form-control input-sm" name="area" onKeyUp="keyPressed(this)"></div>';
    html += '     <label class="col-md-2 text-left">ตรม.</label>';
    html += ' </div>';
    html += ' <div class="form-group">';
    html += '     <label class="col-md-3 text-right">- </label>';
    html += '     <div class="col-md-7"><textarea type="text" rows="3" class="form-control input-sm" placeholder="ใส่คำอธิบาย" name="floorDesc"></textarea></div>';
    html += '     <label class="col-md-1 text-left">ตรม.</label>';
    html += '     <button type="button" class="btn btn-default btRemoveBuildDetail" name="removeArea"><i class="fa fa-minus"></i> ลบ</button>';
    html += ' </div>';
    html += '</div>';

    $("#buildNo7Warpper").append(html);

    $("button.btRemoveBuildDetail").unbind("click").click(function () {
        $(this).parent().parent().remove().fadeOut(300);
        keyPressed(this);
    });

    divFloorID++;
}


var hasOwnProperty = Object.prototype.hasOwnProperty;
function isEmptyObject(obj) {

    // null and undefined are "empty"
    if (obj == null) return true;

    // Assume if it has a length property with a non-zero value
    // that that property is correct.
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Otherwise, does it have any properties of its own?
    // Note that this doesn't handle
    // toString and valueOf enumeration bugs in IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}

