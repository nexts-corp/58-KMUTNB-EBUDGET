var listBOQMoreArr = [];
var STATUSFORMMORE = "INSERT";
var listIDRemoveBOQMore = [];
var listIDRemoveFloor = [];
var listIDRemovePeriod = [];
var indexDivFloor = 0;
var buildingId;
var addStatusBOQMore = false;

function buildingMoreForm(param) {
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

    //+ '         <input type="text" id="product" name="product"  value="' + projectArr[param["projectId"]] + '" class="form-control input-sm" required>'
    var html = '<div class="col-md-12 text-center">'
        + '<h4>'
        + ' คำชี้แจงรายละเอียดรายการที่ดินและสิ่งก่อสร้าง'
        + '</h4>'
        + '</div>'

        + '<form id="formBuildMore" onsubmit="return false">'
        + ' <input type="text" id="id" name="id" style="display: none;">'
        + ' <input type="text" id="typeId" name="typeId" value="2" style="display: none;">'
        + ' <input type="text" id="bg145Id" name="bg145Id" value="' + param["bg145Id"] + '" style="display: none;">'

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
        + '         <input type="number" min="0" id="costTotalBuilding" name="costTotal" class="form-control input-sm">'
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

        + '<div class="form-group col-md-12">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>พื้นที่ใช้สอยอาคาร ประกอบด้วย</b></label>'
        + '     </div>'
        + ' </div>'
        + '<div class="col-md-3 text-right"><button type="button" id="addFloor" class="btn btn-success" style="margin-bottom: 5px;" onclick="addFloorPalnHtml({})"><i class="fa fa-plus-circle"></i> เพิ่ม</button></div>'
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
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานวิศวกรรมระบบปรับอากาศและระบายอากาศ</label><div class="col-md-3"><input type="number" min="0" id = "costVen" name="costVen" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right">งานลิฟต์โดยสาร</label><div class="col-md-3"><input type="number" min="0" id = "costElev" name="costElev" class="form-control input-sm" onKeyUp="keyPressed(this)"></div><label class="col-md-4 text-left">บาท</label></div>'
        + '<div class = "col-md-12 form-group"><label class="col-md-5 text-right"><b>รวมราคาก่อสร้าง</b></label><div class="col-md-3"><input min="0" disabled id = "totalBuilding" name="totalBuilding" class="form-control input-sm"></div><label class="col-md-4 text-left"><b>บาท</b></label></div>'
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
        + '         <tbody id="BoqBodyMore"></tbody>'
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

        + '<div id="installment" class="form-group" style="padding-left: 5%;padding-right: 5%">'
        + ' <div class="col-md-9">'
        + '     <div class="col-md-12" style="margin: 3px 0;">'
        + '         <label class="col-md-4 control-label text-right" for="xxx"><b>การแบ่งตามงวดงาน</b></label>'
        + '     </div>'
        + ' </div>'
        + ' <div class = "col-md-12 form-group">'
        + '   <label class="col-md-5 text-right">จำนวนปีงบประมาณ</label>'
        + '   <div class="col-md-3"><input class="form-control input-sm" type="number" min="0" id="totalYear" name="totalYear"></div>'
        + '   <button id="addPeriod" class="col-md-1 btn btn-default" type="button" onclick="addPeriodHTML({})">ตกลง</button>'
        + ' </div>'
        + ' <div class="inner-installment"></div>'
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
        + '   <div id="showLoad" style="display: inline; visibility: hidden;"><i class="fa fa-spinner fa-spin"></i> Saving... </div>&nbsp;&nbsp;'
        + '   <button id="saveBuildMore" type="button" class="btn btn-success saveBuildMore"><i class="fa fa-save"></i> บันทึกคำชี้แจง</button>&nbsp;'
        + '   <button id="clearBuildMore" type="button" class="btn btn-default removeBuildMore"><i class="fa fa-trash"></i> ลบคำชี้แจง</button>'
        + '</div>'
        + '</form>'
        + '</div>';

    $("#divAttachment").html(html);
    $('#btnGroup button').addClass('active').not($("#point")).removeClass('active'); //active on button point

    if (PERMISSION == "DEPARTMENT") {
        $(".saveBuildMore").show();
        $(".removeBuildMore").show();

    } else {
        $(".saveBuildMore").hide();
        $(".removeBuildMore").hide();
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

    showViewMore(param);
    toggleShow("attachment");
    buildingMoreAction();
    if (PERMISSION != "DEPARTMENT") disableMoreEdit();
}

function showViewMore(param) {

    listBOQMoreArr = [];//reset
    listIDRemoveBOQMore = [];
    listIDRemoveFloor = [];
    listIDRemovePeriod = [];
    indexDivFloor = 0;
    listCoordinates = []; //reset

    var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBuildingMore", "post", {
        bg145Id: param["bg145Id"],
        type: 2
    }, "json");

    if (datas["budget"].length > 0) { //is not empty array

        STATUSFORMMORE = "EDIT";
        $(".removeBuildMore").show();
        datas["budget"].forEach(function (objBudget) {

            $("#formBuildMore input, #formBuildMore textarea").each(function () {
                var name = $(this).attr("name");
                if (name != "plan" && name != "product")$(this).val(objBudget[name]);
                if (name == "geoType") {
                    var valTypeMap = objBudget[name];
                    $(this).val(hashMaptype[valTypeMap]);
                    optionMapUse = valTypeMap;
                }
            });
            buildingId = objBudget["id"];
            $('#costElev').keyup();
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
                $('#BoqBodyMore').prepend(html);
                $('.number').number(true, 2);
                obj["costTotal"] = total; //in db not have
                listBOQMoreArr.push(obj);
            }

            addPeriodHTML(objBudget["listPrid"]);

            for (var i = 0; i < objBudget["listflp"].length; i++) {
                var obj = objBudget["listflp"][i];
                if (i == 0)  $("#buildNo7Warpper").html('');//reset
                addFloorPalnHtml(obj);
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
            toolsEventMore();
        });

    } else {
        buildingId = -1;
        STATUSFORMMORE = "INSERT";
        $(".removeBuildMore").hide();
    }
}

