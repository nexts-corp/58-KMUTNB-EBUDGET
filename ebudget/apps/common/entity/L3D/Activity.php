<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_ACTIVITY")
 */
class Activity extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ACTIVITYID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="PROJECTID") */
    public $projectId;

    /** @Column(type="string", length=100, name="ACTIVITYNAME") */
    public $actName;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $departmentId;

    /** @Column(type="string",length=1, name="ACTIVITYSTATUS") */
    public $actStatus;

    /** @Column(type="string",length=1, name="ACTIVITYTYPE") */
    public $actType;

    /** @Column(type="integer",length=11, name="ACTIVITYLEVEL") */
    public $actLevel;

    /** @Column(type="string",length=1, name="RECEIVE_ACT") */
    public $receiveAct;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
