<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Budget_Period")
 */
class BudgetPeriod extends EntityBase {

    /** @Column(type="integer",length=11,name="BudgetPeriodId") */
    public $budgetperiodId;

    /** @Column(type="integer",length=11,name="BudgetGroupId") */
    public $budgetgroupId;

    /** @Column(type="string",length=1, name="BudgetPeriodStatus") */
    public $budgetperiodStatus;

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function getBudgetgroupId() {
        return $this->budgetgroupId;
    }

    function getBudgetperiodStatus() {
        return $this->budgetperiodStatus;
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
}
