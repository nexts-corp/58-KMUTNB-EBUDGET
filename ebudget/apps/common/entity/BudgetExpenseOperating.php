<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Expense_Operating")
 */
class BudgetExpenseOperating extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetExpenseOperatingId")
     * @GeneratedValue
     */
    public $id;
    
    /** @Column(type="integer",length=11, name="BudgetExpenseId") */
    public $expenseId;

    /** @Column(type="integer",length=11, name="Seq") */
    public $seq;

    /** @Column(type="text", name="OperatingName") */
    public $operName;

    /** @Column(type="date", name="TimeStart") */
    public $timeStart;

    /** @Column(type="date", name="TimeEnd") */
    public $timeEnd;

    function getId() {
        return $this->id;
    }

    function getExpenseId() {
        return $this->expenseId;
    }

    function getSeq() {
        return $this->seq;
    }

    function getOperName() {
        return $this->operName;
    }

    function getTimeStart() {
        return $this->timeStart;
    }

    function getTimeEnd() {
        return $this->timeEnd;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setExpenseId($expenseId) {
        $this->expenseId = $expenseId;
    }

    function setSeq($seq) {
        $this->seq = $seq;
    }

    function setOperName($operName) {
        $this->operName = $operName;
    }

    function setTimeStart($timeStart) {
        $this->timeStart = $timeStart;
    }

    function setTimeEnd($timeEnd) {
        $this->timeEnd = $timeEnd;
    }
}
