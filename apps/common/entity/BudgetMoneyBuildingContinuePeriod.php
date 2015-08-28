<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="budget_money_building_continue_period")
 */
class BudgetMoneyBuildingContinuePeriod extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="budget_money_building_id") */
    public $budgetMoneyBuildingId;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="integer",length=11, name="work_no") */
    public $workNo;

    /** @Column(type="float",length=11, name="budget_amount") */
    public $budgetAmount;

    /** @Column(type="string",length=100, name="creator") */
    public $creator;

    /** @Column(type="string",length=100, name="updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getBudgetMoneyBuildingId() {
        return $this->budgetMoneyBuildingId;
    }

    function getBudgetYear() {
        return $this->budgetYear;
    }

    function getWorkNo() {
        return $this->workNo;
    }

    function getBudgetAmount() {
        return $this->budgetAmount;
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

    function setBudgetMoneyBuildingId($budgetMoneyBuildingId) {
        $this->budgetMoneyBuildingId = $budgetMoneyBuildingId;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setWorkNo($workNo) {
        $this->workNo = $workNo;
    }

    function setBudgetAmount($budgetAmount) {
        $this->budgetAmount = $budgetAmount;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
