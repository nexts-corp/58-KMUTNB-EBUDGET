var myApp = angular.module('EduDevPlan', ['commonApp']);

myApp.controller('mainController', function($scope,$http,$controller) {
    $controller('cmListController', {$scope: $scope});

    $scope.init = function () {
        $scope.cmListYear();
        
        $scope.dataBudgetType = [];
        $scope.idLevel  = [];
        $scope.nameLevel  = [];
        $scope.nametextLevel  = "";
        
        
        
    };
    
    
    $scope.findIndexObject = function(obj, attr, value){
        for(var i = 0; i < obj.length; i += 1) {
            if(obj[i][attr] === value) {
                return i;
            }
        }
    };
    
    $scope.findValueArray = function(arr,value){
        var check = 0;
        for(var i = 0; i < arr.length; i += 1) {
            
            if(arr[i] === value) {
                check = 1;
            }
        }
        return check;
    };
    
    $scope.centerModal = function(){
            $('.modal-content').modal().css({
                'margin-top': function () {
                    return ($(window).height() / 3);
                }
            });
    };
    
    $scope.modal = function(action,editId,name) {
        $scope.action = action;
        $scope.textName = name;
        $scope.editId = editId;
        
        $scope.centerModal();
        $("#modal").modal();
    };

   
    $scope.soitTextName = function(){
        var text="ลำดับชั้นประเภทหมวดรายจ่าย : ";
        var check = 0;
        for(var i = 0; i < $scope.nameLevel.length; i += 1) {
            if(i>0){
                text += " > ";
            }
            text += $scope.nameLevel[i];
            check = 1;
        }
        
        if(!check){ text=""; }
        $scope.nametextLevel = text;
    };
    
    $scope.fetchBudgetType = function(masterId,action,name) {
        $scope.dataBudgetType = 0;
        
        if(action==="start"){
            $scope.idLevel = [masterId];
            $scope.nameLevel  = [];
        }if(action==="next"){
            if(!$scope.findValueArray($scope.idLevel,masterId)){
               $scope.idLevel.push(masterId); 
               $scope.nameLevel.push(name);
            }
        }else if(action==="back"){
            $scope.idLevel.splice($scope.idLevel.length-1, 1);
            $scope.nameLevel.splice($scope.nameLevel.length-1,1);
            
        }
        
        $scope.masterId = masterId;
        //console.log($scope.findValueArray($scope.idLevel,0));
        var sendData = {pData:{budgetYear:$scope.selectYear,masterId:masterId,isActive:1}};
        $http.post("fetchBudgetType",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataBudgetType = response.data.dataList;
            $scope.soitTextName();
        });
    };
    
    
    $scope.back = function(){
        $scope.fetchBudgetType($scope.idLevel[$scope.idLevel.length-2],"back");
    };
    
    $scope.saveData = function(){
        console.log("test");
        var pData = {};
        pData.typeName = $scope.textName;
        pData.id = $scope.editId;
        pData.masterId = $scope.masterId;
        pData.budgetYear = $scope.selectYear;
        pData.isActive = 1;
        
        var sendData = {pData:pData};
        $http.post("saveBudgetType",sendData).then(function(response) {
            if($scope.action==="add"){
                $scope.dataBudgetType.push(response.data.dataList);
            }else if($scope.action==="edit"){
                $scope.dataBudgetType[$scope.findIndexObject($scope.dataBudgetType,"id",$scope.editId)].typeName=$scope.textName;
            }
            $("#modal").modal('hide');
        });
    };
    
    $scope.delData = function(delId){
        
        if(confirm("ยืนยันการลบข้อมูล")){
            var sendData = {pData:{id:delId,isActive:0}};
            $http.post("delBudgetType",sendData).then(function(response) {
                $scope.dataBudgetType.splice($scope.findIndexObject($scope.dataBudgetType,"id",response.data.dataList.id), 1);
            });
        }
    };
    
    
    
});
