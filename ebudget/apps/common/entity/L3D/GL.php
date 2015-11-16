<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_GL")
 */
class GL extends EntityBase {

    /** @Column(type="integer",length=11,name="GLHEADID") */
    public $glHeadId;

    /** @Column(type="integer",length=11,name="GLITEM") */
    public $glItem;

    /** @Column(type="string",length=10,name="ACCOUNTID") */
    public $accId;

    /** @Column(type="integer",length=11,name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11,name="BUDGETPERIODID") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11,name="BUDGETGROUPID") */
    public $budgetgroupId;

    /** @Column(type="integer",length=11,name="FUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11,name="PLANID") */
    public $planId;

    /** @Column(type="integer",length=11,name="PROJECTID") */
    public $projectId;

    /** @Column(type="integer",length=11,name="ACTIVITYID") */
    public $activityId;

    /** @Column(type="integer",length=11,name="LOTITEM") */
    public $lotItem;

    /** @Column(type="string",length=2,name="LOTCODE") */
    public $lotCode;

    /** @Column(type="float",name="DR") */
    public $dr;

    /** @Column(type="float",name="CR") */
    public $cr;

    /** @Column(type="string",length=1,name="GLHEADSTATUS") */
    public $glHeadStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
