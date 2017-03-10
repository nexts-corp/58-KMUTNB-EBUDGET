<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Revenue_Plan")
 */
class BudgetRevenuePlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="RevenuePlanId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetPeriodId;

    /** @Column(type="string",length=1, name="BudgetTypeCode") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $deptId;

    /** @Column(type="float", name="BudgetEducation") */
    public $budgetEducation;

    /** @Column(type="float", name="BudgetService") */
    public $budgetService;

    /** @Column(type="float", name="BudgetTotal") */
    public $budgetTotal;

    function getId() {
        return $this->id;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getBudgetTypeCode() {
        return $this->budgetTypeCode;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getBudgetEducation() {
        return $this->budgetEducation;
    }

    function getBudgetService() {
        return $this->budgetService;
    }

    function getBudgetTotal() {
        return $this->budgetTotal;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setBudgetTypeCode($budgetTypeCode) {
        $this->budgetTypeCode = $budgetTypeCode;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setBudgetEducation($budgetEducation) {
        $this->budgetEducation = $budgetEducation;
    }

    function setBudgetService($budgetService) {
        $this->budgetService = $budgetService;
    }

    function setBudgetTotal($budgetTotal) {
        $this->budgetTotal = $budgetTotal;
    }
}

?>