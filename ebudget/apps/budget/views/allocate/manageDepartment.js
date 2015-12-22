myApp.directive('managedepartmentTemplate', function() {
  return {
    restrict: 'E',
    templateUrl: js_context_path+'/apps/budget/views/allocate/manageDepartment.html'
  };
});

myApp.controller('manageDepartment', function($scope,$http,$controller,cde,nk) {
    $controller('cmListController', {$scope: $scope});
    
    $scope.checkSelectAll = function(){
        return $scope.plan3dId && $scope.fundgroupId && $scope.bgCategory;
    };
    
    $scope.init = function(){
        cde.setPath("budget","allocate");
        $('[ng-app]').show();
        $scope.cmListFundgroup();
        $scope.cmList3dPlan();
        $scope.facultyCurrent = allDepArr[$scope.param.facultyId].name;
        $scope.departmentCurrent = allDepArr[$scope.param.deptId].name;
        $scope.getSumRevenuePlan();
    };
    
    
    $scope.fetchRevenueItemList = function () {
        
        $scope.dataRevenueItemList=[];
        if($scope.checkSelectAll()){
            
            $scope.loadRevenueItemList = 1;
            $http.post(cde.getPath("getRevenueItemList"),{
                budgetPeriodId:$scope.param.budgetPeriodId,
                deptId:$scope.param.deptId,
                l3dPlanId:$scope.plan3dId,
                fundgroupId:$scope.fundgroupId,
                bgCategory:$scope.bgCategory
            }).then(function (response) {
                $scope.dataRevenueItemList = response.data.dataList;

                $scope.loadRevenueItemList = 0;
            });
        }
    };
    
    
    $scope.sumRevenuePlan = function(){
        if(!$scope.dataSumRevenuePlan){
            return 0;
        }else if($scope.bgCategory==="E"){
            return $scope.dataSumRevenuePlan[0].education;
        }else if($scope.bgCategory==="S"){
            return $scope.dataSumRevenuePlan[0].service;
        }else{
            return 0;
        }
    };
    
    $scope.getSumRevenuePlan = function(){
        
        $scope.loadSumRevenuePlan  = 1;
        $http.post(cde.getPath("getSumRevenuePlan"),{
            budgetPeriodId:$scope.param.budgetPeriodId,
            facultyId:$scope.param.facultyId,
            bgCategory:$scope.bgCategory
        }).then(function (response) {
            $scope.dataSumRevenuePlan = response.data.dataList;
            $scope.loadSumRevenuePlan = 0;
        });
    };
    
    
    $scope.sumRevenue = function(){
        if(!$scope.dataSumRevenue){
            return 0;
        }else{
            if($scope.dataSumRevenue[0].value===null){
                return 0;
            }
            return $scope.dataSumRevenue[0].value;
        }
    };
    
    $scope.getSumRevenue = function(){
        if($scope.bgCategory){
            $scope.loadSumRevenue  = 1;
            $http.post(cde.getPath("getSumRevenue"),{
                budgetPeriodId:$scope.param.budgetPeriodId,
                facultyId:$scope.param.facultyId,
                bgCategory:$scope.bgCategory
            }).then(function (response) {
                $scope.dataSumRevenue = response.data.dataList;
                $scope.loadSumRevenue = 0;
            });
        }
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
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]];

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
            var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]];
            
            if(arrUse.nameText && (arrUse.valueText!=null && arrUse.valueText!=0)){
                $scope.addItemPlanList(index);
            }
        }
        
    };
    
    
    $scope.conDataButton = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]].data[indexSplit[2]];
        return (arrUse.name!==arrUse.nameC) || (arrUse.value!==arrUse.valueC) || (arrUse.detail!==arrUse.detailC);
    };
    
    $scope.addItemPlanList = function(index){
        
        var indexSplit = index.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]];
        
        $http.post(cde.getPath("insertRevenueItem"),{
            budget:{
                budgetPeriodId:$scope.param.budgetPeriodId,
                deptId:$scope.param.deptId,
                l3dPlanId:$scope.plan3dId,
                fundgroupId:$scope.fundgroupId,
                revenueName:arrUse.nameText,
                bgAmount:arrUse.valueText,
                budgetTypeId:arrUse.id,
                budgetTypeCode:'K',
                bgCategory:$scope.bgCategory,
                revenueDesc:arrUse.detailText
            },
            facultyId:$scope.param.facultyId
        }).then(function (response) {
            //$scope.dataRevenueItemList = response.data.dataList;
            $scope.getSumRevenue();
            arrUse.data.push({
                id:response.data.result.msg,
                name:arrUse.nameText,
                value:arrUse.valueText,
                nameC:arrUse.nameText,
                valueC:arrUse.valueText,
                detail:arrUse.detailText,
                detailC:arrUse.detailText
            });

            arrUse.nameText = "";
            arrUse.valueText = "";
            arrUse.detailText = "";
            $scope.toggleFocus(arrUse);

        });
        
    };
    
    $scope.upItemPlanList = function(index){
        
        
        var indexSplit = index.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]].data[indexSplit[2]];
        
        $http.post(cde.getPath("updateRevenueItem"),{
            budget:{
                id:arrUse.id,
                revenueName:arrUse.name,
                bgAmount:parseFloat(arrUse.value),
                revenueDesc:arrUse.detail
            }
        }).then(function (response) {
            $scope.getSumRevenue();

            arrUse.nameC = arrUse.name;
            arrUse.valueC = arrUse.value;
            arrUse.detailC = arrUse.detail;
        });
        
        
    };
    
    $scope.undoItemPlanList = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]].data[indexSplit[2]];
        
        arrUse.name = arrUse.nameC;
        arrUse.value = arrUse.valueC;
        arrUse.detail = arrUse.detailC;
    };
    
    $scope.delItemPlanList = function(index,id){
        if(confirm("ยืนยันการลบ")){
            
            $http.post(cde.getPath("deleteRevenueItem"),{
                budgetId:id
            }).then(function (response) {
                $scope.getSumRevenue();
                var indexSplit = index.split('.');
                $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]].data.splice(indexSplit[2],1);
            });
        }
        
    };
    
    
    $scope.sumList = function(index){
        
        var indexSplit = index.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]];
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
        var arrUse = $scope.dataRevenueItemList[index];
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
        var arrUse = $scope.dataRevenueItemList;
        
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
    
    
    
    
    var indexForDetail = null;
    
    $scope.openDetail = function(text,index){
        $("#modal-detail").modal();
        $scope.textDetail = text;
        indexForDetail = index;
    };
    
    $scope.saveDetail = function(){
        
        var indexSplit = indexForDetail.split('.');
        var arrUse = $scope.dataRevenueItemList[indexSplit[0]].sub[indexSplit[1]];
        
        
        
        if(indexSplit.length===2){
            
            arrUse.detailText = $scope.textDetail;
            
        }else if(indexSplit.length===3){
            
            arrUse.data[indexSplit[2]].detail = $scope.textDetail;
            
        }
    };
    
   
    
    
    
});

