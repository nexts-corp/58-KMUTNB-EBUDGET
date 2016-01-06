<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Integration")
 */
class BudgetExpenseIntegration extends EntityBase {
    /** 
     * @Id 
     * @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="IntegrationId") */
    public $integrationId;

    /** @Column(type="integer",length=11, name="DepartmentId") */
    public $deptId;

    /** @Column(type="string",length=500, name="IntegrationDesc") */
    public $desc;
    
    function getExpenseId() {
        return $this->expenseId;
    }

    function getIntegrationId() {
        return $this->integrationId;
    }

    function getDeptId() {
        return $this->deptId;
    }

    function getDesc() {
        return $this->desc;
    }

    function setExpenseId($expenseId) {
        $this->expenseId = $expenseId;
    }

    function setIntegrationId($integrationId) {
        $this->integrationId = $integrationId;
    }

    function setDeptId($deptId) {
        $this->deptId = $deptId;
    }

    function setDesc($desc) {
        $this->desc = $desc;
    }
}
