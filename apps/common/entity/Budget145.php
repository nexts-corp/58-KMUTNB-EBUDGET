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

    /** @Column(type="string",length=300 name="DURABLENAME") */
    public $durableName;

    /** @Column(type="text", name="DURABLEDESC") */
    public $durableDesc;

    /** @Column(type="integer",length=11, name="QTY") */
    public $qty;

    /** @Column(type="string",length=300 name="UNIT") */
    public $unit;

    /** @Column(type="string",length=18 name="PRICE") */
    public $price;

    /** @Column(type="string",length=18 name="TOTALPRICE") */
    public $totalPrice;

    /** @Column(type="integer",length=11, name="NUMNEEDED") */
    public $numNeeded;

    /** @Column(type="integer",length=11, name="NUMWORKABLE") */
    public $numWork;

    /** @Column(type="integer",length=11, name="NUMUNWORKABLE") */
    public $numUnwork;

    /** @Column(type="float", name="REMARK") */
    public $remark;

    /** @Column(type="integer",length=11, name="REFID") */
    public $refId;

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

    function getDurableName() {
        return $this->durableName;
    }

    function getDurableDesc() {
        return $this->durableDesc;
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

    function setDurableName($durableName) {
        $this->durableName = $durableName;
    }

    function setDurableDesc($durableDesc) {
        $this->durableDesc = $durableDesc;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
