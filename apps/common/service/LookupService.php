<?php

namespace apps\common\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\data\CDataContext;
use apps\common\interfaces\ILookupService;
use apps\common\entity;

class LookupService extends CServiceBase implements ILookupService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    public function listDepartment() {
        $repo = new entity\LKDepartment();
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listBudgetPlan() {
        $repo = new entity\BudgetPlan();
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listBudgetProduct() {
        $repo = new entity\BudgetProduct();
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

}
