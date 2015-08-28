<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="lk_department")
 */
class Department extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="lk_faculty_id") */
    public $facultyId;

    /** @Column(type="integer",length=11, name="lk_campus_id") */
    public $campusId;

    /** @Column(type="string",length=200, name="department_name") */
    public $deptName;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getFacultyId() {
        return $this->facultyId;
    }

    function getCampusId() {
        return $this->campusId;
    }

    function getDeptName() {
        return $this->deptName;
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

    function setFacultyId($facultyId) {
        $this->facultyId = $facultyId;
    }

    function setCampusId($campusId) {
        $this->campusId = $campusId;
    }

    function setDeptName($deptName) {
        $this->deptName = $deptName;
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
