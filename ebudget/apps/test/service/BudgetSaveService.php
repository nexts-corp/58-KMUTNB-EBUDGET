<?php

namespace apps\budget\service;

use apps\budget\interfaces\apps;
use apps\budget\interfaces\IBudgetSaveService;
use apps\common\entity\Attachment;
use apps\common\entity\BuildingBOQ;
use apps\common\entity\BuildingDetail;
use apps\common\entity\BuildingFloorPlan;
use apps\common\entity\BuildingPeriod;
use apps\common\entity\Coordinates;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\common\entity\BudgetHead;
use apps\common\entity\Budget140;
use apps\common\entity\Budget141;
use apps\common\entity\Budget142;
use apps\common\entity\Budget143;
use apps\common\entity\Budget144;
use apps\common\entity\Budget145;
use apps\common\entity\Budget146;

class BudgetSaveService extends CServiceBase implements IBudgetSaveService
{

    public $datacontext;
    public $logger;
    public $md = "apps\\common\\model";
    public $ent = "apps\\common\\entity";

    public function __construct()
    {
        $this->logger = \Logger::getLogger("root");
        $this->datacontext = new CDataContext(NULL);
    }

    public function insertBudget140($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(140);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->salaryTotal;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;

        /*
          foreach ($budget as $key => $value) {
          $bg = new Budget140();
          $bg->budgetPeriodId = $budget[$key]->budgetPeriodId;
          $bg->budgetTypeId = $budget[$key]->budgetTypeId;
          $bg->budgetTypeCode = $budget[$key]->budgetTypeCode;
          $bg->deptId = $budget[$key]->deptId;
          $bg->planId = $budget[$key]->planId;
          $bg->projectId = $budget[$key]->projectId;
          $bg->fundgroupId = $budget[$key]->fundgroupId;
          $bg->activityId = $budget[$key]->activityId;
          $bg->positionName = $budget[$key]->positionName;
          $bg->occupy = $budget[$key]->occupy;
          $bg->vacancy = $budget[$key]->vacancy;
          $bg->rateNo = $budget[$key]->rateNo;
          $bg->salary = $budget[$key]->salary;
          $bg->salaryTotal = $budget[$key]->salaryTotal;
          $bg->remark = $budget[$key]->remark;
          $bg->creator = $budget[$key]->creator;
          if (!$this->datacontext->saveObject($bg)) {
          $return[$key]["result"] = false;
          $return[$key]["msg"] = $this->datacontext->getLastMessage();
          } else {
          $return[$key]["result"] = true;
          $return[$key]["id"] = $this->datacontext->las();
          }
          }

          return $return;
         */
    }

    public function updateBudget140($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->salaryTotal;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;

        /*
          foreach ($budget as $key => $value) {
          $refId = $value->getId();
          $sql = " UPDATE BUDGET140 SET BUDGETSTATUS = 'N' WHERE ID = $refId";
          $this->datacontext->pdoQuery($sql);

          $value->setId(NULL);
          $value->setRefId($refId);
          $value->setBgStatus("Y");
          if (!$this->datacontext->saveObject($value)) {
          $return[$key]["result"] = false;
          $return[$key]["msg"] = $this->datacontext->getLastMessage();
          } else {
          $return[$key]["result"] = true;
          $return[$key]["id"] = $budget[$key]->id;
          }
          }

          return $return;
         */
    }

