<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Kpi")
 */
class AffirmativeKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeKpiId")
     * @GeneratedValue
     */
    public $kpiId;

    /** @Column(type="integer",length=11, name="AffirmativeKpiSeq") */
    public $kpiSeq;

    /** @Column(type="text", name="AffirmativeKpiName") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;


    function getKpiId() {
        return $this->kpiId;
    }

    function getKpiSeq() {
        return $this->kpiSeq;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function getTargetId() {
        return $this->targetId;
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

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }
}
