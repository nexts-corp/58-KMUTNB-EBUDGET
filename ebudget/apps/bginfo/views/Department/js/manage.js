//var myApp = angular.module('Department', ['commonApp']);
//
//myApp.controller('tableController', function ($scope, $http, $controller) {
//    $controller('cmListController', {$scope: $scope});
//
//    var listCampus = []; //Global Variable
//    var listDept = [];//Global Variable
//    var listDeptMain = []; //Global Variable
//    var listActivity = []; //Global Variable
//
//    $scope.init = function () {
//        $("[ng-app]").show();
//        $scope.tabShowStatus = false;
//        $scope.fetchCampus();
//        $scope.fetchDeptMain(1);//campus bangkok
//        $scope.fetchDept(1);//campus bangkok
//        $scope.fetchActivity();
//
//    };
//
//    $scope.fetchCampus = function () {
//
//        $http.get("fetchCampus").then(function (response) {
//
//            if (listCampus.length == 0) {
//                listsCampus = response.data.listsCampus;
//                $scope.listCampus = response.data.listsCampus;
//            } else {
//                $scope.listCampus = listCampus;
//            }
//        });
//    };
//
//    $scope.fetchDeptMain = function (campusID) {
//        var sendData = {campusID: campusID};
//
//        if (listDeptMain[campusID] === undefined) {
//            $http.post("fetchDepartmentMain", sendData).then(function (response) {
//                listDeptMain[campusID] = response.data.listsDepartment;
//                $scope.listDeptMain = response.data.listsDepartment;
//            });
//        } else {
//
//            $scope.listDeptMain = listDeptMain[campusID];
//        }
//    };
//
//    $scope.fetchDept = function (campusID) {
//        var sendData = {campusID: campusID};
//
//        if (listDept[campusID] === undefined) {
//            $scope.isLoding = true;
//            $http.post("fetchDepartment", sendData).then(function (response) {
//                listDept[campusID] = response.data.listsDepartment;
//                $scope.listDept = response.data.listsDepartment;
//                $scope.isLoding = false;
//
//            });
//        } else {
//            $scope.listDept = listDept[campusID];
//        }
//
//    };
//
//    $scope.fetchDeptMainModal = function (campusID) {
//        var sendData = {campusID: campusID};
//
//        if (listDeptMain[campusID] === undefined) {
//            $http.post("fetchDepartmentMain", sendData).then(function (response) {
//                listDeptMain[campusID] = response.data.listsDepartment;
//                $scope.listDeptMainModal = response.data.listsDepartment;
//
//            });
//        } else {
//            $scope.listDeptMainModal = listDeptMain[campusID];
//        }
//    };
//
//    $scope.fetchActivity = function () {
//
//        if (listActivity.length == 0) {
//            $http.get("fetchActivityType").then(function (response) {
//                listActivity = response.data.listsActivityType;
//                $scope.listActivity = response.data.listsActivityType;
//            });
//        } else {
//            $scope.listActivity = listActivity;
//        }
//    };
//
//
//    $scope.saveData = function () {
//
//        var dataDept = {};
//        var campusId = $scope.ModelCampus.id;
//        dataDept.campusId = campusId;
//        dataDept.id = $scope.ModeldeptId;
//        dataDept.deptName = $scope.ModeldeptName;
//        if ($scope.ModelDeptMain.id == undefined) {
//            dataDept.masterId = 0;
//        } else {
//            dataDept.masterId = $scope.ModelDeptMain.id;
//        }
//
//        dataDept.deptType = '1';
//        dataDept.deptStatus = 'Y';
//        var dataMaping = {};
//        dataMaping.actId = $scope.ModelActType.id;
//        dataMaping.deptId = $scope.ModeldeptId;
//
//        if ($scope.action == "add") {
//
//            $http.post("saveDept", {dataDept: dataDept, dataMaping: dataMaping}).then(function (response) {
//                if (response.data.result.status == true) {
//                    var data = {};
//                    data.campusId = response.data.result.dataDept.campusId;
//                    data.deptID = response.data.result.dataDept.id;
//                    var actTypeId = response.data.result.dataMaping.actId;
//                    data.actTypeID = actTypeId;
//                    data.actTypeName = $scope.findObject($scope.listActivity, "id", actTypeId).actTypeName;
//                    data.deptName = response.data.result.dataDept.deptName;
//                    data.mapID = response.data.result.dataMaping.id;
//                    data.masterId = response.data.result.dataDept.masterId;
//
//                    if (listDept[campusId] != undefined) {
//                        listDept[campusId].push(data);
//                        $scope.listDept.push(data);
//                    }
//                    $("#modal").modal('hide');
//                } else {
//                    alert('Error :' + response.data.result.msg);
//                }
//            });
//
//        } else if ($scope.action == "edit") {
//
//            dataMaping.id = $scope.ModelmapId;
//
//            $http.post("editDept", {dataDept: dataDept, dataMaping: dataMaping}).then(function (response) {
//
//                if (response.data.result.status == true) {
//                    //var data = {};
//                    //data.campusId = response.data.result.dataDept.campusId;
//                    //data.deptID = response.data.result.dataDept.id;
//                    //var actTypeId = response.data.result.dataMaping.actId;
//                    //data.actTypeID = actTypeId;
//                    //data.actTypeName = $scope.findObject($scope.listActivity, "id", actTypeId).actTypeName;
//                    //data.deptName = response.data.result.dataDept.deptName;
//                    //data.mapID = response.data.result.dataMaping.id;
//                    //data.masterId = response.data.result.dataDept.masterId;
//                    if (listDept[campusId] != undefined) {
//                        //listDept[campusId][$scope.index] = data;
//                        listDept[campusId][$scope.index].campusId =  response.data.result.dataDept.campusId;
//                        listDept[campusId][$scope.index].deptID =  response.data.result.dataDept.id;
//                        listDept[campusId][$scope.index].actTypeID =  response.data.result.dataMaping.actId;
//                        listDept[campusId][$scope.index].actTypeName =  $scope.findObject($scope.listActivity, "id", actTypeId).actTypeName;
//                        listDept[campusId][$scope.index].deptName =  response.data.result.dataDept.deptName;
//                        listDept[campusId][$scope.index].mapID =  response.data.result.dataMaping.id;
//                        listDept[campusId][$scope.index].masterId =  response.data.result.dataDept.masterId;
//                    }
//
//                    $("#modal").modal('hide');
//                } else {
//                    alert('Error :' + response.data.result.msg);
//                }
//            });
//        }
//    };
//
//    $scope.saveCampus = function () {
//
//        var param = {};
//        param.campusName = $scope.ModelCamName;
//        param.campusStatus = 'Y';
//
//        $http.post("saveCam", {dataCampus: param}).then(function (response) {
//
//            if (response.data.result.status == true) {
//
//                $scope.listCampus.push(response.data.result.dataCampus);
//                alert('Success');
//            } else {
//                alert('Error :' + response.data.result.msg);
//            }
//        });
//    };
//
//    $scope.showModal = function (action, data, index) {
//        $scope.action = action;
//        $scope.index = index; //for edit
//
//        if ($scope.action == "add") {
//
//            $scope.ModelCampus = "";
//            $scope.ModeldeptName = "";
//            $scope.ModeldeptId = "";
//            $scope.ModelActType = "";
//            $scope.ModelDeptMain = "";
//            $("#modal").modal('show');
//
//        } else if ($scope.action == "edit") {
//
//            $scope.titleModal = "Edit " + data.deptName;
//            var campusID = data.campusId;
//            $scope.fetchDeptMainModal(campusID);
//            $scope.ModelCampus = $scope.findObject($scope.listCampus, "id", campusID);
//            $scope.ModelDeptMain = $scope.findObject($scope.listDeptMainModal, "id", data.masterId);
//            $scope.ModelActType = $scope.findObject($scope.listActivity, "id", data.actTypeID);
//            $scope.ModeldeptName = data.deptName;
//            $scope.ModeldeptId = data.deptID;
//            $scope.ModelmapId = data.mapID;
//            $("#modal").modal('show');
//
//        } else if ($scope.action == 'delete') {
//
//            if (data.mapID == null || data.mapID == "null")
//                data.mapID = -1;
//            console.log(data.mapID);
//
//            if (confirm('ต้องการปิดการใช้งาน ' + data.deptName + ' หรือไม่?')) {
//                // Save it!
//                $http.post("removeDept", {idDept: data.deptID, mapId: data.mapID}).then(function (response) {
//
//                    if (response.data.result.status == true) {
//                        $scope.listDept.splice($scope.index, 1);
//                        alert('Success');
//                    } else {
//                        alert('Error :' + response.data.result.msg);
//                    }
//                });
//            } else {
//                // Do nothing!
//            }
//        } else if ($scope.action == 'enable') {
//            if (data.mapID == null || data.mapID == "null")
//                data.mapID = -1;
//
//            if (confirm('ต้องการเปิดการใช้งาน ' + data.deptName + ' หรือไม่?')) {
//                // Save it!
//                $http.post("enableDepartment", {idDept: data.deptID, mapId: data.mapID}).then(function (response) {
//
//                    if (response.data.result.status == true) {
//                        $scope.listDept.splice($scope.index, 1);
//                        alert('Success');
//                    } else {
//                        alert('Error :' + response.data.result.msg);
//                    }
//                });
//            } else {
//                // Do nothing!
//            }
//        }
//    };
//
//    $scope.tabShow = function (status) {
//        $scope.tabShowStatus = status;
//    };
//
//    $scope.findObject = function (obj, attr, value) {
//
//        for (var i = 0; i < obj.length; i++) {
//
//            if (obj[i][attr] != undefined) {
//
//                if (obj[i][attr] == value) {
//                    return obj[i];
//                }
//            }
//        }
//        return "";
//    };
//
//});
var listDept = [];
var listCampus = [];
var listActivity = [];
var dataTable, dataTableCampus;
var datasCampus;

