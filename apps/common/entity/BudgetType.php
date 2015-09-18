<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETTYPE")
 */
class BudgetType extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETTYPEID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="BUDGETTYPENAME") */
    public $typeName;

    /** @Column(type="integer",length=11, name="MASTERID") */
    public $masterId;

    /** @Column(type="integer",length=11, name="LEVELID") */
    public $level;

    /** @Column(type="integer",length=11, name="BUDGETFORM") */
    public $budgetForm;

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

    function getMasterId() {
        return $this->masterId;
    }

    function getLevel() {
        return $this->level;
    }

    function getBudgetForm() {
        return $this->budgetForm;
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

    function setMasterId($masterId) {
        $this->masterId = $masterId;
    }

    function setLevel($level) {
        $this->level = $level;
    }

    function setBudgetForm($budgetForm) {
        $this->budgetForm = $budgetForm;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
