<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Detail")
 */
class BudgetExpenseDetail extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpenseDetaild")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;

    /** @Column(type="text", name="BudgetDesc") */
    public $budgetDesc;

    /** @Column(type="string",length=18, name="NumOfUnit") */
    public $numOfUnit;

    /** @Column(type="string",length=100, name="Unit") */
    public $unit;

    /** @Column(type="string",length=18, name="PricePerUnit") */
    public $pricePerUnit;

    /** @Column(type="string",length=18, name="TotalPrice") */
    public $totalPrice;

    function getId() {
        return $this->id;
    }

    function getExpenseId() {
        return $this->expenseId;
    }

    function getBudgetDesc() {
        return $this->budgetDesc;
    }

    function getNumOfUnit() {
        return $this->numOfUnit;
    }

    function getUnit() {
        return $this->unit;
    }

    function getPricePerUnit() {
        return $this->pricePerUnit;
    }

    function getTotalPrice() {
        return $this->totalPrice;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setExpenseId($expenseId) {
        $this->expenseId = $expenseId;
    }

    function setBudgetDesc($budgetDesc) {
        $this->budgetDesc = $budgetDesc;
    }

    function setNumOfUnit($numOfUnit) {
        $this->numOfUnit = $numOfUnit;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setPricePerUnit($pricePerUnit) {
        $this->pricePerUnit = $pricePerUnit;
    }

    function setTotalPrice($totalPrice) {
        $this->totalPrice = $totalPrice;
    }

}