$(document).ready(function () {


    selectCampus();

    var datasDept = callAjax("fetchDepartment", "POST", {campusID: 0}, "json");

    dataTable = $("#table").dataTable({
        "destroy": true,
        "data": datasDept["listsDepartment"],
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData["deptID"]);
            listDept[aData["deptID"]] = aData;
        },
        "iDisplayLength": 50,
        "bAutoWidth": false,
        "fnUpdate": true,
        scrollCollapse: true,
        "columnDefs": [

            {
                "targets": 0,
                "orderable": true,
                "data": "deptID"

            }, {
                "targets": 1,
                "searchable": true,
                "data": "deptName"

            }, {
                "targets": 2,
                "searchable": false,
                "orderable": false,
                "data": "actTypeName"
            }, {
                "targets": 3,
                "searchable": false,
                "orderable": true,
                "data": "deptStatus"
            },
            {
                "targets": 4,
                "searchable": false,
                "orderable": false,
                "data": "deptID",
                "sClass": "text-center",
                render: function (data, type, row) {

                    var html = '  <button class="btn btn-warning edit-btn" title="แก้ไข" data-campus="' + row["campusId"] + '" data-dept="' + row["deptID"] + '" data-act="' + row["actTypeID"] + '"><i class="fa fa-pencil"></i></button>';
                    html += '<button class="btn btn-success on-background" title="เปิดการใช้งาน" data-campus="' + row["campusId"] + '" data-dept="' + row["deptID"] + '" data-act="' + row["actTypeID"] + '"><i class="fa fa-angle-double-left"></i></button>';
                    html += '<button class="btn btn-default close-btn" title="ปิดการใช้งาน" data-campus="' + row["campusId"] + '" data-dept="' + row["deptID"] + '" data-act="' + row["actTypeID"] + '"><i class="fa fa-times"></i> </button>';
                    return html;
                }
            },
            {
                "targets": 5,
                "searchable": true,
                "visible": false,
                "data": "campusId"
            }
        ]
    }); //end dataTable

    dataTable.api().columns(5).search(1).draw();//default filter

    $("#campusSelect").select2().change(function () {

        dataTable.api().columns(5).search(this.value).draw();
    });

    var datasActivity = callAjax("fetchActivityType", "POST", {}, "json");

    $.each(datasActivity["listsActivityType"], function (key, value) {

        $("#modalActType").append($('<option>', {
            value: value['id'],
            text: value['actTypeName']
        }));
        listActivity[value['id']] = value;
    });

    $.each(datasDept["listsDepartment"], function (key, value) {

        $("#modalDeptMain").append($('<option>', {
            value: value['deptID'],
            text: value['deptID'] + " " + value['deptName']
        }));

    });

    actionAll();

    $("#addCampus").click(function () {

        $("#showTable").hide();
        $(this).hide();
        $("#back").show();
        $("#showAddCampus").show();

    });

    $("#back").click(function () {
        $(this).hide();
        $("#showTable").show();
        $("#addCampus").show();
        $("#showAddCampus").hide();
        selectCampus();

    });

    //campus zone
    dataTableCampus = $("#tableCampus").dataTable({
        "destroy": true,
        "data": datasCampus["listsCampus"],
        "fnCreatedRow": function (nRow, aData, iDataIndex) {
            $(nRow).attr('id', aData["id"]);
            listCampus[aData["id"]] = aData;
        },
        "iDisplayLength": 50,
        "bAutoWidth": false,
        "fnUpdate": true,
        scrollCollapse: true,
        "columnDefs": [
            {
                "targets": 0,
                "orderable": true,
                "sClass": "text-center",
                "data": "campusName"
            },
            {
                "targets": 1,
                "orderable": true,
                "sClass": "text-center",
                "data": "campusStatus",
                render: function (data) {
                    if (data == "Y" || data == "ใช้งาน") {
                        return "ใช้งาน";
                    }
                    return "ไม่ใช้งาน";
                }

            },
            {
                "targets": 2,
                "searchable": false,
                "orderable": false,
                "data": "id",
                "sClass": "text-center",
                render: function (data, type, row) {

                    var html = '  <button class="btn btn-warning edit-campus" title="แก้ไข" data-campus="' + data + '"><i class="fa fa-pencil"></i></button>';
                    html += '<button class="btn btn-success on-background-campus" title="เปิดการใช้งาน" data-campus="' + data + '"><i class="fa fa-angle-double-left"></i></button>';
                    html += '<button class="btn btn-default close-btn-campus" title="ปิดการใช้งาน" data-campus="' + data + '"><i class="fa fa-times"></i> </button>';
                    return html;
                }
            }
        ]
    }); //end dataTable

    actionAllCampus();

    function selectCampus() {

        datasCampus = callAjax("fetchCampus", "GET", {}, "json");
        $("#modalCampus").html('<option value="">- เลือกวิทยาเขต -</option>');
        $("#campusSelect").html('');
        $.each(datasCampus["listsCampus"], function (key, value) {

            if (value["campusStatus"] == "Y") {

                $("#modalCampus").append($('<option>', {
                    value: value['id'],
                    text: value['campusName']
                }));
                $("#campusSelect").append($('<option>', {
                    value: value['id'],
                    text: value['campusName']
                }));
            }
        });
    }

});
//end doc ready

