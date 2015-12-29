<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVEKPI")
 */
class AffirmativeKpi extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVEKPIID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="SEQ") */
    public $kpiSeq;

    /** @Column(type="text", name="AFFIRMATIVEKPINAME") */
    public $kpiName;

    /** @Column(type="integer",length=11, name="AFFIRMATIVETARGETID") */
    public $targetId;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getKpiName() {
        return $this->kpiName;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function getSeq() {
        return $this->seq;
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

    function setKpiName($kpiName) {
        $this->kpiName = $kpiName;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }

    function setSeq($seq) {
        $this->seq = $seq;
    }

    function setCreator($creator) {
        $this->creator = $creator;
    }

    function setUpdater($updater) {
        $this->updater = $updater;
    }

}
