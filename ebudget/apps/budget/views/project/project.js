myApp.directive('projectTemplate', function() {
  return {
    restrict: 'E',
    templateUrl: js_context_path+'/apps/budget/views/project/project.html'
  };
});


myApp.controller('projectForm', function($scope,$http,$controller,cde,nk) {
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
        cde.setPath('budget','projectUniver');
        $scope.dataExpenseProject = [];
        
        //ข้อมูลเบื้องต้น
        $scope.textProjectName = "- เลือกโครงการ -";
        $scope.getLatouts();
        
        //ข้อมูลพร้อมส่ง
        $scope.seriesData = {
            
            //budgetPeriodId:budgetPeriodArr[$scope.param.budgetPeriodId],
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
    
    
    $scope.getLatouts = function(){
        $scope.loadLayouts= true;
        $http.post(cde.getPath("getLayouts"),{
            //budgetPeriodId:$scope.param.budgetPeriodId,
            facultyId:$scope.param.facultyId
        }).then(function (response) {
            var layouts = response.data.layouts;
            $scope.dataIntegration = layouts.integration;
            $scope.dataProjectType = layouts.projectType;
            $scope.dataSubsidies = layouts.subsidies;
            $scope.dataPlan = layouts.plan;
            $scope.dataBudgetType = layouts.budgetType;
            $scope.dataAffirmative = layouts.affirmative;
            $scope.dataListProject = layouts.listProject;
            $scope.loadLayouts = false;
            
            console.log(layouts);
        });
    };
    
    
    
    $scope.fetchProject = function(){
        
        
        
        if($scope.seriesData.id){
            for(var i=0;i<$scope.dataListProject.length;i++){
                if($scope.dataListProject[i].id===parseInt($scope.seriesData.id)){
                    $scope.seriesData.budgetHeadId = $scope.dataListProject[i].budgetHeadId;
                    $scope.seriesData.deptId = $scope.dataListProject[i].deptId;
                }
            }

            $scope.loadProject = true;
            $http.post(cde.getPath("fetchProject"),{
                id:$scope.seriesData.id
            }).then(function (response) {
                var res = response.data.dataList;
                var dataBE = res.dataBE;
                var dataBEI = res.dataBEI;
                var dataBEA = res.dataBEA;
                var dataBEO = res.dataBEO;
                
                
                $scope.seriesData.responder = dataBE.responder;
                $scope.seriesData.director = dataBE.director;
                $scope.seriesData.projectTypeId = dataBE.projectTypeId;
                $scope.seriesData.rationale = dataBE.rationale;
                $scope.seriesData.objective = dataBE.objective;
                $scope.seriesData.benefits = dataBE.benefits;
                $scope.seriesData.target = dataBE.target;
                $scope.seriesData.budgetEstAmount = dataBE.budgetEstAmount;
                $scope.seriesData.budgetEstText = dataBE.budgetEstText;
                $scope.seriesData.timeStart = nk.date(dataBE.timeStart.date);
                $scope.seriesData.timeEnd = nk.date(dataBE.timeEnd.date);
                $scope.seriesData.budgetTypeId = dataBE.budgetTypeId;
                $scope.seriesData.planId = dataBE.planId;
                
                /*การบูรณาการโครงการ*/
                for(var i=0;i<dataBEI.length;i++){
                    //console.log(dataBEI[i].integrationId);
                    var indexInte = dataBEI[i].integrationId;
                    $scope.seriesData.integration[indexInte].checked = true;
                    $scope.seriesData.integration[indexInte].desc = dataBEI[i].desc;
                }
                
                /*ความเชื่อมโยงสอดคล้องกับแผนกลยุทธ์*/
                $scope.affirmative=[];
                $scope.seriesData.affirmative=[];
                for(var i=0;i<dataBEA.length;i++){
                    $scope.affirmative.push({
                        dataIssue:[],
                        dataTarget:[],
                        dataStrategy:[]
                    });
                    $scope.seriesData.affirmative.push({
                        typeId:dataBEA[i].typeId,
                        issueId:dataBEA[i].issueId,
                        targetId:dataBEA[i].targetId,
                        strategyId:dataBEA[i].strategyId
                    });
                    $scope.triggerAFF();
                }
                
                
                /*ขั้นตอนการดำเนินการ*/
                $scope.seriesData.operating = [];
                for(var i=0;i<dataBEO.length;i++){
                    $scope.seriesData.operating.push({
                        operatingName:dataBEO[i].operName,
                        timeStart:nk.date(dataBEO[i].timeStart.date),
                        timeEnd:nk.date(dataBEO[i].timeEnd.date)
                    });
                };
                
                
                console.log(response.data.dataList);
                $scope.loadProject = false;
            });
            
            
        }else{
            $scope.textProjectName = "- เลือกโครงการ -";
        }
    };
    
    
    
    
    
    /*การบูรณาการโครงการ*/
    $scope.clearIntegration = function(index){
        var arrUse = $scope.seriesData.integration;
        if(!arrUse[index].checked){
            arrUse[index].desc="";
        }
    };
    
    
    
    
    /*ความเชื่อมโยงสอดคล้องกับแผนกลยุทธ์*/
    
    $scope.getIssue = function(index){
        $scope.affirmative[index].dataIssue = $scope.dataAffirmative[
            nk.findObjectIndex($scope.dataAffirmative,'typeId',$scope.seriesData.affirmative[index].typeId)
        ].issue;
    };
    
    $scope.getTarget = function(index){
        $scope.affirmative[index].dataTarget = $scope.affirmative[index].dataIssue[
            nk.findObjectIndex($scope.affirmative[index].dataIssue,'issueId',$scope.seriesData.affirmative[index].issueId)
        ].target;
    };
    
    $scope.getStrategy = function(index){
        $scope.affirmative[index].dataStrategy = $scope.affirmative[index].dataTarget[
            nk.findObjectIndex($scope.affirmative[index].dataTarget,'targetId',$scope.seriesData.affirmative[index].targetId)
        ].strategy;
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
    
    $scope.triggerAFF = function(){
        for(var i=0;i<$scope.affirmative.length;i++){
            $scope.getIssue(i,$scope.seriesData.affirmative[i].typeId);
            $scope.getTarget(i,$scope.seriesData.affirmative[i].issueId);
            $scope.getStrategy(i,$scope.seriesData.affirmative[i].strategyId);
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
    
    

    // # 15. รายละเอียดการใช้งบประมาณ
    $scope.expenseManage = function(action,index){
        if(action==="push"){
            $scope.seriesData.expense.push({list:null,unit:null,price:null,total:null,note:null}); 
        }else if(action==="splice"){
            $scope.seriesData.expense.splice(index, 1);
        }
    };
    
    
    
    
    
    
    $scope.saveProject = function(){
        console.log('testSave');
        
        $scope.loadSaveProject = true;
        $http.post(cde.getPath("saveProject"),{
            seriesData:$scope.seriesData
        }).then(function (response) {
            console.log(response.data.dataList);
            $scope.loadSaveProject = false;
        });
    };
    
    
    
    $scope.nkCloak = function(){
        $('[ng-controller=projectForm]').removeClass("nk-cloak");
    };
    
    
});


