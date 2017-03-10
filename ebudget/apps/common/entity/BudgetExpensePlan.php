<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Plan")
 */
class BudgetExpensePlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpensePlanId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;

    /** @Column(type="integer",length=11, name="BudgetTypeId") */
    public $bgTypeId;

    /** @Column(type="integer",length=11, name="BudgetQuarter") */
    public $quarterId;

    /** @Column(type="date", name="BudgetDate") */
    public $budgetDate;

    /** @Column(type="text", name="BudgetExpenseDesc") */
    public $budgetDesc;

    /** @Column(type="string",length=18, name="ExpensePlan") */
    public $expensePlan;

    /** @Column(type="string",length=18, name="ExpenseUsed") */
    public $expenseUsed;

    function getId() {
        return $this->id;
    }

    function getExpenseId() {
        return $this->expenseId;
    }

    function getBgTypeId() {
        return $this->bgTypeId;
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

    function setId($id) {
        $this->id = $id;
    }

    function setExpenseId($expenseId) {
        $this->expenseId = $expenseId;
    }

    function setBgTypeId($bgTypeId) {
        $this->bgTypeId = $bgTypeId;
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

}