function addModal() {

    resetModal();
    $("#titleModal").html("เพิ่มหน่วยงาน");
    $("#modal").modal("show");

    $(".save").unbind("click").click(function () {
        var dataDept = {}, dataMaping = {};

        var campusId = $("#modalCampus").val();
        var deptMain = $("#modalDeptMain").val();
        var actTypeId = $("#modalActType").val();
        var deptId = $("#deptId").val();
        var deptName = $("#deptName").val();

        dataDept.campusId = campusId;
        dataDept.masterId = deptMain;
        dataDept.actTypeId = actTypeId;
        dataDept.id = deptId;
        dataDept.deptName = deptName;
        dataDept.deptType = '1';
        dataDept.deptStatus = 'Y';

        dataMaping.deptId = deptId;
        dataMaping.actId = actTypeId;

        if (checkBlank(deptId) && checkBlank(campusId) && checkBlank(deptMain) && checkBlank(actTypeId) && checkBlank(deptName)) {

            var dataJSON = JSON.stringify({dataDept: dataDept, dataMaping: dataMaping});
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("saveDept", "post", dataJSONEN, "json");

            if (datas["result"]["status"] == true) {
                $("#modal").modal("hide");
                var data = {};
                data.deptID = deptId;
                data.actTypeID = actTypeId;
                data.actTypeName = listActivity[actTypeId]["actTypeName"];
                data.campusId = campusId;
                data.deptID = deptId;
                data.deptName = deptName;
                data.deptStatus = "ใช้งาน";
                data.masterId = deptMain;
                data.mapID = datas["result"]["dataMaping"]["id"];

                listDept[deptId] = data;
                dataTable.api().row.add(data).columns.adjust().draw();

                actionAll();

            } else {

                $("#modalStatus").html('<label class="text-danger">ไม่สามารถบันทึกได้</label>');
            }

        } else {
            $("#modalStatus").html('<label class="text-danger">กรุณาใส่ข้อมูลให้ครบ</label>');
        }

    });
}

