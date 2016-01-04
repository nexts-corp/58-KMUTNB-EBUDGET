<?php

namespace apps\budget\service;

use apps\budget\interfaces\budgetType;
use apps\budget\interfaces\quater;
use apps\budget\interfaces\year;
use apps\common\entity\BudgetHead;
use apps\common\entity\TrackingStatus;
use th\co\bpg\cde\core\CServiceBase;
use th\co\bpg\cde\data\CDataContext;
use apps\budget\interfaces\IFinal141Service;
use apps\common\entity;

use th\co\bpg\cde\collection\impl\CJSONDecodeImpl;

class Final141Service extends CServiceBase implements IFinal141Service {

    public $datacontext;
    public $ent = "apps\\common\\entity";

    public function __construct() {
        $this->datacontext = new CDataContext();
    }

    function getPeriod() {
        $year = new \apps\common\entity\Year();
        $year->yearStatus = 'Y';
        return $this->datacontext->getObject($year)[0];
    }

    function getBudgetPlanAndProject($budgetPeriodId, $L3DPlanId, $fundgroupId)
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

    public function view($param){
        $param->budgetPeriodId = $this->getPeriod()->year;
        $param->budgetTypeCode = "G";

        $sql1 = " SELECT typ.id, typ.typeName, typ.masterId "
            . " FROM " . $this->ent . "\\BudgetType typ "
            . " WHERE typ.masterId = '20100000' and typ.typeCode = 'G' and typ.form141 = true ";
        $list1 = $this->datacontext->getObject($sql1);

        foreach ($list1 as $key1 => $value1) {
            $sql2 = " SELECT typ.id, typ.typeName, typ.masterId "
                . " FROM " . $this->ent . "\\BudgetType typ "
                . " WHERE typ.masterId = :masterId ";
            $param2 = array(
                "masterId" => $list1[$key1]["id"]
            );
            $list2 = $this->datacontext->getObject($sql2, $param2);
            $list1[$key1]["lv2"] = $list2;

            foreach ($list2 as $key2 => $value2) {
                $sql3 = " select head.id AS budgetHeadId, bg.id, bg.positionName, bg.occupy, bg.vacancy, bg.rateNo, bg.salary, bg.salaryTotal, bg.remark,bg.comment,bg.attachmentId,att.desc,att.path,ts.id AS statusId,ts.desc AS statusDesc"
                    . " from " . $this->ent . "\\Budget141 bg "
                    . " left join " . $this->ent . "\\BudgetHead head with head.id = bg.budgetHeadId "
                    . " left join " . $this->ent . "\\Attachment att with bg.attachmentId = att.id "
                    . " left join " . $this->ent . "\\TrackingStatus ts with bg.statusId = ts.id "
                    . " where head.formId = :formId "
                    . " and bg.budgetTypeId = :budgetTypeId "
                    . " and bg.budgetPeriodId = :budgetPeriodId "
                    . " and bg.budgetTypeCode = :budgetTypeCode "
                    . " and bg.l3dPlanId = :l3dPlanId "
                    . " and bg.fundgroupId = :fundgroupId "
                    . " and bg.deptId = :deptId";

                $param3 = array(
                    "formId" => "141",
                    "budgetTypeId" => $value2["id"],
                    "budgetPeriodId" => $param->budgetPeriodId,
                    "budgetTypeCode" => $param->budgetTypeCode,
                    "l3dPlanId" => $param->l3dPlanId,
                    "fundgroupId" => $param->fundgroupId,
                    "deptId" => $param->deptId
                );

                $list3 = $this->datacontext->getObject($sql3, $param3);

                //$list2[$key]["budget"] = $list3;
                $list1[$key1]["lv2"][$key2]["budget"] = $list3;
            }
        }

        //แผนงาน
        $plan = new \apps\common\entity\L3D\Plan();
        $plan->id = $param->l3dPlanId;
        $planData = $this->datacontext->getObject($plan)[0];

        //กองทุน
        $fund = new \apps\common\entity\L3D\FundGroup();
        $fund->id = $param->fundgroupId;
        $fundData = $this->datacontext->getObject($fund)[0];

        //ภาควิชา
        $dept = new \apps\common\entity\L3D\Department();
        $dept->id = $param->deptId;
        $deptData = $this->datacontext->getObject($dept)[0];

        //หน่วยงาน
        $fac = new \apps\common\entity\L3D\Department();
        $fac->id = $deptData->masterId;
        $facData = $this->datacontext->getObject($fac)[0];


        $this->getResponse()->add("budgetYear", $this->getPeriod()->year);
        $this->getResponse()->add("budgetType", "งบประมาณแผ่นดิน");
        $this->getResponse()->add("l3dPlan", $planData->planName);
        $this->getResponse()->add("fundgroup", $fundData->fundgroupName);
        $this->getResponse()->add("facName", $facData->deptName);
        $this->getResponse()->add("deptName", $deptData->deptName);

        return $list1;
    }

