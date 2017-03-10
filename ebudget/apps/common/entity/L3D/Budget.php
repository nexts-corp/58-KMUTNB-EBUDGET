<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Budget")
 */
class Budget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11, name="ActivityId") */
    public $activityId;

    /** @Column(type="string",length=500, name="BudgetName") */
    public $budgetName;

    /** @Column(type="integer",length=11, name="BudgetGroupId") */
    public $budgetgroupId;

    /** @Column(type="string", length=10, name="AccountTypeId") */
    public $accTypeId;

    /** @Column(type="integer",length=11, name="FundGroupId") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="ProjectId") */
    public $projectId;

    /** @Column(type="string",length=1, name="BudgetType") */
    public $budgetType;

    function getId() {
        return $this->id;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function getActivityId() {
        return $this->activityId;
    }

    function getBudgetName() {
        return $this->budgetName;
    }

    function getBudgetgroupId() {
        return $this->budgetgroupId;
    }

    function getAccTypeId() {
        return $this->accTypeId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getBudgetType() {
        return $this->budgetType;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }

    function setActivityId($activityId) {
        $this->activityId = $activityId;
    }

    function setBudgetName($budgetName) {
        $this->budgetName = $budgetName;
    }

    function setBudgetgroupId($budgetgroupId) {
        $this->budgetgroupId = $budgetgroupId;
    }

    function setAccTypeId($accTypeId) {
        $this->accTypeId = $accTypeId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setBudgetType($budgetType) {
        $this->budgetType = $budgetType;
    }
}

?>
