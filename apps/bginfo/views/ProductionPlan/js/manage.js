var myApp = angular.module('viewPlan', ['commonApp']);



myApp.controller('tableController', function ($scope, $http, $controller) {
    $controller('cmListController', {$scope: $scope});
    

    

    $scope.init = function () {
        $("[ng-app]").show();
        $scope.cmListYear();
        
        $scope.fetchPlan3D();
        

    };
    
    
    $scope.findIndexObject = function(obj, attr, value){
        for(var i = 0; i < obj.length; i += 1) {
            if(obj[i][attr] === value) {
                return i;
            }
        }
    };
    
    $scope.treeToggle = function(val,index){
        var value = true;
        if(val){ value = false; }
        $scope.dataPlan[index].show=value;
    };
    
    
    
    
    $scope.fetchPlan = function(){
        $scope.waitDataList = true;
        $scope.dataPlan=[];
        $scope.addPlanText = "";
        $http.post("fetchPlan",{year:$scope.selectYear}).then(function(response) {
            if(response.data.dataList){
                $scope.dataPlan = response.data.dataList;
            }else{
                $scope.dataPlan=[];
            }
            
            $scope.waitDataList = false;
        });
    };
    
    $scope.focusAddPlanText = function(){
        $("[ng-model=addPlanText]").focus();
    };
    
    
    
    
    
    $scope.addItem = function(index,id){
        var indexArray = String(index).split(".");
        var value = null;
        
        if(indexArray.length===1){
             /*เพิ่มแผนงาน*/
            
             
            $http.post("savePlan",{
                dataParam:{
                    periodId:$scope.selectYear,
                    planName:$scope.addPlanText
                    
                }
            }).then(function(req) {
                value = {
                    idPlan:req.data.dataList.id,
                    planName:req.data.dataList.planName,
                    checkPlanName:req.data.dataList.planName,
                    show:false,
                    produce:[],
                    project:[]
                 };
                 $scope.dataPlan.push(value);
                 $scope.addPlanText = "";
            });
             
             
             
             
        }else if(indexArray.length===2){
            var type = null;
            if(indexArray[1]==="produce"){
                type = 1;
            }else if(indexArray[1]==="project"){
                type = 2;
            }
            
            /*เพิ่มผลผลิตหรือเพิ่มโครงการ*/
            $http.post("saveBudgetProject",{
                dataParam:{
                    planId:id,
                    projectType:type,
                    projectName:$scope.dataPlan[indexArray[0]].addText[indexArray[1]]
                    
                }
            }).then(function(req) {
                value = {
                    id:req.data.dataList.id,
                    name:req.data.dataList.projectName,
                    checkName:req.data.dataList.projectName
                };
                $scope.dataPlan[indexArray[0]][indexArray[1]].push(value);
                $scope.dataPlan[indexArray[0]].addText[indexArray[1]] = "";
            });
             
            
        }
        
    };
    
    
    $scope.editItem = function(index,id){
        
        var indexArray = String(index).split(".");
        
        if(indexArray.length===1){
            /*แก้ไขแผนงาน*/
            $http.post("savePlan",{
                dataParam:{
                    id:id,
                    planName:$scope.dataPlan[indexArray[0]]['planName']
                    
                }
            }).then(function(req) {
                $scope.dataPlan[indexArray[0]]['checkPlanName'] = req.data.dataList.planName;
            });
            
            
        }else if(indexArray.length===3){
            /*แก้ไขผลผลิตหรือแก้ไขโครงการ*/
            
            $http.post("saveBudgetProject",{
                dataParam:{
                    id:id,
                    projectName:$scope.dataPlan[indexArray[0]][indexArray[1]][indexArray[2]]['name']
                }
            }).then(function(req) {
                $scope.dataPlan[indexArray[0]][indexArray[1]][indexArray[2]]['checkName'] = req.data.dataList.projectName;
            });
            
            
            
            
        };
        
        
    };
    
    
    $scope.delItem = function(index,id){
        if(confirm("ยืนยันการลบข้อมูล")){
            var strIndex = String(index);
            var indexArray = strIndex.split(".");
            if(indexArray.length===1){

                $http.post("delPlan",{
                    dataParam:{
                        id:id
                    }
                }).then(function() {
                    $scope.dataPlan.splice(indexArray[0], 1);
                });


            }else if(indexArray.length===3){

                $http.post("delBudgetProject",{
                    dataParam:{
                        id:id
                    }
                }).then(function() {
                    $scope.dataPlan[indexArray[0]][indexArray[1]].splice(indexArray[2], 1);
                });

            };
        }
        
        
    };

    //console.log(JSON.stringify($scope.dataPlan[indexArray[0]][indexArray[1]], null, 4));










    $scope.fetchPlan3D = function(){
        $scope.waitDataList3D = true;
        $scope.dataPlan3D=[];
        $scope.addPlanText3D = "";
        $http.post("fetchPlan3D",{}).then(function(response) {
            
            var dataReq = response.data.dataList;
            if(dataReq){
                for(var i=0;i<dataReq.length; i++){
                    dataReq[i].checkPlanName = dataReq[i].planName;
                    dataReq[i].checkId = dataReq[i].id;
                }
                $scope.dataPlan3D = dataReq;
                $scope.waitDataList3D = false;
            }else{
                $scope.dataPlan=[];
            }
        });
    };
    
    
    
    
    
    $scope.addItem3D = function(){

            $http.post("savePlan3D",{
                dataParam:{
                    id:parseInt($scope.addPlanTextId3D),
                    planName:$scope.addPlanText3D
                    
                },
                action:"add"
            }).then(function(req) {
                value = {
                    id:req.data.dataList.id,
                    checkId:req.data.dataList.id,
                    planName:req.data.dataList.planName,
                    checkPlanName:req.data.dataList.planName
                    
                };
                $scope.dataPlan3D.push(value);
                $scope.addPlanText3D = "";
                $scope.addPlanTextId3D = "";
                console.log(JSON.stringify($scope.dataPlan3D, null, 4));
            });
             
        
    };
    
    
    $scope.editItem3D = function(index,id){

            $http.post("savePlan3D",{
                dataParam:{
                    id:parseInt(id),
                    planName:$scope.dataPlan3D[index].planName
                    
                },
                action:"edit"
            }).then(function(req) {
                $scope.dataPlan3D[index].checkPlanName = $scope.dataPlan3D[index].planName;
                //console.log(JSON.stringify($scope.dataPlan3D, null, 4));
            });
             
        
    };
    
    
    $scope.delItem3D = function(index,id){
        if(confirm("ยืนยันการลบข้อมูล")){
            
                $http.post("delPlan3D",{
                    dataParam:{
                        id:id
                    }
                }).then(function() {
                    $scope.dataPlan3D.splice(index, 1);
                });
                
        }
        
        
    };
    

});
