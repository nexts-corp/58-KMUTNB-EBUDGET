<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetInfoService;
use apps\common\entity\BudgetMoneyOperating;

class BudgetInfoService extends CServiceBase implements IBudgetInfoService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function saveBg140($budget140) {
        $return = true;

        if ($this->datacontext->saveObject($budget140)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg141($budget141) {
        $return = true;

        if ($this->datacontext->saveObject($budget141)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg142($budget142) {
        $return = true;

        if ($this->datacontext->saveObject($budget142)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg143($budget143) {
        $return = true;

        if ($this->datacontext->saveObject($budget143)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg144($budget144) {
        $return = true;

        if ($this->datacontext->saveObject($budget144)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg145Durable($budget145) {
        $return = true;

        if ($this->datacontext->saveObject($budget145)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBg146($budget146) {
        $return = true;

        if ($this->datacontext->saveObject($budget146)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBgBuildingOneyear($durableId, $building, $oneyear) {
        $return = true;
        return $durableId;
        $dataBuilding = $this->datacontext->getObject($building);
        if (count($dataBuilding) == 0) {
            if (!$this->datacontext->saveObject($building)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            return $dataBuilding[0] . id;
            $dataBuilding[0]->budgetYear = $building->budgetYear;
            $dataBuilding[0]->budgetMoneyDurableId = $building->budgetMoneyDurableId;
            $dataBuilding[0]->name = $building->name;
            $dataBuilding[0]->place = $building->place;
            $dataBuilding[0]->reason = $building->reason;
            $dataBuilding[0]->budgetArchitecture = $building->budgetArchitecture;
            $dataBuilding[0]->budgetStructural = $building->budgetStructural;
            $dataBuilding[0]->budgetElectricalCommunication = $building->budgetElectricalCommunication;
            $dataBuilding[0]->budgetSanitation = $building->budgetSanitation;
            $dataBuilding[0]->budgetVentilate = $building->budgetVentilate;
            $dataBuilding[0]->budgetElevators = $building->budgetElevators;
            $dataBuilding[0]->totalBudget = $building->totalBudget;
            $dataBuilding[0]->area = $building->area;
            $dataBuilding[0]->expectedResult = $building->expectedResult;
            $dataBuilding[0]->objective = $building->objective;
            $dataBuilding[0]->goal = $building->goal;
            $dataBuilding[0]->timeDesign = $building->timeDesign;
            $dataBuilding[0]->timeComparePrices = $building->timeComparePrices;
            $dataBuilding[0]->timeSignContract = $building->timeSignContract;
            $dataBuilding[0]->timeOperating = $building->timeOperating;
            $dataBuilding[0]->remark = $building->remark;
            $dataBuilding[0]->dateUpdated = $building->dateUpdated;

            if (!$this->datacontext->updateObject($dataBuilding[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        $budget2 = new \apps\common\entity\BudgetMoneyBuilding();
        $budget2->id = $building->id;
        $dataBudget2 = $this->datacontext->getObject($budget2);

        $oneyear->budgetMoneyBuildingId = $this->$dataBudget2[0]->id;

        if (!$this->datacontext->saveObject($oneyear)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function saveBgBuildingContinue($durableId, $building, $period, $list) {
        $return = true;

        $budget = new BudgetMoneyBuilding();
        $budget->budgetYear = $building->budgetYear;
        $budget->budgetMoneyDurableId = $building->budgetMoneyDurableId;
        $budget->name = $building->name;
        $budget->place = $building->place;
        $budget->reason = $building->reason;
        $budget->budgetArchitecture = $building->budgetArchitecture;
        $budget->budgetStructural = $building->budgetStructural;
        $budget->budgetElectricalCommunication = $building->budgetElectricalCommunication;
        $budget->budgetSanitation = $building->budgetSanitation;
        $budget->budgetVentilate = $building->budgetVentilate;
        $budget->budgetElevators = $building->budgetElevators;
        $budget->totalBudget = $building->totalBudget;
        $budget->area = $building->area;
        $budget->expectedResult = $building->expectedResult;
        $budget->objective = $building->objective;
        $budget->goal = $building->goal;
        $budget->timeDesign = $building->timeDesign;
        $budget->timeComparePrices = $building->timeComparePrices;
        $budget->timeSignContract = $building->timeSignContract;
        $budget->timeOperating = $building->timeOperating;
        $budget->remark = $building->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneyBuilding bg"
                . " WHERE bg.id = :budgetId";
        $param = array(
            "budgetId" => $budget->id
        );

        $dataBudget = $this->datacontext->getObject($sql, $param);
        $budget->id = $dataBudget[0]["id"];

        if ($this->datacontext->saveObject($budget)) {
            $return = true;
        } else {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

}
