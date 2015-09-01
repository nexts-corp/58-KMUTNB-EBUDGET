<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="revenue_type")
 */
class RevenueType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="master_id") */
    public $masterId;

    /** @Column(type="string",length=500, name="revenue_type_name") */
    public $typeName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

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

    function getBudgetYear() {
        return $this->budgetYear;
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

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
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
