var myApp = angular.module('EduDevPlan', ['commonApp']);

myApp.controller('mainController', function($scope,$http,$controller) {
    $controller('cmListController', {$scope: $scope});
    
    $scope.init = function () {
        $("[ng-app]").show();
        $scope.cmListYear();
        
        $scope.dataIssueAndTarget = []; 
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
   
   $scope.pageKpiAndStrategy = function(targetId,issueName,targetName){

       $scope.dataKpi = {};
       $scope.dataStrategy = {};
       $scope.fetchKpi(targetId);
       $scope.fetchStrategy(targetId);
       
       $scope.issueLabel = issueName;
       $scope.targetLabel = targetName;
       
       $scope.targetId = targetId;
       $scope.pageLevel = 2;
   };
   
   
   
    
    
    $scope.modal = function(action,type,editId,editName,arrayIndex,issueId) {
        $scope.action = action;
        $scope.type = type;
        $scope.textName = editName;
        $scope.idEdit = editId;
        $scope.arrayIndex = arrayIndex;
        $scope.issueId = issueId;
        
        $scope.centerModal();
        $("#modal").modal();
    };
    
    
    
    $scope.fetchType = function() {
        $http.get("fetchType").success(function(response) {
            //console.log(JSON.stringify(response.dataList, null, 4));
            $scope.dataType = response.dataList;
        });
    };
    
    $scope.checkHaveData = function(){
        if($scope.dataIssueAndTarget === null){
            
        }
    };
    
    $scope.fetchIssueAndTarget = function() {
        $scope.dataIssueAndTarget = 0;
        var sendData = {pData:{typeId:$scope.selectType}};
        
        $http.post("fetchIssueAndTarget",sendData).then(function(response) {
 
            $scope.dataIssueAndTarget = response.data.dataList;
            
        });

    };
    
    $scope.fetchKpi = function(targetId) {
        var sendData = {pData:{targetId:targetId}};
        $http.post("fetchKpi",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataKpi = response.data.dataList;
        });
    };
    
    $scope.fetchStrategy = function(targetId) {
        var sendData = {pData:{targetId:targetId}};
        $http.post("fetchStrategy",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataStrategy = response.data.dataList;
        });
    };
    
    
    
    
    
    $scope.saveData = function(){
        
        var pData = {};
        
        
        pData.id = $scope.idEdit;
        
        if($scope.type==="kpi"){
            pData.targetId = $scope.targetId;
            pData.kpiName = $scope.textName;
        }else if($scope.type==="strategy"){
            pData.targetId = $scope.targetId;
            pData.strategyName = $scope.textName;
        }else if($scope.type==="target"){
            pData.issueId = $scope.issueId;
            pData.targetName = $scope.textName;
        }else if($scope.type==="issue"){
            pData.typeId = $scope.selectType;
            pData.issueName = $scope.textName;
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
                var arrayTarget = {idTarget:response.data.dataList.id,nameTarget:response.data.dataList.targetName};
                if($scope.action==="add"){
                    //console.log(JSON.stringify(response.data.dataList.targetName, null, 4));
                    if($scope.dataIssueAndTarget[$scope.arrayIndex].hasOwnProperty('target')){
                        $scope.dataIssueAndTarget[$scope.arrayIndex].target.push(arrayTarget);  
                        console.log($scope.dataIssueAndTarget[$scope.arrayIndex].target);
                    }else{
                        var arrayTarget = [{idTarget:response.data.dataList.id,nameTarget:response.data.dataList.targetName}];
                        $scope.dataIssueAndTarget[$scope.arrayIndex].target = arrayTarget;
                    }
                    
                }else if($scope.action==="edit"){
                    $scope.dataIssueAndTarget[$scope.arrayIndex].target[$scope.findIndexObject($scope.dataIssueAndTarget[$scope.arrayIndex].target,"idTarget",$scope.idEdit)].nameTarget=$scope.textName;
                }
            }else if($scope.type==="issue"){
                var arrayIssue = {idIssue:response.data.dataList.id,nameIssue:response.data.dataList.issueName};
                if($scope.action==="add"){
                    $scope.dataIssueAndTarget.push(arrayIssue);
                }else if($scope.action==="edit"){
                    $scope.dataIssueAndTarget[$scope.findIndexObject($scope.dataIssueAndTarget,"idIssue",$scope.idEdit)].nameIssue=$scope.textName;
                }
            }
            
            $("#modal").modal('hide');
        });
        
    };
    
    
    
    
    $scope.delData = function(type,delId,arrayIndex){
        if(confirm("ยืนยันการลบข้อมูล")){
            var sendData = {pData:{id:delId}};
            $http.post("del"+$scope.firstLetterUpperCase(type),sendData).then(function(response) {
                if(type==="kpi"){
                    $scope.dataKpi.splice($scope.findIndexObject($scope.dataKpi,"id",response.data.dataList.id), 1);
                }else if(type==="strategy"){
                    $scope.dataStrategy.splice($scope.findIndexObject($scope.dataStrategy,"id",response.data.dataList.id), 1);
                }else if(type==="target"){
                    $scope.dataIssueAndTarget[arrayIndex].target.splice($scope.findIndexObject($scope.dataIssueAndTarget[arrayIndex].target,"idTarget",response.data.dataList.id), 1);
                }else if(type==="issue"){
                    $scope.dataIssueAndTarget.splice($scope.findIndexObject($scope.dataIssueAndTarget,"idIssue",response.data.dataList.id), 1);
                }
                
            });
        }
    };
    
    
    
    
    
    
    
    
    
});
