<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_plan")
 */
class BudgetPlan extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="string",length=255, name="plan_name") */
    public $planName;

    /** @Column(type="integer",length=11, name="gl_code") */
    public $glCode;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="boolean",length=1, name="is_active") */
    public $isActive;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getPlanName() {
        return $this->planName;
    }

    function getGlCode() {
        return $this->glCode;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getIsActive() {
        return $this->isActive;
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

    function setGlCode($glCode) {
        $this->glCode = $glCode;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
