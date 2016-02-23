<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IBudgetTypeService;
use th\co\bpg\cde\data\CDataContext;
use apps\common\entity\BudgetType;

class BudgetTypeService extends CServiceBase implements IBudgetTypeService {

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";

    function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    public function viewManage() {
        $view = new CJView("BudgetType/manage", CJViewType::HTML_VIEW_ENGINE);
        return $view;
    }

    public function fetchBudgetType($pData) {

        return $this->datacontext->getObject($pData);
    }

    public function saveBudgetType($pData, $editId) {
        //return $pData;
        if ($editId == NULL) {
            $this->datacontext->saveObject($pData);
        } else {
            $query = new BudgetType();
            $query->setId($editId);
            if ($this->datacontext->removeObject($query)) {
                $this->datacontext->saveObject($pData);
            }
        }
        return $pData;
    }

    public function delBudgetType($pData) {
        $query = new BudgetType();
        $query->setId($pData->id);
        return $this->datacontext->removeObject($query);
    }

    public function listAllBudget($type) {
        $list = array();
        $year = $this->getPeriod()->year;

        $sql0 = "select BudgetTypeId, BudgetTypeName from Budget_Type "
                . "where BudgetTypeCode = :BudgetTypeCode and MasterId = 0 "
                . "and BudgetPeriodId = :BudgetPeriodId";
        $param0 = array("BudgetTypeCode" => $type,
            "BudgetPeriodId" => $year);
        $list0 = $this->datacontext->pdoQuery($sql0, $param0);
        $list = $list0;

        foreach ($list0 as $key0 => $value0) {
            $sql1 = "select BudgetTypeId, BudgetTypeName from Budget_Type "
                    . "where BudgetTypeCode = :BudgetTypeCode and MasterId = :MasterId "
                    . "and BudgetPeriodId = :BudgetPeriodId";
            $param1 = array("BudgetTypeCode" => $type,
                "BudgetPeriodId" => $year,
                "MasterId" => $list0[$key0]["BudgetTypeId"]);
            $list1 = $this->datacontext->pdoQuery($sql1, $param1);
            $list[$key0]["lv1"] = $list1;

            foreach ($list1 as $key1 => $value1) {
                $sql2 = "select BudgetTypeId, BudgetTypeName from Budget_Type "
                        . "where BudgetTypeCode = :BudgetTypeCode and MasterId = :MasterId "
                        . "and BudgetPeriodId = :BudgetPeriodId";
                $param2 = array("BudgetTypeCode" => $type,
                    "BudgetPeriodId" => $year,
                    "MasterId" => $list1[$key1]["BudgetTypeId"]);
                $list2 = $this->datacontext->pdoQuery($sql2, $param2);
                $list[$key0]["lv1"][$key1]["lv2"] = $list2;

                foreach ($list2 as $key2 => $value2) {
                    $sql3 = "select BudgetTypeId, BudgetTypeName from Budget_Type "
                            . "where BudgetTypeCode = :BudgetTypeCode and MasterId = :MasterId "
                            . "and BudgetPeriodId = :BudgetPeriodId";
                    $param3 = array("BudgetTypeCode" => $type,
                        "BudgetPeriodId" => $year,
                        "MasterId" => $list2[$key2]["BudgetTypeId"]);
                    $list3 = $this->datacontext->pdoQuery($sql3, $param3);
                    $list[$key0]["lv1"][$key1]["lv2"][$key2]["lv3"] = $list3;
                }
            }
        }

        return $list;
    }

    public function addBudgetType($pData) {
        $pData->bgPeriodId = $this->getPeriod()->year;
        return $this->datacontext->saveObject($pData);
    }

    public function updateBudgetType($pData) {
        $pData["bgPeriodId"] = $this->getPeriod()->year;
        return $this->datacontext->updateObject($pData);
    }

}
