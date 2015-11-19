<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETREVENUE")
 */
class BudgetRevenue extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="REVENUEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="REVENUEPLANID") */
    public $revenuePlanId;

    /** @Column(type="integer",length=11, name="BUDGETHEADID") */
    public $budgetHeadId;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="BUDGETTYPEID") */
    public $budgetTypeId;

    /** @Column(type="string",length=1, name="BUDGETTYPECODE") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11, name="BUDGETPLANID") */
    public $planId;

    /** @Column(type="integer",length=11, name="BUDGETPROJECTID") */
    public $projectId;

    /** @Column(type="integer",length=11, name="L3D_PLANID") */
    public $l3dPlanId;

    /** @Column(type="integer",length=11, name="L3D_PROJECTID") */
    public $l3dProjectId;

    /** @Column(type="integer",length=11, name="FUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ACTIVITYID") */
    public $activityId;

    /** @Column(type="integer",length=11, name="ATTACHMENTID") */
    public $attachmentId;

    /** @Column(type="string",length=18, name="BUDGETCATEGORY") */
    public $bgCategory;

    /** @Column(type="text", name="REVENUENAME") */
    public $revenueName;

    /** @Column(type="text", name="REVENUEDESC") */
    public $revenueDesc;

    /** @Column(type="string",length=18, name="BUDGETAMOUNT") */
    public $bgAmount;

    /** @Column(type="text", name="REMARK") */
    public $remark;

    /** @Column(type="integer",length=11, name="REFID") */
    public $refId;

    /** @Column(type="integer",length=11, name="TRACKINGSTATUSID") */
    public $statusId;

    /** @Column(type="text", name="COMMENT") */
    public $comment;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getRevenuePlanId() {
        return $this->revenuePlanId;
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

    function getBgCategory() {
        return $this->bgCategory;
    }

    function getRevenueName() {
        return $this->revenueName;
    }

    function getRevenueDesc() {
        return $this->revenueDesc;
    }

    function getBgAmount() {
        return $this->bgAmount;
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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRevenuePlanId($revenuePlanId) {
        $this->revenuePlanId = $revenuePlanId;
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

    function setBgCategory($bgCategory) {
        $this->bgCategory = $bgCategory;
    }

    function setRevenueName($revenueName) {
        $this->revenueName = $revenueName;
    }

    function setRevenueDesc($revenueDesc) {
        $this->revenueDesc = $revenueDesc;
    }

    function setBgAmount($bgAmount) {
        $this->bgAmount = $bgAmount;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