    public function insertBudget141($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(141);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->salaryTotal;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget141($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->salaryTotal;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function insertBudget142($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(142);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->salaryTotal;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget142($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->salaryTotal;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function insertBudget143($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(143);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->bgRequest;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget143($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->bgRequest;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function insertBudget144($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(144);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = (float)($value->bgRequest) + (float)($value->nonBgRequest);
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget144($budget)
    {
        $return = true;

        $budget[0]->bgSummary = (float)($budget[0]->bgRequest) + (float)($budget[0]->nonBgRequest);
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function insertBudget145($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(145);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->totalPrice;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget145($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->totalPrice;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function insertBudget146($budget)
    {
        $return = array();

        foreach ($budget as $key => $value) {
            $bgHead = new BudgetHead();
            $bgHead->setFormId(146);
            $bgHead->setBudgetPeriodId($value->budgetPeriodId);
            $bgHead->setBudgetTypeCode($value->budgetTypeCode);
            $bgHead->setDeptId($value->deptId);
            //$bgHead->setPlanId($value->planId);
            //$bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $budgetPlanProject = $this->getBudgetPlanAndProject($value->budgetPeriodId, $value->l3dPlanId, $value->fundgroupId);
            $bgHead->setPlanId($budgetPlanProject["budgetPlanId"]);
            $bgHead->setProjectId($budgetPlanProject["budgetProjectId"]);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;
            $value->planId = $budgetPlanProject["budgetPlanId"];
            $value->projectId = $budgetPlanProject["budgetProjectId"];
            $value->bgSummary = $value->bgRequest;
            if ($value->remark == "") {
                $value->remark = "-";
            }

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
                $return[$key]["budgetHeadId"] = $bgHeadId;
            }
        }

        return $return;
    }

    public function updateBudget146($budget)
    {
        $return = true;

        $budget[0]->bgSummary = $budget[0]->bgRequest;
        $budget[0]->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return = false;
        }

        return $return;
    }

    public function deleteBudget140($budgetId)
    {
        $result = true;

        $repo = new Budget140();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget140 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function deleteBudget141($budgetId)
    {
        $result = true;

        $repo = new Budget141();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget141 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $result;
    }

    public function deleteBudget142($budgetId)
    {
        $result = true;

        $repo = new Budget142();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }

            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget142 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function deleteBudget143($budgetId)
    {
        $result = true;

        $repo = new Budget143();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget143 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function deleteBudget144($budgetId)
    {
        $result = true;

        $repo = new Budget144();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget144 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function deleteBudget145($budgetId)
    {
        $result = true;

        $repo = new Budget145();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget145 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function deleteBudget146($budgetId)
    {
        $result = true;

        $repo = new Budget146();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
//            $repoHead = new BudgetHead();
//            $repoHead->setId($bgHeadId);
//
//            if (!$this->datacontext->removeObject($repoHead)) {
//                $return = $this->datacontext->getLastMessage();
//            }
            $sql = "SELECT count(bg) as num FROM " . $this->ent . "\\Budget146 as bg WHERE bg.budgetHeadId = " . $bgHeadId;
            $obj = $this->datacontext->getObject($sql);

            if ($obj[0]["num"] == 0) {

                $repoHead = new BudgetHead();
                $repoHead->setId($bgHeadId);

                if (!$this->datacontext->removeObject($repoHead)) {
                    $result = false;
                    $return = $this->datacontext->getLastMessage();
                }

            }
        }

        return $result;
    }

    public function insertBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates)
    {
        $return = array();

        foreach ($building as $key => $value) {

            if (!$this->datacontext->saveObject($value)) {
                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return["result"] = true;
                $return["idBuilding"] = $building[$key]->id;

                foreach ($listBuildDetail as $key2 => $value2) {

                    $listBuildDetail[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBuildDetail"] = $listBuildDetail[$key2]->id;
                    }
                }

                foreach ($listBOQ as $key2 => $value2) {

                    $listBOQ[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBoq"] = $listBOQ[$key2]->id;
                    }
                }

                foreach ($listCoordinates as $key2 => $value2) {

                    $listCoordinates[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idCoordinate"] = $listCoordinates[$key2]->id;
                    }
                }
            }
        }

        return $return;
    }

    public function editBuildingOne($building, $listBuildDetail, $listBOQ, $listCoordinates, $listIDRemoveBuildingOne, $listIDRemoveBOQ, $coordinatesChange)
    {
        $return = array();
        foreach ($building as $key => $value) {

            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

                foreach ($listBOQ as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id)) {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBOQ

                foreach ($listBuildDetail as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id)) {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBuildDetail

                if ($coordinatesChange) {
                    //remove and new insert coordinates
                    $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                    $this->datacontext->pdoDelete($sql);
                    //insert new coordinates
                    foreach ($listCoordinates as $key2 => $value2) {

                        $value2->setBuildingId($building[$key]->id);

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        }
                    }
                }

            }//else update building is ok
        } //loop building

        foreach ($listIDRemoveBOQ as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingBOQ();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                }
            }
        }

        foreach ($listIDRemoveBuildingOne as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingDetail();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingOne"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingOne"] = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function removeBuildingOne($building)
    {
        $return = array();
        foreach ($building as $key => $value) {
            if (isset($building[$key]->id)) {
                //remove Coordinates
                $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BUILDING_DETAIL
                $sql = "DELETE  FROM BUILDING_DETAIL WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BoQ
                $sql = "DELETE  FROM BUILDING_BOQ WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove Building
                if ($this->datacontext->removeObject($value)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }
            }
        }
        return $return;
    }


    public function insertBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates)
    {
        foreach ($building as $key => $value) {

            if (!$this->datacontext->saveObject($value)) {
                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return["result"] = true;
                $return["idBuilding"] = $building[$key]->id;

                foreach ($listBuildFloor as $key2 => $value2) {

                    $listBuildFloor[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBuildFloor"] = $listBuildFloor[$key2]->id;
                    }
                }

                foreach ($listBOQ as $key2 => $value2) {

                    $listBOQ[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBoq"] = $listBOQ[$key2]->id;
                    }
                }

                foreach ($listBuildPeriod as $key2 => $value2) {

                    $listBuildPeriod[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idBoq"] = $listBuildPeriod[$key2]->id;
                    }
                }

                foreach ($listCoordinates as $key2 => $value2) {

                    $listCoordinates[$key2]->setBuildingId($building[$key]->id);

                    if (!$this->datacontext->saveObject($value2)) {
                        $return["result"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    } else {
                        $return["result"] = true;
                        $return["idCoordinate"] = $listCoordinates[$key2]->id;
                    }
                }
            }
        }

        return $return;
    }

    public function editBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listCoordinates, $listIDRemoveFloor, $listIDRemoveBOQ, $listIDRemovePeriod, $coordinatesChange)
    {

        $return = array();
        foreach ($building as $key => $value) {

            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

                foreach ($listBOQ as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id)) {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBoq"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBOQ

                foreach ($listBuildFloor as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id) && $value2->id != "-1") {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildFloor
                            $return["result"] = true;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildFloor"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBuildFloor

                foreach ($listBuildPeriod as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null); // Entity is set Auto

                    if (isset($value2->id) && $value2->id != "-1") {

                        if ($this->datacontext->updateObject($value2)) {
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    } else {

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgBuildDetail"] = $this->datacontext->getLastMessage();
                        }
                    }
                }//end loop $listBuildPeriod

                if ($coordinatesChange) {
                    //remove and new insert coordinates
                    $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                    $this->datacontext->pdoDelete($sql);
                    //insert new coordinates
                    foreach ($listCoordinates as $key2 => $value2) {

                        $value2->setBuildingId($building[$key]->id);

                        if ($this->datacontext->saveObject($value2)) {
                            //insert BuildingDetail
                            $return["result"] = true;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        } else {
                            $return["result"] = false;
                            $return["msgCoordinates"] = $this->datacontext->getLastMessage();
                        }
                    }
                }
            }
        } //loop building

        foreach ($listIDRemoveBOQ as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingBOQ();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBOQ"] = $this->datacontext->getLastMessage();
                }
            }
        }

        foreach ($listIDRemoveFloor as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingFloorPlan();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingFloorPlan"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingFloorPlan"] = $this->datacontext->getLastMessage();
                }
            }
        }

