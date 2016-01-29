<?php

namespace apps\revenue\service;

use apps\revenue\interfaces\IPlaningService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class PlaningService extends CServiceBase implements IPlaningService {

    public $datacontext;
    public $logger;
    public $md = "apps\\affirmative\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function fetchRevenue() {
        $sql = "SELECT"
                ." rp.id, rp.deptId, dp.deptName, rp.budgetEducation, rp.budgetService, rp.budgetTotal"
            ." FROM ".$this->ent."\\BudgetRevenuePlan rp"
            ." JOIN ".$this->ent."\\L3D\\Department dp WITH dp.id = rp.deptId"
            ." WHERE rp.budgetPeriodId = :year";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }

    public function deleteRevenue($id) {
        $return = true;

        $bg = new \apps\common\entity\BudgetRevenuePlan();
        $bg->setId($id);
        if (!$this->datacontext->removeObject($bg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }
}
