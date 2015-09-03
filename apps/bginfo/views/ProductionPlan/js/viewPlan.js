var myApp = angular.module('viewPlan', []);

myApp.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol('{[');
  $interpolateProvider.endSymbol(']}');
});


myApp.controller('tableController', function($scope,$http) {
    
    $scope.data = {};
    $scope.dataProduct = {};
    
    $scope.txtPlanAddClass = [];
    $scope.txtProductAddClass = [];
    $scope.idPlanEdit = "";
    
    $scope.manageLV = 1;
    $scope.refIdPlan = "";
    
    
    $scope.backButton = function() {
        $scope.manageLV = 1;
        $scope.dataProduct = {};
    };
    
    
    
    
    
    $scope.selectChange = function() {

        if($scope.selectYear!=="udf" && $scope.selectBudget!=="udf"){

            $http.get("fetchPlan/2558/"+$scope.selectBudget).success(function(response) {
                $scope.data = response.listsPlan;
            });
            
        }

    };
    
    $scope.centerModal = function(){
            $('.modal-content').modal().css({
                'margin-top': function () {
                    return ($(window).height() / 3);
                }
            });

    };
    
    $scope.cleanModalPlan = function(){
        $scope.txtPlanAdd = "";
        $scope.txtPlanAddClass.pop('has-error');
    };
    
    $scope.modalPlan = function(com,id,name) {
        $scope.cleanModalPlan(); 
        if(com==="add"){
            console.log("add");
            $scope.labelAddEdit = 1;
            $scope.idPlanEdit = "";
        }else if(com=="edit"){
            console.log("edit");
            $scope.labelAddEdit = 2;
            $scope.idPlanEdit = id;
            $scope.txtPlanAdd = name;
        }
           
        $scope.centerModal();
        $("#modal-plan").modal();
        
    };
    
    $scope.insertPlan = function(year,name,bugget) {

        $http.get("insertPlan/"+year+"/"+name+"/"+bugget).success(function(response) {
            if(response.reqInsertPlan!=="exist"){
                
                //console.log(JSON.stringify($scope.data, null, 4));
                $scope.data.push(response.reqInsertPlan);
                $("#modal-plan").modal('hide');
                
            }else{
                $scope.txtPlanAddClass.push('has-error');
            }
        });
    };
    
    
    $scope.findIndexObject = function(obj, attr, value){
        for(var i = 0; i < obj.length; i += 1) {
            if(obj[i][attr] === value) {
                return i;
            }
        }
    }
    
    $scope.updatePlan = function(year,id, name, bugget) {
        $http.get("updatePlan/"+year+"/"+id+"/"+name+"/"+bugget).success(function(response) {
            
            if(response.reqUpdatePlan!=="exist"){
                $scope.data[$scope.findIndexObject($scope.data,"id",id)].planName=name;
                $("#modal-plan").modal('hide');
            }else{
                $scope.txtPlanAddClass.push('has-error');
            }
            
        });
        console.log($scope.findIndexObject($scope.data,"id",id));
        //console.log(year+"/"+id+"/"+name+"/"+bugget);
    };
    
    $scope.deletePlan = function(index,id,bugget) {
        
        if(confirm("ยืนยันการลบ")){
            $http.get("deletePlan/"+id+"/"+bugget).success(function(response) {
                $scope.data.splice(index, 1);
            }); 
        }
        
    };
    
    
    
    
    
    
    
    //***************ผลผลิตและโครงการ***************//
    
    
    $scope.idProductEdit = "";
    
    $scope.manageProduction = function(planId,planName,bugget){
        console.log("planName");
        $scope.planName = planName;
        $scope.manageLV = 2;
        $scope.refIdPlan = planId;
        
        
        $http.get("fetchProduct/"+planId+"/"+bugget).success(function(response) {
            $scope.dataProduct=response.listsProduct;
        });
    };
    
    
    $scope.cleanModalProduct = function(){
        $scope.txtProduct = "";
        $scope.txtProductAddClass.pop('has-error');
        $scope.selectProductPlan = "1";
    };
    
    $scope.modalProduct = function(com,id,type,name) {
        $scope.cleanModalProduct(); 
        if(com==="add"){
            console.log("add");
            $scope.labelAddEdit = 1;
            $scope.idProductEdit = "";
        }else if(com=="edit"){
            console.log("edit");
            $scope.labelAddEdit = 2;
            $scope.idProductEdit = id;
            $scope.txtProduct = name;
            $scope.selectProductPlan = type.toString();
            console.log(type);
        }
           
        $scope.centerModal();
        $("#modal-product").modal();
        
    };
    
    
    
    
    $scope.insertProduct = function(year,plainId,name,type,bugget) {

        $http.get("insertProduct/"+year+"/"+plainId+"/"+name+"/"+type+"/"+bugget).success(function(response) {
            if(response.reqInsertProduct!=="exist"){
                
                //console.log(JSON.stringify($scope.data, null, 4));
                $scope.dataProduct.push(response.reqInsertProduct);
                $("#modal-product").modal('hide');
                
            }else{
                $scope.txtProductAddClass.push('has-error');
            }
        });
    };
    
    
    $scope.updateProduct = function(year,id, name, type, bugget) {
        $http.get("updateProduct/"+year+"/"+id+"/"+name+"/"+type+"/"+bugget).success(function(response) {
            
            if(response.reqUpdateProduct!=="exist"){
                $scope.dataProduct[$scope.findIndexObject($scope.dataProduct,"id",id)].productName=name;
                $scope.dataProduct[$scope.findIndexObject($scope.dataProduct,"id",id)].type=type;
                $("#modal-product").modal('hide');
            }else{
                $scope.txtProductAddClass.push('has-error');
            }
            
        });
        
        console.log($scope.findIndexObject($scope.data,"id",id));
        console.log(year+"/"+id+"/"+name+"/"+bugget);
    };
    
    $scope.deleteProduct = function(index,id,bugget) {
        
        if(confirm("ยืนยันการลบ")){
            $http.get("deleteProduct/"+id+"/"+bugget).success(function(response) {
                $scope.dataProduct.splice(index, 1);
            }); 
        }
        
    };
    
    
    
    
    
    
});
