<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="AFFIRMATIVESTRATEGY")
 */
class AffirmativeStrategy extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AFFIRMATIVESTRATEGYID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="text", name="AFFIRMATIVESTRATEGYNAME") */
    public $strategyName;

    /** @Column(type="integer",length=11, name="AFFIRMATIVETARGETID") */
    public $targetId;

    /** @Column(type="integer",length=11, name="SEQ") */
    public $seq;

    /** @Column(type="string",length=20, name="CREATEUSERID") */
    public $creator;

    /** @Column(type="string",length=20, name="LASTUPDATEUSERID") */
    public $updater;

    function getId() {
        return $this->id;
    }

    function getStrategyName() {
        return $this->strategyName;
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

    function setStrategyName($strategyName) {
        $this->strategyName = $strategyName;
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
