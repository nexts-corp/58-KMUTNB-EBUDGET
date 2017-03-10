<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetExpenseService;
use apps\common\entity;

class BudgetExpenseService extends CServiceBase implements IBudgetExpenseService {

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
