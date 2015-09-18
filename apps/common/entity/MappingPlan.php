<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="MAPPINGPLAN")
 */
class MappingPlan extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11, name="BUDGETPERIODID") 
     */
    public $budgetperiodId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="BUDGETPROJECTID") 
     */
    public $budgetProjectId;

    /**
     * @Id 
     * @Column(type="integer",length=11, name="PLANID") 
     */
    public $planId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="FUNDGROUPID") 
     */
    public $fundgroupId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
