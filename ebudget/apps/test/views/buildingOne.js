var listBOQ = [];
var listBuilding = [];
var STATUSFORM = "INSERT";
var listIDRemoveBOQOne = [];//id remove
var listIDRemoveBuildingOne = [];//id remove
var listCoordinates = [];// list latlng
var addStatusBOQOne = false, addStatusBuildOne = false;

function buildingOneForm(param) {
    clearAll();
    optionMap = "point"; //default
    optionMapUse = "point"; // use to DB
    linePathArr = []; //store latLng
    polyLineArray = []; //store object polyLine
    polygonArr = [];//store latLng
    polygonSimpleArr = [];//store object polygon
    CircleMap;
    coordinatesChange = false;
    canClickMap = true;
    markerArrayInfo = [];
    markerArrayForUse = [];

    var html = ''
        + ' <div class="col-md-12 text-center">'
        + '     <h4>'
        + '         คำชี้แจงรายละเอียดรายการก่อสร้าง และปรับปรุงสิ่งก่อสร้าง 1 ปี'
        + '     </h4>'
        + ' </div>'

        + '<form id="formBuildOne" onsubmit="return false">'
        + ' <input type="text" id="id" name="id" style="display: none;">'
        + ' <input type="text" id="typeId" name="typeId" value="1" style="display: none;">'
        + ' <input type="text" id="bg145Id" name="bg145Id" value="' + param["bg145Id"] + '" style="display: none;">'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">รายการ</label>'
        + '         <div class="col-md-8">'
        + '             <input type="text" id="name" name="name" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + ' </div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">สถานที่ดำเนินการ</label>'
        + '         <div class="col-md-8">'
        + '             <input type="text" id="place" name="place" class="form-control input-sm" required>'
        + '         </div>'
        + '     </div>'
        + ' </div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">เหตุผลความจำเป็น</label>'
        + '         <div class="col-md-8">'
        + '             <textarea id="rationale" name="rationale" class="form-control input-sm" required></textarea>'
        + '         </div>'
        + '     </div>'
        + '</div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">งบประมาณทั้งสิ้น</label>'
        + '         <div class="col-md-8">'
        + '             <input type="number" id="costTotal" name="costTotal" class="form-control input-sm">'
        + '         </div>'
        + '     </div>'
        + ' </div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">พื้นที่/ปริมาณงาน</label>'
        + '         <div class="col-md-8">'
        + '             <input type="text" id="area" name="area" class="form-control input-sm">'
        + '         </div>'
        + '     </div>'
        + '</div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-12">'
        + '         <label class="col-md-3 control-label text-right" for="xxx">ลักษณะภูมิศาสตร์บนแผนที่</label>'
        + '         <div class="col-md-3">'
        + '             <input type="text" id="geoType" name="geoType" readonly class="form-control input-sm">'
        + '         </div>'
        + '         <div class="col-md-3">'
        + '             <button id="viewMap" type="button" class="btn btn-primary" style="margin-bottom: 5px;">เรียกดู</button>'
        + '         </div>'
        + '         <div class="col-md-3 text-right">'
        + '             <button id="btn-map" type="button" class="btn btn-success" style="margin-bottom: 5px;"><i class="fa fa-plus-circle"></i> เพิ่ม/แก้ไขพิกัดภูมิศาสตร์</button>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-12">'
        + '         <table class="table table-bordered table-striped table-condensed mb-none">'
        + '             <thead>'
        + '                 <tr>'
        + '                      <th class="col-md-1 text-center">จุดที่</th>'
        + '                      <th class="col-md-3 text-center" >ละติจูด</th>'
        + '                      <th class="col-md-3 text-center">ลองจิจูด</th>'
        + '                </tr>'
        + '            </thead>'
        + '            <tbody id="mapTbody"></tbody>'
        + '          </table>'
        + '     </div>'
        + '</div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-12">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">ลักษณะการก่อสร้าง ปรับปรุง ขนาด และประมาณราคา</label>'
        + '         <div class="col-md-8 text-right">'
        + '             <button type="button" class="btn btn-success add-btn" style="margin-bottom: 5px;"><i class="fa fa-plus-circle"></i> เพิ่ม</button>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-12">'
        + '         <table id="table" class="table table-bordered table-striped table-condensed mb-none">'
        + '             <thead>'
        + '                 <tr>'
        + '                      <th class="col-md-4 text-center">กิจกรรม/ดำเนินงาน</th>'
        + '                      <th class="col-md-2 text-center" >ขนาด/ปริมาณ</th>'
        + '                      <th class="col-md-2 text-center">ราคาต่อหน่วย</th>'
        + '                      <th class="col-md-2 text-center">เงิน</th>'
        + '                      <th class="col-md-2 text-center">เครื่องมือ</th>'
        + '                </tr>'
        + '            </thead>'
        + '            <tbody id="buildTbody"></tbody>'
        + '            <tfoot id="buildTfoot">'
        + '                 <tr>'
        + '                     <td class="text-center">รวม</td>'
        + '                     <td class="text-center"></td>'
        + '                     <td class="text-center"></td>'
        + '                     <td class="text-center"></td>'
        + '                     <td class="text-center"></td>'
        + '                 </tr>'
        + '            </tfoot>'
        + '          </table>'
        + '     </div>'
        + '</div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-9">'
        + '         <div class="col-md-12" style="margin: 3px 0;">'
        + '             <label class="col-md-4 control-label text-right text-bold" for="xxx">แผนการดำเนินงาน</label>'
        + '         <div class="col-md-8">'
        + '             <label class="col-md-4 control-label text-right" for="xxx">ออกแบบ</label>'
        + '             <div class="col-md-8">'
        + '                 <input type="text" id="timeDesign" name="timeDesign" class="form-control input-sm" required>'
        + '             </div>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '         <div class="col-md-8">'
        + '             <label class="col-md-4 control-label text-right" for="xxx">ประกวดราคา</label>'
        + '             <div class="col-md-8">'
        + '                 <input type="text" id="timeBid" name="timeBid" class="form-control input-sm" required>'
        + '             </div>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '         <div class="col-md-8">'
        + '             <label class="col-md-4 control-label text-right" for="xxx">เซ็นสัญญา</label>'
        + '             <div class="col-md-8">'
        + '                 <input type="text" id="timeContract" name="timeContract" class="form-control input-sm" required>'
        + '             </div>'
        + '         </div>'
        + '     </div>'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"></label>'
        + '         <div class="col-md-8">'
        + '             <label class="col-md-4 control-label text-right" for="xxx">ระยะเวลาการดำเนินการ</label>'
        + '             <div class="col-md-8">'
        + '                 <input type="text" id="timeOperate" name="timeOperate" class="form-control input-sm" required>'
        + '             </div>'
        + '         </div>'
        + '      </div>'
        + '   </div>'
        + '</div>'

        + ' <div class="form-group">'
        + '     <div class="col-md-12">'
        + '         <div class="col-md-9"><label class="col-md-4 control-label text-right">แบบ BOQ</label></div>'
        + '         <div class="col-md-3 text-right">'
        + '             <button type="button" class="btn btn-success addBOQ" style="margin-bottom: 5px;"><i class="fa fa-plus-circle"></i> เพิ่ม</button>'
        + '         </div>'
        + '     </div>'
        + ' <div class="col-md-12">'
        + '     <table id="table" class="table table-bordered table-striped table-condensed mb-none">'
        + '         <thead>'
        + '             <tr>'
        + '                 <th rowspan="2" class="col-md-3 text-center" >รายการ</th>'
        + '                 <th colspan="2" class="col-md-2 text-center">ปริมาณ</th>'
        + '                 <th colspan="2" class="col-md-2 text-center">ค่าวัสดุ</th>'
        + '                 <th colspan="2" class="col-md-2 text-center">ค่าแรงงาน</th>'
        + '                 <th rowspan="2" class="col-md-2 text-center">รวม</th>'
        + '                 <th rowspan="2" class="col-md-3 text-center" >เครื่องมือ</th>'
        + '             </tr>'
        + '             <tr>'
        + '                 <th rowspan="1" class="col-md-1 text-center">จำนวน</th>'
        + '                 <th rowspan="1" class="col-md-1 text-center">หน่วย</th>'
        + '                 <th rowspan="1" class="col-md-1 text-center">หน่วยละ</th>'
        + '                 <th rowspan="1" class="col-md-1 text-center">จำนวนเงิน</th>'
        + '                 <th rowspan="1" class="col-md-1 text-center">หน่วยละ</th>'
        + '                 <th rowspan="1" class="col-md-1 text-center">จำนวนเงิน</th>'
        + '             </tr>'
        + '         </thead>'
        + '         <tbody id="BoqBody"></tbody>'
        + '         <tfoot id="Boqfoot">'
        + '             <tr>'
        + '                 <td class="text-center" colspan="3">รวม</td>'
        + '                 <td class="text-center"></td>'
        + '                 <td class="text-center"></td>'
        + '                 <td class="text-center"></td>'
        + '                 <td class="text-center"></td>'
        + '                 <td class="text-center"></td>'
        + '                 <td class="text-center"></td>'
        + '             </tr>'
        + '         </tfoot>'
        + '      </table>'
        + '   </div>'
        + '</div>'

        + ' <div class="col-md-12 text-right">'
        + '     <div id="showLoad" style="display: inline; visibility: hidden;"><i class="fa fa-spinner fa-spin"></i> Saving... </div>&nbsp;&nbsp;'
        + '     <button type="button" class="btn btn-success saveBuildOne"><i class="fa fa-save"></i> บันทึกคำชี้แจง</button>&nbsp;'
        + '     <button type="button" class="btn btn-default removeBuildOne"><i class="fa fa-trash"></i> ลบคำชี้แจง</button>'
        + ' </div>'
        + '</form>'

        + '<div class="col-md-12">'
        + ' <p class="control-label"><b>หมายเหตุ </b>แผนการดำเนินงานในแต่ละรายการจะต้องกำหนดระยะเวลาให้ต่อเนื่องกันและเซ็นสัญญาภายในไตรมาศที่ 1 (ตุลาคม-ธันวาคม)</p>'
        + '</div>';

    $("#divAttachment").html(html);
    $('#btnGroup button').addClass('active').not($("#point")).removeClass('active'); //active on button point

    if (PERMISSION == "DEPARTMENT") {
        $(".saveBuildOne").show();
        $(".removeBuildOne").show();

    } else {
        $(".saveBuildOne").hide();
        $(".removeBuildOne").hide();
    }

    $("#btn-map").unbind("click").click(function () {
        //click and show map
        clearAll();
        canClickMap = true;
        $("#modalMapFooter").show();
        if (optionMap == "point") $("#showInfo").html('<i class="fa fa-map-marker"> พิกัดภูมิศาสตร์</i>');
        $("#showInfo").show();
        $("#btnGroup").show();
        $("#modalMap").modal("show");

    });

    $("#viewMap").unbind("click").click(function () {
        clearAll();
        drawPolyOnMap();
        canClickMap = false;
        $("#modalMapFooter").hide();
        $("#showInfo").hide();
        $("#btnGroup").hide();
        $("#showInfoFotter").hide();
        $("#modalMap").modal("show");

    });

    $("#btnGroup #point,#line,#poly,#circle").click(function (e) {
        //function on modal map
        $('#btnGroup button').addClass('active').not(this).removeClass('active');
        optionMap = e.target.id; //id is option of map such point line
        clearAll();
        if (optionMap == "point") {
            //for btn point
            var html = '<i class="fa fa-map-marker"> พิกัดภูมิศาสตร์</i>';
            $("#showInfo").html(html);
            $("#showInfoFotter").html('');

        } else if (optionMap == "line") {
            //for btn line
            var html = '<div class="text-right" style="width: 100%;"><button type="button" class="btn btn-default clear"><i class="fa fa-trash-o"></i> ล้าง </button></div>';
            $("#showInfo").html(html);

            $(".clear").unbind("click").click(function () {
                $("#showInfoFotter").html('');
                clearAllMarker();
                clearAllLine();
            });

        } else if (optionMap == "poly") {
            //for btn poly
            var html = '<div class="text-right" style="width: 100%;"><button type="button" class="btn btn-primary add"> แสดงพื้นที่ </button>&nbsp;' +
                '<button type="button" class="btn btn-default clear"><i class="fa fa-trash-o"></i> ล้าง </button></div>';
            $("#showInfo").html(html);
            $("#showInfoFotter").html('');
            $(".add").unbind("click").click(function () {

                var polygon = new google.maps.Polygon({
                    paths: polygonArr,
                    strokeColor: '#0000FF',
                    strokeOpacity: 0.8,
                    strokeWeight: 3,
                    fillColor: '#0000FF',
                    fillOpacity: 0.35
                });
                polygon.setMap(map);
                polygonSimpleArr.push(polygon);

            });
            $(".clear").unbind("click").click(function () {
                clearAllMarker();
                clearAllPolygon();
            });

        } else if (optionMap == "circle") {
            //for btn circle
            $("#showInfoFotter").html('');
            var html = '<div style="width: 100%;"><input type="radio" class="input-md" name="circle"  value="center" checked="checked" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดกึ่งกลาง</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="circle" value="radius" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>รัศมี</label>&nbsp;<i class="fa fa-map-marker"></i>'
                + '&nbsp;&nbsp;<button type="button" class="btn btn-default pull-right clear"><i class="fa fa-trash-o"></i> ล้าง</button>&nbsp;&nbsp;<button type="button"  class="btn btn-primary pull-right showArea">แสดงพื้นที่</button>&nbsp;'
                + '</div>';

            $("#showInfo").html(html);
            $(".showArea").unbind("click").click(function () {

                if (CircleMap != undefined) CircleMap.setMap(null);
                if (markerArray[0] != undefined && markerArray[1] != undefined) {
                    var km = distance(markerArray[0].position.lat(), markerArray[0].position.lng(), markerArray[1].position.lat(), markerArray[1].position.lng(), "K");
                    CircleMap = new google.maps.Circle({
                        strokeColor: '#0000FF',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#0000FF',
                        fillOpacity: 0.35,
                        map: map,
                        center: markerArray[0].position,
                        radius: km * 1000
                    });
                }
            });

            $(".clear").unbind("click").click(function () {
                clearAllCircle();
            });
        }

    });

    $(".saveMap").unbind("click").click(function () {
        //btn save modal map
        coordinatesChange = true;

        var html = '';

        if (optionMap == "circle" && ((markerArray[0] == undefined || markerArray[0] == null) || (markerArray[1] == undefined || markerArray[1] == null))) {
            $("#showInfoFotter").show();
            $("#showInfoFotter").html("<b class='text-danger'>กรุณาเลือกจุดให้ครบก่อนบันทึก<b>");

        } else {
            listCoordinates = [];
            markerArrayForUse = markerArray;
            optionMapUse = optionMap;
            for (var i = 0; i < markerArray.length; i++) {

                if (markerArray[i] != null && markerArray[i] != undefined) {

                    html += '<tr><td class="text-center">จุดที่ ' + (i + 1) + '</td>';
                    html += '<td>' + markerArray[i].position.lat() + '</td>';
                    html += '<td>' + markerArray[i].position.lng() + '</td>';
                    html += '</tr>';
                    var obj = {};
                    obj.latitude = markerArray[i].position.lat();
                    obj.longitude = markerArray[i].position.lng();
                    listCoordinates.push(obj);
                }
            }

            $("#mapTbody").html(html);
            $("#geoType").val(hashMaptype[optionMap]);
            $("#modalMap").modal("hide");
        }
    });

    showView(param);
    toggleShow("attachment");
    buildingOneAction();
    if (PERMISSION != "DEPARTMENT") disableOneEdit();
}

