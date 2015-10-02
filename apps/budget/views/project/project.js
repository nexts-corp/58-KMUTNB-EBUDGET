myApp.directive('projectTemplate', function() {
  return {
    restrict: 'E',
    templateUrl: js_context_path+'/apps/budget/views/project/project.html'
  };
});


myApp.controller('projectForm', function($scope,$http,$controller) {
    $controller('cmListController', {$scope: $scope});
    
    
//    $scope.$on('projectInit', function() {
//        console.log(JSON.stringify($scope.param, null, 4));
//        
//        $scope.seriesData = {
//            projectName:budgetPeriodArr[$scope.param.budgetPeriodId]
//        };
//    });


    $scope.init = function() {
        //console.log(JSON.stringify($scope.param, null, 4));
        
        
        //ข้อมูลเบื้องต้น
        $scope.cmListAffirmativeType();
        $scope.fetchProjectType();
        $scope.fetchIntegration();
        $scope.fetchSubsidies();
        $scope.fetchPlan();
        $scope.fetchBudgetType();
        
        //ข้อมูลพร้อมส่ง
        $scope.seriesData = {
            
            budgetPeriodId:budgetPeriodArr[$scope.param.budgetPeriodId],
            deptName:departmentArr[$scope.param.deptId],
            facName:facultyArr[$scope.param.facultyId],
            
            affirmative:[{typeId:null,issueId:null,targetId:null,strategyId:null}],
            
            kpi:[
                {name:'เชิงปริมาณ',data:[]},
                {name:'เชิงเวลา',data:[]},
                {name:'เชิงคุณภาพ',data:[]},
                {name:'เชิงต้นทุน',data:[]}
            ],
            operating:[],
            expense:[]
            
        };
        
        $scope.affirmative = [
            {
                dataIssue:[],
                dataTarget:[],
                dataStrategy:[]
            }
        ];
        
    };
    
    
    
    
    
    $scope.fetchIssue = function(index,id){
        
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeIssue",{id:id}).then(function (response) {
            $scope.affirmative[index].dataIssue = response.data.lists;
            $scope.affirmative[index].issueId = "udf";
            $scope.affirmative[index].dataTarget = [];
            $scope.affirmative[index].targetId = "udf";
            $scope.affirmative[index].dataStrategy = [];
            $scope.affirmative[index].strategyId = "udf";
            $scope.seriesData.affirmative[index].typeId=id;
        });
        
    };
    
    $scope.fetchTarget = function(index,id){
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeTarget",{id:id}).then(function (response) {
            $scope.affirmative[index].dataTarget = response.data.lists;
            $scope.affirmative[index].targetId = "udf";
            $scope.affirmative[index].dataStrategy = [];
            $scope.affirmative[index].strategyId = "udf";
            $scope.seriesData.affirmative[index].issueId=id;
        });
    };
    
    
    $scope.fetchStrategy = function(index,id){
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeStrategy",{id:id}).then(function (response) {
            $scope.affirmative[index].dataStrategy = response.data.lists;
            $scope.affirmative[index].strategyId = "udf";
            $scope.seriesData.affirmative[index].targetId=id;
        });
    };
    
    $scope.affirmativeManage = function(action,index){
        if(action==="push"){
            $scope.affirmative.push({dataIssue:[],dataTarget:[],dataStrategy:[]}); 
            $scope.seriesData.affirmative.push({typeId:null,issueId:null,targetId:null,strategyId:null});
        }else if(action==="splice"){
            $scope.affirmative.splice(index, 1);
            $scope.seriesData.affirmative.splice(index, 1);
        }
    };
    
    
    
    
    
    $scope.fetchProjectType = function(){
        $http.post(ngContextPath+"/api/common/lookup/listProjectType").then(function (response) {
            $scope.dataProjectType = response.data.lists;
        });
    };
    
    
    
    
    $scope.fetchIntegration = function(){
        $http.post(ngContextPath+"/api/common/lookup/listIntegration").then(function (response) {
            $scope.dataIntegration = response.data.lists;
        });
    };
    
    $scope.clearIntegrationDESC = function(index,val){
        if(!val){
            $scope.seriesData.integrationDESC[index]="";
        }
    };
    
    
    
    
    
    // #ตัวชี้วัดความสำเร็จระดับโครงการ (Output/Outcome) และค่าเป้าหมาย (ระบุหน่วยนับ)
    
    $scope.kpiManage = function(action,index,childIndex){
        if(action==="push"){
            $scope.seriesData.kpi[index].data.push({kpi:null,unit:null,target:null}); 
        }else if(action==="splice"){
            $scope.seriesData.kpi[index].data.splice(childIndex, 1);
        }
    };
    
    
    // #ขั้นตอนการดำเนินการ
    $scope.operatingManage = function(action,index){
        if(action==="push"){
            $scope.seriesData.operating.push({operatingName:null,timeStart:null,timeEnd:null}); 
        }else if(action==="splice"){
            $scope.seriesData.operating.splice(index, 1);
        }
    };
    
    
    // # 13. แหล่งเงิน/ประเภทงบประมาณที่ใช้/แผนงาน
        $scope.fetchSubsidies = function(){
            $http.post(ngContextPath+"/api/budget/projectUniver/fetchSubsidies").then(function (response) {
                $scope.dataSubsidies = response.data.dataList;
            });
        };
        
        
    // # แผนงาน
        $scope.fetchPlan = function(){
            $http.post(ngContextPath+"/api/budget/projectUniver/fetchPlan").then(function (response) {
                $scope.dataPlan = response.data.dataList;
            });
        };   
        
        
        
    // # 14. งบประมาณและแผนการใช้จ่ายงบประมาณ
        $scope.fetchBudgetType = function(){
            $http.post(ngContextPath+"/api/budget/projectUniver/fetchBudgetType").then(function (response) {
                $scope.dataBudgetType = response.data.dataList;
            });
        }; 
        

    // # 15. รายละเอียดการใช้งบประมาณ
    $scope.expenseManage = function(action,index){
        if(action==="push"){
            $scope.seriesData.expense.push({list:null,unit:null,price:null,total:null,note:null}); 
        }else if(action==="splice"){
            $scope.seriesData.expense.splice(index, 1);
        }
    };
    
    
    
});


