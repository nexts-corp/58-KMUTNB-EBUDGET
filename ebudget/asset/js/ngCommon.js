var commonService = angular.module('commonService', []); 
         //common
commonService.service('cde', function () {
    this.projectPath = ngContextPath;
    
    this.setPath = function(appUri,serviceUri){
        this.appPath = appUri;
        this.servicePath = serviceUri;
    };
    
    this.getPath = function (path) {
        var subPath = path.split('//');
        
        var projectUri = this.projectPath;
        var appUri = this.appPath;
        var serUri = this.servicePath;
        
        if(subPath.length === 1){
            return projectUri+'/api/'+appUri+'/'+serUri+'/'+subPath[0];
        }else if(subPath.length === 2){
            return projectUri+'/api/'+appUri+'/'+subPath[0]+'/'+subPath[1];
        }else if(subPath.length === 3){
            return projectUri+'/api/'+subPath[0]+'/'+subPath[1]+'/'+subPath[2];
        }else{
            return "Path is error.";
        }
        
    };
    
    
    this.path = function (path) {
        var subPath = path.split('//');
        
        var projectUri = 'kmutnb-ebudget';
        var appUri = 'budget';
        var serUri = 'allocate';
        
        if(subPath.length === 1){
            return '/'+projectUri+'/api/'+appUri+'/'+serUri+'/'+subPath[0];
        }else if(subPath.length === 2){
            return '/'+projectUri+'/api/'+appUri+'/'+subPath[0]+'/'+subPath[1];
        }else if(subPath.length === 3){
            return '/'+projectUri+'/api/'+subPath[0]+'/'+subPath[1]+'/'+subPath[2];
        }else{
            return "Path is error.";
        }
        
    };
    
});

commonService.service('nk', function () {
    
    this.findObjectIndex = function (obj, attr, value) {
        for(var i = 0; i < obj.length; i += 1) {
            if(obj[i][attr] === value) {
                return i;
            }
        }
        return null;
    };
    
    this.findObjectValue = function (obj, attrFind , value , attrReturn) {
        var index = this.findObjectIndex(obj,attrFind,value);
        if(index!==null){
            return obj[index][attrReturn];
        }else{
            return index;
        }
    };
    
    this.date = function (date) {
        var getDate = new Date(date);
        var d = getDate.getDate().toString();
        if(d.length===1){ d='0'+d; }
        var m = getDate.getMonth() + 1; //Months are zero based
        if(m.length===1){ m='0'+m; }
        var y = getDate.getFullYear();
        return d+'/'+m+'/'+y;
    };
    
});

commonService.controller('nkController', function ($scope,$timeout) {
    
    $scope.nkFocus = function(model){
        $scope[model] = 0;
        var focus= function(){
          $scope[model] = 1;  
        };
        $timeout(focus, 1);
    };
    
});


commonService.directive('nkFocus', function() {
    return function(scope, element, attrs) {
        scope.$watch(attrs.nkFocus,function (newValue) { 
            //newValue && element.focus();
            
            if(newValue===1){
                element.focus();
            }
        },true);
    };
});

commonService.directive('nkCloak', function() {
    return function(scope, element, attrs) {
        angular.element(element).removeAttr("nk-cloak");
    };
});

commonService.directive('nkDate', function() {
    return function(scope, element, attrs) {
        angular.element(element).datepicker({
            format: 'dd/mm/yyyy',
            autoclose:true
        });
    };
});


commonService.directive('nkNumber', function() {
    return {
        restrict: 'A',
        require: '^?ngModel',
        link: function(scope, element, attrs,ngModel) {
  
            if(attrs.nkNumber!==""){
                angular.element(element).number(true,parseInt(attrs.nkNumber));
            }else{
                angular.element(element).number(true);
            }
            
            angular.element(element).val(0);
            
            element.bind("keyup", function (event) {
                if(event.keyCode===46 || event.keyCode===8){
                    if(angular.element(element).val()===""){

                        angular.element(element).val(0);

                        ngModel.$setViewValue(0);
                        ngModel.$render();

                    }
                }
            });
            //ngModel.$setViewValue(0);
            
        }
    };
 });




var commonApp = angular.module('commonApp', [
    'commonService',
    'ui.select2'
]);

commonApp.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
});

commonApp.controller('cmListController', function ($scope, $http) {

    $scope.cmListYear = function () {
        $http.post(ngContextPath+"/api/common/lookup/listYear", {}).then(function (response) {
            $scope.cmDataListYear = response.data.lists;
        });
    };

    $scope.cmListFaculty = function (campusId) {
        $http.post(ngContextPath+"/api/common/lookup/listFaculty", {campusId: campusId}).then(function (response) {
            $scope.cmDataListFaculty = response.data.lists;
        });
    };
    
    $scope.cmListFaculty = function (facultyId) {
        $http.post(ngContextPath+"/api/common/lookup/listFaculty", {campusId: 0}).then(function (response) {
            $scope.cmDataListFaculty = response.data.lists;
        });
    };

    $scope.cmListDepartment = function (facultyId) {
        $http.post(ngContextPath+"/api/common/lookup/listDepartment", {facultyId: facultyId}).then(function (response) {
            $scope.cmDataListDepartment = response.data.lists;
        });
    };

    $scope.cmListFundgroup = function () {
        $http.post(ngContextPath+"/api/common/lookup/listFundgroup", {}).then(function (response) {
            $scope.cmDataListFundgroup = response.data.lists;
        });
    };

    $scope.cmRevenuePlan = function () {
        $http.post(ngContextPath+"/api/common/lookup/listRevenuePlan", {}).then(function (response) {
            $scope.cmDataListRevenuePlan = response.data.lists;
        });
    };

    $scope.cmListBudgetPlan = function (budgetYear) {
        $http.post(ngContextPath+"/api/common/lookup/listBudgetPlan", {budgetYear: budgetYear}).then(function (response) {
            $scope.cmDataListBudgetPlan = response.data.lists;
        });
    };
    
    $scope.cmList3dPlan = function (budgetYear) {
        $http.post(ngContextPath+"/api/common/lookup/list3DPlan", {}).then(function (response) {
            $scope.cmDataList3dPlan = response.data.lists;
        });
    };
    
    $scope.cmListBudgetType = function () {
        $http.post(ngContextPath+"/api/common/lookup/listBudgetType").then(function (response) {
            $scope.cmDataListBudgetType = response.data.lists;
        });
    };
    
    
    
    
    $scope.cmListAffirmativeType = function () {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeType").then(function (response) {
            $scope.cmDataListAffirmativeType = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeIssue = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeIssue",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeIssue = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeTarget = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeTarget",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeTarget = response.data.lists;
        });
    };
    
    $scope.cmListAffirmativeStrategy = function ($id) {
        $http.post(ngContextPath+"/api/common/lookup/listAffirmativeStrategy",{id:$id}).then(function (response) {
            $scope.cmDataListAffirmativeStrategy = response.data.lists;
        });
    };
    
    
});


commonApp.directive('numberFormat', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            angular.element(element).number(true,2);
        }
    };
 });

commonApp.directive('autoFocus', function() {
    return function(scope, element, attrs) {
        scope.$watch(attrs.autoFocus,function (newValue) { 
            //newValue && element.focus();
            
            if(typeof(newValue)!=="undefined"){
                element.focus();
            }
        },true);
    };
});