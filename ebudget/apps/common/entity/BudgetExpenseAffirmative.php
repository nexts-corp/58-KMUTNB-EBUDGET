<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Affirmative")
 */
class BudgetExpenseAffirmative extends EntityBase {

    /** 
     * @Id
     * @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;
    
    /**
     * @Column(type="integer",length=11, name="AffirmativeTypeId") */
    public $typeId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="AffirmativeIssueId") */
    public $issueId;

    /**
     * @Id
     * @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;

    /** 
     * @Id
     * @Column(type="integer",length=11, name="AffirmativeStrategyId") */
    public $strategyId;

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
}