function buildingMoreAction() {

    $(".saveBuildMore").unbind("click").click(function () {
        var fParam = {};
        var buildingNo7 = [];
        var periodArr = [];

        $("#formBuildMore input, #formBuildMore textarea").each(function () {
            var name = $(this).attr("name");
            var val = $(this).val();
            if (val != undefined && name != "floorNo" && name != "area" && name != "floorDesc") {
                fParam[name] = val;
            }
        });
        fParam["geoType"] = optionMapUse;
        fParam["costTotal"] = $("#costTotalBuilding").val();
        if (buildingId != -1) fParam["id"] = buildingId; // -1 = insert

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

        $("#installment .inner-installment > div").each(function () {
            var div = $(this).attr("id");
            if (div != undefined) {
                div = "#" + div;
                var obj = {};
                $(div + " input, " + div + " textarea").each(function () {
                    var name = $(this).attr("name");
                    var value = $(this).val();
                    obj[name] = value;
                });
                if (!isEmptyObject(obj)) {
                    periodArr.push(obj);
                }
            }
        });

        if (periodArr[0]["id"] != -1) {
            listIDRemovePeriod = [];
        } // not remove period

        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({
            building: fdata,
            listBOQ: listBOQMoreArr,
            listBuildFloor: buildingNo7,
            listBuildPeriod: periodArr,
            listIDRemoveBOQ: listIDRemoveBOQMore,
            listIDRemoveFloor: listIDRemoveFloor,
            listIDRemovePeriod: listIDRemovePeriod,
            listCoordinates: listCoordinates,
            coordinatesChange: coordinatesChange
        });

        var dataJSONEN = encodeURIComponent(dataJSON);
        if (STATUSFORMMORE == "INSERT") {
            buildingMoreInsert(dataJSONEN);
        } else if (STATUSFORMMORE == "EDIT") {
            buildingMoreEdit(dataJSONEN);
        }

    });//Insert TO Db

    $(".removeBuildMore").unbind("click").click(function () {
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
            buildingMoreRemove(dataJSONEN);
        }
        
    });


    $("button.addBOQ").unbind("click").click(function () {

        if (!addStatusBOQMore) {
            addStatusBOQMore = true;
            var html = '<tr>' +
                '   <td><input type="text" class="form-control" id="name" name="name" ></td>' +
                '   <td><input type="number" class="form-control" min="0" id="quantity" name="quantity" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td><input type="text" class="form-control" id="unit" name="unit"></td>' +
                '   <td><input type="number" class="form-control" id="materialUnit" name="materialUnit" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="materialTotal" name="materialTotal"></label></td>' +
                '   <td><input type="number" class="form-control" id="wageUnit" name="wageUnit" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="wageTotal" name="wageTotal"></label></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBOQMore" name="costTotal" ></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btnBOQ" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btnBOQ"><i class="fa fa-close" title="ยกเลิก"></i></button></td></tr>' +
                '</tr>';

            $("#BoqBodyMore").prepend(html);

            $(".save-btnBOQ").unbind("click").click(function () {
                var fVal = {};
                var html = '';

                $("#BoqBodyMore input,#BoqBodyMore label").each(function () {
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

                listBOQMoreArr.push(fVal);
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btnBOQ"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btnBOQ"><i class="fa fa-trash"></i></button></td>';
                addStatusBOQMore = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEventMore();
            });

            $(".cancel-btnBOQ").unbind("click").click(function () {
                addStatusBOQMore = false;
                $(this).closest('tr').remove();
            });
            //button.add
        } else {
            $("#floorDesc").focus();
        }
    });
}
function toolsEventMore() {

    $("button.edit-btnBOQ").unbind("click").click(function () {

        if (!addStatusBOQMore) {
            addStatusBOQMore = true;
            //edit button modal
            var oldHtml = $(this).closest('tr').html();
            var row = $(this).closest('tr');
            var rowIndex = row.index();

            var html = '' +
                '   <td><input type="text" class="form-control" id="name" name="name" ></td>' +
                '   <td><input type="number" class="form-control" min="0" id="quantity" name="quantity" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td><input type="text" class="form-control" id="unit" name="unit"></td>' +
                '   <td><input type="number" class="form-control" id="materialUnit" name="materialUnit" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="materialTotal" name="materialTotal"></label></td>' +
                '   <td><input type="number" class="form-control" id="wageUnit" name="wageUnit" onKeyUp="keyPressedMore(this)"></td>' +
                '   <td style="vertical-align: middle"><label id="wageTotal" name="wageTotal"></label></td>' +
                '   <td style="vertical-align: middle"><label id="costTotalBOQMore" name="costTotal" ></label></td>' +
                '   <td class="text-center"><button type="button" class="btn btn-success save-btnBOQ" title="บันทึก"><i class="fa fa-save"></i></button>' +
                '   <button type="button" class="btn btn-default cancel-btnBOQ"><i class="fa fa-close" title="ยกเลิก"></i></button></td></tr>';

            row.html(html);
            var index;
            $("td input, td label", row).each(function () {
                var name = $(this).attr("name");
                index = (listBOQMoreArr.length - 1) - rowIndex;
                var val = listBOQMoreArr[index][name];
                if (name != "materialTotal" && name != "wageTotal" && name != "costTotal") {
                    $(this).val(val);
                } else {
                    $(this).html(val);
                }
            });

            $(".save-btnBOQ").unbind("click").click(function () {
                var fVal = listBOQMoreArr[index];
                var html = '';
                var total = 0;
                $("#BoqBodyMore input,#BoqBodyMore label").each(function () {
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

                listBOQMoreArr[index] = fVal;
                html += '<td class="text-center"><button type="button" class="btn btn-warning edit-btnBOQ"><i class="fa fa-pencil"></i></button>';
                html += '<button type="button" class="btn btn-default delete-btnBOQ"><i class="fa fa-trash"></i></button></td>';
                addStatusBOQMore = false;
                $(this).closest("tr").html(html);
                $('.number').number(true, 2);
                toolsEventMore();
            });

            $(".cancel-btnBOQ").unbind("click").click(function () {
                addStatusBOQMore = false;
                $(this).closest("tr").html(oldHtml);
                toolsEventMore();
            });
        } else {
            $("#floorDesc").focus();
        }
    }); //Edit BOQ

    $("button.delete-btnBOQ").unbind("click").click(function () {
        if (!addStatusBOQMore) {
            //delete button modal
            var respond = confirm("ต้องการลบใช่ไหม ?");
            if (respond == true) {
                var rowIndex = (listBOQMoreArr.length - 1) - $(this).closest('tr').index();
                if (listBOQMoreArr[rowIndex]["id"] != undefined) {
                    listIDRemoveBOQMore.push(listBOQMoreArr[rowIndex]["id"]);
                }
                listBOQMoreArr.splice(rowIndex, 1);
                $(this).closest('tr').remove();
            }
        } else {
            $("#name").focus(); //focus to row add
        }
    });
}
function buildingMoreInsert(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/insertBuildingMore", "post", dataJSONEN, "json");

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
function buildingMoreEdit(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/editBuildingMore", "post", dataJSONEN, "json");
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
function buildingMoreRemove(dataJSONEN) {
    $("#showLoad").css("visibility", "visible");
    setTimeout(function () {

        var datas = callAjax(js_context_path + "/api/budget/budgetSave/removeBuildingMore", "post", dataJSONEN, "json");
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
            if (name != 'totalBuilding' && !isNaN(val)) {
                totalBudgetBuilding += val;
            } else if (name == 'totalBuilding') {
                $(this).val(totalBudgetBuilding);
            }
        });
    }
}
function keyPressedMore(obj) { // For BOQ in BuildMore

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

    $("#costTotalBOQMore").html(parseFloat($("#wageTotal").html()) + parseFloat($("#materialTotal").html()));
}
function addFloorPalnHtml(jsonObj) {

    if (jsonObj["floorNo"] == undefined) jsonObj["floorNo"] = "";
    if (jsonObj["area"] == undefined) jsonObj["area"] = "";
    if (jsonObj["floorDesc"] == undefined) jsonObj["floorDesc"] = "";
    if (jsonObj["id"] == undefined) jsonObj["id"] = "-1";

    var html = '';
    html += '<div id="floor' + indexDivFloor + '" class="form-group">';
    html += ' <div class="form-group">';
    html += '    <input type="text" class="form-control input-sm" value="' + jsonObj["id"] + '" name="id" style="display:none;">';
    html += '     <label class="col-md-3 text-right">ชั้นที่</label>';
    html += '     <div class="col-md-3"><input type="text" class="form-control input-sm" value="' + jsonObj["floorNo"] + '" name="floorNo"></div>';
    html += '     <label class="col-md-1 text-center">พื้นที่</label>';
    html += '     <div class="col-md-3"><input type="number" min="0" class="form-control input-sm" id="area" value="' + jsonObj["area"] + '" name="area" onKeyUp="keyPressed(this)"></div>';
    html += '     <label class="col-md-2 text-left">ตรม.</label>';
    html += ' </div>';
    html += ' <div class="form-group">';
    html += '     <label class="col-md-3 text-right">- </label>';
    html += '     <div class="col-md-7"><textarea type="text" rows="3" class="form-control input-sm" placeholder="ใส่คำอธิบาย" name="floorDesc">' + jsonObj["floorDesc"] + '</textarea></div>';
    html += '     <label class="col-md-1 text-left">ตรม.</label>';
    html += '     <button type="button" class="btn btn-default btRemoveBuildDetail" name="removeArea" floorID="' + jsonObj["id"] + '"><i class="fa fa-minus"></i> ลบ</button>';
    html += ' </div>';
    html += '</div>';

    $("#buildNo7Warpper").append(html);

    $("button.btRemoveBuildDetail").unbind("click").click(function () {
        $(this).parent().parent().remove().fadeOut(300);
        keyPressed(this);
        if ($(this).attr("floorID") != "-1")listIDRemoveFloor.push($(this).attr("floorID"));
        console.log(listIDRemoveFloor);
    });
    $('#area').keyup();
    indexDivFloor++;
}
function addPeriodHTML(jsonObj) {

    var totalYear = $("#totalYear").val();
    var html = '';
    for (var i = 0; i < totalYear; i++) {
        if (!isEmptyObject(jsonObj)) {
            listIDRemovePeriod.push(jsonObj[i]["id"]);
            html += ' <div id="period' + i + '" class = "col-md-12 text-right form-group">' +
                '<input type="text" name="id" value="' + jsonObj[i]["id"] + '" style="display:none">' +
                '<label class="col-md-2">ปีงบประมาณ</label><div class="col-md-2"><input type="number" min="0" id="budgetPeriodId" name="budgetPeriodId" class="form-control input-sm" value="' + jsonObj[i]["budgetPeriodId"] + '"></div>' +
                '<label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" id="phaseNo" name="phaseNo" class="form-control input-sm" onKeyUp="keyPressed(this)" value="' + jsonObj[i]["phaseNo"] + '"></div>' +
                '<label class="col-md-1">งวดงาน</label><div class="col-md-2"><input type="number" id="costTotal" name="costTotal" class="form-control input-sm" onKeyUp="keyPressed(this)" value="' + jsonObj[i]["costTotal"] + '"></div>' +
                '<label class="col-md-1 text-left">บาท</label></div>';
        } else {
            html += ' <div id="period' + i + '" class = "col-md-12 text-right form-group">' +
                '<input type="text" name="id" value="-1" style="display:none">' +
                '<label class="col-md-2">ปีงบประมาณ</label><div class="col-md-2"><input type="number" min="0" id="budgetPeriodId" name="budgetPeriodId" class="form-control input-sm"></div>' +
                '<label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" id="phaseNo" name="phaseNo" class="form-control input-sm" onKeyUp="keyPressed(this)" ></div>' +
                '<label class="col-md-1">งวดงาน</label><div class="col-md-2"><input type="number" id="costTotal" name="costTotal" class="form-control input-sm" onKeyUp="keyPressed(this)"></div>' +
                '<label class="col-md-1 text-left">บาท</label></div>';
        }

    }
    //html += ' <div class = "col-md-12 text-right form-group"><label class="col-md-5"><b>รวม</b></label><div class="col-md-2"><input type="number" id="totalWork" name="totalWork" class="form-control input-sm" disabled></div><label class="col-md-1"><b>งวดงาน</b></label><div class="col-md-2"><input type="number" id="totalAmount" name="totalAmount" class="form-control input-sm" disabled></div><label class="col-md-1 text-left"><b>บาท</b></label></div>';

    $("#installment .inner-installment").html(html);
}
function isEmptyObject(obj) {
    var hasOwnProperty = Object.prototype.hasOwnProperty;
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
function disableMoreEdit() {

    $("#formBuildMore input, #formBuildMore textarea").each(function () {
        $(this).attr('readonly', '');
    });
    $("#addFloor").hide();
    $(".addBOQ").hide();
    $(".btRemoveBuildDetail").hide();
    $("#addPeriod").hide();
    $(".edit-btnBOQ").hide();
    $(".delete-btnBOQ").hide();

}


