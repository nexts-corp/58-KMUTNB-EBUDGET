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

    public function getAllBudgetRequest($budgetPeriodId, $deptId) {
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
                . "where bgh.budgetTypeCode = 'G' "
                . $sqlExt
                . "and bgh.budgetPeriodId = :budgetPeriodId "
                . "order by status.id, bgh.formId, dept.id, l3dPlan.id, fund.id asc ";

        $param = array("budgetPeriodId" => $budgetPeriodId);
        $data = $this->datacontext->getObject($sql, $param);

        return $data;

        /*
         * DO NOT DELETE
          $sql = "select bgh.id as bghId, "
          . "case when bgh.formId = 140 then bg140.id "
          . "when bgh.formId = 141 then bg141.id "
          . "when bgh.formId = 142 then bg142.id "
          . "when bgh.formId = 143 then bg143.id "
          . "when bgh.formId = 144 then bg144.id "
          . "when bgh.formId = 145 then bg145.id "
          . "when bgh.formId = 146 then bg146.id "
          . "else 0 end as bgId, "
          . "bgh.formId as formId, dept.id as deptId, dept.deptName as deptName, "
          . "bgPlan.planName as planName, bgProj.projectName as projectName, fund.fundgroupName as fundName "
          . "from " . $this->ent . "\\BudgetHead bgh "
          . "left outer join " . $this->ent . "\\Budget140 bg140 with bgh.id = bg140.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget141 bg141 with bgh.id = bg141.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget142 bg142 with bgh.id = bg142.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget143 bg143 with bgh.id = bg143.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget144 bg144 with bgh.id = bg144.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget145 bg145 with bgh.id = bg145.budgetHeadId "
          . "left outer join " . $this->ent . "\\Budget146 bg146 with bgh.id = bg146.budgetHeadId "
          . "left outer join " . $this->ent . "\\L3D\\Department dept with dept.id = bgh.deptId "
          . "left outer join " . $this->ent . "\\BudgetPlan bgPlan with bgPlan.id = bgh.planId "
          . "left outer join " . $this->ent . "\\BudgetProject bgProj with bgProj.id = bgh.projectId "
          . "left outer join " . $this->ent . "\\L3D\\FundGroup fund with fund.id = bgh.fundgroupId "
          . "where bgh.budgetTypeCode = 'G' and bgh.statusId = 1 "
          . "and bgh.budgetPeriodId = :budgetPeriodId "
          . "order by bgh.formId asc ";
          $param = array("budgetPeriodId" => $budgetPeriodId);
          $data = $this->datacontext->getObject($sql, $param);

          return $data;

         */
    }

    /*
      public function getBudgetExpense($budgetPeriodId, $deptId, $issueId, $targetId, $strategyId) {
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

      $sql = " select ex.id, ex.name, exPlan.quarterId, exPlan.expensePlan, exPlan.expenseUsed  "
      . " from " . $this->ent . "\\BudgetExpense ex "
      . " join " . $this->ent . "\\BudgetExpenseAffirmative exAff with ex.id = exAff.expenseId "
      . " join " . $this->ent . "\\BudgetExpenseIntegration exInt with ex.id = exInt.expenseId "
      . " join " . $this->ent . "\\BudgetExpenseOperating exOper with ex.id = exOper.expenseId "
      . " join " . $this->ent . "\\BudgetExpensePlan exPlan with ex.id = exPlan.expenseId "
      . " where ex.budgetPeriodId = $budgetPeriodId "
      . " and ex.budgetTypeId = " + $dataBgSlave2[$key3]->id;
      if (isset($deptId)) {
      $sql += " and ex.deptId = $deptId ";
      }
      if (isset($issueId)) {
      $sql += " and exAff.issueId = $issueId ";
      }
      if (isset($targetId)) {
      $sql += " and exAff.targetId = $targetId ";
      }
      if (isset($strategyId)) {
      $sql += " and exAff.strategyId = $strategyId ";
      }

      $data = $this->datacontext->getObject($sql);

      $result[$key1]["lv2"][$key2]["lv2"][$key3]["expense"] = $data;
      }
      }
      }

      return $result;
      }
     */

    public function listStatusTracking() {

        return $this->datacontext->getObject(new TrackingStatus());
    }

    public function getBudgetScheme($budgetPeriodId, $budgetTypeCode, $deptId, $fundgroupId, $planId) {
        if ($budgetTypeCode == "G") {
            $sql = "select
                bg.planId,
                bg.deptId, 
                bg.fundgroupId,
                bgType.bgTypeMasterId, bgType.bgTypeMasterName,
                bgType.bgTypeMainId, bgType.bgTypeMainName,
                bgType.bgTypeId, bgType.bgTypeName,
                bgType.bgTypeSubId, bgType.bgTypeSubName,
                bg.budgetSummary, 
                bgScheme.BUDGETPLAN_SUMMARY as planSummary, bgScheme.BUDGETUSED_SUMMARY as usedSummary,
                bgScheme.BUDGETPLAN_Q1 as planQ1, bgScheme.BUDGETUSED_Q1 as usedQ1,
                bgScheme.BUDGETPLAN_Q2 as planQ2, bgScheme.BUDGETUSED_Q2 as usedQ2,
                bgScheme.BUDGETPLAN_Q3 as planQ3, bgScheme.BUDGETUSED_Q3 as usedQ3,
                bgScheme.BUDGETPLAN_Q4 as planQ4, bgScheme.BUDGETUSED_Q4 as usedQ4
                from (
                    select 
                        bgTypeTmp.bgTypeMasterId, bgTypeTmp.bgTypeMasterName,
                        bgTypeTmp.bgTypeMainId, bgTypeTmp.bgTypeMainName,
                        bgTypeTmp.bgTypeId, bgTypeTmp.bgTypeName,
                        case when bgTypeTmp.bgTypeSubId is not null then bgTypeTmp.bgTypeSubId else bgTypeTmp.bgTypeId end as bgTypeSubId, 
                        case when bgTypeTmp.bgTypeSubName is not null then bgTypeTmp.bgTypeSubName else bgTypeTmp.bgTypeName end as bgTypeSubName
                    from (
                        select 
                        bgTypeMaster.BUDGETTYPEID as bgTypeMasterId, bgTypeMaster.BUDGETTYPENAME as bgTypeMasterName,
                        bgTypeMain.BUDGETTYPEID as bgTypeMainId, bgTypeMain.BUDGETTYPENAME as bgTypeMainName,
                        case when bgType.BUDGETTYPEID is not null then bgType.BUDGETTYPEID else bgTypeMain.BUDGETTYPEID end as bgTypeId, 
                        case when bgType.BUDGETTYPENAME is not null then bgType.BUDGETTYPENAME else bgTypeMain.BUDGETTYPENAME end as bgTypeName,
                        bgTypeSub.BUDGETTYPEID as bgTypeSubId, bgTypeSub.BUDGETTYPENAME as bgTypeSubName
                        from BUDGETTYPE bgTypeMaster
                        left outer join BUDGETTYPE bgTypeMain on bgTypeMaster.BUDGETTYPEID = bgTypeMain.MASTERID
                        left outer join BUDGETTYPE bgType on bgTypeMain.BUDGETTYPEID = bgType.MASTERID
                        left outer join BUDGETTYPE bgTypeSub on bgType.BUDGETTYPEID = bgTypeSub.MASTERID
                        where bgTypeMaster.MASTERID = 0
                        and bgTypeMaster.BUDGETTYPECODE = '".$budgetTypeCode."'
                        and bgTypeMain.BUDGETTYPECODE = '".$budgetTypeCode."'
                    ) bgTypeTmp
                ) bgType
                left outer join BUDGETSCHEME bgScheme on bgScheme.BUDGETTYPEID = bgType.bgTypeSubId
                left outer join (
                    select 
                        bgh.DEPARTMENTID as deptId,
                        bgh.L3D_PLANID as planId,
                        bgh.FUNDGROUPID as fundgroupId,
                        (case 
                            when bgh.FORMBUDGET = 140 then bg140.BUDGETTYPEID
                            when bgh.FORMBUDGET = 141 then bg141.BUDGETTYPEID
                            when bgh.FORMBUDGET = 142 then bg142.BUDGETTYPEID
                            when bgh.FORMBUDGET = 143 then bg143.BUDGETTYPEID
                            when bgh.FORMBUDGET = 144 then bg144.BUDGETTYPEID
                            when bgh.FORMBUDGET = 145 then bg145.BUDGETTYPEID
                            when bgh.FORMBUDGET = 146 then bg146.BUDGETTYPEID
                        else 0 end) as budgetTypeId,
                        coalesce(sum(bg140.BUDGETSUMMARY), 0) + 
                        coalesce(sum(bg141.BUDGETSUMMARY), 0) +
                        coalesce(sum(bg142.BUDGETSUMMARY), 0) +
                        coalesce(sum(bg143.BUDGETSUMMARY), 0) +
                        coalesce(sum(bg144.BUDGETSUMMARY), 0) +
                        coalesce(sum(bg145.BUDGETSUMMARY), 0) +
                        coalesce(sum(bg146.BUDGETSUMMARY), 0) as budgetSummary
                    from BUDGETHEAD bgh
                    left outer join BUDGET140 bg140 on bgh.BUDGETHEADID = bg140.BUDGETHEADID
                    left outer join BUDGET141 bg141 on bgh.BUDGETHEADID = bg141.BUDGETHEADID
                    left outer join BUDGET142 bg142 on bgh.BUDGETHEADID = bg142.BUDGETHEADID
                    left outer join BUDGET143 bg143 on bgh.BUDGETHEADID = bg143.BUDGETHEADID
                    left outer join BUDGET144 bg144 on bgh.BUDGETHEADID = bg144.BUDGETHEADID
                    left outer join BUDGET145 bg145 on bgh.BUDGETHEADID = bg145.BUDGETHEADID
                    left outer join BUDGET146 bg146 on bgh.BUDGETHEADID = bg146.BUDGETHEADID
                    where bgh.BUDGETTYPECODE = '".$budgetTypeCode."'
                    and bgh.BUDGETPERIODID = '".$budgetPeriodId."'
                    and bgh.DEPARTMENTID = '".$deptId."'
                    and bgh.FUNDGROUPID = '".$fundgroupId."'
                    and bgh.L3D_PLANID = '".$planId."'
                    group by bgh.DEPARTMENTID, bgh.L3D_PLANID, bgh.FUNDGROUPID, bgh.FORMBUDGET, 
                    bg140.BUDGETTYPEID, bg141.BUDGETTYPEID, bg142.BUDGETTYPEID, bg143.BUDGETTYPEID, bg144.BUDGETTYPEID, bg145.BUDGETTYPEID, bg146.BUDGETTYPEID
                ) bg on bg.budgetTypeId = bgType.bgTypeSubId";
           
            $data = $this->datacontext->pdoQuery($sql);
            
            return $data;
            
        } else if ($budgetTypeCode == "K") {
            $sql = "select
                bg.planId,
                bg.deptId, 
                bg.fundgroupId,
                bgType.bgTypeMasterId, bgType.bgTypeMasterName,
                bgType.bgTypeMainId, bgType.bgTypeMainName,
                bg.budgetSummary, 
                bgScheme.BUDGETPLAN_SUMMARY as planSummary, bgScheme.BUDGETUSED_SUMMARY as usedSummary,
                bgScheme.BUDGETPLAN_Q1 as planQ1, bgScheme.BUDGETUSED_Q1 as usedQ1,
                bgScheme.BUDGETPLAN_Q2 as planQ2, bgScheme.BUDGETUSED_Q2 as usedQ2,
                bgScheme.BUDGETPLAN_Q3 as planQ3, bgScheme.BUDGETUSED_Q3 as usedQ3,
                bgScheme.BUDGETPLAN_Q4 as planQ4, bgScheme.BUDGETUSED_Q4 as usedQ4
                from (
                    select 
                        bgTypeTmp.bgTypeMasterId, bgTypeTmp.bgTypeMasterName,
                        bgTypeTmp.bgTypeMainId, bgTypeTmp.bgTypeMainName,
                        bgTypeTmp.bgTypeId, bgTypeTmp.bgTypeName,
                        case when bgTypeTmp.bgTypeSubId is not null then bgTypeTmp.bgTypeSubId else bgTypeTmp.bgTypeId end as bgTypeSubId, 
                        case when bgTypeTmp.bgTypeSubName is not null then bgTypeTmp.bgTypeSubName else bgTypeTmp.bgTypeName end as bgTypeSubName
                    from (
                        select 
                        bgTypeMaster.BUDGETTYPEID as bgTypeMasterId, bgTypeMaster.BUDGETTYPENAME as bgTypeMasterName,
                        bgTypeMain.BUDGETTYPEID as bgTypeMainId, bgTypeMain.BUDGETTYPENAME as bgTypeMainName,
                        case when bgType.BUDGETTYPEID is not null then bgType.BUDGETTYPEID else bgTypeMain.BUDGETTYPEID end as bgTypeId, 
                        case when bgType.BUDGETTYPENAME is not null then bgType.BUDGETTYPENAME else bgTypeMain.BUDGETTYPENAME end as bgTypeName,
                        bgTypeSub.BUDGETTYPEID as bgTypeSubId, bgTypeSub.BUDGETTYPENAME as bgTypeSubName
                        from BUDGETTYPE bgTypeMaster
                        left outer join BUDGETTYPE bgTypeMain on bgTypeMaster.BUDGETTYPEID = bgTypeMain.MASTERID
                        left outer join BUDGETTYPE bgType on bgTypeMain.BUDGETTYPEID = bgType.MASTERID
                        left outer join BUDGETTYPE bgTypeSub on bgType.BUDGETTYPEID = bgTypeSub.MASTERID
                        where bgTypeMaster.MASTERID = 0
                        and bgTypeMaster.BUDGETTYPECODE = '".$budgetTypeCode."'
                        and bgTypeMain.BUDGETTYPECODE = '".$budgetTypeCode."'
                    ) bgTypeTmp
                ) bgType
                left outer join BUDGETSCHEME bgScheme on bgScheme.BUDGETTYPEID = bgType.bgTypeSubId
                left outer join (
                    select 
                        bgh.DEPARTMENTID as deptId,
                        bgh.L3D_PLANID as planId,
                        bgh.FUNDGROUPID as fundgroupId,
                        rv.BUDGETTYPEID as budgetTypeId,
                        coalesce(sum(rv.BUDGETAMOUNT), 0) as budgetSummary
                    from BUDGETHEAD bgh
                    left outer join BUDGETREVENUE rv on rv.BUDGETHEADID = bgh.BUDGETHEADID
                    where bgh.BUDGETTYPECODE = '".$budgetTypeCode."'
                    and bgh.BUDGETPERIODID = '".$budgetPeriodId."'
                    and bgh.DEPARTMENTID = '".$deptId."'
                    and bgh.FUNDGROUPID = '".$fundgroupId."'
                    and bgh.L3D_PLANID = '".$planId."'
                    group by bgh.DEPARTMENTID, bgh.L3D_PLANID, bgh.FUNDGROUPID, rv.BUDGETTYPEID
                ) bg on bg.budgetTypeId = bgType.bgTypeSubId
                group by bg.planId,
                bg.deptId, 
                bg.fundgroupId,
                bgType.bgTypeMasterId, bgType.bgTypeMasterName,
                bgType.bgTypeMainId, bgType.bgTypeMainName,
                bgType.bgTypeId, bgType.bgTypeName,
                bgType.bgTypeSubId, bgType.bgTypeSubName,
                bg.budgetSummary,
                bgScheme.BUDGETPLAN_SUMMARY, bgScheme.BUDGETUSED_SUMMARY,
                bgScheme.BUDGETPLAN_Q1, bgScheme.BUDGETUSED_Q1,
                bgScheme.BUDGETPLAN_Q2, bgScheme.BUDGETUSED_Q2,
                bgScheme.BUDGETPLAN_Q3, bgScheme.BUDGETUSED_Q3,
                bgScheme.BUDGETPLAN_Q4, bgScheme.BUDGETUSED_Q4";
            
            $data = $this->datacontext->pdoQuery($sql);
            
            return $data;
        }
    }

    public function insertScheme($budget) {
        
    }

    public function updateScheme($budget) {
        
    }

}
