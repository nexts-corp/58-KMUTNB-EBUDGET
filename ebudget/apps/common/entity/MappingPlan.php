<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Mapping_Plan")
 */
class MappingPlan extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11, name="BudgetPeriodId")
     */
    public $budgetperiodId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="BudgetProjectId")
     */
    public $budgetProjectId;

    /**
     * @Id 
     * @Column(type="integer",length=11, name="PlanId")
     */
    public $planId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="FundGroupId")
     */
    public $fundgroupId;

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function getBudgetProjectId() {
        return $this->budgetProjectId;
    }

    function getPlanId() {
        return $this->planId;
    }

    function getFundgroupId() {
        return $this->fundgroupId;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }

    function setBudgetProjectId($budgetProjectId) {
        $this->budgetProjectId = $budgetProjectId;
    }

    function setPlanId($planId) {
        $this->planId = $planId;
    }

    function setFundgroupId($fundgroupId) {
        $this->fundgroupId = $fundgroupId;
    }
}

?>
