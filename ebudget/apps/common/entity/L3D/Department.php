<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Department")
 */
class Department extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="DepartmentId")
     */
    public $id;

    /** @Column(type="string",length=200, name="DepartmentName") */
    public $deptName;

    /** @Column(type="integer",length=11, name="DepartmentType") */
    public $deptType;

    /** @Column(type="string",length=1, name="DepartmentStatus") */
    public $deptStatus;

    /** @Column(type="integer",length=11, name="MasterId") */
    public $masterId;

    /** @Column(type="string",length=1, name="DepartmentGroup") */
    public $deptGroup;

    /** @Column(type="integer",length=11, name="CampusId") */
    public $campusId;

    /** @Column(type="string",length=1, name="IsRevenue") */
    public $isRevenue;

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

    function getIsRevenue() {
        return $this->isRevenue;
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

    function setIsRevenue($isRevenue) {
        $this->isRevenue = $isRevenue;
    }
}
