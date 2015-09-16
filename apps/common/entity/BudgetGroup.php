<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_BUDGETGROUP")
 */
class BudgetGroup extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETGROUPID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=100, name="BUDGETGROUPNAME") */
    public $budgetgroupName;

    /** @Column(type="string",length=1, name="BUDGETGROUPSTATUS") */
    public $budgetgroupStatus;

    /** @Column(type="string",length=1, name="BUDGETGROUPTYPE") */
    public $budgetgroupType;

    /** @Column(type="string",length=1, name="BUDGETSOURCE") */
    public $budgetgroupSource;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetgroupName() {
        return $this->budgetgroupName;
    }

    function getBudgetgroupStatus() {
        return $this->budgetgroupStatus;
    }

    function getBudgetgroupType() {
        return $this->budgetgroupType;
    }

    function getBudgetgroupSource() {
        return $this->budgetgroupSource;
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

    function setBudgetgroupName($budgetgroupName) {
        $this->budgetgroupName = $budgetgroupName;
    }

    function setBudgetgroupStatus($budgetgroupStatus) {
        $this->budgetgroupStatus = $budgetgroupStatus;
    }

    function setBudgetgroupType($budgetgroupType) {
        $this->budgetgroupType = $budgetgroupType;
    }

    function setBudgetgroupSource($budgetgroupSource) {
        $this->budgetgroupSource = $budgetgroupSource;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