        foreach ($listIDRemovePeriod as $key => $value) { //remove object
            if (isset($value)) {
                $obj = new BuildingPeriod();
                $obj->setId($value);
                if ($this->datacontext->removeObject($obj)) {
                    $return["result"] = true;
                    $return["msgRemoveBuildingPeriod"] = $this->datacontext->getLastMessage();
                } else {
                    $return["result"] = false;
                    $return["msgRemoveBuildingPeriod"] = $this->datacontext->getLastMessage();
                }
            }
        }

        return $return;
    }

    public function removeBuildingMore($building)
    {
        $return = array();
        foreach ($building as $key => $value) {
            if (isset($building[$key]->id)) {
                //remove Coordinates
                $sql = "DELETE  FROM COORDINATES WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BUILDING_FLOORPLAN
                $sql = "DELETE  FROM BUILDING_FLOORPLAN WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BUILDING_PERIOD
                $sql = "DELETE  FROM BUILDING_PERIOD WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove BoQ
                $sql = "DELETE  FROM BUILDING_BOQ WHERE BUILDINGID = " . $building[$key]->id;
                if ($this->datacontext->pdoDelete($sql)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }

                //remove Building
                if ($this->datacontext->removeObject($value)) {
                    $return["result"] = true;
                } else {
                    $return["result"] = false;
                }
            }
        }
        return $return;
    }

    public function uploadFileAttachment($file)
    {
        //uploadFile
        $return = array();
        $uploaddir = './uploads/ebudget/';
        $filename = date("YmdHis");
        $typefile = explode(".", $file["name"]);
        $filename = $filename . "." . $typefile[count($typefile) - 1];
        $uploadfile = $uploaddir . $filename;

        if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
            $return["path"] = $filename;
            $return["result"] = true;
            $return["msg"] = "Upload Success";
        } else {
            $return["result"] = false;
            $return["msg"] = "Can't upload file to Server";
        }

        return $return;
    }

    public function InsertAttachment($att)
    {
        $return = array();

        foreach ($att as $key => $value) {

            if (!$this->datacontext->saveObject($value)) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $att[$key]->id;
            }
        }

        return $return[0];
    }

    public function editAttachment($att)
    {
        $return = array();

        foreach ($att as $key => $value) {

            if (isset($value->id)) {
                // update object
                if (!$this->datacontext->updateObject($value)) {
                    $return[$key]["result"] = false;
                    $return[$key]["msg"] = $this->datacontext->getLastMessage();
                } else {
                    $return[$key]["result"] = true;
                    $return[$key]["attObj"] = $att[$key];
                }
            } else {
                //insert new
                if (!$this->datacontext->saveObject($value)) {
                    $return[$key]["result"] = false;
                    $return[$key]["msg"] = $this->datacontext->getLastMessage();
                } else {
                    $return[$key]["result"] = true;
                    $return[$key]["attObj"] = $att[$key];
                }
            }
        }
        return $return[0];
    }

    public function deleteAttachment($attachmentID, $path, $budgetID, $formBudget)
    {
        $uploaddir = './uploads/ebudget/';
        $return = array();

        $sql = "UPDATE BUDGET" . $formBudget . " SET ATTACHMENTID = NULL WHERE ID=" . $budgetID;

        if (!$this->datacontext->pdoUpdate($sql)) {

            $return["result"] = false;
            $return["msg"] = $this->datacontext->getLastMessage();
        } else {

            $obj = new Attachment();
            $obj->setId($attachmentID);

            if (!$this->datacontext->removeObject($obj)) {
                $return["result"] = false;
                $return["msg"] = $this->datacontext->getLastMessage();
            } else {
                unlink($uploaddir . $path); //removefile
                $return["result"] = true;
                $return["msg"] = $this->datacontext->getLastMessage();
                $return["attObj"] = null; //for update in array
            }
        }

        return $return;
    }

    public function updateStatusBG($bgType, $listBg, $status)
    {
   
        $return = array();

        foreach ($listBg as $key => $value) {

            if (isset($value)) {

                $class = $this->ent . "\\" . $bgType;
                $object = new $class();

                if ($status == 2) {

                    if ($value->statusId == 1 || $value->statusId == 4) {
                        $object->setId($value->id);
                        $object->setStatusId($status);
                        if (isset($value->comment))
                            $object->setComment($value->comment);
                    } else if ($value->statusId == 2) {

                        $return["status"] = true;
                    }
                } else if ($status == 3 || $status == 4) {

                    $object->setId($value->id);
                    $object->setStatusId($status);
                    if (isset($value->comment))
                        $object->setComment($value->comment);
                }

                if ($object->getId() != null) {

                    if ($this->datacontext->updateObject($object)) {
                        $return["status"] = true;
                        if (isset($value->budgetHeadId)) {

                            if ($this->updateBudgetHead($value->budgetHeadId, $bgType, $status)) {
                                $return["status"] = true;
                            } else {
                                $return["status"] = false;
                                $return["msg"] = $this->datacontext->getLastMessage();
                            }
                        }
                    } else {
                        $return["status"] = false;
                        $return["msg"] = $this->datacontext->getLastMessage();
                    }
                }
            }
        }

        return $return;
    }

    private function updateBudgetHead($id, $formType, $statusId)
    {
        $result = true;

        /*
          $formId = 0;
          if ($formType == "Budget140") {
          $formId = 140;
          } else if ($formType == "Budget141") {
          $formId = 141;
          } else if ($formType == "Budget142") {
          $formId = 142;
          } else if ($formType == "Budget143") {
          $formId = 143;
          } else if ($formType == "Budget144") {
          $formId = 144;
          } else if ($formType == "Budget145") {
          $formId = 145;
          } else if ($formType == "Budget146") {
          $formId = 146;
          }
         */

        if ($statusId == "2" || $statusId == "4") {
            $bgh = new BudgetHead();
            $bgh->setId($id);
            $bgh->setStatusId($statusId);
            if (!$this->datacontext->updateObject($bgh)) {
                $result = false;
            }
        } else if ($statusId == "3") {
            $sql = "select count(*) as num from " . $this->ent . "\\" . $formType . " bg "
                . "where bg.budgetHeadId = :budgetHeadId "
                . "and bg.statusId in (1,2,4) ";
            $param = array("budgetHeadId" => $id);
            $bg = $this->datacontext->getObject($sql, $param);

            if (count($bg) == 0) {
                $bgh = new BudgetHead();
                $bgh->setId($id);
                $bgh->setStatusId(5);
                if (!$this->datacontext->updateObject($bgh)) {
                    $result = false;
                }
            }
        }

        return $result;
    }

    private function getBudgetPlanAndProject($budgetPeriodId, $L3DPlanId, $fundgroupId)
    {
        $project = new \apps\common\entity\MappingPlan();

        $project->setBudgetperiodId($budgetPeriodId);
        $project->setPlanId($L3DPlanId);
        $project->setFundgroupId($fundgroupId);

        $dataProject = $this->datacontext->getObject($project);

        $result = array();

        if ($dataProject) {
            $projectId = $dataProject[0]->budgetProjectId;

            $plan = new \apps\common\entity\BudgetProject();
            $plan->setId($projectId);

            $dataPlan = $this->datacontext->getObject($plan);

            if ($dataPlan) {
                $planId = $dataPlan[0]->planId;

                $result["budgetPlanId"] = $planId;
                $result["budgetProjectId"] = $projectId;
            }
        }

        return $result;
    }

    public function updateComment($data,$bgType) {
       
        $class = $this->ent . "\\" . $bgType;
        $object = new $class();
        $object->setId($data->id);
        $object->setComment($data->comment);
        if($this->datacontext->updateObject($object)){
            return true;
        }else{
            return false;
        }
        
    }

}
