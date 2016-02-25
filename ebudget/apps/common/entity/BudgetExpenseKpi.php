<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Kpi")
 */
class BudgetExpenseKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpenseKpiId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;

    /** @Column(type="string", length=1000, name="BudgetExpenseKpiDesc") */
    public $budgetDesc;

    /** @Column(type="string",length=100, name="KpiUnit") */
    public $unit;

    /** @Column(type="string",length=100, name="KpiGoal") */
    public $goal;

    /** @Column(type="integer",length=11, name="KpiTypeId") */
    public $kpiTypeId;

    function getId() {
        return $this->id;
    }

    function getExpenseId() {
        return $this->expenseId;
    }

    function getBudgetDesc() {
        return $this->budgetDesc;
    }

    function getUnit() {
        return $this->unit;
    }

    function getGoal() {
        return $this->goal;
    }

    function getKpiTypeId() {
        return $this->kpiTypeId;
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

    function setUnit($unit) {
        $this->unit = $unit;
    }

    function setGoal($goal) {
        $this->goal = $goal;
    }

    function setKpiTypeId($kpiTypeId) {
        $this->kpiTypeId = $kpiTypeId;
    }

}
