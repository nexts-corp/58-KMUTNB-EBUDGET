<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Mapping_Department_Type")
 */
class MappingDepartmentType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="MappingDepartmentTypeId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $deptId;

    /** @Column(type="integer",length=11, name="ActivityTypeId") */
    public $actId;

    function getId() {
        return $this->id;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getActId() {
        return $this->actId;
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
}

?>
