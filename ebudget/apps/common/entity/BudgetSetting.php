<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Budget_Setting")
 */
class BudgetSetting extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="BudgetSettingId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="BudgetPeriodId") */
    public $budgetPeriodId;

    /** @Column(type="date", name="DateRequestClose") */
    public $dateClose;

    /** @Column(type="string",length=1, name="IsClosed") */
    public $isClosed;

    function getId() {
        return $this->id;
    }

    function getBudgetPeriodId() {
        return $this->budgetPeriodId;
    }

    function getDateClose() {
        return $this->dateClose;
    }

    function getIsClosed() {
        return $this->isClosed;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setBudgetPeriodId($budgetPeriodId) {
        $this->budgetPeriodId = $budgetPeriodId;
    }

    function setDateClose($dateClose) {
        $this->dateClose = $dateClose;
    }

    function setIsClosed($isClosed) {
        $this->isClosed = $isClosed;
    }

}

?>
