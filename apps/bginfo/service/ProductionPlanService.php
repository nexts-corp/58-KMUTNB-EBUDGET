<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IProductionPlanService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\BudgetPlan;

class ProductionPlanService extends CServiceBase implements IProductionPlanService {
    

    public $datacontext;
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    
    public function viewPlan() {
        $view = new CJView("viewPlan", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }
    
    public function fetchPlan($year,$budget) {
        $sql="SELECT plan FROM apps\\common\\entity\\BudgetPlan plan WHERE plan.budgetYear=:budgetYear AND plan.isActive=1 ORDER BY plan.id";
        return $this->datacontext->getObject($sql,array("budgetYear"=>$year,""=>dfsdf));
    }
    
    public function SavePlan($data,$com){
        
        $lists=new BudgetPlan();
        $lists->setBudgetYear($data->budgetYear);
        $lists->setPlanName($data->planName);
        $lists->setIsActive(1);
        
        
        if(!$this->datacontext->getObject($lists)){
            
            if($com=="add"){
                $this->datacontext->saveObject($data);
            }else if($com=="update"){
                $this->datacontext->updateObject($data);
            }
            
            return $data;
        }else{
            if($com=="update"){
                $lists->setId($data->id);
                if($this->datacontext->getObject($lists)){
                    return $data;
                }else{
                    return "exist";
                }
            }else{
                return "exist";
            }
        }
        
        
    }
    
    
    
    public function delPlan($data){
        
        $lists=new BudgetPlan();
        $lists->setId($data->id);
        $lists->setIsActive(0);
        
        return $this->datacontext->updateObject($lists);
        
    }
    
    public function unDelPlan($data){
        
        $lists=new BudgetPlan();
        $lists->setId($data->id);
        $lists->setIsActive(1);
        
        return $this->datacontext->updateObject($lists);
        
    }
    

}
