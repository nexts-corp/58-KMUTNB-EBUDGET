<?php

namespace apps\budget\service;

use apps\budget\interfaces\apps;
use apps\budget\interfaces\listIDRemoveBOQ;
use apps\budget\interfaces\listIDRemoveFloor;
use apps\budget\interfaces\listIDRemovePeriod;
use apps\common\entity\BuildingBOQ;
use apps\common\entity\BuildingDetail;
use apps\common\entity\BuildingFloorPlan;
use apps\common\entity\BuildingPeriod;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IBudgetSaveService;
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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget141($budget)
    {
        $return = true;

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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget142($budget)
    {
        $return = true;

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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget143($budget)
    {
        $return = true;

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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget144($budget)
    {
        $return = true;

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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget145($budget)
    {
        $return = true;

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
            $bgHead->setPlanId($value->planId);
            $bgHead->setProjectId($value->projectId);
            $bgHead->setL3dPlanId($value->l3dPlanId);
            $bgHead->setL3dProjectId($value->l3dProjectId);
            $bgHead->setFundgroupId($value->fundgroupId);
            $bgHead->setActivityId($value->activityId);

            $dataHead = $this->datacontext->getObject($bgHead);

            if (!isset($dataHead) || $dataHead == null) {
                $bgHead->setStatusId(1);
                $dataHead = $this->datacontext->saveObject($bgHead);
                $bgHeadId = $bgHead->id;
            } else {
                $bgHeadId = $dataHead[0]->id;
            }

            $value->budgetHeadId = $bgHeadId;

            if (!$this->datacontext->saveObject($budget[$key])) {
                $return[$key]["result"] = false;
                $return[$key]["msg"] = $this->datacontext->getLastMessage();
            } else {
                $return[$key]["result"] = true;
                $return[$key]["id"] = $budget[$key]->id;
            }
        }

        return $return;
    }

    public function updateBudget146($budget)
    {
        $return = true;

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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
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
            $repoHead = new BudgetHead();
            $repoHead->setId($bgHeadId);

            if (!$this->datacontext->removeObject($repoHead)) {
                $return = $this->datacontext->getLastMessage();
            }
        }

        return $result;
    }

    public function insertBuildingOne($building, $listBuildDetail, $listBOQ)
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
            }
        }

        return $return;
    }


    public function editBuildingOne($building, $listBuildDetail, $listBOQ, $listIDRemoveBuildingOne, $listIDRemoveBOQ)
    {
        $return = array();
        foreach ($building as $key => $value) {

            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

                foreach ($listBOQ as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null);// Entity is set Auto

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
                    $value2->setDateCreated(null);// Entity is set Auto

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
            }//else update building is ok
        }

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


    public function AttachmentsFile($attment)
    {
        $return = array();
        if ($this->datacontext->saveObject($attment)) {
            $return["result"] = true;
            $return["id"] = $attment->id;
        } else {
            $return["result"] = false;
            $return["msg"] = $this->datacontext->getLastMessage();
        }

        return $return;
    }

    public function insertBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod)
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
            }
        }

        return $return;
    }


    public function editBuildingMore($building, $listBuildFloor, $listBOQ, $listBuildPeriod, $listIDRemoveFloor, $listIDRemoveBOQ, $listIDRemovePeriod)
    {

        $return = array();
        foreach ($building as $key => $value) {

            if (!$this->datacontext->updateObject($building)) {

                $return["result"] = false;
                $return["msgBuilding"] = $this->datacontext->getLastMessage();
            } else {

                foreach ($listBOQ as $key2 => $value2) {

                    $value2->setBuildingId($building[$key]->id);
                    $value2->setDateCreated(null);// Entity is set Auto

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
                    $value2->setDateCreated(null);// Entity is set Auto

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
                    $value2->setDateCreated(null);// Entity is set Auto

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
            }
        }

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
}