function addCampus() {

    resetModal2();
    $("#titleModalCampus").html("เพิ่มวิทยาเขต");
    $("#modal2").modal("show");

    $(".save").unbind("click").click(function () {

        var data = {};

        var campusName = $("#campusName").val();

        data.campusName = campusName;
        data.campusStatus = "Y";

        if (checkBlank(campusName)) {

            var dataJSON = JSON.stringify({dataCampus: data});
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("saveCam", "post", dataJSONEN, "json");

            if (datas["result"]["status"] == true) {

                var idCam = datas["result"]["dataCampus"]["id"];
                var data = {};
                data.id = idCam;
                data.campusName = campusName;
                data.campusStatus = "Y";
                listCampus[idCam] = data;
                dataTableCampus.api().row.add(data).columns.adjust().draw();
                actionAllCampus();

                $("#modal2").modal("hide");

            } else {

                $("#modal2Status").html('<label class="text-danger">ไม่สามารถบันทึกได้</label>');
            }

        } else {
            $("#modal2Status").html('<label class="text-danger">กรุณาใส่ข้อมูลให้ครบ</label>');
        }

    });
}

function actionEdit() {

    $("#table").on('click', 'button.edit-btn', function () {

        var rowData = dataTable.api().row($(this).parents('tr')).data(); //.apiDataTable
        var tr = $(this).closest("tr");
        var rowindex = tr.index();

        $("#titleModal").html("แก้ไขหน่วยงาน");
        $("#modalStatus").html('');
        $("#modal").modal("show");

        $("#modalCampus").val(rowData["campusId"]);
        $("#modalDeptMain").val(rowData["masterId"]);
        $("#modalActType").val(rowData["actTypeID"]);
        $("#deptId").val(rowData["deptID"]);
        $("#deptName").val(rowData["deptName"]);

        $(".save").unbind("click").click(function () {

            var dataDept = {}, dataMaping = {};
            var campusId = $("#modalCampus").val();
            var deptMain = $("#modalDeptMain").val();
            var actTypeId = $("#modalActType").val();
            var deptIdNew = $("#deptId").val();
            var deptName = $("#deptName").val();

            dataDept.campusId = campusId;
            dataDept.masterId = deptMain;
            dataDept.actTypeId = actTypeId;
            dataDept.id = rowData["deptID"];
            dataDept.deptName = deptName;

            dataMaping.id = listDept[rowData["deptID"]]["mapID"];
            dataMaping.deptId = rowData["deptID"];
            dataMaping.actId = actTypeId;

            console.log(dataMaping);

            var dataJSON = JSON.stringify({dataDept: dataDept, dataMaping: dataMaping, deptId: deptIdNew});
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("editDept", "post", dataJSONEN, "json");

            if (datas["result"]["status"] == true) {

                $("#modal").modal("hide");


                var data = {};
                data.deptID = deptIdNew;
                data.actTypeID = actTypeId;
                data.actTypeName = listActivity[actTypeId]["actTypeName"];
                data.campusId = campusId;
                data.deptID = deptIdNew;
                data.deptName = deptName;
                data.deptStatus = listDept[rowData["deptID"]]["deptStatus"];
                data.masterId = deptMain;
                data.mapID = datas["result"]["dataMaping"]["id"];

                var selector = $('#' + rowData["deptID"]);

                dataTable.fnUpdate(deptIdNew, selector, 0);
                dataTable.fnUpdate(deptName, selector, 1);
                dataTable.fnUpdate(data.actTypeName, selector, 2);
                dataTable.fnUpdate(data.deptStatus, selector, 3);

                listDept[rowData["deptID"]] = [];
                listDept[deptIdNew] = data;
                selector.attr('id', deptIdNew);

            } else {

                $("#modalStatus").html('<label class="text-danger">ไม่สามารถแก้ไขได้</label>');
            }
        });

    });
}

