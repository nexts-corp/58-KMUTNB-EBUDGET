var myApp = angular.module('mappingPlanApp', ['commonApp']);



myApp.controller('mappingPlanController', function ($scope, $http, $controller,cde) {
    $controller('cmListController', {$scope: $scope});
    
   //$("[ng-app=mappingPlanApp]").show();
    
    $scope.init = function () {
        
        cde.setPath("bginfo","mappingPlan");
        $scope.cmListYear();
        $scope.cmList3dPlan();
        $scope.cmListFundgroup();
        
    };
    
    
    
    $scope.centerModal = function(){
        $('.modal-content').modal().css({
            'margin-top': function () {
                return ($(window).height() / 3);
            }
        });
    };
    
    $scope.openMapping = function(projectId){
        $scope.dataFGSelect = [];
        $scope.projectId = projectId;
        $scope.plan3dId = '';
        
        $("#modal-mapping").modal();
    };
    
    $scope.chagePlan3D = function(){
        $scope.dataFGSelect = [];
        
        
        if($scope.plan3dId!==null){
            
            $scope.loadfetchDataFG = 1;
            
            $http.post(cde.getPath("fetchDataFG"),{
                budgetPeriodId:$scope.selectYear,
                budgetProjectId:$scope.projectId,
                planId:$scope.plan3dId
            }).then(function(req) {
                var result = req.data.dataList;
                for(var i=0; i<result.length;i++){
                    $scope.dataFGSelect.push({id:result[i].fundgroupId});
                }
                $scope.loadfetchDataFG = 0;
            });
        }
        
        $scope.fundgroupId = '';
        
    };
    
    $scope.pushFGSelect = function(){
        var ch = 0;
        
        if($scope.fundgroupId!==''){
            
            for(var i=0; i<$scope.dataFGSelect.length;i++){
                if($scope.dataFGSelect[i].id===parseInt($scope.fundgroupId)){
                    ch=1;
                }
            }
            
            if(!ch){
                $scope.dataFGSelect.push({id:$scope.fundgroupId});
            }
            
            $scope.fundgroupId = '';
            
        }
    };
    
    $scope.delFGSelect = function(index){
        $scope.dataFGSelect.splice(index,1);
    };
    
    $scope.saveMappingPlan = function(){
        
        $scope.loadSaveMappingPlan = 1;
        
        $http.post(cde.getPath("saveMappingPlan"),{
            budgetPeriodId:$scope.selectYear,
            budgetProjectId:$scope.projectId,
            planId:$scope.plan3dId,
            fundgroupId:$scope.dataFGSelect
        }).then(function(req) {
            //console.log(req.data.result);
            $scope.loadSaveMappingPlan = 0;
        });
             
        
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
        $http.post(cde.getPath("fetchPlan"),{year:$scope.selectYear}).then(function(response) {
            if(response.data.dataList){
                $scope.dataPlan = response.data.dataList;
            }else{
                $scope.dataPlan=[];
            }
            
            $scope.waitDataList = false;
        });
    };
    
    
    
    
    
    
    
    
    
    

});
