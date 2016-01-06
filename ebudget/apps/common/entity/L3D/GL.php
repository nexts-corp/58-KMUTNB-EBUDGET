<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_GL")
 */
class GL extends EntityBase {

    /** @Column(type="integer",length=11,name="GLHeadId") */
    public $glHeadId;

    /** @Column(type="integer",length=11,name="GLItem") */
    public $glItem;

    /** @Column(type="string",length=10,name="AccountId") */
    public $accId;

    /** @Column(type="integer",length=11,name="DepartmentId") */
    public $deptId;

    /** @Column(type="integer",length=11,name="BudgetPeriodId") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11,name="BudgetGroupId") */
    public $budgetgroupId;

    /** @Column(type="integer",length=11,name="FundGroupId") */
    public $fundgroupId;

    /** @Column(type="integer",length=11,name="PlanId") */
    public $planId;

    /** @Column(type="integer",length=11,name="ProjectId") */
    public $projectId;

    /** @Column(type="integer",length=11,name="ActivityId") */
    public $activityId;

    /** @Column(type="integer",length=11,name="LotItem") */
    public $lotItem;

    /** @Column(type="string",length=2,name="LotCode") */
    public $lotCode;

    /** @Column(type="float",name="DR") */
    public $dr;

    /** @Column(type="float",name="CR") */
    public $cr;

    /** @Column(type="string",length=1,name="GLHeadStatus") */
    public $glHeadStatus;

    function getGlHeadId() {
        return $this->glHeadId;
    }

    function getGlItem() {
        return $this->glItem;
    }

    function getAccId() {
        return $this->accId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function getBudgetgroupId() {
        return $this->budgetgroupId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function getLotItem() {
        return $this->lotItem;
    }

    function getLotCode() {
        return $this->lotCode;
    }

    function getDr() {
        return $this->dr;
    }

    function getCr() {
        return $this->cr;
    }

    function getGlHeadStatus() {
        return $this->glHeadStatus;
    }

    function setGlHeadId($glHeadId) {
        $this->glHeadId = $glHeadId;
    }

    function setGlItem($glItem) {
        $this->glItem = $glItem;
    }

    function setAccId($accId) {
        $this->accId = $accId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }

    function setBudgetgroupId($budgetgroupId) {
        $this->budgetgroupId = $budgetgroupId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }

    function setLotItem($lotItem) {
        $this->lotItem = $lotItem;
    }

    function setLotCode($lotCode) {
        $this->lotCode = $lotCode;
    }

    function setDr($dr) {
        $this->dr = $dr;
    }

    function setCr($cr) {
        $this->cr = $cr;
    }

    function setGlHeadStatus($glHeadStatus) {
        $this->glHeadStatus = $glHeadStatus;
    }
}
