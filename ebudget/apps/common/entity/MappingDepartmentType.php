<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MAPPINGDEPARTMENTTYPE")
 */
class MappingDepartmentType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MAPPINGDEPARTMENTTYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="integer",length=11, name="ACTIVITYTYPEID") */
    public $actId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getActId() {
        return $this->actId;
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

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setActId($actId) {
        $this->actId = $actId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
