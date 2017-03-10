<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Approve")
 */
class AffirmativeApprove extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="ApproveId")
     * @GeneratedValue
     */
    public $approveId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /** @Column(type="string",length=255, name="GroupCode") */
    public $groupCode;

    /** @Column(type="string",length=10, name="IsStatus") */
    public $isStatus;

    /** @Column(type="string",length=255, name="StepName") */
    public $stepName;

    function getCenterId() {
        return $this->centerId;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getGroupCode() {
        return $this->groupCode;
    }

    function getIsStatus() {
        return $this->isStatus;
    }

    function getStepName() {
        return $this->stepName;
    }

    function setCenterId($centerId) {
        $this->centerId = $centerId;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setGroupCode($groupCode) {
        $this->groupCode = $groupCode;
    }

    function setIsStatus($isStatus) {
        $this->isStatus = $isStatus;
    }

    function setStepName($stepName) {
        $this->stepName = $stepName;
    }

}
