<?php

namespace apps\common\entity\L3D;
use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="L3D_PERIOD")
 */
class Period extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PERIODID")
     * @GeneratedValue
     */
    public $id;

    /** @column(type="datetime"),name="DATEFROM" */
    public $dateFrom;

    /** @column(type="datetime",name="DATETO") */
    public $dateTo;

    /** @Column(type="string",length=1, name="PERIODSTATUS") */
    public $periodStatus;

    /** @Column(type="string",length=50, name="PERIODNAME") */
    public $periodName;

    /** @Column(type="integer",length=11, name="BUDGETPERIODID") */
    public $budgetperiodId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

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

    function getCreator() {
        return $this->creator;
    }

    function getUpdater() {
        return $this->updater;
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

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}

?>