    public function insert($budget, $file){

        $conv = json_decode($budget);

        $desc = $conv->desc;

        $json = new CJSONDecodeImpl();
        $budget = $json->decode(new \apps\common\entity\Budget141(),$conv);
        $budget->budgetTypeCode = "G";
        $budget->budgetPeriodId = $this->getPeriod()->year;

        $return = array();

        $bgHead = new \apps\common\entity\BudgetHead();
        $bgHead->setFormId(141);
        $bgHead->setBudgetPeriodId($budget->budgetPeriodId);
        $bgHead->setBudgetTypeCode($budget->budgetTypeCode);
        $bgHead->setDeptId($budget->deptId);
        //$bgHead->setPlanId($value->planId);
        //$bgHead->setProjectId($value->projectId);
        $bgHead->setL3dPlanId($budget->l3dPlanId);
        $bgHead->setL3dProjectId($budget->l3dProjectId);
        $bgHead->setFundgroupId($budget->fundgroupId);
        $bgHead->setActivityId($budget->activityId);

        $budgetPlanProject = $this->getBudgetPlanAndProject($budget->budgetPeriodId, $budget->l3dPlanId, $budget->fundgroupId);
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

        $budget->budgetHeadId = $bgHeadId;
        $budget->planId = $budgetPlanProject["budgetPlanId"];
        $budget->projectId = $budgetPlanProject["budgetProjectId"];
        $budget->statusId = 1;
        $budget->bgSummary = $budget->salaryTotal;
        if ($budget->remark == "") {
            $budget->remark = "-";
        }

        if (!$this->datacontext->saveObject($budget)) {
            $return["result"] = false;
            $return["msg"] = $this->datacontext->getLastMessage();
        } else {
            $return["result"] = true;
            $return["id"] = $budget->id;
            $return["budgetHeadId"] = $bgHeadId;
        }

        if($file != ''){
            if($file != "undefined") {
                $time = date("YmdHis");
                $target_dir = "apps\\budget\\views\\draft\\attachment\\";

                $target_file = $target_dir ."BG141". $time . "-" . $file["name"];
                $fileN = "BG141". $time . "-" . $file["name"];

                if (move_uploaded_file($file["tmp_name"], $target_file)) {

                    $update = new \apps\common\entity\Attachment();
                    $update->desc = $desc;
                    $update->path = $fileN;

                    if (!$this->datacontext->saveObject($update)) {
                        $return = $this->datacontext->getLastMessage();
                    }
                    else{
                        $update2 = new \apps\common\entity\Budget141();
                        $update2->id = $budget->id;
                        $data = $this->datacontext->getObject($update2);

                        $data[0]->attachmentId = $update->id;
                        $this->datacontext->updateObject($data[0]);

                        $return["path"] = $fileN;
                    }

                }
            }
        }
        return $return;
    }

    public function update($budget, $file, $fileUpload){
        $return = array();

        $conv = json_decode($budget);

        $desc = $conv->desc;

        $json = new CJSONDecodeImpl();
        $budget = $json->decode(new \apps\common\entity\Budget141(),$conv);

        $budget->bgSummary = $budget->salaryTotal;
        $budget->dateUpdated = date('Y-m-d H:i:s');

        if (!$this->datacontext->updateObject($budget)) {
            $return["result"] = false;
            $return["msg"] = $this->datacontext->getLastMessage();
        }
        else {
            $return["result"] = true;
        }

        if($fileUpload == "1"){
            $time = date("YmdHis");
            $target_dir = "apps\\budget\\views\\draft\\attachment\\";

            $update = new \apps\common\entity\Budget141();
            $update->id = $budget->id;
            $data = $this->datacontext->getObject($update);

            if ($data[0]->attachmentId != null) {
                $update2 = new \apps\common\entity\Attachment();
                $update2->id = $data[0]->attachmentId;
                $data2 = $this->datacontext->getObject($update2);
                if (file_exists($target_dir . $data2[0]->path)) {
                    //return $data[0];
                    unlink($target_dir . $data2[0]->path);
                    $return["path"] = '';

                    $data[0]->attachmentId = null;

                    if (!$this->datacontext->updateObject($data[0])) {
                        $return = $this->datacontext->getLastMessage();
                    }
                    else{
                        if (!$this->datacontext->removeObject($data2[0])){
                            $return = $this->datacontext->getLastMessage();
                        }
                    }
                }
            }

            if($file !== "undefined") {
                $time = date("YmdHis");
                $target_dir = "apps\\budget\\views\\draft\\attachment\\";

                $target_file = $target_dir ."BG141". $time . "-" . $file["name"];
                $fileN = "BG141". $time . "-" . $file["name"];

                if (move_uploaded_file($file["tmp_name"], $target_file)) {

                    $update = new \apps\common\entity\Attachment();
                    $update->desc = $desc;
                    $update->path = $fileN;

                    if (!$this->datacontext->saveObject($update)) {
                        $return = $this->datacontext->getLastMessage();
                    }
                    else{
                        $update2 = new \apps\common\entity\Budget141();
                        $update2->id = $budget->id;
                        $data = $this->datacontext->getObject($update2);

                        $data[0]->attachmentId = $update->id;
                        $this->datacontext->updateObject($data[0]);

                        $return["path"] = $fileN;
                    }

                }
            }
        }
        return $return;
    }

    public function delete($budgetId){
        $result = true;

        $repo = new \apps\common\entity\Budget141();
        $repo->setId($budgetId);
        $data = $this->datacontext->getObject($repo);
        $bgHeadId = $data[0]->budgetHeadId;
        $attachmentId = $data[0]->attachmentId;

        if (!$this->datacontext->removeObject($repo)) {
            $return = $this->datacontext->getLastMessage();
        } else {
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

        if($attachmentId != null && $attachmentId != ""){
            $target_dir = "apps\\budget\\views\\draft\\attachment\\";

            $update2 = new \apps\common\entity\Attachment();
            $update2->id = $data[0]->attachmentId;
            $data2 = $this->datacontext->getObject($update2);
            if (file_exists($target_dir . $data2[0]->path)) {
                //return $data[0];
                unlink($target_dir . $data2[0]->path);

                $data[0]->attachmentId = null;

                if (!$this->datacontext->removeObject($data2[0])){
                    $return = $this->datacontext->getLastMessage();
                }
            }
        }

        return $result;
    }
}
