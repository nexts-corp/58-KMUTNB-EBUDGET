<?php

namespace apps\budget\service;

use apps\budget\interfaces\IBudgetTrackingService;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;

class BudgetTrackingService extends CServiceBase implements IBudgetTrackingService
{
    public $datacontext;
    public $pathEnt = "apps\\common\\entity";

    public function __construct()
    {
        $this->datacontext = new CDataContext();
    }


    public function getInfoTracking($budgetType)
    {
        $dataArr = array();
        if ($budgetType == "1") { //เงินรายได้

            $sql = "SELECT rvt.id, rvt.typeName ,0 as list FROM " . $this->pathEnt . "\\RevenueType rvt WHERE rvt.masterId=0";
            $dataArr = $this->datacontext->getObject($sql);

            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT rvt.id, rvt.typeName,0 as list2 FROM " . $this->pathEnt . "\\RevenueType rvt WHERE rvt.masterId=" . $dataArr[$i]["id"];
                $dataInner = $this->datacontext->getObject($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT rvt.id, rvt.typeName FROM " . $this->pathEnt . "\\RevenueType rvt WHERE rvt.masterId=" . $dataInner[$y]["id"];
                    $dataInner2 = $this->datacontext->getObject($sql);
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        } else if ($budgetType == "2") { //เงินงบประมาณแผ่นดิน

            $sql = "SELECT bgt.id, bgt.typeName ,0 as list FROM " . $this->pathEnt . "\\BudgetType bgt WHERE bgt.masterId=0";
            $dataArr = $this->datacontext->getObject($sql);
            for ($i = 0; $i < count($dataArr); $i++) {
                //get lvl2
                $sql = "SELECT bgt.id, bgt.typeName,0 as list2 FROM " . $this->pathEnt . "\\BudgetType bgt WHERE bgt.masterId=" . $dataArr[$i]["id"];
                $dataInner = $this->datacontext->getObject($sql);
                for ($y = 0; $y < count($dataInner); $y++) {
                    //get lvl3
                    $sql = "SELECT bgt.id, bgt.typeName FROM " . $this->pathEnt . "\\BudgetType bgt WHERE bgt.masterId=" . $dataInner[$y]["id"];
                    $dataInner2 = $this->datacontext->getObject($sql);
                    $dataInner[$y]["list2"] = $dataInner2;
                }
                $dataArr[$i]["list"] = $dataInner;
            }
        }
        return $dataArr;
    }
}