function showView(param) {

    listBOQ = [];//reset
    listBuilding = [] //reset
    listIDRemoveBOQOne = [];//reset
    listIDRemoveBuildingOne = [];//reset
    listCoordinates = []; //reset

    var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBuildingOne", "post", {
        bg145Id: param["bg145Id"],
        type: 1
    }, "json");

    if (datas["budget"].length > 0) { //is not empty array

        STATUSFORM = "EDIT";
        $(".removeBuildOne").show();
        datas["budget"].forEach(function (objBudget) {

            $("#formBuildOne input, #formBuildOne textarea").each(function () {
                var name = $(this).attr("name");
                if (name != "plan" && name != "product")$(this).val(objBudget[name]);
                if (name == "geoType") {
                    var valTypeMap = objBudget[name];
                    $(this).val(hashMaptype[valTypeMap]);
                    optionMapUse = valTypeMap;
                }
            });

            for (var i = 0; i < objBudget["listBOQ"].length; i++) {
                var obj = objBudget["listBOQ"][i];
                var html = '<tr>';
                var total = parseFloat(obj.materialTotal) + parseFloat(obj.wageTotal);
                html += '<td>' + obj.name + '</td>';
                html += '<td class="number">' + obj.quantity + '</td>';
                html += '<td>' + obj.unit + '</td>';
                html += '<td class="number">' + obj.materialUnit + '</td>';
                html += '<td class="number">' + obj.materialTotal + '</td>';
                html += '<td class="number">' + obj.wageUnit + '</td>';
                html += '<td class="number">' + obj.wageTotal + '</td>';
                html += '<td class="number">' + total + '</td>';
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btnBOQ"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btnBOQ"><i class="fa fa-trash"></i></button></td>';
                html += '</tr>';
                $('#BoqBody').prepend(html);
                $('.number').number(true, 2);
                obj["costTotal"] = total; //in db not have
                listBOQ.push(obj)
            }

            for (var i = 0; i < objBudget["listDetail"].length; i++) {
                var obj = objBudget["listDetail"][i];
                var html = '<tr>';
                html += '<td>' + obj.desc + '</td>';
                html += '<td class="number">' + obj.quantity + '</td>';
                html += '<td class="number">' + obj.costUnit + '</td>';
                html += '<td class="number">' + obj.costTotal + '</td>';
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btn"><i class="fa fa-trash"></i></button></td>';
                html += '</tr>';
                $('#buildTbody').prepend(html);
                $('.number').number(true, 2);
                listBuilding.push(obj)
            }

            for (var i = 0; i < objBudget["listCoordinates"].length; i++) {
                var obj = objBudget["listCoordinates"][i];
                var html = '<tr>';
                html += '<td class="text-center">จุดที่ ' + (i + 1) + '</td>';
                html += '<td>' + obj.latitude + '</td>';
                html += '<td>' + obj.longitude + '</td>';
                html += '</tr>';
                $('#mapTbody').append(html);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(obj.latitude, obj.longitude),
                    title: 'Marker'
                });
                listCoordinates.push(obj);
                markerArrayForUse.push(marker);
            }
            drawPolyOnMap();

            toolsEvent();
        });

    } else {

        STATUSFORM = "INSERT";
        $(".removeBuildOne").hide();
    }
}

