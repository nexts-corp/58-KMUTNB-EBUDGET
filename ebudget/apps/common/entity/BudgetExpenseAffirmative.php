<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Affirmative")
 */
class BudgetExpenseAffirmative extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpenseAffirmativeId")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;
    
    /** @Column(type="integer",length=11, name="AffirmativeTypeId") */
    public $typeId;

    /** @Column(type="integer",length=11, name="AffirmativeIssueId") */
    public $issueId;

    /** @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="AffirmativeStrategyId") */
    public $strategyId;

    function getId() {
        return $this->id;
    }

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

    function setId($id) {
        $this->id = $id;
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
