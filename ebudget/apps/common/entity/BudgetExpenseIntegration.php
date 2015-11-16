<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETEXPENSE_INTEGRATION")
 */
class BudgetExpenseIntegration extends EntityBase {

    /** @Column(type="integer",length=11, name="BUDGETEXPENSEID") */
    public $expenseId;

    /** @Column(type="integer",length=11, name="INTEGRATIONID") */
    public $integrationId;

    /** @Column(type="integer",length=11, name="DEPARTMENTID") */
    public $deptId;

    /** @Column(type="string",length=500, name="INTEGRATIONDESC") */
    public $desc;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
