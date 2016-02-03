<?php

namespace apps\revenue\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\revenue\interfaces\IProgressService;
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

    public function getAllRevenueScheme() {
        $sql = "SELECT *
                FROM View_Scheme_Revenue_All
                WHERE BudgetPeriodId = :bgPeriodId
                ORDER BY facultyId, PlanId, BudgetCategory";
        $param = array(
            "bgPeriodId" => $this->getPeriod()->year
        );
        $data = $this->datacontext->pdoQuery($sql, $param);
        return $data;
    }

    public function viewProgressRevenue($facultyId, $fundgroupId, $planId, $catId) {
        $bgPeriodId = $this->getPeriod()->year;

        $sql = "exec spGetRevenuePlan :bgPeriodId, :facultyId, :planId, :fundgroupId, :catId";
        $param = array("bgPeriodId" => $bgPeriodId,
            "facultyId" => $facultyId,
            "planId" => $planId,
            "fundgroupId" => $fundgroupId,
            "catId" => $catId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);

        return $data;
    }

    public function updateRevenueScheme($budget, $catId) {
        if (is_null($budget) || count($budget) <= 0)
            return false;

        foreach ($budget as $key => $value) {
            $bg = new entity\BudgetScheme();

            if ($value->bgLevel == "1") {
                $bg->setBudgetTypeId($value->bgTypeMasterId);
            } else if ($value->bgLevel == "2") {
                $bg->setBudgetTypeId($value->bgTypeMainId);
            }

            $budgetPeriodId = $this->getPeriod()->year;

            $bg->setBudgetPeriodId($budgetPeriodId);
            $bg->setBudgetTypeCode("K");
            $bg->setL3dPlanId($value->planId);
            $bg->setDeptId($value->facultyId);
            $bg->setFundgroupId($value->fundgroupId);
            $bg->setBgCategory($catId);

            $dataBg = $this->datacontext->getObject($bg);
            if (!isset($dataBg) || $dataBg == null || count($dataBg) <= 0) {
                $bg->setBgPlanQ1(str_replace(',', '', $value->planQ1));
                $bg->setBgPlanQ2(str_replace(',', '', $value->planQ2));
                $bg->setBgPlanQ3(str_replace(',', '', $value->planQ3));
                $bg->setBgPlanQ4(str_replace(',', '', $value->planQ4));
                //$bg->setBgPlanSum($bg->getBgPlanQ1() + $bg->getBgPlanQ2() + $bg->getBgPlanQ3() + $bg->getBgPlanQ4());
                $bg->setBgUsedQ1(str_replace(',', '', $value->usedQ1));
                $bg->setBgUsedQ2(str_replace(',', '', $value->usedQ2));
                $bg->setBgUsedQ3(str_replace(',', '', $value->usedQ3));
                $bg->setBgUsedQ4(str_replace(',', '', $value->usedQ4));
                //$bg->setBgUsedSum($bg->getBgUsedQ1() + $bg->getBgUsedQ2() + $bg->getBgUsedQ3() + $bg->getBgUsedQ4());

                if (!$this->datacontext->saveObject($bg)) {
                    return false;
                }
            } else {
                $bg->id = $dataBg[0]->id;
                $bg->setBgPlanQ1(str_replace(',', '', $value->planQ1));
                $bg->setBgPlanQ2(str_replace(',', '', $value->planQ2));
                $bg->setBgPlanQ3(str_replace(',', '', $value->planQ3));
                $bg->setBgPlanQ4(str_replace(',', '', $value->planQ4));
                //$bg->setBgPlanSum($bg->getBgPlanQ1() + $bg->getBgPlanQ2() + $bg->getBgPlanQ3() + $bg->getBgPlanQ4());
                $bg->setBgUsedQ1(str_replace(',', '', $value->usedQ1));
                $bg->setBgUsedQ2(str_replace(',', '', $value->usedQ2));
                $bg->setBgUsedQ3(str_replace(',', '', $value->usedQ3));
                $bg->setBgUsedQ4(str_replace(',', '', $value->usedQ4));
                //$bg->setBgUsedSum($bg->getBgUsedQ1() + $bg->getBgUsedQ2() + $bg->getBgUsedQ3() + $bg->getBgUsedQ4());

                if (!$this->datacontext->updateObject($bg)) {
                    return false;
                }
            }
        }

        return true;
    }

    public function updateRevenuePlan($budget, $catId) {
        if (is_null($budget) || count($budget) <= 0)
            return false;

        foreach ($budget as $key => $value) {
            $bg = new entity\BudgetScheme();

            if ($value->bgLevel == "1") {
                $bg->setBudgetTypeId($value->bgTypeMasterId);
            } else if ($value->bgLevel == "2") {
                $bg->setBudgetTypeId($value->bgTypeMainId);
            } else if ($value->bgLevel == "3") {
                $bg->setBudgetTypeId($value->bgTypeId);
            }

            $budgetPeriodId = $this->getPeriod()->year;

            $bg->setBudgetPeriodId($budgetPeriodId);
            $bg->setBudgetTypeCode("K");
            $bg->setL3dPlanId($value->planId);
            $bg->setDeptId($value->facultyId);
            $bg->setFundgroupId($value->fundgroupId);
            $bg->setBgCategory($catId);

            $dataBg = $this->datacontext->getObject($bg);
            if (!isset($dataBg) || $dataBg == null || count($dataBg) <= 0) {
                $bg->setBgPlanQ1(str_replace(',', '', $value->planQ1));
                $bg->setBgPlanQ2(str_replace(',', '', $value->planQ2));
                $bg->setBgPlanQ3(str_replace(',', '', $value->planQ3));
                $bg->setBgPlanQ4(str_replace(',', '', $value->planQ4));
                $bg->setBgPlanSum($bg->getBgPlanQ1() + $bg->getBgPlanQ2() + $bg->getBgPlanQ3() + $bg->getBgPlanQ4());

                if (!$this->datacontext->saveObject($bg)) {
                    return false;
                }
            } else {
                $bg->id = $dataBg[0]->id;
                $bg->setBgPlanQ1(str_replace(',', '', $value->planQ1));
                $bg->setBgPlanQ2(str_replace(',', '', $value->planQ2));
                $bg->setBgPlanQ3(str_replace(',', '', $value->planQ3));
                $bg->setBgPlanQ4(str_replace(',', '', $value->planQ4));
                $bg->setBgPlanSum($bg->getBgPlanQ1() + $bg->getBgPlanQ2() + $bg->getBgPlanQ3() + $bg->getBgPlanQ4());

                if (!$this->datacontext->updateObject($bg)) {
                    return false;
                }
            }
        }

        return true;
    }

}
