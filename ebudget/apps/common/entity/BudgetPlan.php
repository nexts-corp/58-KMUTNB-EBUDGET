<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETPLAN")
 */
class BudgetPlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BUDGETPLANID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=500, name="BUDGETPLANNAME") */
    public $planName;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $periodId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPlanName() {
        return $this->planName;
    }

    function getPeriodId() {
        return $this->periodId;
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

    function setPlanName($planName) {
        $this->planName = $planName;
    }

    function setPeriodId($periodId) {
        $this->periodId = $periodId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
