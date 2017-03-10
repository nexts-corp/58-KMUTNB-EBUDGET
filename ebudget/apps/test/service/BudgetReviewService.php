<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetReviewService;
use apps\common\entity;

class BudgetReviewService extends CServiceBase implements IBudgetReviewService {

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

    public function getReview($budgetType, $year) {
        $dataArr = array();

        if ($budgetType == "1") { //�Թ�����
            $sql = $this->queryExpensesRvt($year, 0);
            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2

                $sql = $this->queryExpensesRvt($year, $dataArr[$i]["id"]);
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3

                    $sql = $this->queryExpensesRvt($year, $dataInner[$y]["id"]);
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4
                        $sql = $this->queryExpensesRvt($year, $dataInner2[$z]["id"]);
                        $dataInner3 = $this->datacontext->pdoQuery($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        } else if ($budgetType == "2") { //�Թ������ҳ�蹴Թ
            $sql = $this->queryExpensesBg($year, 0);
            $dataArr = $this->datacontext->pdoQuery($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2

                $sql = $this->queryExpensesBg($year, $dataArr[$i]["id"]);
                $dataInner = $this->datacontext->pdoQuery($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3

                    $sql = $this->queryExpensesBg($year, $dataInner[$y]["id"]);
                    $dataInner2 = $this->datacontext->pdoQuery($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4

                        $sql = $this->queryExpensesBg($year, $dataInner2[$z]["id"]);
                        $dataInner3 = $this->datacontext->pdoQuery($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        }
        return $dataArr;
    }

    private function queryExpensesBg($year, $id) {
        $sql = "SELECT bg.id,bg.type_name"
                . ",CASE WHEN (tb.budget_quater1_plan IS NULL) THEN ' ' ELSE tb.budget_quater1_plan END AS budget_quater1_plan,CASE WHEN (tb.budget_quater1_used IS NULL) THEN ' ' ELSE tb.budget_quater1_used END AS budget_quater1_used"
                . ",CASE WHEN (tb.budget_quater2_plan IS NULL) THEN ' ' ELSE tb.budget_quater2_plan END AS budget_quater2_plan,CASE WHEN (tb.budget_quater2_used IS NULL) THEN ' ' ELSE tb.budget_quater2_used END AS budget_quater2_used"
                . ",CASE WHEN (tb.budget_quater3_plan IS NULL) THEN ' ' ELSE tb.budget_quater3_plan END AS budget_quater3_plan,CASE WHEN (tb.budget_quater3_used IS NULL) THEN ' ' ELSE tb.budget_quater3_used END AS budget_quater3_used"
                . ",CASE WHEN (tb.budget_quater4_plan IS NULL) THEN ' ' ELSE tb.budget_quater4_plan END AS budget_quater4_plan,CASE WHEN (tb.budget_quater4_used IS NULL) THEN ' ' ELSE tb.budget_quater4_used END AS budget_quater4_used"
                . " FROM budget_type bg LEFT JOIN ( SELECT SUM(budget_quater1_plan) AS budget_quater1_plan,SUM(budget_quater1_used) AS budget_quater1_used,SUM(budget_quater2_plan) AS budget_quater2_plan,SUM(budget_quater2_used) AS budget_quater2_used,SUM(budget_quater3_plan) AS budget_quater3_plan,SUM(budget_quater3_used) AS budget_quater3_used,SUM(budget_quater4_plan) AS budget_quater4_plan,SUM(budget_quater4_used) AS budget_quater4_used,money_type_id "
                . " FROM tracking_budget WHERE money_type_code = 'BG' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                . " ON bg.id = tb.money_type_id WHERE bg.master_id = " . $id . " AND bg.budget_year = " . $year;

        return $sql;
    }

    private function queryExpensesRvt($year, $id) {

        $sql = "SELECT rvt.id,rvt.type_name"
                . ",CASE WHEN (tb.budget_quater1_plan IS NULL) THEN ' ' ELSE tb.budget_quater1_plan END AS budget_quater1_plan,CASE WHEN (tb.budget_quater1_used IS NULL) THEN ' ' ELSE tb.budget_quater1_used END AS budget_quater1_used"
                . ",CASE WHEN (tb.budget_quater2_plan IS NULL) THEN ' ' ELSE tb.budget_quater2_plan END AS budget_quater2_plan,CASE WHEN (tb.budget_quater2_used IS NULL) THEN ' ' ELSE tb.budget_quater2_used END AS budget_quater2_used"
                . ",CASE WHEN (tb.budget_quater3_plan IS NULL) THEN ' ' ELSE tb.budget_quater3_plan END AS budget_quater3_plan,CASE WHEN (tb.budget_quater3_used IS NULL) THEN ' ' ELSE tb.budget_quater3_used END AS budget_quater3_used"
                . ",CASE WHEN (tb.budget_quater4_plan IS NULL) THEN ' ' ELSE tb.budget_quater4_plan END AS budget_quater4_plan,CASE WHEN (tb.budget_quater4_used IS NULL) THEN ' ' ELSE tb.budget_quater4_used END AS budget_quater4_used"
                . " FROM revenue_type rvt LEFT JOIN ( SELECT SUM(budget_quater1_plan) AS budget_quater1_plan,SUM(budget_quater1_used) AS budget_quater1_used,SUM(budget_quater2_plan) AS budget_quater2_plan,SUM(budget_quater2_used) AS budget_quater2_used,SUM(budget_quater3_plan) AS budget_quater3_plan,SUM(budget_quater3_used) AS budget_quater3_used,SUM(budget_quater4_plan) AS budget_quater4_plan,SUM(budget_quater4_used) AS budget_quater4_used,money_type_id "
                . " FROM tracking_budget WHERE money_type_code = 'RV' AND budget_year = " . $year . " GROUP BY money_type_id ) AS tb "
                . " ON rvt.id = tb.money_type_id WHERE rvt.master_id = " . $id . " AND rvt.budget_year = " . $year;
        return $sql;
    }

    public function getCatagory($budgetType) {
        $dataArr = array();
        if ($budgetType == 1) {

            $sql = "SELECT rvt.id,rvt.typeName FROM " . $this->ent . "\\RevenueType rvt WHERE rvt.masterId = 0";
            $dataArr = $this->datacontext->getObject($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT rvt.id,rvt.typeName FROM " . $this->ent . "\\RevenueType rvt WHERE rvt.masterId = " . $dataArr[$i]["id"];
                $dataInner = $this->datacontext->getObject($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3

                    $sql = "SELECT rvt.id,rvt.typeName FROM " . $this->ent . "\\RevenueType rvt WHERE rvt.masterId = " . $dataInner[$y]["id"];
                    $dataInner2 = $this->datacontext->getObject($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4

                        $sql = "SELECT rvt.id,rvt.typeName FROM " . $this->ent . "\\RevenueType rvt WHERE rvt.masterId = " . $dataInner2[$z]["id"];
                        $dataInner3 = $this->datacontext->getObject($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        } else if ($budgetType == 2) {

            $sql = "SELECT bg.id,bg.typeName FROM " . $this->ent . "\\BudgetType bg WHERE bg.masterId = 0";
            $dataArr = $this->datacontext->getObject($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT bg.id,bg.typeName FROM " . $this->ent . "\\BudgetType bg WHERE bg.masterId = " . $dataArr[$i]["id"];
                $dataInner = $this->datacontext->getObject($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3

                    $sql = "SELECT bg.id,bg.typeName FROM " . $this->ent . "\\BudgetType bg WHERE bg.masterId = " . $dataInner[$y]["id"];
                    $dataInner2 = $this->datacontext->getObject($sql);

                    for ($z = 0; $z < count($dataInner2); $z++) {
                        //get lvl4

                        $sql = "SELECT bg.id,bg.typeName FROM " . $this->ent . "\\BudgetType bg WHERE bg.masterId = " . $dataInner2[$z]["id"];
                        $dataInner3 = $this->datacontext->getObject($sql);
                        $dataInner2[$z]["list3"] = $dataInner3;
                    }
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        }
        return $dataArr;
    }

    public function listBudgetExpense() {
        $bgMaster = new entity\BudgetType();
        $bgMaster->setFormExpense(true);
        $bgMaster->setLevel(1);
        $dataBgMaster = $this->datacontext->getObject($bgMaster);

        $result = array();
        foreach ($dataBgMaster as $key1 => $value1) {
            $bgSlave1 = new entity\BudgetType();
            $bgSlave1->setMasterId($dataBgMaster[$key1]->id);
            $bgSlave1->setFormExpense(true);
            $dataBgSlave1 = $this->datacontext->getObject($bgSlave1);
            $result[$key1]["id"] = $dataBgMaster[$key1]->id;
            $result[$key1]["name"] = $dataBgMaster[$key1]->typeName;

            foreach ($dataBgSlave1 as $key2 => $value2) {
                $result[$key1]["lv2"][$key2]["id"] = $dataBgSlave1[$key2]->id;
                $result[$key1]["lv2"][$key2]["name"] = $dataBgSlave1[$key2]->typeName;

                $bgSlave2 = new entity\BudgetType();
                $bgSlave2->setMasterId($dataBgSlave1[$key2]->id);
                $bgSlave2->setFormExpense(true);
                $dataBgSlave2 = $this->datacontext->getObject($bgSlave2);

                foreach ($dataBgSlave2 as $key3 => $value3) {
                    $result[$key1]["lv2"][$key2]["lv2"][$key3]["id"] = $dataBgSlave2[$key3]->id;
                    $result[$key1]["lv2"][$key2]["lv2"][$key3]["name"] = $dataBgSlave2[$key3]->typeName;
                }
            }
        }

        return $result;
    }

    public function listBudgetExpenseInfo($budgetPeriodId, $fundgroupId, $planId, $deptId) {
        $result = array();
        $quarter = array(1, 2, 3, 4);

        foreach ($quarter as $id) {
            $result[$id - 1]["quarter"] = $id;
            $sqlList = " select sum(exPlan.expensePlan) as expensePlanTotal,"
                    . " sum(exPlan.expenseUsed) as expenseUsedTotal "
                    . " from " . $this->ent . "\\BudgetExpensePlan exPlan"
                    . " join " . $this->ent . "\\BudgetExpense ex with ex.id = exPlan.expenseId "
                    . " where exPlan.quarterId = :quarterId "
                    . " and ex.planId = :planId "
                    . " and ex.fundgroupId = :fundgroupId "
                    . " and ex.deptId = :deptId";
            $paramList = array(
                "quarterId" => $id,
                "planId" => $planId,
                "fundgroupId" => $fundgroupId,
                "deptId" => $deptId
            );
            $dataList = $this->datacontext->getObject($sqlList, $paramList);

            foreach ($dataList as $key => $value) {
                $result[$id - 1]["list"] = $value;
            }
        }

        return $result;
    }

    public function getAllBudgetRequest($deptId, $budgetTypeCode) {
        $budgetPeriodId = $this->getPeriod()->year;

        $sqlExt = "";
        if (isset($deptId) && $deptId != "") {
            $sqlExt .= "and bgh.deptId = " . $deptId . " ";
        }

        $sql = "select bgh.BudgetHeadId, bgh.budgetPeriodId, bgh.FormBudget as formId, "
                . "'เงินรายได้' as formName, bgh.budgetTypeCode, dept.DepartmentId as deptId, dept.DepartmentName as deptName  "
                . "from Budget_Head bgh "
                . "inner join L3D_Department dept on dept.DepartmentId = bgh.DepartmentId "
                . "where bgh.FormBudget = 500 "
                . "and bgh.budgetTypeCode = '".$budgetTypeCode."' "
                . "and bgh.budgetPeriodId = ".$budgetPeriodId." "
                . $sqlExt
                . "union "
                . "select bgh.BudgetHeadId, bgh.budgetPeriodId, bgh.FormBudget as formId, "
                . "exp.BudgetExpenseName as formName, bgh.budgetTypeCode, dept.DepartmentId as deptId, dept.DepartmentName as deptName "
                . "from Budget_Head bgh "
                . "inner join Budget_Expense exp on exp.budgetHeadId = bgh.budgetHeadId "
                . "inner join L3D_Department dept on dept.DepartmentId = exp.DepartmentId "
                . "where bgh.FormBudget = 999 "
                . "and bgh.budgetTypeCode = '".$budgetTypeCode."' "
                . "and bgh.budgetPeriodId = ".$budgetPeriodId." "
                . "order by bgh.budgetPeriodId asc, bgh.FormBudget asc, dept.DepartmentId asc ";

        $dataBgh = $this->datacontext->pdoQuery($sql);
        return $dataBgh;
    }


    public function listStatusTracking() {

        return $this->datacontext->getObject(new TrackingStatus());
    }

    public function getBudgetScheme($budgetPeriodId, $budgetTypeCode, $deptId, $fundgroupId, $planId) {
        if ($budgetTypeCode == "G") {
            /*
              $sql = "select *
              from View_Scheme_Budget_Plan bg
              where bg.bgPeriodId = '" . $budgetPeriodId . "'
              and bg.deptId = '" . $deptId . "'
              and bg.fundgroupId = '" . $fundgroupId . "'
              and bg.planId = '" . $planId . "'";
             */

            $sql = "exec spGetBudgetPlan :bgPeriodId, :facultyId, :planId, :fundgroupId";
            $param = array("bgPeriodId" => $budgetPeriodId,
                "facultyId" => $deptId,
                "planId" => $planId,
                "fundgroupId" => $fundgroupId
            );
            $data = $this->datacontext->pdoQuery($sql, $param);

            return $data;
        } else if ($budgetTypeCode == "K") {
            $sql = "select *
                from View_Scheme_Revenue_Plan bg
                where (bg.bgPeriodId is null or bg.bgPeriodId = '" . $budgetPeriodId . "')
                and bg.deptId = '" . $deptId . "'
                and bg.fundgroupId = '" . $fundgroupId . "'
                and bg.planId = '" . $planId . "'";

            $data = $this->datacontext->pdoQuery($sql);

            return $data;
        }
    }

    public function updateScheme($budget) {

        if (is_null($budget) || count($budget) <= 0)
            return false;

        for ($i = 0; $i < count($budget); $i++) {
            $bg = new entity\BudgetScheme();

            if ($budget[$i]->bgLevel == "1") {
                $bg->setBudgetTypeId($budget[$i]->bgTypeMasterId);
            } else if ($budget[$i]->bgLevel == "2") {
                $bg->setBudgetTypeId($budget[$i]->bgTypeMainId);
            } else if ($budget[$i]->bgLevel == "3") {
                $bg->setBudgetTypeId($budget[$i]->bgTypeId);
            }

            $bg->setBudgetPeriodId($budget[$i]->bgPeriodId);
            $bg->setBudgetTypeCode($budget[$i]->bgTypeCode);
            $bg->setL3dPlanId($budget[$i]->planId);
            $bg->setDeptId($budget[$i]->deptId);
            $bg->setFundgroupId($budget[$i]->fundgroupId);
            $bg->setBgPlanQ1(str_replace(',', '', $budget[$i]->planQ1));
            $bg->setBgPlanQ2(str_replace(',', '', $budget[$i]->planQ2));
            $bg->setBgPlanQ3(str_replace(',', '', $budget[$i]->planQ3));
            $bg->setBgPlanQ4(str_replace(',', '', $budget[$i]->planQ4));
            $bg->setBgPlanSum(str_replace(',', '', $budget[$i]->planSummary));
            $bg->setBgUsedQ1(str_replace(',', '', $budget[$i]->planQ1));
            $bg->setBgUsedQ2(str_replace(',', '', $budget[$i]->planQ2));
            $bg->setBgUsedQ3(str_replace(',', '', $budget[$i]->planQ3));
            $bg->setBgUsedQ4(str_replace(',', '', $budget[$i]->planQ4));
            $bg->setBgUsedSum(str_replace(',', '', $budget[$i]->usedSummary));

            $dataBg = $this->datacontext->getObject($bg);

            if (!isset($dataBg) || $dataBg == null || count($dataBg) <= 0) {
                if (!$this->datacontext->saveObject($bg)) {
                    return false;
                }
                return true;
            } else {
                $bg->id = $dataBg[0]->id;

                if (!$this->datacontext->updateObject($bg)) {
                    return false;
                }
                return true;
            }
        }
    }

    /* New */

    public function listAllBudgetExpense($facultyId) {
        $year = $this->getPeriod()->year;

        $exp = new entity\BudgetExpense();
        $exp->setBudgetPeriodId($year);
        $exp->setDeptId($facultyId);
        $dataExp = $this->datacontext->getObject($exp);

        $result = array();

        foreach ($dataExp as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->name;
        }

        return $result;
    }

    public function viewBudgetExpense($expId) {
        $result = array();

        $sql = "select exp.id as expId, exp.budgetPeriodId, faculty.id as facultyId, faculty.deptName as facultyName, plan.id as planId, plan.planName as planName, "
                . "proType.id as projectTypeId, proType.typeName as projectTypeName, fund.id as fundId, fund.fundgroupName as fundName, "
                . "exp.name as projectName, exp.director, exp.responder, exp.rationale, exp.objective, exp.target, exp.timeStart, exp.timeEnd,"
                . "exp.budgetEstAmount. exp.budgetEstText, exp.budgetEstDesc, exp.benefits "
                . "from " . $this->ent . "\\BudgetExpense exp "
                . "left outer join " . $this->ent . "\\ProjectType proType with proType.id = exp.projectTypeId "
                . "left outer join " . $this->ent . "\\L3D\\Department faculty with faculty.id = exp.deptId "
                . "left outer join " . $this->ent . "\\L3D\\Plan plan with plan.id = exp.planId "
                . "left outer join " . $this->ent . "\\L3D\\FundGroup fund with fund.id = exp.fundgroupId "
                . "where exp.id = :expId";
        $param = array(
            "expId" => $expId
        );
        $data = $this->datacontext->getObject($sql, $param);
        if ($data != null && count($data) > 0) {
            $result["id"] = $data->id;
            $result["budgetPeriodId"] = $data->budgetPeriodId;
            $result["facultyId"] = $data->facultyId;
            $result["facultyName"] = $data->facultyName;
            $result["planId"] = $data->planId;
            $result["planName"] = $data->planName;
            $result["projectTypeId"] = $data->projectTypeId;
            $result["projectTypeName"] = $data->projectTypeName;
            $result["fundId"] = $data->fundId;
            $result["fundName"] = $data->fundName;
            $result["projectName"] = $data->projectName;
            $result["director"] = $data->director;
            $result["responder"] = $data->responder;
            $result["rationale"] = $data->rationale;
            $result["objective"] = $data->objective;
            $result["target"] = $data->target;
            $result["timeStart"] = $data->timeStart;
            $result["timeEnd"] = $data->timeEnd;
            $result["budgetEstAmount"] = $data->budgetEstAmount;
            $result["budgetEstText"] = $data->budgetEstText;
            $result["budgetEstDesc"] = $data->budgetEstDesc;
            $result["benefits"] = $data->benefits;
        }

        $sqlAff = "select expAff.expenseId as expenseId, expAff.typeId as typeId, expAff.issueId as issueId, expAff.targetId as targetId, expAff.strategyId as strategyId  "
                . " from " . $this->ent . "\\BudgetExpenseAffirmative expAff "
                . " where expAff.expenseId = :expId";
        $dataAff = $this->datacontext->getObject($sqlAff, $param);
        if ($dataAff != null && count($dataAff) > 0) {
            $result["affirmative"] = $dataAff;
        } else {
            $result["affirmative"] = null;
        }

        $sqlInt = "select expInt.expenseId as expenseId, expInt.deptId as deptId, extInt.desc as extIntDesc "
                . " from " . $this->ent . "\\BudgetExpenseIntegration expInt "
                . " where expInt.expenseId = :expId";
        $dataInt = $this->datacontext->getObject($sqlInt, $param);
        if ($dataInt != null && count($dataInt) > 0) {
            $result["integretion"] = $dataInt;
        } else {
            $result["integretion"] = null;
        }

        $sqlOper = "select expOp.expenseId as expenseId, expOp.seq as seq, expOp.operName as name, expOp.timeStart as timeStart, expOp.timeEnd as timeEnd "
                . " from " . $this->ent . "\\BudgetExpenseOperating expOp "
                . " where expOp.expenseId = :expId";
        $dataOper = $this->datacontext->getObject($sqlOper, $param);
        if ($dataOper != null && count($dataOper) > 0) {
            $result["operating"] = $dataOper;
        } else {
            $result["operating"] = null;
        }

        $sqlPlan = "select expPlan.expenseId as expenseId, expPlan.id as expPlanId, expPlan.quarterId as quarterId, expPlan.budgetDate as budgetDate, "
                . " expPlan.budgetDesc as budgetDesc, expPlan.expensePlan as expensePlan, expPlan.expenseUsed as expenseUsed "
                . " from " . $this->ent . "\\BudgetExpensePlan expPlan "
                . " where expPlan.expenseId = :expId";
        $dataPlan = $this->datacontext->getObject($sqlPlan, $param);
        if ($dataPlan != null && count($dataPlan) > 0) {
            $result["plan"] = $dataPlan;
        } else {
            $result["plan"] = null;
        }

        return $result;
    }

    public function addBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan) {
        $result = array();
        $json = new CJSONDecodeImpl();

        /* BudgetExpense */
        $conv = json_decode($bgExp);
        $exp = $json->decode(new entity\BudgetExpense(), $conv);
        $dataExp = $this->datacontext->saveObject($exp);

        $expId = $exp->id;

        /* BudgetExpenseAffirmative */
        $aff = new entity\BudgetExpenseAffirmative();
        $aff->setExpenseId($expId);
        $this->datacontext->removeObject($exp);

        $conv = json_decode($bgAff);
        $affList = $json->decode(new entity\BudgetExpenseAffirmative(), $conv);
        foreach ($affList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseAffirmative";
            }
        }

        /* BudgetExpenseIntegration */
        $int = new entity\BudgetExpenseIntegration();
        $int->setExpenseId($expId);
        $this->datacontext->removeObject($int);

        $conv = json_decode($bgInt);
        $intList = $json->decode(new entity\BudgetExpenseIntegration(), $conv);
        foreach ($intList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseIntegration";
            }
        }

        /* BudgetExpenseOperating */
        $oper = new entity\BudgetExpenseOperating();
        $oper->setExpenseId($expId);
        $this->datacontext->removeObject($oper);

        $conv = json_decode($bgOper);
        $operList = $json->decode(new entity\BudgetExpenseOperating(), $conv);
        foreach ($operList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseOperating";
            }
        }

        /* BudgetExpensePlan */
        $plan = new entity\BudgetExpensePlan();
        $plan->setExpenseId($expId);
        $this->datacontext->removeObject($plan);

        $conv = json_decode($bgPlan);
        $planList = $json->decode(new entity\BudgetExpensePlan(), $conv);
        foreach ($planList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpensePlan";
            }
        }

        return true;
    }

    public function updateBudgetExpense($bgExp, $bgAff, $bgInt, $bgOper, $bgPlan) {
        $result = array();
        $json = new CJSONDecodeImpl();

        /* BudgetExpense */
        $conv = json_decode($bgExp);
        $exp = $json->decode(new entity\BudgetExpense(), $conv);
        $dataExp = $this->datacontext->updateObject($exp);

        $expId = $exp->id;

        /* BudgetExpenseAffirmative */
        $aff = new entity\BudgetExpenseAffirmative();
        $aff->setExpenseId($expId);
        $this->datacontext->removeObject($exp);

        $conv = json_decode($bgAff);
        $affList = $json->decode(new entity\BudgetExpenseAffirmative(), $conv);
        foreach ($affList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseAffirmative";
            }
        }

        /* BudgetExpenseIntegration */
        $int = new entity\BudgetExpenseIntegration();
        $int->setExpenseId($expId);
        $this->datacontext->removeObject($int);

        $conv = json_decode($bgInt);
        $intList = $json->decode(new entity\BudgetExpenseIntegration(), $conv);
        foreach ($intList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseIntegration";
            }
        }

        /* BudgetExpenseOperating */
        $oper = new entity\BudgetExpenseOperating();
        $oper->setExpenseId($expId);
        $this->datacontext->removeObject($oper);

        $conv = json_decode($bgOper);
        $operList = $json->decode(new entity\BudgetExpenseOperating(), $conv);
        foreach ($operList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpenseOperating";
            }
        }

        /* BudgetExpensePlan */
        $plan = new entity\BudgetExpensePlan();
        $plan->setExpenseId($expId);
        $this->datacontext->removeObject($plan);

        $conv = json_decode($bgPlan);
        $planList = $json->decode(new entity\BudgetExpensePlan(), $conv);
        foreach ($planList as $key => $value) {
            if (!$this->datacontext->saveObject($value)) {
                return $result["msg"] = "error in BudgetExpensePlan";
            }
        }

        return true;
    }

}
