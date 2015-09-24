<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETEXPENSEPLAN")
 */
class BudgetExpensePlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETEXPENSEPLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETEXPENSEID") */
    public $expenseId;

    /** @Column(type="integer",length=11, name="BUDGETQUARTER") */
    public $quarterId;

    /** @Column(type="date", name="BUDGETDATE") */
    public $budgetDate;

    /** @Column(type="text", name="BUDGETEXPENSEDESC") */
    public $budgetDesc;

    /** @Column(type="string",length=18, name="EXPENSEPLAN") */
    public $expensePlan;

    /** @Column(type="string",length=18, name="EXPENSEUSED") */
    public $expenseUsed;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getExpenseId() {
        return $this->expenseId;
    }

    function getQuarterId() {
        return $this->quarterId;
    }

    function getBudgetDate() {
        return $this->budgetDate;
    }

    function getBudgetDesc() {
        return $this->budgetDesc;
    }

    function getExpensePlan() {
        return $this->expensePlan;
    }

    function getExpenseUsed() {
        return $this->expenseUsed;
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

    function setExpenseId($expenseId) {
        $this->expenseId = $expenseId;
    }

    function setQuarterId($quarterId) {
        $this->quarterId = $quarterId;
    }

    function setBudgetDate($budgetDate) {
        $this->budgetDate = $budgetDate;
    }

    function setBudgetDesc($budgetDesc) {
        $this->budgetDesc = $budgetDesc;
    }

    function setExpensePlan($expensePlan) {
        $this->expensePlan = $expensePlan;
    }

    function setExpenseUsed($expenseUsed) {
        $this->expenseUsed = $expenseUsed;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
