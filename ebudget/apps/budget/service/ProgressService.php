<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IProgressService;
use apps\common\entity;

class ProgressService extends CServiceBase implements IProgressService {

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function getAllScheme() {
        $sql = "SELECT *
                FROM View_Scheme_Budget_All
                WHERE BudgetPeriodId = :bgPeriodId";
        $param = array(
            "bgPeriodId" => $this->getPeriod()->year
        );
        $data = $this->datacontext->pdoQuery($sql, $param);
        return $data;
    }

    public function viewProgressBudget($bgPeriodId, $facultyId, $fundgroupId, $planId) {
        $sql = "exec spGetBudgetPlan :bgPeriodId, :facultyId, :planId, :fundgroupId";
        $param = array("bgPeriodId" => $bgPeriodId,
            "facultyId" => $facultyId,
            "planId" => $planId,
            "fundgroupId" => $fundgroupId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);
        return $data;
    }

}
