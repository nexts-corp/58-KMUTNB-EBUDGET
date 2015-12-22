<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETEXPENSE_AFFIRMATIVE")
 */
class BudgetExpenseAffirmative extends EntityBase {

    /** 
     * @Id
     * @Column(type="integer",length=11, name="BUDGETEXPENSEID") */
    public $expenseId;
    
    /**
     * @Column(type="integer",length=11, name="AFFIRMATIVETYPEID") */
    public $typeId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="AFFIRMATIVEISSUEID") */
    public $issueId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="AFFIRMATIVETARGETID") */
    public $targetId;

    /** 
     * @Id
     * @Column(type="integer",length=11, name="AFFIRMATIVESTRATEGYID") */
    public $strategyId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;


    function getExpenseId() {
        return $this->expenseId;
    }
    
    function getTypeId() {
        return $this->typeId;
    }

    function getIssueId() {
        return $this->issueId;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function getStrategyId() {
        return $this->strategyId;
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
    
    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setIssueId($issueId) {
        $this->issueId = $issueId;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setStrategyId($strategyId) {
        $this->strategyId = $strategyId;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
