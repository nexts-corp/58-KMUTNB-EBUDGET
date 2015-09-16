<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_BUDGET")
 */
class Budget extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $departmentId;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11, name="ACTIVITYID") */
    public $activityId;

    /** @Column(type="string",length=500, name="BUDGETNAME") */
    public $budgetName;

    /** @Column(type="integer",length=11, name="BUDGETGROUPID") */
    public $budgetgroupId;

    /** @Column(type="string", length=10, name="ACCOUNTTYPEID") */
    public $accTypeId;

    /** @Column(type="integer",length=11, name="FUNDGROUPID") */
    public $fundgroupId;

    /** @Column(type="integer",length=11, name="PROJECTID") */
    public $projectId;

    /** @Column(type="string",length=1, name="BUDGETTYPE") */
    public $budgetType;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
