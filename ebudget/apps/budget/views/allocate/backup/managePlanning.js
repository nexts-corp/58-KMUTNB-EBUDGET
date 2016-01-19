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
            
            //budgetPeriodId : $scope.selectYear,
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
    
    
    $scope.addItemAPP = function(){
        $scope.manageAPP.data.push({
            pName:$scope.manageAPP.projectTxt,
            pNameC:$scope.manageAPP.projectTxt,
            sub:[],
            show:1
        });
        
        $scope.manageAPP.projectTxt = '';
    };
    
    $scope.editItemApp = function(index){
        var arrUse = $scope.manageAPP.data[index];
        arrUse.pNameC = arrUse.pName;
    };
    
    
    
    $scope.addItemAPPSub = function(index){
        var arrUse = $scope.manageAPP.data[index];
        //console.log(arrUse.depId);
        arrUse.sub.push({
            depId:arrUse.depOpt,
            depIdC:arrUse.depOpt,
            depValue:arrUse.valueTxt,
            depValueC:arrUse.valueTxt
        });
        arrUse.valueTxt = "";
        arrUse.depOpt = "";
    };
    
    $scope.checkEditItemAppSub = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.manageAPP.data[indexSplit[0]].sub[indexSplit[1]];
        return (arrUse.depId!==arrUse.depIdC) || (arrUse.depValue!==arrUse.depValueC);
    };
    
    $scope.editItemAppSub = function(index){
        var indexSplit = index.split('.');
        var arrUse = $scope.manageAPP.data[indexSplit[0]].sub[indexSplit[1]];
        arrUse.depIdC = arrUse.depId;
        arrUse.depValueC = arrUse.depValue;
    };
    
    
    $scope.delItemAPP = function(index){
        if(confirm("ยืนยันการลบ")){
            $scope.manageAPP.data.splice(index,1);
        }
    }; 
    
    
    $scope.delItemAPPSub = function(index){
        if(confirm("ยืนยันการลบ")){
            var indexSplit = index.split('.');
            $scope.manageAPP.data[indexSplit[0]].sub.splice(indexSplit[1],1);
        }
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

