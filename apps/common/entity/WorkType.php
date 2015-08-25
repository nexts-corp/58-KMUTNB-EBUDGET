<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="bg_Work_Type")
 */
class WorkType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="Id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="Name") */
    public $name;

    /** @Column(type="string",length=255, name="Field_Name") */
    public $fieldName;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getFieldName() {
        return $this->fieldName;
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

    function setName($name) {
        $this->name = $name;
    }

    function setFieldName($fieldName) {
        $this->fieldName = $fieldName;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
