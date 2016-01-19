<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IAllocateService;
use apps\common\entity;

class AllocateService extends CServiceBase implements IAllocateService {

    public $datacontext;
    //public $logger;

    private $pathEnt = "apps\\common\\entity\\";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function budgetTypeTree() {

//        $sql = "
//            SELECT
//                bgt1.id AS budgetTypeId,bgt1.typeName AS budgetTypeName,
//                bgt2.id AS budgetTypeId2,bgt2.typeName AS budgetTypeName2
//            FROM ".$this->pathEnt."BudgetType bgt1
//            INNER JOIN ".$this->pathEnt."BudgetType bgt2
//            WITH bgt1.id = bgt2.masterId
//            WHERE (bgt1.typeCode = 'K' OR bgt1.typeCode = 'U') AND bgt1.masterId = 0
//        ";
//        return $this->datacontext->getObject($sql);

        $sql = "
            SELECT
                bgt1.id AS budgetTypeId,bgt1.typeName AS budgetTypeName,
                bgt2.id AS budgetTypeId2,bgt2.typeName AS budgetTypeName2
            FROM " . $this->pathEnt . "BudgetType bgt1
            INNER JOIN " . $this->pathEnt . "BudgetType bgt2
            WITH bgt1.id = bgt2.masterId
            WHERE (bgt1.typeCode = 'K' OR bgt1.typeCode = 'U') AND bgt1.masterId = 0 AND bgt1.formExpense = true
        ";

        $dataIAT = $this->datacontext->getObject($sql);

        $dataList = null;
        $idOld = null;
        $idNew = null;

        $j = 0;
        $k = 0;
        for ($i = 0; $i < count($dataIAT); $i++) {


            $idNew = $dataIAT[$i]["budgetTypeId"];

            if ($idOld != $idNew) {

                $dataList[$j]["id"] = $dataIAT[$i]["budgetTypeId"];
                $dataList[$j]["name"] = $dataIAT[$i]["budgetTypeName"];

                $j++;
                $k = 0;
                $idOld = $idNew;
            }

            if ($dataIAT[$i]["budgetTypeId2"] != "") {
                $dataList[$j - 1]["sub"][$k]["id"] = $dataIAT[$i]["budgetTypeId2"];
                $dataList[$j - 1]["sub"][$k]["name"] = $dataIAT[$i]["budgetTypeName2"];
                $dataList[$j - 1]["sub"][$k]["data"] = array();
            }
            $k++;
        }

        return $dataList;
    }

    public function managePlanning() {
        $view = new CJView("allocate/managePlanning", CJViewType::HTML_VIEW_ENGINE);

        return $view;
    }

    public function manageDepartment() {
        $view = new CJView("allocate/manageDepartment", CJViewType::HTML_VIEW_ENGINE);

        return $view;
    }

    public function testJS() {
        //$view = new CJView("initNg.js", CJViewType::JS);
        //$view->name = "testByNamkhaeng";
        return $this->getRoute();
    }

    public function fetchExpenseProject() {
        $budgetPeriodId = $this->getPeriod()->year;

        $sql = "
            SELECT 
                bh.id,
                be.name AS pName,
                be.deptId AS depId,
                be.budgetEstAmount As depValue
            FROM " . $this->pathEnt . "BudgetHead bh
            INNER JOIN " . $this->pathEnt . "BudgetExpense be
            WITH bh.id = be.budgetHeadId
            WHERE bh.formId = 999
            AND bh.budgetTypeCode = 'K'
            AND bh.budgetPeriodId = " . $budgetPeriodId . "
            ORDER BY bh.id,be.id
        ";

        //return $sql;

        $dataIAT = $this->datacontext->getObject($sql);


        $dataList = null;
        $idOld = null;
        $idNew = null;
        $isLast = 0;

        $j = 0;
        $k = 0;
        for ($i = 0; $i < count($dataIAT); $i++) {


            $idNew = $dataIAT[$i]["id"];

            if ($idOld != $idNew) {

                $dataList[$j]["id"] = $dataIAT[$i]["id"];
                $dataList[$j]["pName"] = $dataIAT[$i]["pName"];
                $dataList[$j]["pNameC"] = $dataIAT[$i]["pName"];
                /* if (!$depId) {
                  $dataList[$j]["pNameC"] = $dataIAT[$i]["pName"];
                  } */

                $j++;
                $k = 0;
                $idOld = $idNew;
            }

            if ($dataIAT[$i]["depId"] != "") {
                $dataList[$j - 1]["sub"][$k]["depId"] = $dataIAT[$i]["depId"];
                $dataList[$j - 1]["sub"][$k]["depValue"] = $dataIAT[$i]["depValue"];
                $dataList[$j - 1]["subC"][$k]["depId"] = $dataIAT[$i]["depId"];
                $dataList[$j - 1]["subC"][$k]["depValue"] = $dataIAT[$i]["depValue"];                

                /* if (!$depId) {
                  $dataList[$j - 1]["sub"][$k + 1]["depId"] = '';
                  $dataList[$j - 1]["sub"][$k + 1]["depValue"] = 0;
                  $dataList[$j - 1]["subC"][$k + 1]["depId"] = '';
                  $dataList[$j - 1]["subC"][$k + 1]["depValue"] = 0;
                  } */
            }

            $k++;
        }

        return $dataList;
    }

