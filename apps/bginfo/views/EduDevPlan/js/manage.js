var myApp = angular.module('EduDevPlan', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('mainController', function($scope,$http) {
    
    
    $scope.init = function () {
        $scope.pageLevel = 1;
        $scope.fetchType();
    };
    
    
    
    
    
    
    
    
    
    $scope.findIndexObject = function(obj, attr, value){
        for(var i = 0; i < obj.length; i += 1) {
            if(obj[i][attr] === value) {
                return i;
            }
        }
    };
    
    
    $scope.firstLetterUpperCase = function(value){
      return value.substr(0, 1).toUpperCase() + value.substr(1);
    };
    
    
    $scope.centerModal = function(){
            $('.modal-content').modal().css({
                'margin-top': function () {
                    return ($(window).height() / 3);
                }
            });
    };
    
   
   
   
   
    $scope.pageIssueAndTarget = function(){
         $scope.pageLevel = 1;
    };
   
   $scope.pageKpiAndStrategy = function(targetId){
       //console.log(targetId);
       $scope.dataKpi = {};
       $scope.dataStrategy = {};
       $scope.fetchKpi(targetId);
       $scope.fetchStrategy(targetId);
       $scope.targetId = targetId;
       $scope.pageLevel = 2;
   };
   
   
   
    
    
    $scope.modal = function(action,type,editId,editName,arrayIndex,refId) {
        $scope.action = action;
        $scope.type = type;
        $scope.textName = editName;
        $scope.idEdit = editId;
        
        $scope.arrayIndex = arrayIndex;
        $scope.refId = refId;
        
        $scope.centerModal();
        $("#modal").modal();
    };
    
    
    
    $scope.fetchType = function() {
        $http.get("fetchType").success(function(response) {
            //console.log(JSON.stringify(response.dataList, null, 4));
            $scope.dataType = response.dataList;
        });
    };
    
    $scope.fetchIssueAndTarget = function() {
        
        var sendData = {pData:{mainPlanTypeId:$scope.selectPlan}};
        $http.post("fetchIssueAndTarget",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataIssueAndTarget = response.data.dataList;
        });

    };
    
    $scope.fetchKpi = function(targetId) {
        var sendData = {pData:{mainPlanTargetId:targetId}};
        $http.post("fetchKpi",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataKpi = response.data.dataList;
        });
    };
    
    $scope.fetchStrategy = function(targetId) {
        var sendData = {pData:{mainPlanTargetId:targetId}};
        $http.post("fetchStrategy",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataStrategy = response.data.dataList;
        });
    };
    
    
    
    
    
    $scope.saveData = function(){
        
        var pData = {};
        
        
        pData.id = $scope.idEdit;
        
        if($scope.type==="kpi"){
            pData.mainPlanTargetId = $scope.targetId;
            pData.kpiName = $scope.textName;
        }else if($scope.type==="strategy"){
            pData.mainPlanTargetId = $scope.targetId;
            pData.strategyName = $scope.textName;
        }else if($scope.type==="target"){
            pData.mainPlanIssueId = $scope.refId;
            pData.targetName = $scope.textName;
        }
        
        var sendData = {pData:pData};
        
        
        
        //console.log(JSON.stringify(pData, null, 4));
        $http.post("save"+$scope.firstLetterUpperCase($scope.type),sendData).then(function(response) {
            
            if($scope.type==="kpi"){
                if($scope.action==="add"){
                    $scope.dataKpi.push(response.data.dataList);
                }else if($scope.action==="edit"){
                    $scope.dataKpi[$scope.findIndexObject($scope.dataKpi,"id",$scope.idEdit)].kpiName=$scope.textName;
                }
            }else if($scope.type==="strategy"){
                if($scope.action==="add"){
                    $scope.dataStrategy.push(response.data.dataList);
                }else if($scope.action==="edit"){
                    $scope.dataStrategy[$scope.findIndexObject($scope.dataStrategy,"id",$scope.idEdit)].strategyName=$scope.textName;
                }
            }else if($scope.type==="target"){
                if($scope.action==="add"){
                    $scope.dataIssueAndTarget[$scope.arrayIndex].target.push(response.data.dataList);
                }else if($scope.action==="edit"){
                    $scope.dataIssueAndTarget[$scope.findIndexObject($scope.dataStrategy,"id",$scope.idEdit)].strategyName=$scope.textName;
                }
            }
            
            $("#modal").modal('hide');
        });
        
    };
    
    
    
    
    $scope.delData = function(type,delId){
        
        if(confirm("ยืนยันการลบข้อมูล")){
            var sendData = {pData:{id:delId}};
            $http.post("del"+$scope.firstLetterUpperCase(type),sendData).then(function(response) {
                if($scope.type==="kpi"){
                    $scope.dataKpi.splice($scope.findIndexObject($scope.dataKpi,"id",response.data.dataList.id), 1);
                }else if($scope.type==="strategy"){
                    $scope.dataStrategy.splice($scope.findIndexObject($scope.dataStrategy,"id",response.data.dataList.id), 1);
                }
                
            });
        }
    };
    
    
    
    
    
    
    
    
    
});
