<?php

namespace apps\revenue\service;

use apps\revenue\interfaces\IPlaningService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class PlaningService extends CServiceBase implements IPlaningService {

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

    public function listsDepartment() {
        $repo = "SELECT"
                . " dp.id, dp.deptName AS name, dp.masterId"
                . " FROM " . $this->ent . "\\L3D\\Department dp"
                . " WHERE dp.deptStatus = :status"
                . " AND dp.id > :id"
                . " AND dp.deptGroup = :group";
        $param = array(
            "status" => "Y",
            "id" => 0,
            "group" => "A"
        );
        $data = $this->datacontext->getObject($repo, $param);

        return $data;
    }

    public function fetchRevenue() {
        $sql = "SELECT"
                . " rp.id, rp.deptId, dp.deptName, rp.budgetEducation, rp.budgetService, rp.budgetTotal"
                . " FROM " . $this->ent . "\\BudgetRevenuePlan rp"
                . " JOIN " . $this->ent . "\\L3D\\Department dp WITH dp.id = rp.deptId"
                . " WHERE rp.budgetPeriodId = :year";
        $param = array(
            "year" => $this->getPeriod()->year
        );

        $data = $this->datacontext->getObject($sql, $param);

        return $data;
    }

    public function addRevenue($revenuePlan) {
        $year = $this->getPeriod()->year;
        $return = true;

        $bgHead = new \apps\common\entity\BudgetHead();
        $bgHead->setFormId(500);
        $bgHead->setBudgetPeriodId($year);
        $bgHead->setBudgetTypeCode("K");
        $bgHead->setDeptId($revenuePlan->deptId);
        $dataHead = $this->datacontext->saveObject($bgHead);
        //$headId = $bgHead->id;

        $revenuePlan->budgetPeriodId = $year;
        $revenuePlan->budgetTypeCode = 'K';
        $revenuePlan->budgetTotal = $revenuePlan->budgetEducation + $revenuePlan->budgetService;

        if (!$this->datacontext->saveObject($revenuePlan)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateRevenue($revenuePlan) {
        $return = true;

        $rp = new \apps\common\entity\BudgetRevenuePlan();
        $rp->id = $revenuePlan->id;
        $data = $this->datacontext->getObject($rp)[0];

        $data->budgetEducation = $revenuePlan->budgetEducation;
        $data->budgetService = $revenuePlan->budgetService;
        $data->budgetTotal = $revenuePlan->budgetEducation + $revenuePlan->budgetService;

        if (!$this->datacontext->updateObject($data)) {
            return $this->datacontext->getLastMessage();
        }

        return $return;
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

    public function fetchProject() {
        $sql = "SELECT"
                . " be.id,"
                . " bh.id AS headId,"
                . " be.name AS projName,"
                . " be.deptId,"
                . " dp.deptName,"
                . " be.budgetEstAmount As deptValue"
                . " FROM " . $this->ent . "\\BudgetHead bh"
                . " JOIN " . $this->ent . "\\BudgetExpense be WITH bh.id = be.budgetHeadId"
                . " JOIN " . $this->ent . "\\L3D\\Department dp WITH dp.id = be.deptId"
                . " WHERE bh.formId = :form"
                . " AND bh.budgetTypeCode = :type"
                . " AND bh.budgetPeriodId = :year"
                . " ORDER BY bh.id, be.id";

        $param = array(
            "form" => "999",
            "type" => "K",
            "year" => $this->getPeriod()->year
        );

        $dataIAT = $this->datacontext->getObject($sql, $param);

        return $dataIAT;
    }

    public function addProject($projectName, $budgetTotal, $deptId) {
        $budgetPeriodId = $this->getPeriod()->year;

        $return = true;

        $bgHead = new \apps\common\entity\BudgetHead();
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
        $headId = $bgHead->id;

        foreach ($deptId as $key => $value) {
            $obj = new \apps\common\entity\BudgetExpense();
            $obj->budgetHeadId = $headId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function updateProject($bgHeadId, $projectName, $budgetTotal, $deptId) {
        $return = true;

        $exp = new \apps\common\entity\BudgetExpense();
        $exp->setBudgetHeadId($bgHeadId);
        $data = $this->datacontext->getObject($exp);

        if (!$this->datacontext->removeObject($data)) {
            return $this->datacontext->getLastMessage();
        }

        foreach ($deptId as $key => $value) {
            $obj = new \apps\common\entity\BudgetExpense();
            $obj->budgetHeadId = $bgHeadId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $this->getPeriod()->year;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function deleteProject($bgHeadId) {
        $return = true;

        $obj = new \apps\common\entity\BudgetExpense();
        $obj->setBudgetHeadId($bgHeadId);
        $data = $this->datacontext->getObject($obj);
        if (!$this->datacontext->removeObject($data)) {
            return $this->datacontext->getLastMessage();
        }

        $bgHead = new \apps\common\entity\BudgetHead();
        $bgHead->setId($bgHeadId);
        $dataHead = $this->datacontext->getObject($bgHead);
        if (!$this->datacontext->removeObject($dataHead)) {
            return $this->datacontext->getLastMessage();
        }

        return $return;
    }

}