    public function addExpenseProject($projectName, $budgetPeriodId, $budgetTotal, $deptId) {
        $return = true;

        $bgHead = new entity\BudgetHead();
        $bgHead->setFormId(999);
        $bgHead->setBudgetPeriodId($budgetPeriodId);
        $bgHead->setBudgetTypeCode('K');
        if (count($deptId) == 1) {
            $bgHead->setIsCoBudget(false);
            $bgHead->setDeptId($deptId[0]);
        } else {
            $bgHead->setIsCoBudget(true);
        }

        $dataHead = $this->datacontext->saveObject($bgHead);
        if ($dataHead) {
            $return = $bgHead->id;
        }
        $headId = $bgHead->id;

        foreach ($deptId as $key => $value) {
            $obj = new entity\BudgetExpense();
            $obj->budgetHeadId = $headId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                $return = false;
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function updateExpenseProject($bgHeadId, $projectName, $budgetPeriodId, $budgetTotal, $deptId) {
        $return = true;

        $exp = new entity\BudgetExpense();
        $exp->setBudgetHeadId($bgHeadId);
        $data = $this->datacontext->getObject($exp);

        if (!$this->datacontext->removeObject($data)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }

        foreach ($deptId as $key => $value) {

            $obj = new entity\BudgetExpense();
            $obj->budgetHeadId = $bgHeadId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                $return = false;
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function deleteExpenseProject($bgHeadId) {
        $return = true;

        $obj = new entity\BudgetExpense();
        $obj->setBudgetHeadId($bgHeadId);
        $data = $this->datacontext->getObject($obj);
        if (!$this->datacontext->removeObject($data)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }

        $bgHead = new entity\BudgetHead();
        $bgHead->setId($bgHeadId);
        $dataHead = $this->datacontext->getObject($bgHead);
        if (!$this->datacontext->removeObject($dataHead)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function getSumRevenue($budgetPeriodId, $facultyId, $bgCategory) {
        $sql3 = " select SUM(bg.bgAmount) as value "
                . " from " . $this->pathEnt . "BudgetRevenue bg "
                . " left join " . $this->pathEnt . "BudgetHead head with head.id = bg.budgetHeadId "
                . " left join " . $this->pathEnt . "Attachment att with bg.attachmentId = att.id "
                . " left join " . $this->pathEnt . "TrackingStatus ts with bg.statusId = ts.id "
                . " left join " . $this->pathEnt . "L3D\Department dept with bg.deptId = dept.id "
                . " where head.formId = :formId "
                . " and bg.budgetPeriodId = :budgetPeriodId "
                . " and bg.budgetTypeCode = :budgetTypeCode "
                . " and dept.masterId = :masterId"
                . " and bg.bgCategory = :bgCategory";

        $param3 = array(
            "formId" => "500",
            "budgetPeriodId" => $budgetPeriodId,
            "budgetTypeCode" => "K",
            "masterId" => $facultyId,
            "bgCategory" => $bgCategory
        );

        return $this->datacontext->getObject($sql3, $param3);
    }

    public function getSumRevenuePlan($budgetPeriodId, $facultyId) {
        $sql = "
            SELECT 
                SUM(bgrp.budgetEducation) AS education,SUM(bgrp.budgetService) AS service 
            FROM " . $this->pathEnt . "BudgetRevenuePlan bgrp
            WHERE bgrp.budgetPeriodId = " . $budgetPeriodId . "
            AND bgrp.deptId = " . $facultyId . "
            AND bgrp.budgetTypeCode = 'K'
        ";
        $list = $this->datacontext->getObject($sql);
        return $list;
    }

    public function fetchRevenue() {
        $budgetPeriodId = $this->getPeriod()->year;

        $bg = new entity\BudgetRevenuePlan();
        $bg->setBudgetPeriodId($budgetPeriodId);

        $data = $this->datacontext->getObject($bg);

        $dataList = null;

        for ($i = 0; $i < count($data); $i++) {
            $dataList[$i]["id"] = $data[$i]->id;
            $dataList[$i]["department"] = $data[$i]->deptId;
            $dataList[$i]["departmentC"] = $data[$i]->deptId;
            $dataList[$i]["education"] = $data[$i]->budgetEducation;
            $dataList[$i]["educationC"] = $data[$i]->budgetEducation;
            $dataList[$i]["academic"] = $data[$i]->budgetService;
            $dataList[$i]["academicC"] = $data[$i]->budgetService;
        }

        return $dataList;
    }

    public function addRevenue($deptId, $bgEducation, $bgService) {
        $budgetPeriodId = $this->getPeriod()->year;
        
        $bg = new entity\BudgetRevenuePlan();
        $bg->setBudgetPeriodId($budgetPeriodId);
        $bg->setDeptId($deptId);

        $data = $this->datacontext->getObject($bg);

        if ($data) {
            return "duplicate department, pls use update function instead!";
        }

        $bg->setBudgetTypeCode("K");
        $bg->setBudgetEducation($bgEducation);
        $bg->setBudgetService($bgService);
        $bg->setBudgetTotal($bgEducation + $bgService);

        if ($this->datacontext->saveObject($bg)) {
            $return = $bg->id;
            //return $this->datacontext->getLastMessage();
        } else {
            $return = 0;
        }

        return $bg;
    }

    public function updateRevenue($id, $bgEducation, $bgService) {
        $return = true;

        $bg = new entity\BudgetRevenuePlan();
        $bg->setId($id);
        //$bg->setDeptId($deptId);
        //$bg->setBudgetPeriodId($budgetPeriodId);
        $bg->setBudgetEducation($bgEducation);
        $bg->setBudgetService($bgService);

        if (!$this->datacontext->updateObject($bg)) {
            $return = false;
            //return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteRevenue($id) {
        $return = true;

        $bg = new entity\BudgetRevenuePlan();
        $bg->setId($id);
        if (!$this->datacontext->removeObject($bg)) {
            $return = false;
            //return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function insertRevenueItem($budget, $deptId) {
        $return = array();

        $revenuePlan = new entity\BudgetRevenuePlan();
        $revenuePlan->setBudgetPeriodId($budget->budgetPeriodId);
        $revenuePlan->setBudgetTypeCode("K");
        $revenuePlan->setDeptId($deptId);

        $revenuePlanData = $this->datacontext->getObject($revenuePlan);

        if ($revenuePlanData) {
            $revenuePlanId = $revenuePlanData[0]->id;

            $bgHead = new entity\BudgetHead();
            $bgHead->setFormId(500);
            $bgHead->setBudgetPeriodId($budget->budgetPeriodId);
            $bgHead->setBudgetTypeCode("K");
            $bgHead->setDeptId($budget->deptId);
            $bgHead->setL3dPlanId($budget->l3dPlanId);
            $bgHead->setL3dProjectId($budget->l3dProjectId);
            $bgHead->setFundgroupId($budget->fundgroupId);
            $bgHead->setActivityId($budget->activityId);

            $bgPlanProject = $this->getBudgetPlanAndProject($budget->budgetPeriodId, $budget->l3dPlanId, $budget->fundgroupId);
            $bgHead->setPlanId($bgPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($bgPlanProject["budgetProjectId"]);

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
            $budget->planId = $bgPlanProject["budgetPlanId"];
            $budget->projectId = $bgPlanProject["budgetProjectId"];

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

        $repo = new entity\BudgetRevenue();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $result;
    }

    public function getRevenueItemList($budgetPeriodId, $deptId, $l3dPlanId, $fundgroupId, $bgCategory) {

        $sql1 = " SELECT typ.id, typ.typeName as name "
                . " FROM " . $this->pathEnt . "BudgetType typ "
                . " WHERE typ.masterId = '0' and typ.typeCode = 'K' and typ.formExpense = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName as name "
                    . " FROM " . $this->pathEnt . "BudgetType typ "
                    . " WHERE typ.masterId = :masterId and typ.typeCode = 'K' and typ.formExpense = true ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);

            $list1[$key1]["sub"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select bg.id, bg.revenueName as name, bg.revenueName as nameC, "
                        . "bg.bgAmount as value, bg.bgAmount as valueC, "
                        . "bg.revenueDesc as detail, bg.revenueDesc as detailC "
                        . " from " . $this->pathEnt . "BudgetRevenue bg "
                        . " left join " . $this->pathEnt . "BudgetHead head with head.id = bg.budgetHeadId "
                        . " left join " . $this->pathEnt . "Attachment att with bg.attachmentId = att.id "
                        . " left join " . $this->pathEnt . "TrackingStatus ts with bg.statusId = ts.id "
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

    private function getBudgetPlanAndProject($budgetPeriodId, $L3DPlanId, $fundgroupId) {
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
            }
        }

        return $result;
    }

}
