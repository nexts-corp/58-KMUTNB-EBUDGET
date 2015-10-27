<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGET145")
 */
class Budget145 extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ID")
     * @GeneratedValue
     */
    public $id;

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

    /** @Column(type="string",length=300, name="DURABLENAME") */
    public $durableName;

    /** @Column(type="text", name="DURABLEDESC") */
    public $durableDesc;

    /** @Column(type="string",length=18, name="LATITUDE") */
    public $latitude;

    /** @Column(type="string",length=18, name="LONGITUDE") */
    public $longitude;

    /** @Column(type="string",length=50, name="GRIDUTM") */
    public $gridUtm;

    /** @Column(type="integer",length=11, name="QTY") */
    public $qty;

    /** @Column(type="string",length=300, name="UNIT") */
    public $unit;

    /** @Column(type="string",length=18, name="PRICE") */
    public $price;

    /** @Column(type="string",length=18, name="TOTALPRICE") */
    public $totalPrice;

    /** @Column(type="integer",length=11, name="NUMNEEDED") */
    public $numNeeded;

    /** @Column(type="integer",length=11, name="NUMWORKABLE") */
    public $numWork;

    /** @Column(type="integer",length=11, name="NUMUNWORKABLE") */
    public $numUnwork;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