function actionClose() {

    $("#table").on('click', 'button.close-btn', function () {

        var rowData = dataTable.api().row($(this).parents('tr')).data(); //.apiDataTable
        var campusId = rowData["campusId"];
        var deptID = rowData["deptID"];

        swal({
            title: "ปิดการใช้งานหน่วยงาน",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ปิดการใช้งาน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false
        }, function () {

            var data = {};
            data.idDept = deptID;
            data.mapId = rowData["mapID"];

            var dataJSON = JSON.stringify(data);
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("removeDept", "post", dataJSONEN, "json");
            if (datas["result"]["status"]) {

                swal("ปิดการใช้งานเรียบร้อย", "", "success");
                var selector = $('#' + deptID);
                dataTable.fnUpdate("ไม่ใช้งาน", selector, 3);
                listDept[deptID]["deptStatus"] = "ไม่ใช้งาน";
            } else {
                swal("ปิดการใช้ไม่งานเรียบร้อย", "", "error");
            }

        });

    });

}

function actionEnable() {

    $("#table").on('click', 'button.on-background', function () {

        var rowData = dataTable.api().row($(this).parents('tr')).data(); //.apiDataTable
        console.log(rowData);
        var campusId = rowData["campusId"];
        var deptID = rowData["deptID"];

        swal({
            title: "เปิดการใช้งานหน่วยงาน",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#47a447",
            confirmButtonText: "เปิดการใช้งาน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false
        }, function () {

            var data = {};
            data.idDept = deptID;
            data.mapId = rowData["mapID"];

            var dataJSON = JSON.stringify(data);
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("enableDepartment", "post", dataJSONEN, "json");
            if (datas["result"]["status"]) {

                swal("เปิดการใช้งานเรียบร้อย", "", "success");
                var selector = $('#' + deptID);
                dataTable.fnUpdate("ใช้งาน", selector, 3);
                listDept[deptID]["deptStatus"] = "ใช้งาน";
            } else {
                swal("เปิดการใช้ไม่งานเรียบร้อย", "", "error");
            }

        });

    });
}

