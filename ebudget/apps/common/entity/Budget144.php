<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_144")
 */
class Budget144 extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetHeadId") */
    public $budgetHeadId;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="BudgetTypeId") */
    public $budgetTypeId;

    /** @Column(type="string",length=1, name="BudgetTypeCode") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $deptId;

    /** @Column(type="integer",length=11, name="BudgetPlanId") */
    public $planId;

    /** @Column(type="integer",length=11, name="BudgetProjectId") */
    public $projectId;

    /** @Column(type="integer",length=11, name="L3DPlanId") */
    public $l3dPlanId;

    /** @Column(type="integer",length=11, name="L3DProjectId") */
    public $l3dProjectId;

    /** @Column(type="integer",length=11, name="FundGroupId") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ActivityId") */
    public $activityId;

    /** @Column(type="integer",length=11, name="AttachmentId") */
    public $attachmentId;

    /** @Column(type="string",length=300, name="UtilityName") */
    public $utilName;

    /** @Column(type="text", name="UtilityDesc") */
    public $utilDesc;

    /** @Column(type="string",length=18, name="BudgetRequest") */
    public $bgRequest;

    /** @Column(type="string",length=18, name="BudgetReceive") */
    public $bgReceive;

    /** @Column(type="string",length=18, name="BudgetHistory") */
    public $bgHistory;

    /** @Column(type="string",length=18, name="NonBudgetRequest") */
    public $nonBgRequest;

    /** @Column(type="string",length=18, name="NonBudgetReceive") */
    public $nonBgReceive;

    /** @Column(type="string",length=18, name="NonBudgetHistory") */
    public $nonBgHistory;

    /** @Column(type="text", name="Remark") */
    public $remark;

    /** @Column(type="integer",length=11, name="RefId") */
    public $refId;

    /** @Column(type="integer",length=11, name="TrackingStatusId") */
    public $statusId;

    /** @Column(type="text", name="Comment") */
    public $comment;

    /** @Column(type="string",length=18, name="BudgetSummary") */
    public $bgSummary;

    /** @Column(type="string",length=10, name="Status") */
    public $status;

    function getId() {
        return $this->id;
    }

    function getBudgetHeadId() {
        return $this->budgetHeadId;
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

    function getL3dPlanId() {
        return $this->l3dPlanId;
    }

    function getL3dProjectId() {
        return $this->l3dProjectId;
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

    function getUtilName() {
        return $this->utilName;
    }

    function getUtilDesc() {
        return $this->utilDesc;
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

    function getNonBgRequest() {
        return $this->nonBgRequest;
    }

    function getNonBgReceive() {
        return $this->nonBgReceive;
    }

    function getNonBgHistory() {
        return $this->nonBgHistory;
    }

    function getRemark() {
        return $this->remark;
    }

    function getRefId() {
        return $this->refId;
    }

    function getStatusId() {
        return $this->statusId;
    }

    function getComment() {
        return $this->comment;
    }

    function getBgSummary() {
        return $this->bgSummary;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBudgetHeadId($budgetHeadId) {
        $this->budgetHeadId = $budgetHeadId;
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

    function setL3dPlanId($l3dPlanId) {
        $this->l3dPlanId = $l3dPlanId;
    }

    function setL3dProjectId($l3dProjectId) {
        $this->l3dProjectId = $l3dProjectId;
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

    function setUtilName($utilName) {
        $this->utilName = $utilName;
    }

    function setUtilDesc($utilDesc) {
        $this->utilDesc = $utilDesc;
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

    function setNonBgRequest($nonBgRequest) {
        $this->nonBgRequest = $nonBgRequest;
    }

    function setNonBgReceive($nonBgReceive) {
        $this->nonBgReceive = $nonBgReceive;
    }

    function setNonBgHistory($nonBgHistory) {
        $this->nonBgHistory = $nonBgHistory;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setRefId($refId) {
        $this->refId = $refId;
    }

    function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setBgSummary($bgSummary) {
        $this->bgSummary = $bgSummary;
    }

    function setStatus($status) {
        $this->status = $status;
    }
}

?>
