<?php

namespace apps\common\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\data\CDataContext;
use apps\common\interfaces\ILookupService;
use apps\common\entity;
use apps\common\entity\L3D;

class LookupService extends CServiceBase implements ILookupService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    public function listCampus() {
        $repo = new L3D\Campus();
        $repo->setCampusStatus("Y");
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listFaculty($campusId) {
        $repo = new L3D\Department();
        $repo->setDeptGroup("A");
        $repo->setDeptStatus("Y");
        if (isset($campusId) && $campusId != "0") {
            $repo->setCampusId($campusId);
        }
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
        }
        return $result;
    }

    public function listDepartment($facultyId) {
        $repo = new L3D\Department();
        $repo->setDeptStatus("Y");
        if (isset($facultyId) && $facultyId != "0") {
            $repo->setMasterId($facultyId);
        }
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->deptName;
        }
        return $result;
    }

    public function listFundgroup() {
        $repo = new L3D\FundGroup();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->fundgroupName;
        }
        return $result;
    }

    public function listBudgetPlan($budgetYear) {
        $repo = new entity\BudgetPlan();
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->planName;
        }
        return $result;
    }

    public function listBudgetProject($planId) {
        $repo = new entity\BudgetProject();
        $repo->setPlanId($planId);
        $data = $this->datacontext->getObject($repo);

        $result = array();
        foreach ($data as $key => $value) {
            $result[$key]["id"] = $value->id;
            $result[$key]["name"] = $value->projectName;
            $result[$key]["type"] = $value->projectType;
        }
        return $result;
    }

    public function listYear() {
        $sql = "select max(y.year) AS fmax,min(y.year) AS fmin from " . $this->ent . "\\Year y";
        $data = $this->datacontext->getObject($sql);
        $list = null;
        $k = 0;
        for ($i = (int) $data[0]["fmin"]; $i < (int) $data[0]["fmax"] + 2; $i++) {
            $list[$k]["year"] = $i;
            $k++;
        }
        return $list;
    }

}
