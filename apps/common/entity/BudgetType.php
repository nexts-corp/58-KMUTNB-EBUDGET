<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_type")
 */
class BudgetType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="master_id") */
    public $masterId;

    /** @Column(type="string",length=500, name="budget_type_name") */
    public $typeName;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMasterId() {
        return $this->masterId;
    }

    function getTypeName() {
        return $this->typeName;
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

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setTypeName($typeName) {
        $this->typeName = $typeName;
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

?>