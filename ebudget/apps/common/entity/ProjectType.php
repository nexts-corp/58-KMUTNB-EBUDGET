<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="PROJECTTYPE")
 */
class ProjectType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PROJECTTYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=50, name="PROJECTTYPENAME") */
    public $typeName;

    /** @Column(type="string",length=1, name="PROJECTTYPESTATUS") */
    public $typeStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getTypeName() {
        return $this->typeName;
    }

    function getTypeStatus() {
        return $this->typeStatus;
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

    function setTypeName($typeName) {
        $this->typeName = $typeName;
    }

    function setTypeStatus($typeStatus) {
        $this->typeStatus = $typeStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
