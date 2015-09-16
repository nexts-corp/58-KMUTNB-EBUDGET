<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_faculty")
 */
class LKFaculty extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="lk_campus_id") */
    public $campusId;

    /** @Column(type="integer",length=11, name="lk_activity_type_id") */
    public $activityTypeId;

    /** @Column(type="string",length=255, name="faculty_name") */
    public $facultyName;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getCampusId() {
        return $this->campusId;
    }

    function getActivityTypeId() {
        return $this->activityTypeId;
    }

    function getFacultyName() {
        return $this->facultyName;
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

    function setCampusId($campusId) {
        $this->campusId = $campusId;
    }

    function setActivityTypeId($activityTypeId) {
        $this->activityTypeId = $activityTypeId;
    }

    function setFacultyName($facultyName) {
        $this->facultyName = $facultyName;
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