function buildingOneAction() {

    $("button.saveBuildOne").unbind("click").click(function () {
        var fParam = {};
        $("#formBuildOne input, #formBuildOne textarea").each(function () {
            var name = $(this).attr("name");
            var val = $(this).val();
            fParam[name] = val;
        });
        fParam["geoType"] = optionMapUse;
        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({
            building: fdata,
            listBOQ: listBOQ,
            listBuildDetail: listBuilding,
            listIDRemoveBOQ: listIDRemoveBOQOne,
            listIDRemoveBuildingOne: listIDRemoveBuildingOne,
            listCoordinates: listCoordinates,
            coordinatesChange: coordinatesChange
        });

        var dataJSONEN = encodeURIComponent(dataJSON);
        if (STATUSFORM == "INSERT") {
            buildingOneInsert(dataJSONEN);
        } else if (STATUSFORM == "EDIT") {
            buildingOneEdit(dataJSONEN);
        }
    }); //Insert TO DB service

    $("button.removeBuildOne").unbind("click").click(function () {
        var fParam = {};
        fParam["id"] = $("#id").val();
        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({
            building: fdata
        });

        var dataJSONEN = encodeURIComponent(dataJSON);
        var r = confirm("ต้องการลบคำชี้แจงใช่ไหม ?");
        if (r == true) {
            buildingOneRemove(dataJSONEN);
        }

    });

    $("button.addBOQ").unbind("click").click(function () {

        if (!addStatusBOQOne) {

            addStatusBOQOne = true;
            var html = '<tr>' +
                '   <td><input type="text" class="form-control" id="name" name="name" ></td>' +
                '   <td><input type="number" class="form-control" min="0" id="quantity" name="quantity" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td><input type="text" class="form-control" id="unit" name="unit"></td>' +
                '   <td><input type="number" class="form-control" id="materialUnit" name="materialUnit" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="materialTotal" name="materialTotal"></label></td>' +
                '   <td><input type="number" class="form-control" id="wageUnit" name="wageUnit" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="wageTotal" name="wageTotal"></label></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBOQ" name="costTotal" ></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btnBOQ" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btnBOQ"><i class="fa fa-close" title="ยกเลิก"></i></button></td>' +
                '</tr>';

            $("#BoqBody").prepend(html);

            $(".save-btnBOQ").unbind("click").click(function () {
                var fVal = {};
                var html = '';
                $("#BoqBody input,#BoqBody label").each(function () {
                    var name = $(this).attr("name");
                    var val;
                    if (name != "materialTotal" && name != "wageTotal" && name != "costTotal") {
                        val = $(this).val();
                    } else {
                        val = $(this).html();
                    }
                    fVal[name] = val;
                    if (name != "unit" && name != "name") {
                        html += '<td class="number">' + fVal[name] + '</td>';
                    } else {
                        html += '<td>' + fVal[name] + '</td>';
                    }
                });
                listBOQ.push(fVal);
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btnBOQ"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btnBOQ"><i class="fa fa-trash"></i></button></td>';
                addStatusBOQOne = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEvent();
            });

            $(".cancel-btnBOQ").unbind("click").click(function () {
                addStatusBOQOne = false;
                $(this).closest("tr").remove();
            });
            //button.add
        } else {
            $("#floorDesc").focus(); //focus to row add
        }
    });

    $("button.add-btn").unbind("click").click(function () {

        if (!addStatusBuildOne) {
            console.log("add");
            addStatusBuildOne = true;
            var html = '<tr>' +
                '   <td><input type="text" class="form-control" id="desc" name="desc"></td>' +
                '   <td><input type="number" min = "0" class="form-control" min="0" id="quantity" name="quantity" onKeyUp="keyPressedBuilding(this)"></td>' +
                '   <td><input type="number" min = "0" class="form-control" id="costUnit" name="costUnit" onKeyUp="keyPressedBuilding(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBuild" name="costTotal"></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btn" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btn"><i class="fa fa-close" title="ยกเลิก"></i></button></td></tr>' +
                '</tr>';

            $("#buildTbody").prepend(html);

            $(".save-btn").unbind("click").click(function () {

                var fVal = {};
                var html = '';
                $("#buildTbody input,#buildTbody label").each(function () {
                    var name = $(this).attr("name");
                    var val;
                    if (name != "costTotal") {
                        val = $(this).val();
                    } else {
                        val = $(this).html();
                    }
                    fVal[name] = val;
                    if (name != "desc") {
                        html += '<td class="number">' + fVal[name] + '</td>';
                    } else {
                        html += '<td>' + fVal[name] + '</td>';
                    }
                });

                listBuilding.push(fVal);
                console.log(listBuilding);
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btn"><i class="fa fa-trash"></i></button></td>';
                addStatusBuildOne = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEvent();
            });

            $(".cancel-btn").unbind("click").click(function () {
                addStatusBuildOne = false;
                $(this).closest("tr").remove();
            });
            //button.add
        } else {
            $("#activity").focus();
        }
    });
}
function toolsEvent() {

    $("button.edit-btnBOQ").unbind("click").click(function () {
        if (!addStatusBOQOne) {
            //edit button modal
            addStatusBOQOne = true;
            var oldHtml = $(this).closest('tr').html();
            var row = $(this).closest('tr');
            var rowIndex = row.index();

            var html = '' +
                '   <td><input type="text" class="form-control" id="name" name="name" ></td>' +
                '   <td><input type="number" class="form-control" min="0" id="quantity" name="quantity" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td><input type="text" class="form-control" id="unit" name="unit"></td>' +
                '   <td><input type="number" class="form-control" id="materialUnit" name="materialUnit" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="materialTotal" name="materialTotal"></label></td>' +
                '   <td><input type="number" class="form-control" id="wageUnit" name="wageUnit" onKeyUp="keyPressedOne(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="wageTotal" name="wageTotal"></label></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBOQ" name="costTotal" ></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btnBOQ" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btnBOQ"><i class="fa fa-close" title="ยกเลิก"></i></button></td></tr>';

            row.html(html);
            var index;
            $("td input, td label", row).each(function () {
                var name = $(this).attr("name");
                index = (listBOQ.length - 1) - rowIndex;
                var val = listBOQ[index][name];
                if (name != "materialTotal" && name != "wageTotal" && name != "costTotal") {
                    $(this).val(val);
                } else {
                    $(this).html(val);
                }
            });


            $(".save-btnBOQ").unbind("click").click(function () {
                var fVal = listBOQ[index];
                var html = '';
                $("#BoqBody input,#BoqBody label").each(function () {
                    var name = $(this).attr("name");
                    var val;
                    if (name != "materialTotal" && name != "wageTotal" && name != "costTotal") {
                        val = $(this).val();
                    } else {
                        val = $(this).html();
                    }
                    fVal[name] = val;
                    if (name != "unit" && name != "name") {
                        html += '<td class="number">' + fVal[name] + '</td>';
                    } else {
                        html += '<td>' + fVal[name] + '</td>';
                    }
                });

                listBOQ[index] = fVal;

                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btnBOQ"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btnBOQ"><i class="fa fa-trash"></i></button></td>';
                addStatusBOQOne = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEvent();
            });

            $(".cancel-btnBOQ").unbind("click").click(function () {
                addStatusBOQOne = false;
                $(this).closest("tr").html(oldHtml);
                toolsEvent();
            });
        } else {
            $("#floorDesc").focus(); //focus to row add
        }

    }); //Edit BOQ

    $("button.delete-btnBOQ").unbind("click").click(function () {
        if (!addStatusBOQOne) {
            var respond = confirm("ต้องการลบใช่ไหม ?");
            if (respond == true) {
                var rowIndex = (listBOQ.length - 1) - $(this).closest('tr').index();
                if (listBOQ[rowIndex]["id"] != undefined) {
                    listIDRemoveBOQOne.push(listBOQ[rowIndex]["id"]);
                }
                listBOQ.splice(rowIndex, 1);
                $(this).closest('tr').remove();
            }
        } else {
            $("#floorDesc").focus(); //focus to row add
        }
    });

    $("button.edit-btn").unbind("click").click(function () {
        //edit button
        if (!addStatusBuildOne) {
            addStatusBuildOne = true;
            var oldHtml = $(this).closest('tr').html();
            var row = $(this).closest('tr');
            var rowIndex = row.index();

            var html = '' +
                '   <td><input type="text" class="form-control" id="desc" name="desc"></td>' +
                '   <td><input type="number" min = "0" class="form-control"  id="quantity" name="quantity" onKeyUp="keyPressedBuilding(this)"></td>' +
                '   <td><input type="number" min = "0" class="form-control" id="costUnit" name="costUnit" onKeyUp="keyPressedBuilding(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBuild" name="costTotal"></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btn" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btn"><i class="fa fa-close" title="ยกเลิก"></i></button></td></tr>';

            row.html(html);
            var index;
            $("td input, td label", row).each(function () {
                var name = $(this).attr("name");
                index = (listBuilding.length - 1) - (rowIndex);
                var val = listBuilding[index][name];
                if (name != "costTotal") {
                    $(this).val(val);
                } else {
                    $(this).html(val);
                }
            });

            $(".save-btn").unbind("click").click(function () {
                var fVal = listBuilding[index];
                var html = '';
                var total = 0;
                $("#buildTbody input,#buildTbody label").each(function () {
                    var name = $(this).attr("name");
                    var val;
                    if (name != "costTotal") {
                        val = $(this).val();
                    } else {
                        val = $(this).html();
                    }
                    fVal[name] = val;
                    if (name != "desc") {
                        html += '<td class="number">' + fVal[name] + '</td>';
                    } else {
                        html += '<td>' + fVal[name] + '</td>';
                    }
                });

                listBuilding[index] = fVal;
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btn"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btn"><i class="fa fa-trash"></i></button></td>';
                addStatusBuildOne = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEvent();
            });

            $(".cancel-btn").unbind("click").click(function () {
                addStatusBuildOne = false;
                $(this).closest("tr").html(oldHtml);
                toolsEvent();
            });
        } else {
            $("#activity").focus();
        }
    });

    $("button.delete-btn").unbind("click").click(function () {
        if (!addStatusBuildOne) {
            var respond = confirm("ต้องการลบใช่ไหม ?");
            if (respond == true) {
                var rowIndex = (listBuilding.length - 1) - $(this).closest('tr').index();
                if (listBuilding[rowIndex]["id"] != undefined) {
                    listIDRemoveBuildingOne.push(listBuilding[rowIndex]["id"]);
                }
                listBuilding.splice(rowIndex, 1);
                $(this).closest('tr').remove();
            }
        } else {
            $("#activity").focus();
        }
    });
}
function buildingOneInsert(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBuildingOne", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas['results']['result'] == true) {
                alert("บันทึกสำเร็จ");
                toggleShow("form"); // backHome
            } else {
                alert("บันทึกไม่สำเร็จ");
            }
        }
        $("#showLoad").css("visibility", "hidden");
    }, 500);
}
function buildingOneEdit(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/editBuildingOne", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas['results']['result'] == true) {
                alert("แก้ไขสำเร็จ");
                toggleShow("form"); // backHome
            } else {
                alert("แก้ไขไม่สำเร็จ");
            }
        }
        $("#showLoad").css("visibility", "hidden");
    }, 500);
}

