//ngContextPath


var myApp = angular.module('managePlanning', ['commonApp']);

myApp.controller('mainCtrl', function($scope,$http,$controller,cde) {
    $controller('cmListController', {$scope: $scope});
    $controller('nkController', {$scope: $scope});
    
    
    $scope.init = function(){
        cde.setPath('budget','allocate');
        
        $('[ng-app]').show();
        $scope.cmListYear();
        $scope.cmListBudgetType();
        $scope.cmListDepartment();
        
        
        $scope.dataAllocate = [];
        
        //manage allocate project for Planning
        $scope.manageAPP = {
                projectTxt:'',
                depTxt:[{depId:'',depValue:0}],
                data:[]
        };
    };
    
    
    
    $scope.fetchItem = function(){
        $scope.dataAllocate=[];
        if($scope.selectYear){
            $scope.loadAllocate = 1;


            $http.post(cde.getPath("fetchRevenue"),{
                budgetPeriodId : $scope.selectYear
            }).then(function(response) {
                if(response.data.dataList!==null){
                    $scope.dataAllocate = response.data.dataList;
                }

                $scope.loadAllocate = 0;
            });
        }
    };
    
    $scope.checkAddItem = function(){
        return $scope.department&&$scope.education&&$scope.academic;
    };
    
    $scope.addItemByEnter = function(keyEvent){
        if (keyEvent.which === 13){
            if($scope.checkAddItem()){
                $scope.addItem();
            }
        }
    };
    
    $scope.addItem = function(){
        
        
        $http.post(cde.getPath("addRevenue"),{
            
            budgetPeriodId : $scope.selectYear,
            deptId : parseInt($scope.department),
            bgEducation : $scope.education,
            bgService : $scope.academic
            
        }).then(function(response) {
            //console.log(JSON.stringify(response.data.result, null, 4));
            //$scope.dataKpi = response.data.result;
            if(response.data.result){
                
                $scope.dataAllocate.push({
                    id:response.data.result,
                    department:parseInt($scope.department),
                    departmentC:parseInt($scope.department),
                    education:$scope.education,
                    educationC:$scope.education,
                    academic:$scope.academic,
                    academicC:$scope.academic
                });

                $scope.education = "";
                $scope.academic = "";
                $scope.department = "udf";
                
                $scope.nkFocus('focusDepartment');
            }
            
        });
        
        
    };
    
    
    $scope.checkEditItem = function(index){
        var arrUse = $scope.dataAllocate[index];
        return (arrUse.department!==arrUse.departmentC)||(arrUse.education!==arrUse.educationC)||(arrUse.academic!==arrUse.academicC);
    };
    
    $scope.editItemByEnter = function(index,keyEvent){
        if (keyEvent.which === 13){
            if($scope.checkEditItem(index)){
                $scope.editItem(index);
            }
        }
    };
    
    $scope.editItem = function(index){
        var arrUse = $scope.dataAllocate[index];
        $http.post(cde.getPath("updateRevenue"),{
            id : arrUse.id,
            bgEducation : arrUse.education,
            bgService : arrUse.academic
        }).then(function(response) {
            if(response.data.result){
                arrUse.departmentC = parseInt(arrUse.department);
                arrUse.educationC = arrUse.education;
                arrUse.academicC = arrUse.academic;
            }
        });
        
    };
    
    
    
    $scope.delItem = function(index){
        if(confirm("ยืนยันการลบ")){
            $http.post(cde.getPath("deleteRevenue"),{
                id:$scope.dataAllocate[index].id
            }).then(function(response) {
                if(response.data.result){
                    $scope.dataAllocate.splice(index,1);
                }
            });
            
        }
    };
    
    
    $scope.sumRows = function(val1,val2){
        return parseFloat(val1)+parseFloat(val2);
    };
    
    
    $scope.sumProceeds = function(){
        
        var val1 =  parseFloat($scope.education);
        if(isNaN(val1)){
            val1 = 0; 
        }
        
        var val2 =  parseFloat($scope.academic);
        if(isNaN(val2)){
            val2 = 0; 
        }

        return val1+val2;
    };
    
    
    
    $scope.setMaster = function(list){
        return (list.masterId === 0);
    };
    
    
    
    
    
    
    
    
    
    
    
    
    $scope.toggleShow = function(index){
        var arrUse = $scope.manageAPP.data[index];
        if(arrUse.show){
            arrUse.show = 0;
        }else{
            arrUse.show = 1;
        }
    };
    
    
    
    $scope.fetchItemAPP = function(){
        $scope.manageAPP.data=[];
        if($scope.selectYear){
            $scope.loadManageAPP = 1;


            $http.post(cde.getPath("fetchExpenseProject"),{
                budgetPeriodId : $scope.selectYear
            }).then(function(response) {
                if(response.data.dataList!==null){
                    $scope.manageAPP.data = response.data.dataList;
                }

                $scope.loadManageAPP = 0;
            });
        }
    };
    
    
    $scope.pushDepTxt = function(last){

        if(last){
            $scope.manageAPP.depTxt.push({
                depId:'',
                depValue:0
            });
        }
    };
    
    
    
    $scope.delDepTxt = function(index){
        $scope.manageAPP.depTxt.splice(index,1);
    };
    
    $scope.addItemAPP = function(){
        var lengthOfDepTxt = $scope.manageAPP.depTxt.length;
        $scope.manageAPP.depTxt[lengthOfDepTxt-1].depValue = 0;
        
        var preData = {
            pName:$scope.manageAPP.projectTxt,
            pNameC:$scope.manageAPP.projectTxt,
            sub:$scope.manageAPP.depTxt,
            subC:[],
            show:1
        };
        
        angular.copy(preData.sub,preData.subC);
        
        var deptId = [];
        var budgetTotal = [];
        
        for(var i=0;i<(preData.sub.length-1);i++){
            deptId.push(preData.sub[i].depId);
            budgetTotal.push(parseFloat(preData.sub[i].depValue));
        }
        //console.log(budgetTotal);
        //console.log(preData.sub[0].depValue);
        $http.post(cde.getPath("addExpenseProject"),{
            projectName:preData.pName,
            budgetPeriodId:$scope.selectYear,
            budgetTotal:budgetTotal,
            deptId:deptId
        }).then(function(response) {
            if(response.data.result){
                preData.id = response.data.result;
                $scope.manageAPP.data.push(preData);
                $scope.manageAPP.projectTxt = '';
                $scope.manageAPP.depTxt=[{depId:'',depValue:0}];
            }
        });
        
        
    };
    
    
    $scope.pushDepAPPSub = function(index,last){
        if(last){
            $scope.manageAPP.data[index].sub.push({
                depId:'',
                depValue:0
            });
        }
    };
    
    $scope.delItemAPPSub = function(index){
        var indexSplit = index.split('.');
        $scope.manageAPP.data[indexSplit[0]].sub.splice(index,1);
    };
    
    
    
    $scope.checkEditItemAPP = function(index){
        var arrUse = $scope.manageAPP.data[index].sub;
        var arrUseC = $scope.manageAPP.data[index].subC;
        
        if((arrUse.length === arrUseC.length) && ($scope.manageAPP.data[index].pName === $scope.manageAPP.data[index].pNameC)){
            for(var i=0;i<arrUse.length;i++){
                if((arrUse[i].depId !== arrUseC[i].depId) || (arrUse[i].depValue !== arrUseC[i].depValue)){
                    return true;
                }
            }
        }else{
            return true;
        }
        
    };
    
    $scope.checkDisableEditItemApp = function(index){
        var arrUse = $scope.manageAPP.data[index];
        if(arrUse.pName===""){
            return true;
        }
    };
    
    
    $scope.editItemApp = function(index){
        var arrUse = $scope.manageAPP.data[index];
        var lengthOfDepTxt = arrUse.sub.length;
        
        var deptId = [];
        var budgetTotal = [];
        
        for(var i=0;i<(arrUse.sub.length-1);i++){
            deptId.push(arrUse.sub[i].depId);
            budgetTotal.push(parseFloat(arrUse.sub[i].depValue));
        }
        
        
        $http.post(cde.getPath("updateExpenseProject"),{
            
            bgHeadId:arrUse.id,
            projectName:arrUse.pName,
            budgetPeriodId:$scope.selectYear,
            budgetTotal:budgetTotal,
            deptId:deptId
            
        }).then(function(response) {
            
            if(response.data.result){
                arrUse.sub[lengthOfDepTxt-1].depValue = 0;
                angular.copy(arrUse.sub,arrUse.subC);
                arrUse.pNameC = arrUse.pName;
            }
            
        });
        
        
        
    };
    
    
    $scope.delItemAPP = function(index){
        if(confirm("ยืนยันการลบ")){
            $http.post(cde.getPath("deleteExpenseProject"),{
                bgHeadId:$scope.manageAPP.data[index].id
            }).then(function(response) {
                if(response.data.result){
                    $scope.manageAPP.data.splice(index,1);
                }
            });
            
        }
    }; 
    
    
    $scope.test = function(name,event){
        if(!$scope[name]){
            $(event.target).select();
            $scope[name]=1;
        }
    };
    
    $scope.test2 = function(name){
        $scope[name] = 0;
    };
    
    
    
    
    
    
    $scope.sumItemAPPSub= function(index){
        
        var arrUse = $scope.manageAPP.data[index];
        
        var val = 0;
        
        for(var i=0;i<arrUse.sub.length;i++){
            val += parseFloat(arrUse.sub[i].depValue);
        }
        
        
        if(arrUse.valueTxt!==""){
            if(!isNaN(arrUse.valueTxt)){
                val += parseFloat(arrUse.valueTxt);
            }
        }
        
        return val;
    };
    
});

