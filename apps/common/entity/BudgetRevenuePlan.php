<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETREVENUE_PLAN")
 */
class BudgetRevenuePlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="REVENUEPLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetPeriodId;

    /** @Column(type="string",length=1, name="BUDGETTYPECODE") */
    public $budgetTypeCode;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="float", name="BUDGETEDUCATION") */
    public $budgetEducation;

    /** @Column(type="float", name="BUDGETSERVICE") */
    public $budgetService;

    /** @Column(type="float", name="BUDGETTOTAL") */
    public $budgetTotal;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>