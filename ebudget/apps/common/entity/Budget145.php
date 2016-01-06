<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_145")
 */
class Budget145 extends EntityBase {

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

    /** @Column(type="string",length=300, name="DurableName") */
    public $durableName;

    /** @Column(type="text", name="DurableDesc") */
    public $durableDesc;

    /** @Column(type="string",length=18, name="Latitude") */
    public $latitude;

    /** @Column(type="string",length=18, name="Longitude") */
    public $longitude;

    /** @Column(type="string",length=50, name="GridUtm") */
    public $gridUtm;

    /** @Column(type="integer",length=11, name="Qty") */
    public $qty;

    /** @Column(type="string",length=300, name="Unit") */
    public $unit;

    /** @Column(type="string",length=18, name="Price") */
    public $price;

    /** @Column(type="string",length=18, name="TotalPrice") */
    public $totalPrice;

    /** @Column(type="integer",length=11, name="NumNeeded") */
    public $numNeeded;

    /** @Column(type="integer",length=11, name="NumWorkable") */
    public $numWork;

    /** @Column(type="integer",length=11, name="NumUnworkable") */
    public $numUnwork;

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

    function getDurableName() {
        return $this->durableName;
    }

    function getDurableDesc() {
        return $this->durableDesc;
    }

    function getLatitude() {
        return $this->latitude;
    }

    function getLongitude() {
        return $this->longitude;
    }

    function getGridUtm() {
        return $this->gridUtm;
    }

    function getQty() {
        return $this->qty;
    }

    function getUnit() {
        return $this->unit;
    }

    function getPrice() {
        return $this->price;
    }

    function getTotalPrice() {
        return $this->totalPrice;
    }

    function getNumNeeded() {
        return $this->numNeeded;
    }

    function getNumWork() {
        return $this->numWork;
    }

    function getNumUnwork() {
        return $this->numUnwork;
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

    function setDurableName($durableName) {
        $this->durableName = $durableName;
    }

    function setDurableDesc($durableDesc) {
        $this->durableDesc = $durableDesc;
    }

    function setLatitude($latitude) {
        $this->latitude = $latitude;
    }

    function setLongitude($longitude) {
        $this->longitude = $longitude;
    }

    function setGridUtm($gridUtm) {
        $this->gridUtm = $gridUtm;
    }

    function setQty($qty) {
        $this->qty = $qty;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

    function setNumNeeded($numNeeded) {
        $this->numNeeded = $numNeeded;
    }

    function setNumWork($numWork) {
        $this->numWork = $numWork;
    }

    function setNumUnwork($numUnwork) {
        $this->numUnwork = $numUnwork;
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
