<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_DEPARTMENT")
 */
class Department extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="DEPARTMENTID")
     */
    public $id;

    /** @Column(type="string",length=200, name="DEPARTMENTNAME") */
    public $deptName;

    /** @Column(type="integer",length=11, name="DEPARTMENTTYPE") */
    public $deptType;

    /** @Column(type="string",length=1, name="DEPARTMENTSTATUS") */
    public $deptStatus;

    /** @Column(type="integer",length=11, name="MASTERID") */
    public $masterId;

    /** @Column(type="string",length=1, name="DEPARTMENTGROUP") */
    public $deptGroup;

    /** @Column(type="integer",length=11, name="CAMPUSID") */
    public $campusId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getDeptName() {
        return $this->deptName;
    }

    function getDeptType() {
        return $this->deptType;
    }

    function getDeptStatus() {
        return $this->deptStatus;
    }

    function getMasterId() {
        return $this->masterId;
    }

    function getDeptGroup() {
        return $this->deptGroup;
    }

    function getCampusId() {
        return $this->campusId;
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

    function setDeptName($deptName) {
        $this->deptName = $deptName;
    }

    function setDeptType($deptType) {
        $this->deptType = $deptType;
    }

    function setDeptStatus($deptStatus) {
        $this->deptStatus = $deptStatus;
    }

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setDeptGroup($deptGroup) {
        $this->deptGroup = $deptGroup;
    }

    function setCampusId($campusId) {
        $this->campusId = $campusId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
