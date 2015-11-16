var listBOQ = [];
var listBuilding = [];
var STATUSFORM = "INSERT";
var listIDRemoveBOQOne = [];//id remove
var listIDRemoveBuildingOne = [];//id remove
var addStatusBOQOne = false, addStatusBuildOne = false;

function buildingOneForm(param) {
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
            //+ ' <div class="form-group">'
            //+ '     <div class="col-md-9">'
            //+ '         <label class="col-md-4 control-label text-right" for="xxx">แผนงาน</label>'
            //+ '         <div class="col-md-8">'
            ////+ '             <input type="text" id="plan" name="plan"  value="' + planArr[param["l3dPlanId"]] + '" class="form-control input-sm" required>'
            //+ '         </div>'
            //+ '     </div>'
            //+ ' </div>'
            //
            //+ ' <div class="form-group">'
            //+ '     <div class="col-md-9">'
            //+ '         <label class="col-md-4 control-label text-right" for="xxx">ผลผลิต</label>'
            //+ '         <div class="col-md-8">'
            //    //+ '             <input type="text" id="product" name="product" value="' + projectArr[param["projectId"]] + '" class="form-control input-sm" required>'
            //+ '         </div>'
            //+ '     </div>'
            //+ ' </div>'

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
        + '     <div class="col-md-9">'
        + '         <label class="col-md-4 control-label text-right" for="xxx">พิกัดภูมิศาสตร์</label>'
        + '          <div class="col-md-3">'
        + '              <input type="text" id="lat" name="lat" class="form-control input-sm">'
        + '          </div>'
        + '          <div class="col-md-3">'
        + '             <input type="text" id="lng" name="lng" class="form-control input-sm">'
        + '          </div>'
        + '         <button class="btn btn-primary col-md-1" type="button" id="btn-map"><i class="fa fa-map-o"></i> เพิ่ม</button>'
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

            //+ '<div id="payBudget" class="form-group">'
            //+ ' <div class="col-md-9">'
            //+ '     <div class="col-md-12" style="margin: 3px 0;">'
            //+ '         <label class="col-md-4 control-label text-right" for="xxx"><b>แผนการใช้จ่ายงบประมาณ</b></label>'
            //+ '     </div>'
            //+ ' </div>'
            //+ ' <div class = "col-md-12 text-right form-group"><label class="col-md-2">ดำเนินการ จำนวน</label><div class="col-md-2"><input type="number" min="0" class="form-control input-sm"></div><label class="col-md-1">งวด</label><div class="col-md-2"><input type="date" class="form-control input-sm"></div><label class="col-md-1 text-left">วัน</label><label class="col-md-1 text-right">วงเงินรวม</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label></div>'
            //+ ' <div class="col-md-12"><label class="col-md-2 text-right text-bold" style="text-decoration: underline;">งวดที่</label><label class="col-md-7"></label><label class="col-md-2 text-center" style="text-decoration: underline;">ยอดเงินสะสม</label></div>'
            //+ ' <div class = "col-md-12 text-right form-group"><label class="col-md-3">งวดที่ 1 &nbsp;&nbsp;&nbsp;เดือน</label><div class="col-md-2"><input type="number" min="0"  class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number" class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label></div>'
            //+ ' <div class = "col-md-12 text-right form-group"><label class="col-md-3">งวดที่ 2 &nbsp;&nbsp;&nbsp;เดือน</label><div class="col-md-2"><input type="number" min="0"  class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label></div>'
            //+ ' <div class = "col-md-12 text-right form-group"><label class="col-md-3">งวดที่ 3 &nbsp;&nbsp;&nbsp;เดือน</label><div class="col-md-2"><input type="number" min="0"  class="form-control input-sm"></div><label class="col-md-1">จำนวน</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label><div class="col-md-2"><input type="number"  class="form-control input-sm"></div><label class="col-md-1 text-left">บาท</label></div>'
            //+ '</div>'

        + ' <div class="col-md-12 text-right">'
        + '     <button type="button" class="btn btn-success saveBuildOne"><i class="fa fa-save"></i> บันทึก</button>&nbsp;'
        + '     <button type="button" class="btn btn-default clearBuildOne"><i class="fa fa-trash"></i> ล้างข้อมูล</button>'
        + ' </div>'
        + '</form>'

        + '<div class="col-md-12">'
        + ' <p class="control-label"><b>หมายเหตุ </b>แผนการดำเนินงานในแต่ละรายการจะต้องกำหนดระยะเวลาให้ต่อเนื่องกันและเซ็นสัญญาภายในไตรมาศที่ 1 (ตุลาคม-ธันวาคม)</p>'
        + '</div>'

        + '<div id="modalMap" aria-labelledby="bidderLabel" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">'
        + '<div class="modal-dialog">'
        + '<div class="modal-content">'
        + '<div class="modal-header">'
        + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
        + '<h4 class="modal-title" id="myModalLabel"><i class="fa fa-map-o"></i> แผนที่</h4>'
        + '</div>'
        + '<div class="modal-body">'
        + ' <div class="btn-group" id="btnGroup">'
        + '     <button type="button" id="point" class="btn btn-default active">Point</button>'
        + '     <button type="button" id="line" class="btn btn-default">Line</button>'
        + '     <button type="button" id="poly" class="btn btn-default">Polygon</button>'
        + '     <button type="button" id="circle" class="btn btn-default">Circle</button>'
        + ' </div>'
        + ' <div id="showInfo" style="margin-top: 16px;"></div>'
        + ' <div id="map"  style="height: 400px; margin-top: 16px;"></div>'
        + ' <div id="showInfoFotter" style="margin-top: 10px;"></div>'
        + '</div>'
        + '<div id="loadingModalMap" class="col-md-12 text-center"></div>'
        + '<div class="modal-footer" style="margin-top: 0px;">'
        + '     <button type="button" class="btn btn-success save "> บันทึก</button>'
        + '     <button type="button" data-dismiss="modal" class="btn btn-default cancel"> ยกเลิก</button>'
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>';

    $("#divAttachment").html(html);

    if (PERMISSION == "DEPARTMENT") {
        $(".saveBuildOne").show();
        $(".clearBuildOne").show();

    } else {
        $(".saveBuildOne").hide();
        $(".clearBuildOne").hide();
    }

    var firstClick = false;
    $("#btn-map").click(function () {
        //modal map
        if (!firstClick) {
            loadScript('https://maps.googleapis.com/maps/api/js?key=AIzaSyBv9gXQrEbOEH_JGiqm_rO5Mv67nzs8m8g&callback=initMap',
                function () {
                    log('google-loader has been loaded');
                    google.maps.event.trigger(map, 'resize');
                });
        } else {
            google.maps.event.trigger(map, 'resize');
        }
        $("#modalMap").modal("show");
        firstClick = true;
    });

    $("#btnGroup #point,#line,#poly,#circle").click(function (e) {
        //modal map
        $('#btnGroup button').addClass('active').not(this).removeClass('active');
        var id = e.target.id; //id is option of map such point line
        optionMap = id;

        if (id == "point") {

            //for btn point
            if (CircleMap != undefined)CircleMap.setMap(null);
            if (directionsDisplay["show"] != undefined) {
                //clear dierection
                directionsDisplay["show"].setMap(null);
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            }

            var html = '<i class="fa fa-map-marker"> พิกัดภูมิศาสตร์</i>';
            $("#showInfo").html(html);
            $("#showInfoFotter").html('');


        } else if (id == "line") {

            //for btn line
            if (CircleMap != undefined)CircleMap.setMap(null);
            if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
            if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            markers["end"] = undefined;
            markers["start"] = undefined;

            var html = '<input type="radio" class="input-md" name="point"  value="start" checked="checked" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดเริ่มต้น</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="point" value="end" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดสิ้นสุด</label>&nbsp;<i class="fa fa-map-marker"></i>'
                + '&nbsp;&nbsp;<button type="button"  class="btn btn-default showArea">แสดงเส้นทาง</button>'
                + '&nbsp;<button type="button" class="btn btn-default clear">ล้าง</button>';

            $("#showInfo").html(html);

            $(".showArea").unbind("click").click(function () {

                if (markers["end"] != undefined && markers["start"] != undefined) {
                    // direction polyline

                    var service = new google.maps.DirectionsService();
                    if (directionsDisplay["show"] == undefined) {
                        directionsDisplay["show"] = new google.maps.DirectionsRenderer(
                            {
                                suppressMarkers: true
                            });
                    }

                    directionsDisplay["show"].setMap(map);

                    var waypts = [];
                    waypts.push({location: markers["start"].position, stopover: true});
                    waypts.push({location: markers["end"].position, stopover: true});

                    var request = {
                        origin: markers["start"].position,
                        destination: markers["end"].position,
                        waypoints: waypts,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    };

                    service.route(request, function (result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            directionsDisplay["show"].setDirections(result);
                        } else {
                            alert("Directions request failed:" + status);
                        }
                    });

                    var html = '<img src="' + js_context_path + '/images/markerA.png"  height="22" width="22"><label class="control-label">ละติจูดที่ ' + markers["start"].position.lat() + ' ลองจิจูดที่ ' + markers["start"].position.lng() + '</label><br>' +
                        '<img src="' + js_context_path + '/images/markerB.png"  height="22" width="22"><label class="control-label">ละติจูดที่ ' + markers["end"].position.lat() + ' ลองจิจูดที่ ' + markers["end"].position.lng() + '</label>';
                    $("#showInfoFotter").html(html);

                }//end if
            });
            $(".clear").unbind("click").click(function () {
                if (directionsDisplay["show"] != undefined) {
                    //clear dierection
                    directionsDisplay["show"].setMap(null);
                    if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                    if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
                }
                $("#showInfoFotter").html('');
            });

        } else if (id == "poly") {

            //for btn poly
            if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
            if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            markers["end"] = undefined;
            markers["start"] = undefined;
            if (CircleMap != undefined)CircleMap.setMap(null);
            if (directionsDisplay["show"] != undefined) {
                //clear dierection
                directionsDisplay["show"].setMap(null);
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            }
            var html = '<input type="radio" class="input-md" name="poly"  value="point1" checked="checked" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดที่ 1</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="poly" value="point2" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดที่ 2</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="poly" value="point3" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดที่ 3</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="poly" value="point4" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดที่ 4</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '&nbsp;&nbsp;<button type="button"  class="btn btn-default showArea">แสดงพื้นที่</button>'
                + '&nbsp;<button type="button" class="btn btn-default clear">ล้าง</button>';

            $("#showInfo").html(html);
            $("#showInfoFotter").html('');

            $(".showArea").unbind("click").click(function () {

                var bermudaTriangle = new google.maps.Polygon({
                    paths: polygonLatlngList,
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 3,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35
                });
                bermudaTriangle.setMap(map);

            });
            $(".clear").unbind("click").click(function () {
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
                markers["end"] = undefined;
                markers["start"] = undefined;
                if (CircleMap != undefined)CircleMap.setMap(null);
            });

        } else if (id == "circle") {

            //for btn circle
            if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
            if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            markers["end"] = undefined;
            markers["start"] = undefined;
            if (CircleMap != undefined)CircleMap.setMap(null);
            $("#showInfoFotter").html('');
            if (directionsDisplay["show"] != undefined) {
                //clear dierection
                directionsDisplay["show"].setMap(null);
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
            }
            var html = '<input type="radio" class="input-md" name="circle"  value="start" checked="checked" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>จุดกึ่งกลาง</label>&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp;'
                + '<input type="radio" class="input-md" name="circle" value="end" style="width: 1.5em; height: 1.5em;">&nbsp;&nbsp;<label>รัศมี</label>&nbsp;<i class="fa fa-map-marker"></i>'
                + '&nbsp;&nbsp;<button type="button"  class="btn btn-default showArea">แสดงพื้นที่</button>&nbsp;'
                + '<button type="button" class="btn btn-default clear">ล้าง</button>';

            $("#showInfo").html(html);

            $(".showArea").unbind("click").click(function () {

                if (markers["end"] != undefined && markers["start"] != undefined) {

                    if (CircleMap != undefined)CircleMap.setMap(null);

                    var km = distance(markers["start"].position.lat(), markers["start"].position.lng(), markers["end"].position.lat(), markers["end"].position.lng(), "K");
                    CircleMap = new google.maps.Circle({
                        strokeColor: '#FF0000',
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: '#FF0000',
                        fillOpacity: 0.35,
                        map: map,
                        center: markers["start"].position,
                        radius: km * 1000
                    });
                }
            });
            $(".clear").unbind("click").click(function () {
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
                markers["end"] = undefined;
                markers["start"] = undefined;
                if (CircleMap != undefined)CircleMap.setMap(null);
            });
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
    var datas = callAjax(js_context_path + "/api/budget/budgetInfo/viewBuildingOne", "post", {
        bg145Id: param["bg145Id"],
        type: 1
    }, "json");

    if (datas["budget"].length > 0) { //is not empty array

        STATUSFORM = "EDIT";
        datas["budget"].forEach(function (objBudget) {
            $("#formBuildOne input, #formBuildOne textarea").each(function () {
                var name = $(this).attr("name");
                if (name != "plan" && name != "product")$(this).val(objBudget[name]);
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

            toolsEvent();

        });

    } else {

        STATUSFORM = "INSERT";
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
        var fdata = [];
        fdata.push(fParam);
        var dataJSON = JSON.stringify({
            building: fdata,
            listBOQ: listBOQ,
            listBuildDetail: listBuilding,
            listIDRemoveBOQ: listIDRemoveBOQOne,
            listIDRemoveBuildingOne: listIDRemoveBuildingOne
        });

        var dataJSONEN = encodeURIComponent(dataJSON);
        if (STATUSFORM == "INSERT") {
            buildingOneInsert(dataJSONEN);
        } else if (STATUSFORM == "EDIT") {
            console.log(dataJSON);
            buildingOneEdit(dataJSONEN);
        }
    }); //Insert TO DB service

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
                $(this).closest("tr").html('');
            });
            //button.add
        } else {
            $("#floorDesc").focus(); //focus to row add
        }
    });

    $("button.add-btn").unbind("click").click(function () {

        if (!addStatusBuildOne) {

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
                $(this).closest("tr").html('');
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
                index = (listBuilding.length - 1) - rowIndex;
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

    }, 500);
}
function buildingOneEdit(dataJSONEN) {

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

function loadScript(src, callback) {

    var script = document.createElement("script");
    script.type = "text/javascript";
    if (callback)script.onload = callback;
    document.getElementsByTagName("head")[0].appendChild(script);
    script.src = src;
}

var map;
var markers = [];
var optionMap = "point"; //default
var directionsDisplay = [];
var polygonLatlngList = [];
var CircleMap;

function initMap() {

    log('maps-API has been loaded, ready to use');
    var mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(13.809842, 100.461178),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    google.maps.event.addListener(map, "click", function (e) {

        if (optionMap == "point") {

            if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
            //lat and lng is available in e object
            var latLng = e.latLng;
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: 'Title'
            });
            var html = '<i class="fa fa-map-marker"> พิกัดภูมิศาสตร์ ละติจูดที่' + latLng.lat() + ' ลองจิจูดที่ ' + latLng.lng() + '</i>';
            $("#showInfo").html(html);
            markers["start"] = marker;

        } else if (optionMap == "line") {

            var checked = $("input:radio[name='point']:checked").val();
            if (checked == "start") {
                //marker start
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                //lat and lng is available in e object
                var latLng = e.latLng;

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: 'Title',
                    icon: js_context_path + '/images/markerA.png'
                });

                markers["start"] = marker;
            } else if (checked == "end") {
                //marker end
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
                //lat and lng is available in e object
                var latLng = e.latLng;

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: 'Title',
                    icon: js_context_path + '/images/markerB.png'
                });
                markers["end"] = marker;
            }

        } else if (optionMap == "poly") {

            var latLng = e.latLng;
            var checked = $("input:radio[name='poly']:checked").val();

            if (checked == "point1") {
                if (markers["point1"] != undefined) markers["point1"].setMap(null); //clear all marker
                polygonLatlngList[0] = {lat: latLng.lat(), lng: latLng.lng()};
            } else if (checked == "point2") {
                if (markers["point2"] != undefined) markers["point2"].setMap(null); //clear all marker
                polygonLatlngList[1] = {lat: latLng.lat(), lng: latLng.lng()};
            } else if (checked == "point3") {
                if (markers["point3"] != undefined) markers["point3"].setMap(null); //clear all marker
                polygonLatlngList[2] = {lat: latLng.lat(), lng: latLng.lng()};
            } else if (checked == "point4") {
                if (markers["point4"] != undefined) markers["point4"].setMap(null); //clear all marker
                polygonLatlngList[3] = {lat: latLng.lat(), lng: latLng.lng()};
            }
            log(polygonLatlngList);
            var marker = new google.maps.Marker({
                position: latLng,
                map: map,
                title: 'Title',
            });

            markers[checked] = marker;

        } else if (optionMap == "circle") {

            var checked = $("input:radio[name='circle']:checked").val();

            if (checked == "start") {
                //marker start
                if (markers["start"] != undefined) markers["start"].setMap(null); //clear all marker
                //lat and lng is available in e object
                var latLng = e.latLng;

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: 'Title',
                    icon: js_context_path + '/images/markerA.png'
                });

                markers["start"] = marker;
            } else if (checked == "end") {
                //marker end
                if (markers["end"] != undefined) markers["end"].setMap(null); //clear all marker
                //lat and lng is available in e object
                var latLng = e.latLng;

                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    title: 'Title',
                    icon: js_context_path + '/images/markerB.png'
                });
                markers["end"] = marker;
            }

        }

    });

}

function log(str) {
    console.log(str);
}

function distance(lat1, lon1, lat2, lon2, unit) {

    var radlat1 = Math.PI * lat1 / 180
    var radlat2 = Math.PI * lat2 / 180
    var radlon1 = Math.PI * lon1 / 180
    var radlon2 = Math.PI * lon2 / 180
    var theta = lon1 - lon2
    var radtheta = Math.PI * theta / 180
    var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
    dist = Math.acos(dist)
    dist = dist * 180 / Math.PI
    dist = dist * 60 * 1.1515
    if (unit == "K") {
        dist = dist * 1.609344
    }
    if (unit == "N") {
        dist = dist * 0.8684
    }
    return dist
}