function actionEditCampus() {

    $("#tableCampus").on('click', 'button.edit-campus', function () {

        var rowData = dataTableCampus.api().row($(this).parents('tr')).data(); //.apiDataTable
        var tr = $(this).closest("tr");
        var campusId = rowData["id"];

        $("#titleModalCampus").html("แก้ไขวิทยาเขต");
        $("#modalStatus").html('');
        $("#modal2").modal("show");

        $("#campusName").val(rowData["campusName"]);

        $(".save").unbind("click").click(function () {

            var data = {};
            data.id = campusId;
            data.campusName = $("#campusName").val();

            var dataJSON = JSON.stringify({dataCampus: data});
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("editCam", "post", dataJSONEN, "json");

            if (datas["result"]["status"] == true) {

                var selector = $('#' + campusId);

                dataTableCampus.fnUpdate(data.campusName, selector, 0);

                listCampus[campusId]["campusName"] = $("#campusName").val();

                $("#modal2").modal("hide");

            } else {

                $("#modalStatus").html('<label class="text-danger">ไม่สามารถแก้ไขได้</label>');
            }
        });

    });
}

function actionCloseCampus() {

    $("#tableCampus").on('click', 'button.close-btn-campus', function () {

        var rowData = dataTableCampus.api().row($(this).parents('tr')).data(); //.apiDataTable
        var campusId = rowData["id"];
        console.log("Close " + campusId);

        swal({
            title: "ปิดการใช้งานวิทยาเขต",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ปิดการใช้งาน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false
        }, function () {

            var data = {};
            data.camId = campusId;
            data.status = "N";

            var dataJSON = JSON.stringify(data);
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("statusCam", "post", dataJSONEN, "json");
            if (datas["result"]["status"]) {

                swal("ปิดการใช้งานเรียบร้อย", "", "success");
                var selector = $('#' + campusId);
                console.log(selector);

                dataTableCampus.fnUpdate("ไม่ใช้งาน", selector, 1);

                listCampus[campusId]["campusStatus"] = "ไม่ใช้งาน";

            } else {
                swal("ปิดการใช้ไม่งานเรียบร้อย", "", "error");
            }

        });

    });

}

