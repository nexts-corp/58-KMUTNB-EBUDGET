<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Affirmative_Strategy")
 */
class AffirmativeStrategy extends EntityBase {

    /**
     * @Id 
     * @Column(type="integer",length=11,name="AffirmativeStrategyId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="integer",length=11, name="AffirmativeStrategySeq") */
    public $strategySeq;

    /** @Column(type="text", name="AffirmativeStrategyName") */
    public $strategyName;

    /** @Column(type="integer",length=11, name="AffirmativeTargetId") */
    public $targetId;

    function getId() {
        return $this->id;
    }

    function getStrategySeq() {
        return $this->strategySeq;
    }

    function getStrategyName() {
        return $this->strategyName;
    }

    function getTargetId() {
        return $this->targetId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setStrategySeq($strategySeq) {
        $this->strategySeq = $strategySeq;
    }

    function setStrategyName($strategyName) {
        $this->strategyName = $strategyName;
    }

    function setTargetId($targetId) {
        $this->targetId = $targetId;
    }
}
