<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Plan")
 */
class BudgetPlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetPlanId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="BudgetPlanName") */
    public $planName;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $periodId;

    function getId() {
        return $this->id;
    }

    function getPlanName() {
        return $this->planName;
    }

    function getPeriodId() {
        return $this->periodId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlanName($planName) {
        $this->planName = $planName;
    }

    function setPeriodId($periodId) {
        $this->periodId = $periodId;
    }

}
?>
