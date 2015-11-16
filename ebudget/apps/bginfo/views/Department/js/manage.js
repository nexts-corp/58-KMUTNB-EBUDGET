var myApp = angular.module('Department', ['commonApp']);

myApp.controller('tableController', function ($scope, $http, $controller) {
    $controller('cmListController', {$scope: $scope});

    var listCampus = []; //Global Variable
    var listDept = [];//Global Variable
    var listDeptMain = []; //Global Variable
    var listActivity = []; //Global Variable

    $scope.init = function () {
        $("[ng-app]").show();
        $scope.tabShowStatus = false;
        $scope.fetchCampus();
        $scope.fetchDeptMain(1);//campus bangkok
        $scope.fetchDept(1);//campus bangkok
        $scope.fetchActivity();

    };

    $scope.fetchCampus = function () {

        $http.get("fetchCampus").then(function (response) {

            if (listCampus.length == 0) {
                listsCampus = response.data.listsCampus;
                $scope.listCampus = response.data.listsCampus;
            } else {
                $scope.listCampus = listCampus;
            }
        });
    };

    $scope.fetchDeptMain = function (campusID) {
        var sendData = {campusID: campusID};

        if (listDeptMain[campusID] === undefined) {
            $http.post("fetchDepartmentMain", sendData).then(function (response) {
                listDeptMain[campusID] = response.data.listsDepartment;
                $scope.listDeptMain = response.data.listsDepartment;
            });
        } else {

            $scope.listDeptMain = listDeptMain[campusID];
        }
    };

    $scope.fetchDept = function (campusID) {
        var sendData = {campusID: campusID};

        if (listDept[campusID] === undefined) {
            $scope.isLoding = true;
            $http.post("fetchDepartment", sendData).then(function (response) {
                listDept[campusID] = response.data.listsDepartment;
                $scope.listDept = response.data.listsDepartment;
                $scope.isLoding = false;
            });
        } else {
            $scope.listDept = listDept[campusID];
        }
    };

    $scope.fetchDeptMainModal = function (campusID) {
        var sendData = {campusID: campusID};

        if (listDeptMain[campusID] === undefined) {
            $http.post("fetchDepartmentMain", sendData).then(function (response) {
                listDeptMain[campusID] = response.data.listsDepartment;
                $scope.listDeptMainModal = response.data.listsDepartment;

            });
        } else {
            $scope.listDeptMainModal = listDeptMain[campusID];
        }
    };

    $scope.fetchActivity = function () {

        if (listActivity.length == 0) {
            $http.get("fetchActivityType").then(function (response) {
                listActivity = response.data.listsActivityType;
                $scope.listActivity = response.data.listsActivityType;
            });
        } else {
            $scope.listActivity = listActivity;
        }
    };


    $scope.saveData = function () {

        var dataDept = {};
        var campusId = $scope.ModelCampus.id;
        dataDept.campusId = campusId;
        dataDept.id = $scope.ModeldeptId;
        dataDept.deptName = $scope.ModeldeptName;
        if ($scope.ModelDeptMain.id == undefined) {
            dataDept.masterId = 0;
        } else {
            dataDept.masterId = $scope.ModelDeptMain.id;
        }

        dataDept.deptType = '1';
        dataDept.deptStatus = 'Y';
        var dataMaping = {}
        dataMaping.actId = $scope.ModelActType.id;
        dataMaping.deptId = $scope.ModeldeptId;

        if ($scope.action == "add") {

            $http.post("saveDept", {dataDept: dataDept, dataMaping: dataMaping}).then(function (response) {
                if (response.data.result.status == true) {
                    var data = {};
                    data.campusId = response.data.result.dataDept.campusId;
                    data.deptID = response.data.result.dataDept.id;
                    var actTypeId = response.data.result.dataMaping.actId;
                    data.actTypeID = actTypeId;
                    data.actTypeName = $scope.findObject($scope.listActivity, "id", actTypeId).actTypeName;
                    data.deptName = response.data.result.dataDept.deptName;
                    data.mapID = response.data.result.dataMaping.id;
                    data.masterId = response.data.result.dataDept.masterId;

                    if (listDept[campusId] != undefined) {
                        listDept[campusId].push(data);
                    }
                    $("#modal").modal('hide');
                } else {
                    alert('Error :' + response.data.result.msg);
                }
            });

        } else if ($scope.action == "edit") {

            dataMaping.id = $scope.ModelmapId;

            $http.post("editDept", {dataDept: dataDept, dataMaping: dataMaping}).then(function (response) {

                if (response.data.result.status == true) {
                    var data = {};
                    data.campusId = response.data.result.dataDept.campusId;
                    data.deptID = response.data.result.dataDept.id;
                    var actTypeId = response.data.result.dataMaping.actId;
                    data.actTypeID = actTypeId;
                    data.actTypeName = $scope.findObject($scope.listActivity, "id", actTypeId).actTypeName;
                    data.deptName = response.data.result.dataDept.deptName;
                    data.mapID = response.data.result.dataMaping.id;
                    data.masterId = response.data.result.dataDept.masterId;
                    if (listDept[campusId] != undefined) {
                        listDept[campusId][$scope.index] = data;
                    }
                    $("#modal").modal('hide');
                } else {
                    alert('Error :' + response.data.result.msg);
                }
            });
        }
    };

    $scope.saveCampus = function () {

        var param = {};
        param.campusName = $scope.ModelCamName;
        param.campusStatus = 'Y';

        $http.post("saveCam", {dataCampus: param}).then(function (response) {

            if (response.data.result.status == true) {

                $scope.listCampus.push(response.data.result.dataCampus);
                alert('Success');
            } else {
                alert('Error :' + response.data.result.msg);
            }
        });
    };

    $scope.showModal = function (action, data, index) {
        $scope.action = action;
        $scope.index = index; //for edit

        if ($scope.action == "add") {

            $scope.ModelCampus = "";
            $scope.ModeldeptName = "";
            $scope.ModeldeptId = "";
            $scope.ModelActType = "";
            $scope.ModelDeptMain = "";
            $("#modal").modal('show');

        } else if ($scope.action == "edit") {

            $scope.titleModal = "Edit " + data.deptName;
            var campusID = data.campusId;
            $scope.fetchDeptMainModal(campusID);
            $scope.ModelCampus = $scope.findObject($scope.listCampus, "id", campusID);
            $scope.ModelDeptMain = $scope.findObject($scope.listDeptMainModal, "id", data.masterId);
            $scope.ModelActType = $scope.findObject($scope.listActivity, "id", data.actTypeID);
            $scope.ModeldeptName = data.deptName;
            $scope.ModeldeptId = data.deptID;
            $scope.ModelmapId = data.mapID;
            $("#modal").modal('show');

        } else if ($scope.action == 'delete') {

            if (data.mapID == null || data.mapID == "null")
                data.mapID = -1;
            console.log(data.mapID);

            if (confirm('ต้องการปิดการใช้งาน ' + data.deptName + ' หรือไม่?')) {
                // Save it!
                $http.post("removeDept", {idDept: data.deptID, mapId: data.mapID}).then(function (response) {

                    if (response.data.result.status == true) {
                        $scope.listDept.splice($scope.index, 1);
                        alert('Success');
                    } else {
                        alert('Error :' + response.data.result.msg);
                    }
                });
            } else {
                // Do nothing!
            }
        } else if ($scope.action == 'enable') {
            if (data.mapID == null || data.mapID == "null")
                data.mapID = -1;

            if (confirm('ต้องการเปิดการใช้งาน ' + data.deptName + ' หรือไม่?')) {
                // Save it!
                $http.post("enableDepartment", {idDept: data.deptID, mapId: data.mapID}).then(function (response) {

                    if (response.data.result.status == true) {
                        $scope.listDept.splice($scope.index, 1);
                        alert('Success');
                    } else {
                        alert('Error :' + response.data.result.msg);
                    }
                });
            } else {
                // Do nothing!
            }
        }
    };

    $scope.tabShow = function (status) {
        $scope.tabShowStatus = status;
    };

    $scope.findObject = function (obj, attr, value) {

        for (var i = 0; i < obj.length; i++) {

            if (obj[i][attr] != undefined) {

                if (obj[i][attr] == value) {
                    return obj[i];
                }
            }
        }
        return "";
    };

});
