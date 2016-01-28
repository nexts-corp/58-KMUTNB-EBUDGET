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

}
