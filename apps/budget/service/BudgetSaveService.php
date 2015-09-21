<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetSaveService;
use apps\common\entity\Budget140;
use apps\common\entity\Budget141;
use apps\common\entity\Budget142;
use apps\common\entity\Budget143;
use apps\common\entity\Budget144;
use apps\common\entity\Budget145;
use apps\common\entity\Budget146;

class BudgetSaveService extends CServiceBase implements IBudgetSaveService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function saveBudget140($budget) {
        $return = true;

        foreach ($budget as $key => $value) {
            $bg = new Budget140();
            $bg->setId($budget[$key]->id);
            $bg->setBgStatus('N');
            if (!$this->datacontext->updateObject($bg)) {
                $return = $this->datacontext->getLastMessage();
                return $return;
            }

            $budget[$key]->refId = $budget[$key]->id;
            $budget[$key]->bgStatus = 'Y';
            if (!$this->datacontext->saveObject($budget[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }
        return $return;
    }

    public function saveBudget141($budget) {
        
    }

    public function saveBudget142($budget) {
        
    }

    public function saveBudget143($budget) {
        
    }

    public function saveBudget144($budget) {
        
    }

    public function saveBudget145($budget) {
        
    }

    public function saveBudget146($budget) {
        
    }

}
