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

    public function listsDepartment() {
        $repo = "SELECT"
                ." dp.id, dp.deptName AS name, dp.masterId"
            ." FROM ".$this->ent."\\L3D\\Department dp"
            ." WHERE dp.deptStatus = :status"
                ." AND dp.id > :id"
                ." AND dp.deptGroup = :group";
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

    public function addRevenue($revenuePlan) {
        $return = true;

        $revenuePlan->budgetPeriodId = $this->getPeriod()->year;
        $revenuePlan->budgetTypeCode = "K";
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

        $data->budgetEducation =  $revenuePlan->budgetEducation;
        $data->budgetService =  $revenuePlan->budgetService;
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
                ." bh.id,"
                ." be.name AS projName,"
                ." be.deptId,"
                ." be.budgetEstAmount As deptValue"
            ." FROM " . $this->ent . "\\BudgetHead bh"
            ." JOIN " . $this->ent . "\\BudgetExpense be WITH bh.id = be.budgetHeadId"
            ." WHERE bh.formId = :form"
                ." AND bh.budgetTypeCode = :type"
                ." AND bh.budgetPeriodId = :year"
            ." ORDER BY bh.id, be.id";

        $param = array(
            "form" => "999",
            "type" => "K",
            "year" => $this->getPeriod()->year
        );

        $dataIAT = $this->datacontext->getObject($sql, $param);

        return $dataIAT;
    }

    public function addProject($projectName, $budgetTotal, $deptId) {

    }

    public function updateProject($bgHeadId, $projectName, $budgetPeriodId, $budgetTotal, $deptId) {

    }

    public function deleteProject($bgHeadId) {

    }
}
