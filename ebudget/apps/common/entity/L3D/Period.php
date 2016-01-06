<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_Period")
 */
class Period extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PeriodId")
     * @GeneratedValue
     */
    public $id;

    /** @column(type="datetime"),name="DateFrom" */
    public $dateFrom;

    /** @column(type="datetime",name="DateTo") */
    public $dateTo;

    /** @Column(type="string",length=1, name="PeriodStatus") */
    public $periodStatus;

    /** @Column(type="string",length=50, name="PeriodName") */
    public $periodName;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetperiodId;

    function getId() {
        return $this->id;
    }

    function getDateFrom() {
        return $this->dateFrom;
    }

    function getDateTo() {
        return $this->dateTo;
    }

    function getPeriodStatus() {
        return $this->periodStatus;
    }

    function getPeriodName() {
        return $this->periodName;
    }

    function getBudgetperiodId() {
        return $this->budgetperiodId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDateFrom($dateFrom) {
        $this->dateFrom = $dateFrom;
    }

    function setDateTo($dateTo) {
        $this->dateTo = $dateTo;
    }

    function setPeriodStatus($periodStatus) {
        $this->periodStatus = $periodStatus;
    }

    function setPeriodName($periodName) {
        $this->periodName = $periodName;
    }

    function setBudgetperiodId($budgetperiodId) {
        $this->budgetperiodId = $budgetperiodId;
    }
}

?>
