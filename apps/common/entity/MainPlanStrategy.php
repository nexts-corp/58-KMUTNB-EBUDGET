<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="main_plan_strategy")
 */
class MainPlanStrategy extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="id")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="main_plan_type_id") */
    public $mainPlanTypeId;

    /** @Column(type="string",length=10, name="strategy_seq") */
    public $strategySeq;

    /** @Column(type="text", name="strategy_name") */
    public $strategyName;

    /** @Column(type="integer",length=11, name="budget_year") */
    public $budgetYear;

    /** @Column(type="string",length=100, name="Creator") */
    public $creator;

    /** @Column(type="string",length=100, name="Updater") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getMainPlanTypeId() {
        return $this->mainPlanTypeId;
    }

    function getStrategySeq() {
        return $this->strategySeq;
    }

    function getStrategyName() {
        return $this->strategyName;
    }

    function getBudgetYear() {
        return $this->budgetYear;
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

    function setMainPlanTypeId($mainPlanTypeId) {
        $this->mainPlanTypeId = $mainPlanTypeId;
    }

    function setStrategySeq($strategySeq) {
        $this->strategySeq = $strategySeq;
    }

    function setStrategyName($strategyName) {
        $this->strategyName = $strategyName;
    }

    function setBudgetYear($budgetYear) {
        $this->budgetYear = $budgetYear;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
