<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETEXPENSE")
 */
class BudgetExpense extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETEXPENSEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="integer",length=11, name="BUDGETTYPEID") */
    public $budgetTypeId;

    /** @Column(type="string",length=1, name="BUDGETTYPECODE") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11, name="L3D_PLANID") */
    public $planId;

    /** @Column(type="integer",length=11, name="L3D_PROJECTID") */
    public $projectId;

    /** @Column(type="integer",length=11, name="FUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ACTIVITYID") */
    public $activityId;

    /** @Column(type="integer",length=11, name="PROJECTTYPEID") */
    public $projectTypeId;

    /** @Column(type="string",length=1000, name="BUDGETEXPENSENAME") */
    public $name;

    /** @Column(type="string",length=100, name="DIRECTOR") */
    public $director;

    /** @Column(type="string",length=100, name="RESPONDER") */
    public $responder;

    /** @Column(type="text", name="RATIONALE") */
    public $rationale;

    /** @Column(type="text", name="OBJECTIVE") */
    public $objective;

    /** @Column(type="text", name="TARGET") */
    public $target;

    /** @Column(type="date", name="TIMESTART") */
    public $timeStart;

    /** @Column(type="date", name="TIMEEND") */
    public $timeEnd;

    /** @Column(type="string",length=18, name="BUDGETESTIMATIONAMOUNT") */
    public $budgetAmount;

    /** @Column(type="string",length=300, name="BUDGETESTIMATIONTEXT") */
    public $budgetText;

    /** @Column(type="text", name="BUDGETESTIMATIONDESC") */
    public $budgetDesc;

    /** @Column(type="text", name="BENEFITS") */
    public $benefits;

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

    function getProjectTypeId() {
        return $this->projectTypeId;
    }

    function getName() {
        return $this->name;
    }

    function getDirector() {
        return $this->director;
    }

    function getResponder() {
        return $this->responder;
    }

    function getRationale() {
        return $this->rationale;
    }

    function getObjective() {
        return $this->objective;
    }

    function getTarget() {
        return $this->target;
    }

    function getTimeStart() {
        return $this->timeStart;
    }

    function getTimeEnd() {
        return $this->timeEnd;
    }

    function getBudgetAmount() {
        return $this->budgetAmount;
    }

    function getBudgetText() {
        return $this->budgetText;
    }

    function getBudgetDesc() {
        return $this->budgetDesc;
    }

    function getBenefits() {
        return $this->benefits;
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

    function setProjectTypeId($projectTypeId) {
        $this->projectTypeId = $projectTypeId;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDirector($director) {
        $this->director = $director;
    }

    function setResponder($responder) {
        $this->responder = $responder;
    }

    function setRationale($rationale) {
        $this->rationale = $rationale;
    }

    function setObjective($objective) {
        $this->objective = $objective;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function setTimeStart($timeStart) {
        $this->timeStart = $timeStart;
    }

    function setTimeEnd($timeEnd) {
        $this->timeEnd = $timeEnd;
    }

    function setBudgetAmount($budgetAmount) {
        $this->budgetAmount = $budgetAmount;
    }

    function setBudgetText($budgetText) {
        $this->budgetText = $budgetText;
    }

    function setBudgetDesc($budgetDesc) {
        $this->budgetDesc = $budgetDesc;
    }

    function setBenefits($benefits) {
        $this->benefits = $benefits;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}