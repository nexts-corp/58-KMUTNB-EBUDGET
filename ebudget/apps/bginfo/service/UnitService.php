<?php

namespace apps\bginfo\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\bginfo\interfaces\IUnitService;
use th\co\bpg\cde\data\CDataContext;


class UnitService extends CServiceBase implements IUnitService {
    

    public $datacontext;
    public $pathEnt = "apps\\common\\entity";
    
    function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->year = 2559;
        return $this->datacontext->getObject($year)[0];
    }

    public function listsUnit() {
        $unit = new \apps\common\entity\AffirmativeUnit();
        return $this->datacontext->getObject($unit);
    }

    public function insertUnit($pData) {
        $return = true;
        if(!$this->datacontext->saveObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function updateUnit($pData) {
        $return = true;
        if(!$this->datacontext->updateObject($pData)){
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteUnit($id){
        $return = true;

        $unit = new \apps\common\entity\AffirmativeUnit();
        $unit->unitId = $id;
        $dUnit = $this->datacontext->getObject($unit);
        if(!$this->datacontext->removeObject($dUnit)){
            $return = $this->datacontext->getLastMessage();
        }
        return $return;
    }
}
