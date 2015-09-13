<?php

namespace apps\affirmative\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\affirmative\interfaces\IAffirmativeInfoService;

class AffirmativeInfoService extends CServiceBase implements IAffirmativeInfoService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function listMainType($budgetYear) {
        $sql = "SELECT"
                . " planType.id, planType.planTypeCode, planType.planTypeName"
                . " FROM " . $this->ent . "\\MainPlanType planType "
                . " WHERE budgetYear =:budgetYear, isActive=:isActive";
        $param = array(
            "budgetYear" => $budgetYear,
            "isActive" => 1
        );
        $data = $this->datacontext->getObject($sql, $param); //get list of form
        return $data;
    }

    public function listMainIssue($typeId) {
        
    }

    public function listMainKpi($targetId) {
        
    }

    public function listMainStrategy($targetId) {
        
    }

    public function listMainTarget($issueId) {
        
    }

    public function listMainPlan($budgetYear) {
//        $obj = new \apps\common\entity\Activity();
//        $obj->xx = "xxxx";
//        return $obj;

        $sql = "SELECT"
                . " planType.id, planType.planTypeCode, planType.planTypeName"
                . " FROM " . $this->ent . "\\MainPlanType planType "
                . " WHERE budgetYear =:budgetYear, isActive=:isActive";
        $param = array(
            "budgetYear" => $budgetYear,
            "isActive" => 1
        );
        $data = $this->datacontext->getObject($sql, $param); //get list of form
        return $data;
    }

}
