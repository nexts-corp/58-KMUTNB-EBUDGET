<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IProductionPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\L3D\Plan;

class ProductionPlanService extends CServiceBase implements IProductionPlanService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity\\";
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function viewManage() {
        $view = new CJView("ProductionPlan/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
    
    
    public function fetchPlan($year) {
        
        $sql = "
            SELECT pla.id AS planId,pla.planName,pro.id,pro.projectName,pro.projectType
            FROM ".$this->pathEnt."BudgetPlan pla
            LEFT JOIN ".$this->pathEnt."BudgetProject pro 
            WITH pla.id = pro.planId
            WHERE pla.periodId = :budgetYear
            ORDER BY pla.id,pro.id
        ";
        
        $dataGetObject = $this->datacontext->getObject($sql,array("budgetYear"=>$year));
        
        
        $treeData = null;
        $idOld = null;
        $idNew = null;
        
        $j = 0;
        for ($i = 0; $i < count($dataGetObject); $i++) {
            
            
            $idNew = $dataGetObject[$i]["planId"];
            
            if($idOld!=$idNew){
                
                $treeData[$j]["planId"] = $dataGetObject[$i]["planId"];
                $treeData[$j]["planName"] = $dataGetObject[$i]["planName"];
                $treeData[$j]["checkPlanName"] = $dataGetObject[$i]["planName"];
                $treeData[$j]["show"] = false;
                $treeData[$j]["produce"] = array();
                $treeData[$j]["project"] = array();
                
                $j++;
                $k = 0;
                $l = 0;
                $idOld = $idNew;
            }
            
            if($dataGetObject[$i]["id"]!=""){
                if($dataGetObject[$i]["projectType"]=="1"){
                    $treeData[$j-1]["produce"][$k]["id"] = $dataGetObject[$i]["id"];
                    $treeData[$j-1]["produce"][$k]["name"] = $dataGetObject[$i]["projectName"];
                    $treeData[$j-1]["produce"][$k]["checkName"] = $dataGetObject[$i]["projectName"];
                    $k++;
                }else if($dataGetObject[$i]["projectType"]=="2"){
                    $treeData[$j-1]["project"][$l]["id"] = $dataGetObject[$i]["id"];
                    $treeData[$j-1]["project"][$l]["name"] = $dataGetObject[$i]["projectName"];
                    $treeData[$j-1]["project"][$l]["checkName"] = $dataGetObject[$i]["projectName"];
                    $l++;
                }
                
            }
            

        }
        
       
        return $treeData;
        
    }
    
    
    
    public function savePlan($dataParam) {
        if($dataParam->id==NULL){
            $this->datacontext->saveObject($dataParam);
        }else{
            $this->datacontext->updateObject($dataParam);
        }
        return $dataParam;
    }
    
    public function saveBudgetProject($dataParam) {
        if($dataParam->id==NULL){
            $this->datacontext->saveObject($dataParam);
        }else{
            $this->datacontext->updateObject($dataParam);
        }
        return $dataParam;
    }
    
    
    public function delPlan($dataParam) {
//        $delBudgetProject = new BudgetProject();
//        $delBudgetProject->setPlanId($dataParam->id);
//        
//        return $this->datacontext->removeObject($delBudgetProject);
//        if($this->datacontext->removeObject($delBudgetProject)){
            $this->datacontext->removeObject($dataParam);
            return $dataParam;
//        }
        
    }
    
    public function delBudgetProject($dataParam) {
        
        return $this->datacontext->removeObject($dataParam);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function fetchPlan3D() {
        
        $query = new Plan();
        return $this->datacontext->getObject($query);
        
    }
    
    
    public function savePlan3D($dataParam,$editId) {
        
        if($editId==NULL){
            $this->datacontext->saveObject($dataParam);
        }else{
            $query = new Plan();
            $query->setId($editId);
            if($this->datacontext->removeObject($query)){
                $this->datacontext->saveObject($dataParam);
            }
            
        }
        return $dataParam;  
        //return $this->datacontext->removeObject($editId);

        
    }
    
    
    
    public function delPlan3D($dataParam) {
        $this->datacontext->removeObject($dataParam);
        return $dataParam;
    }
    
    

}
