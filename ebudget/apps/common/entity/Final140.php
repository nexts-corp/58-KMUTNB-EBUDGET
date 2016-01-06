<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Final_140")
 */
class Final140 extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
    
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

    /** @Column(type="string",length=500, name="PositionName") */
    public $positionName;

    /** @Column(type="string",length=500, name="Qualification") */
    public $qualify;

    /** @Column(type="integer",length=11, name="PositionOccupied") */
    public $occupy;

    /** @Column(type="integer",length=11, name="PositionVacancy") */
    public $vacancy;

    /** @Column(type="string",length=300, name="RateNo") */
    public $rateNo;

    /** @Column(type="float", name="SalaryPerMonth") */
    public $salary;

    /** @Column(type="float", name="SalaryTotal") */
    public $salaryTotal;

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

    function getPositionName() {
        return $this->positionName;
    }

    function getQualify() {
        return $this->qualify;
    }

    function getOccupy() {
        return $this->occupy;
    }

    function getVacancy() {
        return $this->vacancy;
    }

    function getRateNo() {
        return $this->rateNo;
    }

    function getSalary() {
        return $this->salary;
    }

    function getSalaryTotal() {
        return $this->salaryTotal;
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

    function setPositionName($positionName) {
        $this->positionName = $positionName;
    }

    function setQualify($qualify) {
        $this->qualify = $qualify;
    }

    function setOccupy($occupy) {
        $this->occupy = $occupy;
    }

    function setVacancy($vacancy) {
        $this->vacancy = $vacancy;
    }

    function setRateNo($rateNo) {
        $this->rateNo = $rateNo;
    }

    function setSalary($salary) {
        $this->salary = $salary;
    }

    function setSalaryTotal($salaryTotal) {
        $this->salaryTotal = $salaryTotal;
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
