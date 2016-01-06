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
    public $id;

    /** @Column(type="integer",length=11, name="AffirmativeKpiSeq") */
    public $kpiSeq;

    /** @Column(type="text", name="AffirmativeKpiName") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;


    function getId() {
        return $this->id;
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

    function setId($id) {
        $this->id = $id;
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
