<?php

namespace apps\affirmative\entity;

use apps\common\entity\EntityBase;

/**
 * @Entity
 * @Table(name="Affirmative_Kpi")
 */
class AffirmativeKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="KpiId")
     * @GeneratedValue
     */
    public $kpiId;

    /** @Column(type="integer",length=11, name="TargetId") */
    public $targetId;

    /** @Column(type="integer",length=11, name="KpiSeq") */
    public $kpiSeq;

    /** @Column(type="text", name="KpiName") */
    public $kpiName;

    function getKpiId() {
        return $this->kpiId;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function getKpiSeq() {
        return $this->kpiSeq;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function setKpiId($kpiId) {
        $this->kpiId = $kpiId;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setKpiSeq($kpiSeq) {
        $this->kpiSeq = $kpiSeq;
    }

    function setKpiName($kpiName) {
        $this->kpiName = $kpiName;
    }

}
