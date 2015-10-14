<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IAllocateService;

class AllocateService extends CServiceBase implements IAllocateService {

    public $datacontext;
    //public $logger;

    private $pathEnt = "apps\\common\\entity\\";

    public function __construct() {
        //$this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext();
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

    public function addExpenseProject($projectName, $budgetPeriodId, $budgetTotal, $departmentId) {
        $return = true;
        foreach ($departmentId as $key => $value) {
            $obj = new \apps\common\entity\BudgetExpense();
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $departmentId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                $return = false;
                return $return;
            }
        }

        return $return;
    }

    public function updateExpenseProject($projectId, $projectName, $budgetPeriodId, $budgetTotal, $departmentId) {
        $return = true;
        $obj = new \apps\common\entity\BudgetExpense();
        $obj->setId($projectId);
        if ($this->datacontext->removeObject($obj)) {
            foreach ($departmentId as $key => $value) {
                $obj = new \apps\common\entity\BudgetExpense();
                $obj->name = $projectName;
                $obj->budgetPeriodId = $budgetPeriodId;
                $obj->budgetEstAmount = $budgetTotal[$key];
                $obj->deptId = $departmentId[$key];
                if (!$this->datacontext->saveObject($obj)) {
                    $return = false;
                }
            }
        } else {
            $return = false;
        }

        return $return;
    }

    public function deleteExpenseProject($projectId) {
        $return = true;
        $obj = new \apps\common\entity\BudgetExpense();
        $obj->setId($projectId);
        if (!$this->datacontext->removeObject($obj)) {
            $return = false;
        }
        return $return;
    }

}
