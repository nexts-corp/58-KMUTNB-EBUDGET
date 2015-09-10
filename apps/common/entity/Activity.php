<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="activity")
 */
class Activity extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="project_id") */
    public $projectId;

    /** @Column(type="integer",length=11, name="lk_department_id") */
    public $departmentId;

    /** @Column(type="text", name="activity_name") */
    public $activityName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;
    
    //public $xxx;

    function getId() {
        return $this->id;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getActivityName() {
        return $this->activityName;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getIsActive() {
        return $this->isActive;
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

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setActivityName($activityName) {
        $this->activityName = $activityName;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
