<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\collection\CJView;
use th\co\bpg\cde\collection\CJViewType;
use apps\budget\interfaces\IBudgetInfoService;

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

        $budget = new \apps\common\entity\BudgetMoneySalary();
        $budget->budgetPlanId = $budget140->budgetPlanId;
        $budget->budgetProductId = $budget140->budgetProductId;
        $budget->fundgroupId = $budget140->fundgroupId;
        $budget->departmentId = $budget140->departmentId;
        $budget->budgetTypeId = $budget140->budgetTypeId;
        $budget->budgetSource = $budget140->budgetSource;
        $budget->attachmentId = $budget140->attachmentId;
        $budget->budgetYear = $budget140->budgetYear;
        $budget->formType = 140;
        $budget->moneyTypeCode = $budget140->moneyTypeCode;
        $budget->moneyTypeId = $budget140->moneyTypeId;
        $budget->positionName = $budget140->positionName;
        $budget->positionOccupy = $budget140->positionOccupy;
        $budget->positionVacancy = $budget140->positionVacancy;
        $budget->rateNo = $budget140->rateNo;
        $budget->rateSalary = $budget140->rateSalary;
        $budget->totalSalary = $budget140->totalSalary;
        $budget->remark = $budget140->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneySalary bg"
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

    public function saveBg141($budget141) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneySalary();
        $budget->budgetPlanId = $budget141->budgetPlanId;
        $budget->budgetProductId = $budget141->budgetProductId;
        $budget->fundgroupId = $budget141->fundgroupId;
        $budget->departmentId = $budget141->departmentId;
        $budget->budgetTypeId = $budget141->budgetTypeId;
        $budget->budgetSource = $budget141->budgetSource;
        $budget->attachmentId = $budget141->attachmentId;
        $budget->budgetYear = $budget141->budgetYear;
        $budget->formType = 141;
        $budget->moneyTypeCode = $budget141->moneyTypeCode;
        $budget->moneyTypeId = $budget141->moneyTypeId;
        $budget->positionName = $budget141->positionName;
        $budget->positionOccupy = $budget141->positionOccupy;
        $budget->positionVacancy = $budget141->positionVacancy;
        $budget->rateNo = $budget141->rateNo;
        $budget->rateSalary = $budget141->rateSalary;
        $budget->totalSalary = $budget141->totalSalary;
        $budget->remark = $budget141->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneySalary bg"
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

    public function saveBg142($budget142) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneySalary();
        $budget->budgetPlanId = $budget142->budgetPlanId;
        $budget->budgetProductId = $budget142->budgetProductId;
        $budget->fundgroupId = $budget142->fundgroupId;
        $budget->departmentId = $budget142->departmentId;
        $budget->budgetTypeId = $budget142->budgetTypeId;
        $budget->budgetSource = $budget142->budgetSource;
        $budget->attachmentId = $budget142->attachmentId;
        $budget->budgetYear = $budget142->budgetYear;
        $budget->formType = 142;
        $budget->moneyTypeCode = $budget142->moneyTypeCode;
        $budget->moneyTypeId = $budget142->moneyTypeId;
        $budget->positionName = $budget142->positionName;
        $budget->positionOccupy = $budget142->positionOccupy;
        $budget->positionVacancy = $budget142->positionVacancy;
        $budget->rateNo = $budget142->rateNo;
        $budget->rateSalary = $budget142->rateSalary;
        $budget->totalSalary = $budget142->totalSalary;
        $budget->remark = $budget142->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneySalary bg"
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

    public function saveBg143($budget143) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyOperating();
        $budget->budgetPlanId = $budget143->budgetPlanId;
        $budget->budgetProductId = $budget143->budgetProductId;
        $budget->fundgroupId = $budget143->fundgroupId;
        $budget->departmentId = $budget143->departmentId;
        $budget->budgetSource = $budget143->budgetSource;
        $budget->attachmentId = $budget143->attachmentId;
        $budget->budgetYear = $budget143->budgetYear;
        $budget->formType = 143;
        $budget->moneyTypeCode = $budget143->moneyTypeCode;
        $budget->moneyTypeId = $budget143->moneyTypeId;
        $budget->name = $budget143->name;
        $budget->budgetRequest = $budget143->budgetRequest;
        $budget->budgetReceive = $budget143->budgetReceive;
        $budget->budgetHistory = $budget143->budgetHistory;
        $budget->remark = $budget143->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneyOperating bg"
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

    public function saveBg144($budget144) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyUtility();
        $budget->budgetPlanId = $budget144->budgetPlanId;
        $budget->budgetProductId = $budget144->budgetProductId;
        $budget->fundgroupId = $budget144->fundgroupId;
        $budget->departmentId = $budget144->departmentId;
        $budget->budgetSource = $budget144->budgetSource;
        $budget->attachmentId = $budget144->attachmentId;
        $budget->budgetYear = $budget144->budgetYear;
        $budget->formType = 144;
        $budget->moneyTypeCode = $budget144->moneyTypeCode;
        $budget->moneyTypeId = $budget144->moneyTypeId;
        $budget->name = $budget144->name;
        $budget->budgetRequest = $budget144->budgetRequest;
        $budget->budgetHistory = $budget144->budgetHistory;
        $budget->nonbudgetRequest = $budget144->nonbudgetRequest;
        $budget->nonbudgetHistory = $budget144->nonbudgetHistory;
        $budget->remark = $budget144->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneyOperating bg"
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

    public function saveBg145Durable($budget145) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyDurable();
        $budget->budgetPlanId = $budget145->budgetPlanId;
        $budget->budgetProductId = $budget145->budgetProductId;
        $budget->fundgroupId = $budget145->fundgroupId;
        $budget->departmentId = $budget145->departmentId;
        $budget->budgetSource = $budget145->budgetSource;
        $budget->attachmentId = $budget145->attachmentId;
        $budget->budgetYear = $budget145->budgetYear;
        $budget->formType = 145;
        $budget->moneyTypeCode = $budget145->moneyTypeCode;
        $budget->moneyTypeId = $budget145->moneyTypeId;
        $budget->name = $budget145->name;
        $budget->qty = $budget145->qty;
        $budget->price = $budget145->price;
        $budget->totalPrice = $budget145->totalPrice;
        $budget->totalNeeded = $budget145->totalNeeded;
        $budget->isAvailable = $budget145->isAvailable;
        $budget->qtyWorkable = $budget145->qtyWorkable;
        $budget->qtyUnworkable = $budget145->qtyUnworkable;
        $budget->remark = $budget145->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneyDurable bg"
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

    public function saveBg146($budget146) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyOperating();
        $budget->budgetPlanId = $budget146->budgetPlanId;
        $budget->budgetProductId = $budget146->budgetProductId;
        $budget->fundgroupId = $budget146->fundgroupId;
        $budget->departmentId = $budget146->departmentId;
        $budget->budgetSource = $budget146->budgetSource;
        $budget->attachmentId = $budget146->attachmentId;
        $budget->budgetYear = $budget146->budgetYear;
        $budget->formType = 146;
        $budget->moneyTypeCode = $budget146->moneyTypeCode;
        $budget->moneyTypeId = $budget146->moneyTypeId;
        $budget->name = $budget146->name;
        $budget->budgetRequest = $budget146->budgetRequest;
        $budget->budgetReceive = $budget146->budgetReceive;
        $budget->budgetHistory = $budget146->budgetHistory;
        $budget->remark = $budget146->remark;

        $sql = "SELECT Id"
                . " FROM " . $this->ent . "\\BudgetMoneyOperating bg"
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

    public function saveBgBuildingOneyear($building, $oneyear) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyBuilding();
        $budget->id = $building->id;
        $dataBudget = $this->datacontext->getObject($budget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($building)) {
                $return $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetYear = $building->budgetYear;
            $dataBudget[0]->budgetMoneyDurableId = $building->budgetMoneyDurableId;
            $dataBudget[0]->name = $building->name;
            $dataBudget[0]->place = $building->place;
            $dataBudget[0]->reason = $building->reason;
            $dataBudget[0]->budgetArchitecture = $building->budgetArchitecture;
            $dataBudget[0]->budgetStructural = $building->budgetStructural;
            $dataBudget[0]->budgetElectricalCommunication = $building->budgetElectricalCommunication;
            $dataBudget[0]->budgetSanitation = $building->budgetSanitation;
            $dataBudget[0]->budgetVentilate = $building->budgetVentilate;
            $dataBudget[0]->budgetElevators = $building->budgetElevators;
            $dataBudget[0]->totalBudget = $building->totalBudget;
            $dataBudget[0]->area = $building->area;
            $dataBudget[0]->expectedResult = $building->expectedResult;
            $dataBudget[0]->objective = $building->objective;
            $dataBudget[0]->goal = $building->goal;
            $dataBudget[0]->timeDesign = $building->timeDesign;
            $dataBudget[0]->timeComparePrices = $building->timeComparePrices;
            $dataBudget[0]->timeSignContract = $building->timeSignContract;
            $dataBudget[0]->timeOperating = $building->timeOperating;
            $dataBudget[0]->remark = $building->remark;
            $dataBudget[0]->dateUpdated = $building->dateUpdated;
            
            if(!$this->datacontext->updateObject($dataBudget[0])){
                $return = $this->datacontext->getLastMessage();
            }
        }

        $budget2 = new \apps\common\entity\BudgetMoneyBuilding();
        $budget2->id=$building->id;
        $dataBudget2 = $this->datacontext->getObject($budget2);
        
        $oneyear->budgetMoneyBuildingId = $this->$dataBudget2[0]->id;
        
        if(!$this->datacontext->saveObject($oneyear)){
            $return = $this->datacontext->getLastMessage();
        }
        
        return $return;           
    }

    public function saveBgBuildingContinue($building, $period, $list) {
        $return = true;

        $budget = new \apps\common\entity\BudgetMoneyBuilding();
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
