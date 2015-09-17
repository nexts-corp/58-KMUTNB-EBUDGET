<?php

namespace apps\budget\service;

use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetInfoService;
use apps\common\entity\BudgetMoneySalary;
use apps\common\entity\BudgetMoneyOperating;
use apps\common\entity\BudgetMoneyUtility;
use apps\common\entity\BudgetMoneyDurable;
use apps\common\entity\BudgetMoneyBuilding;
use apps\common\entity\BudgetMoneyBuildingOneyear;
use apps\common\entity\BudgetMoneyBuildingContinueList;
use apps\common\entity\BudgetMoneyBuildingContinuePeriod;

class BudgetInfoService extends CServiceBase implements IBudgetInfoService {

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function saveBgSalary($budget) {
        $return = true;

        $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = "delete from " . $this->ent . "\\BudgetMoneySalary " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $params);

        foreach ($budget as $key => $value) {
            $bg = new BudgetMoneySalary();
            $bg->id = $budget->id;
            $dataBudget = $this->datacontext->getObject($bg);
            if (count($dataBudget) == 0) {
                if (!$this->datacontext->saveObject($budget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            } else {
                $dataBudget[$key]->moneyTypeCode = $budget->moneyTypeCode;
                $dataBudget[$key]->moneyTypeId = $budget->moneyTypeId;
                $dataBudget[$key]->planId = $budget->planId;
                $dataBudget[$key]->productId = $budget->productId;
                $dataBudget[$key]->fundgroupId = $budget->fundgroupId;
                $dataBudget[$key]->departmentId = $budget->departmentId;
                $dataBudget[$key]->attachmentId = $budget->attachmentId;
                $dataBudget[$key]->budgetYear = $budget->budgetYear;
                $dataBudget[$key]->formType = $budget->formType;
                $dataBudget[$key]->positionName = $budget->positionName;
                $dataBudget[$key]->positionOccupy = $budget->positionOccupy;
                $dataBudget[$key]->positionVacancy = $budget->positionVacancy;
                $dataBudget[$key]->rateNo = $budget->rateNo;
                $dataBudget[$key]->rateSalary = $budget->rateSalary;
                $dataBudget[$key]->totalSalary = $budget->totalSalary;
                $dataBudget[$key]->remark = $budget->remark;
                $dataBudget[$key]->updater = $budget->updater;
                $dataBudget[$key]->dateUpdated = $budget->dateUpdated;

                if (!$this->datacontext->updateObject($dataBudget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function saveBgOperating($budget) {
        $return = true;

        $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = "delete from " . $this->ent . "\\BudgetMoneyOperating " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $params);

        foreach ($budget as $key => $value) {
            $bg = new BudgetMoneyOperating();
            $bg->id = $budget->id;
            $dataBudget = $this->datacontext->getObject($bg);
            if (count($dataBudget) == 0) {
                if (!$this->datacontext->saveObject($budget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            } else {
                $dataBudget[$key]->moneyTypeCode = $budget->moneyTypeCode;
                $dataBudget[$key]->moneyTypeId = $budget->moneyTypeId;
                $dataBudget[$key]->planId = $budget->planId;
                $dataBudget[$key]->productId = $budget->productId;
                $dataBudget[$key]->fundgroupId = $budget->fundgroupId;
                $dataBudget[$key]->departmentId = $budget->departmentId;
                $dataBudget[$key]->attachmentId = $budget->attachmentId;
                $dataBudget[$key]->budgetYear = $budget->budgetYear;
                $dataBudget[$key]->formType = $budget->formType;
                $dataBudget[$key]->name = $budget->name;
                $dataBudget[$key]->budgetRequest = $budget->budgetRequest;
                $dataBudget[$key]->budgetReceive = $budget->budgetReceive;
                $dataBudget[$key]->budgetHistory = $budget->budgetHistory;
                $dataBudget[$key]->remark = $budget->remark;
                $dataBudget[$key]->updater = $budget->updater;
                $dataBudget[$key]->dateUpdated = $budget->dateUpdated;

                if (!$this->datacontext->updateObject($dataBudget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function saveBgUtility($budget) {
        $return = true;

        $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = "delete from " . $this->ent . "\\BudgetMoneyUtility " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $params);

        foreach ($budget as $key => $value) {

            $bg = new BudgetMoneyUtility();
            $bg->id = $budget->id;
            $dataBudget = $this->datacontext->getObject($bg);
            if (count($dataBudget) == 0) {
                if (!$this->datacontext->saveObject($budget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            } else {
                $dataBudget[$key]->moneyTypeCode = $budget->moneyTypeCode;
                $dataBudget[$key]->moneyTypeId = $budget->moneyTypeId;
                $dataBudget[$key]->planId = $budget->planId;
                $dataBudget[$key]->productId = $budget->productId;
                $dataBudget[$key]->fundgroupId = $budget->fundgroupId;
                $dataBudget[$key]->departmentId = $budget->departmentId;
                $dataBudget[$key]->attachmentId = $budget->attachmentId;
                $dataBudget[$key]->budgetYear = $budget->budgetYear;
                $dataBudget[$key]->name = $budget->name;
                $dataBudget[$key]->budgetRequest = $budget->budgetRequest;
                $dataBudget[$key]->budgetHistory = $budget->budgetHistory;
                $dataBudget[$key]->nonbudgetRequest = $budget->nonbudgetRequest;
                $dataBudget[$key]->nonbudgetHistory = $budget->nonbudgetHistory;
                $dataBudget[$key]->remark = $budget->remark;
                $dataBudget[$key]->updater = $budget->updater;
                $dataBudget[$key]->dateUpdated = $budget->dateUpdated;

                if (!$this->datacontext->updateObject($dataBudget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function saveBgDurable($budget) {
        $return = true;

        $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = " select id from " . $this->ent . "\\BudgetMoneyDurable " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);

        foreach ($data as $key => $value) {
            $sqlDel = " delete from " . $this->ent . "\\BudgetMoneyBuildingOneyear " .
                    " where buildingId =:buildingId ";
            $param2 = array("buildingId" => $data[$key]->id);
            $data = $this->datacontext->pdoQuery($sqlDel, $param);
        }

        $sql = "delete from " . $this->ent . "\\BudgetMoneyDurable " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $params);

        foreach ($budget as $key => $value) {
            $bg = new BudgetMoneyDurable();
            $bg->id = $budget->id;
            $dataBudget = $this->datacontext->getObject($bg);
            if (count($dataBudget) == 0) {
                if (!$this->datacontext->saveObject($budget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            } else {
                $dataBudget[$key]->moneyTypeCode = $budget->moneyTypeCode;
                $dataBudget[$key]->moneyTypeId = $budget->moneyTypeId;
                $dataBudget[$key]->planId = $budget->planId;
                $dataBudget[$key]->productId = $budget->productId;
                $dataBudget[$key]->fundgroupId = $budget->fundgroupId;
                $dataBudget[$key]->departmentId = $budget->departmentId;
                $dataBudget[$key]->attachmentId = $budget->attachmentId;
                $dataBudget[$key]->budgetYear = $budget->budgetYear;
                $dataBudget[$key]->name = $budget->name;
                $dataBudget[$key]->desc = $budget->desc;
                $dataBudget[$key]->qty = $budget->qty;
                $dataBudget[$key]->price = $budget->price;
                $dataBudget[$key]->totalPrice = $budget->totalPrice;
                $dataBudget[$key]->totalNeeded = $budget->totalNeeded;
                $dataBudget[$key]->isAvailable = $budget->isAvailable;
                $dataBudget[$key]->qtyWorkable = $budget->qtyWorkable;
                $dataBudget[$key]->qtyUnworkable = $budget->qtyUnworkable;
                $dataBudget[$key]->remark = $budget->remark;
                $dataBudget[$key]->updater = $budget->updater;
                $dataBudget[$key]->dateUpdated = $budget->dateUpdated;

                if (!$this->datacontext->updateObject($dataBudget[$key])) {
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function saveBgBuilding1Year($building, $oneyear) {
        $return = true;

        $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = " select id from " . $this->ent . "\\BudgetMoneyDurable " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =:moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);

        foreach ($data as $key => $value) {
            $sqlDel = " delete from " . $this->ent . "\\BudgetMoneyBuildingOneyear " .
                    " where buildingId =:buildingId ";
            $param2 = array("buildingId" => $data[$key]->id);
            $data = $this->datacontext->pdoQuery($sqlDel, $param);
        }

        $data = new BudgetMoneyBuilding();
        $data->id = $building->id;
        $dataBuilding = $this->datacontext->getObject($data);
        if (count($dataBuilding) == 0) {
            if (!$this->datacontext->saveObject($building)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBuilding[0]->planId = $building->planId;
            $dataBuilding[0]->productId = $building->productId;
            $dataBuilding[0]->fundgroupId = $building->fundgroupId;
            $dataBuilding[0]->departmentId = $building->departmentId;
            $dataBuilding[0]->budgetSource = $building->budgetSource;
            $dataBuilding[0]->attachmentId = $building->attachmentId;
            $dataBuilding[0]->budgetYear = $building->budgetYear;
            $dataBuilding[0]->durableId = $building->durableId;
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

        $data1Year = new BudgetMoneyBuildingOneyear();
        $data1Year->buildingId = $dataBuilding[0]->id;
        $data1YearList = $this->datacontext->getObject($data1Year);
        foreach ($data1YearList as $key => $value) {
            if (!$this->datacontext->removeObject($data1YearList[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($oneyear as $key => $value) {
            $data1Year = new BudgetMoneyBuildingOneyear();
            $data1Year->id = $oneyear[$key]->id;
            $data1Year->buildingId = $dataBuilding[0]->id;
            $data1Year->order = $oneyear[$key]->order;
            $data1Year->name = $oneyear[$key]->name;
            $data1Year->area = $oneyear[$key]->area;
            $data1Year->unitPrice = $oneyear[$key]->unitPrice;
            $data1Year->totalPrice = $oneyear[$key]->totalPrice;
            $data1Year->updater = $oneyear[$key]->updater;
            $data1Year->dateUpdated = $oneyear[$key]->dateUpdated;

            if (!$this->datacontext->saveObject($data1Year)) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function saveBgBuildingContinue($building, $period, $list) {
        $return = true;

         $budgetYear = $budget[0]->budgetYear;
        $formType = $budget[0]->formType;
        $moneyTypeCode = $budget[0]->moneyTypeCode;
        $moneyTypeId = $budget[0]->moneyTypeId;
        $fundgroupId = $budget[0]->fundgroupId;
        $departmentId = $budget[0]->departmentId;
        $planId = $budget[0]->planId;
        $productId = $budget[0]->productId;

        $sql = " select id from " . $this->ent . "\\BudgetMoneyDurable " .
                " where budgetYear =:budgetYear and formType =:formType and moneyTypeCode =:moneyTypeCode and moneyTypeId =: moneyTypeId " .
                " and fundgroupId =:fundgroupId and departmentId =:departmentId and planId =:planId and productId =:productId ";
        $param = array(
            "budgetYear" => $budgetYear,
            "formType" => $formType,
            "moneyTypeCode" => $moneyTypeCode,
            "moneyTypeId" => $moneyTypeId,
            "fundgroupId" => $fundgroupId,
            "departmentId" => $departmentId,
            "planId" => $planId,
            "productId" => $productId
        );
        $data = $this->datacontext->pdoQuery($sql, $param);
        
        foreach ($data as $key => $value) {
            $sqlDel = " delete from " . $this->ent . "\\BudgetMoneyBuildingContinueList " .
                    " where buildingId =:buildingId ";
            $param2 = array("buildingId" => $data[$key]->id);
            $data = $this->datacontext->pdoQuery($sqlDel, $param);
        }
        
         foreach ($data as $key => $value) {
            $sqlDel = " delete from " . $this->ent . "\\BudgetMoneyBuildingContinuePeriod " .
                    " where buildingId =:buildingId ";
            $param2 = array("buildingId" => $data[$key]->id);
            $data = $this->datacontext->pdoQuery($sqlDel, $param);
        }        
        
        $dataBuilding = new BudgetMoneyBuilding();
        $dataBuilding->id = $building->id;
        $dataBuilding = $this->datacontext->getObject($dataBuilding);
        if (count($dataBuilding) == 0) {
            if (!$this->datacontext->saveObject($building)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBuilding[0]->planId = $building->planId;
            $dataBuilding[0]->productId = $building->productId;
            $dataBuilding[0]->fundgroupId = $building->fundgroupId;
            $dataBuilding[0]->departmentId = $building->departmentId;
            $dataBuilding[0]->budgetSource = $building->budgetSource;
            $dataBuilding[0]->attachmentId = $building->attachmentId;
            $dataBuilding[0]->budgetYear = $building->budgetYear;
            $dataBuilding[0]->durableId = $building->durableId;
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

        $dataCont = new BudgetMoneyBuildingContinueList();
        $dataCont->buildingId = $dataBuilding[0]->id;
        $dataContList = $this->datacontext->getObject($dataCont);
        foreach ($dataContList as $key => $value) {
            if (!$this->datacontext->removeObject($dataContList[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($list as $key => $value) {
            $dataCont = new BudgetMoneyBuildingContinueList();
            $dataCont->id = $list[$key]->id;
            $dataCont->buildingId = $dataBuilding[0]->id;
            $dataCont->floorNo = $list[$key]->floorNo;
            $dataCont->floorDesc = $list[$key]->floorDesc;
            $dataCont->order = $list[$key]->order;
            $dataCont->area = $list[$key]->area;
            $dataCont->updater = $list[$key]->updater;
            $dataCont->dateUpdated = $list[$key]->dateUpdated;

            if (!$this->datacontext->saveObject($dataCont)) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        $dataCont = new BudgetMoneyBuildingContinuePeriod();
        $dataCont->buildingId = $dataBuilding[0]->id;
        $dataContPeriod = $this->datacontext->getObject($dataCont);
        foreach ($dataContPeriod as $key => $value) {
            if (!$this->datacontext->removeObject($dataContPeriod[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($period as $key => $value) {
            $dataCont = new BudgetMoneyBuildingContinuePeriod();
            $dataCont->id = $period[$key]->id;
            $dataCont->buildingId = $dataBuilding[0]->id;
            $dataCont->budgetYear = $period[$key]->budgetYear;
            $dataCont->workNo = $period[$key]->workNo;
            $dataCont->budgetAmount = $period[$key]->budgetAmount;
            $dataCont->updater = $period[$key]->updater;
            $dataCont->dateUpdated = $period[$key]->dateUpdated;

            if (!$this->datacontext->saveObject($dataCont)) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        return $return;
    }

    public function deleteBg140($budget140) {
        $return = true;

        $bg = new BudgetMoneySalary();
        $bg->id = $budget140;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg141($budget141) {
        $return = true;

        $bg = new BudgetMoneySalary();
        $bg->id = $budget141;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg142($budget142) {
        $return = true;

        $bg = new BudgetMoneySalary();
        $bg->id = $budget142;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg143($budget143) {
        $return = true;

        $bg = new BudgetMoneyOperating();
        $bg->id = $budget143;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg144($budget144) {
        $return = true;

        $bg = new BudgetMoneyUtility();
        $bg->id = $budget144;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg145($budget145) {
        $return = true;

        $buildingList = new BudgetMoneyBuilding();
        $buildingList->durableId = $budget145;
        $dataBuildingList = $this->datacontext->getObject($buildingList);
        foreach ($dataBuildingList as $key => $value) {
            /* 1 year */
            $durable = new BudgetMoneyBuildingOneyear();
            $durable->buildingId = $dataBuildingList[$key]->id;
            $dataDurable = $this->datacontext->getObject($durable);
            if (!$this->datacontext->removeObject($dataDurable)) {
                $return = $this->datacontext->getLastMessage();
            }
            /* continue list */
            $durable = new BudgetMoneyBuildingContinueList();
            $durable->buildingId = $dataBuildingList[$key]->id;
            $dataDurable = $this->datacontext->getObject($durable);
            if (!$this->datacontext->removeObject($dataDurable)) {
                $return = $this->datacontext->getLastMessage();
            }
            /* continue period */
            $durable = new BudgetMoneyBuildingContinuePeriod();
            $durable->buildingId = $dataBuildingList[$key]->id;
            $dataDurable = $this->datacontext->getObject($durable);
            if (!$this->datacontext->removeObject($dataDurable)) {
                $return = $this->datacontext->getLastMessage();
            }

            /* Building */
            if (!$this->datacontext->removeObject($dataBuildingList[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        $bg = new BudgetMoneyDurable();
        $bg->id = $budget145;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBg146($budget146) {
        $return = true;

        $bg = new BudgetMoneyOperating();
        $bg->id = $budget146;
        $dataBg = $this->datacontext->getObject($bg);

        if (!$this->datacontext->removeObject($dataBg)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function deleteBgBuilding($building) {
        $return = true;

        /* 1 year */
        $durable = new BudgetMoneyBuildingOneyear();
        $durable->buildingId = $building;
        $dataDurable = $this->datacontext->getObject($durable);
        if (!$this->datacontext->removeObject($dataDurable)) {
            $return = $this->datacontext->getLastMessage();
        }
        /* continue list */
        $durable = new BudgetMoneyBuildingContinueList();
        $durable->buildingId = $building;
        $dataDurable = $this->datacontext->getObject($durable);
        if (!$this->datacontext->removeObject($dataDurable)) {
            $return = $this->datacontext->getLastMessage();
        }
        /* continue period */
        $durable = new BudgetMoneyBuildingContinuePeriod();
        $durable->buildingId = $building;
        $dataDurable = $this->datacontext->getObject($durable);
        if (!$this->datacontext->removeObject($dataDurable)) {
            $return = $this->datacontext->getLastMessage();
        }

        /* Building */
        $bd = new BudgetMoneyBuilding();
        $bd->id = $building;
        $dataBd = $this->datacontext->getObject($bd);
        if (!$this->datacontext->removeObject($dataBd)) {
            $return = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function selectBg140($bgForm) {
        $sql = "SELECT"
                . " salary.id, salary.positionName, salary.rateNo, salary.rateSalary, "
                . " salary.positionOccupy, salary.totalSalary, salary.remark "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.moneyTypeCode =:moneyTypeCode "
                . " AND salary.moneyTypeId =:moneyTypeId "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 140,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg141($bgForm) {
        $sql = "SELECT"
                . " salary.id, salary.positionName, salary.rateNo, salary.rateSalary, "
                . " salary.positionOccupy, salary.totalSalary, salary.remark "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.moneyTypeCode =:moneyTypeCode "
                . " AND salary.moneyTypeId =:moneyTypeId "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 141,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg142($bgForm) {
        $sql = "SELECT"
                . " salary.id, salary.positionName, salary.rateNo, salary.rateSalary, "
                . " salary.positionOccupy, salary.totalSalary, salary.remark "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.moneyTypeCode =:moneyTypeCode "
                . " AND salary.moneyTypeId =:moneyTypeId "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 142,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg143($bgForm) {
        $sql = "SELECT"
                . " oper.id, oper.name, oper.budgetRequest, oper.budgetReceive, oper.budgetHistory, oper.remark "
                . " FROM " . $this->ent . "\\BudgetMoneyOperating oper "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH oper.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH oper.moneyTypeId = bgType.id"
                . " WHERE oper.budgetYear =:budgetYear "
                . " AND oper.formType =:formType "
                . " AND oper.moneyTypeCode =:moneyTypeCode "
                . " AND oper.fundgroupId =:fundgroupId "
                . " AND oper.departmentId =:departmentId "
                . " AND oper.planId =:planId "
                . " AND oper.productId =:productId "
                . " AND oper.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 143,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg144($bgForm) {
        $sql = "SELECT"
                . " util.id, util.name, util.budgetRequest, util.budgetHistory, "
                . " util.nonbudgetRequest, util.nonbudgetHistory, util.remark"
                . " FROM " . $this->ent . "\\BudgetMoneyUtility util "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH util.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH util.moneyTypeId = bgType.id"
                . " WHERE util.budgetYear =:budgetYear "
                . " AND util.formType =:formType "
                . " AND util.moneyTypeCode =:moneyTypeCode "
                . " AND util.moneyTypeId =:moneyTypeId "
                . " AND util.fundgroupId =:fundgroupId "
                . " AND util.departmentId =:departmentId "
                . " AND util.planId =:planId "
                . " AND util.productId =:productId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 144,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg145($bgForm) {
        $sql = "SELECT"
                . " dur.id, dur.name, dur.desc, dur.qty, dur.price, dur.totalPrice, "
                . " dur.totalNeeded, dur.isAvailable, dur.qtyWorkable, dur.qtyUnworkable, dur.remark  "
                . " FROM " . $this->ent . "\\BudgetMoneyDurable dur "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH dur.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH dur.moneyTypeId = bgType.id"
                . " WHERE dur.budgetYear =:budgetYear "
                . " AND dur.formType =:formType "
                . " AND dur.moneyTypeCode =:moneyTypeCode "
                . " AND dur.moneyTypeId =:moneyTypeId "
                . " AND dur.fundgroupId =:fundgroupId "
                . " AND dur.departmentId =:departmentId "
                . " AND dur.planId =:planId "
                . " AND dur.productId =:productId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 145,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg146($bgForm) {
        $sql = "SELECT"
                . " oper.id, oper.name, oper.budgetRequest, oper.budgetReceive, oper.budgetHistory, oper.remark "
                . " FROM " . $this->ent . "\\BudgetMoneyOperating oper "
                . " LEFT JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH oper.moneyTypeId = rvType.id"
                . " LEFT JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH oper.moneyTypeId = bgType.id"
                . " WHERE oper.budgetYear =:budgetYear "
                . " AND oper.formType =:formType "
                . " AND oper.moneyTypeCode =:moneyTypeCode "
                . " AND oper.fundgroupId =:fundgroupId "
                . " AND oper.departmentId =:departmentId "
                . " AND oper.planId =:planId "
                . " AND oper.productId =:productId "
                . " AND oper.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 146,
            "moneyTypeCode" => $bgForm->moneyTypeCode,
            "moneyTypeId" => $bgForm->moneyTypeId,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBuilding($durableId) {
        $sql = "SELECT"
                . " bu.id, bu.name, bu.place, bu.reason, bu.budgetArchitecture, bu.budgetStructural, bu.budgetElectricalCommunication, "
                . " bu.budgetSanitation, bu.budgetVentilate, bu.budgetElevators, bu.totalBudget, bu.area, bu.expectedResult, bu.objective, "
                . " bu.goal, bu.timeDesign, bu.timeComparePrices, bu.timeSignContract, bu.timeOperating, bu.remark "
                . " FROM " . $this->ent . "\\BudgetMoneyBuilding bu "
                . " JOIN " . $this->ent . "\\BudgetMoneyDurable dur "
                . " WITH bu.durableId = dur.id "
                . " LEFT JOIN " . $this->ent . "\\BudgetMoneyBuildingOneyear oneyear "
                . " WITH oneyear.buildingId = bu.id "
                . " LEFT JOIN " . $this->ent . "\\BudgetMoneyBuildingContinueList conlist "
                . " WITH conlist.buildingId = bu.id "
                . " LEFT JOIN " . $this->ent . "\\BudgetMoneyBuildingContinuePeriod conperiod "
                . " WITH conperiod.buildingId = bu.id "
                . " WHERE bu.durableId =:durableId ";
        $param = array(
            "durableId" => $durableId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

}
