<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGET140")
 */
class Budget140 extends EntityBase {

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

    /** @Column(type="string",length=500 name="POSITIONNAME") */
    public $positionName;

    /** @Column(type="integer",length=11, name="POSITIONOCCUPIED") */
    public $occupy;

    /** @Column(type="integer",length=11, name="POSITIONVACANCY") */
    public $vacancy;

    /** @Column(type="string",length=300 name="RATENO") */
    public $rateNo;

    /** @Column(type="float", name="SALARYPERMONTH") */
    public $salary;

    /** @Column(type="float", name="SALARYTOTAL") */
    public $salaryTotal;

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

    function getPositionName() {
        return $this->positionName;
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

    function setPositionName($positionName) {
        $this->positionName = $positionName;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
