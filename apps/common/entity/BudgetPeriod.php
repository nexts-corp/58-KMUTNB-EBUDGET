<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="3D_BUDGETPERIOD")
 */
class BudgetPeriod extends EntityBase {

    /** @Column(type="integer",length=11,name="BUDGETPERIODID") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11,name="BUDGETGROUPID") */
    public $budgetgroupId;

    /** @Column(type="string",length=1, name="BUDGETPERIODSTATUS") */
    public $budgetperiodStatus;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function getBudgetgroupId() {
        return $this->budgetgroupId;
    }

    function getBudgetperiodStatus() {
        return $this->budgetperiodStatus;
    }

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }

    function setBudgetgroupId($budgetgroupId) {
        $this->budgetgroupId = $budgetgroupId;
    }

    function setBudgetperiodStatus($budgetperiodStatus) {
        $this->budgetperiodStatus = $budgetperiodStatus;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
