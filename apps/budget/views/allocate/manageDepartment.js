//ngContextPath


var myApp = angular.module('managePlanning', ['commonApp']);

myApp.controller('mainCtrl', function($scope,$http,$controller,cde) {
    $controller('cmListController', {$scope: $scope});
    
    $scope.init = function(){
        $('[ng-app]').show();
        //$scope.cmListYear();
        //$scope.cmListBudgetType();
        $scope.cmListDepartment();
        $scope.cmListFundgroup();
        $scope.cmListBudgetPlan();
        $scope.fetchBudgetTypeTree();
        
        $scope.testPath = cde.path("user//delete");
        //
        //$('[ng-model=education],[ng-model=academic]').number( true, 2 );
    };
    
    $scope.fetchBudgetTypeTree = function () {
        $scope.loadBttP1 = 1;
        $http.post(ngContextPath+"/api/budget/allocate/budgetTypeTree").then(function (response) {
            
            $scope.dataBudgetTypeTree = response.data.dataList;
            
            $scope.loadBttP1 = 0;
            $scope.dataBttP1 = response.data.dataList;
//            $scope.preDataBttP1 = response.data.dataList;
//            for(var i=0;i<$scope.preDataBttP1.length;i++){
//                for(var j=0;j<$scope.preDataBttP1[i].sub.length;j++){
//                    for(var k=0;k<$scope.preDataBttP1[i].sub[j].data.length;j++){
//                        $scope.preDataBttP1[i].sub[j].data[k].nameC = $scope.preDataBttP1[i].sub[j].data[k].name;
//                    }
//                }
//            }
//            $scope.dataBttP1 = $scope.preDataBttP1;
            
        });
    };
    
    
    
//    $scope.sumProceeds = function(){
//        
//        var val1 =  parseFloat($scope.education);
//        if(isNaN(val1)){
//            val1 = 0; 
//        }
//        
//        var val2 =  parseFloat($scope.academic);
//        if(isNaN(val2)){
//            val2 = 0; 
//        }
//
//        return val1+val2;
//    };
    
    $scope.toggleShow = function(index,val){
        var indexSplit = index.split('.');
        var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]];

        if(val){
            arrUse.show = 0;
        }else{
            arrUse.show = 1;
        }
    };
    
    $scope.toggleFocus = function(model){
        if(model.toggleFocus){
           model.toggleFocus = false; 
        }else{
           model.toggleFocus = true;
        }
    };
    
    
    $scope.addItemByEnter = function(index,keyEvent){
        
        if (keyEvent.which === 13){
            var indexSplit = index.split('.');
            var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]];
            
            if(arrUse.nameText && (arrUse.valueText!=null && arrUse.valueText!=0)){
                $scope.addItemPlanList(index);
            }
        }
        
    };
    
    
    $scope.addItemPlanList = function(index){
        
        var indexSplit = index.split('.');
        var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]];
        
        arrUse.data.push({
            name:arrUse.nameText,
            value:arrUse.valueText,
            nameC:arrUse.nameText,
            valueC:arrUse.valueText
        });
        
        arrUse.nameText = "";
        arrUse.valueText = "";
        $scope.toggleFocus(arrUse);
        
    };
    
    $scope.upItemPlanList = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]].data[indexSplit[2]];
        
        arrUse.nameC = arrUse.name;
        arrUse.valueC = arrUse.value;
    };
    
    $scope.undoItemPlanList = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]].data[indexSplit[2]];
        
        arrUse.name = arrUse.nameC;
        arrUse.value = arrUse.valueC;
    };
    
    $scope.delItemPlanList = function(index){
        if(confirm("ยืนยันการลบ")){
            var indexSplit = index.split('.');
            $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]].data.splice(indexSplit[2],1);
        }
    };
    
    
    $scope.sumList = function(index){
        
        var indexSplit = index.split('.');
        var arrUse = $scope.dataBttP1[indexSplit[0]].sub[indexSplit[1]];
        var val = 0;
        
        for(var i=0;i<arrUse.data.length;i++){
            val += parseFloat(arrUse.data[i].value);
        }
        
        
        if(arrUse.valueText!==""){
            if(!isNaN(arrUse.valueText)){
                val += parseFloat(arrUse.valueText);
            }
        }
        
        arrUse.sumValue = val;
        
        return val;
    };
    
    
    $scope.sumBudget = function(index){
        var arrUse = $scope.dataBttP1[index];
        var val = 0;
        
        for(var i=0;i<arrUse.sub.length;i++){
            if(!isNaN(arrUse.sub[i].sumValue)){
                val += parseFloat(arrUse.sub[i].sumValue);
            }
        }
        arrUse.sumValue = val;
        return val;
    };
    
    
    $scope.sumAll = function(){
        var arrUse = $scope.dataBttP1;
        
        if(typeof(arrUse)!=="undefined"){
            //console.log(arrUse);
            var val = 0;
            for(var i=0;i<arrUse.length;i++){

                if(!isNaN(arrUse[i].sumValue)){
                    val += parseFloat(arrUse[i].sumValue);
                }

            }
            return val;
        }
    };
    
    
    
});

