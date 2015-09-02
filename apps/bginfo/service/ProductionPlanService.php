<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IProductionPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\BudgetPlan;
use apps\common\entity\RevenuePlan;

class ProductionPlanService extends CServiceBase implements IProductionPlanService {
    

    public $datacontext;
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    
    public function viewPlan() {
        $view = new CJView("ProductionPlan/viewPlan", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
    
    public function fetchPlan($year,$budget) {
        $sql="SELECT plan FROM apps\\common\\entity\\".$budget."Plan plan WHERE plan.budgetYear=:budgetYear AND plan.isActive=1 ORDER BY plan.id";
        return $this->datacontext->getObject($sql,array("budgetYear"=>$year));
    }
    
    
    public function insertPlan($data,$budget){
        if($budget=="Budget"){
            $lists = new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists = new RevenuePlan();
        }
        
        $lists->setBudgetYear($data->budgetYear);
        $lists->setPlanName($data->planName);
        $lists->setIsActive(1);
        
        if(!$this->datacontext->getObject($lists)){
            $this->datacontext->saveObject($lists);
            return $lists;
        }else{
            return "exist";
        }
    }
    
    public function updatePlan($data,$budget){
        
        if($budget=="Budget"){
            $lists = new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists = new RevenuePlan();
        }
        
        
        $lists->setBudgetYear($data->budgetYear);
        $lists->setPlanName($data->planName);
        $lists->setIsActive(1);
        
        $chNotExist = false;
        if(!$this->datacontext->getObject($lists)){
            $lists->setId($data->id);
            $chNotExist = true;
            
        }else{
            $lists->setId($data->id);
            if($this->datacontext->getObject($lists)){
                $chNotExist = true;
            }
        }
        
        if($chNotExist){
            $this->datacontext->updateObject($lists);
            return $lists;
        }else{
            return "exist";
        }
        
        
    }
    
    
    
    public function deletePlan($data,$budget){
        
        if($budget=="Budget"){
            $lists=new BudgetPlan();
        }else if($budget=="Revenue"){
            $lists=new RevenuePlan();
        }
        
        $lists->setId($data->id);
        $lists->setIsActive(0);
        
        return $this->datacontext->updateObject($lists);
        
    }


}