function actionEnableCampus() {

    $("#tableCampus").on('click', 'button.on-background-campus', function () {

        var rowData = dataTableCampus.api().row($(this).parents('tr')).data(); //.apiDataTable
        var campusId = rowData["id"];
        console.log("Enable " + campusId);

        swal({
            title: "เปิดการใช้งานวิทยาเขต",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#47a447",
            confirmButtonText: "เปิดการใช้งาน",
            cancelButtonText: "ยกเลิก",
            closeOnConfirm: false
        }, function () {

            var data = {};
            data.camId = campusId;
            data.status = "Y";

            var dataJSON = JSON.stringify(data);
            var dataJSONEN = encodeURIComponent(dataJSON);

            var datas = callAjax("statusCam", "post", dataJSONEN, "json");
            if (datas["result"]["status"]) {

                swal("เปิดการใช้งานเรียบร้อย", "", "success");

                var selector = $('#' + campusId);
                console.log(selector);

                dataTableCampus.fnUpdate("ใช้งาน", selector, 1);

                listCampus[campusId]["campusStatus"] = "ใช้งาน";

            } else {
                swal("เปิดการใช้ไม่งานเรียบร้อย", "", "error");
            }

        });

    });
}

function actionAll() {
    actionClose();
    actionEnable();
    actionEdit();
}

function actionAllCampus() {

    actionEditCampus();
    actionEnableCampus();
    actionCloseCampus();
}


function checkBlank(value) {
    if (value != "" && value != " ") return true;

    return false;
}

function resetModal() {

    $("#modalStatus").html('');
    $("#modalCampus").val('');
    $("#modalDeptMain").val('0');
    $("#modalActType").val('');
    $("#deptId").val('');
    $("#deptName").val('');
}

function resetModal2() {

    $("#campusName").val('');
}



