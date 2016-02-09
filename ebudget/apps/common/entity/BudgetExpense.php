<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense")
 */
class BudgetExpense extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpenseId")
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

    /** @Column(type="integer",length=11, name="L3DPlanId") */
    public $planId;

    /** @Column(type="integer",length=11, name="L3DProjectId") */
    public $projectId;

    /** @Column(type="integer",length=11, name="FundGroupId") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ActivityId") */
    public $activityId;

    /** @Column(type="integer",length=11, name="ProjectTypeId") */
    public $projectTypeId;

    /** @Column(type="string",length=1000, name="BudgetExpenseName") */
    public $name;

    /** @Column(type="string",length=100, name="Director") */
    public $director;

    /** @Column(type="string",length=100, name="Responder") */
    public $responder;

    /** @Column(type="text", name="Rationale") */
    public $rationale;

    /** @Column(type="text", name="Objective") */
    public $objective;

    /** @Column(type="text", name="Target") */
    public $target;

    /** @Column(type="date", name="TimeStart") */
    public $timeStart;

    /** @Column(type="date", name="TimeEnd") */
    public $timeEnd;

    /** @Column(type="string",length=18, name="BudgetEstimationAmount") */
    public $budgetEstAmount;

    /** @Column(type="string",length=300, name="BudgetEstimationText") */
    public $budgetEstText;

    /** @Column(type="text", name="BudgetEstimationDesc") */
    public $budgetEstDesc;

    /** @Column(type="text", name="Benefits") */
    public $benefits;

    /** @Column(type="integer",length=11, name="TrackingStatusId") */
    public $statusId;

    /** @Column(type="text", name="Comment") */
    public $comment;

    /** @Column(type="integer",length=11, name="PlanningTrackingStatusId") */
    public $statusPlanningId;

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

    function getBudgetEstAmount() {
        return $this->budgetEstAmount;
    }

    function getBudgetEstText() {
        return $this->budgetEstText;
    }

    function getBudgetEstDesc() {
        return $this->budgetEstDesc;
    }

    function getBenefits() {
        return $this->benefits;
    }

    function getStatusId() {
        return $this->statusId;
    }

    function getComment() {
        return $this->comment;
    }

    function getStatusPlanningId() {
        return $this->statusPlanningId;
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

    function setBudgetEstAmount($budgetEstAmount) {
        $this->budgetEstAmount = $budgetEstAmount;
    }

    function setBudgetEstText($budgetEstText) {
        $this->budgetEstText = $budgetEstText;
    }

    function setBudgetEstDesc($budgetEstDesc) {
        $this->budgetEstDesc = $budgetEstDesc;
    }

    function setBenefits($benefits) {
        $this->benefits = $benefits;
    }

    function setStatusId($statusId) {
        $this->statusId = $statusId;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setStatusPlanningId($statusPlanningId) {
        $this->statusPlanningId = $statusPlanningId;
    }

}
