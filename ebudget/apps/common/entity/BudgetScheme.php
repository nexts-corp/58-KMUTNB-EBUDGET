<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Scheme")
 */
class BudgetScheme extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetSchemeId")
     * @GeneratedValue
     */
    public $id;

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

    /** @Column(type="string",length=18, name="BudgetPlanQ1") */
    public $bgPlanQ1;

    /** @Column(type="string",length=18, name="BudgetPlanQ2") */
    public $bgPlanQ2;

    /** @Column(type="string",length=18, name="BudgetPlanQ3") */
    public $bgPlanQ3;

    /** @Column(type="string",length=18, name="BudgetPlanQ4") */
    public $bgPlanQ4;

    /** @Column(type="string",length=18, name="BudgetPlanSummary") */
    public $bgPlanSum;

    /** @Column(type="string",length=18, name="BudgetUsedQ1") */
    public $bgUsedQ1;

    /** @Column(type="string",length=18, name="BudgetUsedQ2") */
    public $bgUsedQ2;

    /** @Column(type="string",length=18, name="BudgetUsedQ3") */
    public $bgUsedQ3;

    /** @Column(type="string",length=18, name="BudgetUsedQ4") */
    public $bgUsedQ4;

    /** @Column(type="string",length=18, name="BudgetUsedSummary") */
    public $bgUsedSum;

    /** @Column(type="text", name="Remark") */
    public $remark;

    /** @Column(type="integer",length=11, name="RefId") */
    public $refId;

    /** @Column(type="integer",length=11, name="TrackingStatusId") */
    public $statusId;

    /** @Column(type="string",length=18, name="BudgetCategory") */
    public $bgCategory;

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

    function getBgPlanQ1() {
        return $this->bgPlanQ1;
    }

    function getBgPlanQ2() {
        return $this->bgPlanQ2;
    }

    function getBgPlanQ3() {
        return $this->bgPlanQ3;
    }

    function getBgPlanQ4() {
        return $this->bgPlanQ4;
    }

    function getBgPlanSum() {
        return $this->bgPlanSum;
    }

    function getBgUsedQ1() {
        return $this->bgUsedQ1;
    }

    function getBgUsedQ2() {
        return $this->bgUsedQ2;
    }

    function getBgUsedQ3() {
        return $this->bgUsedQ3;
    }

    function getBgUsedQ4() {
        return $this->bgUsedQ4;
    }

    function getBgUsedSum() {
        return $this->bgUsedSum;
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

    function getBgCategory() {
        return $this->bgCategory;
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

    function setBgPlanQ1($bgPlanQ1) {
        $this->bgPlanQ1 = $bgPlanQ1;
    }

    function setBgPlanQ2($bgPlanQ2) {
        $this->bgPlanQ2 = $bgPlanQ2;
    }

    function setBgPlanQ3($bgPlanQ3) {
        $this->bgPlanQ3 = $bgPlanQ3;
    }

    function setBgPlanQ4($bgPlanQ4) {
        $this->bgPlanQ4 = $bgPlanQ4;
    }

    function setBgPlanSum($bgPlanSum) {
        $this->bgPlanSum = $bgPlanSum;
    }

    function setBgUsedQ1($bgUsedQ1) {
        $this->bgUsedQ1 = $bgUsedQ1;
    }

    function setBgUsedQ2($bgUsedQ2) {
        $this->bgUsedQ2 = $bgUsedQ2;
    }

    function setBgUsedQ3($bgUsedQ3) {
        $this->bgUsedQ3 = $bgUsedQ3;
    }

    function setBgUsedQ4($bgUsedQ4) {
        $this->bgUsedQ4 = $bgUsedQ4;
    }

    function setBgUsedSum($bgUsedSum) {
        $this->bgUsedSum = $bgUsedSum;
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

    function setBgCategory($bgCategory) {
        $this->bgCategory = $bgCategory;
    }

}

?>
