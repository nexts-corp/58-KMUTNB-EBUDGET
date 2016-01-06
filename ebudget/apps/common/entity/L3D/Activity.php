<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Activity")
 */
class Activity extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ActivityId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="ProjectId") */
    public $projectId;

    /** @Column(type="string", length=100, name="ActivityName") */
    public $actName;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $departmentId;

    /** @Column(type="string",length=1, name="ActivityStatus") */
    public $actStatus;

    /** @Column(type="string",length=1, name="ActivityType") */
    public $actType;

    /** @Column(type="integer",length=11, name="ActivityLevel") */
    public $actLevel;

    /** @Column(type="string",length=1, name="ReceiveAct") */
    public $receiveAct;

    function getId() {
        return $this->id;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getActivityName() {
        return $this->activityName;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getActivityStatus() {
        return $this->activityStatus;
    }

    function getActivityType() {
        return $this->activityType;
    }

    function getActivityLevel() {
        return $this->activityLevel;
    }

    function getReceiveActivity() {
        return $this->receiveActivity;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setActivityName($activityName) {
        $this->activityName = $activityName;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setActivityStatus($activityStatus) {
        $this->activityStatus = $activityStatus;
    }

    function setActivityType($activityType) {
        $this->activityType = $activityType;
    }

    function setActivityLevel($activityLevel) {
        $this->activityLevel = $activityLevel;
    }

    function setReceiveActivity($receiveActivity) {
        $this->receiveActivity = $receiveActivity;
    }
}
