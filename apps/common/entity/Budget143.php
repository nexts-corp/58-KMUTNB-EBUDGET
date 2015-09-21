<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGET143")
 */
class Budget143 extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="BUDGETTYPEID") */
    public $budgetTypeId;

    /** @Column(type="string",length=1 name="BUDGETTYPECODE") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11, name="3D_PLANID") */
    public $planId;

    /** @Column(type="integer",length=11, name="3D_PROJECTID") */
    public $projectId;

    /** @Column(type="integer",length=11, name="FUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ACTIVITYID") */
    public $activityId;

    /** @Column(type="integer",length=11, name="ATTACHMENTID") */
    public $attachmentId;

    /** @Column(type="string",length=300 name="OPERATINGNAME") */
    public $operName;

    /** @Column(type="text", name="OPERATINGDESC") */
    public $operDesc;

    /** @Column(type="string",length=18 name="BUDGETREQUEST") */
    public $bgRequest;

    /** @Column(type="string",length=18 name="BUDGETRECEIVE") */
    public $bgReceive;

    /** @Column(type="string",length=18 name="BUDGETHISTORY") */
    public $bgHistory;

    /** @Column(type="float", name="REMARK") */
    public $remark;

    /** @Column(type="integer",length=11, name="REFID") */
    public $refId;

    /** @Column(type="string",length=1, name="BUDGETSTATUS") */
    public $bgStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getBudgetTypeId() {
        return $this->budgetTypeId;
    }

    function getBudgetTypeCode() {
        return $this->budgetTypeCode;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function getAttachmentId() {
        return $this->attachmentId;
    }

    function getOperName() {
        return $this->operName;
    }

    function getOperDesc() {
        return $this->operDesc;
    }

    function getBgRequest() {
        return $this->bgRequest;
    }

    function getBgReceive() {
        return $this->bgReceive;
    }

    function getBgHistory() {
        return $this->bgHistory;
    }

    function getRemark() {
        return $this->remark;
    }

    function getRefId() {
        return $this->refId;
    }

    function getBgStatus() {
        return $this->bgStatus;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setBudgetTypeId($budgetTypeId) {
        $this->budgetTypeId = $budgetTypeId;
    }

    function setBudgetTypeCode($budgetTypeCode) {
        $this->budgetTypeCode = $budgetTypeCode;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }

    function setAttachmentId($attachmentId) {
        $this->attachmentId = $attachmentId;
    }

    function setOperName($operName) {
        $this->operName = $operName;
    }

    function setOperDesc($operDesc) {
        $this->operDesc = $operDesc;
    }

    function setBgRequest($bgRequest) {
        $this->bgRequest = $bgRequest;
    }

    function setBgReceive($bgReceive) {
        $this->bgReceive = $bgReceive;
    }

    function setBgHistory($bgHistory) {
        $this->bgHistory = $bgHistory;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setRefId($refId) {
        $this->refId = $refId;
    }

    function setBgStatus($bgStatus) {
        $this->bgStatus = $bgStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
