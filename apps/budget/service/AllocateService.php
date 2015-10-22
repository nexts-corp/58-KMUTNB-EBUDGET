<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IAllocateService;
use apps\common\entity;

class AllocateService extends CServiceBase implements IAllocateService {

    public $datacontext;
    //public $logger;

    private $pathEnt = "apps\\common\\entity\\";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
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

    public function addExpenseProject($projectName, $budgetPeriodId, $budgetTotal, $deptId) {
        $return = true;

        $bgHead = new entity\BudgetHead();
        $bgHead->setFormId(999);
        $bgHead->setBudgetPeriodId($budgetPeriodId);
        $bgHead->setBudgetTypeCode('K');
        if (count($deptId) == 1) {
            $bgHead->setIsCoBudget(false);
            $bgHead->setDeptId($deptId[0]);
        } else {
            $bgHead->setIsCoBudget(true);
        }

        $dataHead = $this->datacontext->getObject($bgHead);

        if ($dataHead) {
            $headId = $dataHead[0]->id;
        } else {
            $dataHead = $this->datacontext->saveObject($bgHead);
            $headId = $bgHead->id;
        }

        foreach ($deptId as $key => $value) {
            $obj = new entity\BudgetExpense();
            $obj->budgetHeadId = $headId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                $return = false;
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function updateExpenseProject($bgHeadId, $projectName, $budgetPeriodId, $budgetTotal, $deptId) {
        $return = true;

        $exp = new entity\BudgetExpense();
        $exp->setBudgetHeadId($bgHeadId);
        $data = $this->datacontext->getObject($exp);

        if (!$this->datacontext->removeObject($data)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }

        foreach ($deptId as $key => $value) {
            
            $obj = new entity\BudgetExpense();
            $obj->budgetHeadId = $bgHeadId;
            $obj->name = $projectName;
            $obj->budgetPeriodId = $budgetPeriodId;
            $obj->budgetTypeId = 30100000;
            $obj->budgetTypeCode = "K";
            $obj->budgetEstAmount = $budgetTotal[$key];
            $obj->deptId = $deptId[$key];
            if (!$this->datacontext->saveObject($obj)) {
                $return = false;
                return $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function deleteExpenseProject($bgHeadId) {
        $return = true;
        
        $obj = new entity\BudgetExpense();
        $obj->setId($bgHeadId);
        $data = $this->datacontext->getObject($obj);        
        if (!$this->datacontext->removeObject($data)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }
        
        $bgHead = new entity\BudgetHead();
        $bgHead->setId($bgHeadId);
        $dataHead = $this->datacontext->getObject($bgHead);        
        if (!$this->datacontext->removeObject($dataHead)) {
            $return = false;
            return $this->datacontext->getLastMessage();
        }
        
        return $return;
    }

    public function fetchRevenue($budgetPeriodId) {

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

    public function addRevenue($deptId, $budgetPeriodId, $bgEducation, $bgService) {

        $bg = new entity\BudgetRevenuePlan();
        $bg->setBudgetPeriodId($budgetPeriodId);
        $bg->setDeptId($deptId);
        
        $data = $this->datacontext->getObject($bg);
        
        if($data) {
            return "duplicate department, pls use update function!";
        }
        
        $bg->setBudgetTypeCode("K");
        $bg->setBudgetEducation($bgEducation);
        $bg->setBudgetService($bgService);
        $bg->setBudgetTotal($bgEducation + $bgService);

        if ($this->datacontext->saveObject($bg)) {
            $return = $bg->id;
            //return $this->datacontext->getLastMessage();
        } else {
            $return = 0;
        }

        return $bg;
    }

    public function updateRevenue($id, $bgEducation, $bgService) {
        $return = true;

        $bg = new entity\BudgetRevenuePlan();
        $bg->setId($id);
        $bg->setDeptId($deptId);
        $bg->setBudgetPeriodId($budgetPeriodId);
        $bg->setBudgetEducation($bgEducation);
        $bg->setBudgetService($bgService);

        if (!$this->datacontext->updateObject($bg)) {
            $return = false;
            //return $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteRevenue($id) {
        $return = true;

        $bg = new entity\BudgetRevenuePlan();
        $bg->setId($id);
        if (!$this->datacontext->removeObject($bg)) {
            $return = false;
            //return $this->datacontext->getLastMessage();
        }

        return $return;
    }

}
