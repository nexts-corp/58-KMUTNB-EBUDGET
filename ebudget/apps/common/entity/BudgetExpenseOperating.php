<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="BUDGETEXPENSE_OPERATING")
 */
class BudgetExpenseOperating extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11, name="BUDGETEXPENSEID") */
    public $expenseId;

    /** 
     * @Id
     * @Column(type="integer",length=11, name="SEQ") */
    public $seq;

    /** @Column(type="text", name="OPERATINGNAME") */
    public $operName;

    /** @Column(type="date", name="TIMESTART") */
    public $timeStart;

    /** @Column(type="date", name="TIMEEND") */
    public $timeEnd;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
