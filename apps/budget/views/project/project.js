myApp.directive('projectTemplate', function() {
  return {
    restrict: 'E',
    templateUrl: js_context_path+'/apps/budget/views/project/project.html'
  };
});


myApp.controller('projectForm', function($scope,$http,$controller) {
    
    
//    $scope.$on('projectInit', function() {
//        console.log(JSON.stringify($scope.param, null, 4));
//        
//        $scope.seriesData = {
//            projectName:budgetPeriodArr[$scope.param.budgetPeriodId]
//        };
//    });


    $scope.init = function() {
        console.log(JSON.stringify($scope.param, null, 4));
        
        $scope.seriesData = {
            budgetPeriodId:budgetPeriodArr[$scope.param.budgetPeriodId]
        };
    };
    
});


