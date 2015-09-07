var myApp = angular.module('EduDevPlan', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('mainController', function($scope,$http) {
    
    
    $scope.init = function () {
        $scope.selectYear = 2558;
        $scope.idLevel  = [];
        $scope.fetchBudgetType(0,"start");
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

   
    
    
    $scope.fetchBudgetType = function(masterId,action) {
        if(action==="start"){
            $scope.idLevel = [masterId];
        }if(action==="next"){
            if(!$scope.findValueArray($scope.idLevel,masterId)){
               $scope.idLevel.push(masterId); 
            }
        }else if(action==="back"){
            $scope.idLevel.splice($scope.idLevel.length-1, 1);
        }
        
        $scope.masterId = masterId;
        //console.log($scope.findValueArray($scope.idLevel,0));
        var sendData = {pData:{budgetYear:$scope.selectYear,masterId:masterId,isActive:1}};
        $http.post("fetchBudgetType",sendData).then(function(response) {
            //console.log(JSON.stringify(response.data.dataList, null, 4));
            $scope.dataBudgetType = response.data.dataList;
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