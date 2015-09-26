<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IBudgetTypeService;
use th\co\bpg\cde\data\CDataContext;

use apps\common\entity\BudgetType;


class BudgetTypeService extends CServiceBase implements IBudgetTypeService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }
    

    public function viewManage() {
        $view = new CJView("BudgetType/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
        
    }

    
    public function fetchBudgetType($pData) {
        
        return $this->datacontext->getObject($pData);
        
    }
    
    
    public function saveBudgetType($pData,$editId) {
        //return $pData;
        if($editId==NULL){ 
            $this->datacontext->saveObject($pData);
        }else{
            $query = new BudgetType();
            $query->setId($editId);
            if($this->datacontext->removeObject($query)){
                $this->datacontext->saveObject($pData);
            }
        }
        return $pData;
    }
    
    public function delBudgetType($pData) {
        $query = new BudgetType();
        $query->setId($pData->id);
        return $this->datacontext->removeObject($query);
    }
}
