<?php

namespace apps\revenue\service;

use apps\revenue\interfaces\IBudgetService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class BudgetService extends CServiceBase implements IBudgetService {

    public $datacontext;
    public $logger;
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

    function getBudgetPlanAndProject($budgetPeriodId, $L3DPlanId, $fundgroupId) {
        $project = new \apps\common\entity\MappingPlan();

        $project->setBudgetperiodId($budgetPeriodId);
        $project->setPlanId($L3DPlanId);
        $project->setFundgroupId($fundgroupId);

        $dataProject = $this->datacontext->getObject($project);

        $result = array();

        if ($dataProject) {
            $projectId = $dataProject[0]->budgetProjectId;

            $plan = new \apps\common\entity\BudgetProject();
            $plan->setId($projectId);

            $dataPlan = $this->datacontext->getObject($plan);

            if ($dataPlan) {
                $planId = $dataPlan[0]->planId;

                $result["budgetPlanId"] = $planId;
                $result["budgetProjectId"] = $projectId;
            } else {
                $result["budgetPlanId"] = 0;
                $result["budgetProjectId"] = 0;
            }
        } else {
            $result["budgetPlanId"] = 0;
            $result["budgetProjectId"] = 0;
        }

        return $result;
    }

    public function lists3DPlan() {
        $repo = new \apps\common\entity\L3D\Plan();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->planName;
        }
        return $result;
    }

    public function listsFundgroup() {
        $repo = new \apps\common\entity\L3D\FundGroup();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->fundgroupName;
            $result[$key]["master"] = $value->masterId;
        }
        return $result;
    }

    public function listsDepartment($facultyId) {
        $repo = new \apps\common\entity\L3D\Department();
        $repo->setDeptStatus("Y");
        $repo->setMasterId($facultyId);

        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
            $result[$key]["masterId"] = $value->masterId;
        }
        return $result;
    }

    public function getRevenueItemList($deptId, $l3dPlanId, $fundgroupId, $bgCategory) {
        $budgetPeriodId = $this->getPeriod()->year;

        $sql1 = " SELECT typ.id, typ.typeName as name "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = '0' and typ.typeCode = 'K' and typ.formExpense = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName as name "
                    . " FROM " . $this->ent . "\\BudgetType typ "
                    . " WHERE typ.masterId = :masterId and typ.typeCode = 'K' and typ.formExpense = true ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);

            $list1[$key1]["sub"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.revenueName as name, "
                        . "bg.bgAmount as value, "
                        . "bg.revenueDesc as detail "
                        . " from " . $this->ent . "\\BudgetRevenue bg "
                        . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                        . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                        . " left join " . $this->ent . "\\TrackingStatus ts with bg.statusId = ts.id "
                        . " where head.formId = :formId "
                        . " and bg.budgetTypeId = :budgetTypeId "
                        . " and bg.budgetPeriodId = :budgetPeriodId "
                        . " and bg.budgetTypeCode = :budgetTypeCode "
                        . " and bg.l3dPlanId = :l3dPlanId "
                        . " and bg.fundgroupId = :fundgroupId "
                        . " and bg.deptId = :deptId"
                        . " and bg.bgCategory = :bgCategory";

                $param3 = array(
                    "formId" => "500",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $budgetPeriodId,
                    "budgetTypeCode" => "K",
                    "l3dPlanId" => $l3dPlanId,
                    "fundgroupId" => $fundgroupId,
                    "deptId" => $deptId,
                    "bgCategory" => $bgCategory
                );

                $list3 = $this->datacontext->getObject($sql3, $param3);
                //$list2[$key]["budget"] = $list3;
                $list1[$key1]["sub"][$key2]["data"] = $list3;
            }
        }

        return $list1;
    }

    public function insertRevenueItem($budget, $facultyId) {
        $budgetPeriodId = $this->getPeriod()->year;
        $budget->budgetPeriodId = $budgetPeriodId;
        $budget->budgetTypeCode = "K";

        $return = array();

        $revenuePlan = new \apps\common\entity\BudgetRevenuePlan();
        $revenuePlan->setBudgetPeriodId($budgetPeriodId);
        $revenuePlan->setBudgetTypeCode("K");
        $revenuePlan->setDeptId($facultyId);

        $revenuePlanData = $this->datacontext->getObject($revenuePlan);

        if ($revenuePlanData) {
            $revenuePlanId = $revenuePlanData[0]->id;

            $bgHead = new \apps\common\entity\BudgetHead();
            $bgHead->setFormId(500);
            $bgHead->setBudgetPeriodId($budget->budgetPeriodId);
            $bgHead->setBudgetTypeCode("K");
            $bgHead->setDeptId($budget->deptId);
            $bgHead->setL3dPlanId($budget->l3dPlanId);
            $bgHead->setL3dProjectId($budget->l3dProjectId);
            $bgHead->setFundgroupId($budget->fundgroupId);
            $bgHead->setActivityId($budget->activityId);

            $bgPlanProject = $this->getBudgetPlanAndProject($budget->budgetPeriodId, $budget->l3dPlanId, $budget->fundgroupId);
            $bgHead->setPlanId($bgPlanProject["budgetPlanId"] == "" ? 0 : $bgPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($bgPlanProject["budgetProjectId"] == "" ? 0 : $bgPlanProject["budgetProjectId"]);

            $bgHeadData = $this->datacontext->getObject($bgHead);

            if (!isset($bgHeadData) || $bgHeadData == null) {
                $bgHead->setStatusId(1);
                $bgHeadData = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $bgHeadData[0]->id;
            }

            $budget->budgetHeadId = $bgHeadId;
            $budget->revenuePlanId = $revenuePlanId;
            $budget->planId = $bgPlanProject["budgetPlanId"] == "" ? 0 : $bgPlanProject["budgetPlanId"];
            $budget->projectId = $bgPlanProject["budgetProjectId"] == "" ? 0 : $bgPlanProject["budgetProjectId"];

            if ($budget->remark == "") {
                $budget->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget)) {
                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return["result"] = true;
                $return["msg"] = $budget->id;
            }
        }

        return $return;
    }

    public function updateRevenueItem($budget) {
        $return = true;

        $budget->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function deleteRevenueItem($budgetId) {
        $result = true;

        $repo = new \apps\common\entity\BudgetRevenue();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $result;
    }

    public function getSumRevenue($facultyId, $bgCategory) {
        $budgetPeriodId = $this->getPeriod()->year;

        if ($bgCategory == "E") {
            $sub = "SUM(bgrp.budgetEducation) AS value";
        } else {
            $sub = "SUM(bgrp.budgetService) AS value";
        }
        //plan
        $sql = "
                SELECT
                    " . $sub . "
                FROM " . $this->ent . "\\BudgetRevenuePlan bgrp
                WHERE bgrp.budgetPeriodId = :year
                    AND bgrp.deptId = :dept
                    AND bgrp.budgetTypeCode = 'K'
            ";
        $param = array(
            "year" => $budgetPeriodId,
            "dept" => $facultyId
        );
        $list = $this->datacontext->getObject($sql, $param)[0];

        //budget
        $sql2 = "
                SELECT
                    SUM(bg.bgAmount) AS value
                FROM " . $this->ent . "\\BudgetRevenue bg
                LEFT JOIN " . $this->ent . "\\BudgetHead head WITH head.id = bg.budgetHeadId
                LEFT JOIN " . $this->ent . "\\Attachment att with bg.attachmentId = att.id
                LEFT JOIN " . $this->ent . "\\TrackingStatus ts with bg.statusId = ts.id
                LEFT JOIN " . $this->ent . "\\L3D\\Department dept with bg.deptId = dept.id
                WHERE head.formId = :formId
                    AND bg.budgetPeriodId = :budgetPeriodId
                    AND bg.budgetTypeCode = :budgetTypeCode
                    AND dept.masterId = :masterId
                    AND bg.bgCategory = :bgCategory
            ";

        $param2 = array(
            "formId" => "500",
            "budgetPeriodId" => $budgetPeriodId,
            "budgetTypeCode" => "K",
            "masterId" => $facultyId,
            "bgCategory" => $bgCategory
        );

        $list2 = $this->datacontext->getObject($sql2, $param2)[0];

        $result = array(
            "plan" => $list["value"],
            "budget" => $list2["value"]
        );

        return $result;
    }

}
