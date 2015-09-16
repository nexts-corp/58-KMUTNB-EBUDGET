<?php

namespace apps\common\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use th\co\bpg\cde\data\CDataContext;
use apps\common\interfaces\ILookupService;
use apps\common\entity;

class LookupService extends CServiceBase implements ILookupService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
    }

    public function listFaculty() {
        $repo = new entity\LKFaculty();
        $repo->setIsActive(1);
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listDepartment($facultyId) {
        $repo = new entity\LKDepartment();
        $repo->setIsActive(1);
        $repo->setFacultyId($facultyId);
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listFundgroup() {
        $repo = new entity\LKFundGroup();
        $repo->setMasterId(0);
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listRevenuePlan() {
        $repo = new entity\RevenuePlan();
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listBudgetPlan() {
        $repo = new entity\BudgetPlan();
        $data = $this->datacontext->getObject($repo);
        return $data;
    }

    public function listBudgetProduct() {
        $repo = new entity\BudgetProduct();
        $data = $this->datacontext->getObject($repo);
        return $data;
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
