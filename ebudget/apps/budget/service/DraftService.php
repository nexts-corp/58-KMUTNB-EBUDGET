<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IDraftService;
use apps\common\entity;

class DraftService extends CServiceBase implements IDraftService {

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

    public function getAllBudgetRequest($deptId)
    {
        if ($deptId > 0) {
            $sqlExt = "and bgh.statusId = 1 ";
        } else {
            $sqlExt = "and bgh.statusId <> 1 ";
        }

        $sql = "select bgh.id as bghId, bgh.budgetTypeCode, bgh.budgetPeriodId, "
            . "case when bgh.budgetTypeCode = 'G' then 'เงินงบประมาณแผ่นดิน' else 'เงินรายได้' end as budgetTypeName, "
            . "bgh.formId as formId, dept.id as deptId, dept.deptName as deptName, "
            . "faculty.id as facultyId, faculty.deptName as facultyName, "
            . "l3dPlan.id as l3dPlanId, l3dPlan.planName as l3dPlanName, "
            . "bgPlan.id as planId, bgPlan.planName as planName, "
            . "bgProj.id as projectId, bgProj.projectName as projectName, "
            . "fund.id as fundgroupId, fund.fundgroupName as fundName, "
            . "status.id as statusId, status.desc as statusDesc "
            . "from " . $this->ent . "\\BudgetHead bgh "
            . "left outer join " . $this->ent . "\\L3D\\Department dept with dept.id = bgh.deptId "
            . "left outer join " . $this->ent . "\\L3D\\Department faculty with faculty.id = dept.masterId "
            . "left outer join " . $this->ent . "\\L3D\\Plan l3dPlan with l3dPlan.id = bgh.l3dPlanId "
            . "left outer join " . $this->ent . "\\BudgetPlan bgPlan with bgPlan.id = bgh.planId "
            . "left outer join " . $this->ent . "\\BudgetProject bgProj with bgProj.id = bgh.projectId "
            . "left outer join " . $this->ent . "\\L3D\\FundGroup fund with fund.id = bgh.fundgroupId "
            . "left outer join " . $this->ent . "\\TrackingStatus status with status.id = bgh.statusId "
            . "where bgh.budgetTypeCode = :budgetTypeCode "
            . $sqlExt
            . "and bgh.budgetPeriodId = :budgetPeriodId "
            . "order by status.id, bgh.formId, dept.id, l3dPlan.id, fund.id asc ";

        $param = array(
            "budgetTypeCode" => "G",
            "budgetPeriodId" => $this->getPeriod()->year
        );
        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }
}
