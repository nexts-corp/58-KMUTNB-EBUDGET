<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Center")
 */
class AffirmativeCenter extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="CenterId")
     * @GeneratedValue
     */
    public $centerId;

    /** @Column(type="string",length=255, name="PeriodCode") */
    public $periodCode;

    /**
     * @Column(type="integer",length=11,name="TypeId")
     */
    public $typeId;

    /** @Column(type="integer",length=11, name="TargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="KpiId") */
    public $kpiId;

    /** @Column(type="integer",length=11, name="KpiSeq") */
    public $kpiSeq;

    /** @Column(type="string",length=255, name="KpiName") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="UnitId") */
    public $unitId;

    /** @Column(type="string",length=255, name="Remark") */
    public $remark;

    /** @Column(type="string",length=10, name="IsApprove") */
    public $isApprove;
    public $centerGroup;
    public $unit;

    function getCenterId() {
        return $this->centerId;
    }

    function getPeriodCode() {
        return $this->periodCode;
    }

    function getTypeId() {
        return $this->typeId;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function getKpiId() {
        return $this->kpiId;
    }

    function getKpiSeq() {
        return $this->kpiSeq;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function getUnitId() {
        return $this->unitId;
    }

    function getRemark() {
        return $this->remark;
    }

    function getIsApprove() {
        return $this->isApprove;
    }

    function getCenterGroup() {
        return $this->centerGroup;
    }

    function getUnit() {
        return $this->unit;
    }

    function setCenterId($centerId) {
        $this->centerId = $centerId;
    }

    function setPeriodCode($periodCode) {
        $this->periodCode = $periodCode;
    }

    function setTypeId($typeId) {
        $this->typeId = $typeId;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setKpiId($kpiId) {
        $this->kpiId = $kpiId;
    }

    function setKpiSeq($kpiSeq) {
        $this->kpiSeq = $kpiSeq;
    }

    function setKpiName($kpiName) {
        $this->kpiName = $kpiName;
    }

    function setUnitId($unitId) {
        $this->unitId = $unitId;
    }

    function setRemark($remark) {
        $this->remark = $remark;
    }

    function setIsApprove($isApprove) {
        $this->isApprove = $isApprove;
    }

    function setCenterGroup($centerGroup) {
        $this->centerGroup = $centerGroup;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

}
