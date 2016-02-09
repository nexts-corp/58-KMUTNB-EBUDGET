<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Head")
 */
class BudgetHead extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetHeadId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="FormBudget") */
    public $formId;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetPeriodId;

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

    /** @Column(type="integer",length=11, name="TrackingStatusId") */
    public $statusId;

    /** @Column(type="integer",length=11, name="DepartmentTrackingStatusId") */
    public $statusDeptId;

    /** @Column(type="boolean", name="IsCoBudget") */
    public $isCoBudget;

    function getId() {
        return $this->id;
    }

    function getFormId() {
        return $this->formId;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
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

    function getStatusId() {
        return $this->statusId;
    }

    function getStatusDeptId() {
        return $this->statusDeptId;
    }

    function getIsCoBudget() {
        return $this->isCoBudget;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFormId($formId) {
        $this->formId = $formId;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
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

    function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    function setStatusDeptId($statusDeptId) {
        $this->statusDeptId = $statusDeptId;
    }

    function setIsCoBudget($isCoBudget) {
        $this->isCoBudget = $isCoBudget;
    }

}

?>
