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

    public function saveBg140($budget140) {
        $return = true;

        $dataBudget = new BudgetMoneySalary();
        $dataBudget->id = $budget140->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget140)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget140->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget140->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget140->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetTypeId = $budget140->budgetTypeId;
            $dataBudget[0]->budgetSource = $budget140->budgetSource;
            $dataBudget[0]->attachmentId = $budget140->attachmentId;
            $dataBudget[0]->budgetYear = $budget140->budgetYear;
            $dataBudget[0]->moneyTypeCode = $budget140->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget140->moneyTypeId;

            $dataBudget[0]->positionName = $budget140->positionName;
            $dataBudget[0]->positionOccupy = $budget140->positionOccupy;
            $dataBudget[0]->positionVacancy = $budget140->positionVacancy;
            $dataBudget[0]->rateNo = $budget140->rateNo;
            $dataBudget[0]->rateSalary = $budget140->rateSalary;
            $dataBudget[0]->totalSalary = $budget140->totalSalary;
            $dataBudget[0]->remark = $budget140->remark;
            $dataBudget[0]->updater = $budget140->updater;
            $dataBudget[0]->dateUpdated = $budget140->dateUpdated;

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

    public function saveBg141($budget141) {
        $return = true;

        $dataBudget = new BudgetMoneySalary();
        $dataBudget->id = $budget141->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget141)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget140->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget140->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget140->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetTypeId = $budget140->budgetTypeId;
            $dataBudget[0]->budgetSource = $budget140->budgetSource;
            $dataBudget[0]->attachmentId = $budget140->attachmentId;
            $dataBudget[0]->budgetYear = $budget140->budgetYear;
            $dataBudget[0]->moneyTypeCode = $budget140->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget140->moneyTypeId;

            $dataBudget[0]->positionName = $budget141->positionName;
            $dataBudget[0]->positionOccupy = $budget141->positionOccupy;
            $dataBudget[0]->positionVacancy = $budget141->positionVacancy;
            $dataBudget[0]->rateNo = $budget141->rateNo;
            $dataBudget[0]->rateSalary = $budget141->rateSalary;
            $dataBudget[0]->totalSalary = $budget141->totalSalary;
            $dataBudget[0]->remark = $budget141->remark;
            $dataBudget[0]->updater = $budget141->updater;
            $dataBudget[0]->dateUpdated = $budget141->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget141)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBg142($budget142) {
        $return = true;

        $dataBudget = new BudgetMoneySalary();
        $dataBudget->id = $budget142->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget142)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget140->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget140->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget140->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetTypeId = $budget140->budgetTypeId;
            $dataBudget[0]->budgetSource = $budget140->budgetSource;
            $dataBudget[0]->attachmentId = $budget140->attachmentId;
            $dataBudget[0]->budgetYear = $budget140->budgetYear;
            $dataBudget[0]->moneyTypeCode = $budget140->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget140->moneyTypeId;

            $dataBudget[0]->positionName = $budget142->positionName;
            $dataBudget[0]->positionOccupy = $budget142->positionOccupy;
            $dataBudget[0]->positionVacancy = $budget142->positionVacancy;
            $dataBudget[0]->rateNo = $budget142->rateNo;
            $dataBudget[0]->rateSalary = $budget142->rateSalary;
            $dataBudget[0]->totalSalary = $budget142->totalSalary;
            $dataBudget[0]->remark = $budget142->remark;
            $dataBudget[0]->updater = $budget142->updater;
            $dataBudget[0]->dateUpdated = $budget142->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget142)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBg143($budget143) {
        $return = true;

        $dataBudget = new BudgetMoneyOperating();
        $dataBudget->id = $budget143->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget143)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget143->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget143->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget143->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetSource = $budget143->budgetSource;
            $dataBudget[0]->attachmentId = $budget143->attachmentId;
            $dataBudget[0]->budgetYear = $budget143->budgetYear;
            $dataBudget[0]->formType = $budget143->formType;
            $dataBudget[0]->moneyTypeCode = $budget143->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget143->moneyTypeId;
            $dataBudget[0]->name = $budget143->name;
            $dataBudget[0]->budgetRequest = $budget143->budgetRequest;
            $dataBudget[0]->budgetReceive = $budget143->budgetReceive;
            $dataBudget[0]->budgetHistory = $budget143->budgetHistory;
            $dataBudget[0]->remark = $budget143->remark;
            $dataBudget[0]->updater = $budget143->updater;
            $dataBudget[0]->dateUpdated = $budget143->dateUpdated;

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

    public function saveBg144($budget144) {
        $return = true;

        $dataBudget = new BudgetMoneyUtility();
        $dataBudget->id = $budget144->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget144)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget144->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget144->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget144->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetSource = $budget144->budgetSource;
            $dataBudget[0]->attachmentId = $budget144->attachmentId;
            $dataBudget[0]->budgetYear = $budget144->budgetYear;
            $dataBudget[0]->formType = $budget144->formType;
            $dataBudget[0]->moneyTypeCode = $budget144->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget144->moneyTypeId;
            $dataBudget[0]->name = $budget144->name;
            $dataBudget[0]->budgetRequest = $budget144->budgetRequest;
            $dataBudget[0]->budgetHistory = $budget144->budgetHistory;
            $dataBudget[0]->nonbudgetRequest = $budget144->nonbudgetRequest;
            $dataBudget[0]->nonbudgetHistory = $budget144->nonbudgetHistory;
            $dataBudget[0]->remark = $budget144->remark;
            $dataBudget[0]->updater = $budget144->updater;
            $dataBudget[0]->dateUpdated = $budget144->dateUpdated;

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

    public function saveBg145($budget145) {
        $return = true;

        $dataBudget = new BudgetMoneyDurable();
        $dataBudget->id = $budget145->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget145)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget145->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget145->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget145->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetSource = $budget145->budgetSource;
            $dataBudget[0]->attachmentId = $budget145->attachmentId;
            $dataBudget[0]->budgetYear = $budget145->budgetYear;
            $dataBudget[0]->formType = $budget145->formType;
            $dataBudget[0]->moneyTypeCode = $budget145->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget145->moneyTypeId;
            $dataBudget[0]->name = $budget145->name;
            $dataBudget[0]->desc = $budget145->desc;
            $dataBudget[0]->qty = $budget145->qty;
            $dataBudget[0]->price = $budget145->price;
            $dataBudget[0]->totalPrice = $budget145->totalPrice;
            $dataBudget[0]->totalNeeded = $budget145->totalNeeded;
            $dataBudget[0]->isAvailable = $budget145->isAvailable;
            $dataBudget[0]->qtyWorkable = $budget145->qtyWorkable;
            $dataBudget[0]->qtyUnworkable = $budget145->qtyUnworkable;
            $dataBudget[0]->remark = $budget145->remark;
            $dataBudget[0]->updater = $budget145->updater;
            $dataBudget[0]->dateUpdated = $budget145->dateUpdated;

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

    public function saveBg146($budget146) {
        $return = true;

        $dataBudget = new BudgetMoneyOperating();
        $dataBudget->id = $budget146->id;
        $dataBudget = $this->datacontext->getObject($dataBudget);
        if (count($dataBudget) == 0) {
            if (!$this->datacontext->saveObject($budget146)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBudget[0]->budgetPlanId = $budget146->budgetPlanId;
            $dataBudget[0]->budgetProductId = $budget146->budgetProductId;
            $dataBudget[0]->fundgroupId = $budget146->fundgroupId;
            $dataBudget[0]->departmentId = $budget140->departmentId;
            $dataBudget[0]->budgetSource = $budget146->budgetSource;
            $dataBudget[0]->attachmentId = $budget146->attachmentId;
            $dataBudget[0]->budgetYear = $budget146->budgetYear;
            $dataBudget[0]->formType = $budget146->formType;
            $dataBudget[0]->moneyTypeCode = $budget146->moneyTypeCode;
            $dataBudget[0]->moneyTypeId = $budget146->moneyTypeId;
            $dataBudget[0]->name = $budget146->name;
            $dataBudget[0]->budgetRequest = $budget146->budgetRequest;
            $dataBudget[0]->budgetReceive = $budget146->budgetReceive;
            $dataBudget[0]->budgetHistory = $budget146->budgetHistory;
            $dataBudget[0]->remark = $budget146->remark;
            $dataBudget[0]->updater = $budget146->updater;
            $dataBudget[0]->dateUpdated = $budget146->dateUpdated;

            if (!$this->datacontext->updateObject($dataBudget[0])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        /*
          if ($this->datacontext->saveObject($budget146)) {
          $return = true;
          } else {
          $return = $this->datacontext->getLastMessage();
          }
         */

        return $return;
    }

    public function saveBgBuilding1Year($building, $oneyear) {
        $return = true;

        $dataBuilding = new BudgetMoneyBuilding();
        $dataBuilding->id = $building->id;
        $dataBuilding = $this->datacontext->getObject($dataBuilding);
        if (count($dataBuilding) == 0) {
            if (!$this->datacontext->saveObject($building)) {
                $return = $this->datacontext->getLastMessage();
            }
        } else {
            $dataBuilding[0]->budgetPlanId = $building->budgetPlanId;
            $dataBuilding[0]->budgetProductId = $building->budgetProductId;
            $dataBuilding[0]->fundgroupId = $building->fundgroupId;
            $dataBuilding[0]->departmentId = $building->departmentId;
            $dataBuilding[0]->budgetSource = $building->budgetSource;
            $dataBuilding[0]->attachmentId = $building->attachmentId;
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

        $data1Year = new BudgetMoneyBuildingOneyear();
        $data1Year->budgetMoneyBuildingId = $dataBuilding[0]->id;
        $data1YearList = $this->datacontext->getObject($data1Year);
        foreach ($data1YearList as $key => $value) {
            if (!$this->datacontext->removeObject($data1YearList[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($oneyear as $key => $value) {
            $data1Year = new BudgetMoneyBuildingOneyear();
            $data1Year->id = $oneyear[$key]->id;
            $data1Year->budgetMoneyBuildingId = $dataBuilding[0]->id;
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
            $dataBuilding[0]->budgetPlanId = $building->budgetPlanId;
            $dataBuilding[0]->budgetProductId = $building->budgetProductId;
            $dataBuilding[0]->fundgroupId = $building->fundgroupId;
            $dataBuilding[0]->departmentId = $building->departmentId;
            $dataBuilding[0]->budgetSource = $building->budgetSource;
            $dataBuilding[0]->attachmentId = $building->attachmentId;
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

        $dataCont = new BudgetMoneyBuildingContinueList();
        $dataCont->budgetMoneyBuildingId = $dataBuilding[0]->id;
        $dataContList = $this->datacontext->getObject($dataCont);
        foreach ($dataContList as $key => $value) {
            if (!$this->datacontext->removeObject($dataContList[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($list as $key => $value) {
            $dataCont = new BudgetMoneyBuildingContinueList();
            $dataCont->id = $list[$key]->id;
            $dataCont->budgetMoneyBuildingId = $dataBuilding[0]->id;
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
        $dataCont->budgetMoneyBuildingId = $dataBuilding[0]->id;
        $dataContPeriod = $this->datacontext->getObject($dataCont);
        foreach ($dataContPeriod as $key => $value) {
            if (!$this->datacontext->removeObject($dataContPeriod[$key])) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        foreach ($period as $key => $value) {
            $dataCont = new BudgetMoneyBuildingContinuePeriod();
            $dataCont->id = $period[$key]->id;
            $dataCont->budgetMoneyBuildingId = $dataBuilding[0]->id;
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
        $buildingList->budgetMoneyDurableId = $budget145;
        $dataBuildingList = $this->datacontext->getObject($buildingList);
        foreach ($dataBuildingList as $key => $value) {
            /* 1 year */
            $durable = new BudgetMoneyBuildingOneyear();
            $durable->budgetMoneyBuildingId = $dataBuildingList[$key]->id;
            $dataDurable = $this->datacontext->getObject($durable);
            if (!$this->datacontext->removeObject($dataDurable)) {
                $return = $this->datacontext->getLastMessage();
            }
            /* continue list */
            $durable = new BudgetMoneyBuildingContinueList();
            $durable->budgetMoneyBuildingId = $dataBuildingList[$key]->id;
            $dataDurable = $this->datacontext->getObject($durable);
            if (!$this->datacontext->removeObject($dataDurable)) {
                $return = $this->datacontext->getLastMessage();
            }
            /* continue period */
            $durable = new BudgetMoneyBuildingContinuePeriod();
            $durable->budgetMoneyBuildingId = $dataBuildingList[$key]->id;
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
        $durable->budgetMoneyBuildingId = $building;
        $dataDurable = $this->datacontext->getObject($durable);
        if (!$this->datacontext->removeObject($dataDurable)) {
            $return = $this->datacontext->getLastMessage();
        }
        /* continue list */
        $durable = new BudgetMoneyBuildingContinueList();
        $durable->budgetMoneyBuildingId = $building;
        $dataDurable = $this->datacontext->getObject($durable);
        if (!$this->datacontext->removeObject($dataDurable)) {
            $return = $this->datacontext->getLastMessage();
        }
        /* continue period */
        $durable = new BudgetMoneyBuildingContinuePeriod();
        $durable->budgetMoneyBuildingId = $building;
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
        $return = true;

        $sql = "SELECT"
                . " * "
                . " FROM " . $this->ent . "\\BudgetMoneySalary salary "
                . " JOIN " . $this->ent . "\\RevenueType rvType "
                . " WITH salary.moneyTypeId = rvType.id"
                . " JOIN " . $this->ent . "\\BudgetType bgType "
                . " WITH salary.moneyTypeId = bgType.id"
                . " WHERE salary.budgetYear =:budgetYear "
                . " AND salary.budgetYear =:budgetYear AND ";
        $param = array(
            "statusKeyword" => $this->getStatus()->keyword
        );
        $dataBidder = $this->datacontext->getObject($sql, $param); //get bidder in auction Lastest
        return $dataBidder;

        return $return;
    }

    public function selectBg141($bgForm) {
        
    }

    public function selectBg142($bgForm) {
        
    }

    public function selectBg143($bgForm) {
        
    }

    public function selectBg144($bgForm) {
        
    }

    public function selectBg145($bgForm) {
        
    }

    public function selectBg146($bgForm) {
        
    }

}