function buildingOneRemove(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/removeBuildingOne", "post", dataJSONEN, "json");
        if (typeof datas !== "undefined" && datas !== null) {
            if (datas['results']['result'] == true) {
                alert("ลบสำเร็จ");
                toggleShow("form"); // backHome
            } else {
                alert("ลบไม่สำเร็จ");
            }
        }
        $("#showLoad").css("visibility", "hidden");
    }, 500);
}
function keyPressedOne(obj) {

    var quantity = parseFloat($("#quantity").val());
    var name = $(obj).attr("name");
    var totalMat = 0, totalWeg = 0;
    if (name == "materialUnit") {
        totalMat = parseFloat($(obj).val()) * quantity;
        if (isNaN(totalMat)) totalMat = 0;
        $("#materialTotal").html(totalMat);

    } else if (name == "wageUnit") {
        totalWeg = parseFloat($(obj).val()) * quantity;
        if (isNaN(totalWeg)) totalWeg = 0;
        $("#wageTotal").html(totalWeg);
    } else if (name == "quantity") {
        totalWeg = parseFloat($("#wageUnit").val()) * quantity;
        totalMat = parseFloat($("#materialUnit").val()) * quantity;
        if (isNaN(totalWeg)) totalWeg = 0;
        if (isNaN(totalMat)) totalMat = 0;
        $("#wageTotal").html(totalWeg);
        $("#materialTotal").html(totalMat);
    }

    $("#costTotalBOQ").html(parseFloat($("#wageTotal").html()) + parseFloat($("#materialTotal").html()));
}
function keyPressedBuilding(obj) {

    var name = $(obj).attr("name");
    var total = 0;
    if (name == "quantity") {
        total = parseFloat($(obj).val()) * parseFloat($("#costUnit").val());

    } else if (name == "costUnit") {
        total = parseFloat($(obj).val()) * parseFloat($("#quantity").val());
    }
    if (isNaN(total)) total = 0;

    $("#costTotalBuild").html(total);
}
function disableOneEdit() {

    $("#divAttachment #formBuildOne input,#divAttachment #formBuildOne textarea").each(function () {
        $(this).attr('readonly', '');
    });

    $(".addBOQ").hide();
    $(".edit-btnBOQ").hide();
    $(".delete-btnBOQ").hide();
    $(".add-btn").hide();
    $(".edit-btn").hide();
    $(".delete-btn").hide();
}






