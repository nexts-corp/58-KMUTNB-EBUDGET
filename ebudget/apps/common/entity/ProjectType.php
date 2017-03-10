<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Project_Type")
 */
class ProjectType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ProjectTypeId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="ProjectTypeName") */
    public $typeName;

    /** @Column(type="string",length=1, name="ProjectTypeStatus") */
    public $typeStatus;

    function getId() {
        return $this->id;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getTypeStatus() {
        return $this->typeStatus;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setTypeStatus($typeStatus) {
        $this->typeStatus = $typeStatus;
    }
}
