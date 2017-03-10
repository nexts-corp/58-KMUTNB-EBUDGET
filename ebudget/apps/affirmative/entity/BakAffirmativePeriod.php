<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Period")
 */
class AffirmativePeriod extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="PeriodId")
     * @GeneratedValue
     */
    public $periodId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="string",length=255, name="PeriodName") */
    public $periodName;

    /** @Column(type="string",length=1, name="IsActive") */
    public $isActive;

    function getPeriodId() {
        return $this->periodId;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getPeriodName() {
        return $this->periodName;
    }

    function getIsActive() {
        return $this->isActive;
    }

    function setPeriodId($periodId) {
        $this->periodId = $periodId;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setPeriodName($periodName) {
        $this->periodName = $periodName;
    }

    function setIsActive($isActive) {
        $this->isActive = $isActive;
    }

}
