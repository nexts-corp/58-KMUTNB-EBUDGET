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

        $bg = new BudgetMoneySalary();
        $bg->id = $budget->id;
        $dataBudget = $this->datacontext->getObject($bg);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->moneyTypeCode = $budget->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget->moneyTypeId;
            $dataBudget[0]->planId = $budget->planId;
            $dataBudget[0]->productId = $budget->productId;
            $dataBudget[0]->fundgroupId = $budget->fundgroupId;
            $dataBudget[0]->departmentId = $budget->departmentId;
            $dataBudget[0]->attachmentId = $budget->attachmentId;
            $dataBudget[0]->budgetYear = $budget->budgetYear;
            $dataBudget[0]->formType = $budget->formType;
            $dataBudget[0]->positionName = $budget->positionName;
            $dataBudget[0]->positionOccupy = $budget->positionOccupy;
            $dataBudget[0]->positionVacancy = $budget->positionVacancy;
            $dataBudget[0]->rateNo = $budget->rateNo;
            $dataBudget[0]->rateSalary = $budget->rateSalary;
            $dataBudget[0]->totalSalary = $budget->totalSalary;
            $dataBudget[0]->remark = $budget->remark;
            $dataBudget[0]->updater = $budget->updater;
            $dataBudget[0]->dateUpdated = $budget->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget140)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBgOperating($budget) {
        $return = true;

        $bg = new BudgetMoneyOperating();
        $bg->id = $budget->id;
        $dataBudget = $this->datacontext->getObject($bg);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->moneyTypeCode = $budget->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget->moneyTypeId;
            $dataBudget[0]->planId = $budget->planId;
            $dataBudget[0]->productId = $budget->productId;
            $dataBudget[0]->fundgroupId = $budget->fundgroupId;
            $dataBudget[0]->departmentId = $budget->departmentId;
            $dataBudget[0]->attachmentId = $budget->attachmentId;
            $dataBudget[0]->budgetYear = $budget->budgetYear;
            $dataBudget[0]->formType = $budget->formType;
            $dataBudget[0]->name = $budget->name;
            $dataBudget[0]->budgetRequest = $budget->budgetRequest;
            $dataBudget[0]->budgetReceive = $budget->budgetReceive;
            $dataBudget[0]->budgetHistory = $budget->budgetHistory;
            $dataBudget[0]->remark = $budget->remark;
            $dataBudget[0]->updater = $budget->updater;
            $dataBudget[0]->dateUpdated = $budget->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget143)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBgUtility($budget) {
        $return = true;

        $bg = new BudgetMoneyUtility();
        $bg->id = $budget->id;
        $dataBudget = $this->datacontext->getObject($bg);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->moneyTypeCode = $budget->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget->moneyTypeId;
            $dataBudget[0]->planId = $budget->planId;
            $dataBudget[0]->productId = $budget->productId;
            $dataBudget[0]->fundgroupId = $budget->fundgroupId;
            $dataBudget[0]->departmentId = $budget->departmentId;
            $dataBudget[0]->attachmentId = $budget->attachmentId;
            $dataBudget[0]->budgetYear = $budget->budgetYear;
            $dataBudget[0]->name = $budget->name;
            $dataBudget[0]->budgetRequest = $budget->budgetRequest;
            $dataBudget[0]->budgetHistory = $budget->budgetHistory;
            $dataBudget[0]->nonbudgetRequest = $budget->nonbudgetRequest;
            $dataBudget[0]->nonbudgetHistory = $budget->nonbudgetHistory;
            $dataBudget[0]->remark = $budget->remark;
            $dataBudget[0]->updater = $budget->updater;
            $dataBudget[0]->dateUpdated = $budget->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget144)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBgDurable($budget) {
        $return = true;

        $bg = new BudgetMoneyDurable();
        $bg->id = $budget->id;
        $dataBudget = $this->datacontext->getObject($bg);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->moneyTypeCode = $budget->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget->moneyTypeId;
            $dataBudget[0]->planId = $budget->planId;
            $dataBudget[0]->productId = $budget->productId;
            $dataBudget[0]->fundgroupId = $budget->fundgroupId;
            $dataBudget[0]->departmentId = $budget->departmentId;
            $dataBudget[0]->attachmentId = $budget->attachmentId;
            $dataBudget[0]->budgetYear = $budget->budgetYear;
            $dataBudget[0]->name = $budget->name;
            $dataBudget[0]->desc = $budget->desc;
            $dataBudget[0]->qty = $budget->qty;
            $dataBudget[0]->price = $budget->price;
            $dataBudget[0]->totalPrice = $budget->totalPrice;
            $dataBudget[0]->totalNeeded = $budget->totalNeeded;
            $dataBudget[0]->isAvailable = $budget->isAvailable;
            $dataBudget[0]->qtyWorkable = $budget->qtyWorkable;
            $dataBudget[0]->qtyUnworkable = $budget->qtyUnworkable;
            $dataBudget[0]->remark = $budget->remark;
            $dataBudget[0]->updater = $budget->updater;
            $dataBudget[0]->dateUpdated = $budget->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget145)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBgBuilding1Year($building, $oneyear) {
        $return = true;

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
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId "
                . " AND salary.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 140,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg141($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId "
                . " AND salary.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 141,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg142($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.formType =:formType "
                . " AND salary.fundgroupId =:fundgroupId "
                . " AND salary.departmentId =:departmentId "
                . " AND salary.planId =:planId "
                . " AND salary.productId =:productId "
                . " AND salary.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 142,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg143($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneyOperating oper "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH oper.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH oper.moneyTypeId = bgType.id"
                . " WHERE oper.budgetYear =:budgetYear "
                . " AND oper.formType =:formType "
                . " AND oper.fundgroupId =:fundgroupId "
                . " AND oper.departmentId =:departmentId "
                . " AND oper.planId =:planId "
                . " AND oper.productId =:productId "
                . " AND oper.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 143,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg144($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneyUtility util "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH util.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH util.moneyTypeId = bgType.id"
                . " WHERE util.budgetYear =:budgetYear "
                . " AND util.formType =:formType "
                . " AND util.fundgroupId =:fundgroupId "
                . " AND util.departmentId =:departmentId "
                . " AND util.planId =:planId "
                . " AND util.productId =:productId "
                . " AND util.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 144,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg145($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneyDurable dura "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH dura.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH dura.moneyTypeId = bgType.id"
                . " WHERE dura.budgetYear =:budgetYear "
                . " AND dura.formType =:formType "
                . " AND dura.fundgroupId =:fundgroupId "
                . " AND dura.departmentId =:departmentId "
                . " AND dura.planId =:planId "
                . " AND dura.productId =:productId "
                . " AND dura.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 145,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

    public function selectBg146($bgForm) {
        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneyOperating oper "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH oper.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH oper.moneyTypeId = bgType.id"
                . " WHERE oper.budgetYear =:budgetYear "
                . " AND oper.formType =:formType "
                . " AND oper.fundgroupId =:fundgroupId "
                . " AND oper.departmentId =:departmentId "
                . " AND oper.planId =:planId "
                . " AND oper.productId =:productId "
                . " AND oper.moneyTypeId =:moneyTypeId ";
        $param = array(
            "budgetYear" => $bgForm->budgetYear,
            "formType" => 146,
            "fundgroupId" => $bgForm->fundgroupId,
            "departmentId" => $bgForm->departmentId,
            "planId" => $bgForm->planId,
            "productId" => $bgForm->productId,
            "moneyTypeId" => $bgForm->moneyTypeId
        );
        $dataBg = $this->datacontext->getObject($sql, $param); //get list of form
        return $dataBg;
    }

}
