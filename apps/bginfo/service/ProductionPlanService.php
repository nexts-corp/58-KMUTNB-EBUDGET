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
    
    public function fetchPlan($year) {
        $lists=new BudgetPlan();
        $lists->setBudgetYear($year);
        return $this->datacontext->getObject($lists);
    }
    
    public function SavePlan($data){
        
        $lists=new BudgetPlan();
        $lists->setBudgetYear($data->budgetYear);
        $lists->setPlanName($data->planName);
        
        if(!$this->datacontext->getObject($lists)){
            $this->datacontext->saveObject($data);
            return $data;
        }else{
            return "exist";
        }
        
        
    }
    

}
